<?php

class Group_model extends CI_Model
{

  private $tableGroup = 'grup';
  private $tableUser = 'user';

  public function getUserByEmail($table, $email)
  {
    return $this->db->get_where($table, ['email' => $email])->row_array();
  }

  public function getGroup()
  {
    $query = $this->db->get($this->tableGroup);
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function cariGroup($table, $match)
  {
    $field = ['group_name', 'group_desc', 'id_user', 'id'];
    $this->db->like('concat(' . implode(',', $field) . ')', $match);
    $query = $this->db->get($table);
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function tambahGroup($table, $data)
  {
    return $this->db->insert($table, $data);
  }

  public function ubahGroup($table, $data, $id)
  {
    $this->db->update($table, $data, ['id' => $id]);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function hapusGroup($table, $id)
  {
    $this->db->delete($table, ['id' => $id]);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
}
