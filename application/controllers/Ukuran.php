<?php

class Ukuran extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('M_Ukuran');
                // $this->load->model('M_Ukuran');
                $this->load->helper('url_helper');
                
        }
     

    public function index()
    {       
                $data['id_kategori'] = $this->M_Ukuran->getukuranid();
            
                $data['all_ukuran'] = $this->M_Ukuran->get_ukuran();
              
                $this->template->load('template/template','ukuran/tampilan_tabel_data',$data);
    }
     public function edit_form($id_kategori)
     {
         if(!isset($id_kategori)) redirect('ukuran/view_data');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $data_form_input = $this->M_Ukuran->getDataEdit($id_kategori);
            
            $this->form_validation->set_rules('nama_kategori', 'Nama ukuran', 'required|alpha_numeric_spaces',
                array('required' => 'Anda harus memasukkan %s.',
                'alpha_numeric_spaces'=>'%s hanya boleh berisi angka, huruf A-Z dan spasi')
                );
      
            $this->form_validation->set_rules('satuan', 'Satuan', 'required',
                array('required' => 'Anda harus memasukkan %s.')
            );
                
        
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
            if ($this->form_validation->run()) {
                $this->M_Ukuran->updateFormInput($id_kategori);
                redirect('ukuran/index'); 
            }
            $data["data_form_input"] = $data_form_input;
            if (!$data["data_form_input"]) show_404();
            $this->template->load('template/template','ukuran/form_edit_data',$data);
        }
        //fungsi untuk menghapus data
        // public function delete_form($id_kategori    ){
        //     if (!isset($id_kategori )) show_404();
        //     if ($this->M_Ukuran->deleteFormInput($id_kategori )) {
        //         echo 'Berhasil menghapus data dengan id_kategori     = '.$id_kategori   ;
        //         redirect(site_url('ukuran/index'));
        //     }
        // }
             public function tambah(){
           $this->data['id_kategori'] = $this->M_Ukuran->getukuranid();
       
                // $this->data['ukuran'] = $this->M_Ukuran->getDataOrderByNama();
                          
                $this->load->view('ukuran/form_input', $this->data);
            }

            public function proses_tambah(){
               

                $data = [
                    'id_kategori' => $this->input->post('id_kategori'),
                    'nama_kategori' => $this->input->post('nama_kategori'),
                     'satuan' => $this->input->post('satuan'),
                    // 'id_kategori' => $this->input->post('id_kategori'),              
                    // 'stok' => $this->input->post('stok'),    
                ];
                 $this->data['id_kategori'] = $this->M_Ukuran->getukuranid();
                $simpan = $this->M_Ukuran->tambah($data);
                if($simpan == 1){
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
                    Data Berhasil Disimpan
                  </div>');
                    redirect('ukuran');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
                    Data Gagal Disimpan
                  </div>');
                    redirect('ukuran');
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
        //       $data['all_ukuran'] = $this->M_Ukuran->get_ukuran();
        //     // $data['ukuran'] = $this->M_Ukuran->getDataOrderByNama();
            
        //     if ($this->form_validation->run() == FALSE) {
        //     $this->template->load('template/template','ukuran/form_input'); }
        //     else { $post = $this->input->post();                   
        //     $data['kirim'] = array('id_kategori'=>
        //     $this->M_Ukuran->getukuranid(),
                              
        //                             'nama'=>$post["nama"],
        //                             'jenis'=>$post["jenis"],
        //                       'ukuran'=>$post["ukuran"],
        //                             // 'id_kategori'=>$post["id_kategori"],
                                          
                              
                                   
        //                       );
                     
        //                       $hasil = $this->M_Ukuran->fungsi_input_data($post["nama"], $post["jenis"], $post["ukuran"]);      
        //             if($hasil>0){
        //                 $data['isi_data'] = $this->M_Ukuran->get_ukuran();
        //                 $this->template->load('template/template','ukuran/tampilan_tabel_data',$data);
        //             }
        //             else{
        //                 $data['pesan_error'] = 'Input data tidak berhasil';
        //                $this->template->load('template/template','form_input',$data);
        //             }
        //     }
                
            
            
        // }
        
        
        public function delete($id)
        {
            if (!isset($id)) show_404();
        
            if ($this->M_Ukuran->deleteFormInput($id)) {
                redirect(site_url('ukuran/index'));
            }
        }
 

}


       
        