<?

class Category_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	public function getCatParents(){
		$query = $this->db->get('type_categories');

		return $query->result();
	}
}