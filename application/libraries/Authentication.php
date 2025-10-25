<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('form_validation');
        $this->CI->load->library('session');
        $this->CI->load->model('UserModel');
    }

    public function is_logged_in()
    {
        if ($this->CI->UserModel->isUserExist($this->CI->session->userdata('login'), $this->CI->session->userdata('password'))) {
            return true;
        } else {
            return false;
        }
    }

    public function get_permissions()
    {
        $permissions = $this->CI->UserModel->getUserPermissions($this->CI->session->userdata('login'));
        if ($permissions && is_array($permissions)) {
            return $permissions;
        } else {
            echo 'internal error';
        }
    }

    public function has_permission($permission, $data = null)
    {
        if ($data) {
            return $data[$permission];
        } else {
            return $this->CI->UserModel->hasPermission($this->CI->session->userdata('login'), $permission);
        }
    }

    public function login($login, $password)
    {
        if ($this->CI->UserModel->isUserExist($login, $password)) {
            $this->CI->session->set_userdata(array('login' => $login, 'password' => $password));
            redirect('dashboard', 'refresh');
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function api_login($login, $password) {
        if ($this->CI->UserModel->isUserExist($login, $password)) {
            $this->CI->session->set_userdata(array('login' => $login, 'password' => $password));
            http_response_code(200);
        } else {
            http_response_code(401);
        }
    }

    public function logout()
    {
        $this->CI->session->unset_userdata('login');
        $this->CI->session->unset_userdata('password');
        session_destroy();
        redirect('auth', 'refresh');
    }
}