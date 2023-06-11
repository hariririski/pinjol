<?php
    class M_kecamatan_desa extends CI_Model{

      function lihat_kecamatan(){
        $query=$this->db->query("SELECT * FROM `kecamatan`");
        return $query->result();
      }

      function lihat_desa(){
        $query=$this->db->query("SELECT * FROM `desa` LEFT JOIN kecamatan on kecamatan.id_kecamatan=desa.id_kecamatan");
        return $query->result();
      }


}

?>
