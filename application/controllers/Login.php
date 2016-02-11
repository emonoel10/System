<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->Model('Login_model');
	}

	public function index() {
		$this->load->view('Backend/page_ready_login');
	}

	public function login() {
		$username = $this->input->post('login-username');
		$password = $this->input->post('login-password');

		if (!$this->Login_model->login($username, $password)) {
			redirect(base_url() . 'Charts');
		} else {
			// redirect(base_url() . 'Login');
		}
	}

//    public function __construct() {
	//        parent::__construct();
	//        $this->load->helper('form');
	//        $this->load->helper('url');
	//        $this->load->helper('html');
	//    }
	//
	//    public function index() {
	//        $data['error'] = false;
	//        $result = $data['error'];
	//        if ($_POST) {
	//            $this->load->model('Login_model');
	//            $username = $this->input->post('login-username', true);
	//            $password = $this->input->post('login-password', true);
	//            $user = $this->Login_model->login($username, $password);
	//            if (!$user && $user == null) {
	//                $data['error'] = true; //throwing boolean value to make error html tag
	//                $result = array('status' => true);
	//                json_encode($result);
	//            } else {
	//                $data['error'] = false;
	//                $this->session->set_userdata('username', $user['usename']);
	//                $this->session->set_userdata('password', $user['password']);
	//                redirect(base_url() . 'Maps');
	//            }
	//        }
	//        $this->load->view('Backend/page_ready_login', $data);
	//    }

	function logout() {
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
		exit;
	}
}
