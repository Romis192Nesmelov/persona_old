<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once('Dashboard.php');

class Blocks extends Dashboard
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BlocksModel');
        $this->load->model('SalonsModel');
        $this->load->model('ServicesModel');
    }

    public function index()
    {
        if ($this->permissions['blocks_view']) {
            $this->loadHeader();
            $this->load->view('dashboard/blocks', array('blocks' => $this->BlocksModel->getBlocks(), 'permissions' => $this->permissions));
            $this->loadFooter();
        } else {
            $this->viewNoPermission();
        }
    }

    public function isSeoBlock($slug)
    {
        if (!$slug) {
            return false;
        }
        $salon_slugs = $this->SalonsModel->getSalonsSlug();
        if (in_array($slug, $salon_slugs)) {
            return true;
        }
        $service_slugs = $this->ServicesModel->getServicesSlug();
        if (in_array($slug, $service_slugs)) {
            return true;
        }
        $style_slugs = $this->ServicesModel->getStylesSlug();
        if (in_array($slug, $style_slugs)) {
            return true;
        }
        return false;
    }

    public function getAvailableSeoSalons($blocks_slug)
    {
        $salons = $this->SalonsModel->getSalons();
        $available_salons = [];
        foreach ($salons as $salon) {
            if (!in_array($salon['slug'], $blocks_slug)) {
                $available_salons[] = ['slug' => $salon['slug'], 'name' => $salon['name']];
            }
        }
        return $available_salons;
    }

    public function getAvailableSeoServices($blocks_slug)
    {
        $services = $this->ServicesModel->getAllServices();
        $available_services = [];
        foreach ($services as $service) {
            if (!in_array($service['slug'], $blocks_slug)) {
                $available_services[] = ['slug' => $service['slug'], 'name' => $service['name']];
            }
        }
        return $available_services;
    }

    public function getAvailableSeoStyles($blocks_slug)
    {
        $styles = $this->ServicesModel->getDBStyles();
        $available_styles = [];
        foreach ($styles as $style) {
            if (!in_array($style['slug'], $blocks_slug)) {
                $available_styles[] = ['slug' => $style['slug'], 'name' => $style['name']];
            }
        }
        return $available_styles;
    }

    public function viewBlock($slug = null)
    {
        if ($this->permissions['blocks_edit']) {
            $block = $this->BlocksModel->getBlock($slug);
            if (!$block && !$slug) {
                $blocks_slug = $this->BlocksModel->getBlocksSlug();
                $this->loadHeader();
                $this->load->view('dashboard/block', array(
                    'block' => $block,
                    'fields' => $this->FieldsModel->getFields('block_seo_new'),
                    'salons' => $this->getAvailableSeoSalons($blocks_slug),
                    'services' => $this->getAvailableSeoServices($blocks_slug),
                    'styles' => $this->getAvailableSeoStyles($blocks_slug)
                ));
                $this->loadFooter();
            } else if ($block && $this->isSeoBlock($slug)) {
                $this->loadHeader();
                $this->load->view('dashboard/block', array(
                    'block' => $block,
                    'fields' => $this->FieldsModel->getFields('block__about'),
                ));
                $this->loadFooter();
            }else if ($block && $slug) {
                $this->loadHeader();
                $this->load->view('dashboard/block', array('block' => $block, 'fields' => $this->FieldsModel->getFields('block_' . $slug)));
                $this->loadFooter();
            } else {
                $this->view404();
            }
        } else {
            $this->viewNoPermission();
        }
    }

    public function updateData()
    {
        if (isset($_POST)) {
            try {
                if ($this->permissions['blocks_edit']) {
                    $slug = $_POST['slug'];
                    unset($_POST['slug']);
                    $content = json_encode($_POST);
                    if ($this->BlocksModel->updateBlock($slug, $content)) {
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


    public function getNameNewSeoBlock($slug)
    {
        $name = 'Блок СЕО ';
        $salon = $this->SalonsModel->getSalon($slug, null, false);
        if (!empty($salon)) {
            $name .= $salon['name'];
            return $name;
        }
        $service = $this->ServicesModel->getService($slug);
        if (!empty($service)) {
            $name .= $service['name'];
            return $name;
        }
        $style = $this->ServicesModel->getStyle($slug);
        if (!empty($style)) {
            $name .= $style['name'];
            return $name;
        }
        throw new Error('Incorrect slug!');
    }

    public function addData()
    {
        $data = $this->input->post();
        if ($this->permissions['blocks_edit']) {
            $slug = $data['slug'];
            $new_data = [];
            $new_data['slug'] = $slug;
            $new_data['name'] = $this->getNameNewSeoBlock($slug);
            unset($data['slug']);
            $new_data['content'] = json_encode($data);
            $this->BlocksModel->addBlock($new_data);
            redirect('dashboard/blocks', 'refresh');
        } else {
            $this->viewNoPermission();
        }
    }
}