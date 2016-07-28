<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FrontMap extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->Model('Maps_model');
	}

	public function index() {
		$this->load->view('Frontend/map');
	}

}
