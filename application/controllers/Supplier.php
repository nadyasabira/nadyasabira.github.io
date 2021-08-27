<?php
	class Supplier extends CI_Controller{
        public function __construct(){
            parent::__construct();  
            $this->load->model('Msupplier');
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
		public function edit_form($id){
			if(!isset($id)) redirect('supplier/view_data');
			$this->load->helper(array('form','url'));
			$this->load->library('form_validation');
			$data_form_input = $this->Msupplier->getDataEdit($id);
			$config =
				array(
					array(
						'field' => 'nama_supplier',
						'label' => 'Nama supplier',
						'rules' => 'required|alpha_numeric_spaces',
						'errors' => array(
							'required' => '%s tidak boleh kosong',
							'alpha_numeric_spaces' => '%s hanya boleh berisi angka, huruf dan spasi'
						)
					),						
                    array(
						'field' => 'no_telp',
						'label' => 'Nomor Telepon supplier',
						'rules' => 'required|is_natural|max_length[13]',
						'errors' => array(
							'required' => '%s tidak boleh kosong',
							'is_natural' => '%s hanya berisi angka 0-9.',
							'max_length' => '%s tidak boleh lebih dari 13 karakter'
						)
					),
					array(
						'field' => 'alamat',
						'label' => 'Alamat supplier',
						'rules' => 'required|alpha_numeric_spaces',
						'errors' => array(
							'required' => '%s tidak boleh kosong',
							'alpha_numeric_spaces' => '%s hanya boleh berisi angka, huruf dan spasi'	
													
						)
                    ),
					array(
						'field' => 'email',
						'label' => 'Email supplier',
						'rules' => 'required|valid_email',
						'errors' => array(
						'required' => '%s tidak boleh kosong',
						'valid_email' => 'Alamat %s harus valid'
						)
					)
				);
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>','</li></div>');
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run()) {
				$this->Msupplier->updateFormInput($id);
				redirect('supplier/view_data'); 
			}
			$data["data_form_input"] = $data_form_input;
			if (!$data["data_form_input"]) show_404();
			$this->template->load('template/template','supplier/formupdate',$data);
		}
    	public function view_data(){    
			$data['isi_data'] = $this->Msupplier->getData();		
			$this->template->load('template/template','supplier/VSupplier',$data); 
        } 
        public function input_form(){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$config =
				array(
					array(
						'field' => 'nama_supplier',
						'label' => 'Nama supplier',
						'rules' => 'required|alpha_numeric_spaces',
						'errors' => array(
							'required' => '%s tidak boleh kosong',
							'alpha_numeric_spaces' => '%s hanya boleh berisi angka, huruf dan spasi'
						)
					),						
                    array(
						'field' => 'no_telp',
						'label' => 'Nomor Telepon supplier',
						'rules' => 'required|is_natural|max_length[13]',
						'errors' => array(
							'required' => '%s tidak boleh kosong',
							'is_natural' => '%s hanya berisi angka 0-9.',
							'max_length' => '%s tidak boleh lebih dari 13 karakter'
						)
					),
					array(
						'field' => 'alamat',
						'label' => 'Alamat supplier',
						'rules' => 'required|alpha_numeric_spaces',
						'errors' => array(
							'required' => '%s tidak boleh kosong',
							'alpha_numeric_spaces' => '%s hanya boleh berisi angka, huruf dan spasi'	
						)
                    ),
					array(
						'field' => 'email',
						'label' => 'Email supplier',
						'rules' => 'required|valid_email',
						'errors' => array(
						'required' => '%s tidak boleh kosong',
						'valid_email' => 'Alamat %s harus valid'
						)
					)
				);
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>','</li></div>');
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE){
				$this->template->load('template/template','supplier/form_input');
			}else{
				$post = $this->input->post();					 
				$data['kirim'] = array('id'=> $this->Msupplier->getSupplierId(),
						 			'nama_supplier'=>$post["nama_supplier"],
					                'no_telp'=>$post["no_telp"],  
									'alamat'=>$post["alamat"],
									'email'=>$post["email"]
					          );
				$hasil = $this->Msupplier->fungsi_input_data($post["nama_supplier"], $post["no_telp"], $post["alamat"], $post["email"]);   
				if($hasil>0){
					redirect(site_url('supplier/view_data'));
				}else{
					$data['pesan_error'] = 'Input data tidak berhasil';
					$this->template->load('template/template','supplier/form_input',$data);
				}
			}	
		}
    }
?>       