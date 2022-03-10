<?php 

class Token_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

    function verify_token($token) {
        return $this->db->get_where('token', array('token' => $token))->result();
    }

    function save_token($data) {
        $this->db->insert('token', $data);
        return true;
    }
}