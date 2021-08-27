<?php

class Hargamenu extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                checklogin();
                $this->load->model('M_Harga');
                $this->load->model('Menu_model');
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
                 $data['kode_harga'] = $this->M_Harga->getHargaid();            
                $data['all_harga'] = $this->M_Harga->getdataharga();
              
                $this->template->load('template/template','harga/tampilan_tabel_data',$data);
    }
    public function edit_form($kode_harga)
    {
        if(!isset($kode_harga)) redirect('hargamenu/index');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $data_form_input = $this->M_Harga->getDataEdit($kode_harga);
 
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required',
         array('required' => 'Anda harus memasukkan %s.')
    );

        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric',
         array('required' => 'Anda harus memasukkan %s.',
         'numeric' => '%s hanya berisi angka.')
     );
             
 
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
        if ($this->form_validation->run()) {
         $this->M_Harga->updateFormInput($kode_harga);
         redirect('hargamenu/index'); 
     }
     $data["data_form_input"] = $data_form_input;
     if (!$data["data_form_input"]) show_404();
     $this->template->load('template/template','harga/form_edit_data',$data);
 }
         //fungsi unt

    public function tambah(){
        $data['kode_harga'] = $this->M_Harga->getHargaid();
        // $data['all_kategori'] = $this->M_Ukuran->get_ukuran();
        $data['all_menu'] = $this->Menu_model->get_menu();
                       // $this->data['kategori'] = $this->M_Ukuran->getDataOrderByNama();
       
        $this->load->view('harga/form_input', $data);
            }

            public function proses_tambah(){
              

    $data = [
        'kode_harga' => $this->input->post('kode_harga'),
        // 'id_menu' => $this->input->post('id_menu'),
        'id_menu' => $this->input->post('nama'),
        'nama' => $this->input->post('nama'),
         'ukuran' => $this->input->post('ukuran'),
         'satuan' => $this->input->post('satuan'),
          'harga' => $this->input->post('harga'),
               
    ];
    

    $simpan = $this->M_Harga->tambah($data);
    if($simpan == 1){
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data Berhasil Disimpan
            </div>');
        redirect('hargamenu/index');
    } else {
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
            Data Gagal Disimpan
            </div>');
        redirect('hargamenu/index');
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
        //       $data['all_harga'] = $this->M_Harga->get_harga();
        //     // $data['kategori'] = $this->M_Kategori->getDataOrderByNama();
            
        //     if ($this->form_validation->run() == FALSE) {
        //     $this->template->load('template/template','Hargamenu/form_input'); }
        //     else { $post = $this->input->post();                   
        //     $data['kirim'] = array('kode_harga'=>
        //     $this->M_Harga->getHargamenuid(),
                              
        //                             'nama'=>$post["nama"],
        //                             'jenis'=>$post["jenis"],
        //                       'ukuran'=>$post["ukuran"],
        //                             // 'id_kategori'=>$post["id_kategori"],
                                          
                              
                                   
        //                       );
                     
        //                       $hasil = $this->M_Harga->fungsi_input_data($post["nama"], $post["jenis"], $post["ukuran"]);      
        //             if($hasil>0){
        //                 $data['isi_data'] = $this->M_Harga->get_harga();
        //                 $this->template->load('template/template','Hargamenu/tampilan_tabel_data',$data);
        //             }
        //             else{
        //                 $data['pesan_error'] = 'Input data tidak berhasil';
        //                $this->template->load('template/template','form_input',$data);
        //             }
        //     }
                
            
            
        // }
        
        
        public function delete($kode_harga)
        {
            if (!isset($id)) show_404();
        
            if ($this->M_Harga->deleteFormInput($id)) {
                redirect(site_url('Hargamenu/index'));
            }
        }
 

}


       
        