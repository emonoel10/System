<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InfoTable_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	var $residentTable = 'resident';
	var $residentColumn = array('name', 'lname', 'gender', 'bday', 'age', 'citizenship', 'occupation', 'status', 'purok', 'resAddress', 'perAddress', 'telNum', 'cpNum', 'latlong');
	var $residentGeolocColumn = array('name', 'lname', 'gender', 'bday', 'age', 'citizenship', 'occupation', 'status', 'purok', 'resAddress', 'perAddress', 'telNum', 'cpNum', 'geoloc.geoloc_latlong');
	var $geolocTable = 'geoloc';
	var $geolocColumn = array('resident_id', 'geoloc_latlong');
	var $order = array('resident_id' => 'asc');

	public function _get_datatables_query() {

		$this->db->from($this->residentTable)->join($this->geolocTable . ' geoloc', 'geoloc.resident_id = ' . $this->residentTable . '.resident_id');

		$i = 0;

		foreach ($this->residentGeolocColumn as $item) {
			// loop residentColumn
			if ($_POST['search']['value']) {
				// if datatable send POST for search

				if ($i === 0) {
					// first loop
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->residentGeolocColumn) - 1 == $i) {
					//last loop
					$this->db->group_end();
				}
				//close bracket
			}
			$residentGeolocColumn[$i] = $item; // set residentColumn array variable to order processing
			$i++;
		}

		if (isset($_POST['order'])) {
			// here order processing
			$this->db->order_by($residentGeolocColumn[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables() {
		$this->_get_datatables_query();
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}

		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered() {
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all() {
		$this->db->from($this->residentTable);
		return $this->db->count_all_results();
	}

	public function get_by_id($id) {
		$this->db->from($this->residentTable);
		$this->db->where('resident_id', $id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data) {
		$this->db->insert($this->residentTable, $data);
		$lastRefId = $this->db->insert_id();

		$geolocData = array(
			'resident_id' => $lastRefId,
			'geoloc_latlong' => $data['latlong'],
		);
		$this->db->insert($this->geolocTable, $geolocData);
	}

	public function update($where, $data) {
		$this->db->update($this->residentTable, $data, $where);
		// $this->db->update($this->residentTable . ' JOIN ' . $this->geolocTable . ' ON ' . $this->residentTable . '.resident_id = ' . $this->geolocTable . '.resident_id');
		// return $this->db->affected_rows();
	}

	public function delete_by_id($where, $id) {
		$tables = array('' . $this->residentTable . '', '' . $this->geolocTable . '');
		$this->db->where($where, $id);
		$this->db->delete($tables);
	}

	// public function resCheck($name, $lname, $purok) {
	// 	$qry = "SELECT count(*) as cnt from resident where name = "+$name+" AND lname = "+$lname+"";
	// 	if ($qry > 0) {
	// 		echo '1';
	// 	} else {
	// 		echo '0';
	// 	}
	// }
}
