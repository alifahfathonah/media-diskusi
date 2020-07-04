<?php

class User extends CI_Controller
{

  private $dataSingleUser;

  private $tableUser = 'user';

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('User_model', 'user');
    $this->dataSingleUser = $this->user->getUserByEmail($this->tableUser, $this->session->userdata('email'));
  }

  public function index()
  {
    $data['title'] = 'Home';
    $data['user'] = $this->dataSingleUser;

    $this->load->view('templates/diskusi-template/header', $data);
    $this->load->view('templates/diskusi-template/sidebar', $data);
    $this->load->view('templates/diskusi-template/topbar', $data);
    $this->load->view('user/index', $data);
    $this->load->view('templates/diskusi-template/chat_sidebar', $data);
    $this->load->view('templates/diskusi-template/footer');
  }

  public function myProfile()
  {
    $data['title'] = 'My Profile';
    $data['user'] = $this->dataSingleUser;

    $this->load->view('templates/diskusi-template/header', $data);
    $this->load->view('templates/diskusi-template/sidebar', $data);
    $this->load->view('templates/diskusi-template/topbar', $data);
    $this->load->view('user/my-profile', $data);
    $this->load->view('templates/diskusi-template/chat_sidebar', $data);
    $this->load->view('templates/diskusi-template/footer');
  }

  public function edit()
  {
    $data['title'] = 'My Profile';
    $data['user'] = $this->dataSingleUser;

    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/diskusi-template/header', $data);
      $this->load->view('templates/diskusi-template/sidebar', $data);
      $this->load->view('templates/diskusi-template/topbar', $data);
      $this->load->view('user/edit', $data);
      $this->load->view('templates/diskusi-template/chat_sidebar', $data);
      $this->load->view('templates/diskusi-template/footer');
    } else {
      $dataEdit = [
        'name' => $this->input->post('name', true),
        'email' => $this->input->post('email', true)
      ];

      // cek jika ada gambar yang diupload
      $upload_image = $_FILES['image']['name'];

      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/profile/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {

          $old_image = $data['user']['image'];
          if ($old_image != 'default.png') {
            unlink(FCPATH . 'assets/img/profile/' . $old_image);
          }

          // jika berhasil upload
          $new_image = $this->upload->data('file_name');
          $dataEdit['image'] = $new_image;
        } else {
          // jika gagal upload.
          echo $this->upload->display_errors();
        }
      }

      $this->user->edit($this->tableUser, $dataEdit);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
      redirect('user');
    }
  }

  public function ubahPassword()
  {
    $data['title'] = 'Ubah Password';
    $data['user'] = $this->dataSingleUser;

    $this->form_validation->set_rules('current_password', 'Password Sekarang', 'required|trim');
    $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[8]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Konfirmasi Password', 'required|trim|min_length[8]|matches[new_password1]');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/diskusi-template/header', $data);
      $this->load->view('templates/diskusi-template/sidebar', $data);
      $this->load->view('templates/diskusi-template/topbar', $data);
      $this->load->view('user/ubahpassword', $data);
      $this->load->view('templates/diskusi-template/chat_sidebar', $data);
      $this->load->view('templates/diskusi-template/footer');
    } else {
      $current_password = $this->input->post('current_password', true);
      $new_password = $this->input->post('new_password1', true);
      if (!password_verify($current_password, $data['user']['password'])) {
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Password sekarang salah!</div>');
        redirect('user/ubahpassword');
      } else {
        if ($current_password == $new_password) {
          $this->session->flashdata('message', '<div class="alert alert-warning" role="alert">Password baru tidak boleh sama dengan password saat ini!</div>');
          redirect('user/ubahpassword');
        } else {
          // jika password sudah OK!
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

          $this->db->set('password', $password_hash);
          $this->db->where('email', $this->session->userdata('email'));
          $this->db->update($this->tableUser);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
          redirect('user/ubahpassword');
        }
      }
    }
  }
}
