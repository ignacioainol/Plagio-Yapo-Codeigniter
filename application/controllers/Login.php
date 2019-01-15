<?php


class Login extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index(){
		$validator = array(
			'success'  => false,
			'messages' => array()
		);

		$validate_data = array(
			array(
			'field' => 'emailLogin',
			'label' => 'E-mail',
			'rules' => 'required|callback_validate_email'
			),
			array(
				'field' => 'passwordLogin',
				'label' => 'Password',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($validate_data);
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">','</div>');

		if($this->form_validation->run() === TRUE){

			$login = $this->Login_model->login();

			if($login){
				$this->load->library('session');

				$arrayName = explode(" ", $login['fullname']);
				$firstName = ucfirst($arrayName[0]);
				$fullname  = $login['fullname'];
				$email 	   = $this->input->post('emailLogin');
				$phone 	   = $this->Login_model->getPhone($email);
				$id_user   = $this->Login_model->getIdUser($email);


				$sessionData = array(
					'id_user'   => $id_user,
					'name'      => $firstName,
        			'email'     => $email,
        			'fullname'  => $fullname,
        			'phone'     => $phone,
        			'logged_in' => TRUE
				);

				$this->session->set_userdata($sessionData);

				$validator['success'] = true;
				$validator['messages'] = $this->input->post('current_uri');
				$validator['user_id'] = $login['user_id'];
			}else{
				$validator['success'] = false;
				$validator['messages'] = "Incorrecto E-mail o Contraseña";
			}
		}else{
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages'][$key] = form_error($key);
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