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
    $this->load->model('Verifikasi_model', 'verifikasi');
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
    $role = $this->db->get_where($this->tableRole, ['id' => $this->session->userdata('role_id')])->row_array();
    $data = [
      'title' => 'Group',
      'user' => $this->singleUser,
      'role' => $role['role']
    ];

    $this->session->set_userdata('id_grup', $id_grup);
    $this->session->set_userdata('id_user', $this->singleUser['id']);

    $this->load->view('templates/diskusi-template/header', $data);
    $this->load->view('templates/diskusi-template/sidebar', $data);
    $this->load->view('templates/diskusi-template/topbar', $data);
    $this->load->view('group/profile_group', $data);
    $this->load->view('templates/diskusi-template/chat_sidebar', $data);
    $this->load->view('templates/diskusi-template/footer');
  }

  public function posting()
  {
    $validate = [
      [
        'field' => 'text_content',
        'label' => 'Text Content',
        'rules' => 'trim|required'
      ],
    ];
    $this->form_validation->set_rules($validate);
    if ($this->form_validation->run() == false) {
      $result = [
        'error' => true,
        'pesan' => [
          'text_content' => form_error('text_content'),
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
        'date_post' => time(),
        'like_post' => 0,
        'delete_post' => 0,
        'id_user' => $id_user,
        'id_grup' => $id_grup
      ];

      if ($upload_image) {
        $data['image_forum'] = $this->uploadImagePostingan($upload_image);

        if ($this->group->posting($data)) {
          $result = [
            'error' => false,
            'pesan' => 'Postingan diskusi berhasil diupload',
          ];
        }
      } else {
        $data['image_forum'] = null;

        if ($this->group->posting($data)) {
          $result = [
            'error' => false,
            'pesan' => 'Postingan diskusi berhasil diupload',
          ];
        }
      }
    }

    echo json_encode($result);
  }

  public function comment()
  {
    $this->form_validation->set_rules('text_comment', 'Comment must be not null', 'required|trim');
    if ($this->form_validation->run() == false) {
      redirect('group/profileGroup/' . $this->input->post('id_grup'));
    } else {
      $data = [
        'id' => null,
        'text_comment' => $this->input->post('text_comment'),
        'date_comment' => date('Y-m-d'),
        'like_comment' => 0,
        'delete_comment' => 0,
        'id_forum' => $this->input->post('id_forum'),
        'id_user' => $this->session->userdata('id_user')
      ];

      if ($this->group->addComment($data)) {
        redirect('group/profileGroup/' . $this->input->post('id_grup'));
      }
    }
  }

  public function getComment($id_forum)
  {
    $comment = $this->group->getCommentByIdDiskusi($id_forum);
    if ($comment) {
      $result = [
        'status' => true,
        'comment' => $comment
      ];
    } else {
      $result = [
        'status' => false,
        'comment' => null
      ];
    }

    return $result;
  }

  public function createGroup()
  {
    $data = [
      'title' => 'Group',
      'user' => $this->singleUser
    ];

    $validate = $this->validate_form();
    $this->form_validation->set_rules($validate);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/diskusi-template/header', $data);
      $this->load->view('templates/diskusi-template/sidebar', $data);
      $this->load->view('templates/diskusi-template/topbar', $data);
      $this->load->view('group/create_group', $data);
      $this->load->view('templates/diskusi-template/chat_sidebar', $data);
      $this->load->view('templates/diskusi-template/footer');
    } else {
      $id_user = $this->singleUser['id'];

      $group = [
        'id_grup' => null,
        'group_name' => $this->input->post('group_name'),
        'group_desc' => $this->input->post('group_desc'),
        'id_user' => $id_user,
        'date_created' => strtotime('now'), // masih belum sesuai dengan yang diinginkan
        'jumlah_peserta' => 0,
        'group_category' => $this->input->post('group_category')
      ];

      $upload_image = $_FILES['group_image']['name'];

      if ($upload_image) {
        $group['group_image'] = $this->upload_image($upload_image);
      } else {
        $group['group_image'] = 'default.png';
      }

      if ($this->group->tambahGroup($group)) {
        $this->autoJoinDanVerifikasi();
        $this->session->set_flashdata('message', 'Group has been created successfully!');
        redirect('group');
      }
    }
  }

  public function verifikasi($id_grup)
  {
    $data = [
      'title' => 'Group',
      'user' => $this->singleUser,
    ];

    $this->session->set_userdata('id_grup', $id_grup);

    $this->load->view('templates/diskusi-template/header', $data);
    $this->load->view('templates/diskusi-template/sidebar', $data);
    $this->load->view('templates/diskusi-template/topbar', $data);
    $this->load->view('group/verifikasi', $data);
    $this->load->view('templates/diskusi-template/chat_sidebar', $data);
    $this->load->view('templates/diskusi-template/footer');
  }

  public function getGroup()
  {
    $id_grup = $this->session->userdata('id_grup');

    $user = $this->singleUser;
    $group = $this->group->getGroupByIdGroup($id_grup);
    if ($group) {
      $result = [
        'status' => true,
        'group' => $group,
        'user' => $user
      ];
    } else {
      $result = [
        'status' => false,
        'group' => null,
        'user' => null
      ];
    }

    echo json_encode($result);
  }

  public function getMembersGroup()
  {
    $id_grup = $this->session->userdata('id_grup');

    $user_access_grup = $this->group->getUserAccessGroupByIdGroupAndStatus($id_grup, 'Ya');
    if ($user_access_grup) {
      for ($i = 0; $i < sizeof($user_access_grup); $i++) {
        $members[] = $this->group->getUserById($user_access_grup[$i]->user_id);
      }

      $result = [
        'status' => true,
        'members' => $members
      ];
    } else {
      $result = [
        'status' => false,
        'members' => null
      ];
    }

    echo json_encode($result);
  }

  public function getPostingan()
  {
    $id_grup = $this->session->userdata('id_grup');
    $postingan = $this->group->getPostingDiskusiJoinUser($id_grup);

    for ($i = 0; $i < sizeof($postingan); $i++) {
      $comment[] = $this->group->getComment($postingan[$i]->id_forum);
    }

    if ($postingan) {
      $res = [
        'status' => true,
        'postingan' => $postingan,
        'comment' => $comment
      ];
    } else {
      $res = [
        'status' => false,
        'postingan' => null,
        'comment' => null
      ];
    }
    echo json_encode($res);
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

  public function getAllGroup()
  {
    $id_user = $this->singleUser['id'];
    $group = $this->group->getAllGroup($id_user);

    if ($group) {
      $result = [
        'groups' => $group,
        'user' => $this->singleUser,
      ];
    } else {
      $result = [
        'groups' => null,
        'user' => $this->singleUser,
        'total_post' => null
      ];
    }

    echo json_encode($result);
  }

  public function getMyGroup()
  {
    $id_user = $this->singleUser['id'];
    $group = $this->group->getMyGroup($id_user);

    if ($group) {
      $result = [
        'groups' => $group,
        'user' => $this->singleUser
      ];
    } else {
      $result = [
        'groups' => null,
        'user' => $this->singleUser
      ];
    }

    echo json_encode($result);
  }

  public function getJoinedGroup()
  {
    $id_user = $this->singleUser['id'];
    $user_access_group = $this->group->getUserAccessGroupByUserId($id_user);

    $groups = null;

    if ($user_access_group) {
      for ($i = 0; $i < sizeof($user_access_group); $i++) {
        $groups[] = $this->group->getGroupByIdGroup($user_access_group[$i]->grup_id);
      }

      $result = [
        'groups' => $groups,
        'user' => $this->singleUser
      ];
    }

    echo json_encode($result);
  }

  public function join()
  {
    $id_user = $this->input->post('id_user');
    $id_grup = $this->input->post('id_grup');
    $join = $this->group->join($id_user, $id_grup);

    if ($join) {
      $result = [
        'status' => false,
        'data' => $this->singleUser,
        'pesan' => 'Terkirim. Tunggu diverifikasi!'
      ];
    } else {
      $result = [
        'status' => true,
        'data' => $this->singleUser,
        'pesan' => 'Anda sudah join Group!'
      ];
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

  private function autoJoinDanVerifikasi()
  {
    $idGrup = $this->group->idGrupTerakhir();
    $idGrupTerakhir = (int) $idGrup->id_terakhir;
    if ($this->group->join($this->singleUser['id'], $idGrupTerakhir)) { // auto join untuk pembuat group
      $this->verifikasi->accept($this->singleUser['id'], $idGrupTerakhir); // auto verifikasi untuk pembuat group
    }
  }

  private function upload_image($image, $old_image = null)
  {
    if ($image) {
      $config['allowed_types'] = 'gif|jpg|jpeg|png';
      $config['max_size'] = '2048';
      $config['upload_path'] = './assets/img/group/';

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('group_image')) {

        if ($old_image != 'default.png') {
          unlink(FCPATH . 'assets/img/group/' . $old_image);
        }
        // jika berhasil upload
        $new_image = $this->upload->data('file_name');
        $image_name = $new_image;
      } else {
        echo $this->upload->display_errors();
      }
    }

    return $image_name;
  }

  private function uploadImagePostingan($image, $old_image = null)
  {
    if ($image) {
      $config['allowed_types'] = 'gif|jpg|jpeg|png';
      $config['max_size'] = '2048';
      $config['upload_path'] = './assets/img/forum_diskusi/';

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('image')) {
        if ($old_image != 'default.png') {
          unlink(FCPATH . 'assets/img/forum_diskusi/' . $old_image);
        }
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
      ],
      [
        'field' => 'group_category',
        'label' => 'Category Group',
        'rules' => 'trim|required'
      ]
    ];
    return $validate;
  }

  public function updateGroup($id)
  {
    $data = [
      'title' => 'Group',
      'user' => $this->singleUser,
      'group' => $this->group->getGroupByIdGroup($id),
      'category' => [
        'Networking', 'Design', 'Programming', 'Game',
        'Music Digital', 'Artificial Intelligence', 'Data Science'
      ]
    ];

    $validate = $this->validate_form();
    $this->form_validation->set_rules($validate);
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/diskusi-template/header', $data);
      $this->load->view('templates/diskusi-template/sidebar', $data);
      $this->load->view('templates/diskusi-template/topbar', $data);
      $this->load->view('group/edit_group', $data);
      $this->load->view('templates/diskusi-template/footer');
    } else {
      $group = [
        'group_name' => $this->input->post('group_name'),
        'group_desc' => $this->input->post('group_desc'),
        'group_category' => $this->input->post('group_category')
      ];

      $upload_image = $_FILES['group_image']['name'];
      $old_image = $data['group'][0]->group_image;

      if ($upload_image) {
        $group['group_image'] = $this->upload_image($upload_image, $old_image);
      }

      if ($this->group->ubahGroup($this->tableGroup, $group, $id)) {
        $this->session->set_flashdata('message', 'Group has been update successfully!');
        redirect('group');
      }
    }
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
