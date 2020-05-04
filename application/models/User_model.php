<?php

class User_model extends CI_Model
{

  public function edit($table, $data)
  {
    if ($data['image']) {
      $this->db->set('image', $data['image']);
    }
    $this->db->set('name', $data['name']);
    $this->db->where('email', $data['email']);
    $this->db->update($table);
  }
}
