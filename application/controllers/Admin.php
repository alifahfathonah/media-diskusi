<?php

class Admin extends CI_Controller
{

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
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->admin->getAllRole($this->tableUserRole);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/role', $data);
    $this->load->view('templates/footer');
  }

  public function roleAccess($id)
  {
    $data['title'] = 'Role Access';
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

  public function changeaccess()
  {
    $menu_id = $this->input->post('menuId');
    $role_id = $this->input->post('roleId');

    $data = [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ];

    $result = $this->db->get_where('user_access_menu', $data);

    if ($result->num_rows() < 1) {
      $this->db->insert('user_access_menu', $data);
    } else {
      $this->db->delete('user_access_menu', $data);
    }

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
  }
}
