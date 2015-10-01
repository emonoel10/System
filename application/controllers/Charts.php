<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Charts extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('Backend/page_comp_charts');
    }

    public function getAgeRangeByMale() {
        $query = $this->db->query("SELECT
        SUM(IF(age < 20,1,0)) as 'Under 20',
        SUM(IF(age BETWEEN 20 and 29,1,0)) as '20 - 29',
        SUM(IF(age BETWEEN 30 and 39,1,0)) as '30 - 39',
        SUM(IF(age BETWEEN 40 and 49,1,0)) as '40 - 49',
        SUM(IF(age BETWEEN 50 and 59,1,0)) as '50 - 59',
        SUM(IF(age BETWEEN 60 and 69,1,0)) as '60 - 69',
        SUM(IF(age BETWEEN 70 and 79,1,0)) as '70 - 79',
        SUM(IF(age >= 80, 1, 0)) as 'Over 80',
        SUM(IF(age IS NULL, 1, 0)) as 'Not Filled In (NULL)'
        FROM resident as derived WHERE gender LIKE 'Male'");
        foreach ($query->result() as $totalAge) {
            echo json_encode($totalAge);
        }
    }
    
    public function getAgeRangeByFemale() {
        $query = $this->db->query("SELECT
        SUM(IF(age < 20,1,0)) as 'Under 20',
        SUM(IF(age BETWEEN 20 and 29,1,0)) as '20 - 29',
        SUM(IF(age BETWEEN 30 and 39,1,0)) as '30 - 39',
        SUM(IF(age BETWEEN 40 and 49,1,0)) as '40 - 49',
        SUM(IF(age BETWEEN 50 and 59,1,0)) as '50 - 59',
        SUM(IF(age BETWEEN 60 and 69,1,0)) as '60 - 69',
        SUM(IF(age BETWEEN 70 and 79,1,0)) as '70 - 79',
        SUM(IF(age >= 80, 1, 0)) as 'Over 80',
        SUM(IF(age IS NULL, 1, 0)) as 'Not Filled In (NULL)'
        FROM resident as derived WHERE gender LIKE 'Female'");
        foreach ($query->result() as $totalAge) {
            echo json_encode($totalAge);
        }
    }
    
    public function getPopulationByPurok() {
        $query = $this->db->query("SELECT
        SUM(IF(purok = 'Atis',1,0)) as 'Prk. Atis',
        SUM(IF(purok = 'Avocado',1,0)) as 'Prk. Avocado',
        SUM(IF(purok = 'Bayabas',1,0)) as 'Prk. Bayabas',
        SUM(IF(purok = 'Boongon',1,0)) as 'Prk. Boongon',
        SUM(IF(purok = 'Chico',1,0)) as 'Prk. Chico',
        SUM(IF(purok = 'Durian',1,0)) as 'Prk. Durian',
        SUM(IF(purok = 'Guyabano',1,0)) as 'Prk. Guyabano',
        SUM(IF(purok = 'Kaimito',1,0)) as 'Prk. Kaimito',
        SUM(IF(purok = 'Kasoy',1,0)) as 'Prk. Kasoy',
        SUM(IF(purok = 'Lanzones',1,0)) as 'Prk. Lanzones',
        SUM(IF(purok = 'Lomboy',1,0)) as 'Prk. Lomboy',
        SUM(IF(purok = 'Mabolo',1,0)) as 'Prk. Mabolo',
        SUM(IF(purok = 'Macopa',1,0)) as 'Prk. Macopa',
        SUM(IF(purok = 'Mangga',1,0)) as 'Prk. Mangga',
        SUM(IF(purok = 'Mangosteen',1,0)) as 'Prk. Mangosteen',
        SUM(IF(purok = 'Mansanas',1,0)) as 'Prk. Mansanas',
        SUM(IF(purok = 'Marang',1,0)) as 'Prk. Marang',
        SUM(IF(purok = 'Marang Joesil',1,0)) as 'Prk. Marang Joesil',
        SUM(IF(purok = 'Melon',1,0)) as 'Prk. Melon',
        SUM(IF(purok = 'Nangka',1,0)) as 'Prk. Nangka',
        SUM(IF(purok = 'Pomelo',1,0)) as 'Prk. Pomelo',
        SUM(IF(purok = 'Rambutan',1,0)) as 'Prk. Rambutan',
        SUM(IF(purok = 'Santol',1,0)) as 'Prk. Santol',
        SUM(IF(purok = 'Sereguellas',1,0)) as 'Prk. Sereguellas',
        SUM(IF(purok = 'Sunkist',1,0)) as 'Prk. Sunkist',
        SUM(IF(purok = 'Tambis',1,0)) as 'Prk. Tambis',
        SUM(IF(purok = 'Ubas',1,0)) as 'Prk. Ubas',
        SUM(IF(purok = 'Fishpond/Sea wall',1,0)) as 'Fishpond/Sea wall'
        FROM resident as derived");
        foreach ($query->result() as $totalPopulationPurok) {
            echo json_encode($totalPopulationPurok);
        }
    }

    public function getTotalPopulation() {
        $query = $this->db->query("SELECT COUNT(*) FROM resident");
        foreach ($query->result() as $totalPopulation) {
            echo json_encode($totalPopulation);
        }
    }

}
