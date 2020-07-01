<?php

class Verifikasi extends CI_Controller
{

  private $singleUser;
  private $tableUser = 'user';

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Verifikasi_model', 'verifikasi');
    $this->singleUser = $this->db->get_where($this->tableUser, ['email' => $this->session->userdata('email')])->row_array();
  }

  public function index()
  {
    $data = [
      'title' => 'Verifikasi',
      'user' => $this->singleUser
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('verifikasi/index', $data);
    $this->load->view('templates/footer');
  }
}
