<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once('Dashboard.php');

class Costs extends Dashboard
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CostsModel');
    }

    //list categories and masters
    public function index()
    {
        if ($this->permissions['price_view']) {
            $this->loadHeader();
            $this->load->view('dashboard/price/index', array('categories' => $this->CostsModel->getCategories(), 'masters' => $this->CostsModel->getMasters()));
            $this->loadFooter();
        } else {
            $this->viewNoPermission();
        }
    }

    //category
    public function viewCategory($category_id = null)
    {
        if (($category_id === null && $this->permissions['price_add']) || ($category_id != null && $this->permissions['price_edit'])) {
            $this->loadHeader();
            $category = $category_id !== null ? $this->CostsModel->getCategory($category_id) : [];
            $services = $category_id !== null ? $this->CostsModel->getServices($category_id) : [];
            $this->load->view('dashboard/price/category', array(
                'category' => $category,
                'services' => $services,
                'fields' => $this->FieldsModel->getFields('price_categories'),
                'files' => $this->FieldsModel->getFiles('price_categories'),
            ));
            $this->loadFooter();
        } else {
            $this->viewNoPermission();
        }
    }

    public function addCategory()
    {
        $data = $this->input->post();
        unset($data['model']);
        if ($this->permissions['price_add']) {
            $id = $this->CostsModel->insertCategory($data);
            if ($id) {
                $this->createFolder('price/categories', $id);
                redirect('dashboard/costs/category/' . $id, 'refresh');
            } else {
                echo 'Ошибка добавления категории.<br>';
                echo 'Переданные параметры:<br>';
                var_dump($data);
                die();
            }
        } else {
            $this->viewNoPermission();
        }
    }

    public function deleteCategory()
    {
        $data = $this->input->post();
        if (!$this->permissions['price_delete']) {
            $this->viewNoPermission();
            return;
        }
        if ($this->CostsModel->deleteCategory($data['slug'])) {
            $dir = FCPATH . 'media/price/categories' . '/' . $data['slug'];
            $this->deleteFolder($dir);
            redirect('dashboard/costs', 'refresh');
        } else {
            echo 'Не удалось удалить категорию. Пожалуйста удалите все услуги';
        }
    }

    public function updateCategory()
    {
        if (isset($_POST)) {
            $data = $_POST;
            unset($data['model']);
            try {
                if ($this->permissions['price_edit']) {
                    if ($this->CostsModel->updateCategory($data)) {
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

    //master
    public function viewMaster($master_id = null)
    {
        if (($master_id === null && $this->permissions['price_add']) || ($master_id != null && $this->permissions['price_edit'])) {
            $this->loadHeader();
            $master = $master_id !== null ? $this->CostsModel->getMaster($master_id) : [];
            $this->load->view('dashboard/price/master', array(
                'master' => $master,
                'fields' => $this->FieldsModel->getFields('price_masters'),
            ));
            $this->loadFooter();
        } else {
            $this->viewNoPermission();
        }
    }

    public function addMaster()
    {
        $data = $this->input->post();
        unset($data['model']);
        if ($this->permissions['price_add']) {
            $id = $this->CostsModel->insertMaster($data);
            if ($id) {
                redirect('dashboard/costs/master/' . $id, 'refresh');
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
        if (!$this->permissions['price_delete']) {
            $this->viewNoPermission();
            return;
        }
        if ($this->CostsModel->deleteMaster($data['slug'])) {
            redirect('dashboard/costs', 'refresh');
        } else {
            echo 'Не удалось удалить категорию мастера, пожалуйста проверьте задействован ли он в прайсах';
        }
    }

    public function updateMaster()
    {
        if (isset($_POST)) {
            $data = $_POST;
            unset($data['model']);
            try {
                if ($this->permissions['price_edit']) {
                    if ($this->CostsModel->updateMaster($data)) {
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

    //services
    public function viewService($service_id = null)
    {
        if (($service_id === null && $this->permissions['price_add']) || ($service_id != null && $this->permissions['price_edit'])) {
            $this->loadHeader();
            $service = $service_id !== null ? $this->CostsModel->getService($service_id) : ['price_category_id' => $_GET['category']];
            $styles = $service_id !== null ? $this->CostsModel->getStyles($service_id) : [];
            $style_categories = $service_id !== null ? $this->CostsModel->getStyleCategories($service_id) : [];
            $this->load->view('dashboard/price/service', array(
                'service' => $service,
                'styles' => $styles,
                'style_categories' => $style_categories,
                'fields' => $this->FieldsModel->getFields('price_services'),
                'files' => $this->FieldsModel->getFiles('price_services'),
            ));
            $this->loadFooter();
        } else {
            $this->viewNoPermission();
        }
    }

    public function addService()
    {
        $data = $this->input->post();
        unset($data['model']);
        unset($data['id']);
        if ($this->permissions['price_add']) {
            $id = $this->CostsModel->insertService($data);
            if ($id) {
                $this->createFolder('price/services', $id);
                redirect('dashboard/costs/service/' . $id, 'refresh');
            } else {
                echo 'Ошибка добавления услуги.<br>';
                echo 'Переданные параметры:<br>';
                var_dump($data);
                die();
            }
        } else {
            $this->viewNoPermission();
        }
    }

    public function deleteService()
    {
        $data = $this->input->post();
        if (!$this->permissions['price_delete']) {
            $this->viewNoPermission();
            return;
        }
        if ($this->CostsModel->deleteService($data['slug'])) {
            $dir = FCPATH . 'media/price/services' . '/' . $data['slug'];
            $this->deleteFolder($dir);
            redirect('dashboard/costs/category/' . $data['model'], 'refresh');
        } else {
            echo 'Не удалось удалить услугу. Пожалуйста удалите все подуслуги.';
        }
    }

    public function updateService()
    {
        if (isset($_POST)) {
            $data = $_POST;
            unset($data['model']);
            try {
                if ($this->permissions['price_edit']) {
                    if ($this->CostsModel->updateService($data)) {
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

    //style_categories
    public function viewStyleCategory($style_category_id = null)
    {
        if (($style_category_id === null && $this->permissions['price_add']) || ($style_category_id != null && $this->permissions['price_edit'])) {
            $this->loadHeader();
            $style_category = $style_category_id !== null ? $this->CostsModel->getStyleCategory($style_category_id) : ['price_service_id' => $_GET['service']];
            $this->load->view('dashboard/price/style_category', array(
                'style_category' => $style_category,
                'fields' => $this->FieldsModel->getFields('price_style_categories'),
            ));
            $this->loadFooter();
        } else {
            $this->viewNoPermission();
        }
    }

    public function addStyleCategory()
    {
        $data = $this->input->post();
        unset($data['model']);
        unset($data['id']);
        if ($this->permissions['price_add']) {
            $id = $this->CostsModel->insertStyleCategory($data);
            if ($id) {
                redirect('dashboard/costs/style_category/' . $id, 'refresh');
            } else {
                echo 'Ошибка добавления категории услуг.<br>';
                echo 'Переданные параметры:<br>';
                var_dump($data);
                die();
            }
        } else {
            $this->viewNoPermission();
        }
    }

    public function deleteStyleCategory()
    {
        $data = $this->input->post();
        if (!$this->permissions['price_delete']) {
            $this->viewNoPermission();
            return;
        }
        if ($this->CostsModel->deleteStyleCategory($data['slug'])) {
            redirect('dashboard/costs/service/' . $data['model'], 'refresh');
        } else {
            echo 'Не удалось удалить подкатегорию услуг.';
        }
    }

    public function updateStyleCategory()
    {
        if (isset($_POST)) {
            $data = $_POST;
            unset($data['model']);
            try {
                if ($this->permissions['price_edit']) {
                    if ($this->CostsModel->updateStyleCategory($data)) {
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

    //styles
    public function viewStyle($style_id = null)
    {
        if (($style_id === null && $this->permissions['price_add']) || ($style_id != null && $this->permissions['price_edit'])) {
            $this->loadHeader();
            $style = $style_id !== null ? $this->CostsModel->getStyle($style_id) : ['price_service_id' => $_GET['service']];
            $prices = $style_id !== null ? $this->CostsModel->getPrices($style_id) : [];
            $masters = $this->CostsModel->getMasters();

            $style['radio_list1'] = [];
            $style['radio_label1'] = 'Подкатегория услуг';
            $style['radio_name1'] = 'price_style_category_id';
            if (!empty($style['price_style_category_id'])) {
                $style['radio_value1'] = $style['price_style_category_id'];
            }
            $style_categories = $this->CostsModel->getStyleCategories($style['price_service_id']);
            foreach ($style_categories as $style_category) {
                $style['radio_list1'][] = ['slug' => $style_category['id'], 'name' => $style_category['name']];
            }

            $style['radio_list'] = [];
            $style['radio_label'] = 'Иконка специальной информации';
            $style['radio_name'] = 'special_information_price_icon_id';
            if (!empty($style['special_information_price_icon_id'])) {
                $style['radio_value'] = $style['special_information_price_icon_id'];
            }
            $icons = $this->CostsModel->getAllIcons();
            foreach ($icons as $icon) {
                $style['radio_list'][] = ['slug' => $icon['id'], 'name' => $icon['name']];
            }

            $this->load->view('dashboard/price/style', array(
                'masters' => $masters,
                'style' => $style,
                'prices' => $prices,
                'fields' => $this->FieldsModel->getFields('price_styles'),
            ));
            $this->loadFooter();
        } else {
            $this->viewNoPermission();
        }
    }

    public function addStyle()
    {
        $data = $this->input->post();
        unset($data['model']);
        unset($data['id']);
        if ($this->permissions['price_add']) {
            $id = $this->CostsModel->insertStyle($data);
            if ($id) {
                redirect('dashboard/costs/style/' . $id, 'refresh');
            } else {
                echo 'Ошибка добавления услуги.<br>';
                echo 'Переданные параметры:<br>';
                var_dump($data);
                die();
            }
        } else {
            $this->viewNoPermission();
        }
    }

    public function deleteStyle()
    {
        $data = $this->input->post();
        if (!$this->permissions['price_delete']) {
            $this->viewNoPermission();
            return;
        }
        if ($this->CostsModel->deleteStyle($data['slug'])) {
            redirect('dashboard/costs/service/' . $data['model'], 'refresh');
        } else {
            echo 'Не удалось удалить услугу.';
        }
    }

    public function updateStyle()
    {
        if (isset($_POST)) {
            $data = $_POST;
            unset($data['model']);
            try {
                if ($this->permissions['price_edit']) {
                    if ($this->CostsModel->updateStyle($data)) {
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

    //prices
    public function addPrice()
    {
        if (isset($_POST)) {
            try {
                if ($this->permissions['price_add']) {
                    $id = $this->CostsModel->insertPrice($_POST);
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
                    if ($this->CostsModel->updatePrice($_POST)) {
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
                    if ($this->CostsModel->deletePrice($_POST['id'])) {
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