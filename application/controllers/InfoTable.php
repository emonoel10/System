<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Infotable extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
    }

    public function index() {
        $crud = new grocery_CRUD();

        $crud->set_subject('Resident');
        $crud->set_table('resident');
        $crud->set_theme('datatables');
        $crud->columns('name', 'mname', 'lname', 'gender', 'bday', 'age', 'citizenship', 'occupation', 'status', 'purok', 'resAddress', 'perAddress', 'email', 'telNum', 'cpNum');
        $crud->set_primary_key('resident_id', 'resident');

        $crud->display_as('name', 'First Name')
                ->display_as('mname', 'Middle Name')
                ->display_as('lname', 'Last Name')
                ->display_as('gender', 'Gender')
                ->display_as('bday', 'Birthdate')
                ->display_as('age', 'Age')
                ->display_as('citizenship', 'Citizenship')
                ->display_as('occupation', 'Occupation')
                ->display_as('status', 'Status')
                ->display_as('purok', 'Purok')
                ->display_as('resAddress', 'Residential Address')
                ->display_as('perAddress', 'Permanent Address')
                ->display_as('email', 'Email Address')
                ->display_as('telNum', 'Tel. #')
                ->display_as('cpNum', 'Cellphone #');

        $output = $crud->render();

        $this->_example_output($output);
    }

    function _example_output($output = null) {
        $this->load->view('Backend/page_ui_tables', $output);
    }

}
