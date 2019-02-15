<?php

class Form extends CI_Controller{

	function __construct(){
		parent::__construct();
	   $this->load->model('Category_model');
	   $this->load->model('Region_model');
	   $this->load->model('Form_model');
	}

	public function index(){

		$data['catParents']    = $this->Category_model->getCatParents();
		$data['subCategories'] = $this->Category_model->getSubCategories();
		$data['regions'] 	   = $this->Region_model->getRegions();

		if($this->session->userdata('logged_in')){
			$data['email'] = $this->session->userdata('email');
			$data['name'] = $this->session->userdata('name');
			$data['fullname'] = $this->session->userdata('fullname');
			$data['phone'] = $this->session->userdata('phone');
			$data['id_user'] = $this->session->userdata('id_user');
			$this->load->view('partials/main_header',$data);
			$this->load->view('form_post',$data);
			$this->load->view('partials/footer');
		}else{
			$this->load->view('partials/main_header');
			$this->load->view('form_post',$data);
			$this->load->view('partials/footer');
		}
	}

	public function newPost(){
		$validator = array(
			'success' => false,
			'messages' => array()
		);
		if($this->session->userdata('logged_in')){
			$validate_data = array(
				array(
					'field' => 'selectCategory',
					'label' => 'Categoría',
					'rules' => 'required|callback_check_category'
				),
				array(
					'field' => 'titlePost',
					'label' => 'Título',
					'rules' => 'trim|required|min_length[6]|max_length[100]'
				),
				array(
					'field' => 'descriptionPost',
					'label' => 'Descripción',
					'rules' => 'trim|required|min_length[6]|max_length[100]'	
				),
				array(
					'field' => 'pricePost',
					'label' => 'Precio',
					'rules' => 'trim|required|min_length[3]|max_length[1001]'

				),
				array(
					'field' => 'selectRegion',
					'label' => 'Región',
					'rules' => 'required|callback_check_select'

				),
				array(
					'field' => 'selectTown',
					'label' => 'Comuna',
					'rules' => 'required|callback_check_town'

				)
			);
		}else{
			$validate_data = array(
				array(
					'field' => 'selectCategory',
					'label' => 'Categoría',
					'rules' => 'required|callback_check_category'
				),
				array(
					'field' => 'titlePost',
					'label' => 'Título',
					'rules' => 'trim|required|min_length[6]|max_length[100]'
				),
				array(
					'field' => 'descriptionPost',
					'label' => 'Descripción',
					'rules' => 'trim|required|min_length[6]|max_length[100]'	
				),
				array(
					'field' => 'pricePost',
					'label' => 'Precio',
					'rules' => 'trim|required|min_length[3]|max_length[1001]'

				),
				array(
					'field' => 'selectRegion',
					'label' => 'Región',
					'rules' => 'required|callback_check_select'

				),
				array(
					'field' => 'selectTown',
					'label' => 'Comuna',
					'rules' => 'required|callback_check_town'

				),
				array(
					'field' => 'nameUserPost',
					'label' => 'Nombre',
					'rules' => 'trim|required|min_length[3]|max_length[100]'

				),
				array(
					'field' => 'emailUserPost',
					'label' => 'E´mail',
					'rules' => 'required|valid_email'
				),
				array(
					'field' => 'emailUserConfirmPost',
					'label' => 'de confirmación de correo',
					'rules' => 'trim|matches[emailUserPost]'
				),
				array(
					'field' => 'numberPhone',
					'label' => 'Número telefónico',
					'rules' => 'required|min_length[7]|max_length[8]'
				),
				array(
					'field' => 'passwordUserPost',
					'label' => 'Contraseña',
					'rules' => 'trim|required|min_length[6]'
				),
				array(
					'field' => 'passwordUserConfirmPost',
					'label' => 'de confirmación contraseña',
					'rules' => 'trim|matches[passwordUserPost]'
				)

			);
		}
		

		$this->form_validation->set_rules($validate_data);
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">','</div>');

		if($this->form_validation->run() === FALSE){
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}
		}else{
			//Form Post Ok

			$validator['success'] = true;
			$validator['id_user'] = $this->input->post('id_user');

			$id_user         = $this->input->post('id_user');
			$category_id     = $this->input->post('selectCategory');
			$titlePost       = $this->input->post('titlePost');
			$postDescription = $this->input->post('descriptionPost');
			$pricePost		 = $this->input->post('pricePost');
			$post_id_region  = $this->input->post('selectRegion');
			$post_id_town    = $this->input->post('selectTown');
			
			// $config['upload_path'] = './public/img/post_images/';
			// $config['allowed_types'] = 'jpg|jpeg|gif|png';
			// $this->load->library('upload',$config);

			$F = array();

			$count_files = count( $_FILES['images']['name'] );

			$files = $_FILES;

			for($i = 0; $i < $count_files; $i++){
				$_FILES['userfile'] = [
					'name'     => $files['images']['name'][$i],
		            'type'     => $files['images']['type'][$i],
		            'tmp_name' => $files['images']['tmp_name'][$i],
		            'error'    => $files['images']['error'][$i],
		            'size'     => $files['images']['size'][$i]
				];

				$upload_dir = 'public/img/post_images/';
				$image = $files['images']['name'][$i];
				$image_ext = pathinfo($image,PATHINFO_EXTENSION);
				$rand = $this->genRandomString();
				$name = $rand.'_'.time().'.'.$image_ext;
				move_uploaded_file($files['images']['tmp_name'][$i], $upload_dir.$name);

				$this->Form_model->saveImage($name);

				$F[] = $_FILES['userfile'];
			}

			$validator['images'] = $F;

			$this->Form_model->createNewPost($id_user,$category_id,$titlePost,$postDescription,$pricePost, $post_id_region,$post_id_town);

		}

		echo json_encode($validator);
	}

	public function genRandomString() {
	    $length = 8;
	    $characters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWZYZ";

	    $real_string_length = strlen($characters) ;     
	    $string="image_yapues";

	    for ($p = 0; $p < $length; $p++) 
	    {
	        $string .= $characters[mt_rand(0, $real_string_length-1)];
	    }

	    return strtolower($string);
	}

	public function phpinfo(){
		phpinfo();
	}

	public function check_category($category) {
		if($category == 'xxx'){
			$this->form_validation->set_message('check_category', 'Debes Seleccionar una Categoría');
            return false;
		}else{
			return true;
		}
	}

	public function check_select($city) {
		if($city == 'xxx'){
			$this->form_validation->set_message('check_select', 'Debes Seleccionar tu Región');
            return false;
		}else{
			return true;
		}
	}


	public function check_town($town) {
		if($town == 'xxx'){
			$this->form_validation->set_message('check_town', 'Debes Seleccionar tu Comuna');
            return false;
		}else{
			return true;
		}
	}
}