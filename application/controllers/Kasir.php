<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class  Kasir extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        
        $this->load->library('session');

         if($this->session->userdata('kasir_is_logged_in')=='')
    {
     $this->session->set_flashdata('msg','Please Login to Continue');
     redirect('login');
   }

    }
    

    function index(){

        $this->load->view('kasir/header_kasir');
        $this->load->view('kasir/home_kasir');
      
        
    }
}