<?php

class Pemesanan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model('M_Pesanan');
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
        
        $data['isi_data'] = $this->M_Pesanan->getDataDetail();
      
        $this->template->load('template/templet','pesanan/view_data',$data);  
    }

    public function proses($id_pesanan,$id_konsumen)
		{
			$this->M_Pesanan->proses($id_pesanan,$id_konsumen);
			// $this->M_Pembayaran->generate_jurnal_umum($id,$id_konsumen);
			redirect(site_url('pemesanan/index'));
            // if ((!isset($no_faktur)) and (!isset($id_konsumen))) redirect('pemesanan/index');
            // $this->load->helper(array('form', 'url'));
            // $this->load->library('form_validation');		
            // $data_form_input = $this->M_Pesanan->getDataEdit($no_faktur,$id_konsumen);
            
            // $this->form_validation->set_rules('no_faktur', 'No Faktur', 'required',
            //         array('required' => 'Anda harus memasukkan %s.')
            //         );
                    
            // $this->form_validation->set_rules('id_konsumen', 'Nama Konsumen', 'required',
            //         array('required' => 'Anda harus memasukkan %s.')
            //         );		
                    
            // // $this->form_validation->set_rules('datetimepicker', 'Tanggal pemesanan', 'required',
            // //         array('required' => 'Anda harus memasukkan %s.')
            // //         );	
            
            // $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
            // $data['barang'] = $this->Menu_model->getDataOrderByNama3($no_faktur); //untuk mengambil data buah
            // $data['dataKonsumen'] = $this->M_Konsumen->getDataOrderByNama(); //untuk mengambil data supplier
            
            // if ($this->form_validation->run()) {
            //     $this->M_Pesanan->updateFormInput($no_faktur,$id_konsumen);
            //     redirect('pemesanan/index'); 
            // }
            // $data["data_form_input"] = $data_form_input;
            // if (!$data["data_form_input"]) show_404();
            // //print_r($data["data_form_input"]);
            // // $this->load->view('templates/navbar_tokobuah_pemesanan');
        	
			// 		$this->template->load('template/templet','pesanan/form_edit_data',$data);  
            
        }
		
}
?>