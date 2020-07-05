<?php

class Diskusi_model extends CI_Model
{

  private $tableUser = 'user';
  private $tableGroup = 'grup';
  private $tableForumDiskusi = 'forum_diskusi';
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

  public function getForumDiskusi($id_grup)
  {
    $sql = "SELECT * FROM " . $this->tableForumDiskusi . " WHERE id_grup='" . $id_grup . "' ORDER BY id_forum DESC";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function getForumDiskusiJoinUser($id_grup)
  {
    /**
     * Refrensi Syntax : 
     * select * from forum_diskusi f join user u on f.id_user=u.id where id_grup='58';
     */
    $sql = "SELECT * FROM " . $this->tableForumDiskusi . " f JOIN " . $this->tableUser . " u ON f.id_user=u.id WHERE id_grup='" . $id_grup . "' ORDER BY id_forum DESC";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function postDiskusi($data)
  {
    return $this->db->insert($this->tableForumDiskusi, $data);
  }
}
