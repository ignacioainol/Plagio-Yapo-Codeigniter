<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Region_model');
	}

	public function index()
	{	
		if($this->session->userdata('logged_in'))
			$data['email'] = $this->session->userdata('email');
			$data['name'] = $this->session->userdata('name');

		$data['regions'] = $this->Region_model->getRegions();
		$this->load->view('partials/header');
		$this->load->view('home', $data);
		$this->load->view('partials/footer');
	}

	public function phpinfo(){
		echo phpinfo();
	}
}
