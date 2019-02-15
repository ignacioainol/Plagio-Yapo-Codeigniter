<?

class Form_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	public function createNewPost($id_user,$category_id,$title,$post_description,$post_price,$post_id_region,$post_id_town){
		

		$data = array(
			'user_id' 	       => $id_user,
			'post_category'    => $category_id,
			'post_title'       => $title,
			'post_description' => $post_description,
			'post_price'	   => $post_price,
			'post_id_region'   => $post_id_region,
			'post_id_town'	   => $post_id_town
		);

		if($this->db->insert('posts',$data)){
			return true;
		}else{
			return false;
		}
	}

	public function saveImage($nameImg){

		$data = array(
			'image_name' => $nameImg,
			'post_id' => 12
		);

		if($this->db->insert('images',$data)){
			return true;
		}else{
			return false;
		}

	}


}

