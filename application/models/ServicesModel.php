<?php
/**
 * Copyright (c) 2018.
 * Powered by CheckSanity (https://checksanity.ru)
 * Developed for Prime Production (https://primeproduction.ru)
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class ServicesModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getAllServices()
    {
        $this->db->select('slug, name, name_short');
        $this->db->order_by('order_by', 'ASC');
        $query = $this->db->get('services');
        return $query->result_array();
    }

    public function getServicesSlug()
    {
        $services = $this->getAllServices();
        $slugs = [];
        foreach ($services as $service) {
            $slugs[] = $service['slug'];
        }
        return $slugs;
    }

    public function getServices()
    {
        $this->db->select('slug, name, name_short');
        $this->db->order_by('order_by', 'ASC');
        $this->db->where('status', 1);
        $query = $this->db->get('services');
        return $query->result_array();
    }

    public function getService($slug)
    {
        $query = $this->db->get_where('services', array('slug' => $slug));
        if ($query->num_rows() === 0) {
            return array();
        } else {
            return $query->row_array();
        }
    }

    public function getDBStyles()
    {
        $this->db->select('*');
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('styles');
        return $query->result_array();
    }

    public function getAllStyles($slug)
    {
        $this->db->order_by('order_by', 'ASC');
        $query = $this->db->get_where('styles', array('slug_service' => $slug));
        return $query->result_array();
    }

    public function getStylesSlug()
    {
        $styles = $this->getDBStyles();
        $slugs = [];
        foreach ($styles as $style) {
            $slugs[] = $style['slug'];
        }
        return $slugs;
    }

    public function getStyles($slug)
    {
        $this->db->order_by('order_by', 'ASC');
        $this->db->where('status', 1);
        $query = $this->db->get_where('styles', array('slug_service' => $slug));
        return $query->result_array();
    }

    public function getStyle($slug, $slug_style)
    {
        $query = $this->db->get_where('styles', array('slug_service' => $slug, 'slug' => $slug_style));
        if ($query->num_rows() === 0) {
            return false;
        } else {
            return $query->row_array();
        }
    }

    public function insertService($data)
    {
        if ($this->db->insert('services', $data)) {
            return true;
        }
        return false;
    }

    public function updateService($data)
    {
        $this->db->where('slug', $data['slug']);
        if ($this->db->update('services', $data)) {
            return true;
        }
        return false;
    }

    public function deleteService($data)
    {
        $this->db->where('slug', $data['slug']);
        if ($this->db->delete('services')) {
            return true;
        }
        return false;
    }

    public function insertStyle($data)
    {
        if ($this->db->insert('styles', $data)) {
            return true;
        }
        return false;
    }

    public function updateStyle($data)
    {
        $this->db->where('slug', $data['slug']);
        if ($this->db->update('styles', $data)) {
            return true;
        }
        return false;
    }

    public function deleteStyle($data)
    {
        $this->db->where('slug', $data['slug']);
        if ($this->db->delete('styles')) {
            return true;
        }
        return false;
    }
}