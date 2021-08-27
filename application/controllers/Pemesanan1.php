<?php

class Pemesanan1 extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model('M_Pesanan1');
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
        
        $data['isi_data'] = $this->M_Pesanan1->getData();
      
        $this->template->load('template/templet','pesanan1/view_data',$data);  
    }

    public function proses($id_pesanan,$id_konsumen)
		{
			$this->M_Pesanan1->proses($id_pesanan,$id_konsumen);
			// $this->M_Pembayaran->generate_jurnal_umum($id,$id_konsumen);
			redirect(site_url('pemesanan/index'));
            // if ((!isset($id_pesanan)) and (!isset($id_konsumen))) redirect('pemesanan/index');
            // $this->load->helper(array('form', 'url'));
            // $this->load->library('form_validation');		
            // $data_form_input = $this->M_Pesanan1->getDataEdit($id_pesanan,$id_konsumen);
            
            // $this->form_validation->set_rules('id_pesanan', 'No Faktur', 'required',
            //         array('required' => 'Anda harus memasukkan %s.')
            //         );
                    
            // $this->form_validation->set_rules('id_konsumen', 'Nama Konsumen', 'required',
            //         array('required' => 'Anda harus memasukkan %s.')
            //         );		
                    
            // // $this->form_validation->set_rules('datetimepicker', 'Tanggal pemesanan', 'required',
            // //         array('required' => 'Anda harus memasukkan %s.')
            // //         );	
            
            // $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
            // $data['barang'] = $this->Menu_model->getDataOrderByNama3($id_pesanan); //untuk mengambil data buah
            // $data['dataKonsumen'] = $this->M_Konsumen->getDataOrderByNama(); //untuk mengambil data supplier
            
            // if ($this->form_validation->run()) {
            //     $this->M_Pesanan1->updateFormInput($id_pesanan,$id_konsumen);
            //     redirect('pemesanan/index'); 
            // }
            // $data["data_form_input"] = $data_form_input;
            // if (!$data["data_form_input"]) show_404();
            // //print_r($data["data_form_input"]);
            // // $this->load->view('templates/navbar_tokobuah_pemesanan');
        	
			// 		$this->template->load('template/templet','pesanan/form_edit_data',$data);  
            
        }

        public function edit_form($id_pesanan,$id_konsumen){
    
            if ((!isset($id_pesanan)) and (!isset($id_konsumen))) redirect('pemesanan1/index');
            
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');		
            $data_form_input = $this->M_Pesanan1->getDataEdit($id_pesanan,$id_konsumen);
            
            $this->form_validation->set_rules('id_pesanan', 'No Faktur', 'required',
                    array('required' => 'Anda harus memasukkan %s.')
                    );
                    
            $this->form_validation->set_rules('id_konsumen', 'Nama Supplier', 'required',
                    array('required' => 'Anda harus memasukkan %s.')
                    );		
                    
            // $this->form_validation->set_rules('datetimepicker', 'Tanggal pemesanan1', 'required',
            //         array('required' => 'Anda harus memasukkan %s.')
            //         );	
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
            $data['konsumen'] = $this->M_Konsumen->getDataOrderByNama3($id_pesanan); //untuk mengambil data buah
            $data['menu'] = $this->Menu_model->getDataOrderByNama3($id_pesanan); //untuk mengambil data supplier
            
            if ($this->form_validation->run()) {
                $this->M_Pesanan1->updateFormInput($id_pesanan,$id_konsumen);
                redirect('pemesanan1/index'); 
            }
            $data["data_form_input"] = $data_form_input;
            if (!$data["data_form_input"]) show_404();
            //print_r($data["data_form_input"]);
            // $this->load->view('templates/navbar_tokobuah_pemesanan1');
            $this->template->load('template/templet','pesanan1/form_edit_data',$data);  
            
        }

        public function view_data_penjualan_detail2($id_pesanan){
			$data['isi_data'] = $this->M_Pesanan1->getDataDetail1($id_pesanan);
			// $this->load->view('template/head');
			// $this->load->view('template/sidebar');
			// $this->load->view('template/topbar'); 
			// $this->load->view('template/topbar_penjualan');
			$this->template->load('template/templet','pesanan1/view_detail_pesanan',$data);  
			
			// $this->load->view('penjualan/view_detail_penjualan',$data);
		}
		
}
?>