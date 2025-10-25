<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->library('session');
        $this->load->model('ReportsModel');
    }

    public function newReport($group)
    {
        header('Content-type:application/json;charset=utf-8');
        $json = file_get_contents('php://input');
        $data = [];
        $data['body'] = $json;
        $data['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        $data['url'] = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $data['report_group'] = $group;
        if ($this->ReportsModel->insertData($data)) {
            return $json;
        }
        throw new Error('Incorrect input');
    }
}