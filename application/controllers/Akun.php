<?php

class Akun extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                checklogin();
                $this->load->model('model_akun');
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
                
                
        }
     

    public function index()
    {
            
                $data['all_akun'] = $this->model_akun->getdataakun();
              
                $this->template->load('template/template','akun/tampilan_tabel_data',$data);
    }
     public function edit_form($kode_akun)
     {
         if(!isset($kode_akun )) redirect('akun/view_data');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $data_form_input = $this->model_akun->getDataEdit($kode_akun  );
            
            $this->form_validation->set_rules('kode_akun', 'Kode Akun', 'required|alpha_numeric_spaces',
                array('required' => 'Anda harus memasukkan %s.',
                'alpha_numeric_spaces'=>'%s hanya boleh berisi angka, huruf A-Z dan spasi')
                );
             $this->form_validation->set_rules('nama_akun', 'Nama Akun', 'required|alpha_numeric_spaces',
                array('required' => 'Anda harus memasukkan %s.',
                'alpha_numeric_spaces'=>'%s hanya boleh berisi angka, huruf A-Z dan spasi')
                );
              $this->form_validation->set_rules('header_akun', 'Header Akun', 'required|alpha_numeric_spaces',
                array('required' => 'Anda harus memasukkan %s.',
                'alpha_numeric_spaces'=>'%s hanya boleh berisi angka, huruf A-Z dan spasi')
                );
       
        
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
            if ($this->form_validation->run()) {
                $this->model_akun->updateFormInput($kode_akun);
                redirect('akun/index'); 
            }
            $data["data_form_input"] = $data_form_input;
            if (!$data["data_form_input"]) show_404();
            $this->template->load('template/template','akun/form_edit_data',$data);
        }
        //fungsi untuk menghapus data
        public function delete_form($kode_akun    ){
            if (!isset($kode_akun )) show_404();
            if ($this->model_akun->deleteFormInput($kode_akun )) {
                echo 'Berhasil menghapus data dengan kode_akun     = '.$kode_akun   ;
                redirect(site_url('akun/index'));
            }
        }
          
        

   
        public function input_form(){

            
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            
        //     $this->form_validation->set_rules('tgl_buat', 'tgl_buat', 'required',
        //             array('required' => 'Anda harus memasukkan %s.')
        //             );   
            
        //     $this->form_validation->set_rules('tgl_habis', 'tgl_habis', 'required',
        //             array('required' => 'Anda harus memasukkan %s.')
        //             );
            $this->form_validation->set_rules('nama', 'Nama ', 'required',
                    array('required' => 'Anda harus memasukkan %s.')
                    );
            $this->form_validation->set_rules('header_akun', 'header_akun ', 'required',
                    array('required' => 'Anda harus memasukkan %s.')
                    );
            $this->form_validation->set_rules('ukuran', 'Ukuran ', 'required',
                    array('required' => 'Anda harus memasukkan %s.')
                    );
             
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
              $data['all_akun'] = $this->model_akun->get_akun();
            // $data['kategori'] = $this->M_Kategori->getDataOrderByNama();
            
            if ($this->form_validation->run() == FALSE) {
            $this->template->load('template/template','akun/form_input'); }
            else { $post = $this->input->post();                   
            $data['kirim'] = array('kode_akun'=>
            $this->model_akun->getakunid(),
                              
                                    'nama'=>$post["nama"],
                                    'header_akun'=>$post["header_akun"],
                              'ukuran'=>$post["ukuran"],
                                    // 'id_kategori'=>$post["id_kategori"],
                                          
                              
                                   
                              );
                     
                              $hasil = $this->model_akun->fungsi_input_data($post["nama"], $post["header_akun"], $post["ukuran"]);      
                    if($hasil>0){
                        $data['isi_data'] = $this->model_akun->get_akun();
                        $this->template->load('template/template','akun/tampilan_tabel_data',$data);
                    }
                    else{
                        $data['pesan_error'] = 'Input data tidak berhasil';
                       $this->template->load('template/template','form_input',$data);
                    }
            }
                
            
            
        }
             public function tambah(){
           // $this->data['kode_akun'] = $this->model_akun->getmenuid();
           $data['all_header'] = $this->model_header->get_header();
                // $this->data['kategori'] = $this->M_Kategori->getDataOrderByNama();
                          
                $this->load->view('akun/tambah',$data);
            }

            public function proses_tambah(){
               

                $data = [
                    'kode_akun' => $this->input->post('kode_akun'),
                    'nama_akun' => $this->input->post('nama_akun'),
                    'header_akun' => $this->input->post('nama_header'),
                    'posisi_d_c' => $this->input->post('posisi_d_c'),
                   
                ];
                 // $this->data['kode_akun'] = $this->model_akun->getmenuid();
                $simpan = $this->model_akun->tambah($data);
                if($simpan == 1){
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
                    Data Berhasil Disimpan
                  </div>');
                    redirect('akun');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
                    Data Gagal Disimpan
                  </div>');
                    redirect('akun');
                }
            }

        
        
        public function delete($id)
        {
            if (!isset($id)) show_404();
        
            if ($this->model_akun->deleteFormInput($id)) {
                redirect(site_url('akun/index'));
            }
        }
 

}


       
        