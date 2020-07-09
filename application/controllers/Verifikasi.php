<?php

class Verifikasi extends CI_Controller
{

  private $singleUser;
  private $tableUser = 'user';

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Verifikasi_model', 'verifikasi');
    $this->singleUser = $this->db->get_where($this->tableUser, ['email' => $this->session->userdata('email')])->row_array();
  }

  public function getVerifikasi()
  {
    $id_grup = $this->session->userdata('id_grup');
    $data = $this->verifikasi->getVerifikasi($id_grup);

    $length = sizeof($data);
    $user = null;

    if ($data) {
      if ($length == 1) {
        $user[] = $this->verifikasi->getUserJoinAccessGrup($data[0]->user_id, $data[0]->grup_id, $data[0]->status);
      } else {
        for ($i = 0; $i < sizeof($data); $i++) {
          $user[] = $this->verifikasi->getUserJoinAccessGrup($data[$i]->user_id, $data[$i]->grup_id, $data[$i]->status);
        }
      }

      $result = [
        'user' => $user
      ];
    }

    echo json_encode($result);
  }

  public function accept()
  {
    $user_id = $this->input->post('user_id');
    $grup_id = $this->input->post('grup_id');

    $terima = $this->verifikasi->accept($user_id, $grup_id);
    if ($terima) {
      $result = [
        'result' => true,
        'pesan' => 'Permintaan berhasil diterima!',
      ];
    }

    echo json_encode($result);
  }

  public function remove()
  {
    $user_id = $this->input->post('user_id');
    $grup_id = $this->input->post('grup_id');

    $tolak = $this->verifikasi->remove($user_id, $grup_id);
    if ($tolak) {
      $result = [
        'result' => true,
        'pesan' => 'Tolak permintaan berhasil!'
      ];
    }

    echo json_encode($result);
  }
}
