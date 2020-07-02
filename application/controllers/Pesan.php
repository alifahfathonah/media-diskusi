<?php

class Pesan extends CI_Controller
{

  private $singleUser;
  private $tableUser = 'user';

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Pesan_model', 'pesan');
    $this->singleUser = $this->db->get_where($this->tableUser, ['email' => $this->session->userdata('email')])->row_array();
  }

  public function index()
  {
    $data = [
      'title' => 'Pesan',
      'user' => $this->singleUser
    ];

    $this->load->view('templates/diskusi-template/header', $data);
    $this->load->view('templates/diskusi-template/sidebar', $data);
    $this->load->view('templates/diskusi-template/topbar', $data);
    $this->load->view('pesan/index', $data);
    $this->load->view('templates/diskusi-template/footer');
  }
}
