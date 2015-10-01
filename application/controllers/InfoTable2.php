<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InfoTable2 extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('googlemaps');
        $this->load->model('InfoTable_model');
    }

    public function index() {
        $data['sql'] = $this->InfoTable_model->getList();
        $this->load->view('Backend/page_ui_tables2', $data);
    }

    

}
