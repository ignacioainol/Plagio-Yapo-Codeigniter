<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crearcuenta extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Region_model');
	}

	public function index(){
		$data['regions'] = $this->Region_model->getRegions();
		$this->load->view('partials/main_header');
		$this->load->view('registro',$data);
		$this->load->view('partials/footer');
	}

	public function getTowns($region_id){
		$towns = $this->Region_model->getTownsByRegionId($region_id);
		echo json_encode($towns, true);
		
	}
}