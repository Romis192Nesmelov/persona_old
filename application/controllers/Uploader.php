<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uploader extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Authentication');
        if ($this->authentication->is_logged_in()) {
            $this->load->helper('url');
            $this->load->model('FieldsModel');
        } else {
            //echo json_encode(array('status' => 'fail', 'message' => 'Auth error.', 'code' => '999'));
            die('Auth error');
        }
    }

    /* Upload single image */
    public function uploadImage()
    {
        /*
         * Response codes
         * 000 - Нет ошибок
         * 001 - Нет данных
         * 002 - Ошибка получения параметров файла
         * 003 - Ошибка получения пути файла
         * 004 - Ошибка перемещения файла
         * 005 - Требования не соблюдены
         * 006 - Нет папки салона
         * 010 - Нет ошибок, добавить доп форму для загрузки файла в галерею
         */
        header('Content-type:application/json;charset=utf-8');
        if (isset($_POST) &&
            isset($_FILES) &&
            array_key_exists('upload', $_FILES) &&
            count($_FILES['upload']) > 0 &&
            array_key_exists('slug', $_POST) &&
            array_key_exists('img_name', $_POST) &&
            array_key_exists('type', $_POST)
        ) {
            $type = $_POST['type'];
            if ($this->authentication->has_permission($type . '_upload')) {
                $img_name = $_POST['img_name'];
                $valid_ext = mb_strtolower($_POST['ext']);
                $tmpFilePath = $_FILES['upload']['tmp_name'][0];
                $tmpFileType = $_FILES['upload']['type'][0];
                $tmpFileExtension = pathinfo($_FILES['upload']['name'][0], PATHINFO_EXTENSION);
                $tmpFileExtension = mb_strtolower($tmpFileExtension);
                if ($tmpFileExtension == 'jpeg') {
                    $tmpFileExtension = 'jpg';
                }
                $tmpFileSize = $_FILES['upload']['size'][0];
                $tmpImageInfo = getimagesize($_FILES['upload']['tmp_name'][0]);
                if ($tmpImageInfo) {
                    if (
                        $tmpFileType != $_POST['mime'] ||
                        $tmpImageInfo['mime'] != $_POST['mime'] ||
                        $tmpFileExtension != $valid_ext ||
                        $tmpFileSize > $_POST['max_size'] ||
                        $tmpImageInfo[0] > $_POST['max_width'] ||
                        $tmpImageInfo[0] < $_POST['min_width'] ||
                        $tmpImageInfo[1] > $_POST['max_height'] ||
                        $tmpImageInfo[1] < $_POST['min_height']) {
                        echo json_encode(array('status' => 'fail', 'message' => 'Изображение не удовлетворяет требованиям.', 'code' => '005', 'params' => $tmpFileSize));
                        die();
                    }
                    // Make sure we have a file path
                    if ($tmpFilePath != '') {
                        // Setup new file path
                        $dir = './media/' . $_POST['type'] . '/' . $_POST['slug'];
                        if (!file_exists($dir)) {
                            mkdir($dir, 0777, true);
                        }
                        $newFilePath = './media/' . $_POST['type'] . '/' . $_POST['slug'] . '/' . $img_name . '.' . $tmpFileExtension;
                        // Upload the file into the temp dir
                        if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                            // Create path to update image in frontend
                            $src = 'media/' . $_POST['type'] . '/' . $_POST['slug'] . '/' . $img_name . '.' . $tmpFileExtension;
                            $dst = 'media/' . $_POST['type'] . '/' . $_POST['slug'];
                            $image = imagecreatefromstring(file_get_contents($src));
                            imagejpeg($image, $src, 90);
                            imagewebp($image, $dst . '/' . $img_name . '.webp');
                            imagedestroy($image);
                            echo json_encode(['status' => 'ok', 'message' => 'Изображение загружено.', 'code' => '000', 'name' => $img_name . '.' . $tmpFileExtension, 'path' => $src]);
                            die();
                        } else {
                            echo json_encode(array('status' => 'fail', 'message' => 'Изображение не загружено, попробуйте еще раз!', 'code' => '004'));
                            die();
                        }
                    } else {
                        echo json_encode(array('status' => 'fail', 'message' => 'Изображение не загружено, попробуйте еще раз!', 'code' => '003'));
                        die();
                    }
                } else {
                    echo json_encode(array('status' => 'fail', 'message' => 'Изображение не загружено, попробуйте еще раз!', 'code' => '002'));
                    die();
                }
            } else {
                echo json_encode(array('status' => 'fail', 'message' => 'Изображение не загружено, у вас нет прав!', 'code' => '999'));
                die();
            }
        } else {
            echo json_encode(array('status' => 'fail', 'message' => 'Изображение не загружено, попробуйте еще раз!', 'code' => '001'));
            die();
        }
    }

    public function diverse_array($vector)
    {
        $result = array();
        foreach ($vector as $key1 => $value1)
            foreach ($value1 as $key2 => $value2)
                $result[$key2][$key1] = $value2;
        return $result;
    }

    /* Upload single image */
    public function uploadMassImage()
    {
        header('Content-type:application/json;charset=utf-8');
        if (isset($_POST) &&
            isset($_FILES) &&
            array_key_exists('upload', $_FILES) &&
            count($_FILES['upload']) > 0 &&
            array_key_exists('slug', $_POST) &&
            array_key_exists('number', $_POST) &&
            array_key_exists('type', $_POST)
        ) {
            $type = $_POST['type'];
            $files = $this->diverse_array($_FILES['upload']);
            if ($this->authentication->has_permission($type . '_upload')) {
                $startNumber = $_POST['number'];
                $valid_ext = mb_strtolower($_POST['ext']);
                $errors = [];
                for ($i = 0; $i < count($files); $i++) {
                    $file = $files[$i];
                    $tmpFilePath = $file['tmp_name'];
                    $tmpFileType = $file['type'];
                    $tmpFileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
                    $tmpFileExtension = mb_strtolower($tmpFileExtension);
                    if ($tmpFileExtension == 'jpeg') {
                        $tmpFileExtension = 'jpg';
                    }
                    $tmpFileSize = $file['size'];
                    $tmpImageInfo = getimagesize($file['tmp_name']);
                    if ($tmpImageInfo) {
                        if (
                            $tmpFileType != $_POST['mime'] ||
                            $tmpImageInfo['mime'] != $_POST['mime'] ||
                            $tmpFileExtension != $valid_ext ||
                            $tmpFileSize > $_POST['max_size'] ||
                            $tmpImageInfo[0] > $_POST['max_width'] ||
                            $tmpImageInfo[0] < $_POST['min_width'] ||
                            $tmpImageInfo[1] > $_POST['max_height'] ||
                            $tmpImageInfo[1] < $_POST['min_height']) {
                            $errors[] = ['image' => $file['name'], 'message' => 'не удовлетворяет требованиям.'];
                        }
                        // Make sure we have a file path
                        if ($tmpFilePath == '') {
                            $errors[] = ['image' => $file['name'], 'message' => 'не загружен или поврежден, попробуйте еще раз!'];
                        }
                    } else {
                        $errors[] = ['image' => $file['name'], 'message' => 'не загружен или поврежден, попробуйте еще раз!'];
                    }
                }
                if (empty($errors)) {
                    for ($i = 0; $i < count($files); $i++) {
                        $file = $files[$i];
                        $tmpFilePath = $file['tmp_name'];
                        $tmpFileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
                        $tmpFileExtension = mb_strtolower($tmpFileExtension);
                        if ($tmpFileExtension == 'jpeg') {
                            $tmpFileExtension = 'jpg';
                        }

                        $directory = './media/' . $_POST['type'] . '/' . $_POST['slug'];
                        if (!file_exists($directory)) {
                            mkdir($directory, 0777, true);
                        }
                        $fileName = 'gallery-' . ($startNumber + $i);
                        $src =  $directory . '/' . $fileName . '.' . $tmpFileExtension;
                        if (!move_uploaded_file($tmpFilePath, $src)) {
                            $errors[] = ['image' => $file['name'], 'message' => 'не удалось загрузить, ошибка сервера'];
                        } else {
                            $image = imagecreatefromstring(file_get_contents($src));
                            imagejpeg($image, $src, 90);
                            imagewebp($image, $directory . '/' . $fileName . '.webp');
                            imagedestroy($image);
                        }

                    }
                    if (empty($errors)) {
                        echo json_encode(['status' => 'ok', 'message' => 'Изображения успешно загружены']);
                    } else {
                        echo json_encode(['server_errors' => $errors]);
                    }
                } else {
                    echo json_encode(['validate_errors' => $errors]);
                    die();
                }
            } else {
                echo json_encode(array('status' => 'fail', 'message' => 'Изображения не загружены, у вас нет прав!', 'code' => '999'));
                die();
            }
        } else {
            echo json_encode(array('status' => 'fail', 'message' => 'Изображение не загружено, попробуйте еще раз!', 'code' => '001'));
            die();
        }
    }

    public function deleteImage()
    {
        header('Content-type:application/json;charset=utf-8');
        $type = $_POST['type'];
        if ($this->authentication->has_permission($type . '_upload')) {
            if (isset($type) && isset($_POST['slug']) && isset($_POST['img_name']) && isset($_POST['ext'])) {
                $path_jpg = FCPATH . '/media/' . $type . '/' . $_POST['slug'] . '/' . $_POST['img_name'] . '.' . $_POST['ext'];
                $path_webp = FCPATH . '/media/' . $type . '/' . $_POST['slug'] . '/' . $_POST['img_name'] . '.webp';
                if (unlink($path_jpg)) {
                    unlink($path_webp);
                    echo json_encode(array('status' => 'ok', 'message' => 'Изображение успешно удалено'));
                } else {
                    echo json_encode(array('status' => 'fail', 'message' => 'Изображение не удалено, попробуйте перезагрузить страницу и попробовать еще раз'));
                }
            } else {
                echo json_encode(array('status' => 'fail', 'message' => 'Изображение не удалено, неверные параметры!'));
            }
        } else {
            echo json_encode(array('status' => 'fail', 'message' => 'Изображение не удалено, недостаточно прав!'));
        }
        die();
    }
}