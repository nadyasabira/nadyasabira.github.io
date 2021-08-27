<?php
    class form_permintaan_bb extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('form_permintaan_bb_model');
            $this->load->model('bahanbaku_model'); //digunakan untuk melihat id buah dan nama buah
            //$this->load->model('Msupplier'); //digunakan untuk melihat id supplier dan nama supplier
            $this->load->helper('url_helper');
            $this->load->library('pdf'); //digunakan untuk meload library pdf
            /*$this->load->helper('cek_hak_akses');
            $this->load->helper('cek_login');
            if(!cek_login()){
                redirect(site_url('auth/login'));
            }
            $this->load->helper('cek_hak_akses');
            if(!cek_hak_akses($this->uri->segment(1))){
                redirect(site_url('auth/login'));
            }*/
        }
        public function ambildataBahanBaku(){
            $data['bb'] = $this->db->get('bahan_baku')->result_array();
            echo json_encode($data);
        }
        public function index(){
            $data['isi_data'] = $this->form_permintaan_bb_model->getData();
            $this->template->load('template/template','form_permintaan_bb/view_data',$data);
        }
        public function view_data_pemilik(){
            $data['isi_data'] = $this->form_permintaan_bb_model->getData_Pemilik();
            $this->template->load('template/template','form_permintaan_bb/view_data_pemilik',$data);
        }
        public function input_form(){
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('datetimepicker', 'Tanggal Permintaan', 'required',
                array('required' => '%s tidak boleh kosong')
            );	
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
            $data['id_permintaan_bb'] = $this->form_permintaan_bb_model->getPermintaanId();
            $data['barang'] = $this->bahanbaku_model->getDataOrderByNama(); 
            if ($this->form_validation->run() == FALSE){                 
                $this->template->load('template/template','form_permintaan_bb/form_input_data',$data);
            }else{		
                $post = $this->input->post();
                $data['permintaan'] = array(
                                        'id_permintaan_bb' => $post["id_permintaan_bb"], 
                                        'datetimepicker'   => $post["datetimepicker"]                     
                                    );
                $_SESSION['id_permintaan_bb'] = $post["id_permintaan_bb"];
                $_SESSION['datetimepicker'] = $post["datetimepicker"];
                $data['isi_data'] = $this->form_permintaan_bb_model->getDataDetail($post["id_permintaan_bb"]);
                $this->template->load('template/template','form_permintaan_bb/form_input_detail_permintaan',$data);     
            }  
        }
        public function input_form_detail(){
            $this->form_permintaan_bb_model->fungsi_input_data();                  
            $data['barang'] = $this->bahanbaku_model->getDataOrderByNama3($_SESSION['id_permintaan_bb']); 
            $post = $this->input->post();
            $data['permintaan'] = $this->form_permintaan_bb_model->getDataDetail($_SESSION['id_permintaan_bb']);
            $data['isi_data'] = $this->form_permintaan_bb_model->getDataDetail($_SESSION['id_permintaan_bb']);
            $this->template->load('template/template','form_permintaan_bb/form_input_detail_permintaan',$data);
        }
        public function simpan_barang(){
            $config = 
                array(
                    array(
                        'field'                 => 'jumlah',
                        'label'                 => 'Jumlah Bahan Baku',
                        'rules'                 => 'required|is_natural_no_zero',
                        'errors'                => array(
                        'required'              => '%s tidak boleh kosong',
                        'is_natural_no_zero'    => '%s hanya boleh berisi angka lebih besar dari 0'
                        )
                    )
                );
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == FALSE){
                $this->input_form_detail();
            }else{
                $this->form_permintaan_bb_model->fungsi_input_data();
                redirect('form_permintaan_bb/input_form_detail2');
            }
        }
        public function input_form_detail2(){
            $data['permintaan']= $this->form_permintaan_bb_model->getDataDetail($_SESSION['id_permintaan_bb']);
            $data['isi_data'] = $this->form_permintaan_bb_model->getDataDetail($_SESSION['id_permintaan_bb']);
            $data['barang'] = $this->bahanbaku_model->getDataOrderByNama3($_SESSION['id_permintaan_bb']); 
            $this->template->load('template/template','form_permintaan_bb/form_input_detail_permintaan',$data);
        }
        public function selesai(){
            $id_permintaan_bb = $_SESSION['id_permintaan_bb'];
            unset($_SESSION['id_permintaan_bb']);
            unset($_SESSION['datetimepicker']);
            redirect('form_permintaan_bb/index');
        }
        public function delete_form_detail2($id_detail){
            if($this->form_permintaan_bb_model->deleteFormInputDetail($id_detail)){
                redirect(site_url('form_permintaan_bb/input_form_detail2'));
            } 
        }
        public function view_data_detail2($id_permintaan_bb){
            $data['isi_data'] = $this->form_permintaan_bb_model->getDataDetail($id_permintaan_bb);
            $this->template->load('template/template','form_permintaan_bb/view_data_detail_permintaan2',$data);
        }
        public function view_data_detail2_pemilik($id_permintaan_bb){
            $data['isi_data'] = $this->form_permintaan_bb_model->getDataDetail($id_permintaan_bb);
            $this->template->load('template/template','form_permintaan_bb/view_data_detail_permintaan2_pemilik',$data);
        }
    }
?>