<?php

class Group_model extends CI_Model
{

  public function getGroup($table)
  {
    return $this->db->get($table)->result_array();
  }

  public function tambahGroup($table, $data)
  {
    $this->db->insert($table, $data);
  }

  public function hapusGroup($table, $id)
  {
    $this->db->delete($table, ['id' => $id]);
  }

  public function ubahGroup($table, $data)
  {
    $this->db->update($table, $data, ['id' => $data['id']]);
  }

  public function getGroupById($table, $id)
  {
    return $this->db->get_where($table, ['id' => $id])->row_array();
  }
}
