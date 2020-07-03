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

    $this->load->view('templates/diskusi-template/header', $data);
    $this->load->view('templates/diskusi-template/sidebar', $data);
    $this->load->view('templates/diskusi-template/topbar', $data);
    $this->load->view('diskusi/index');
    $this->load->view('templates/diskusi-template/chat_sidebar', $data);
    $this->load->view('templates/diskusi-template/footer');
  }

  public function forum($id_grup)
  {
    $data = [
      'title' => 'Forum Diskusi',
      'user' => $this->singleUser,
    ];

    $this->session->set_userdata('id_grup', $id_grup);

    $this->load->view('templates/diskusi-template/header', $data);
    $this->load->view('templates/diskusi-template/sidebar', $data);
    $this->load->view('templates/diskusi-template/topbar', $data);
    $this->load->view('diskusi/forum_diskusi', $data);
    $this->load->view('templates/diskusi-template/chat_sidebar', $data);
    $this->load->view('templates/diskusi-template/footer');
  }

  public function group()
  {
    $data = [
      'title' => 'Group',
      'user' => $this->singleUser
    ];

    $this->load->view('templates/diskusi-template/header', $data);
    $this->load->view('templates/diskusi-template/sidebar', $data);
    $this->load->view('templates/diskusi-template/topbar', $data);
    $this->load->view('diskusi/group_diskusi2');
    $this->load->view('templates/diskusi-template/chat_sidebar', $data);
    $this->load->view('templates/diskusi-template/footer');
  }

  // fungsi untuk view diskusi/group_diskusi
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

  // fungsi untuk view diskusi/forum_diskusi
  public function tampilSemuaForum()
  {
    $id_grup = $this->session->userdata('id_grup');
    $forum_diskusi = $this->diskusi->getForumDiskusiJoinUser($id_grup);

    if ($forum_diskusi) {
      $res = [
        'forum' => $forum_diskusi,
      ];
    } else {
      $res = [
        'forum' => false
      ];
    }
    echo json_encode($res);
  }

  public function postDiskusi()
  {
    $validate = [
      [
        'field' => 'text_content',
        'label' => 'Text Content',
        'rules' => 'trim|required'
      ]
    ];
    $this->form_validation->set_rules($validate);
    if ($this->form_validation->run() == false) {
      $result = [
        'error' => true,
        'pesan' => [
          'text_content' => form_error('text_content')
        ]
      ];
    } else {
      $id_grup = $this->session->userdata('id_grup');
      $id_user = $this->singleUser['id'];
      $text_content = $this->input->post('text_content');
      $upload_image = $_FILES['image']['name'];

      $data = [
        'id_forum' => null,
        'text_content' => $text_content,
        'image_forum' => null,
        'date_post' => date('dd-MM-YYYY'),
        'like_post' => 0,
        'delete_post' => 0,
        'id_user' => $id_user,
        'id_grup' => $id_grup
      ];

      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/forum_diskusi/';

        $this->load->library('upload', $config); // bug lihat diconsole ketika lakukan upload untuk tau apa yang salah

        if ($this->upload->do_upload('image')) {
          // jika berhasil upload
          $new_image = $this->upload->data('file_name');
          $data['image_forum'] = $new_image;
        } else {
          echo $this->upload->display_errors();
        }
      }

      if ($this->diskusi->postDiskusi($data)) {
        $result = [
          'error' => false,
          'berhasil' => 'Postingan diskusi berhasil diupload',
        ];
      }
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
