<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
      parent::__construct();
    }

    function index() {
        redirect('/login');
    }
  
    function login() {

        if ($this->input->post('submit')) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $login_credentials =  array(
                'username' => $username,
                'password' => $password
            );

            $return = json_decode(api_post(config_item('api-url').'/login', $login_credentials));
            if ($return != null && isset($return->success)) {
                $d = $return->success;
                $user_data = array(
                    'username' => $d->username,
                    'token' => $d->token
                );
                $this->session->set_userdata($user_data);
                
                redirect('/users');
            } else {
                $data['msg'] = $return->error;
                $this->load->view('/auth/login', $data);
            }
        } else {
            $this->load->view('/auth/login');
        }
    }
  
    function logout() {
      redirect('/login');
    }
  
  }

?>