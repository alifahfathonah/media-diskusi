<?php

class User_model extends CI_Model
{

  private $tableUser = 'user';
  private $tableForumDiskusi = 'forum_diskusi';
  private $tableComment = 'comment';

  public function edit($table, $data)
  {
    if ($data['image']) {
      $this->db->set('image', $data['image']);
    }
    $this->db->set('name', $data['name']);
    $this->db->where('email', $data['email']);
    $this->db->update($table);
  }

  public function getUserByEmail($table, $email)
  {
    return $this->db->get_where($table, ['email' => $email])->row_array();
  }

  public function getUser($email)
  {
    $query = $this->db->get_where($this->tableUser, ['email' => $email]);
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  public function getMyPost($id_user)
  {
    $sql = "SELECT * FROM " . $this->tableForumDiskusi . " f JOIN " . $this->tableUser . " u ON f.id_user=u.id WHERE f.id_user='" . $id_user . "'";
    $query = $this->db->query($sql);

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function getComment($id_forum)
  {
    /**
     * Refrensi Syntax : 
     * select * from comment c join user u on c.id_user=u.id where id_forum='28';
     */
    $sql = "SELECT * FROM " . $this->tableComment . " c JOIN " . $this->tableUser . " u ON c.id_user=u.id WHERE id_forum='" . $id_forum . "' ORDER BY c.id ASC";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }
}
