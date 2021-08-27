<?php

class Menu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model('Menu_model');
          $this->load->model('M_Ukuran');
                // $this->load->model('M_Ukuran');
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
       $data['id_menu'] = $this->Menu_model->getmenuid();

       $data['all_menu'] = $this->Menu_model->get_menu();

       $this->template->load('template/template','menu/tampilan_tabel_data',$data);
   }
   public function edit_form($id_menu)
   {
       if(!isset($id_menu)) redirect('menu/view_data');
       $this->load->helper(array('form', 'url'));
       $this->load->library('form_validation');
       $data_form_input = $this->Menu_model->getDataEdit($id_menu);

       $this->form_validation->set_rules('nama', 'Nama Nama Menu', 'required|alpha_numeric_spaces',
        array('required' => 'Anda harus memasukkan %s.',
            'alpha_numeric_spaces'=>'%s hanya boleh berisi angka, huruf A-Z dan spasi')
    );
             // $this->form_validation->set_rules('jenis', 'Jenis', 'required|alpha_numeric_spaces',
             //    array('required' => 'Anda harus memasukkan %s.',
             //    'alpha_numeric_spaces'=>'%s hanya boleh berisi angka, huruf A-Z dan spasi')
             //    );
             //  $this->form_validation->set_rules('ukuran', 'ukuran', 'required|alpha_numeric_spaces',
             //    array('required' => 'Anda harus memasukkan %s.',
             //    'alpha_numeric_spaces'=>'%s hanya boleh berisi angka, huruf A-Z dan spasi')
             //    );
            // $this->form_validation->set_rules('stok', 'Stok', 'required|numeric',
            //     array('required' => 'Anda harus memasukkan %s.',
            //         'numeric' => '%s hanya berisi angka.'


       $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
       if ($this->form_validation->run()) {
        $this->Menu_model->updateFormInput($id_menu);
        redirect('menu/index'); 
    }
    $data["data_form_input"] = $data_form_input;
    if (!$data["data_form_input"]) show_404();
    $this->template->load('template/template','menu/form_edit_data',$data);
}

        //fungsi untuk menghapus data
public function delete_form($id_menu	){
    if (!isset($id_menu	)) show_404();
    if ($this->menu_model->deleteFormInput($id_menu	)) {
        echo 'Berhasil menghapus data dengan id_menu	 = '.$id_menu	;
        redirect(site_url('menu/index'));
    }
}
public function tambah(){
 $this->data['id_menu'] = $this->Menu_model->getmenuid();

                // $this->data['kategori'] = $this->M_Ukuran->getDataOrderByNama();

 $this->load->view('menu/form_input', $this->data);
}

public function proses_tambah(){


    $data = [
        'id_menu' => $this->input->post('id_menu'),
        'nama' => $this->input->post('nama'),
                    // 'jenis' => $this->input->post('jenis'),
                    // 'ukuran' => $this ->input->post('ukuran'),
                    // 'id_kategori' => $this->input->post('id_kategori'),              
                    // 'stok' => $this->input->post('stok'),    
    ];
    $this->data['id_menu'] = $this->Menu_model->getmenuid();
    $simpan = $this->Menu_model->tambah($data);
    if($simpan == 1){
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            Data Berhasil Disimpan
            </div>');
        redirect('menu');
    } else {
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
            Data Gagal Disimpan
            </div>');
        redirect('menu');
    }
}





   public function delete($id)
   {
    if (!isset($id)) show_404();

    if ($this->Menu_model->deleteFormInput($id)) {
        redirect(site_url('menu/index'));
    }
}


}



