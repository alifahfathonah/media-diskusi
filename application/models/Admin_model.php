<?php

class Admin_model extends CI_Model
{

  public function getAllRole($table)
  {
    return $this->db->get($table)->result_array();
  }

  public function getUserByEmail($table, $email)
  {
    return $this->db->get_where($table, ['email' => $email])->row_array();
  }

  public function getRoleById($table, $id)
  {
    return $this->db->get_where($table, ['id' => $id])->row_array();
  }

  public function getAllMenu($table)
  {
    return $this->db->get($table)->result_array();
  }
}
