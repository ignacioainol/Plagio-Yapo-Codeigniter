<?php

class Form extends CI_Controller{

	function __construct(){
		parent::__construct();
	   $this->load->model('Category_model');
	   $this->load->model('Region_model');
	}

	public function index(){

		$data['catParents']    = $this->Category_model->getCatParents();
		$data['subCategories'] = $this->Category_model->getSubCategories();
		$data['regions'] 	   = $this->Region_model->getRegions();

		if($this->session->userdata('logged_in')){
			$data['email'] = $this->session->userdata('email');
			$data['name'] = $this->session->userdata('name');
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

		$this->form_validation->set_rules($validate_data);
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">','</div>');

		if($this->form_validation->run() === FALSE){
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}
		}else{
			
			$validator['success'] = true;
		}

		echo json_encode($validator);
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