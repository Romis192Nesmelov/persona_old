<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CostsModel extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('Encoder');
    }

    //categories
    public function getCategories() {
        $this->db->select('*');
        $query = $this->db->get('price_categories');
        return $query->result_array();
    }

    public function getCategory($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('price_categories');
        return $query->row_array();
    }

    public function updateCategory($data) {
        try {
            $this->db->where('id', $data['id']);
            unset($data['id']);
            if ($this->db->update('price_categories', $data)) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    public function deleteCategory($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('price_categories')) {
            return true;
        }
        return false;
    }

    public function insertCategory($data) {
        $this->db->insert('price_categories', $data);
        return $this->db->insert_id();
    }

    //masters
    public function getMasters() {
        $this->db->select('*');
        $query = $this->db->get('price_masters');
        return $query->result_array();
    }

    public function getMaster($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('price_masters');
        return $query->row_array();
    }

    public function updateMaster($data) {
        try {
            $this->db->where('id', $data['id']);
            unset($data['id']);
            $data = $this->encoder->encode($data);
            if ($this->db->update('price_masters', $data)) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    public function deleteMaster($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('price_masters')) {
            return true;
        }
        return false;
    }

    public function insertMaster($data) {
        $data = $this->encoder->encode($data);
        $this->db->insert('price_masters', $data);
        return $this->db->insert_id();
    }

    //services
    public function getAllServices() {
        $this->db->select('*');
        $query = $this->db->get('price_services');
        return $query->result_array();
    }

    public function getServices($category_id) {
        $this->db->select('*');
        $this->db->where('price_category_id', $category_id);
        $query = $this->db->get('price_services');
        return $query->result_array();
    }

    public function getService($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('price_services');
        return $query->row_array();
    }

    public function updateService($data) {
        try {
            $this->db->where('id', $data['id']);
            unset($data['id']);
            $data = $this->encoder->encode($data);
            if ($this->db->update('price_services', $data)) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    public function insertService($data) {
        $data = $this->encoder->encode($data);
        $this->db->insert('price_services', $data);
        return $this->db->insert_id();
    }

    public function deleteService($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('price_services')) {
            return true;
        }
        return false;
    }

    //style_categories
    public function getAllStyleCategories() {
        $this->db->select('*');
        $query = $this->db->get('price_style_categories');
        return $query->result_array();
    }

    public function getStyleCategories($service_id) {
        $this->db->select('*');
        $this->db->where('price_service_id', $service_id);
        $query = $this->db->get('price_style_categories');
        return $query->result_array();
    }

    public function getStyleCategory($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('price_style_categories');
        return $query->row_array();
    }

    public function updateStyleCategory($data) {
        try {
            $this->db->where('id', $data['id']);
            unset($data['id']);
            if ($this->db->update('price_style_categories', $data)) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    public function insertStyleCategory($data) {
        $this->db->insert('price_style_categories', $data);
        return $this->db->insert_id();
    }

    public function deleteStyleCategory($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('price_style_categories')) {
            return true;
        }
        return false;
    }

    //services
    public function getAllStyles() {
        $this->db->select('*');
        $query = $this->db->get('price_styles');
        return $query->result_array();
    }

    public function getStyles($service_id) {
        $this->db->select('*');
        $this->db->where('price_service_id', $service_id);
        $query = $this->db->get('price_styles');
        return $query->result_array();
    }

    public function getStyle($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('price_styles');
        return $query->row_array();
    }

    public function updateStyle($data) {
        try {
            $this->db->where('id', $data['id']);
            unset($data['id']);
            if ($this->db->update('price_styles', $data)) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    public function insertStyle($data) {
        $this->db->insert('price_styles', $data);
        return $this->db->insert_id();
    }

    public function deleteStyle($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('price_styles')) {
            return true;
        }
        return false;
    }

    //prices
    public function getAllPrices() {
        $this->db->select('price_style_prices.*, price_masters.name as master_name, price_masters.description as master_description, price_styles.name as style_name');
        $this->db->from('price_style_prices');
        $this->db->join('price_masters', 'price_masters.id = price_style_prices.price_master_id');
        $this->db->join('price_styles', 'price_styles.id = price_style_prices.price_style_id');
        $this->db->order_by('price_style_prices.price', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPrices($price_style_id) {
        $this->db->select('*');
        $this->db->where('price_style_id', $price_style_id);
        $query = $this->db->get('price_style_prices');
        return $query->result_array();
    }

    public function getPrice($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('price_style_prices');
        return $query->row_array();
    }

    public function updatePrice($data) {
        try {
            $this->db->where('id', $data['id']);
            unset($data['id']);
            $data = $this->encoder->encode($data);
            if ($this->db->update('price_style_prices', $data)) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    public function insertPrice($data) {
        $data = $this->encoder->encode($data);
        $this->db->insert('price_style_prices', $data);
        return $this->db->insert_id();
    }

    public function deletePrice($id) {
        $this->db->where('id', $id);
        if ($this->db->delete('price_style_prices')) {
            return true;
        }
        return false;
    }

    //icons
    public function getAllIcons() {
        $this->db->select('*');
        $query = $this->db->get('price_icons');
        return $query->result_array();
    }
}
