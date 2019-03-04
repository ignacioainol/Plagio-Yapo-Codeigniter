<?php

class Atacama extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Region_model');
	}

	public function index(){
		$data['name'] = $this->session->userdata('name');
		$data['regions'] = $this->Region_model->getRegions();
		$this->load->view('partials/main_header',$data);
		$this->load->view('partials/content');
		$this->load->view('partials/footer');
	}
}