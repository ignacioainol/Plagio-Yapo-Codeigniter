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

	public function make_query_servicios(){
		$query = "
			SELECT DISTINCT t1.post_title,t1.post_description
			FROM posts t1
		";

		return $query;
	}
}