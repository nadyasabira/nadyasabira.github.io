<?php

class Penjual extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model('Model_penjualan');
        $this->load->model('M_Konsumen');
        $this->load->model('M_Harga');
    }

    function index()
    {
        $this->template->load("template/template","penjualan/view_penjualan");
    }

    function inputpenjualan()
    {
        $data['faktur'] = $this->Model_penjualan->getPenjualanId();
        $data['all_konsumen'] = $this->M_Konsumen->get_konsumen();
        $data['all_harga'] = $this->M_Harga->getdataharga();
        $this->template->load("template/template","penjualan/input_penjualan",$data);
    }   

    function getJatuhtempo()
    {
        $tgltransaksi     = $this->input->post('tgltransaksi');
        $jatuhtempo       = date('Y-m-d', strtotime("+3 days", strtotime(date($tgltransaksi))));
        echo $jatuhtempo;
    }

    function simpanbarangtemp()
    {
        // $no_faktur = $this->input->post('no_faktur');
        $id_menu = $this->input->post('id_menu');
        $harga = $this->input->post('harga');
        $ukuran = $this->input->post('ukuran');
        $qty = $this->input->post('qty');
        $id_user = $this->input->post('id_user');
        
        $cekbarangtemp =$this->Model_penjualan->cekBarangtemp($id_menu,$id_user)->num_rows();
        if($cekbarangtemp > 0){
            echo "1";
        }else{
            $data= array(
                
                'id_menu' => $id_menu,
                'harga' => $harga,
                'ukuran' => $ukuran,
                'qty' => $qty, 
                'id_user' => $id_user             
            );

            $simpan = $this->Model_penjualan->insertBarangtemp($data);
        }
    }

    function getDatabarangtemp()
    {
        $id_user = $this->input->post('id_user');
        // $id_menu = $this->input->post('id_menu');
        $data['barangtemp'] = $this->Model_penjualan->getDatabarangtemp($id_user)->result();
        $this->load->view('penjualan/penjualan_detail_temp',$data);
    }

}
?>