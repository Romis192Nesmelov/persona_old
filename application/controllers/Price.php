<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once('Dashboard.php');

class Price extends Dashboard
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PriceModel');
    }

    public function index()
    {
        if ($this->permissions['price_view']) {
            $this->loadHeader();
            $this->load->view('dashboard/prices', array('prices' => $this->PriceModel->getPriceTypes(), 'permissions' => $this->permissions));
            $this->loadFooter();
        } else {
            $this->viewNoPermission();
        }
    }

    public function viewPrice($type)
    {
        if ($this->permissions['price_view']) {
            $this->loadHeader();
            $this->load->view('dashboard/price', array('price_category' => $type,'price_name' => $this->PriceModel->getPriceNameByType($type), 'price' => $this->PriceModel->getPrice($type), 'permissions' => $this->permissions));
            $this->loadFooter();
        } else {
            $this->viewNoPermission();
        }
    }

    public function addPrice()
    {
        if (isset($_POST)) {
            try {
                if ($this->permissions['price_add']) {
                    $id = $this->PriceModel->insertData($_POST);
                    if ($id) {
                        echo json_encode(array('status' => 'ok', 'message' => 'Данные обновлены.', 'code' => '000', 'data' => ['id' => $id]));
                    } else {
                        echo json_encode(array('status' => 'fail', 'message' => 'Данные не обновлены.', 'code' => '002', 'data' => $_POST));
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

    public function updatePrice()
    {
        if (isset($_POST)) {
            try {
                if ($this->permissions['price_edit']) {
                    if ($this->PriceModel->updateData($_POST)) {
                        echo json_encode(array('status' => 'ok', 'message' => 'Данные обновлены.', 'code' => '000', 'data' => $_POST));
                    } else {
                        echo json_encode(array('status' => 'fail', 'message' => 'Данные не обновлены.', 'code' => '002', 'data' => $_POST));
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

    public function deletePrice()
    {
        if (isset($_POST)) {
            try {
                if ($this->permissions['price_delete']) {
                    if ($this->PriceModel->deleteData($_POST['id'])) {
                        echo json_encode(array('status' => 'ok', 'message' => 'Данные обновлены.', 'code' => '000', 'data' => $_POST));
                    } else {
                        echo json_encode(array('status' => 'fail', 'message' => 'Данные не обновлены.', 'code' => '002', 'data' => $_POST));
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
}