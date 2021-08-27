
\\<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Penjualann extends CI_Controller {

		 public function __construct()
        {
                parent::__construct();
				checklogin();
				// session_start();
                $this->load->model('penjualan_model');
				$this->load->model('M_Menu'); 
				// $this->load->model('MSupplier'); 
				$this->load->helper('url_helper');
				// $this->load->library('pdf');
				// $this->load->helper('cek_login');
				// if(!cek_login()){
				// 	redirect(site_url('tampilan'));
				// }

				// $this->load->helper('cek_hak_akses');
				// if(!cek_hak_akses($this->uri->segment(1))){
				// 	redirect(site_url('tampilan/awal'));
				// }
				 
				
        }
      
		
		//fungsi untuk melihat data
		public function index(){
			$data['isi_data'] = $this->penjualan_model->getData();
			//   $this->load->view('template/topbar_tokobuah');
		
			// $this->load->view('template/head');
			// $this->load->view('template/sidebar');
			// $this->load->view('template/topbar'); 
			$this->template->load('template/template','penjualan/lihat');  
			// $this->load->view('',$data);
		}

		public function inputpenjualan()
		{
			$this->template->load('template/template','transaksi/input_penjualan');
		}
		
		
		
}
?>