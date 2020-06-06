<?php

class Diskusi extends CI_Controller
{

  private $singleUser;

  private $tableUser = 'user';

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Diskusi_model', 'diskusi');
    $this->singleUser = $this->db->get_where($this->tableUser, ['email' => $this->session->userdata('email')])->row_array();
  }

  public function index()
  {
    $data['title'] = 'Forum Diskusi';
    $data['user'] = $this->singleUser;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('diskusi/index');
    $this->load->view('templates/footer');
  }

  public function forum()
  {
    $data['title'] = 'Forum Diskusi';
    $data['user'] = $this->singleUser;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/forum/sidebar_right');
    $this->load->view('diskusi/forum_diskusi');
    $this->load->view('templates/footer');
  }

  public function group()
  {
    $data['title'] = 'Group';
    $data['user'] = $this->singleUser;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('diskusi/group');
    $this->load->view('templates/footer');
  }

  public function tampilSemuaGroup()
  {
    $group = $this->diskusi->getGroup();
    if ($group) {
      $result['groupDiskusi'] = $group;
    }

    echo json_encode($result);
  }

  public function cariGroup()
  {
    $value = $this->input->post('cariGroupDiskusi');
    $group = $this->diskusi->cariGroup($value);
    if ($group) {
      $result['groupDiskusi'] = $group;
    }

    echo json_encode($result);
  }
}
