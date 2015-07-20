<?php

class Login_model extends CI_Model {

    public function login($name, $password) {
        $passwordEncrypt = sha1($password);
        $this->db->where('username', $name);
        $this->db->where('password', $passwordEncrypt);
        $query = $this->db->get('admin');
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $data = array(
                    'username' => $row->username,
                    'password' => $row->password,
                    'logged_in' => TRUE
                );
            }
            $this->session->set_userdata($data);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function isLoggedIn() {
        $is_logged_in = $this->session->userdata('logged_in');

        if (!isset($is_logged_in) || $is_logged_in !== TRUE) {
            redirect(base_url());
        }
    }

//    function login($username,$password){
//        $where=array(
//            'username'=>$username,
//            'password'=>sha1($password)
//        );
//        $this->db->select()->from('admin')->where($where);
//        $query=$this->db->get();
//        return $query->first_row('array');
//    }
}
