<?php

class Group extends CI_Controller
{

  private $tableUser = 'user';
  private $tableGroup = 'grup';

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('Group_model', 'group');
  }

  public function index()
  {
    $data['title'] = 'Group Management';
    $data['user'] = $this->db->get($this->tableUser, ['email' => $this->session->userdata('email')])->row_array();
    $data['group'] = $this->group->getGroup($this->tableGroup);

    $this->form_validation->set_rules('namaGroupTambah', 'Nama group harus diisi!', 'required|trim');
    $this->form_validation->set_rules('deskripsiGroupTambah', 'Deskripsi group harus diisi!', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('group/index', $data);
      $this->load->view('templates/footer');
    } else {
      $id_user = $this->db->get_where($this->tableUser, ['email' => $this->session->userdata('email')])->row_array()['id'];
      $insert = [
        'id' => null,
        'group_name' => htmlspecialchars($this->input->post('namaGroupTambah', true)),
        'group_desc' => htmlspecialchars($this->input->post('deskripsiGroupTambah', true)),
        'id_user' => $id_user
      ];
      $this->group->tambahGroup($this->tableGroup, $insert);
      $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Group berhasil dibuat!</div>');
      redirect('group');
    }
  }

  public function getUbahGroup()
  {
    echo json_encode($this->group->getGroupById($this->tableGroup, $this->input->post('id')));
  }

  public function ubahGroup()
  {
    $id_user = $this->db->get_where($this->tableUser, ['email' => $this->session->userdata('email')])->row_array()['id'];
    $data = [
      'id' => $this->input->post('idGroupUbah'),
      'group_name' => htmlspecialchars($this->input->post('namaGroupUbah', true)),
      'group_desc' => htmlspecialchars($this->input->post('deskripsiGroupUbah', true)),
      'id_user' => $id_user
    ];

    $this->group->ubahGroup($this->tableGroup, $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Group berhasil diubah!</div>');
    redirect('group');
  }

  public function hapusGroup($id)
  {
    $this->group->hapusGroup($this->tableGroup, $id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Group berhasil dihapus!</div>');
    redirect('group');
  }
}
