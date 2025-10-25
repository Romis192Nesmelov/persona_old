<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once('Dashboard.php');

class Masters extends Dashboard
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SycretModel');
        $this->load->model('MastersModel');
        $this->load->model('SalonsModel');
        $this->load->model('ServicesModel');
    }

    public function showMasters($salon_slug = null)
    {
        if ($this->permissions['salons_view']) {
            $this->loadHeader();
            if ($salon_slug) {
                $salon = $this->SalonsModel->getSalon($salon_slug);
                $masters = $this->MastersModel->getAllMastersBySalonSlug($salon['slug']);
                $this->load->view('dashboard/masters', array('masters' => $masters, 'salon' => $salon, 'permissions' => $this->permissions));
            } else {
                $this->load->view('dashboard/masters', array('salons' => $this->SalonsModel->getSalons(), 'permissions' => $this->permissions));
            }
            $this->loadFooter();
        } else {
            $this->viewNoPermission();
        }
    }

    public function viewMaster($master_id = null)
    {
        if (($master_id == null && $this->permissions['masters_add']) || ($master_id != null && $this->permissions['masters_edit'])) {
            $this->loadHeader();
            $master = $this->MastersModel->getMasterById($master_id);
            $salons = $this->SalonsModel->getSalonsWithoutDefault();
            $master['multiselect_template'] = $this->ServicesModel->getAllServices();
            if (array_key_exists('id', $master)) {
                $master['slug'] = $master['id'];
            }
            if (array_key_exists('styles', $master)) {
                $master['multiselect_values'] = explode(',', $master['styles']);
            } else {
                $master['multiselect_values'] = [];
            }
            if (empty($master['sycret_id'])) {
                $master['radio_list'] = $salons;
                $master['radio_label'] = 'Салон';
                $master['radio_name'] = 'salon';
                if (!empty($master) && !empty($master['salon'])) {
                    $master['radio_value'] = $master['salon'];
                }
            }
            $this->load->view('dashboard/master', array(
                'master' => $master,
                'fields' => $this->FieldsModel->getFields('masters'),
                'files' => $this->FieldsModel->getFiles('masters'),
            ));
            $this->loadFooter();
        } else {
            $this->viewNoPermission();
        }
    }

    public function sync()
    {
        if (!$this->permissions['masters_edit'] && !$this->permissions['masters_add'] && !$this->permissions['masters_delete']) {
            http_response_code(401);
            $this->viewNoPermission();
            die();
        } else {
            http_response_code(200);
        }
        $sycret_masters = $this->SycretModel->getMasters();
        foreach ($sycret_masters as $sycret_master) {
            $master = $this->MastersModel->getMasterBySycretId($sycret_master['id']);
            if (empty($master) && empty($sycret_master['active'])) {
                continue;
            }
            if (empty($master)) {
                $this->addAPIMaster([
                    'sycret_id' => $sycret_master['id'],
                    'name' => $sycret_master['surname'] . ' ' . $sycret_master['name'],
                    'description' => $sycret_master['description'],
                    'position' => $sycret_master['position'],
                    'salon' => $sycret_master['salon'],
                    'sycret_sync' => 1,
                    'status' => 0,
                ], $sycret_master['img']);
            } else if (empty($sycret_master['active'])) {
                $this->deleteAPIMaster($master['id']);
            } else if (!empty($sycret_master['active']) && !empty($master['sycret_sync'])) {
                $this->updateAPIMaster([
                    'id' => $master['id'],
                    'name' => $sycret_master['name'] . ' ' . $sycret_master['surname'],
                    'description' => $sycret_master['description'],
                    'position' => $sycret_master['position'],
                    'salon' => $sycret_master['salon'],
                ], $sycret_master['img']);
            }
        }
        echo json_encode(['status' => 'ok']);
    }

    public function updateAPIMaster($master, $img = null)
    {
        try {
            $this->MastersModel->updateMaster($master);
            if ($img) {
                $image = imagecreatefromstring(file_get_contents($img));
                $path_jpg = FCPATH . 'media/masters' . '/' . $master['id'] . '/master.jpg';
                $path_webp = FCPATH . 'media/masters' . '/' . $master['id'] . '/master.webp';
                imagejpeg($image, $path_jpg, 85);
                imagewebp($image, $path_webp, 85);
                imagedestroy($image);
            }
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function addAPIMaster($master, $img = null)
    {
        try {
            $id = $this->MastersModel->insertMaster($master);
            if ($id) {
                $this->createFolder('masters', $id);
                if ($img) {
                    $image = imagecreatefromstring(file_get_contents($img));
                    $path_jpg = FCPATH . 'media/masters' . '/' . $id . '/master.jpg';
                    $path_webp = FCPATH . 'media/masters' . '/' . $id . '/master.webp';
                    imagejpeg($image, $path_jpg, 85);
                    imagewebp($image, $path_webp, 85);
                    imagedestroy($image);
                }
            }
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function deleteAPIMaster($master_id)
    {
        try {
            $this->MastersModel->deleteMaster($master_id);
            $dir = FCPATH . 'media/masters' . '/' . $master_id;
            $this->deleteFolder($dir);
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function addMaster()
    {
        $data = $this->input->post();
        $data['styles'] = implode(',', $data['styles']);
        unset($data['model']);
        unset($data['slug']);
        if ($this->permissions['masters_add']) {
            $id = $this->MastersModel->insertMaster($data);
            if ($id) {
                $this->createFolder('masters', $id);
                redirect('dashboard/master/' . $id, 'refresh');
            } else {
                echo 'Ошибка добавления мастера.<br>';
                echo 'Переданные параметры:<br>';
                var_dump($data);
                die();
            }
        } else {
            $this->viewNoPermission();
        }
    }

    public function deleteMaster()
    {
        $data = $this->input->post();
        unset($data['model']);
        if ($this->permissions['masters_delete']) {
            $this->MastersModel->deleteMaster($data['slug']);
            $dir = FCPATH . 'media/masters' . '/' . $data['slug'];
            $this->deleteFolder($dir);
            redirect('dashboard/masters', 'refresh');
        } else {
            $this->viewNoPermission();
        }
    }

    public function updateMaster()
    {
        if (isset($_POST)) {
            $data = $_POST;
            unset($data['model']);
            $data['id'] = $data['slug'];
            unset($data['slug']);
            try {
                if ($this->permissions['masters_edit']) {
                    $data['styles'] = implode(',', $data['styles']);
                    if ($this->MastersModel->updateMaster($data)) {
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
}