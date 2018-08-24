<?php

class Register_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	public function insertUser(){

		$salt = $this->salt();
		$password = $this->makePassword($this->input->post('password'),$salt);

		$data = array(
			'fullname'  => ucwords($this->input->post('fullname')),
			'sex' 	    => $this->input->post('sexo'),
			'region_id' => $this->input->post('selectRegion'),
			'town_id'   => $this->input->post('town'),
			'phone' 	=> $this->input->post('numberPhone'),
			'email'		=> $this->input->post('email'),
			'password'  => $password
 		);

 		if($this->db->insert('users',$data))
 			return true;
 		else
 			return false;
	}

	public function salt(){
		return password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
	}

	public function makePassword($password = null, $salt = null){
		return hash('sha256',$password.$salt);
	}
}