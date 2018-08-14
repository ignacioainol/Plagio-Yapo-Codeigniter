<?php

class Register_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	public function insertUser(){
		$data = array(
			'fullname'  => ucfirst($this->input->post('fullname')),
			'sex' 	    => $this->input->post('sexo'),
			'region_id' => $this->input->post('region'),
			'town_id'   => $this->input->post('town'),
			'phone' 	=> $this->input->post('numberPhone'),
			'email'		=> $this->input->post('email'),
			'password'  => $this->input->post('password')
 		);

 		if($this->db->insert('users',$data))
 			return true;
 		else
 			return false;
	}
}