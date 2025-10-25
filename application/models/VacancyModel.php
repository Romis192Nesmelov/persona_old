<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class VacancyModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('Encoder');
    }

    /* Dashboard */
    public function getVacancyById($id = null)
    {
        $query = $this->db->get_where('vacancies', array('id' => $id));
        if ($query->num_rows() === 0) {
            return array();
        } else {
            return $query->row_array();
        }
    }

    public function getAllVacancies()
    {
        $this->db->select('*');
        $query = $this->db->get('vacancies');
        return $query->result_array();
    }

    public function updateData($data)
    {
        try {
            $this->db->where('id', $data['id']);
            unset($data['id']);
            if ($this->db->update('vacancies', $data)) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    public function insertData($data)
    {
        $this->db->insert('vacancies', $data);
        return $this->db->insert_id();
    }

    public function deleteData($id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete('vacancies')) {
            return true;
        }
        return false;
    }

    /* Settings */
    public function getSettings()
    {
        $query = $this->db->get_where('vacancies_settings', array('id' => 0));
        return $query->row_array();
    }

    public function setSettings($settings)
    {
        try {
            $this->db->where('id', 0);
            if ($this->db->update('vacancies_settings', $settings)) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    /* Main view */
    public function getVacancy($slug)
    {
        $this->db->select('*');
        $this->db->where('slug', $slug);
        $query = $this->db->get('vacancies');
        return $query->result_array();
    }

    public function getVacancies()
    {
        $this->db->select('*');
        $this->db->where('status', 1);
        $query = $this->db->get('vacancies');
        return $query->result_array();
    }
}
