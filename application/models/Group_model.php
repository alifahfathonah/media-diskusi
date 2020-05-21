<?php

class Group_model extends CI_Model
{

  private $tableGroup = 'grup';
  private $tableUser = 'user';
  private $tableRole = 'user_role';

  public function getUserByEmail($table, $email)
  {
    return $this->db->get_where($table, ['email' => $email])->row_array();
  }

  public function getGroup()
  {
    $this->db->select('*')->from($this->tableGroup);
    $this->db->join($this->tableUser . ' u', 'u.id=' . $this->tableGroup . '.id_user');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function getGroupByIdUser($id)
  {
    $this->db->join($this->tableUser . ' u', 'u.id=' . $this->tableGroup . '.id_user');
    $query = $this->db->get_where($this->tableGroup, ['id_user' => $id]);
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function cariGroup($value) // cari group ini digunakan untuk admin
  {
    $this->db->like('group_name', $value);
    $this->db->or_like('group_desc', $value);
    $this->db->or_like('name', $value);
    $this->db->or_like('email', $value);
    $this->db->join($this->tableUser . ' u', 'u.id=' . $this->tableGroup . '.id_user');
    $this->db->from($this->tableGroup);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function cariGroupByIdUser($value, $id) // cari group ini digunakan untuk member selain admin
  {

    /**
     * Syntax SQL yang cocok dalam kasus dibutuhkan -> 
     * Contoh : select * from grup join user on user.id=grup.id_user where group_desc like '%pptik%' and grup.id_user='3';
     */
    $field = ['group_name', 'group_desc', 'name', 'email'];
    $sql = "SELECT * FROM " . $this->tableGroup . " JOIN " . $this->tableUser . " ON " . $this->tableUser . ".id=" . $this->tableGroup . ".id_user WHERE concat(" . implode(',', $field) . ") LIKE '%" . $value . "%' AND " . $this->tableGroup . ".id_user=" . $id;
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function tambahGroup($data)
  {
    return $this->db->insert($this->tableGroup, $data);
  }

  public function ubahGroup($table, $data, $id)
  {
    $this->db->update($table, $data, ['id_grup' => $id]);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function hapusGroup($table, $id)
  {
    $this->db->delete($table, ['id_grup' => $id]);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function getRoleName($roleId)
  {
    $role = $this->db->get_where($this->tableRole, ['id' => $roleId])->row_array();
    if ($role) {
      return $role['role'];
    } else {
      return false;
    }
  }
}
