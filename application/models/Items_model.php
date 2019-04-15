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

		$queryOne = "SET lc_time_names = 'es_ES'";

		$query = "
			SELECT DISTINCT 
				t1.post_id,
				t1.post_title,
				CASE 
					WHEN
						DATE_FORMAT(t1.post_create_at,'%M %d') = DATE_FORMAT(NOW(), '%M %d') THEN CONCAT('Hoy a las ', DATE_FORMAT(t1.post_create_at,'%H:%i'))
					WHEN
						DATE(t1.post_create_at) = SUBDATE(CURRENT_DATE(), INTERVAL 1 DAY) THEN CONCAT('Ayer a las ', DATE_FORMAT(t1.post_create_at,'%H:%i'))
					ELSE
						CONCAT(DATE_FORMAT(t1.post_create_at,'%d de %M'))
				END AS fecha,
				t2.image_name,
				t3.category_name,
				t4.region_name,
				t5.town_name
			FROM posts t1
			LEFT JOIN images t2 ON t2.post_id = t1.post_id
			JOIN categories t3 ON t1.post_category = t3.category_id
			JOIN regions t4 ON t1.post_id_region = t4.region_id
			JOIN towns t5 ON t1.post_id_town = t5.town_id
		";

		if(isset($idRegion)){
			$query .= " WHERE t1.post_id_region = {$idRegion}";
		}

		$query .= " GROUP BY t1.post_id
					ORDER BY t1.post_create_at DESC";

		$this->db->query($queryOne);
		$result = $this->db->query($query);


		return $result->result();
	}

	public function getSearchPosts($busqueda,$regionId,$comunaIds,$categoryId){

		$queryOne = "SET lc_time_names = 'es_ES'";

		$query = "
				  SELECT DISTINCT 
				  		t1.post_id,
				  		 t1.post_title,
				  		 CASE 
							WHEN
								DATE_FORMAT(t1.post_create_at,'%M %d') = DATE_FORMAT(NOW(), '%M %d') THEN CONCAT('Hoy a las ', DATE_FORMAT(t1.post_create_at,'%H:%i'))
							WHEN
								DATE(t1.post_create_at) = SUBDATE(CURRENT_DATE(), INTERVAL 1 DAY) THEN CONCAT('Ayer a las ', DATE_FORMAT(t1.post_create_at,'%H:%i'))
							ELSE
								CONCAT(DATE_FORMAT(t1.post_create_at,'%d de %M'))
						END AS fecha,
						t2.image_name,
						t3.category_name,
						t4.region_name,
						t5.town_name
				  FROM posts t1
				  LEFT JOIN images t2 ON t2.post_id = t1.post_id
				  JOIN categories t3 ON t1.post_category = t3.category_id
				  JOIN regions t4 ON t1.post_id_region = t4.region_id
				  JOIN towns t5 ON t1.post_id_town = t5.town_id
				  WHERE t1.post_id_region = {$regionId}";

		if(isset($busqueda)){
			$query .= "
				AND t1.post_title LIKE '%{$busqueda}%'
			";
		}

		if(isset($categoryId)){
			$query .= "
				AND t1.post_category = {$categoryId}
			";
		}

		if(isset($comunaIds)){
			$comuna_filter = implode("','", $comunaIds);
			$query .= " AND t1.post_id_town IN('".$comuna_filter."')";
		}

		$query .= " GROUP BY t1.post_id
					ORDER BY t1.post_create_at DESC";


		$this->db->query($queryOne);
		$result = $this->db->query($query);

		return $result->result();
	}
}