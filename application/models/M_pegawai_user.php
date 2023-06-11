<?php
    class M_pegawai_user extends CI_Model{

      function lihat_pegawai(){
        $query=$this->db->query("SELECT * FROM `pegawai`");
        return $query->result();
      }
      

}

?>
