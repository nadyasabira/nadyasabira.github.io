<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		checklogin();
		// if ($this->session->userdata('status') !== 'login' ) {
		// 	redirect('/');
		$this->load->model('transaksi_model');
		$this->load->model('Beban_model');
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
		
	

	public function index()
	{

		$data['isi_data'] = $this->transaksi_model->getdatatransaksi();
		$this->template->load('template/template','transaksi/view_beban',$data);  
		// $this->load->view('transaksi');
	}

	function inputpenjualan(){
		$this->template->load('template/template','transaksi/input_penjualan');  
	}

	function getJatuhtempo(){
		$tgltransaksi     = $this->input->post('tgltransaksi');
		$jatuhtempo       = date('Y-m-d', strtotime("+1 month", strtotime(date($tgltransaksi))));
		echo $jatuhtempo;
	}

	public function input_beban(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('datetimepicker', 'Tanggal Transaksi', 'required',
		array('required' => 'Anda harus memasukkan %s.')
		);			
		$this->form_validation->set_rules('kode_akun', 'Nama Beban', 'required',
				array('required' => 'Anda harus memasukkan %s.')
				);		
			$this->form_validation->set_rules('total', 'Total', 'required',
				array('required' => 'Anda harus memasukkan %s.')
				);	
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
		$data['all_beban'] = $this->Beban_model->get_beban(); 
		$data['id_trans_beban'] = $this->transaksi_model->gettransaksiId();
		$data['isi_data'] = $this->transaksi_model->getDataDetail();
		if ($this->form_validation->run() == FALSE)
		{
				
				$this->template->load('template/template','transaksi/input_beban',$data);  
				
		}
		else
		{
			
			$this->transaksi_model->fungsi_input_data2();
			$data['isi_data'] = $this->transaksi_model->getdatatransaksi();
			$data['all_beban'] = $this->Beban_model->get_beban(); 

			
			$getnamabeban =$this->db->select('transaksi_beban.*,beban.nama_beban')
			->join('beban', 'beban.kode_akun = transaksi_beban.kode_akun')
			->where('transaksi_beban.kode_akun',$this->input->post('kode_akun'))
			->get('transaksi_beban')->row_array();

			$data1 = [
				'transaksi' => $getnamabeban['nama_beban'],       
				'kode_akun' => $getnamabeban['kode_akun'],
				'posisi' => "d", 
				'kelompok' => "1"     
			];
			$this->db->insert('transaksi_akun', $data1);
			$data2 = [
				'transaksi' => $getnamabeban['nama_beban'],       
				'kode_akun' => "111",
				'posisi' => "c", 
				'kelompok' => "1"     
			];
			$this->db->insert('transaksi_akun', $data2);

			$dataJurnal1 = [		
				  
				// 'id_transasksi' => $this->input->post('id_transaksi'),
				'kode_akun' => $getnamabeban['kode_akun'],
				'tgl_jurnal' => $this->input->post('datetimepicker'),				
				'posisi_d_c' => 'd',
				'nominal' => $this->input->post('total'),
				'kelompok' =>'1',
				'transaksi' => $getnamabeban['nama_beban'],
			];
			$this->db->insert('jurnal_umum', $dataJurnal1);
			$dataJurnal2 = [
				// 'id_transaksi' => $this->input->post('id_transaksi'),
				'kode_akun' => '111',
				'tgl_jurnal' => $this->input->post('datetimepicker'),				
				'posisi_d_c' => 'k',
				'nominal' => $this->input->post('total'),
				'kelompok' =>'1',
				'transaksi' => $getnamabeban['nama_beban'],
			];
			$this->db->insert('jurnal_umum', $dataJurnal2);
			// $hasil = $this->transaksi_model->generate_jurnal_umum();
			// $id_trans_beban = $_SESSION['id_trans_beban'];

			$this->template->load('template/template','transaksi/view_beban',$data);  
		}
}

public function selesai(){
	//unset sesi yang digunakan untuk transaksi pembelian
$hasil = $this->transaksi_model->generate_jurnal_umum();	
$id_trans_beban = $_SESSION['id_trans_beban'];
unset($_SESSION['idtransaksi']);
unset($_SESSION['datetimepicker']);
unset($_SESSION['kode_akun']);
redirect('transaksi/index/'.$id_trans_beban);
}

}