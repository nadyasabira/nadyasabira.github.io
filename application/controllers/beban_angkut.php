<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class beban_angkut extends CI_Controller {
		public function __construct(){
			parent::__construct();
			checklogin();
			$this->load->model('beban_angkut_model');
			// $this->load->helper('cek_login');
			// 		if(!cek_login()){
			// 			redirect(site_url('tampilan'));
			// 		}
			// 		$this->load->helper('cek_hak_akses');
			// 		if(!cek_hak_akses($this->uri->segment(1))){
			// 			redirect(site_url('tampilan/awal'));
			// 		}
			// 	}
		}
		public function index(){
			$data['isi_data'] = $this->beban_angkut_model->getDataDetail();
			$this->template->load('template/template','transaksi/view_beban_angkut',$data);  
		}
		public function input_beban(){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('datetimepicker', 'Tanggal Transaksi', 'required',
					array('required' => '%s tidak boleh kosong')
				);				
			$this->form_validation->set_rules('nominal', 'Nominal', 'required|is_natural_no_zero',
					array('required' => '%s tidak boleh kosong',
					'is_natural_no_zero' => '%s hanya boleh berisi angka lebih besar dari 0')
				);	
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
			$data['id_biaya_angkut'] = $this->beban_angkut_model->getbebanId();
			$data['nofaktur'] = $this->beban_angkut_model->getNoFaktur();
			$data['isi_data'] = $this->beban_angkut_model->getDataDetail();
			if ($this->form_validation->run() == FALSE){
				$this->template->load('template/template','transaksi/input_beban_angkut',$data);  		
			}else{
				$this->beban_angkut_model->fungsi_input_data2();
				$data['isi_data'] = $this->beban_angkut_model->getDataDetail();

				$getidtrans =$this->db->select('biaya_angkut_pembelian.*')
				->where('biaya_angkut_pembelian.id_biaya_angkut',$this->input->post('id_biaya_angkut'))
				->get('biaya_angkut_pembelian')->row_array();
				$dataJurnal1 = [		
					'id_transaksi' 	=> $getidtrans['id_transaksi'],
					'kode_akun' 	=> '112',
					'tgl_jurnal' 	=> $this->input->post('datetimepicker'),				
					'posisi_d_c' 	=> 'd',
					'nominal' 		=> $this->input->post('nominal'),
					'kelompok' 		=>'1',
					'transaksi' 	=> 'beban_angkut',
					'is_created' 	=> '4',
				];
				$this->db->insert('jurnal_umum', $dataJurnal1);
				$dataJurnal2 = [
					'id_transaksi' 	=> $getidtrans['id_transaksi'],
					'kode_akun' 	=> '111',
					'tgl_jurnal' 	=> $this->input->post('datetimepicker'),				
					'posisi_d_c' 	=> 'c',
					'nominal' 		=> $this->input->post('nominal'),
					'kelompok' 		=>'1',
					'transaksi' 	=> 'beban_angkut',
					'is_created' 	=> '4',
				];
				$this->db->insert('jurnal_umum', $dataJurnal2);
				$this->template->load('template/template','transaksi/view_beban_angkut',$data);  
			}
		}
	}