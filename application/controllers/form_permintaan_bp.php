<?php
    class form_permintaan_bp extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('form_permintaan_bp_model');
            $this->load->model('bahanpenolong_model'); 
            $this->load->helper('url_helper');
            $this->load->library('pdf'); 
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
        public function ambildataBahanPenolong(){
            $data['bp'] = $this->db->get('bahan_penolong')->result_array();
            echo json_encode($data);
        }
        public function index(){
            $data['isi_data'] = $this->form_permintaan_bp_model->getData();
            $this->template->load('template/template','form_permintaan_bp/view_data',$data);
        }
        public function view_data_pemilik(){
            $data['isi_data'] = $this->form_permintaan_bp_model->getData_pemilik();
            $this->template->load('template/template','form_permintaan_bp/view_data_pemilik',$data);
        }
        public function input_form(){
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('datetimepicker', 'Tanggal Permintaan', 'required',
                array('required' => 'Anda harus memasukkan %s.')
            );	
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
            $data['id_permintaan_bp'] = $this->form_permintaan_bp_model->getPermintaanId();
            $data['barang'] = $this->bahanpenolong_model->getDataOrderByNama(); 
            if ($this->form_validation->run() == FALSE){                 
                $this->template->load('template/template','form_permintaan_bp/form_input_data',$data);
            }else{		
                $post = $this->input->post();
                $data['permintaan'] = array(
                                        'id_permintaan_bp' => $post["id_permintaan_bp"], 
                                        'datetimepicker'   => $post["datetimepicker"]                         
                                    );
                $_SESSION['id_permintaan_bp'] = $post["id_permintaan_bp"];
                $_SESSION['datetimepicker'] = $post["datetimepicker"];
                $data['isi_data'] = $this->form_permintaan_bp_model->getDataDetail($post["id_permintaan_bp"]);
                $this->template->load('template/template','form_permintaan_bp/form_input_detail_permintaan',$data);     
            }  
        }
        public function input_form_detail(){
            $this->form_permintaan_bp_model->fungsi_input_data();                  
            $data['barang']         = $this->bahanpenolong_model->getDataOrderByNama3($_SESSION['id_permintaan_bp']); 
            $post = $this->input->post();
            $data['permintaan'] = $this->form_permintaan_bp_model->getDataDetail($_SESSION['id_permintaan_bp']);
            $data['isi_data'] = $this->form_permintaan_bp_model->getDataDetail($_SESSION['id_permintaan_bp']);
            $this->template->load('template/template','form_permintaan_bp/form_input_detail_permintaan',$data);
        }
        public function simpan_barang(){
            $config = 
                array(
                    array(
                        'field'                 => 'jumlah',
                        'label'                 => 'Jumlah Bahan Penolong',
                        'rules'                 => 'required|is_natural_no_zero',
                        'errors'                => array(
                        'required'              => '%s tidak boleh kosong',
                        'is_natural_no_zero'    => '%s hanya boleh berisi angka dan > 0'
                        )
                    )
                );
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == FALSE){
                $this->input_form_detail();
            }else{
                $this->form_permintaan_bp_model->fungsi_input_data();
                redirect('form_permintaan_bp/input_form_detail2');
            }
        }
        public function input_form_detail2(){
            $data['permintaan'] = $this->form_permintaan_bp_model->getDataDetail($_SESSION['id_permintaan_bp']);
            $data['isi_data'] = $this->form_permintaan_bp_model->getDataDetail($_SESSION['id_permintaan_bp']);
            $data['barang'] = $this->bahanpenolong_model->getDataOrderByNama3($_SESSION['id_permintaan_bp']); 
            $this->template->load('template/template','form_permintaan_bp/form_input_detail_permintaan',$data);
        }
        public function selesai(){
            $id_permintaan_bp = $_SESSION['id_permintaan_bp'];
            unset($_SESSION['id_permintaan_bp']);
            unset($_SESSION['datetimepicker']);
            redirect('form_permintaan_bp/index');
        }
        public function delete_form_detail2($id_detail){
            if($this->form_permintaan_bp_model->deleteFormInputDetail($id_detail)){
                redirect(site_url('form_permintaan_bp/input_form_detail2'));
            } 
        }
        public function view_data_detail2($id_permintaan_bp){
            $data['isi_data'] = $this->form_permintaan_bp_model->getDataDetail($id_permintaan_bp);
            $this->template->load('template/template','form_permintaan_bp/view_data_detail_permintaan2',$data);
        }
        public function view_data_detail2_pemilik($id_permintaan_bp){
            $data['isi_data'] = $this->form_permintaan_bp_model->getDataDetail($id_permintaan_bp);
            $this->template->load('template/template','form_permintaan_bp/view_data_detail_permintaan2_pemilik',$data);
        }
    }
?>