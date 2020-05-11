<?php

class Admin extends CI_Controller
{

  private $dataSingleUser;

  /**
   * kelebihan menggunakan cara seperti ini
   * ketika nama table suatu saat berubah maka
   * kita cukup merubah satu kali saja.
   */
  private $tableUser = 'user';
  private $tableUserRole = 'user_role';
  private $tableMenu = 'user_menu';
  private $tableUserAccessMenu = 'user_access_menu';

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('Admin_model', 'admin');
    $this->dataSingleUser = $this->admin->getUserByEmail($this->tableUser, $this->session->userdata('email'));
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['user'] = $this->admin->getUserByEmail($this->tableUser, $this->session->userdata('email'));

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
  }

  public function role()
  {
    $data['title'] = 'Role';
    $data['user'] = $this->db->get_where($this->tableUser, ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->admin->getAllRole($this->tableUserRole);

    $this->form_validation->set_rules('roleTambah', 'Role', 'required|trim', [
      'required' => 'Role harus diisi.'
    ]);
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/role', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'role' => htmlspecialchars($this->input->post('roleTambah', true))
      ];
      $this->admin->tambahRole($this->tableUserRole, $data);
      $this->session->set_flashdata('message', 'Ditambahkan');
      redirect('admin/role');
    }
  }

  public function getUbahRole()
  {
    echo json_encode($this->admin->getRoleById($this->tableUserRole, $this->input->post('id')));
  }

  public function ubahRole()
  {
    $data = [
      'id' => $this->input->post('idUbah', true),
      'role' => htmlspecialchars($this->input->post('roleUbah', true))
    ];

    $this->admin->ubahRole($this->tableUserRole, $data);
    $this->session->set_flashdata('message', 'Diubah');
    redirect('admin/role');
  }

  public function hapusRole($id)
  {
    $this->admin->hapusRole($this->tableUserRole, $id);
    $this->session->set_flashdata('message', 'Dihapus');
    redirect('admin/role');
  }

  public function roleAccess($id)
  {
    $data['title'] = 'Role';
    $data['user'] = $this->admin->getUserByEmail($this->tableUser, $this->session->userdata('email'));

    $data['role'] = $this->admin->getRoleById($this->tableUserRole, $id);

    $this->db->where('id !=', 1);
    $data['menu'] = $this->admin->getAllMenu($this->tableMenu);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/role_access', $data);
    $this->load->view('templates/footer');
  }

  public function changeRoleAccess()
  {
    $menu_id = $this->input->post('menuId');
    $role_id = $this->input->post('roleId');

    $data = [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ];

    $result = $this->db->get_where($this->tableUserAccessMenu, $data);

    if ($result->num_rows() < 1) {
      $this->db->insert($this->tableUserAccessMenu, $data);
    } else {
      $this->db->delete($this->tableUserAccessMenu, $data);
    }

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
  }

  public function changeUserAccess()
  {
    $user_id = $this->input->post('userId');
    $role_id = $this->input->post('roleId');
    $this->admin->ubahUserRole($this->tableUser, $user_id, $role_id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User access berhasil diubah!</div>');
  }

  public function userAccess()
  {
    $data['title'] = 'User Access';
    $data['user'] = $this->dataSingleUser;

    $data['allUser'] = $this->admin->getAllUser($this->tableUser);
    $data['role'] = $this->admin->getAllRole($this->tableUserRole);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/user_access', $data);
    $this->load->view('templates/footer');
  }
}
