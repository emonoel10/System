<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InfoTable_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	var $residentTable = 'resident';
	var $residentColumn = array('name', 'lname', 'gender', 'bday', 'age', 'citizenship', 'occupation', 'status', 'purok', 'resAddress', 'perAddress', 'telNum', 'cpNum', 'latlong');
	var $geolocTable = 'geoloc';
	var $geolocColumn = array('resident_latlong');
	// var $memberTable = 'member';
	// var $memberColumn = array('resident_latlong');
	var $order = array('resident_id' => 'desc');

	public function _get_datatables_query() {

		$this->db->from($this->residentTable);

		$i = 0;

		foreach ($this->residentColumn as $item) {
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

				if (count($this->residentColumn) - 1 == $i) {
					//last loop
					$this->db->group_end();
				}
				//close bracket
			}
			$residentColumn[$i] = $item; // set residentColumn array variable to order processing
			$i++;
		}

		if (isset($_POST['order'])) {
			// here order processing
			$this->db->order_by($residentColumn[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
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
		return $this->db->insert_id();
	}

	public function update($where, $data) {
		$this->db->update($this->residentTable, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id) {
		$this->db->where('resident_id', $id);
		$this->db->delete($this->residentTable);
	}

	public function resCheck($name, $lname, $purok) {
        $qry = "SELECT count(*) as cnt from resident where name = " + $name + " AND lname = " + $lname + "";
        if ($qry > 0) {
            echo '1';
        } else {
            echo '0';
        }
    }
}
