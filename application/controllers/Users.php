<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {
      parent::__construct();
    }

    function index() {
        $return = json_decode(api_get(config_item('api-url').'/get_all_users'));
        if ($return != null && isset($return->error)) {
            $data['msg'] = $return->error;
            $this->load->view('/users/list', $data);
        } else {
            $data['user_list'] = $return->success;
            $this->load->view('/users/list', $data);
        }
    }

    function edit($id) {
        $data['id'] = $id;
        $user_id = array (
            'id' => $id
        );

        $user_data = json_decode(api_post(config_item('api-url').'/get_user_by_id', $user_id));

        if ($this->input->post('submit')) {
            $user_update = array(
                'id' => $id,
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $return = json_decode(api_post(config_item('api-url').'/update_user', $user_update));
            if (isset($return->success)) {
                $data['success_msg'] = $return->success;
            } else {
                $data['error_msg'] = $return->error;
            }
            $this->load->view('/users/update', $data);
        } else {
            if (isset($user_data->success)) {
                $data['user_data'] = $user_data->success;
            } else {
                $data['error_msg'] = $user_data->error;
                $data['user_data'] = null;
            }
            $this->load->view('/users/update', $data);
        }
    }

    function delete($id) {
        $data['id'] = $id;
        $user_id = array (
            'id' => $id
        );

        $user_data = json_decode(api_post(config_item('api-url').'/get_user_by_id', $user_id));

        if ($this->input->post('submit')) {
            $user_delete = array(
                'id' => $id
            );
            $return = json_decode(api_post(config_item('api-url').'/delete_user', $user_delete));
            if (isset($return->success)) {
                $data['success_msg'] = $return->success;
            } else {
                $data['error_msg'] = $return->error;
            }
            $this->load->view('/users/delete', $data);
        } else {
            if (isset($user_data->success)) {
                $data['user_data'] = $user_data->success;
            } else {
                $data['error_msg'] = $user_data->error;
                $data['user_data'] = null;
            }
            $this->load->view('/users/delete', $data);
        }
    }
  
  }

?>