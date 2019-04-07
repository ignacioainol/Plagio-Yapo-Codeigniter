<?

class Items_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function count_all_atacama($limit, $start){
		$query = $this->make_query_servicios();
		$query .= ' LIMIT '.$start.', ' . $limit;
	}

	public function getPosts($idRegion){

		$query = "
			SELECT DISTINCT 
				t1.post_id,
				t1.post_title,
				CASE 
					WHEN
						DATE_FORMAT(t1.post_create_at,'%M %d') = DATE_FORMAT(NOW(), '%M %d') THEN CONCAT('Hoy a las ', DATE_FORMAT(t1.post_create_at,'%H:%i'))
				END AS fecha,
				t2.image_name,
				t3.category_name
			FROM posts t1
			LEFT JOIN images t2 ON t2.post_id = t1.post_id
			JOIN categories t3 ON t1.post_category = t3.category_id
		";

		if(isset($idRegion)){
			$query .= " WHERE t1.post_id_region = {$idRegion}";
		}

		$query .= " GROUP BY t1.post_id
					ORDER BY t1.post_create_at DESC";


		$result = $this->db->query($query);


		return $result->result();
	}
}