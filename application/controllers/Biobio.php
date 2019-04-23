<?php

class Biobio extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Region_model');
		$this->load->model('Items_model');
	}

	public function index(){
		$data['regionId'] = 10;
		$data['name'] = $this->session->userdata('name');
		$data['regionName'] = "Biobio";
		$data['regions'] = $this->Region_model->getRegions();
		$data['posts'] = $this->Items_model->getPosts(10);

		$this->load->view('partials/main_header',$data);
		$this->load->view('partials/content');
		$this->load->view('partials/footer');
	}

	public function Avisos(){
		echo "vamos bieeen";
	}

}