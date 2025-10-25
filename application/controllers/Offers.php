<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once('Dashboard.php');

class Offers extends Dashboard
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('OffersModel');
    }

    public function index()
    {
        if ($this->permissions['offers_view']) {
            $this->loadHeader();
            $this->load->view('dashboard/offers', array('offers' => $this->OffersModel->getAllOffers(), 'permissions' => $this->permissions));
            $this->loadFooter();
        } else {
            $this->viewNoPermission();
        }
    }

    public function addOffer()
    {
        $data = $this->input->post();
        $data['salons'] = implode(',', $data['salons']);
        $data['expires'] = date('Y-m-d', strtotime($data['expires']));
        unset($data['model']);
        unset($data['slug']);
        if ($this->permissions['offers_add']) {
            $id = $this->OffersModel->insertData($data);
            if ($id) {
                $this->createFolder('offers', $id);
                redirect('dashboard/offer/' . $id, 'refresh');
            } else {
                echo 'Ошибка добавления акции.<br>';
                echo 'Переданные параметры:<br>';
                var_dump($data);
                die();
            }
        } else {
            $this->viewNoPermission();
        }
    }

    public function deleteOffer()
    {
        $data = $this->input->post();
        unset($data['model']);
        if ($this->permissions['offers_delete']) {
            $this->OffersModel->deleteData($data['slug']);
            $dir = FCPATH . 'media/offers' . '/' . $data['slug'];
            $this->deleteFolder($dir);
            redirect('dashboard/offers', 'refresh');
        } else {
            $this->viewNoPermission();
        }
    }

    public function updateOffer()
    {
        if (isset($_POST)) {
            $data = $_POST;
            unset($data['model']);
            try {
                if ($this->permissions['offers_edit']) {
                    $data['salons'] = implode(',', $data['salons']);
                    $data['expires'] = date('Y-m-d', strtotime($data['expires']));
                    if ($this->OffersModel->updateData($data)) {
                        echo json_encode(array('status' => 'ok', 'message' => 'Данные обновлены.', 'code' => '000', 'data' => $data));
                    } else {
                        echo json_encode(array('status' => 'fail', 'message' => 'Данные не обновлены.', 'code' => '002', 'data' => $data));
                    }
                } else {
                    echo json_encode(array('status' => 'fail', 'message' => 'У вас нет досутпа!', 'code' => '004'));
                }
            } catch (Exception $e) {
                echo json_encode(array('status' => 'fail', 'message' => 'Внутренняя ошибка сервера. Попробуйте еще раз.', 'code' => '001'));
            }
        } else {
            echo json_encode(array('status' => 'fail', 'message' => 'Нет данных.', 'code' => '001'));
        }
    }

    public function viewOffer($offer_id = null)
    {
        if (($offer_id == null && $this->permissions['offers_add']) || ($offer_id != null && $this->permissions['offers_edit'])) {
            $this->loadHeader();
            $offer = $this->OffersModel->getOffer($offer_id);
            $offer['multiselect_template'] = $this->OffersModel->getSalons();
            if (array_key_exists('id', $offer)) {
                $offer['slug'] = $offer['id'];
            }
            if (array_key_exists('salons', $offer)) {
                $offer['multiselect_values'] = explode(',', $offer['salons']);
            } else {
                $offer['multiselect_values'] = [];
            }
            $this->load->view('dashboard/offer', array(
                'offer' => $offer,
                'fields' => $this->FieldsModel->getFields('offers'),
                'files' => $this->FieldsModel->getFiles('offers'),
            ));
            $this->loadFooter();
        } else {
            $this->viewNoPermission();
        }
    }
}