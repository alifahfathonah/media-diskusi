<?php

class Menu extends CI_Controller
{

  private $tableUser = 'user';
  private $tableSubMenu = 'user_sub_menu';
  private $tableMenu = 'user_menu';

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Menu_model', 'menu');
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Menu Management';
    $data['user'] = $this->db->get_where($this->tableUser, ['email' => $this->session->userdata('email')])->row_array();

    // ambil keyword search
    if ($this->input->post('keyword_menu')) {
      $data['keyword_menu'] = $this->input->post('keyword_menu');
      $this->session->set_userdata('keyword_menu', $data['keyword_menu']);
    } else {
      $data['keyword_menu'] = $this->session->userdata('keyword_menu');
    }

    // config  pagination
    $config['base_url'] = base_url('menu/index');
    $this->db->like('menu', $data['keyword_menu']);
    $this->db->from($this->tableMenu);
    $config['total_rows'] = $this->db->count_all_results();
    $config['per_page'] = 5;

    // initialization
    $this->pagination->initialize($config);

    // start pagination from
    $data['start'] = $this->uri->segment(3);
    $data['total_rows'] = $config['total_rows'];

    $data['menu'] = $this->menu->getMenu($this->tableMenu, $config['per_page'], $data['start'], $data['keyword_menu']);

    $this->form_validation->set_rules('menuTambah', 'Menu', 'required|trim', [
      'required' => 'Menu harus diisi!'
    ]);
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/diskusi-template/header', $data);
      $this->load->view('templates/diskusi-template/sidebar', $data);
      $this->load->view('templates/diskusi-template/topbar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('templates/diskusi-template/chat_sidebar', $data);
      $this->load->view('templates/diskusi-template/footer');
    } else {
      $data = [
        'id' => null,
        'menu' => htmlspecialchars($this->input->post('menuTambah', true))
      ];
      $this->menu->tambahMenu($this->tableMenu, $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil ditambahkan!</div>');
      redirect('menu');
    }
  }

  public function submenu()
  {
    $data['title'] = 'Submenu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    // ambil keyword search
    if ($this->input->post('keyword_submenu')) {
      $data['keyword_submenu'] = $this->input->post('keyword_submenu');
      $this->session->set_userdata('keyword_submenu', $data['keyword_submenu']);
    } else {
      $data['keyword_submenu'] = $this->session->userdata('keyword_submenu');
    }

    // config  pagination
    $config['base_url'] = base_url('menu/submenu/index');
    $this->db->like('title', $data['keyword_submenu']);
    $this->db->from($this->tableSubMenu);
    $config['total_rows'] = $this->db->count_all_results();
    $config['per_page'] = 5;

    // initialization
    $this->pagination->initialize($config);

    // start pagination from
    $data['start'] = $this->uri->segment(4);
    $data['total_rows'] = $config['total_rows'];

    /**
     * digunakan pada halaman utama submenu untuk table data submenu
     */
    $data['subMenu'] = $this->menu->getSubMenuJoinMenu($this->tableSubMenu, $config['per_page'], $data['start'], $data['keyword_submenu']);

    /**
     * digunakan pada modal edit submenu
     */
    $data['menu'] = $this->db->get($this->tableMenu)->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required|trim');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required|trim');
    $this->form_validation->set_rules('url', 'URL', 'required|trim');
    $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/diskusi-template/header', $data);
      $this->load->view('templates/diskusi-template/sidebar', $data);
      $this->load->view('templates/diskusi-template/topbar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('templates/diskusi-template/chat_sidebar', $data);
      $this->load->view('templates/diskusi-template/footer');
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

  public function getUbahMenu()
  {
    echo json_encode($this->menu->getMenuById($this->tableMenu, $this->input->post('id')));
  }

  public function ubahMenu()
  {
    $data = [
      'id' => $this->input->post('idUbahMenu'),
      'menu' => htmlspecialchars($this->input->post('menuUbahMenu', true))
    ];

    $this->menu->ubahMenu($this->tableMenu, $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil diubah!</div>');
    redirect('menu');
  }

  public function getUbahSubMenu()
  {
    echo json_encode($this->menu->getSubMenuById($this->tableSubMenu, $this->input->post('id')));
  }

  public function ubahSubMenu()
  {
    $data = [
      'id' => $this->input->post('idUbah'),
      'title' => htmlspecialchars($this->input->post('titleUbah', true)),
      'menu_id' => htmlspecialchars($this->input->post('menuIdUbah', true)),
      'url' => htmlspecialchars($this->input->post('urlUbah', true)),
      'icon' => htmlspecialchars($this->input->post('iconUbah', true)),
      'is_active' => htmlspecialchars($this->input->post('is_activeUbah', true))
    ];
    $this->menu->ubahSubMenu($this->tableSubMenu, $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub menu berhasil diubah!</div>');
    redirect('menu/submenu');
  }

  /**
   * fungsi untuk hapus menu
   */
  public function hapus($id)
  {
    $this->menu->hapusMenu($this->tableMenu, $id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil dihapus!</div>');
    redirect('menu');
  }

  /**
   * fungsi untuk hapus submenu
   */
  public function hapusSubMenu($id)
  {
    $this->menu->hapusSubMenu($this->tableSubMenu, $id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu berhasil dihapus!</div>');
    redirect('menu/submenu');
  }

  public function resetCariSubMenu()
  {
    $this->session->unset_userdata('keyword_submenu');
    redirect('menu/submenu');
  }

  public function resetCariMenu()
  {
    $this->session->unset_userdata('keyword_menu');
    redirect('menu');
  }
}
