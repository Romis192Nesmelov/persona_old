<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once('Dashboard.php');

class Articles extends Dashboard
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ArticleModel');
        $this->load->model('SalonsModel');
        $this->load->model('ServicesModel');
    }

    public function index()
    {
        if ($this->permissions['articles_view']) {
            $this->loadHeader();
            $this->load->view('dashboard/articles', array('articles' => $this->ArticleModel->getAllArticles(), 'permissions' => $this->permissions));
            $this->loadFooter();
        } else {
            $this->viewNoPermission();
        }
    }

    public function viewArticle($id = null)
    {
        if ($this->permissions['articles_view']) {
            $article = $this->ArticleModel->getArticleById($id);
            if (array_key_exists('services', $article)) {
                $article['multiselect_values'] = explode(',', $article['services']);
            } else {
                $article['multiselect_values'] = [];
            }
            $article['multiselect_template'] = $this->ServicesModel->getAllServices();
            $this->loadHeader();
            $this->load->view('dashboard/article', array(
                'article' => $article,
                'permissions' => $this->permissions,
                'salons' => $this->SalonsModel->getSalons(),
                'fields' => $this->FieldsModel->getFields('articles'),
                'files' => $this->FieldsModel->getFiles('articles'),
            ));
            $this->loadFooter();
        } else {
            $this->viewNoPermission();
        }
    }

    public function updateArticle()
    {
        if (isset($_POST)) {
            $data = $_POST;
            unset($data['model']);
            try {
                if ($this->permissions['articles_edit']) {
                    $data['date'] = date('Y-m-d', strtotime($data['date']));
                    $data['services'] = implode(',', $data['services']);
                    if ($this->ArticleModel->updateData($data)) {
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

    public function addArticle()
    {
        $data = $this->input->post();
        $data['date'] = date('Y-m-d', strtotime($data['date']));
        $data['services'] = implode(',', $data['services']);
        unset($data['model']);
        if ($this->permissions['articles_add']) {
            $id = $this->ArticleModel->insertData($data);
            $this->createFolder('articles', $id);
            redirect('dashboard/article/' . $id, 'refresh');
        } else {
            $this->viewNoPermission();
        }
    }

    public function deleteArticle()
    {
        $data = $this->input->post();
        unset($data['model']);
        if ($this->permissions['articles_delete']) {
            $this->ArticleModel->deleteData($data['slug']);
            $dir = FCPATH . 'media/articles' . '/' . $data['slug'];
            $this->deleteFolder($dir);
            redirect('dashboard/articles', 'refresh');
        } else {
            $this->viewNoPermission();
        }
    }
}