<?php

class Diskusi extends CI_Controller
{

  public function index()
  {
    $data['title'] = 'Forum Diskusi';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('diskusi/index');
    $this->load->view('templates/footer');
  }

  public function forum()
  {
    $this->load->view('templates/forum/header');
    $this->load->view('templates/forum/navbar');
    // $this->load->view('templates/forum/sidebar_left');
    $this->load->view('diskusi/forum_diskusi');
    $this->load->view('templates/forum/sidebar_left');
    $this->load->view('templates/forum/sidebar_right');
    $this->load->view('templates/forum/footer');
  }
}
