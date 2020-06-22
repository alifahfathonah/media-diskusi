<?php

class Diskusi_model extends CI_Model
{

  private $tableGroup = 'grup';
  private $tableUserAccessGrup = 'user_access_grup';

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

  public function gabungGroup($idUser, $idGrup)
  {
    $params = [
      'grup_id' => $idGrup,
      'user_id' => $idUser
    ];

    $result = $this->db->get_where($this->tableUserAccessGrup, $params);
    if ($result->num_rows() > 0) {
      return true;
    } else {
      $params['status'] = 'T';
      $this->db->insert($this->tableUserAccessGrup, $params);
    }
  }

  public function keluarGroup($id_user, $id_grup)
  {
    $params = [
      'grup_id' => $id_grup,
      'user_id' => $id_user
    ];

    $result = $this->db->get_where($this->tableUserAccessGrup, $params);
    if ($result->num_rows() > 0) {
      if ($this->db->delete($this->tableUserAccessGrup, $params)) {
        return true;
      }
    } else {
      return false;
    }
  }

  public function getUserGroupAccess($user_id)
  {
    /**
     * Syntax Referensi :
     * select * from grup g join user_access_grup uag on g.id_grup=uag.grup_id where uag.user_id='1' and uag.status='Y';
     */

    $params = [
      'user_id' => $user_id,
      'status' => 'Y'
    ];

    $sql = "SELECT * FROM " . $this->tableGroup . " g JOIN " . $this->tableUserAccessGrup . " uag ON g.id_grup=uag.grup_id WHERE uag.user_id='" . $params['user_id'] . "' AND uag.status='" . $params['status'] . "'";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }
}
