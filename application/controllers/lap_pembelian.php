<?php
	class lap_pembelian extends CI_Controller{
		function __construct(){
		parent::__construct();
		$this->load->model('lap_pembelian_model');
		/*$this->load->helper('cek_hak_akses');
			$this->load->helper('cek_login');
			if(!cek_login()){
				redirect(site_url('auth/login'));
			}
			$this->load->helper('cek_hak_akses');
			if(!cek_hak_akses($this->uri->segment(1))){
				redirect(site_url('auth/login'));
			}*/
		}
		public function input_periode(){
            $data['tahun'] = $this->lap_pembelian_model->getTahun();
            $this->template->load('template/template','pembelian/form_input_laporan',$data);    
        }
		function view_data(){
			$post = $this->input->post();
            $bulan = $this->input->post('bulan'); 
            $tahun = $this->input->post('tahun'); 
            $data['bulan'] = str_pad($bulan,2,"0",STR_PAD_LEFT);
            $data['tahun'] = $tahun;
            $data['pembelian'] = $this->lap_pembelian_model->get_pembelian($bulan,$tahun);
            $this->template->load('template/template','pembelian/laporan',$data);    
		}
		public function input_periode_bp(){
            $data['tahun'] = $this->lap_pembelian_model->getTahun();
            $this->template->load('template/template','pembelianbp/form_input_laporan',$data);    
        }
		function view_data_bp(){
			$post = $this->input->post();
            $bulan = $this->input->post('bulan'); 
            $tahun = $this->input->post('tahun'); 
            $data['bulan'] = str_pad($bulan,2,"0",STR_PAD_LEFT);
            $data['tahun'] = $tahun;
            $data['pembelian_bp'] = $this->lap_pembelian_model->get_pembelian_bp($bulan,$tahun);
            $this->template->load('template/template','pembelianbp/laporan',$data);    
		}
		public function input_periode_alat(){
            $data['tahun'] = $this->lap_pembelian_model->getTahun();
            $this->template->load('template/template','pembelianalat/form_input_laporan',$data);    
        }
		function view_data_alat(){
			$post = $this->input->post();
            $bulan = $this->input->post('bulan'); 
            $tahun = $this->input->post('tahun'); 
            $data['bulan'] = str_pad($bulan,2,"0",STR_PAD_LEFT);
            $data['tahun'] = $tahun;
            $data['pembelian_alat'] = $this->lap_pembelian_model->get_pembelian_alat($bulan,$tahun);
            $this->template->load('template/template','pembelianalat/laporan',$data);    
		}
	}
	
?>