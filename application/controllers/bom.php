<?php
    class bom extends CI_Controller {

        public function __construct(){
            parent::__construct();
            //session_start();
            $this->load->model('bom_model');
            $this->load->model('bahanbaku_model');
            $this->load->model('Menu_model');  
            $this->load->helper('url_helper');
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
        public function index(){
            $data['isi_data'] = $this->bom_model->getData();
            $this->template->load('template/template','bom/view_data',$data);
        }
        public function view_data_pr(){
            $data['isi_data'] = $this->bom_model->getData();
            $this->template->load('template/template','bom/view_data_pr',$data);
        }
        public function input_form(){
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id_menu', 'Nama Menu', 'required',
                array('required' => '%s tidak boleh kosong')
            );	
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>','</li></div>');
            $data['id_bom'] = $this->bom_model->getBomId();
            $data['menu'] = $this->Menu_model->getDataOrderByNama4(); 
            $data['barang'] = $this->bahanbaku_model->getDataOrderByNama(); 
            if ($this->form_validation->run() == FALSE){                 
                $this->template->load('template/template','bom/form_input_data',$data);
            }else{		
                $post = $this->input->post();
                $data['bom'] = array(
                                        'id_bom' => $post["id_bom"], 
                                        'id_menu' => $post["id_menu"],                              
                                        );
                $_SESSION['id_bom']      = $post["id_bom"];
                $_SESSION['id_menu'] = $post["id_menu"];
                $data['isi_data'] = $this->bom_model->getDataDetail($post["id_bom"]);
                $this->template->load('template/template','bom/form_input_detail',$data);     
            }  
        }
        public function input_form_detail(){
            $this->bom_model->fungsi_input_data();                  
            $data['barang'] = $this->bahanbaku_model->getDataOrderByNama4($_SESSION['id_bom']);
            $post = $this->input->post();
            $data['bom'] = $this->bom_model->getDataDetail($_SESSION['id_bom']);
            $data['isi_data'] = $this->bom_model->getDataDetail($_SESSION['id_bom']);
            $this->template->load('template/template','bom/form_input_detail',$data);
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
                    ),
                );
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == FALSE){
                $this->input_form_detail();
            }else{
                $this->bom_model->fungsi_input_data();
                redirect('bom/input_form_detail2');
            }
        }
        public function input_form_detail2(){
            $data['bom']= $this->bom_model->getDataDetail($_SESSION['id_bom']);
            $data['isi_data'] = $this->bom_model->getDataDetail($_SESSION['id_bom']);
            $data['barang']  = $this->bahanbaku_model->getDataOrderByNama4($_SESSION['id_bom']); 
            $this->template->load('template/template','bom/form_input_detail',$data);
        }
        public function selesai(){
            $id_bom = $_SESSION['id_bom'];
            unset($_SESSION['id_bom']);
            unset($_SESSION['id_menu']);
            redirect('bom/index');
        }
        public function delete_form_detail2($id_detail){
            if($this->bom_model->deleteFormInputDetail($id_detail)){
                redirect(site_url('bom/input_form_detail2'));
            } 
        }
        public function view_data_detail($id_bom){
            $data['isi_data'] = $this->bom_model->getDataDetail($id_bom);
            $this->template->load('template/template','bom/view_data_detail',$data);
        }
        public function view_data_detail_pr($id_bom){
            $data['isi_data'] = $this->bom_model->getDataDetail($id_bom);
            $this->template->load('template/template','bom/view_data_detail_pr',$data);
        }
        public function edit_form($id_bom,$id_menu){
            if ((!isset($id_bom)) and (!isset($id_menu))) redirect('bom');
            $_SESSION['id_bom'] = $id_bom;
            $_SESSION['id_menu'] = $id_menu;
            $data['isi_data'] = $this->bom_model->getDataDetail1($id_bom,$id_menu);
            $this->template->load('template/template','bom/form_input_detail',$data);
        }
    }
?>