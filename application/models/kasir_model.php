<?php
class Kasir_model extends CI_Model{
    //cek nip dan password dosen
    function getKasir(){
        $query=$this->db->query("SELECT * FROM tb_user");
        return $query->result_array();
    }
 
 
}