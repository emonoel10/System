<?php

class Maps_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getMapSearchDataResult($searchData) {
//        $this->db->like('name', $searchData);
//        $this->db->like('mname', $searchData);
//        $this->db->like('lname', $searchData);
//        $this->db->like('gender', $searchData);
//        $this->db->like('age', $searchData);
//        $this->db->like('bday', $searchData);
//        $this->db->like('citizenship', $searchData);
//        $this->db->like('occupation', $searchData);
//        $this->db->like('status', $searchData);
//        $this->db->like('purok', $searchData);
//        $this->db->like('resAddress', $searchData);
//        $this->db->like('perAddress', $searchData);
//        $this->db->like('email', $searchData);
//        $this->db->like('telNum', $searchData);
//        $this->db->like('cpNum', $searchData);
//        $this->db->like('latlong', $searchData);
        $query = $this->db->select()->from('resident')->like($searchData);
        return $query->result();
//        if ($query->num_rows() > 0) {
//            $output = "'<ul>'";
//            foreach ($query->result() as $searchResult) {
//                $output .= "<li>". $searchResult->name ."</li>";
//                $output .= "<li>". $searchResult->mname ."</li>";
//                $output .= "<li>". $searchResult->lname ."</li>";
//                $output .= "<li>". $searchResult->gender ."</li>";
//                $output .= "<li>". $searchResult->age ."</li>";
//                $output .= "<li>". $searchResult->bday ."</li>";
//                $output .= "<li>". $searchResult->citizenship ."</li>";
//                $output .= "<li>". $searchResult->occupation ."</li>";
//                $output .= "<li>". $searchResult->status ."</li>";
//                $output .= "<li>". $searchResult->purok ."</li>";
//                $output .= "<li>". $searchResult->resAddress ."</li>";
//                $output .= "<li>". $searchResult->perAddress ."</li>";
//                $output .= "<li>". $searchResult->email ."</li>";
//                $output .= "<li>". $searchResult->telNum ."</li>";
//                $output .= "<li>". $searchResult->cpNum ."</li>";
//                $output .= "<li>". $searchResult->latlong ."</li>";
//            }
//            $output .= "'</ul>'";
//            return $output;
//        } else {
//            return "<script type='text/javascript'>"
//                   . "alertify.warning('Search result match empty!').set('modal', false);"
//                   . "</script>";
//        }
    }
}
