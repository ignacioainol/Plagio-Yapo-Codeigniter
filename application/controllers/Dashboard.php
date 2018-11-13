<?php

class Dashboard extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	}

	public function index(){
		if($this->session->userdata('logged_in')){
			$data['email'] = $this->session->userdata('email');
			$data['name'] = $this->session->userdata('name');

			$this->load->view('partials/main_header',$data);
			$this->load->view('dashboard');
			$this->load->view('partials/footer');
		}
		else{
			redirect(base_url());
		}
		
	}

	public function logout(){
		$this->load->library('session');
		$this->session->sess_destroy();

		$validator['success']  = true;
		$validator['messages'] = $this->input->post('current_uri_close');
		
		echo json_encode($validator);

	}
}