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
			SELECT DISTINCT t1.post_id,t1.post_title,t1.post_description,t2.image_name
			FROM posts t1
			LEFT JOIN images t2 ON t2.post_id = t1.post_id
		";

		if(isset($idRegion)){
			$query .= " WHERE t1.post_id_region = {$idRegion}";
		}

		$query .= " GROUP BY t1.post_id";

		$result = $this->db->query($query);


		return $result->result();
	}
}