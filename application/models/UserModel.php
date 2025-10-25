<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function isUserExist($login, $password)
    {
        $query = $this->db->get_where('users', array('login' => $login, 'password' => $password));
        if ($query->num_rows() === 0) {
            return false;
        } else {
            return true;
        }
    }

    public function getUserPermissions($login)
    {
        $this->db->select('user_types.*');
        $this->db->join('users', 'user_types.id = users.type');
        $query = $this->db->get_where('user_types', array('users.login' => $login));
        if ($query->num_rows() === 0) {
            return false;
        } else {
            return $query->row_array();
        }
    }

    public function hasPermission($login, $permission)
    {
        $this->db->select($permission);
        $this->db->join('users', 'user_types.id = users.type');
        $query = $this->db->get_where('user_types', array('users.login' => $login));
        if ($query->num_rows() === 0) {
            return false;
        } else {
            $perm = $query->row_array();
            if ($perm[$permission]) {
                return true;
            } else {
                return false;
            }
        }
    }
}