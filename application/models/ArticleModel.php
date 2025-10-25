<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ArticleModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('Encoder');
    }

    public function getArticle($slug)
    {
        $this->db->select('*');
        $this->db->where('slug', $slug);
        $query = $this->db->get('articles');
        return $query->result_array();
    }

    public function getArticleById($id = null)
    {
        $query = $this->db->get_where('articles', array('id' => $id));
        if ($query->num_rows() === 0) {
            return array();
        } else {
            return $query->row_array();
        }
    }

    public function getArticles($limit, $offset)
    {
        $this->db->select('*');
        $this->db->order_by('date', 'DESC');
        $this->db->where('status', 1);
        $this->db->limit($limit);
        $this->db->offset($offset);
        $query = $this->db->get('articles');
        return $query->result_array();
    }

    public function getSimilarArticles($template_services)
    {
        $this->db->select('*');
        $this->db->order_by('date', 'DESC');
        $this->db->where('status', 1);
        $query = $this->db->get('articles');
        $articles = $query->result_array();
        $result = [];
        foreach ($articles as $article) {
            if (!empty($article['services'])) {
                $services = explode(',', $article['services']);
                if (!empty(array_intersect($template_services, $services))) {
                    $result[] = $article;
                }
            }
        }
        shuffle($result);
        return array_slice($result, 0, 10);
    }

    public function getAllArticles()
    {
        $this->db->select('id, h1');
        $this->db->order_by('date', 'DESC');
        $query = $this->db->get('articles');
        return $query->result_array();
    }

    public function getCountArticles()
    {
        $this->db->select('COUNT(id)');
        $query = $this->db->get('articles');
        return (int) $query->result_array()[0]['COUNT(id)'];
    }

    public function updateData($data)
    {
        try {
            $this->db->where('id', $data['id']);
            unset($data['id']);
            if ($this->db->update('articles', $data)) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    public function insertData($data)
    {
        $this->db->insert('articles', $data);
        return $this->db->insert_id();
    }

    public function deleteData($id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete('articles')) {
            return true;
        }
        return false;
    }
}
