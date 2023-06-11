<?php
    class M_dokumen_layanan extends CI_Model{

      function lihat_dokumen(){
        $query=$this->db->query("SELECT * FROM `jenis_dokumen`");
        return $query->result();
      }

      function lihat_layanan(){
        $query=$this->db->query("SELECT * FROM `jenis_layanan` ");
        return $query->result();
      }


}

?>
