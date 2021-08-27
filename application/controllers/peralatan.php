<?php
	class peralatan extends CI_Controller {
		public function __construct(){
	        parent::__construct();
	        $this->load->model('peralatan_model');
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
		public function input_form(){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
				
			$this->form_validation->set_rules('nama_alat', 'Nama Peralatan', 'required|alpha_numeric_spaces|max_length[30]',
				array('required' => '%s tidak boleh kosong',
					'alpha_numeric_spaces'=>'%s hanya boleh berisi angka, huruf dan spasi',
					'max_length' => '%s tidak boleh lebih dari 30 karakter')
			);
			$this->form_validation->set_rules('harga_satuan', 'Harga Satuan', 'required|is_natural_no_zero',
                array('required' => '%s tidak boleh kosong',
                    'is_natural_no_zero' => '%s hanya boleh berisi angka lebih besar dari 0'
                )
            );
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');	
			if ($this->form_validation->run() == FALSE){
				$this->template->load('template/template','peralatan/form_input');
			}else{
				$post = $this->input->post();	 
				$data['simpan'] = array('id'		=>$this->peralatan_model->getidperalatan(),
						 				'nama_alat'	=>$post["nama_alat"],
						                'satuan' 	=>$post["satuan"],
						                'harga_satuan' => $post["harga_satuan"]
						            );
				$hasil = $this->peralatan_model->fungsi_input_data();   
				if($hasil>0){
					redirect('peralatan/view_data');
				}else{
					$data['pesan_error'] = 'Input data tidak berhasil';
					$this->template->load('template/template','peralatan/form_input',$data);
				}
			}	
		}
		public function view_data(){
			$data['isi_data'] = $this->peralatan_model->getDataInput();
			$this->template->load('template/template','peralatan/view_data',$data);
		}
		public function edit_form($id_alat){
			if(!isset($id_alat)) redirect('peralatan/view_data');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$data_form_input = $this->peralatan_model->getDataEdit($id_alat);
			
			$this->form_validation->set_rules('nama_alat', 'Nama Peralatan', 'required|alpha_numeric_spaces|max_length[30]',
				array('required' => '%s tidak boleh kosong',
					'alpha_numeric_spaces'=>'%s hanya boleh berisi angka, huruf dan spasi',
					'max_length' => '%s tidak boleh lebih dari 30 karakter')
			);
			$this->form_validation->set_rules('harga_satuan', 'Harga Satuan', 'required|is_natural_no_zero',
                array('required' => '%s tidak boleh kosong',
                    'is_natural_no_zero' => '%s hanya boleh berisi angka lebih besar dari 0'
                )
            );
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
			if ($this->form_validation->run()) {
				$this->peralatan_model->updateFormInput($id_alat);
				redirect('peralatan/view_data'); 
			}
			$data["data_form_input"] = $data_form_input;
			if (!$data["data_form_input"]) show_404();
			$this->template->load('template/template','peralatan/form_edit',$data);
		}
	}
?>