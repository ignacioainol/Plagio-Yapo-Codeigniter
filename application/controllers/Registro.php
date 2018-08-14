<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Region_model');
		$this->load->model('Register_model');
	}

	public function index(){

		$this->form_validation->set_rules('fullname','Nombre','trim|required|min_length[6]|max_length[100]|xss_clean');
		$this->form_validation->set_rules('sexo','Sexo','required');
		$this->form_validation->set_rules('region','Región','required');
		$this->form_validation->set_rules('numberPhone','Número telefónico','required|min_length[7]|max_length[8]');
		$this->form_validation->set_rules('email','E-mail','required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password','Contraseña','required|min_length[6]');
		$this->form_validation->set_rules('passwordRepeat','Confirmar','required|matches[password]');
		$this->form_validation->set_rules('agree', 'Estoy de acuerdo', 'callback_accept_terms');


		if($this->form_validation->run() === FALSE){
			$data['regions'] = $this->Region_model->getRegions();
			$this->load->view('partials/main_header');
			$this->load->view('registro',$data);
			$this->load->view('partials/footer');
		}else{
			//Form Ok
			if($this->Register_model->insertUser())
				echo "entre dos tierras ok :D";
		}
	}

	//Retorna un json con las regiones para completar el formulario de Registro
	public function getTowns($region_id){
		$towns = $this->Region_model->getTownsByRegionId($region_id);
		echo json_encode($towns, true);
	}

	//Callback para que sea requerido el checkbox aceptar los terminos
	public function accept_terms() {
	    if($this->input->post('agree')) return true;
	    $this->form_validation->set_message('agree', 'Please read and accept our terms and conditions.');
	    return false;
	} 

}