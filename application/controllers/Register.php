<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    function __construct() {
      parent::__construct();
    }

    function index() {
        if ($this->input->post('submit')) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user_data =  array(
                'username' => $username,
                'password' => $password
            );

            $return = json_decode(api_post(config_item('api-url').'/register_user', $user_data));
            if ($return != null && isset($return->success)) {
                $data['success_msg'] = $return->success;
            } else {
                $data['error_msg'] = $return->error;
            }
            $this->load->view('/users/register', $data);
        } else {
            $this->load->view('/users/register');
        }
    }
  
  }

?> 