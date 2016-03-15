<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InfoTable extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('inflector');
		$this->load->helper('date');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('googlemaps');
		$this->load->library('my_table');
		$this->load->Model('Login_model');
		$this->load->Model('Maps_model');
		$this->load->model('InfoTable_model');
	}

	public function index() {
		$this->Login_model->isLoggedIn();
		$this->load->view('Backend/page_ui_tables');
	}

	public function ajax_list() {
		$list = $this->InfoTable_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $resident) {
			$no++;
			$row = array();
			// $row[] = '';
			// $row[] = array('data' => '','class' => 'details-control');
			$row[] = $resident->name;
			$row[] = $resident->lname;
			$row[] = $resident->gender;
			$row[] = date('m/d/Y', strtotime($resident->bday));
			$row[] = $resident->age;
			$row[] = $resident->citizenship;
			$row[] = $resident->occupation;
			$row[] = $resident->status;
			$row[] = $resident->purok;
			// $row[] = $resident->resAddress;
			// $row[] = $resident->perAddress;
			// $row[] = $resident->telNum;
			// $row[] = $resident->cpNum;
			$row[] = $resident->resAddress;
			$row[] = $resident->perAddress;
			$row[] = $resident->telNum;
			$row[] = $resident->cpNum;

			//add html for action
			$row[] = '<div class="text-center"><a class="btn btn-sm btn-primary enable-tooltip" data-toggle="tooltip" href="javascript:void(0)" title="Edit Resident" onclick="edit_resident(' . "'" . $resident->resident_id . "'" . ')"><i class="fa fa-pencil"></i></a>
            <a class="btn btn-sm btn-danger enable-tooltip" data-toggle="tooltip" href="javascript:void(0)" title="Delete Resident" onclick="delete_resident(' . "'" . $resident->resident_id . "'" . ')"><i class="fa fa-times"></i></a></div>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->InfoTable_model->count_all(),
			"recordsFiltered" => $this->InfoTable_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id) {
		$data = $this->InfoTable_model->get_by_id($id);
		$data->bday = ($data->bday == '0000-00-00') ? '' : date('m/d/Y', strtotime($data->bday)); // if 0000-00-00 set to empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add() {
		if (checkRes() == true) {
			echo json_encode("Resident already exist!");
		} else {
			$this->_validate();
		$bday = $this->input->post('bday');
		$telNum = $this->input->post('telNum');
		$cpNum = $this->input->post('cpNum');

		if ($telNum == "" || $telNum == null) {
			$telNum = "N/A";
		} else if ($cpNum == "" || $cpNum == null) {
			$cpNum = "N/A";
		}

		$data = array(
			'name' => humanize($this->input->post('name')),
			'lname' => humanize($this->input->post('lname')),
			'gender' => humanize($this->input->post('gender')),
			'age' => humanize($this->input->post('age')),
			'bday' => date('Y-m-d', strtotime($bday)),
			'citizenship' => humanize($this->input->post('citizenship')),
			'occupation' => humanize($this->input->post('occupation')),
			'status' => humanize($this->input->post('status')),
			'purok' => humanize($this->input->post('purok')),
			'resAddress' => humanize($this->input->post('resAddress')),
			'perAddress' => humanize($this->input->post('perAddress')),
			'telNum' => $telNum,
			'cpNum' => $cpNum,
			'latlong' => $this->input->post('latlong'),
			'dateAdded' => date('Y-m-d H:i:s')
		);
		$insert = $this->InfoTable_model->save($data);
		echo json_encode(array("status" => TRUE));
		}
	}

	public function ajax_update() {
		$this->_validate();
		$bday = $this->input->post('bday');
		$telNum = $this->input->post('telNum');
		$cpNum = $this->input->post('cpNum');
		if ($telNum == "" || $telNum == null) {
			$telNum = "N/A";
		}
		if ($cpNum == "" || $cpNum == null) {
			$cpNum = "N/A";
		}
		$data = array(
			'name' => humanize($this->input->post('name')),
			'lname' => humanize($this->input->post('lname')),
			'gender' => humanize($this->input->post('gender')),
			'age' => humanize($this->input->post('age')),
			'bday' => date('Y-m-d', strtotime($bday)),
			'citizenship' => humanize($this->input->post('citizenship')),
			'occupation' => humanize($this->input->post('occupation')),
			'status' => humanize($this->input->post('status')),
			'purok' => humanize($this->input->post('purok')),
			'resAddress' => humanize($this->input->post('resAddress')),
			'perAddress' => humanize($this->input->post('perAddress')),
			'telNum' => $telNum,
			'cpNum' => $cpNum,
			'latlong' => $this->input->post('latlong'),
			'dateUpdated' => date('Y-m-d H:i:s')
		);
		$this->InfoTable_model->update(array('resident_id' => $this->input->post('resident_id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id) {
		$this->InfoTable_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate() {
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if ($this->input->post('name') == '') {
			$data['inputerror'][] = 'name';
			$data['error_string'][] = 'First Name is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('lname') == '') {
			$data['inputerror'][] = 'lname';
			$data['error_string'][] = 'Last Name is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('gender') == "") {
			$data['inputerror'][] = 'genderChoice';
			$data['error_string'][] = 'Gender is required';
			$data['status'] = FALSE;
		} else {
			$data['inputerror'][] = '';
			$data['error_string'][] = '';
			$data['status'] = TRUE;
		}

		if ($this->input->post('bday') == '') {
			$data['inputerror'][] = 'bday';
			$data['error_string'][] = 'Date of Birth is required';
			$data['status'] = FALSE;
		}

<<<<<<< HEAD
		if ($this->input->post('age') == null) {
			$data['inputerror'][] = 'age';
			$data['error_string'][] = 'Age is required';
			$data['status'] = FALSE;
		}
=======
		// if ($this->input->post('age') == null) {
		// 	$data['inputerror'][] = 'age';
		// 	$data['error_string'][] = 'Age is required';
		// 	$data['status'] = FALSE;
		// }
>>>>>>> 2a322e5146fb2ebc69ce889511b8ef355f100d61

		if ($this->input->post('citizenship') == '') {
			$data['inputerror'][] = 'citizenship';
			$data['error_string'][] = 'Citizenship is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('occupation') == '') {
			$data['inputerror'][] = 'occupation';
			$data['error_string'][] = 'Occupation is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('status') == '') {
			$data['inputerror'][] = 'status';
			$data['error_string'][] = 'Civil Status is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('purok') == '') {
			$data['inputerror'][] = 'purok';
			$data['error_string'][] = 'Designated Purok is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('resAddress') == '') {
			$data['inputerror'][] = 'resAddress';
			$data['error_string'][] = 'Residencial Addess is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('perAddress') == '') {
			$data['inputerror'][] = 'perAddress';
			$data['error_string'][] = 'Permanent Address is required';
			$data['status'] = FALSE;
		}

<<<<<<< HEAD
=======
		// if ($this->input->post('cpNum') == '') {
		// 	$data['inputerror'][] = 'cpNum';
		// 	$data['error_string'][] = 'Mobile # is required';
		// 	$data['status'] = FALSE;
		// }

>>>>>>> 2a322e5146fb2ebc69ce889511b8ef355f100d61
		if ($this->input->post('latlong') == '') {
			$data['inputerror'][] = 'latlong';
			$data['error_string'][] = 'Geolocation is required';
			$data['status'] = FALSE;
		}

		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}

<<<<<<< HEAD
	public function checkRes() {             
		if(isset($_POST)) {
            $name = $this->input->post('name');
            $lname = $this->input->post('lname');
            $purok = $this->input->post('purok');
            $this->InfoTable_model->resCheck($name, $lname, $purok); 
        }
	}
=======
	// public function checkRes() {             
	// 	if(isset($_POST)) {
 //            $name = $this->input->post('name');
 //            $lname = $this->input->post('lname');
 //            $purok = $this->input->post('purok');
 //            $this->InfoTable_model->resCheck($name, $lname, $purok); 
 //        }
	// }
>>>>>>> 2a322e5146fb2ebc69ce889511b8ef355f100d61

}
