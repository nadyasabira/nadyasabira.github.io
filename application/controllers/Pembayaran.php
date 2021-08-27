<?php

class Pembayaran extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model('M_Pembayaran');
        $this->load->model('M_Konsumen'); 
        $this->load->model('Menu_model'); 
        $this->load->model('penjualan_model'); 
        // $this->load->helper('url_helper');
        // $this->load->helper('cek_login');
        // if(!cek_login()){
        //     redirect(site_url('tampilan'));
        // }

        // $this->load->helper('cek_hak_akses');
        // if(!cek_hak_akses($this->uri->segment(1))){
        //     redirect(site_url('tampilan/awal'));
        // }
    }

    public function index()
    {
        
        $data['isi_data'] = $this->M_Pembayaran->getDataDetail();
        $data['all_menu'] = $this->Menu_model->get_menu();
        $this->template->load('template/template','pembayaran/view_data',$data);  
    }

    public function view_data_penjualan_detail2($no_faktur){
        $data['isi_data'] = $this->M_Pembayaran->getDataDetails($no_faktur);
        $this->load->view('templates/head');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar'); 
        // $this->load->view('templates/navbar_penjualan');
        $this->load->view('pembayaran/form_bayar',$data);
    }

    public function tambah(){
        // $this->data['id_konsumen'] = $this->M_Konsumen->getkonsumenid();
        $data['info'] = $this->M_Pembayaran->getdataInfoPesanan()->row_array();
    
             // $this->data['kategori'] = $this->M_Kategori->getDataOrderByNama();
                       
             $this->template->load('template/templet','pembayaran/form_bayar',$data);
         }

        //  public function proses_tambah($id){
        //     $data['info'] = $this->M_Pembayaran->getdataInfoPesanan($id)->row;
        //     $this->template->load('template/templet','pembayaran/form_bayar',$data);  
        //  }

    // public function bayar($id_bayar,$id_konsumen)
	// 	{
	// 		$this->M_Pembayaran->bayar($id_bayar,$id_konsumen);
	// 		// $this->M_Pembayaran->generate_jurnal_umum($id,$id_konsumen);
	// 		redirect(site_url('pembayaran/index'));
	// 	}
}
?>