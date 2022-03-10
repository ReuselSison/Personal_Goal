<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    function __construct() {
      parent::__construct();
    }

    function index() {
        if ($this->input->post('submit')) {
            $username = $this->input->post('username');

            $user_list =  array(
                'username' => $username
            );

            $return = json_decode(api_post(config_item('api-url').'/get_user_by_username', $user_list));
            if ($return != null && isset($return->error)) {
                $data['msg'] = $return->error;
                $this->load->view('/users/list', $data);
            } else {
                $data['user_list'] = $return->success;
                $this->load->view('/users/list', $data);
            }
        } else {
            $this->load->view('/users/search');
        }
    }
  
  }

?>