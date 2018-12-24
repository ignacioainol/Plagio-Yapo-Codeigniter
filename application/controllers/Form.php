<?php

class Form extends CI_Controller{

	function __construct(){
		parent::__construct();
	   $this->load->model('Category_model');
	   $this->load->model('Region_model');
	}

	public function index(){

		$data['catParents']    = $this->Category_model->getCatParents();
		$data['subCategories'] = $this->Category_model->getSubCategories();
		$data['regions'] 	   = $this->Region_model->getRegions();

		if($this->session->userdata('logged_in')){
			$data['email'] = $this->session->userdata('email');
			$data['name'] = $this->session->userdata('name');
			$this->load->view('partials/main_header',$data);
			$this->load->view('partials/form_post',$data);
			$this->load->view('partials/footer');
		}else{
			$this->load->view('partials/main_header');
			$this->load->view('partials/form_post',$data);
			$this->load->view('partials/footer');
		}
	}
}