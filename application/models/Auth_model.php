<?php

class Auth_model extends CI_Model
{

  public function registration($table, $data)
  {
    $this->db->insert($table, $data);
  }
}
