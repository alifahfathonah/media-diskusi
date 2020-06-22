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
    $this->load->view('diskusi/group_diskusi');
    $this->load->view('templates/footer');
  }

  // fungsi untuk view group_diskusi
  public function tampilSemuaGroup()
  {
    $user = $this->singleUser;
    $group = $this->diskusi->getGroup();
    if ($group) {
      $result = [
        'groupDiskusi' => $group,
        'userData' => $user
      ];
    }

    echo json_encode($result);
  }

  // fungsi untuk view diskusi/index
  public function tampilSemuaData()
  {
    $user = $this->singleUser;
    $data = $this->diskusi->getUserGroupAccess($user['id']);
    if ($data) {
      $result = [
        'data' => $data
      ];
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

  public function gabungGroup()
  {
    $id_user = $this->input->post('id_user');
    $id_grup = $this->input->post('id_grup');
    $check = $this->diskusi->gabungGroup($id_user, $id_grup);

    if ($check) {
      $result = [
        'status' => true,
        'data' => $this->singleUser
      ];
    }

    echo json_encode($result);
  }

  public function keluarGroup()
  {
    $id_user = $this->input->post('id_user');
    $id_grup = $this->input->post('id_grup');
    $check = $this->diskusi->keluarGroup($id_user, $id_grup);

    if ($check) {
      $result = [
        'status' => true,
        'pesan' => 'Anda berhasil keluar group!'
      ];
    } else {
      $result = [
        'status' => false,
        'pesan' => 'Anda bukan peserta group!'
      ];
    }

    echo json_encode($result);
  }
}
