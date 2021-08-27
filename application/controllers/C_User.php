<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    class C_User extends CI_Controller {

            public function __construct()
            {
                    parent::__construct();
                    checklogin();
                    $this->load->model('akun_model');
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
            
            //untuk input
            public function input_form(){
                $this->load->helper(array('form', 'url'));
                $this->load->library('form_validation');
                
               
                $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|min_length[5]|max_length[30]',
                        array('required' => 'Anda harus memasukkan %s.',
                            'min_length'     => 'Minimal panjang 5 karakter.',
                            'max_length'     => 'Maksimal panjang 30 karakter.'
                            )
                        );
                 $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required|min_length[10]|max_length[12]|alpha_numeric_spaces',
                        array('required' => 'Anda harus memasukkan %s.',
                            'min_length'     => 'Minimal panjang 10 karakter.',
                            'max_length'     => 'Maksimal panjang 12 karakter.',
                            'alpha_numeric_spaces'=>'%s hanya boleh berisi angka, huruf A-Z dan spasi'
                            )
                        );
                 $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|max_length[20]|is_unique[users.username]',
                        array('required' => 'Anda harus memasukkan %s.',
                            'min_length'     => 'Minimal panjang 5 karakter.',
                            'max_length'     => 'Maksimal panjang 20 karakter.',
                            'is_unique'     => '%s sudah ada, silahkan menggunakan Id User yang lain.'
                            )
                        );

                $this->form_validation->set_rules('password', 'Password', 'required',
                    array('required' => 'Anda harus memasukkan %s.')
                );

                $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password]',
                    array(	'required' => 'Anda harus memasukkan %s.',
                            'matches'     => 'Isi %s harus sama isinya dengan Password'	
                        )
                );

                $this->form_validation->set_rules('level', 'Kelompok', 'required',
                array('required' => 'Anda harus memilih %s.')
                );
                
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
                // $data['user'] = $this->akun_model->getUserid();
                if ($this->form_validation->run() == FALSE)
                {
                        $this->template->load('template/template','akun1/form_input_data');
                        
                }
                else
                {			
                        		 
                    $post = $this->input->post();					 
                    $data['kirim'] = array('id_user'=> $this->akun_model->getUserid(),
                                    'nama_lengkap'=>$post["nama_lengkap"],
                                    'no_hp'=>$post["no_hp"],
                                    'username'=>$post["username"],
                                    'password'=>$post["password"],
                                    'level'=>$post["level"]
                     );
                    
                   $hasil = $this->akun_model->fungsi_input_data($post["nama_lengkap"], $post["no_hp"], $post["username"], $post["password"], $post["level"]);   
                   if($hasil>0){
                    redirect('C_User/view_data'); 
                }else{
                    $data['pesan_error'] = 'Input data tidak berhasil';
                 $this->template->load('template/template','akun1/form_input_data',$data);
                    // $this->load->view('akun1/form_input_data', $data);
                }
                
            }
        }

            //fungsi untuk edit data
            public function edit_form($id){
                if(!isset($id)) redirect('C_User/view_data');
                $this->load->helper(array('form', 'url'));
                $this->load->library('form_validation');
                $data_form_input = $this->akun_model->getDataEdit($id);

                $config =
					   	 array(
								// array(
								// 	'field' => 'id_user',
								// 	'label' => 'Id User',
								// 	'rules' => 'required|min_length[5]|max_length[20]|is_unique[user.id_user]',
								// 	'errors' => array(
								// 		'required' => 'Anda harus memasukkan %s.',
                                //         'min_length'     => 'Minimal panjang 5 karakter.',
                                //         'max_length'     => 'Maksimal panjang 20 karakter.',
                                //         'is_unique'     => '%s sudah ada, silahkan menggunakan Id User yang lain.'                            
								// 	)
								// ),
								array(
									'field' => 'password',
									'label' => 'Password',
									'rules' => 'required',
									'errors' => array(
										'required' => '%s Harus Diisi!'
									)
								),
								array(
									'field' => 'konfirmasi_password',
									'label' => 'Konfirmasi Password',
									'rules' => 'required|matches[password]',
									'errors' => array(
										'required' => 'Anda harus memasukkan %s.',
                                         'matches'     => 'Isi %s harus sama isinya dengan Password'							
									)
								),
								array(
									'field' => 'kelompok',
									'label' => 'Kelompok',
									'rules' => 'required',
									'errors' => array(
										'required' => 'Anda harus memasukkan %s.'
									)
								)
							 );

                // $this->form_validation->set_rules('id_user', 'Id User', 'required|min_length[5]|max_length[20]|is_unique[user.id_user]',
                //         array('required' => 'Anda harus memasukkan %s.',
                //             'min_length'     => 'Minimal panjang 5 karakter.',
                //             'max_length'     => 'Maksimal panjang 20 karakter.',
                //             'is_unique'     => '%s sudah ada, silahkan menggunakan Id User yang lain.'
                //             )
                //         );

                // $this->form_validation->set_rules('password', 'Password', 'required',
                //     array('required' => 'Anda harus memasukkan %s.')
                // );

                // $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password]',
                //     array(	'required' => 'Anda harus memasukkan %s.',
                //             'matches'     => 'Isi %s harus sama isinya dengan Password'	
                //         )
                // );

                // $this->form_validation->set_rules('kelompok', 'Kelompok', 'required',
                // array('required' => 'Anda harus memilih %s.')
                // );
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
                $this->form_validation->set_rules($config);             

                if ($this->form_validation->run()) {
                    $this->akun_model->updateFormInput($id);
                    redirect('C_User/view_data'); 
                }
                $data["data_form_input"] = $data_form_input;
                if (!$data["data_form_input"]) show_404();
                
                $this->template->load('template/template','akun1/form_edit_data',$data);
                   
            }

            //fungsi untuk melihat data
            public function view_data(){
                $data['isi_data'] = $this->akun_model->getData();
                $this->template->load('template/template','akun1/view_data',$data);
                // $this->load->view('akun1/view_data',$data);
            }

            //fungsi untuk menghapus data
            public function delete_form($id){
                if (!isset($id)) show_404();
            
                if ($this->akun_model->deleteFormInput($id)) {
                    redirect(site_url('c_user/view_data'));
                }
            }
    }
    ?>