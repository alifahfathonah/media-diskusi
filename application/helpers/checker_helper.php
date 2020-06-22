<?php

function is_logged_in()
{
  $ci = get_instance();
  if (!$ci->session->userdata('email')) {
    redirect('auth');
  } else {
    $role_id = $ci->session->userdata('role_id');
    $menu = $ci->uri->segment(1);

    $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
    $menu_id = $queryMenu['id'];

    $userAccess = $ci->db->get_where('user_access_menu', [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ]);

    if ($userAccess->num_rows() < 1) {
      redirect('auth/blocked');
    }
  }
}

function check_access($role_id, $menu_id)
{
  $ci = get_instance();

  $result = $ci->db->get_where('user_access_menu', [
    'role_id' => $role_id,
    'menu_id' => $menu_id
  ]);

  if ($result->num_rows() > 0) {
    return "checked='checked'";
  }
}

function check_user_level($role_id)
{
  $ci = get_instance();
  $result = $ci->db->get_where('user_role', ['id' => $role_id])->row_array();
  if ($result['id'] == $role_id) {
    return $result['role'];
  }
}

function get_menu_by_id($id)
{
  $ci = get_instance();
  return $ci->db->get_where('user_menu', ['id' => $id])->row_array()['menu'];
}

function jumlah_notifikasi($user_id)
{
  $ci = get_instance();

  $sql = "SELECT COUNT(text_notif) jumlah FROM notif WHERE id_user='$user_id'";
  $notif = $ci->db->query($sql)->row_array();
  $jumlah_notif = $notif['jumlah'];
  return $jumlah_notif;
}

function text_notifikasi($user_id)
{
  $ci = get_instance();

  $sql = "SELECT * FROM notif WHERE id_user='$user_id' ORDER BY id DESC";
  $notif = $ci->db->query($sql)->result_array();
  return $notif;
}
