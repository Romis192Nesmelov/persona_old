<?php
/**
 * Copyright (c) 2018.
 * Powered by CheckSanity (https://checksanity.ru)
 * Developed for Prime Production (https://primeproduction.ru)
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class PriceModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('Encoder');
    }

    public function getPrice($category = null)
    {
        $this->db->select('*');
        $this->db->where('category', $category);
        $query = $this->db->get('price');
        return $query->result_array();
    }

    public function updateData($data)
    {
        try {
            $this->db->where('id', $data['id']);
            unset($data['id']);
            $data = $this->encoder->encode($data);
            if ($this->db->update('price', $data)) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    public function deleteData($id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete('price')) {
            return true;
        }
        return false;
    }

    public function insertData($data)
    {
        $data = $this->encoder->encode($data);
        $this->db->insert('price', $data);
        return $this->db->insert_id();
    }

    public function getPriceNameByType($type)
    {
        $word2 = '';
        if (preg_match('/^full-price-*/', $type)) {
            $type = preg_replace('/^full-price-*/', '', $type);
            $word2 = ' - полный прайс';
        }
        $name = 'Главная';
        foreach ($this->getServices() as $service) {
            if ($service['slug'] === $type) {
                $name = $service['name_short'];
                break;
            }
        }
        return $name . $word2;
    }

    public function getServices()
    {
        $this->db->select('slug, name, name_short');
        $this->db->order_by('order_by', 'ASC');
        $query = $this->db->get('services');
        return $query->result_array();
    }

    public function getPriceTypes()
    {
        $types = [
            'main' => 'Главная'
        ];

        foreach ($this->getServices() as $service) {
            $types[$service['slug']] = $service['name_short'];
            $types['full-price-' . $service['slug']] = $service['name_short'] . ' - полный прайс';
        }
        return $types;
    }
}
