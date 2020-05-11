<?php

class Menu_model extends CI_Model
{

  public function getSubMenu()
  {
    $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
              FROM `user_sub_menu` JOIN `user_menu`
              ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";
    return $this->db->query($query)->result_array();
  }

  public function getSubMenuJoinMenu($table, $limit, $start, $keyword = null)
  {
    if ($keyword) {
      $this->db->like('title', $keyword);
    }
    return $this->db->get($table, $limit, $start)->result_array();
  }

  public function getMenu($table, $limit, $start, $keyword = null)
  {
    if ($keyword) {
      $this->db->like('menu', $keyword);
    }
    return $this->db->get($table, $limit, $start)->result_array();
  }

  public function tambahSubMenu($table, $data)
  {
    $this->db->insert($table, $data);
  }

  public function tambahMenu($table, $data)
  {
    $this->db->insert($table, $data);
  }

  public function hapusMenu($table, $id)
  {
    $this->db->delete($table, ['id' => $id]);
  }

  public function getMenuById($table, $id)
  {
    return $this->db->get_where($table, ['id' => $id])->row_array();
  }

  public function getSubMenuById($table, $id)
  {
    return $this->db->get_where($table, ['id' => $id])->row_array();
  }

  public function ubahMenu($table, $data)
  {
    $this->db->update($table, $data, ['id' => $data['id']]);
  }

  public function hapusSubMenu($table, $id)
  {
    $this->db->delete($table, ['id' => $id]);
  }

  public function ubahSubMenu($table, $data)
  {
    $this->db->update($table, $data, ['id' => $data['id']]);
  }

  public function jumlahSubMenu($table)
  {
    return $this->db->get($table)->num_rows();
  }
}
