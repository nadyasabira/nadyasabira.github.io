    <?php

        class Tampilan extends CI_Controller
        {
            public function __construct()
            {
                parent::__construct();
                $this->load->model('akun_model');
                $this->load->helper('url_helper');
                $this->load->library('session'); //untuk menggunakan sessi
                // $this->load->helper('cek_login');
            }    
            
            public function index()
                {
                    // $this->load->view('template/head');   
                    // $this->load->view('template/sidebar');
                    // $this->load->view('template/topbar');
                    // // $this->load->view('template/heading');
                    $this->load->view('login_view');
                    // $this->load->view('template/footer');
                    
                }
                public function awal(){
                    if(!cek_login()){
                        redirect(site_url('tampilan'));
                    }
                    $this->template->load('template/template','dashboard/dashboard');
                }

                public function validasi(){

                    $post = $this->input->post();
                    $username = $this->input->post('username'); 
                    $password = $this->input->post('password'); 
            
                    $hasil = $this->akun_model->validasi_login($username, $password); 
                    if($hasil>0){
                        //username dan password benar, maka set sesi user dan kelompok user
                        $kelompok = $this->akun_model->getKelompok($username, $password);
                        $this->session->kelompok = $kelompok; //masukkan ke sesi dengan nama =  kelompok
                        $this->session->nama = $username;  //masukkan ke sesi dengan nama =  nama
                        $this->template->load('template/template','dashboard/dashboard');
            
                    }else{
                        //username dan password salah maka di redirect ke halaman awal
                        $this->session->set_flashdata('message_name', '- Pasangan username dan password tidak tepat <br> - Username tidak ada di database');
                        $this->session->keep_flashdata('message_name');
                        redirect('tampilan');
                    }
            
                }
                public function logout()
	{
                //untuk mendestroy seluruh variabel sesi yang diciptakan
                $this->session->sess_destroy();
                redirect('tampilan');
	}

        }