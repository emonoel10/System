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

        $crud->set_crud_url_path('/InfoTable', '/InfoTable');

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

    public function add() {
        $crud = new grocery_CRUD();

        $crud->set_js('assets/Backend/js/vendor/bootstrap.min.js');
        $crud->set_js('assets/Backend/js/plugins.js');
        $crud->set_js('assets/Backend/js/app.js');
        $crud->set_js('assets/Backend/js/vendor/jquery-2.1.1.min.js');
        $crud->set_css('assets/Backend/css/animate.min.css');
        $crud->set_css('assets/Backend/css/bootstrap.min.css');
        $crud->set_css('assets/Backend/css/main.css');
        $crud->set_css('assets/Backend/css/plugins.css');
        $crud->set_css('assets/Backend/css/themes.css');
        $crud->unset_jquery();
//        $crud->unset_jquery_ui();
        $crud->set_subject('Resident');
        $crud->set_table('resident');
        $crud->set_theme('datatables');

        $crud->set_crud_url_path('/InfoTable/index', '/InfoTable');
//        $crud->set_crud_url_path('/Maps', '/Maps');
//        $crud->set_crud_url_path('/InfoTable', '/InfoTable');

        $crud->required_fields('First Name', 'Middle Name', 'Last Name', 'Gender', 'Birthdate', 'Age', 'Citizenship', 'Occupation', 'Status', 'Purok', 'Residential Address', 'Permanent Address', 'Email Address', 'Telephone #', 'Cellphone #');
        $crud->add_fields('First Name', 'Middle Name', 'Last Name', 'Gender', 'Birthdate', 'Age', 'Citizenship', 'Occupation', 'Status', 'Purok', 'Residential Address', 'Permanent Address', 'Email Address', 'Telephone #', 'Cellphone #');
        $crud->set_rules('First Name');
        $crud->callback_add_field('Residential Address', function () {
            return '<textarea name="Residential Address" rows="7" cols="50" class="form-control" placeholder="in Full Address Format..."></textarea>';
        });
        $crud->callback_add_field('Permanent Address', function () {
            return '<textarea name="Permanent Address" rows="7" cols="50" class="form-control" placeholder="in Full Address Format..."></textarea>';
        });
        $crud->callback_add_field('Email Address', function () {
            return '<input type="email" name="Email Address" class="form-control" style="width: 300%;"></input>';
        });
        $crud->callback_add_field('Telephone #', function () {
            return '<input type="tel" name="Telephone #" class="form-control" style="width: 300%;"></input>';
        });
        $crud->callback_add_field('Cellphone #', function () {
            return '<input type="tel" name="Cellphone #" class="form-control" style="width: 300%;"></input>';
        });
        $crud->callback_add_field('Gender', function() {
            return '<input type="radio" name="Gender" value="male" /> Male <input type="radio" name="Gender" value="female" /> Female';
        });
        $crud->callback_add_field('Birthdate', function () {
            return '<input type="text" name="Birthdate" class="form-control input-datepicker" data-date-format="mm-dd-yyyy">';
        });
        $crud->change_field_type('Status', 'dropdown', array('1' => 'Single', '2' => 'Married', '3' => 'Separated', '4' => 'Widowed', '5' => 'Divorced'));

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
                ->display_as('telNum', 'Telephone #')
                ->display_as('cpNum', 'Cellphone #');

        $output = $crud->render();

        $this->_example_output_crud($output);
    }
    
    public function insert() {
        $crud = new grocery_CRUD();

        $crud->set_js(base_url() . 'assets/Backend/js/vendor/bootstrap.min.js');
        $crud->set_js('assets/Backend/js/plugins.js');
        $crud->set_js('assets/Backend/js/app.js');
        $crud->set_js('assets/Backend/js/vendor/jquery-2.1.1.min.js');
        $crud->set_css('assets/Backend/css/animate.min.css');
        $crud->set_css('assets/Backend/css/bootstrap.min.css');
        $crud->set_css('assets/Backend/css/main.css');
        $crud->set_css('assets/Backend/css/plugins.css');
        $crud->set_css('assets/Backend/css/themes.css');

        $crud->set_subject('Resident');
        $crud->set_table('resident');
        $crud->set_theme('datatables');

        $crud->set_crud_url_path('/InfoTable/index', '/InfoTable');
//        $crud->set_crud_url_path('/Maps', '/Maps');
//        $crud->set_crud_url_path('/InfoTable', '/InfoTable');

//        $crud->required_fields('First Name', 'Middle Name', 'Last Name', 'Gender', 'Birthdate', 'Age', 'Citizenship', 'Occupation', 'Status', 'Purok', 'Residential Address', 'Permanent Address', 'Email Address', 'Telephone #', 'Cellphone #');
//        $crud->add_fields('First Name', 'Middle Name', 'Last Name', 'Gender', 'Birthdate', 'Age', 'Citizenship', 'Occupation', 'Status', 'Purok', 'Residential Address', 'Permanent Address', 'Email Address', 'Telephone #', 'Cellphone #');
//        $crud->set_rules('First Name');
//        $crud->callback_add_field('Residential Address', function () {
//            return '<textarea name="Residential Address" rows="7" cols="50" class="form-control" placeholder="in Full Address Format..."></textarea>';
//        });
//        $crud->callback_add_field('Permanent Address', function () {
//            return '<textarea name="Permanent Address" rows="7" cols="50" class="form-control" placeholder="in Full Address Format..."></textarea>';
//        });
//        $crud->callback_add_field('Email Address', function () {
//            return '<input type="email" name="Email Address" class="form-control" style="width: 300%;"></input>';
//        });
//        $crud->callback_add_field('Telephone #', function () {
//            return '<input type="tel" name="Telephone #" class="form-control" style="width: 300%;"></input>';
//        });
//        $crud->callback_add_field('Cellphone #', function () {
//            return '<input type="tel" name="Cellphone #" class="form-control" style="width: 300%;"></input>';
//        });
//        $crud->callback_add_field('Gender', function() {
//            return '<input type="radio" name="Gender" value="male" /> Male <input type="radio" name="Gender" value="female" /> Female';
//        });
//        $crud->callback_add_field('Birthdate', function () {
//            return '<input type="text" name="Birthdate" class="form-control input-datepicker" data-date-format="mm-dd-yyyy">';
//        });
//        $crud->change_field_type('Status', 'dropdown', array('1' => 'Single', '2' => 'Married', '3' => 'Separated', '4' => 'Widowed', '5' => 'Divorced'));
//
//        $crud->display_as('name', 'First Name')
//                ->display_as('mname', 'Middle Name')
//                ->display_as('lname', 'Last Name')
//                ->display_as('gender', 'Gender')
//                ->display_as('bday', 'Birthdate')
//                ->display_as('age', 'Age')
//                ->display_as('citizenship', 'Citizenship')
//                ->display_as('occupation', 'Occupation')
//                ->display_as('status', 'Status')
//                ->display_as('purok', 'Purok')
//                ->display_as('resAddress', 'Residential Address')
//                ->display_as('perAddress', 'Permanent Address')
//                ->display_as('email', 'Email Address')
//                ->display_as('telNum', 'Telephone #')
//                ->display_as('cpNum', 'Cellphone #');
//
        $output = $crud->render();

        $this->_example_output_crud($output);
    }
    
    public function edit() {
        $crud = new grocery_CRUD();
        
        $crud->unset_jquery();
        $crud->unset_jquery_ui();
        
        $crud->set_js('assets/Backend/js/vendor/bootstrap.min.js');
        $crud->set_js('assets/Backend/js/plugins.js');
        $crud->set_js('assets/Backend/js/app.js');
        $crud->set_js('assets/Backend/js/vendor/jquery-2.1.1.min.js');
        $crud->set_css('assets/Backend/css/animate.min.css');
        $crud->set_css('assets/Backend/css/bootstrap.min.css');
        $crud->set_css('assets/Backend/css/main.css');
        $crud->set_css('assets/Backend/css/plugins.css');
        $crud->set_css('assets/Backend/css/themes.css');

        $crud->set_subject('Resident');
        $crud->set_table('resident');
        $crud->set_theme('datatables');

        $crud->set_crud_url_path('/InfoTable/add', '/InfoTable');
        $crud->set_crud_url_path('/Maps', '/Maps');
        $crud->set_crud_url_path('/InfoTable', '/InfoTable');

        $crud->required_fields('First Name', 'Middle Name', 'Last Name', 'Gender', 'Birthdate', 'Age', 'Citizenship', 'Occupation', 'Status', 'Purok', 'Residential Address', 'Permanent Address', 'Email Address', 'Telephone #', 'Cellphone #');
//        $crud->edit_fields('First Name', 'Middle Name', 'Last Name', 'Gender', 'Birthdate', 'Age', 'Citizenship', 'Occupation', 'Status', 'Purok', 'Residential Address', 'Permanent Address', 'Email Address', 'Telephone #', 'Cellphone #');
        $crud->callback_edit_field('Residential Address', function () {
            return '<textarea name="Residential Address" rows="7" cols="50" class="form-control" placeholder="in Full Address Format..."></textarea>';
        });
        $crud->callback_edit_field('Permanent Address', function () {
            return '<textarea name="Permanent Address" rows="7" cols="50" class="form-control" placeholder="in Full Address Format..."></textarea>';
        });
        $crud->callback_edit_field('Email Address', function () {
            return '<input type="email" name="Email Address" class="form-control"></input>';
        });
        $crud->callback_edit_field('Telephone #', function () {
            return '<input type="tel" name="Telephone #" class="form-control"></input>';
        });
        $crud->callback_edit_field('Cellphone #', function () {
            return '<input type="tel" name="Cellphone #" class="form-control"></input>';
        });
        $crud->callback_edit_field('Gender', function() {
            return '<input type="radio" name="Gender" value="male" /> Male <input type="radio" name="Gender" value="female" /> Female';
        });
        $crud->callback_edit_field('Birthdate', function () {
            return '<input type="text" name="Birthdate" class="form-control input-datepicker" data-date-format="yyyy-mm-dd">';
        });
        $crud->change_field_type('Status', 'dropdown', array('1' => 'Single', '2' => 'Married', '3' => 'Separated', '4' => 'Widowed', '5' => 'Divorced'));
         
        
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
                ->display_as('telNum', 'Telephone #')
                ->display_as('cpNum', 'Cellphone #');

        $output = $crud->render();

        $this->_example_output_crud($output);
    }
    
    public function read(){
        $crud = new grocery_CRUD();

        $crud->set_js('assets/Backend/js/vendor/bootstrap.min.js');
        $crud->set_js('assets/Backend/js/plugins.js');
        $crud->set_js('assets/Backend/js/app.js');
        $crud->set_js('assets/Backend/js/vendor/jquery-2.1.1.min.js');
        $crud->set_css('assets/Backend/css/animate.min.css');
        $crud->set_css('assets/Backend/css/bootstrap.min.css');
        $crud->set_css('assets/Backend/css/main.css');
        $crud->set_css('assets/Backend/css/plugins.css');
        $crud->set_css('assets/Backend/css/themes.css');

        $crud->set_subject('Resident');
        $crud->set_table('resident');
        $crud->set_theme('datatables');

        $crud->set_crud_url_path('InfoTable/index', 'InfoTable');
        $crud->set_crud_url_path('Maps', '/Maps');
        $crud->set_crud_url_path('InfoTable', '/InfoTable');
        
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
                ->display_as('telNum', 'Telephone #')
                ->display_as('cpNum', 'Cellphone #');

        $output = $crud->render();

        $this->_example_output_crud($output);
    }

    function _example_output($output = null) {
        $this->load->view('Backend/page_ui_tables', $output);
    }
    
    function _example_output_crud($output = null) {
        $this->load->view('Backend/page_ui_crudOp', $output);
    }

}
