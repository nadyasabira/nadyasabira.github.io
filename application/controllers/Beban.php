<?php

class Beban extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model('beban_model');
        
        //   $this->load->helper('url_helper');
        //         $this->load->helper('cek_login');
        //         if(!cek_login()){
        //             redirect(site_url('tampilan'));
        //         }

        //         $this->load->helper('cek_hak_akses');
        //         if(!cek_hak_akses($this->uri->segment(1))){
        //             redirect(site_url('tampilan/awal'));
        //         }

    }


    public function index()
    {       
    $data['kode_akun'] = $this->beban_model->getbebanid();
    $data['all_beban'] = $this->beban_model->get_beban();

       $this->template->load('template/template','beban/tampilan_tabel_data',$data);
   }
   public function edit_form($kode_akun)
   {
       if(!isset($kode_akun)) redirect('beban/view_data');
       $this->load->helper(array('form', 'url'));
       $this->load->library('form_validation');
       $data_form_input = $this->beban_model->getDataEdit($kode_akun);

       $this->form_validation->set_rules('jenis_beban', 'Jenis', 'required',
          array('required' => 'Anda harus memasukkan %s.')
          );
        $this->form_validation->set_rules('kode_akun', 'ID Beban', 'required',
          array('required' => 'Anda harus memasukkan %s.')
          );
       $this->form_validation->set_rules('nama_beban', 'Nama Beban', 'required|alpha_numeric_spaces',
        array('required' => 'Anda harus memasukkan %s.',
            'alpha_numeric_spaces'=>'%s hanya boleh berisi angka, huruf A-Z dan spasi')
    );
             //  $this->form_validation->set_rules('ukuran', 'ukuran', 'required|alpha_numeric_spaces',
             //    array('required' => 'Anda harus memasukkan %s.',
             //    'alpha_numeric_spaces'=>'%s hanya boleh berisi angka, huruf A-Z dan spasi')
             //    );
            // $this->form_validation->set_rules('stok', 'Stok', 'required|numeric',
            //     array('required' => 'Anda harus memasukkan %s.',
            //         'numeric' => '%s hanya berisi angka.'


       $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
       $data['kategori'] = $this->beban_model->get_beban();
       if ($this->form_validation->run()) {
        $this->beban_model->updateFormInput($kode_akun);
        redirect('beban/index'); 
    }
    $data["data_form_input"] = $data_form_input;
    if (!$data["data_form_input"]) show_404();
    $this->template->load('template/template','beban/form_edit_data',$data);
}

        //fungsi untuk menghapus data
public function delete_form($kode_akun){
    if (!isset($kode_akun)) show_404();
    if ($this->beban_model->deleteFormInput($kode_akun)) {
        echo 'Berhasil menghapus data dengan kode_akun = '.$kode_akun	;
        redirect(site_url('beban/index'));
    }
}
public function tambah(){
    $this->data['kode_akun'] = $this->beban_model->getbebanid();
 $this->load->view('beban/form_input',$this->data);
}

public function proses_tambah(){


    $data = [
        'kode_akun' => $this->input->post('kode_akun'),        
        'jenis_beban' => $this->input->post('jenis_beban'),
        'nama_beban' => $this->input->post('nama_beban'),
      
    ];
    $data2 = [
        'kode_akun' => $this->input->post('kode_akun'),        
        'nama_akun' => $this->input->post('nama_beban'),
        'header_akun' => "51", 
        'posisi_d_c' => "d"     
    ];

    $this->data['kode_akun'] = $this->beban_model->getbebanid();
    $this->data2['kode_akun'] = $this->beban_model->getbebanid();
    $simpan = $this->beban_model->tambah($data);
    $simpan2= $this->beban_model->tambah_akun($data2);
    if($simpan == 1||$simpan2 == 1){
        
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data Berhasil Disimpan
            </div>');
        redirect('Beban');
    } else {
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
            Data Gagal Disimpan
            </div>');
        redirect('Beban');
    }
}





   public function delete($id)
   {
    if (!isset($id)) show_404();

    if ($this->beban_model->deleteFormInput($id)) {
        redirect(site_url('beban/index'));
    }
}


}



