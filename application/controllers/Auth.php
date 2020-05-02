<?php

class Auth extends CI_Controller
{

  private $userTable = 'user';

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Auth_model');
  }

  public function index()
  {
    $data['title'] = 'Login';

    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      $this->login();
    }
  }

  private function login()
  {
    $email = $this->input->post('email', true);
    $password = $this->input->post('password', true);

    $user = $this->db->get_where('user', ['email' => $email])->row_array();
    if ($user) { // terdapat user dengan email tsb.
      if ($user['is_active'] == 1) { // jika user aktif.
        if (password_verify($password, $user['password'])) { // jika password cocok.
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          if ($user['role_id'] == 1) {
            redirect('admin');
          } else {
            redirect('user');
          }
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Password tidak sesuai.</div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Email belum diaktifasi.</div>');
        redirect('auth');
      }
    } else {
      // tidak terdapat user dengan email tsb.
      $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Email tidak terdaftar.</div>');
      redirect('auth');
    }
  }

  public function registration()
  {
    $data['title'] = 'Registration';
    $this->form_validation->set_rules('name', 'Name', 'required|trim', [
      'required' => 'Nama harus diisi!'
    ]);
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'Email sudah digunakan!',
      'required' => 'Email harus diisi!'
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
      'matches' => 'Password tidak sama!',
      'min_length' => 'Password minimal 8 karakter!',
      'required' => 'Password harus diisi!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/auth/auth_header', $data);
      $this->load->view('auth/registration');
      $this->load->view('templates/auth/auth_footer');
    } else {
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'image' => 'default.jpg',
        'password' => htmlspecialchars(password_hash($this->input->post('password1', true), PASSWORD_DEFAULT)),
        'role_id' => 2,
        'is_active' => 1,
        'date_created' => time()
      ];

      $this->Auth_model->registration($this->userTable, $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Selamat! Anda berhasil daftar.</div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Anda telah keluar.</div>');
    redirect('auth');
  }
}
