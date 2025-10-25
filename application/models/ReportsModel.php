<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReportsModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function insertData($data)
    {
        if ($this->db->insert('reports', $data)) {
            return true;
        }
        return false;
    }
}