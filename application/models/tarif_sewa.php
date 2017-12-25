<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Tarif_sewa extends CI_Model{

    function getTarif(){
        $this->db->select("tb_merk.MERK_MOTOR,tb_tarif.HARGA");
        $this->db->from('tb_merk');
        $this->db->join('tb_tarif', 'tb_tarif.id_merk = tb_merk.id_merk');
        $query = $this->db->get();
        return $query->result();
       }
}
?>