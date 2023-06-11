<?php
    class M_pinjam extends CI_Model{

      function lihat_pinjam(){
        $query=$this->db->query("SELECT * FROM `pinjam`");
        return $query->result();
      }


}

?>
