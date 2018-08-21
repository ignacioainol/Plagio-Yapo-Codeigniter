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
	public function accept_terms() {
		$sss = $this->input->post('accept_terms');
	    if($sss == "yes"){
	    	return true;
	    }else{
	    	$this->form_validation->set_message('accept_terms', 'Debes Aceptar los Términos y Condiciones.');
	    	return false;
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

}