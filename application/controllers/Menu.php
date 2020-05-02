<?php

class Menu extends CI_Controller
{

  private $tableSubMenu = 'user_sub_menu';

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Menu_model', 'menu');
  }

  public function index()
  {
    $data['title'] = 'Menu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required|trim', [
      'required' => 'Menu harus diisi!'
    ]);
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('templates/footer');
    } else {
      $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil ditambahkan!</div>');
      redirect('menu');
    }
  }

  public function submenu()
  {
    $data['title'] = 'Submenu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['subMenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required|trim');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required|trim');
    $this->form_validation->set_rules('url', 'URL', 'required|trim');
    $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'title' => htmlspecialchars($this->input->post('title', true)),
        'menu_id' => htmlspecialchars($this->input->post('menu_id', true)),
        'url' => htmlspecialchars($this->input->post('url', true)),
        'icon' => htmlspecialchars($this->input->post('icon', true)),
        'is_active' => htmlspecialchars($this->input->post('is_active', true))
      ];
      $this->menu->tambahSubMenu($this->tableSubMenu, $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub menu berhasil ditambahkan!</div>');
      redirect('menu/submenu');
    }
  }
}

/**
 * sampai ke 7 lanjut ke 8
 */
