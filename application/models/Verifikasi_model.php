<?php

class Verifikasi_model extends CI_Model
{

  private $tableUserAccessGrup = 'user_access_grup';
  private $tableUser = 'user';

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

  public function accept($user_id, $grup_id)
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

  public function remove($user_id, $grup_id)
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
}
