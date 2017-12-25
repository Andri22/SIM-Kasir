<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class R_transaksi extends CI_Model{

    
       function getTransaksi(){
        $this->db->select("C.ID_TRANSAKSI, A.NAMA, C.PLATNOMOR, C.TGL_RENTAL, C.TGL_KEMBALI, C.TRANSAKSI_TOTAL, C.TRANSAKSI_STATUS");
        $this->db->from('tb_pelanggan AS A');// I use aliasing make joins easier
        $this->db->join('tb_transaksi AS C', 'A.ID_PELANGGAN = C.ID_PELANGGAN', 'INNER');
        $this->db->join('tb_kendaraan AS B', 'C.PLATNOMOR = B.PLATNOMOR', 'INNER');
        $query = $this->db->get();
        return $query->result();
       }


}
?>