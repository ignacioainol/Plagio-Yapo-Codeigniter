<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Region_model');
		$this->load->model('Register_model');
	}

	public function index(){
		$data['regions'] = $this->Region_model->getRegions();
		$this->load->view('partials/main_header');
		$this->load->view('registro',$data);
		$this->load->view('partials/footer');
	}

	public function register(){
		$validator = array(
			'success' => false,
			'messages' => array()
		);

		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">','</div>');

		if($this->form_validation->run() === FALSE){
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}
			// $this->load->view('partials/main_header');
			// $this->load->view('registro',$data);
			// $this->load->view('partials/footer');
		}else{
			//Form Ok
			if($this->Register_model->insertUser())
				$validator['success'] = true;
				
			$validator['messages'] = "Ok";
		}

		echo json_encode($validator);
	}

	//Retorna un json con las regiones para completar el formulario de Registro
	public function getTowns($region_id){
		$towns = $this->Region_model->getTownsByRegionId($region_id);
		echo json_encode($towns, true);
	}

	//Callback para que sea requerido el checkbox aceptar los terminos
	function accept_terms() {
	    if (isset($_POST['accept_terms'])) return true;
	    $this->form_validation->set_message('accept_terms', 'Debes Aceptar los términos y condiciones');
	    return false;
	}

}