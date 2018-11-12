<?php

/**
 * 
 */
class Login_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	public function validate_email(){
		$email = $this->input->post('emailLogin');
		$this->db->where('email',$email);
		$this->db->select('email');
		$query = $this->db->get('users');

		return ($query->num_rows() == 1) ? true : false;
	}

	public function fetchDataByEmail($email = null){
		if($email){
			$this->db->where('email',$email);
			$this->db->select('user_id,fullname,salt');
			$query = $this->db->get('users');
			$result = $query->row_array();
			return ($query->num_rows() == 1) ? $result : false;
			//return $result;
		}
	}

	public function login(){
		$email = $this->input->post('emailLogin');
		$password = $this->input->post('passwordLogin');

		$userData = $this->fetchDataByEmail($email);

		if($userData){
			$password = $this->makePassword($password,$userData['salt']);

			$this->db->where('email',$email);
			$this->db->where('password',$password);
			$query = $this->db->get('users');
			$result = $query->row_array();
			
			//return ($query->num_rows() == 1) ? $result['user_id'] : false;
			return ($query->num_rows() == 1) ? $result : false;
		}else{
			return false;
		}

	}

	public function makePassword($password = null, $salt = null){
		return hash('sha256',$password.$salt);
	}

	public function salt(){
		return password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
	}

}