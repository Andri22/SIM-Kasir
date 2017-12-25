<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class  Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $data = $this->load->model('m_data');
        $data = $this->load->model('motor_join');
        $this->load->model('r_transaksi');
        $this->load->model('tarif_sewa');
        $this->load->model('kasir_model');
        $this->load->library('session');

         if($this->session->userdata('is_logged_in')=='')
    {
     $this->session->set_flashdata('msg','Please Login to Continueuuuu');
     redirect('login');
   }

    }
    

    function index(){

        $this->load->view('admin/header_admin');
        $this->load->view('admin/home_admin');
        $this->load->view('admin/footer_admin');
        
    }

    function tampil_kasir(){
    	$data = $this->kasir_model->getKasir();
        $data = array('data' => $data);
        $this->load->view('admin/kasir', $data);
        $this->load->view('admin/header_admin');
        $this->load->view('admin/footer_admin');
    }

    function tampil_pelanggan(){
    	 $data['data'] = $this->m_data->GetData('tb_pelanggan');
        
        $this->load->view('admin/pelanggan', $data);

        $this->load->view('admin/header_admin');
        $this->load->view('admin/footer_admin');
    }

    function tampil_motor(){
    	$query = $this->motor_join->getKendaraan();
        $data['motor'] = null;
        if($query){
         $data['motor'] =  $query;
        }
      
        $this->load->view('admin/motor', $data);

        $this->load->view('admin/header_admin');
        $this->load->view('admin/footer_admin');
    }

    function tampil_transaksi(){
    	$query = $this->r_transaksi->getTransaksi();
        $data['data'] = null;
        if($query){
         $data['data'] =  $query;
        }
      
        $this->load->view('admin/transaksi', $data);

        $this->load->view('admin/header_admin');
        $this->load->view('admin/footer_admin');
    }

    function tampil_tarif(){
    	 $query = $this->tarif_sewa->getTarif();
        $data['data'] = null;
        if($query){
         $data['data'] =  $query;

        }
        $this->load->view('admin/tarif', $data);
        
        $this->load->view('admin/header_admin');
        $this->load->view('admin/footer_admin'); 

    }

    function tampil_laporan(){
    	$this->load->view('admin/header_admin');
        $this->load->view('admin/laporan');
        $this->load->view('admin/footer_admin');
    }

    function edit_kasir($id_user){
        $this->load->model('m_data');
        $ks = $this->m_data->GetWhere('tb_user', array('id_user' => $id_user));
        $data = array(
            'id_user' => $ks[0]['id_user'],
            'nama' => $ks[0]['nama_user']
            
            );
        $this->load->view('admin/kasir_edit', $data);
        $this->load->view('admin/header_admin');
        $this->load->view('admin/footer_admin'); 
    }

    public function update_kasir(){
        $id_kasir = $_POST['id_user'];
        $nama = $_POST['nama'];
        $data = array(
            'id_user' => $id_kasir,
            'nama_user' => $nama
         );
        $where = array(
            'id_user' => $id_kasir,
        );
        $this->load->model('m_data');
        $res = $this->m_data->Update('tb_user', $data, $where);
        if ($res>0) {
            redirect('Admin/tampil_kasir');
        }
    }

    
    public function insert_kasir(){
        $this->load->model('m_data');
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'nama_user' => $this->input->post('nama'),
            'type' => $this->input->post('type'),
            'password' => $this->input->post('password'),
             'password' => $this->input->post('status'),
             );
        $data = $this->m_data->insert('tb_user', $data);
        redirect('Admin/tampil_kasir');
    }

    function kasir_tambah(){
        $this->load->view('admin/header_admin');
        $this->load->view('admin/kasir_tambah');
        $this->load->view('admin/footer_admin');
    }

    public function delete_kasir($id_user){
        $id_user = array('id_user' => $id_user);
        $this->load->model('m_data');
        $this->m_data->Delete('tb_user', $id_user);
        redirect('Admin/tampil_kasir');
    }


    function pelanggan_edit(){
        $this->load->view('admin/header_admin');
        $this->load->view('admin/pelanggan_edit');
        $this->load->view('admin/footer_admin');
    }

    
    function edit_pelanggan($id_pelanggan){
        $this->load->model('m_data');
        $ks = $this->m_data->GetWhere('tb_pelanggan', array('id_pelanggan' => $id_pelanggan));
        $data = array(
            'id_pelanggan' => $ks[0]['id_pelanggan'],
            'nama' => $ks[0]['nama'],
            'univ' => $ks[0]['univ'],
            'fakultas' => $ks[0]['fakultas'],
            'alamat' => $ks[0]['alamat'],
            'nohp' => $ks[0]['nohp'],
            
            );
        $this->load->view('admin/pelanggan_edit', $data);
        $this->load->view('admin/header_admin');
        $this->load->view('admin/footer_admin'); 
    }

    public function update_pelanggan(){
        $id_pelanggan =$_POST['id_pelanggan'];
        $nama = $_POST['nama'];
        $univ = $_POST['univ'];
        $fakultas = $_POST['fakultas'];
        $alamat = $_POST['alamat'];
        $nohp = $_POST['nohp'];

        $data = array(
            'id_pelanggan' => $id_pelanggan,
            'nama' => $nama,
            'univ' => $univ,
            'fakultas' => $fakultas,
            'alamat' => $alamat,
            'nohp' => $nohp
         );

        $where = array(
            'id_pelanggan' => $id_pelanggan
        );

        $this->load->model('m_data');
        $res = $this->m_data->Update('tb_pelanggan', $data, $where);
        if ($res>0) {
            redirect('Admin/tampil_pelanggan');
        }
    }

    
    public function insert_pelanggan(){
        $this->load->model('m_data');
        $data = array(
            'nama' => $this->input->post('nama'),
            'univ' => $this->input->post('univ'), 
            'fakultas' => $this->input->post('fakultas'),
            'alamat' => $this->input->post('alamat'),
            'nohp' => $this->input->post('nohp'),
             );
        $data = $this->m_data->insert('tb_pelanggan', $data);
        redirect('Admin/tampil_pelanggan');
    }

    function pelanggan_tambah(){
        $this->load->view('admin/header_admin');
        $this->load->view('admin/pelanggan_tambah');
        $this->load->view('admin/footer_admin');
    }

    public function delete_pelanggan($id_pelanggan){
        $id_pelanggan = array('id_pelanggan' => $id_pelanggan);
        $this->load->model('m_data');
        $this->m_data->Delete('tb_pelanggan', $id_pelanggan);
        redirect('Admin/tampil_pelanggan');
    }

    public function insert_motor(){
        $this->load->model('m_data');
        $data = array(
            'platnomor' => $this->input->post('platnomor'),
            'id_merk' => $this->input->post('id_merk'),
            'warna' => $this->input->post('warna'),
            'tahunterbit' => $this->input->post('tahun_terbit') 
             );
        $data = $this->m_data->insert('tb_kendaraan', $data);
        redirect('Admin/tampil_motor');
    }

   function motor_tambah(){
        $this->load->view('admin/header_admin');
        $this->load->view('admin/motor_tambah');
        $this->load->view('admin/footer_admin');
    }

    function delete_motor($platnomor){
        $platnomor = array('platnomor' => $platnomor);
        $this->load->model('m_data');
        $this->m_data->Delete('tb_kendaraan', $platnomor);
        redirect('Admin/tampil_motor');
    }

}

?>