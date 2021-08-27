<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class pengeluaran_bb extends CI_Controller {

    public function __construct(){
        parent::__construct();
        checklogin();
        $this->load->model('pengeluaran_bb_model');
        // $this->load->helper('cek_login');
        //      if(!cek_login()){
        //          redirect(site_url('tampilan'));
        //      }

        //      $this->load->helper('cek_hak_akses');
        //      if(!cek_hak_akses($this->uri->segment(1))){
        //          redirect(site_url('tampilan/awal'));
        //      }
        //  }
    }
    public function index(){
        $data['isi_data'] = $this->pengeluaran_bb_model->getDataDetail();
        $this->template->load('template/template','pengeluaran/view_data',$data);  
    }
    public function input_form(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('datetimepicker', 'Tanggal Transaksi', 'required',
                array('required' => 'Anda harus memasukkan %s.')
            );           
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
        $data['nota'] = $this->pengeluaran_bb_model->getDataNota(); 
        $data['id_keluar'] = $this->pengeluaran_bb_model->getPengeluaranId();
        $data['isi_data'] = $this->pengeluaran_bb_model->getDataDetail();
        if ($this->form_validation->run() == FALSE){
            $this->template->load('template/template','pengeluaran/form_input_data',$data);      
        }else{
            $this->pengeluaran_bb_model->fungsi_input_data2();
            $data['isi_data'] = $this->pengeluaran_bb_model->getDataDetail();
            $this->template->load('template/template','pengeluaran/view_data',$data);  
        }
    }
    public function view_data_detail($no_nota){
        $data['isi_data'] = $this->pengeluaran_bb_model->getDataDetail2($no_nota);
        $data['pesanan'] = $this->pengeluaran_bb_model->getDataDetail3($no_nota);
        $this->template->load('template/template','pengeluaran/view_data_detail',$data);
    }
}