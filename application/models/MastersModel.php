<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MastersModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insertMaster($data)
    {
        $this->db->insert('masters', $data);
        return $this->db->insert_id();
    }

    public function updateMaster($data)
    {
        try {
            $this->db->where('id', $data['id']);
            unset($data['id']);
            if ($this->db->update('masters', $data)) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    public function deleteMaster($id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete('masters')) {
            return true;
        }
        return false;
    }

    public function getMasterById($id)
    {
        $query = $this->db->get_where('masters', array('id' => $id));
        if ($query->num_rows() === 0) {
            return array();
        } else {
            return $query->row_array();
        }
    }

    public function getMasterBySycretId($sycret_id)
    {
        $query = $this->db->get_where('masters', array('sycret_id' => $sycret_id));
        if ($query->num_rows() === 0) {
            return array();
        } else {
            return $query->row_array();
        }
    }

    public function getSalons()
    {
        $query = $query = $this->db->select('slug, name')
            ->where('slug !=', 'default')
            ->get('salons');
        return $query->result_array();
    }

    public function getSalonMasters($slug = null, $limit = 15)
    {
        $this->db->order_by('rand()');
        $this->db->limit($limit);
        $this->db->where('status', 1);
        if ($slug) {
            $this->db->where('salon', $slug);
        }
        $query = $this->db->get('masters');
        return $query->result_array();
    }

    public function getServiceMaster($slug, $salon = null, $limit = 15)
    {
        $this->db->order_by('rand()');
        $this->db->limit($limit);
        $this->db->where('status', 1);
        if ($salon) {
            $this->db->where('salon', $salon);
        }
        $this->db->like('styles', $slug, 'both');
        $query = $this->db->get('masters');
        return $query->result_array();
    }

    public function getAllMastersBySalonSlug($salon_slug)
    {
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get_where('masters', array('salon' => $salon_slug));
        return $query->result_array();
    }
}
