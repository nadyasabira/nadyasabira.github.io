<?php

class Halutama extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model('M_Konsumen');
        $this->load->model('penjualan_model');
        $this->load->model('M_Menu');
        $this->load->model('M_Pesanan1');
        $this->load->model('pembelian_model');
        $this->load->model('chart_penjualan_model');
    }
    function index()
    {
        // $data['pie_data']=$this->chart_model->GetPie();
        $data["dataHarga"] = $this->chart_penjualan_model->get_data_harga();
        $data['all_konsumen'] = $this->M_Konsumen->getDataPelanggan()->num_rows();
        $data['all_penjualan'] = $this->penjualan_model->getDataPenjualanhariini()->num_rows();
        $data['all_pembelian'] = $this->pembelian_model->getDataPembelianhariini()->num_rows();
        $data['all_menu'] = $this->M_Menu->getDataMenu()->num_rows();
        $data['all_pesanan'] = $this->M_Pesanan1->Cobain();
        $data['rekappenjualan'] = $this->penjualan_model->getPenjualanPerbulan1()->result();       
        $data['hasil']=$this->chart_penjualan_model->penjualan();
        $data['hasil1']=$this->chart_penjualan_model->penjualan1();
        
        $this->template->load('template/template','dashboard/dashboard',$data);
    }
}
?>