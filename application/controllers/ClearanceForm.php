<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ClearanceForm extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->view('Frontend/clearance');
	}

	public function submitClearance() {
		$this->load->library('fpdf_gen');

		$this->fpdf->SetFont('Arial', 'B', 16);
		$this->fpdf->Cell(40, 10, $this->input->post("fnamePrint"));
		$this->fpdf->Cell(40, 10, $this->input->post("nnamePrint"));
		$this->fpdf->Cell(40, 10, $this->input->post("statusPrint"));
		$this->fpdf->Cell(40, 10, $this->input->post("bdayPrint"));
		$this->fpdf->Cell(40, 10, $this->input->post("bPlacePrint"));
		$this->fpdf->Cell(40, 10, $this->input->post("comAddressPrint"));
		$this->fpdf->Cell(40, 10, $this->input->post("yearPresentAddressPrint"));
		$this->fpdf->Cell(40, 10, $this->input->post("purposePrint"));
		$this->fpdf->Cell(40, 10, 'Hello World!');

		echo $this->fpdf->Output();
	}

}
