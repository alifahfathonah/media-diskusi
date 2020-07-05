<?php

class Group_model extends CI_Model
{

  private $tableUser = 'user';
  private $tableGroup = 'grup';
  private $tableNotif = 'notif';
  private $tableRole = 'user_role';
  private $tableForumDiskusi = 'forum_diskusi';
  private $tableUserAccessGrup = 'user_access_grup';

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
    $this->db->or_like('jumlah_peserta', $value);
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
     * Syntax SQL cocok dalam kasus yang dibutuhkan -> 
     * Contoh : select * from grup join user on user.id=grup.id_user where group_desc like '%pptik%' and grup.id_user='3';
     */
    $field = ['group_name', 'group_desc', 'name', 'email', 'jumlah_peserta'];
    $sql = "SELECT * FROM " . $this->tableGroup . " JOIN " . $this->tableUser . " ON " . $this->tableUser . ".id=" . $this->tableGroup . ".id_user WHERE concat(" . implode(',', $field) . ") LIKE '%" . $value . "%' AND " . $this->tableGroup . ".id_user=" . $id;
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function getVerifikasi($id_grup)
  {
    $params = [
      'grup_id' => $id_grup,
      'status' => 'T'
    ];
    $query = $this->db->get_where($this->tableUserAccessGrup, $params);
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function getUserJoinAccessGrup($user_id, $grup_id, $status)
  {
    /**
     * Syntax Referensi :
     * select * from user u join user_access_grup uag on uag.user_id=u.id where uag.user_id='2' and uag.grup_id='58' and uag.status='T';
     */
    $sql = "SELECT * FROM " . $this->tableUser . " u JOIN " . $this->tableUserAccessGrup . " uag ON uag.user_id=u.id WHERE uag.user_id='" . $user_id . "' AND uag.grup_id='" . $grup_id . "' AND uag.status='" . $status . "'";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function terima($user_id, $grup_id)
  {
    $data = [
      'grup_id' => $grup_id,
      'user_id' => $user_id,
      'status' => 'Y'
    ];

    $params = [
      'grup_id' => $grup_id,
      'user_id' => $user_id
    ];

    $this->updateJumlahPesertaGroup($params['grup_id']);

    $pesan_text = 'telah diverifikasi!';
    $this->notifikasi($params['user_id'], $params['grup_id'], $pesan_text);

    $this->db->update($this->tableUserAccessGrup, $data, $params);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function tolak($user_id, $grup_id)
  {
    $params = [
      'grup_id' => $grup_id,
      'user_id' => $user_id
    ];
    $this->db->delete($this->tableUserAccessGrup, $params);
    if ($this->db->affected_rows() > 0) {
      return true;
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

  public function updateJumlahPesertaGroup($id_grup)
  {
    $grup = $this->db->get_where($this->tableGroup, ['id_grup' => $id_grup])->row_array();
    $jumlah_peserta = (int) $grup['jumlah_peserta'];
    $jumlah_peserta++;
    $data = [
      'jumlah_peserta' => $jumlah_peserta
    ];
    $this->db->update($this->tableGroup, $data, ['id_grup' => $id_grup]);
  }

  public function notifikasi($user_id, $grup_id, $pesan_text)
  {
    $grup = $this->db->get_where($this->tableGroup, ['id_grup' => $grup_id])->row_array();
    $group_name = $grup['group_name'];
    $data = [
      'text_notif' => $group_name . ' ' . $pesan_text,
      'id_user' => $user_id
    ];

    $this->db->insert($this->tableNotif, $data);
  }

  public function getGroupByIdGroup($id_grup)
  {
    $query = $this->db->get_where($this->tableGroup, ['id_grup' => $id_grup]);

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function getAllGroup()
  {
    $query = $this->db->get($this->tableGroup);

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  public function join($idUser, $idGrup)
  {
    $params = [
      'grup_id' => $idGrup,
      'user_id' => $idUser
    ];

    $result = $this->db->get_where($this->tableUserAccessGrup, $params);
    if ($result->num_rows() > 0) {
      return true;
    } else {
      // T artinya "Tidak" & jika diterima verifikasi maka akan berubah menjasi Y : Ya
      $params['status'] = 'T';
      $this->db->insert($this->tableUserAccessGrup, $params);
    }
  }

  public function getJumlahPost($id_grup)
  {
    $sql = "SELECT count(text_content) jumlah_post FROM " . $this->tableForumDiskusi . " WHERE id_grup='" . $id_grup . "'";
    $query = $this->db->query($sql);

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }
}
