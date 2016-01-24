<?php

class Maps_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function getMapSearchDataResult($searchData) {
		$query = $this->db->select()->from('resident')->like($searchData);
		return $query->result();
	}
}
