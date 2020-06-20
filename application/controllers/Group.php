<?php

class Group extends CI_Controller
{

  private $tableUser = 'user';
  private $tableGroup = 'grup';

  private $singleUser;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Group_model', 'group');
    $this->singleUser = $this->db->get_where($this->tableUser, ['email' => $this->session->userdata('email')])->row_array();
  }

  public function index()
  {
    $data['title'] = 'Group Management';
    $data['user'] = $this->singleUser;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('group/index', $data);
    $this->load->view('templates/footer');
  }

  public function profileGroup()
  {
    $data['title'] = 'Group Management';
    $data['user'] = $this->singleUser;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('group/profile_group', $data);
    $this->load->view('templates/footer');
  }

  public function getVerifikasi()
  {
    $id_grup = $this->input->post('id_grup');
    $data = $this->group->getVerifikasi($id_grup);
    if ($data) {
      for ($i = 0; $i < sizeof($data); $i++) {
        $user[] = $this->group->getUserJoinAccessGrup($data[$i]->user_id, $data[$i]->grup_id, $data[$i]->status);
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
    $config = [
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

    $this->form_validation->set_rules($config);
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
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/group/';

        $this->load->library('upload', $config); // bug lihat diconsole ketika lakukan upload untuk tau apa yang salah

        if ($this->upload->do_upload('group_image')) {
          // jika berhasil upload
          $new_image = $this->upload->data('file_name');
          $data['group_image'] = $new_image;
        } else {
          echo $this->upload->display_errors();
        }
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

  public function ubahGroup()
  {
    $config = [
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

    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() == false) {
      $result['error'] = true;
      $result['msg'] = [
        'group_name' => form_error('group_name'),
        'group_desc' => form_error('group_desc')
      ];
    } else {
      $id = $this->input->post('id_grup');
      $data = [
        'group_name' => $this->input->post('group_name'),
        'group_desc' => $this->input->post('group_desc'),
        'id_user' => $this->input->post('id_user'),
        'group_image' => 'default.png'
      ];

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
