<?php


class Login extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index(){
		$validator = array(
			'success' => 'false',
			'messages' => array()
		);

		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">','</div>');

		if($this->form_validation->run() === FALSE){
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
			}

		}else{
			$login = $this->Login_model->login();

			if($login){

				$this->load->library('session');

				$dataSession = array(
					'user_id' => $login,
					'loged_in' => TRUE
				);

				$validator['success'] = true;
				$validator['messages'] = base_url()."/home";

			}else{
				$validator['success'] = false;
				$validator['messages'] = "Email o contraseña incorrecto(s)";
			}

		}

		echo json_encode($validator);
	}

	public function validate_email(){
		$email = $this->Login_model->validate_email();

		if($email == true){
			return true;
		}else{
			$this->form_validation->set_message('validate_email','El {field} no existe');
			return false;
		}
	}

}