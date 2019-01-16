<?php

class Register_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	public function insertUser($hash){

		$salt = $this->salt();
		$password = $this->makePassword($this->input->post('password'),$salt);

		$data = array(
			'fullname'  => ucwords($this->input->post('fullname')),
			'sex' 	    => $this->input->post('sexo'),
			'region_id' => $this->input->post('selectRegion'),
			'town_id'   => $this->input->post('selectTown'),
			'phone' 	=> '+569 ' . $this->input->post('numberPhone'),
			'email'		=> $this->input->post('email'),
			'salt' 		=> $salt,
			'hash' 		=> $hash,
			'password'  => $password
 		);

 		if($this->db->insert('users',$data))
 			return true;
 		else
 			return false;
	}

	public function getUserSaltByEmail($email){
		$this->db->where('email',$email);
		$this->db->select('salt');
		$query = $this->db->get('users');

		return $query->result()[0]->salt;
	}

	public function fetchDataUser($email){
		$this->db->where('email',$email);
		$query = $this->db->get('users');
		$result = $query->result();

		return $result[0];
	}

	public function salt(){
		return password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
	}

	public function makePassword($password = null, $salt = null){
		return hash('sha256',$password.$salt);
	}

	public function getNameByEmail($email){
		$this->db->select('fullname');
		$this->db->where('email', $email);
		$query = $this->db->get('users');

		return $query->result()[0]->fullname;
	}

	public function checkingConfirm($hashUser,$mainHash){
		if($hashUser == $mainHash)
			return true;
		else
			return false;
	}

	public function status_on($email){
		$data = array('status' => 1);
		$this->db->where('email',$email);
		$this->db->update('users',$data);

		return true;
	}

}