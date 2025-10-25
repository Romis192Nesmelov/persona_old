<?php
/**
 * Copyright (c) 2018.
 * Powered by CheckSanity (https://checksanity.ru)
 * Developed for Prime Production (https://primeproduction.ru)
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class LeadsModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function addLead($data)
    {
        if ($this->db->insert('leads', $data)) {
            return true;
        }
        return false;
    }

    public function addVacancyLead($data)
    {
        if ($this->db->insert('vacancy_leads', $data)) {
            return true;
        }
        return false;
    }

    public function getLeads($page = 0, $count = 50)
    {
        if ($page != 0) {
            $page = $page * $count;
        }
        $this->db->order_by('created', 'DESC');
        $query = $this->db->get('leads', $count, $page);
        return $query->result_array();
    }
}
