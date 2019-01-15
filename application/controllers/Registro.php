<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Region_model');
		$this->load->model('Register_model');
	}

	public function index(){
		if($this->session->userdata('logged_in')){
			redirect('dashboard');
		}else{
			$data['regions'] = $this->Region_model->getRegions();
			$this->load->view('partials/main_header');
			$this->load->view('registro',$data);
			$this->load->view('partials/footer');
		}
		
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
			//Form Registro Ok
			$this->load->library('email');

			$email = $this->input->post('email');
			$name = ucwords($this->input->post('fullname'));
			$fullname = $this->input->post('fullname');
			$salt = $this->salt();
			$data['hash'] = $this->makeHash($name,$salt);
			if($this->Register_model->insertUser($data['hash'])){
				//$validator['name'] = $name; Ignacio Ainol
				$validator['success'] = true;
			}

			$arrayName = explode(" ", $name);
			$data['name'] = ucfirst($arrayName[0]);
			$data['email'] = $email;
			$validator['messages'] = "Ok";
			$this->email->from('ignacio.ainolrivera@gmail.com', 'Ya Pues! Compra y Vende lo que sea');
			$this->email->to($email);
			$this->email->subject('Se verifico tu email');
			$bodyMessage = $this->load->view('templates/email_verification',$data,true);
			$this->email->message($bodyMessage);
			$this->email->send();
		}

		echo json_encode($validator);
	}

	public function confirm($hash,$email){
		$emailUrl = $this->uri->segment(4);
		$hashUrl = $this->uri->segment(3);
		$dataUser = $this->Register_model->fetchDataUser($emailUrl);
		$name = $dataUser->fullname;
		$arrayName = explode(" ", $name);
		$firstName = ucfirst($arrayName[0]);
		$salt = $dataUser->salt;
		$hashUser = $dataUser->hash;
		$emailUser = $dataUser->email;

		if(($emailUrl === $emailUser) && ($hashUrl === $hashUser))
			$this->Register_model->status_on($emailUser);
			$this->load->library('session');

			$sessionData = array(
        		'name'  => $firstName,
        		'email'     => $emailUser,
        		'logged_in' => TRUE
			);

			$this->session->set_userdata($sessionData);
			//echo $this->session->userdata('email');
			redirect('dashboard');
	}


	public function salt(){
		return password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
	}

	public function makeHash($fullname = null, $salt = null){
		return hash('sha256',$fullname.$salt);
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

	public function check_town($town) {
		if($town == 'xxx'){
			$this->form_validation->set_message('check_town', 'Debes Seleccionar tu Comuna');
            return false;
		}else{
			return true;
		}
	}

}