<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class VacancyArticleModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('Encoder');
    }

    public function getArticleById($id = null)
    {
        $query = $this->db->get_where('vacancy_articles', array('id' => $id));
        if ($query->num_rows() === 0) {
            return array();
        } else {
            return $query->row_array();
        }
    }

    public function getAllArticles()
    {
        $this->db->select('*');
        $this->db->order_by('date', 'DESC');
        $query = $this->db->get('vacancy_articles');
        return $query->result_array();
    }

    public function updateData($data)
    {
        try {
            $this->db->where('id', $data['id']);
            unset($data['id']);
            if ($this->db->update('vacancy_articles', $data)) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    public function insertData($data)
    {
        $this->db->insert('vacancy_articles', $data);
        return $this->db->insert_id();
    }

    public function deleteData($id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete('vacancy_articles')) {
            return true;
        }
        return false;
    }

    /* Main view */
    public function getArticle($slug)
    {
        $this->db->select('*');
        $this->db->where('slug', $slug);
        $query = $this->db->get('vacancy_articles');
        return $query->result_array();
    }

    public function getArticles()
    {
        $this->db->select('*');
        $this->db->order_by('date', 'DESC');
        $this->db->where('status', 1);
        $query = $this->db->get('vacancy_articles');
        return $query->result_array();
    }
}
