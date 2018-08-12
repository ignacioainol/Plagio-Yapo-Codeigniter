<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Region_model');
	}

	public function getTowns($region_id){
		$towns = $this->Region_model->getTownsByRegionId($region_id);
		echo json_encode($towns, true);
	}

	public function create_user(){
		$formRules = array(
			array(
				'field' => 'fullname',
				'label' => 'Nombre',
				'rules' => 'required|min_length[6]|max_length[100]'
			),
			array(
				'field' =>
			),
		);

		$this->form_validation->set_rules($formRules);

		if($this->form_validation->run() === FALSE){
			$data['regions'] = $this->Region_model->getRegions();
			$this->load->view('partials/main_header');
			$this->load->view('registro',$data);
			$this->load->view('partials/footer');
		}else{
			//Form Ok
			echo "form ok";
			$data['regions'] = $this->Region_model->getRegions();
			$this->load->view('partials/main_header');
			$this->load->view('registro',$data);
			$this->load->view('partials/footer');
		}
	}
}