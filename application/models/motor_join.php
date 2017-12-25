<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Motor_join extends CI_Model{

    function getKendaraan(){
        $this->db->select("tb_kendaraan.PLATNOMOR,tb_merk.MERK_MOTOR,tb_kendaraan.WARNA,tb_kendaraan.TAHUNTERBIT");
        $this->db->from('tb_merk');
        $this->db->join('tb_kendaraan', 'tb_kendaraan.id_merk = tb_merk.id_merk');
        $query = $this->db->get();
        return $query->result();
       }
    
}
?>