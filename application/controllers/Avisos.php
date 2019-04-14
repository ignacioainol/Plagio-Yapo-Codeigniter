<?php

class Avisos extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index(){

		// $toFind     = $this->input->post('thingToFind');
		// $idCategory = $this->input->post('selectCategory');
		// $idRegion   = $this->input->post('selectRegionSearch');
		// $idTowns	= $this->input->post('checkTowns');

		// echo "buscando cosas " . $toFind . " " .$idCategory . " " . $idRegion;
		// echo "<pre>";
		// print_r($idTowns);

		$algo = $this->input->get('q');

		echo $algo;
	}
}