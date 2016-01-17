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
		$this->fpdf->Write(40, 10, $this->input->post("fnamePrint"), 0, 1, 'C');
		$this->fpdf->Write(40, 10, $this->input->post("nnamePrint"), 0, 1, 'C');
		$this->fpdf->Write(40, 10, $this->input->post("statusPrint"), 0, 1, 'C');
		$this->fpdf->Cell(40, 10, $this->input->post("bdayPrint"), 0, 1, 'C');
		$this->fpdf->Cell(40, 10, $this->input->post("bPlacePrint"), 0, 1, 'C');
		$this->fpdf->Cell(40, 10, $this->input->post("comAddressPrint"), 0, 1, 'C');
		$this->fpdf->Cell(40, 10, $this->input->post("yearPresentAddressPrint"), 0, 1, 'C');
		$this->fpdf->Cell(40, 10, $this->input->post("purposePrint"), 0, 1, 'C');
		$this->fpdf->Cell(40, 10, 'Hello World!');

		echo $this->fpdf->Output();
	}

}
