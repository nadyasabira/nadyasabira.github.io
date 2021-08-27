<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Penjualan extends CI_Controller {

		 public function __construct()
        {
                parent::__construct();
				checklogin();
				// session_start();
                $this->load->model('penjualan_model');
				$this->load->model('Menu_model'); 
				$this->load->model('M_Konsumen'); 
				$this->load->model('M_Ukuran');
				$this->load->model('M_Harga'); 
				// $this->load->helper('url_helper');
				$this->load->library('pdf');
				// $this->load->helper('cek_login');
				// if(!cek_login()){
				// 	redirect(site_url('tampilan'));
				// }

				// $this->load->helper('cek_hak_akses');
				// if(!cek_hak_akses($this->uri->segment(1))){
				// 	redirect(site_url('tampilan/awal'));
				// }
				 
				
        }
        function check_stokbarang() {
				$post = $this->input->post();
				$jumlah = $this->input->post('jumlah'); //mendapatkan inputan jumlah
				$id_menu= $this->input->post('nama'); //mendapatkaninputan id_menu menu
				if ($jumlah == 0) {
					$this->form_validation->set_message('check_stokbarang','Jumlah penjualan melebihi stok menu');
					return FALSE;
				} else {
					return TRUE;
				}
		}
		public function input_form(){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
					
			$this->form_validation->set_rules('datetimepicker', 'Tanggal Penjualan', 'required',
					array('required' => 'Anda harus memasukkan %s.')
					);		
				$this->form_validation->set_rules('id_konsumen', 'Konsumen', 'required',
					array('required' => 'Anda harus memasukkan %s.')
					);	
			
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
			$data['barang'] = $this->Menu_model->getDataOrderByNama('barang'); 
			$data['konsumen'] = $this->M_Konsumen->getDataOrderByNama('konsumen'); 
			$data['faktur'] = $this->penjualan_model->getPenjualanId();
			$data['ukuran'] = $this->M_Ukuran->getDataOrderByNama('ukuran'); 
			$data['all_konsumen'] = $this->M_Konsumen->get_konsumen();
			$data['all_harga'] = $this->M_Harga->getdataharga();
			
			if ($this->form_validation->run() == FALSE)
			{
					
					$this->template->load('template/template','penjualan/form_input_data',$data);  
					
			}
			else
			{		
					$post = $this->input->post();
					$data['faktur_penjualan'] = 
					array(
						'no_faktur' => $post["no_faktur"],
						'id_konsumen' => $post['id_konsumen']
										);
					$_SESSION['no_faktur'] = $post["no_faktur"];
					$_SESSION['datetimepicker'] = $post["datetimepicker"];
					$_SESSION['id_konsumen'] = $post["id_konsumen"];
					
					
					$data['isi_data'] = $this->penjualan_model->getDataDetail($_SESSION['no_faktur']);
					// $this->load->view('template/head');
					// $this->load->view('template/sidebar');
					// $this->load->view('template/topbar'); 
					$this->template->load('template/template','penjualan/form_input_detail_jual',$data);  
					// $this->load->view('', $data);
					
					//   
			}
			
		}
		
		
		public function input_form_detail(){
				
				$this->load->helper(array('form', 'url'));
				$this->load->library('form_validation');
				$this->form_validation->set_rules('nama', 'Nama Menu', 'required',
					array('required' => 'Anda harus memasukkan %s.')
					);
				$this->form_validation->set_rules('harga', 'Harga', 'required',
					array('required' => 'Anda harus memasukkan %s.')
					);
			
			// 	$this->form_validation->set_rules('jumlah', 'Jumlah', 'required',
			// 		array('required' => 'Anda harus memasukkan %s.')
			// 		);
			// $this->form_validation->set_rules('jenis', 'Jenis', 'required',
			// 		array('required' => 'Anda harus memasukkan %s.')
			// 		);
			// 		$this->form_validation->set_rules('id_kategori', 'Ukuran', 'required',
			// 		array('required' => 'Anda harus memasukkan %s.')
			// 		);
				$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
				$data['faktur_penjualan'] = $this->penjualan_model->getDataDetail($_SESSION['no_faktur']);			
				$data['isi_data'] = $this->penjualan_model->getDataDetail($_SESSION['no_faktur']);
				$data['barang'] = $this->Menu_model->getDataOrderByNama3($_SESSION['no_faktur']);
				$data['konsumen'] = $this->M_Konsumen->getDataOrderByNama($_SESSION['no_faktur']); //untuk mengambil data menu
				$data['ukuran'] = $this->M_Ukuran->getDataOrderByNama3($_SESSION['no_faktur']); //untuk mengambil data menu
				$data['all_harga'] = $this->M_Harga->getdataharga($_SESSION['no_faktur']);
				if ($this->form_validation->run() == FALSE)
				{	
					// $this->load->view('template/topbar_penjualan');
			// 		$this->load->view('template/head');
			// $this->load->view('template/sidebar');
			// $this->load->view('template/topbar'); 
			$this->template->load('template/template','penjualan/form_input_detail_jual',$data);  
			
				
				}else{
					//simpan ke database
					$this->penjualan_model->fungsi_input_data();
					$data['isi_data'] = $this->penjualan_model->getDataDetail($_SESSION['no_faktur']);
					$data['menu'] = $this->Menu_model->getDataOrderByNama3($_SESSION['no_faktur']); //untuk mengambil data menu
					$data['konsumen'] = $this->M_Konsumen->getDataOrderByNama3($_SESSION['no_faktur']); //untuk mengambil data menu
					$data['ukuran'] = $this->M_Ukuran->getDataOrderByNama($_SESSION	['no_faktur']); 
					// $this->load->view('template/topbar_penjualan');
			// 			$this->load->view('template/head');
			// $this->load->view('template/sidebar');
			// $this->load->view('template/topbar'); 
			$this->template->load('template/template','penjualan/form_input_detail_jual',$data);  
			
				}
				
		}
		
		function getDatabarangtemp()
    {
        $id_user = $this->input->post('id_user');
        // $id_menu = $this->input->post('id_menu');
        $data['barangtemp'] = $this->Model_penjualan->getDatabarangtemp($id_user)->result();
        $this->load->view('penjualan/penjualan_detail_temp',$data);
    }
		//input form 2
		public function input_form_detail2(){
		
				$this->load->helper(array('form', 'url'));
				$this->load->library('form_validation');
			
				$this->form_validation->set_rules('nama', 'Nama Menu', 'required|callback_check_nama',
					array('required' => 'Anda harus memasukkan %s.')
					);
				$this->form_validation->set_rules('harga', 'Harga', 'required',
					array('required' => 'Anda harus memasukkan %s.')
					);
			
				$this->form_validation->set_rules('jumlah', 'Jumlah', 'required',
					array('required' => 'Anda harus memasukkan %s.')
					);
			$this->form_validation->set_rules('jenis', 'Jenis', 'required',
					array('required' => 'Anda harus memasukkan %s.')
					);
					$this->form_validation->set_rules('id_kategori', 'Ukuran', 'required',
					array('required' => 'Anda harus memasukkan %s.')
					);

				$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
				
				$data['faktur_penjualan'] = $this->penjualan_model->getDataDetail($_SESSION['no_faktur']);
				
				$data['isi_data'] = $this->penjualan_model->getDataDetail($_SESSION['no_faktur']);
				$data['barang'] = $this->Menu_model->getDataOrderByNama3($_SESSION['no_faktur']); //untuk mengambil data buah
				$data['konsumen'] = $this->M_Konsumen->getDataOrderByNama3($_SESSION['no_faktur']); //untuk mengambil data menu
				$data['ukuran'] = $this->M_Ukuran->getDataOrderByNama3($_SESSION['no_faktur']); //untuk mengambil data menu
				$data['all_harga'] = $this->M_Harga->getdataharga($_SESSION['no_faktur']);
				if ($this->form_validation->run() == FALSE)
				{
			// 		$this->load->view('template/head');
			// $this->load->view('template/sidebar');
			// $this->load->view('template/topbar'); 
					    // $this->load->view('template/topbar_tokobuah');
						$this->template->load('template/template','penjualan/form_input_detail_jual',$data);  
						
				}else{
			// 		$this->load->view('template/head');
			// $this->load->view('template/sidebar');
			// $this->load->view('template/topbar'); 
					// $this->load->view('template/topbar_tokobuah');
					$this->template->load('template/template','penjualan/form_input_detail_jual',$data);  
			
				}
			}			
		
		public function check_nama($nama_menu){
			if ($this->penjualan_model->check_nama($nama_menu)==''){
				return true;
			 }else{
				$this->form_validation->set_message('nama_menu', 'Nama '. $nama_menu .' Data sudah');
				return false;		
			 }
		}
		
		public function bayar(){
			$data['isi_data'] = $this->penjualan_model->getDataBayar($_SESSION['no_faktur']);

			$this->load->view('penjualan/bayar',$data);

		}

		public function proses_bayar(){
			
			$data = [
				'no_nota' => $this->input->post('no_nota'),
				'tglbayar' => $this->input->post('waktu'),
				'jumlah_dp' => $this->input->post('subtotal'),
				'jenistransaksi' => $this->input->post('jenistransaksi'),

			];
			$simpan = $this->penjualan_model->tambah($data);
			if($simpan == 1){
				$hasil = $this->penjualan_model->generate_jurnal_umum($_SESSION['no_faktur']);	
				$nofaktur = $_SESSION['no_faktur'];
				unset($_SESSION['no_faktur']);
				unset($_SESSION['datetimepicker']);
				unset($_SESSION['id_konsumen']);
				unset($_SESSION['subtotal']);
				redirect('penjualan/index/'.$nofaktur);
				$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
					<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
					Data Berhasil Disimpan
					</div>');
				redirect('penjualan');
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
					<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
					Data Gagal Disimpan
					</div>');
				redirect('penjualan');
			}
		}
			public function selesai(){
				//unset sesi yang digunakan untuk transaksi pembelian
			$hasil = $this->penjualan_model->generate_jurnal_umum($_SESSION['no_faktur']);	
			$nofaktur = $_SESSION['no_faktur'];
			unset($_SESSION['no_faktur']);
			unset($_SESSION['datetimepicker']);
			unset($_SESSION['id_konsumen']);
			redirect('penjualan/index/'.$nofaktur);
		}
		public function proses($no_nota,$id_konsumen)
		{
			$this->penjualan_model->proses($no_nota,$id_konsumen);
			// $this->M_Pembayaran->generate_jurnal_umum($id,$id_konsumen);
			redirect(site_url('penjualan/index'));
            // if ((!isset($no_faktur)) and (!isset($id_konsumen))) redirect('pemesanan/index');
            // $this->load->helper(array('form', 'url'));
            // $this->load->library('form_validation');		
            // $data_form_input = $this->M_Pesanan->getDataEdit($no_faktur,$id_konsumen);
            
            // $this->form_validation->set_rules('no_faktur', 'No Faktur', 'required',
            //         array('required' => 'Anda harus memasukkan %s.')
            //         );
                    
            // $this->form_validation->set_rules('id_konsumen', 'Nama Konsumen', 'required',
            //         array('required' => 'Anda harus memasukkan %s.')
            //         );		
                    
            // // $this->form_validation->set_rules('datetimepicker', 'Tanggal pemesanan', 'required',
            // //         array('required' => 'Anda harus memasukkan %s.')
            // //         );	
            
            // $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
            // $data['barang'] = $this->Menu_model->getDataOrderByNama3($no_faktur); //untuk mengambil data buah
            // $data['dataKonsumen'] = $this->M_Konsumen->getDataOrderByNama(); //untuk mengambil data supplier
            
            // if ($this->form_validation->run()) {
            //     $this->M_Pesanan->updateFormInput($no_faktur,$id_konsumen);
            //     redirect('pemesanan/index'); 
            // }
            // $data["data_form_input"] = $data_form_input;
            // if (!$data["data_form_input"]) show_404();
            // //print_r($data["data_form_input"]);
            // // $this->load->view('templates/navbar_tokobuah_pemesanan');
        	
			// 		$this->template->load('template/templet','pesanan/form_edit_data',$data);  
            
        }
		
		//fungsi untuk menghapus data
		public function delete_form($no_faktur){
			
			if ((!isset($no_faktur))) show_404();
        
			if ($this->penjualan_model->deleteFormInput($no_faktur)) {
				redirect(site_url('penjualan/index'));
			}
			
		}
		
		//fungsi untuk menghapus data ketika input data detail pembelian
		public function delete_form_detail2($id_menu_transaksi_penjualan){
			
			if($this->penjualan_model->deleteFormInputDetailPenjualan($id_menu_transaksi_penjualan)){
				redirect(site_url('penjualan/input_form_detail2'));
			}
			
		}

		//fungsi untuk menghapus data ketika input data detail pembelian
		public function delete_form_detail($id_menu_transaksi_penjualan,$id_menu_penjualan){
			
			if ($this->penjualan_model->deleteFormInputDetailPenjualan($id_menu_transaksi_penjualan)) {
				redirect(site_url('penjualan/view_data_penjualan_detail2/'.$id_menu_penjualan));
			}
			
		}
		
		public function cetak_laporan_penjualan_ke_pdf($no_faktur){
		
			$dataPenjualan = $this->penjualan_model->getDataByNoFaktur($no_faktur);
		
			foreach($dataPenjualan as $cacah_data_penjualan){
			    $no_faktur = $cacah_data_penjualan['no_nota'];
				$nama = $cacah_data_penjualan['nama'];
				$waktu = $cacah_data_penjualan['waktu'];
				$jenis = $cacah_data_penjualan['jenis'];
				// $nama_kategori = $cacah_data_penjualan['nama_kategori'];
				// $satuan = $cacah_data_penjualan['satuan'];
				$harga_jual = $cacah_data_penjualan['harga_jual'];
				$jml_beli = $cacah_data_penjualan['jml_beli'];
			}
		    
			$pdf = new FPDF('l','mm','A4');
            // membuat halaman baru
            $pdf->AddPage();
			 //tulis logo
            $lokasi = base_url('upload/logo/logo.png');
            $pdf->Image($lokasi,160,10,25);
			
            // setting jenis font yang akan digunakan
            $pdf->SetFont('Arial','',11);
            // mencetak string 
            $pdf->Cell(190,7,'Laporan Penjualan',0,1,'C');
			
            $pdf->Cell(10,7,'',0,1);
			$baris = 'No Faktur = '.$no_faktur;
			$pdf->Cell(20,6,$baris,0,1);
			
			$pdf->Cell(10,7,'',0,1);
			$baris = 'Waktu Transaksi = '.$waktu;
			$pdf->Cell(20,6,$baris,0,1);
			$pdf->Cell(10,7,'',0,1);
			
            $pdf->SetFont('Arial','B',10);
			$pdf->Cell(30,6,'Nama Produk',1,0);
			$pdf->Cell(20,6,'Size',1,0);
			
			$pdf->Cell(40,6,'Bentuk Produk',1,0);
            $pdf->Cell(25,6,'Harga',1,0);
            $pdf->Cell(20,6,'Jumlah',1,0);
			$pdf->Cell(40,6,'Total',1,0);
            $pdf->Cell(10,7,'',0,1);
            $pdf->SetFont('Arial','',8);

			$total = 0;
            foreach ($dataPenjualan as $row){
				$pdf->Cell(30,6,$row['nama'],1,0);
				// $pdf->Cell(10,6,$row['nama_kategori'],1,0);
				// $pdf->Cell(10,6,$row['satuan'],1,0);
				$pdf->Cell(40,6,$row['jenis'],1,0);
                $pdf->Cell(25,6,number_format($row['harga_jual']),1,0);
                $pdf->Cell(20,6,number_format($row['jml_beli']),1,0);
				$harga_kali_jumlah = $row['harga_jual']*$row['jml_beli'];
				$pdf->Cell(40,6,number_format($harga_kali_jumlah),1,0);
				$total = $total + $harga_kali_jumlah;
                $pdf->Cell(10,7,'',0,1);
            }
			//tambahkan total pembelian
			$pdf->Cell(135,6,'Total',1,0); //145 -> 20+85+40
            $pdf->Cell(40,6,number_format($total),1,0);
			$pdf->Cell(10,7,'',0,1);
			
            $pdf->Output();
			
		}
		
		//fungsi untuk melihat data
		public function index($rowno = 0){

			$no_nota = "";
			$nama_konsumen = "";
			$dari = "";
			$sampai = "";
			if(isset($_POST['submit'])){
				$no_nota = $this->input->post('no_nota');
				$nama_konsumen = $this->input->post('nama_konsumen');
				$dari = $this->input->post('dari');
				$sampai = $this->input->post('sampai');
				$data = array(
					'no_nota' => $no_nota,
					'nama_konsumen' => $nama_konsumen,
					'dari' => $dari,
					'sampai' => $sampai
				);
				$this->session->set_userdata($data);
			}else{
				if($this->session->userdata('no_nota') != NULL){
					$no_nota = $this->session->userdata('no_nota');
				}
				if($this->session->userdata('nama_konsumen') != NULL){
					$nama_konsumen = $this->session->userdata('nama_konsumen');
				}
				if($this->session->userdata('dari') != NULL){
					$dari = $this->session->userdata('dari');
				}
				if($this->session->userdata('sampai') != NULL){
					$sampai = $this->session->userdata('sampai');
				}
			}
			$rowperpage = 10;
			// Row position
			if ($rowno != 0) {
				$rowno = ($rowno - 1) * $rowperpage;
			}
			$jumlahdata     = $this->penjualan_model->getDatapenjualanCount($no_nota,$nama_konsumen,$dari,$sampai)->num_rows();
				// Get records
			$datapenjualan = $this->penjualan_model->getData2($rowno, $rowperpage,$no_nota,$nama_konsumen,$dari,$sampai)->result();
		$config['base_url']         = base_url() . 'penjualan/index';
		$config['use_page_numbers'] = TRUE;
		$config['total_rows']       = $jumlahdata;
		$config['per_page']         = $rowperpage;
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		// Initialize
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['penjualan'] = $datapenjualan;
		$data['row'] = $rowno;
		$data['no_nota'] = $no_nota;
		$data['nama_konsumen'] = $nama_konsumen;
		$data['dari'] = $dari;
		$data['sampai'] = $sampai;

			// $data['isi_data'] = $this->penjualan_model->getData2()->result();
			//   $this->load->view('template/topbar_tokobuah');
		
			// $this->load->view('template/head');
			// $this->load->view('template/sidebar');
			// $this->load->view('template/topbar'); 
			$this->template->load('template/template','penjualan/view_data',$data);  
			// $this->load->view('',$data);
		}
		
		//fungsi untuk melihat data
		public function view_data_penjualan_detail2($no_faktur){
			$data['isi_data'] = $this->penjualan_model->getDataDetail($no_faktur);
			// $this->load->view('template/head');
			// $this->load->view('template/sidebar');
			// $this->load->view('template/topbar'); 
			// $this->load->view('template/topbar_penjualan');
			$this->template->load('template/template','penjualan/view_detail_penjualan',$data);  
			
			// $this->load->view('penjualan/view_detail_penjualan',$data);
		}
		
		
}
?>