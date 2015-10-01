<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Infotable extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        $this->load->model('grocery_crud_model');
        $this->load->library('googlemaps');
    }

    public function index() {
        $crud = new grocery_CRUD();

        $crud->set_subject('Resident');
        $crud->set_table('resident');
        $crud->set_theme('datatables');
        $crud->columns('name', 'mname', 'lname', 'gender', 'bday', 'age', 'citizenship', 'occupation', 'status', 'purok', 'resAddress', 'perAddress', 'email', 'telNum', 'cpNum');
        $crud->required_fields('name', 'mname', 'lname', 'gender', 'bday', 'age', 'citizenship', 'occupation', 'status', 'purok', 'resAddress', 'cpNum', 'latlong');
        
        $crud->set_primary_key('resident_id');
        $crud->unset_export();
        $crud->unset_print();

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
                ->display_as('cpNum', 'Cellphone #')
                ->display_as('latlong', 'Geolocation');

        $output = $crud->render();

        $this->_example_output($output);
    }

    public function add() {
        $crud = new grocery_CRUD();
        
        $crud->set_css('assets/Backend/css/animate.min.css');
        $crud->set_css('assets/Backend/css/bootstrap.min.css');
        $crud->set_css('assets/Backend/css/main.css');
        $crud->set_css('assets/Backend/css/plugins.css');
        $crud->set_css('assets/Backend/css/themes.css');
        $crud->set_js('assets/Backend/js/vendor/jquery-2.1.4.min.js');
        $crud->set_js('assets/Backend/js/vendor/bootstrap.min.js');
        $crud->set_js('assets/Backend/js/vendor/alertify.min.js');
        $crud->set_js('assets/Backend/js/plugins.js');
        $crud->set_js('assets/Backend/js/app.js');

        $crud->set_subject('Resident');
        $crud->set_table('resident');
        $crud->set_theme('datatables');
        $crud->set_primary_key('resident_id', 'resident');

        $crud->set_crud_url_path('/InfoTable/index', '/InfoTable');

        $crud->required_fields('latlong', 'name', 'mname', 'lname', 'gender', 'bday', 'age', 'citizenship', 'occupation', 'status', 'purok', 'resAddress', 'perAddress', 'email', 'cpNum');
        
        $crud->add_fields('latlong', 'name', 'mname', 'lname', 'gender', 'bday', 'age', 'citizenship', 'occupation', 'status', 'purok', 'resAddress', 'perAddress', 'email', 'telNum', 'cpNum');
        
        $crud->callback_add_field('name', function () {
            return '<input type="text" name="name" class="form-control"></input>';
        });
        $crud->callback_add_field('resAddress', function () {
            return '<textarea name="resAddress" id="resAddress" rows="7" cols="50" class="form-control" placeholder="in Full Address Format..."></textarea>';
        });
        $crud->callback_add_field('perAddress', function () {
            return '<textarea name="perAddress" id="perAddress" rows="7" cols="50" class="form-control" placeholder="in Full Address Format..."></textarea>';
        });
        $crud->callback_add_field('age', function () {
            return '<input readonly type="text" id="age" name="age" class="form-control"></input>';
        });
        $crud->callback_add_field('bday', function () {
            return '<input type="date" id="bday" name="bday" class="form-control" onchange="ageCount()">';
        });
        $crud->callback_add_field('email', function () {
            return '<input type="email" name="email" class="form-control"></input>';
        });
        $crud->callback_add_field('gender', function () {
            return '<input type="radio" name="gender" value="Male"> Male </input> <input type="radio" name="gender" value="Female"> Female </input>';
        });
        $crud->callback_add_field('purok', function () {
            return '<select name="purok" id="purok" class="form-control select-select2" onchange="fillAddress()">
                        <option></option>
                        <option value="Atis">Atis</option>
                        <option value="Avocado">Avocado</option>
                        <option value="Bayabas">Bayabas</option>
                        <option value="Boongon">Boongon</option>
                        <option value="Chico">Chico</option>
                        <option value="Durian">Durian</option>
                        <option value="Guyabano">Guyabano</option>
                        <option value="Kaimito">Kaimito</option>
                        <option value="Kasoy">Kasoy</option>
                        <option value="Lanzones">Lanzones</option>
                        <option value="Lomboy">Lomboy</option>
                        <option value="Mabolo">Mabolo</option>
                        <option value="Macopa">Macopa</option>
                        <option value="Mangga">Mangga</option>
                        <option value="Mangosteen">Mangosteen</option>
                        <option value="Mansanas">Mansanas</option>
                        <option value="Marang">Marang</option>
                        <option value="Marang Joesil">Marang Joesil</option>
                        <option value="Melon">Melon</option>
                        <option value="Nangka">Nangka</option>
                        <option value="Pomelo">Pomelo</option>
                        <option value="Rambutan">Rambutan</option>
                        <option value="Santol">Santol</option>
                        <option value="Sereguellas">Sereguellas</option>
                        <option value="Sunkist">Sunkist</option>
                        <option value="Tambis">Tambis</option>
                        <option value="Ubas">Ubas</option>
                        <option value="Fishpond/Sea wall">Fishpond/Sea wall</option>
                    </select>';
        });
        $crud->callback_add_field('status', function () {
            return '<select name="status" class="form-control select-select2">
                        <option></option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Separated">Separated</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
                    </select>';
        });
        $crud->callback_add_field('telNum', function () {
            return '<input type="tel" name="telNum" class="form-control"></input>';
        });
        $crud->callback_add_field('cpNum', function () {
            return '<input type="tel" name="cpNum" class="form-control"></input>';
        });
        $crud->callback_add_field('latlong', function () {
            return '<input readonly type="text" id="grid" name="latlong" class="form-control"></input>';
        });
//        $crud->field_type('age', 'invisible');
//        $crud->field_type('latlong', 'invisible');
//        $crud->change_field_type('Status', 'dropdown', array('1' => 'Single', '2' => 'Married', '3' => 'Separated', '4' => 'Widowed', '5' => 'Divorced'));
//        $crud->field_type('Status','dropdown',array('1' => 'Single', '2' => 'Married', '3' => 'Separated', '4' => 'Widowed', '5' => 'Divorced'));

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
                ->display_as('cpNum', 'Cellphone #')
                ->display_as('latlong', 'Geolocation');

        $output = $crud->render();

        $this->_example_output_crud($output);
    }

//    public function insert() {
//        $crud = new grocery_CRUD();
//
//        $crud->set_js('assets/Backend/js/vendor/bootstrap.min.js');
//        $crud->set_js('assets/Backend/js/plugins.js');
//        $crud->set_js('assets/Backend/js/app.js');
//        $crud->set_js('assets/Backend/js/vendor/jquery-2.1.1.min.js');
//        $crud->set_css('assets/Backend/css/animate.min.css');
//        $crud->set_css('assets/Backend/css/bootstrap.min.css');
//        $crud->set_css('assets/Backend/css/main.css');
//        $crud->set_css('assets/Backend/css/plugins.css');
//        $crud->set_css('assets/Backend/css/themes.css');
//
//        $crud->set_subject('Resident');
//        $crud->set_table('resident');
//        $crud->set_theme('datatables');
//
//        $crud->set_crud_url_path('/InfoTable', '/InfoTable');
//        
//        $output = $crud->render();
//
//        $this->_example_output_crud($output);
//    }

    public function edit() {
        $crud = new grocery_CRUD();

        $crud->set_css('assets/Backend/css/animate.min.css');
        $crud->set_css('assets/Backend/css/bootstrap.min.css');
        $crud->set_css('assets/Backend/css/main.css');
        $crud->set_css('assets/Backend/css/plugins.css');
        $crud->set_css('assets/Backend/css/themes.css');
        $crud->set_js('assets/Backend/js/vendor/jquery-2.1.4.min.js');
        $crud->set_js('assets/Backend/js/vendor/bootstrap.min.js');
        $crud->set_js('assets/Backend/js/vendor/alertify.min.js');
        $crud->set_js('assets/Backend/js/plugins.js');
        $crud->set_js('assets/Backend/js/app.js');

        $crud->set_subject('Resident');
        $crud->set_table('resident');
        $crud->set_theme('datatables');
        $crud->set_primary_key('resident_id', 'resident');
//        $crud->set_relation('resident_id','geoloc');
//        $crud->set_relation('name','geoloc','First Name');
//        $crud->set_relation('mname','geoloc','Middle Name');
//        $crud->set_relation('lname','geoloc','Last Name');

        $crud->set_crud_url_path('/InfoTable/index', '/InfoTable');

        $crud->required_fields('latlong', 'name', 'mname', 'lname', 'gender', 'bday', 'age', 'citizenship', 'occupation', 'status', 'purok', 'resAddress', 'perAddress', 'email', 'cpNum');
        
        $crud->edit_fields('latlong', 'name', 'mname', 'lname', 'gender', 'bday', 'age', 'citizenship', 'occupation', 'status', 'purok', 'resAddress', 'perAddress', 'email', 'telNum', 'cpNum');
        
        $crud->callback_edit_field('name', function () {
            return '<input type="text" name="name" class="form-control"></input>';
        });
        $crud->callback_edit_field('resAddress', function () {
            return '<textarea name="resAddress" id="resAddress" rows="7" cols="50" class="form-control" placeholder="in Full Address Format..."></textarea>';
        });
        $crud->callback_edit_field('perAddress', function () {
            return '<textarea name="perAddress" id="perAddress" rows="7" cols="50" class="form-control" placeholder="in Full Address Format..."></textarea>';
        });
        $crud->callback_edit_field('age', function () {
            return '<input readonly type="text" id="age" name="age" class="form-control"></input>';
        });
        $crud->callback_edit_field('bday', function () {
            return '<input type="date" id="bday" name="bday" class="form-control" onchange="ageCount()">';
        });
        $crud->callback_edit_field('email', function () {
            return '<input type="email" name="email" class="form-control"></input>';
        });
        $crud->callback_edit_field('gender', function () {
            return '<input type="radio" name="gender" value="Male"> Male </input> <input type="radio" name="gender" value="Female"> Female </input>';
        });
        $crud->callback_edit_field('purok', function () {
            return '<select name="purok" id="purok" class="form-control select-select2" onchange="fillAddress()">
                        <option></option>
                        <option value="Atis">Atis</option>
                        <option value="Avocado">Avocado</option>
                        <option value="Bayabas">Bayabas</option>
                        <option value="Boongon">Boongon</option>
                        <option value="Chico">Chico</option>
                        <option value="Durian">Durian</option>
                        <option value="Guyabano">Guyabano</option>
                        <option value="Kaimito">Kaimito</option>
                        <option value="Kasoy">Kasoy</option>
                        <option value="Lanzones">Lanzones</option>
                        <option value="Lomboy">Lomboy</option>
                        <option value="Mabolo">Mabolo</option>
                        <option value="Macopa">Macopa</option>
                        <option value="Mangga">Mangga</option>
                        <option value="Mangosteen">Mangosteen</option>
                        <option value="Mansanas">Mansanas</option>
                        <option value="Marang">Marang</option>
                        <option value="Marang Joesil">Marang Joesil</option>
                        <option value="Melon">Melon</option>
                        <option value="Nangka">Nangka</option>
                        <option value="Pomelo">Pomelo</option>
                        <option value="Rambutan">Rambutan</option>
                        <option value="Santol">Santol</option>
                        <option value="Sereguellas">Sereguellas</option>
                        <option value="Sunkist">Sunkist</option>
                        <option value="Tambis">Tambis</option>
                        <option value="Ubas">Ubas</option>
                        <option value="Fishpond/Sea wall">Fishpond/Sea wall</option>
                    </select>';
        });
        $crud->callback_edit_field('status', function () {
            return '<select name="status" class="form-control select-select2">
                        <option></option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Separated">Separated</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
                    </select>';
        });
        $crud->callback_edit_field('telNum', function () {
            return '<input type="tel" name="telNum" class="form-control"></input>';
        });
        $crud->callback_edit_field('cpNum', function () {
            return '<input type="tel" name="cpNum" class="form-control"></input>';
        });
        $crud->callback_edit_field('latlong', function () {
            return '<input readonly type="text" id="grid" name="latlong" class="form-control"></input>';
        });
//        $crud->field_type('age', 'invisible');
//        $crud->field_type('latlong', 'invisible');
//        $crud->change_field_type('Status', 'dropdown', array('1' => 'Single', '2' => 'Married', '3' => 'Separated', '4' => 'Widowed', '5' => 'Divorced'));
//        $crud->field_type('Status','dropdown',array('1' => 'Single', '2' => 'Married', '3' => 'Separated', '4' => 'Widowed', '5' => 'Divorced'));

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
                ->display_as('cpNum', 'Cellphone #')
                ->display_as('latlong', 'Geolocation');

        $output = $crud->render();

        $this->_example_output_crud($output);
    }

    public function read() {
        $crud = new grocery_CRUD();

        $crud->set_css('assets/Backend/css/animate.min.css');
        $crud->set_css('assets/Backend/css/bootstrap.min.css');
        $crud->set_css('assets/Backend/css/main.css');
        $crud->set_css('assets/Backend/css/plugins.css');
        $crud->set_css('assets/Backend/css/themes.css');
        $crud->set_js('assets/Backend/js/vendor/jquery-2.1.4.min.js');
        $crud->set_js('assets/Backend/js/vendor/bootstrap.min.js');
        $crud->set_js('assets/Backend/js/vendor/alertify.min.js');
        $crud->set_js('assets/Backend/js/plugins.js');
        $crud->set_js('assets/Backend/js/app.js');

        $crud->set_subject('Resident');
        $crud->set_table('resident');
        $crud->set_theme('datatables');
        $crud->set_primary_key('resident_id');

        $crud->display_as('latlong', 'Geolocation')
                ->display_as('name', 'First Name')
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
