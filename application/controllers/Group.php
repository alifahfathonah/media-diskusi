<?php

class Group extends CI_Controller
{

  private $tableUser = 'user';
  private $tableGroup = 'grup';
  private $tableRole = 'user_role';

  private $singleUser;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Group_model', 'group');
    $this->singleUser = $this->db->get_where($this->tableUser, ['email' => $this->session->userdata('email')])->row_array();
  }

  public function index()
  {
    $role = $this->db->get_where($this->tableRole, ['id' => $this->session->userdata('role_id')])->row_array();
    $data = [
      'title' => 'Group',
      'user' => $this->singleUser,
      'role' => $role['role']
    ];

    $this->load->view('templates/diskusi-template/header', $data);
    $this->load->view('templates/diskusi-template/sidebar', $data);
    $this->load->view('templates/diskusi-template/topbar', $data);
    $this->load->view('group/index', $data);
    $this->load->view('templates/diskusi-template/chat_sidebar', $data);
    $this->load->view('templates/diskusi-template/footer');
  }

  public function profileGroup($id_grup)
  {
    $data['title'] = 'Group';
    $data['user'] = $this->singleUser;

    $this->session->set_userdata('id_grup', $id_grup);

    $this->load->view('templates/diskusi-template/header', $data);
    $this->load->view('templates/diskusi-template/sidebar', $data);
    $this->load->view('templates/diskusi-template/topbar', $data);
    $this->load->view('group/profile_group', $data);
    $this->load->view('templates/diskusi-template/chat_sidebar', $data);
    $this->load->view('templates/diskusi-template/footer');
  }

  public function getVerifikasi()
  {
    $id_grup = $this->input->post('id_grup');
    $data = $this->group->getVerifikasi($id_grup);

    $length = sizeof($data);
    $user = null;

    if ($data) {
      if ($length == 1) {
        $user[] = $this->group->getUserJoinAccessGrup($data[0]->user_id, $data[0]->grup_id, $data[0]->status);
      } else {
        for ($i = 0; $i < sizeof($data); $i++) {
          $user[] = $this->group->getUserJoinAccessGrup($data[$i]->user_id, $data[$i]->grup_id, $data[$i]->status);
        }
      }

      $result = [
        'user' => $user
      ];
    }

    echo json_encode($result);
  }

  public function terima()
  {
    $user_id = $this->input->post('user_id');
    $grup_id = $this->input->post('grup_id');

    $terima = $this->group->terima($user_id, $grup_id);
    if ($terima) {
      $result = [
        'result' => true,
        'pesan' => 'Permintaan berhasil diterima!',
      ];
    }

    echo json_encode($result);
  }

  public function tolak()
  {
    $user_id = $this->input->post('user_id');
    $grup_id = $this->input->post('grup_id');

    $tolak = $this->group->tolak($user_id, $grup_id);
    if ($tolak) {
      $result = [
        'result' => true,
        'pesan' => 'Tolak permintaan berhasil!'
      ];
    }

    echo json_encode($result);
  }

  public function getGroup()
  {
    $id_grup = $this->session->userdata('id_grup');

    $group = $this->group->getGroupByIdGroup($id_grup);
    if ($group) {
      $result = [
        'status' => true,
        'group' => $group
      ];
    } else {
      $result = [
        'status' => false,
        'group' => null
      ];
    }

    echo json_encode($result);
  }

  public function tampilSemuaGroup()
  {
    $role = $this->getRoleName($this->session->userdata('role_id'));

    $idUser = $this->singleUser;

    switch ($role) {
      case 'Administrator': // menampilkan semua group yang ada jika admin
        $semuaGroup = $this->group->getGroup();
        if ($semuaGroup) {
          $result['groups'] = $semuaGroup;
        }
        break;
      default: // menampilkan group berdasarkan pembuat group jika bukan admin
        $groupDibuat = $this->group->getGroupByIdUser($idUser['id']);
        if ($groupDibuat) {
          $result['groups'] = $groupDibuat;
        }
        break;
    }

    echo json_encode($result);
  }

  public function cariGroup()
  {
    $role = $this->getRoleName($this->session->userdata('role_id'));

    $idUser = $this->db->get_where($this->tableUser, ['email' => $this->session->userdata('email')])->row_array();
    $idUser = $idUser['id'];

    $value = $this->input->post('text');
    switch ($role) {
      case 'Administrator':
        $semuaGroup = $this->group->cariGroup($value);
        if ($semuaGroup) {
          $result['groups'] = $semuaGroup;
        }
        break;
      default:
        $groupDibuat = $this->group->cariGroupByIdUser($value, $idUser);
        if ($groupDibuat) {
          $result['groups'] = $groupDibuat;
        }
        break;
    }

    echo json_encode($result);
  }

  public function tambahGroup()
  {
    $validate = $this->validate_form();

    $this->form_validation->set_rules($validate);
    if ($this->form_validation->run() == false) {
      $result['error'] = true;
      $result['msg'] = [
        'group_name' => form_error('group_name'),
        'group_desc' => form_error('group_desc'),
      ];
    } else {
      $id_user = $this->singleUser['id'];

      $data = [
        'id_grup' => null,
        'group_name' => $this->input->post('group_name'),
        'group_desc' => $this->input->post('group_desc'),
        'id_user' => $id_user,
        'date_created' => strtotime('now'), // masih belum sesuai dengan yang diinginkan
        'jumlah_peserta' => 0
      ];

      $upload_image = $_FILES['group_image']['name'];

      if ($upload_image) {
        $data['group_image'] = $this->upload_image($upload_image);
      } else {
        $data['group_image'] = 'default.png';
      }

      if ($this->group->tambahGroup($data)) {
        $result['error'] = false;
        $result['success'] = 'ditambahkan!';
      }
    }

    echo json_encode($result); // pesan berhasil ditambahkan tidak muncul
  }

  private function upload_image($image)
  {
    if ($image) {
      $config['allowed_types'] = 'gif|jpg|jpeg|png';
      $config['max_size'] = '2048';
      $config['upload_path'] = './assets/img/group/';

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('group_image')) {
        // jika berhasil upload
        $new_image = $this->upload->data('file_name');
        $image_name = $new_image;
      } else {
        echo $this->upload->display_errors();
      }
    }

    return $image_name;
  }

  private function validate_form()
  {
    $validate = [
      [
        'field' => 'group_name',
        'label' => 'Nama Group',
        'rules' => 'trim|required'
      ],
      [
        'field' => 'group_desc',
        'label' => 'Deskripsi Group',
        'rules' => 'trim|required'
      ]
    ];
    return $validate;
  }

  public function ubahGroup()
  {
    $id = $this->input->post('id_grup');

    $data = [
      'group_name' => $this->input->post('group_name'),
      'group_desc' => $this->input->post('group_desc'),
      'id_user' => $this->input->post('id_user'),
    ];

    $validate = $this->validate_form();

    $this->form_validation->set_rules($validate);
    if ($this->form_validation->run() == false) {
      $result['error'] = true;
      $result['msg'] = [
        'group_name' => form_error('group_name'),
        'group_desc' => form_error('group_desc')
      ];
    } else {
      $upload_image = $_FILES['group_image']['name'];

      if ($upload_image) {
        $data['group_image'] = $this->upload_image($upload_image);
      }

      if ($this->group->ubahGroup($this->tableGroup, $data, $id)) {
        $result['error'] = false;
        $result['success'] = 'diubah!';
      }
    }

    echo json_encode($result);
  }

  public function hapusGroup()
  {
    $id = $this->input->post('id_grup');
    if ($this->group->hapusGroup($this->tableGroup, $id)) {
      $msg['error'] = false;
      $msg['success'] = 'Group berhasil dihapus!';
    } else {
      $msg['error'] = true;
    }

    echo json_encode($msg);
  }

  private function getRoleName($roleId)
  {
    return $this->group->getRoleName($roleId);
  }
}
