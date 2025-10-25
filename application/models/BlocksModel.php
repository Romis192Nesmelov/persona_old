<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlocksModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library('Encoder');
    }

    public function getBlocks()
    {
        $this->db->select('name,slug');
        $query = $this->db->get('blocks');
        return $query->result_array();
    }

    public function getBlocksSlug()
    {
        $blocks = $this->getBlocks();
        $slugs = [];
        foreach ($blocks as $block) {
            $slugs[] = $block['slug'];
        }
        return $slugs;
    }

    public function getBlock($slug)
    {
        if (!$slug) {
            return array();
        }
        $this->db->select('*');
        $this->db->where('slug', $slug);
        $query = $this->db->get('blocks');
        $data = $query->row_array();
        $data['content'] = json_decode($data['content'], true);
        return $data;
    }

    public function getBlockData($slug, $default_slug = null)
    {
        $this->db->select('content');
        $this->db->where('slug', $slug);
        $query = $this->db->get('blocks');
        $content = $query->row_array();
        if ($content['content'] === null && $default_slug) {
            $this->db->select('content');
            $this->db->where('slug', $default_slug);
            $query = $this->db->get('blocks');
            $content = $query->row_array();
        }
        $content = json_decode($content['content'], true);
        return $this->encoder->decode($content);
    }

    public function updateBlock($slug, $content)
    {
        $this->encoder->encode($content);
        $this->db->set('content', $content);
        $this->db->where('slug', $slug);
        return $this->db->update('blocks');
    }

    public function addBlock($data)
    {
        $this->encoder->encode($data);
        if ($this->db->insert('blocks', $data)) {
            return true;
        }
        return false;
    }
}

