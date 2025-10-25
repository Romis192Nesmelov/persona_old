<?php
/**
 * Copyright (c) 2018.
 * Powered by CheckSanity (https://checksanity.ru)
 * Developed for Prime Production (https://primeproduction.ru)
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class OffersModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    public function getSalons()
    {
        $query = $query = $this->db->select('slug, name')
            ->where('slug !=', 'default')
            ->get('salons');
        return $query->result_array();
    }

    public function insertData($data)
    {
        $data = $this->encoder->encode($data);
        $this->db->insert('offers', $data);
        return $this->db->insert_id();
    }

    public function updateData($data)
    {
        try {
            $this->db->where('id', $data['slug']);
            unset($data['slug']);
            $data = $this->encoder->encode($data);
            if ($this->db->update('offers', $data)) {
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
        if ($this->db->delete('offers')) {
            return true;
        }
        return false;
    }

    public function getOffers($salon_slug)
    {
        $offers = [];
        $query = $this->db->select('*')
            ->where('status', 1)
            ->where('expires >', date('Y-m-d H:i:s'))
            ->get('offers');
        $all_offers = $query->result_array();
        $salons = $this->getSalons();
        foreach ($all_offers as $offer) {
            $available_salons = explode(',', $offer['salons']);
            if ($salon_slug === 'default' && count($available_salons) === count($salons)) {
                $offers[] = $offer;
            } elseif ($salon_slug !== 'default' && in_array($salon_slug, $available_salons)) {
                $offers[] = $offer;
            }
        }
        return $offers;
    }

    public function getSpecialOffers()
    {
        $query = $this->db->select('*')
            ->where('status', 1)
            ->where('expires >', date('Y-m-d H:i:s'))
            ->where('special_page', 1)
            ->get('offers');
        return $query->result_array();
    }

    public function getAllOffers()
    {
        $this->db->select('*');
        $query = $this->db->get('offers');
        return $query->result_array();
    }

    public function getOffer($offer_id)
    {
        $query = $this->db->get_where('offers', array('id' => $offer_id));
        if ($query->num_rows() === 0) {
            return array();
        } else {
            return $query->row_array();
        }
    }
}
