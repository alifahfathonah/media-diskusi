<?php

class Notifikasi extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Notifikasi_model', 'notifikasi');
  }

  // testing sementara
  public function getNotifikasi()
  {
    $notifikasi = $this->notifikasi->getNotifikasi();
    var_dump($notifikasi);
    die;
  }
}
