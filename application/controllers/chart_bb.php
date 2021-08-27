<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class chart_bb extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('chart_bb_model');
            $this->load->model('pembelian_model');
            $this->load->model('pembelian_bp_model');
        } 
        public function input(){
            $data['tahun'] = $this->chart_bb_model->getTahun();
            $this->template->load('template/template','grafik/form_input_chart_bb',$data);    
        }
        function view_chart(){
            $post = $this->input->post();
            $tahun = $this->input->post('tahun');  
            $data['tahun'] = $tahun; 
            $data['rekappembelian'] = $this->pembelian_model->getPembelianPerbulan($tahun)->result();
            $data['rekappembelian_bp'] = $this->pembelian_bp_model->getPembelianPerbulan($tahun)->result();
            $data['rekappembelian1']=$this->pembelian_model->getPembelianPerbulan1($tahun);
            $data['rekappembelian_bp1']=$this->pembelian_bp_model->getPembelianPerbulan1($tahun);
            $this->template->load('template/template','grafik/chart_bb_view',$data);
        }
        public function input_bulan(){
            $data['tahun'] = $this->chart_bb_model->getTahun();
            $this->template->load('template/template','grafik/form_input_chart_bulan',$data);    
        }
        function view_chart_bulan(){
            $post = $this->input->post();
            $bulan = $this->input->post('bulan'); 
            $tahun = $this->input->post('tahun');  
            $data['bulan'] = str_pad($bulan,2,"0",STR_PAD_LEFT);
            $data['tahun'] = $tahun; 
            $data['rekappembelian'] = $this->chart_bb_model->getPembelianBB($bulan,$tahun);
            $data['rekappembelian_bp'] = $this->chart_bb_model->getPembelianBP($bulan,$tahun);
            $data['rekappembelian1']=$this->chart_bb_model->getPembelianBB1($bulan,$tahun);
            $data['rekappembelian_bp1']=$this->chart_bb_model->getPembelianBP1($bulan,$tahun);
            $this->template->load('template/template','grafik/chart_bulan_view',$data);
        }
    }
?>