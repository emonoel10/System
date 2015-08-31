<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->Model('Login_model');
    }

    public function index() {
        $this->Login_model->isLoggedIn();
        $this->load->view('Backend/page_comp_maps');
    }

}
