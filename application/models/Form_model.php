<?

class Form_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	public function createNewPost(){
		$category_id = $this->input->post('selectCategory');
		$title    	 = $this->input->post('titlePost');
		$id_user 	 = $this->input->post('id_user');

		$data = array(
			'id_user' 	    => $this->input->post('id_user'),
			'post_category' => $this->input->post('selectCategory'),
			'post_title'    => $this->input->post('titlePost'),
		);

		if($this->db->insert('posts',$data)){
			return true;
		}else{
			return false;
		}
	}


}

