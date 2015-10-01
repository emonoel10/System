<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InfoTable_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getList() {
        $sql = $this->db->query("SELECT * FROM resident");
        return $sql;
    }
}
