<?php
    class Pembelian extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('Pembelian_model');
            $this->load->model('bahanbaku_model'); 
            $this->load->model('Msupplier'); 
            $this->load->helper('url_helper');
            $this->load->library('pdf'); 
            $this->load->helper('cek_hak_akses');
            $this->load->helper('cek_login');
            /*if(!cek_login()){
                redirect(site_url('auth/login'));
            }
            $this->load->helper('cek_hak_akses');
            if(!cek_hak_akses($this->uri->segment(1))){
                redirect(site_url('auth/login'));
            }*/
        }
        public function index(){
            $data['isi_data'] = $this->Pembelian_model->getData();
            $this->template->load('template/template','pembelian/view_data',$data);
        }
        public function input_form(){
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('datetimepicker', 'Tanggal Pembelian', 'required',
                    array('required' => 'Anda harus memasukkan %s.')
                );	
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
            $data['faktur'] = $this->Pembelian_model->getPembelianId();
            $data['barang'] = $this->bahanbaku_model->getDataOrderByNama(); 
            $data['dataSupplier'] = $this->Msupplier->getDataOrderByNama(); 
            if ($this->form_validation->run() == FALSE){                 
                $this->template->load('template/template','pembelian/form_input_data',$data);
            }else{		
                $post = $this->input->post();
                $data['faktur_pembelian'] = array(
                                                'no_faktur'         => $post["no_faktur"], 
                                                'id_supplier'       => $post["id_supplier"],
                                                'datetimepicker'    => $post["datetimepicker"]            
                                            );
                $_SESSION['no_faktur']      = $post["no_faktur"];
                $_SESSION['id_supplier']    = $post["id_supplier"];
                $_SESSION['datetimepicker'] = $post["datetimepicker"];
                $data['isi_data'] = $this->Pembelian_model->getDataDetail($post["no_faktur"],$post["id_supplier"]);
                $this->template->load('template/template','pembelian/form_input_detail_pembelian',$data);
            }  
        }
        public function input_form_detail(){
            $this->Pembelian_model->fungsi_input_data();                  
            $data['barang'] = $this->bahanbaku_model->getDataOrderByNama2($_SESSION['no_faktur']);
            $data['dataSupplier'] = $this->Msupplier->getDataOrderByNama(); 
            $post = $this->input->post();
            $data['faktur_pembelian'] = $this->Pembelian_model->getDataDetail($_SESSION['no_faktur'],$_SESSION['id_supplier']);
            $data['isi_data'] = $this->Pembelian_model->getDataDetail($_SESSION['no_faktur'],$_SESSION['id_supplier']);
            $this->template->load('template/template','pembelian/form_input_detail_pembelian',$data);
        }
        public function simpan_barang(){
            $config = 
                array(
                    array(
                        'field'                 => 'jumlah_beli',
                        'label'                 => 'Jumlah Bahan Baku',
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
                $this->Pembelian_model->fungsi_input_data();
                redirect('pembelian/input_form_detail2');
            }
        }
        public function input_form_detail2(){
            $data['faktur_pembelian'] = $this->Pembelian_model->getDataDetail($_SESSION['no_faktur'],$_SESSION['id_supplier']);
            $data['isi_data'] = $this->Pembelian_model->getDataDetail($_SESSION['no_faktur'],$_SESSION['id_supplier']);
            $data['barang'] = $this->bahanbaku_model->getDataOrderByNama2($_SESSION['no_faktur']); 
            $data['dataSupplier'] = $this->Msupplier->getDataOrderByNama(); 
            $this->template->load('template/template','pembelian/form_input_detail_pembelian',$data);
        }
        public function ambildataBahanBaku(){
            $data['bb'] = $this->db->get('bahan_baku')->result_array();
            echo json_encode($data);
        }
        public function selesai(){
        	$hasil = $this->Pembelian_model->generate_jurnal_umum($_SESSION['no_faktur'],$_SESSION['id_supplier']);
            $nofaktur = $_SESSION['no_faktur'];
            unset($_SESSION['no_faktur']);
            unset($_SESSION['id_supplier']);
            unset($_SESSION['datetimepicker']);
            redirect('pembelian/index');
        }
        public function delete_form_detail2($id_transaksi_beli,$no_faktur,$id_supplier){
            if($this->Pembelian_model->deleteFormInputDetail($id_transaksi_beli,$no_faktur,$id_supplier)){
                redirect(site_url('pembelian/input_form_detail2'));
            } 
        }
        public function view_data_detail2($no_faktur,$id_supplier){
            $data['isi_data'] = $this->Pembelian_model->getDataDetail($no_faktur,$id_supplier);
            $this->template->load('template/template','pembelian/view_data_detail_pembelian2',$data);
        }
        public function cetak($no_faktur,$id_supplier){
            $data['pembelian'] = $this->Pembelian_model->getDataDetail1($no_faktur,$id_supplier);
            $data['isi_data'] = $this->Pembelian_model->getDataDetail2($no_faktur,$id_supplier);
            $this->load->view('pembelian/laporan_cetak',$data);
        }
    }
?>