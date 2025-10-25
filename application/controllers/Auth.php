<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('Authentication');
    }

    public function index()
    {
        if ($this->authentication->is_logged_in()) {
            redirect('dashboard', 'refresh');
        } else {
            $this->load->view('auth/auth');
        }
    }

    public function login()
    {
        $this->authentication->login($this->input->post('login'), $this->input->post('password'));
    }

    public function api_login()
    {
        $inputJSON = file_get_contents("php://input");
        $input = json_decode($inputJSON, true);
        header("Content-type: application/json");
        $this->authentication->api_login($input['login'], $input['password']);
    }

    public function logout()
    {
        $this->authentication->logout();
    }
}