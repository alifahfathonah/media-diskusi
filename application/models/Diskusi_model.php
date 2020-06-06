<?php

class Diskusi_model extends CI_Model
{

  private $tableGroup = 'grup';

  public function getGroup()
  {
    $query = $this->db->get($this->tableGroup);
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function cariGroup($value)
  {
    $this->db->like('group_name', $value);
    $this->db->or_like('group_desc', $value);
    $this->db->or_like('jumlah_peserta', $value);
    $query = $this->db->get($this->tableGroup);
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }
}
