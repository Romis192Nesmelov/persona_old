<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once('Dashboard.php');

class Vacancies extends Dashboard
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('VacancyModel');
        $this->load->model('VacancyArticleModel');
    }

    public function index()
    {
        if ($this->permissions['vacancies_view']) {
            $this->loadHeader();
            $this->load->view('dashboard/vacancies/index', array(
                    'vacancies' => $this->VacancyModel->getAllVacancies(),
                    'articles' => $this->VacancyArticleModel->getAllArticles(),
                    'permissions' => $this->permissions)
            );
            $this->load->view('dashboard/vacancies/settings', array(
                    'settings' => $this->VacancyModel->getSettings(),
                    'fields' => $this->FieldsModel->getFields('vacancies_settings'),
                    'permissions' => $this->permissions)
            );
            $this->loadFooter();
        } else {
            $this->viewNoPermission();
        }
    }

    /* Vacancies */
    public function viewVacancy($id = null)
    {
        if ($this->permissions['vacancies_view']) {
            $vacancy = $this->VacancyModel->getVacancyById($id);
            $this->loadHeader();
            $this->load->view('dashboard/vacancies/vacancy', array(
                'vacancy' => $vacancy,
                'permissions' => $this->permissions,
                'fields' => $this->FieldsModel->getFields('vacancies'),
                'files' => $this->FieldsModel->getFiles('vacancies'),
            ));
            $this->loadFooter();
        } else {
            $this->viewNoPermission();
        }
    }

    public function addVacancy()
    {
        $data = $this->input->post();
        unset($data['model']);
        if ($this->permissions['vacancies_add']) {
            $id = $this->VacancyModel->insertData($data);
            $this->createFolder('vacancies', $id);
            redirect('dashboard/vacancies/vacancy/' . $id, 'refresh');
        } else {
            $this->viewNoPermission();
        }
    }

    public function updateSettings()
    {
        if (isset($_POST)) {
            $settings = $_POST;
            unset($settings['model']);
            try {
                if ($this->permissions['vacancies_edit']) {
                    if ($this->VacancyModel->setSettings($settings)) {
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

    public function updateVacancy()
    {
        if (isset($_POST)) {
            $data = $_POST;
            unset($data['model']);
            try {
                if ($this->permissions['vacancies_edit']) {
                    if ($this->VacancyModel->updateData($data)) {
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

    public function deleteVacancy()
    {
        $data = $this->input->post();
        unset($data['model']);
        if ($this->permissions['vacancies_delete']) {
            $this->VacancyModel->deleteData($data['slug']);
            $dir = FCPATH . 'media/vacancies' . '/' . $data['slug'];
            $this->deleteFolder($dir);
            redirect('dashboard/vacancies', 'refresh');
        } else {
            $this->viewNoPermission();
        }
    }

    /* Articles */
    public function viewArticle($id = null)
    {
        if ($this->permissions['vacancies_view']) {
            $article = $this->VacancyArticleModel->getArticleById($id);
            $this->loadHeader();
            $this->load->view('dashboard/vacancies/article', array(
                'article' => $article,
                'permissions' => $this->permissions,
                'fields' => $this->FieldsModel->getFields('vacancies_articles'),
                'files' => $this->FieldsModel->getFiles('vacancies_articles'),
            ));
            $this->loadFooter();
        } else {
            $this->viewNoPermission();
        }
    }

    public function addArticle()
    {
        $data = $this->input->post();
        $data['date'] = date('Y-m-d', strtotime($data['date']));
        unset($data['model']);
        if ($this->permissions['vacancies_add']) {
            $id = $this->VacancyArticleModel->insertData($data);
            $this->createFolder('vacancies_articles', $id);
            redirect('dashboard/vacancies/article/' . $id, 'refresh');
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
                if ($this->permissions['vacancies_edit']) {
                    $data['date'] = date('Y-m-d', strtotime($data['date']));
                    if ($this->VacancyArticleModel->updateData($data)) {
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

    public function deleteArticle()
    {
        $data = $this->input->post();
        unset($data['model']);
        if ($this->permissions['vacancies_delete']) {
            $this->VacancyArticleModel->deleteData($data['slug']);
            $dir = FCPATH . 'media/vacancies_articles' . '/' . $data['slug'];
            $this->deleteFolder($dir);
            redirect('dashboard/vacancies', 'refresh');
        } else {
            $this->viewNoPermission();
        }
    }
}