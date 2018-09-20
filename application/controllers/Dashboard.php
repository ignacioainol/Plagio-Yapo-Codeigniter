<?php

class Dashboard extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['email'] = $this->session->userdata('email');
		$data['name'] = $this->session->userdata('name');

		$this->load->view('partials/main_header',$data);
		$this->load->view('dashboard');
		$this->load->view('partials/footer');
	}
}