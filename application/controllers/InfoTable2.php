<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InfoTable2 extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('inflector');
		$this->load->helper('date');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('googlemaps');
		//$this->load->model('InfoTable_model', 'resident');
                $this->load->model('InfoTable_model');
	}

	public function index() {
		$this->load->view('Backend/page_ui_tables2');
	}

	public function ajax_list() {
		$list = $this->InfoTable_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $resident) {
			$no++;
			$row = array();
			$row[] = $resident->name;
			$row[] = $resident->mname;
			$row[] = $resident->lname;
			$row[] = $resident->gender;
			$row[] = date('m/d/Y', strtotime($resident->bday));
			// $row[] = $resident->bday;
			$row[] = $resident->age;
			$row[] = $resident->citizenship;
			$row[] = $resident->occupation;
			$row[] = $resident->status;
			$row[] = $resident->purok;
			$row[] = $resident->resAddress;
			$row[] = $resident->perAddress;
			$row[] = $resident->email;
			$row[] = $resident->telNum;
			$row[] = $resident->cpNum;
//            $row[] = $resident->latlong;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit Resident" onclick="edit_resident(' . "'" . $resident->resident_id . "'" . ')"><i class="fa fa-pencil"></i></a>
            <a class="btn btn-sm btn-danger" href="javascript:void()" title="Delete Resident" onclick="delete_resident(' . "'" . $resident->resident_id . "'" . ')"><i class="fa fa-times"></i></a>';

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
		$this->_validate();
		$bday = $this->input->post('bday');
		$data = array(
			'name' => humanize($this->input->post('name')),
			'mname' => humanize($this->input->post('mname')),
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
			'email' => $this->input->post('email'),
			'telNum' => $this->input->post('telNum'),
			'cpNum' => $this->input->post('cpNum'),
			'latlong' => $this->input->post('latlong'),
		);
		$insert = $this->InfoTable_model->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update() {
		$this->_validate();
		$bday = $this->input->post('bday');
		$data = array(
			'name' => humanize($this->input->post('name')),
			'mname' => humanize($this->input->post('mname')),
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
			'email' => $this->input->post('email'),
			'telNum' => $this->input->post('telNum'),
			'cpNum' => $this->input->post('cpNum'),
			'latlong' => $this->input->post('latlong'),
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

		if ($this->input->post('mname') == '') {
			$data['inputerror'][] = 'mname';
			$data['error_string'][] = 'Middle Name is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('lname') == '') {
			$data['inputerror'][] = 'lname';
			$data['error_string'][] = 'Last Name is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('gender') == '') {
			$data['inputerror'][] = 'gender';
			$data['error_string'][] = 'Please select Gender';
			$data['status'] = FALSE;
		}

		if ($this->input->post('bday') == '') {
			$data['inputerror'][] = 'bday';
			$data['error_string'][] = 'Date of Birth is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('age') == '') {
			$data['inputerror'][] = 'age';
			$data['error_string'][] = 'Age is required';
			$data['status'] = FALSE;
		}

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

		if ($this->input->post('email') == '') {
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Email Address is required';
			$data['status'] = FALSE;
		}

		if ($this->input->post('cpNum') == '') {
			$data['inputerror'][] = 'cpNum';
			$data['error_string'][] = 'Mobile # is required';
			$data['status'] = FALSE;
		}

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

}
	