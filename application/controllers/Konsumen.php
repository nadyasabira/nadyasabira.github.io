<?php

class Konsumen extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                checklogin();
                $this->load->model('M_Konsumen');
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
                 $data['id_konsumen'] = $this->M_Konsumen->getkonsumenid();            
                $data['all_konsumen'] = $this->M_Konsumen->get_konsumen();
              
                $this->template->load('template/template','konsumen/tampilan_tabel_data',$data);
    }
     public function edit_form($id_konsumen)
     {
         if(!isset($id_konsumen )) redirect('bahan/view_data');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $data_form_input = $this->M_Konsumen->getDataEdit($id_konsumen);
            
            $this->form_validation->set_rules('nama_konsumen', 'Nama Konsumen', 'required|alpha_numeric_spaces',
                array('required' => 'Anda harus memasukkan %s.',
                'alpha_numeric_spaces'=>'%s hanya boleh berisi angka, huruf A-Z dan spasi')
                );
             $this->form_validation->set_rules('alamat', 'alamat', 'required|alpha_numeric_spaces',
                array('required' => 'Anda harus memasukkan %s.',
                'alpha_numeric_spaces'=>'%s hanya boleh berisi angka, huruf A-Z dan spasi')
                );
              $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|alpha_numeric_spaces',
                array('required' => 'Anda harus memasukkan %s.',
                'alpha_numeric_spaces'=>'%s hanya boleh berisi angka, huruf A-Z dan spasi')
                );
            // $this->form_validation->set_rules('stok', 'Stok', 'required|numeric',
            //     array('required' => 'Anda harus memasukkan %s.',
            //         'numeric' => '%s hanya berisi angka.'
                
        
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
            if ($this->form_validation->run()) {
                $this->M_Konsumen->updateFormInput($id_konsumen);
                redirect('konsumen/index'); 
            }
            $data["data_form_input"] = $data_form_input;
            if (!$data["data_form_input"]) show_404();
            $this->template->load('template/template','konsumen/form_edit_data',$data);
        }
        //fungsi untuk menghapus data
        public function delete_form($id_konsumen){
            if (!isset($id_konsumen )) show_404();
            if ($this->M_Konsumen->deleteFormInput($id_konsumen )) {
                echo 'Berhasil menghapus data dengan id_konsumen     = '.$id_konsumen   ;
                redirect(site_url('konsumen/index'));
            }
        }
             public function tambah(){
           $this->data['id_konsumen'] = $this->M_Konsumen->getkonsumenid();
       
                // $this->data['kategori'] = $this->M_Kategori->getDataOrderByNama();
                          
                $this->load->view('konsumen/form_input', $this->data);
            }

            public function proses_tambah(){
               

                $data = [
                    'id_konsumen' => $this->input->post('id_konsumen'),
                    'nama_konsumen' => $this->input->post('nama_konsumen'),
                    'alamat' => $this->input->post('alamat'),
                    'no_telp' => $this ->input->post('no_telp'),
                    // 'id_kategori' => $this->input->post('id_kategori'),              
                    // 'stok' => $this->input->post('stok'),    
                ];
                 $this->data['id_konsumen'] = $this->M_Konsumen->getkonsumenid();
                $simpan = $this->M_Konsumen->tambah($data);
                if($simpan == 1){
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
                    Data Berhasil Disimpan
                  </div>');
                    redirect('konsumen');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
                    Data Gagal Disimpan
                  </div>');
                    redirect('konsumen');
                }
            }

          
        

   
        // public function input_form(){

            
        //     $this->load->helper(array('form', 'url'));
        //     $this->load->library('form_validation');
            
        // //     $this->form_validation->set_rules('tgl_buat', 'tgl_buat', 'required',
        // //             array('required' => 'Anda harus memasukkan %s.')
        // //             );   
            
        // //     $this->form_validation->set_rules('tgl_habis', 'tgl_habis', 'required',
        // //             array('required' => 'Anda harus memasukkan %s.')
        // //             );
        //     $this->form_validation->set_rules('nama', 'Nama ', 'required',
        //             array('required' => 'Anda harus memasukkan %s.')
        //             );
        //     $this->form_validation->set_rules('jenis', 'Jenis ', 'required',
        //             array('required' => 'Anda harus memasukkan %s.')
        //             );
        //     $this->form_validation->set_rules('ukuran', 'Ukuran ', 'required',
        //             array('required' => 'Anda harus memasukkan %s.')
        //             );
             
            
        //     $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
        //       $data['all_konsumen'] = $this->M_Konsumen->get_konsumen();
        //     // $data['kategori'] = $this->M_Kategori->getDataOrderByNama();
            
        //     if ($this->form_validation->run() == FALSE) {
        //     $this->template->load('template/template','konsumen/form_input'); }
        //     else { $post = $this->input->post();                   
        //     $data['kirim'] = array('id_konsumen'=>
        //     $this->M_Konsumen->getkonsumenid(),
                              
        //                             'nama'=>$post["nama"],
        //                             'jenis'=>$post["jenis"],
        //                       'ukuran'=>$post["ukuran"],
        //                             // 'id_kategori'=>$post["id_kategori"],
                                          
                              
                                   
        //                       );
                     
        //                       $hasil = $this->M_Konsumen->fungsi_input_data($post["nama"], $post["jenis"], $post["ukuran"]);      
        //             if($hasil>0){
        //                 $data['isi_data'] = $this->M_Konsumen->get_konsumen();
        //                 $this->template->load('template/template','konsumen/tampilan_tabel_data',$data);
        //             }
        //             else{
        //                 $data['pesan_error'] = 'Input data tidak berhasil';
        //                $this->template->load('template/template','form_input',$data);
        //             }
        //     }
                
            
            
        // }
        
        
        public function delete($id_konsumen)
        {
            if (!isset($id)) show_404();
        
            if ($this->M_Konsumen->deleteFormInput($id)) {
                redirect(site_url('konsumen/index'));
            }
        }
 

}


       
        