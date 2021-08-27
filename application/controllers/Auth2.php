<?php

    class Auth2 extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('auth_model');
        }
        function login()
        {
            checklog();
            $this->load->view('form_login');
        }

        function ceklogin()
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $login = $this->auth_model->getlogin($username,$password);
            $ceklogin = $login->num_rows();
            $datalogin = $login->row_array();
            $data = array(
                'id_user' => $datalogin['id_user'],
                'nama_lengkap' => $datalogin['nama_lengkap'],
                'username' => $datalogin['username'],
                'password' => $datalogin['password'],
                'level' => $datalogin['level']
            );
            $this->session->set_userdata($data);
            if ($ceklogin == 1) {
            redirect('Halutama');
            }else {
                $this->session->set_flashdata('msg', ' <div class="alert alert-warning" role="alert">
                Username / Password Salah!
                </div>
                ');
                redirect('auth2/login');
            }
        }

        function logout()
        {
            session_destroy();
            redirect('auth2/login');
        }

    }
?>