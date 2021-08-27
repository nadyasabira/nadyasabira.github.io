<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    class kartu_stok extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model("bahanbaku_model");
            $this->load->model("kartu_stok_model");
            $this->load->helper("format_bulan");
        }
        public function kartu_stok(){
            $tanggal = '';
            $id_bb = '';
            $data['nama_bb'] = $this->bahanbaku_model->getDataBB($id_bb);
            $data['date'] = '';
            $data["nama_bb1"] = $this->bahanbaku_model->getNamaBB1();
            $data['kartu_stok'] = $this->kartu_stok_model->getKartuStok($tanggal,$id_bb);
            $this->template->load('template/template','laporan/kartu_stock',$data);
        }
        public function view_kartu_stok(){
            $tanggal = $this->input->get('tanggal', TRUE);
            $id_bb = $this->input->get('id_bb');
            $waktu = strtotime($tanggal);
            $bulan = date("F", $waktu);
            $tahun = date("Y", $waktu);
            $data['bulan'] = $bulan;
            $data['tahun'] = $tahun;
            $data['nama_bb'] = $this->bahanbaku_model->getDataBB($id_bb);
            $this->session->set_userdata('tanggal', $tanggal);
            $this->session->set_userdata('id_bb', $id_bb);
            $data["nama_bb1"] = $this->bahanbaku_model->getNamaBB1();
            $data['kartu_stok'] = $this->kartu_stok_model->getKartuStok($tanggal,$id_bb);
            $data['nama_bb'] = $this->kartu_stok_model->getBB($id_bb);
            $data['satuan_bom'] = $this->kartu_stok_model->getSatuan($id_bb);
            $this->template->load('template/template','laporan/kartu_stock1',$data);
        }
    }