<?php

class Header extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                checklogin();
                $this->load->model('model_header');
                // $this->load->model('M_Kategori');
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
            
                $data['all_header'] = $this->model_header->get_header();
              
                $this->template->load('template/template','header/tampilan_tabel_data',$data);
    }
     public function edit_form($kode_Header)
     {
         if(!isset($kode_Header )) redirect('header/view_data');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $data_form_input = $this->model_header->getDataEdit($kode_Header  );
            
            $this->form_validation->set_rules('kode_Header', 'Kode Header', 'required|alpha_numeric_spaces',
                array('required' => 'Anda harus memasukkan %s.',
                'alpha_numeric_spaces'=>'%s hanya boleh berisi angka, huruf A-Z dan spasi')
                );
             $this->form_validation->set_rules('nama_Header', 'Nama Header', 'required|alpha_numeric_spaces',
                array('required' => 'Anda harus memasukkan %s.',
                'alpha_numeric_spaces'=>'%s hanya boleh berisi angka, huruf A-Z dan spasi')
                );
              $this->form_validation->set_rules('header_Header', 'Header Header', 'required|alpha_numeric_spaces',
                array('required' => 'Anda harus memasukkan %s.',
                'alpha_numeric_spaces'=>'%s hanya boleh berisi angka, huruf A-Z dan spasi')
                );
       
        
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
            if ($this->form_validation->run()) {
                $this->model_header->updateFormInput($kode_Header);
                redirect('header/index'); 
            }
            $data["data_form_input"] = $data_form_input;
            if (!$data["data_form_input"]) show_404();
            $this->template->load('template/template','header/form_edit_data',$data);
        }
        //fungsi untuk menghapus data
        public function delete_form($kode_Header    ){
            if (!isset($kode_Header )) show_404();
            if ($this->model_header->deleteFormInput($kode_Header )) {
                echo 'Berhasil menghapus data dengan kode_Header     = '.$kode_Header   ;
                redirect(site_url('header/index'));
            }
        }
              
            
            
        
             public function tambah(){
           // $this->data['kode_Header'] = $this->model_header->getmenuid();
       
                // $this->data['kategori'] = $this->M_Kategori->getDataOrderByNama();
                          
                $this->load->view('header/tambah');
            }

            public function proses_tambah(){
               

                $data = [
                    'header_akun' => $this->input->post('header_akun'),
                    'nama_header' => $this->input->post('nama_header'),
                   
                   
                ];
                 // $this->data['kode_Header'] = $this->model_header->getmenuid();
                $simpan = $this->model_header->tambah($data);
                if($simpan == 1){
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
                    Data Berhasil Disimpan
                  </div>');
                    redirect('Header');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
                    Data Gagal Disimpan
                  </div>');
                    redirect('Header');
                }
            }

        
        
        public function delete($id)
        {
            if (!isset($id)) show_404();
        
            if ($this->model_header->deleteFormInput($id)) {
                redirect(site_url('header/index'));
            }
        }
 

}


       
        