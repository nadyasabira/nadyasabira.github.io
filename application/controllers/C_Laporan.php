<?php
    class C_Laporan extends CI_Controller{
        function __construct(){
            parent::__construct();
            checklogin();
            $this->load->model('M_Laporan');
            $this->load->model('penjualan_model');
            $this->load->model('M_Menu');
            $this->load->helper('url_helper');
            $this->load->library('pdf'); 
            // $this->load->helper('cek_login');
            // if(!cek_login()){
            //     redirect(site_url('tampilan'));
            // }

            // $this->load->helper('cek_hak_akses');
            // if(!cek_hak_akses($this->uri->segment(1))){
            //     redirect(site_url('tampilan/awal'));
            // }
        }
        public function bukubesar(){
            $data['akun'] = $this->M_Laporan->getAkun();
            $data['tahun'] = $this->M_Laporan->getTahun();
            $this->template->load('template/template','laporan/form_input_data_laporan_buku_besar',$data);
        }
        public function laporanbukubesar(){
            $post = $this->input->post();
            $bulan = $this->input->post('bulan'); 
            $tahun = $this->input->post('tahun');   
            $akun_di_pilih = $this->input->post('akun');       
            $data['bulan'] = str_pad($bulan,2,"0",STR_PAD_LEFT);
            $data['tahun'] = $tahun;
            $data['akun'] = $this->M_Laporan->getAkun();
            $data['akun_di_pilih'] = $akun_di_pilih;
            $data['buku_besar'] = $this->M_Laporan->getBukuBesar($bulan,$tahun,$akun_di_pilih);
            $data['saldo_awal'] = $this->M_Laporan->getSaldoAwalBukuBesar($bulan,$tahun,$akun_di_pilih);
            $data['posisi_saldo_normal'] = $this->M_Laporan->getPosisiSaldoNormal($akun_di_pilih);
            $this->template->load('template/template','laporan/view_data_buku_besar',$data);
        }
        public function viewlaporanbukubesar(){
            $post = $this->input->post();
            $bulan = $this->input->post('bulan'); 
            $tahun = $this->input->post('tahun'); 
            $akun_di_pilih = $this->input->post('akun'); 
            $data['akun'] = $this->M_Laporan->getAkun();
            $data['bulan'] = str_pad($bulan,2,"0",STR_PAD_LEFT);
            $data['tahun'] = $tahun;
            $data['akun_di_pilih'] = $akun_di_pilih;
            $data['buku_besar'] = $this->M_Laporan->getBukuBesar($bulan,$tahun,$akun_di_pilih);
            $data['saldo_awal'] = $this->M_Laporan->getSaldoAwalBukuBesar($bulan,$tahun,$akun_di_pilih);
            $data['posisi_saldo_normal'] = $this->M_Laporan->getPosisiSaldoNormal($akun_di_pilih);
            $this->template->load('template/template','laporan/view_data_buku_besar',$data);
        }
        public function jurnalumum(){
            $post = $this->input->post();
            $bulan = $this->input->post('bulan'); 
            $tahun = $this->input->post('tahun'); 
            $data['bulan'] = str_pad($bulan,2,"0",STR_PAD_LEFT);
            $data['tahun'] = $tahun;
            $data['jurnal'] = $this->M_Laporan->getJurnalUmum($bulan,$tahun);
            $this->template->load('template/template','laporan/view_data_jurnal_umum',$data);    
        }
        public function jurnal(){
            $data['tahun'] = $this->M_Laporan->getTahun();
            $this->template->load('template/template','laporan/form_input_data_jurnal',$data);    
        }
        public function laporanlabarugi(){
            $post = $this->input->post();
            $bulan = $this->input->post('bulan'); 
            $tahun = $this->input->post('tahun'); 
            $data['bulan'] = str_pad($bulan,2,"0",STR_PAD_LEFT);
            $data['tahun'] = $tahun;
            $data['pendapatan_hpp'] = $this->M_Laporan->getPendapatan($bulan,$tahun);
            $data['beban'] = $this->M_Laporan->getBeban($bulan,$tahun);
            $data['beban1'] = $this->M_Laporan->getBeban1($bulan,$tahun);
            $this->template->load('template/template','laporan/view_data_laba_rugi',$data);  
        }
        public function labarugi(){
            $data['tahun'] = $this->M_Laporan->getTahun();
            $this->template->load('template/template','laporan/form_input_data_laporan_rugi_laba',$data);    
        }
    }