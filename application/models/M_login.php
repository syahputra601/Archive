<?php

class M_login extends CI_Model{

  function cek_login($user, $pass)
  {
    $db2 = $this->load->database('db2', TRUE);
    $db2->where('username', $user);
    $db2->where('password', md5($pass));
    return $db2->get('tbl_user');
  }

  function get_data($user, $pass)
  {
    $db2 = $this->load->database('db2', TRUE);
    $db2->from('tbl_user');
    $db2->join('mst_cabang','mst_cabang.id_cabang=tbl_user.id_cabang');
    $db2->where('username', $user);
    $db2->where('password', md5($pass));
    return $db2->get();
  }

}
