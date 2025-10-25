<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library('Encoder');
    }

    public function insertData($table, $data)
    {
        $data = $this->encoder->encode($data);
        if ($this->db->insert($table, $data)) {
            return true;
        }
        return false;
    }

    public function updateData($table, $data)
    {
        try {
            $this->db->where('slug', $data['slug']);
            $data = $this->encoder->encode($data);
            if ($this->db->update($table, $data)) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    public function deleteData($table, $slug)
    {
        $this->db->where('slug', $slug);
        if ($this->db->delete($table)) {
            return true;
        }
        return false;
    }

    public function updateOrder($data)
    {
        foreach ($data['order'] as $index => $value) {
            $this->db->where('slug', $value);
            $this->db->update($data['table'], array('order_by' => $index));
        }
        return true;
    }
}