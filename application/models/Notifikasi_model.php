<?php

class Notifikasi_model extends CI_Model
{

  private $tableNotif = 'notif';

  // testing sementara
  public function getNotifikasi()
  {
    $notif = $this->db->get($this->tableNotif);
    if ($notif->num_rows() > 0) {
      return $notif->result();
    } else {
      return false;
    }
  }
}
