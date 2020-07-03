<?php

class Notifikasi extends CI_Controller
{

  private $tableUser = 'user';
  private $singleUser;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Notifikasi_model', 'notifikasi');
    $this->singleUser = $this->db->get_where($this->tableUser, ['email' => $this->session->userdata('email')])->row_array();
  }

  public function index()
  {
    $data = [
      'title' => 'Notifikasi',
      'user' => $this->singleUser
    ];

    $this->load->view('templates/diskusi-template/header', $data);
    $this->load->view('templates/diskusi-template/sidebar', $data);
    $this->load->view('templates/diskusi-template/topbar', $data);
    $this->load->view('notifikasi/index', $data);
    $this->load->view('templates/diskusi-template/chat_sidebar', $data);
    $this->load->view('templates/diskusi-template/footer');
  }
}
