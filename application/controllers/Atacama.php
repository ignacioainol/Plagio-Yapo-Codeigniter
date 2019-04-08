<?php

class Atacama extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Region_model');
		$this->load->model('Items_model');

		setlocale(LC_ALL, 'es_ES');
	}

	public function index(){
		$data['name'] = $this->session->userdata('name');
		//$data['idRegion'] =
		$data['regions'] = $this->Region_model->getRegions();
		$data['posts'] = $this->Items_model->getPosts(5);

		$this->load->view('partials/main_header',$data);
		$this->load->view('partials/content');
		$this->load->view('partials/footer');
	}

}