<?php
/**
 * Copyright (c) 2018.
 * Powered by CheckSanity (https://checksanity.ru)
 * Developed for Prime Production (https://primeproduction.ru)
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class SalonsModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library('Encoder');
    }

    public function getSalons($status = null)
    {
        $this->db->select('*');
        $this->db->order_by('order_by', 'ASC');
        if ($status) {
            $this->db->where('status', $status);
        }
        $query = $this->db->get('salons');
        return $this->encoder->decode($query->result_array());
    }

    public function getSalonsWithoutDefault()
    {
        $this->db->select('*');
        $this->db->order_by('order_by', 'ASC');
        $this->db->where('slug !=', 'default');
        $query = $this->db->get('salons');
        return $this->encoder->decode($query->result_array());
    }

    public function getSalonsSlug($status = null) {
        $salons = $this->getSalons($status);
        $salon_slugs = [];
        foreach ($salons as $salon) {
            if ($salon['slug'] !== 'default') {
                $salon_slugs[] = $salon['slug'];
            }
        }
        return $salon_slugs;
    }

    public function getSalon($slug, $statuses = [], $default = true)
    {
        $this->db->where('slug', $slug);
        if (!empty($statuses)) {
            $this->db->where_in('status', $statuses);
        }
        $query = $this->db->get('salons');
        if ($query->num_rows() === 0) {
            if ($default) {
                $this->db->where('slug', 'default');
                $query = $this->db->get('salons');
                return $this->encoder->decode($query->row_array());
            } else {
                return array();
            }
        } else {
            return $this->encoder->decode($query->row_array());
        }
    }

}
