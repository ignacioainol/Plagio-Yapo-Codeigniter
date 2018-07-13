<?php

class Region_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	public function getRegions(){
		$query = $this->db->get('regions');

		return $query->result();
	}

	public function getTownsByRegionId($region_id){
		$this->db->where('region_id',$region_id);
		$query = $this->db->get('towns');

		return $query->result();
	}
}