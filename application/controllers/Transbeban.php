<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Transbeban extends CI_Controller {

		 public function __construct()
        {
                parent::__construct();
				checklogin();
				// session_start();
                $this->load->model('Model_Trans');
				$this->load->model('beban_model'); 
				$this->load->helper('url_helper');
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
        // function check_stokbarang() {
		// 		$post = $this->input->post();
		// 		$jumlah = $this->input->post('jumlah'); //mendapatkan inputan jumlah
		// 		$id_menu= $this->input->post('nama'); //mendapatkaninputan id_menu menu
		// 		if ($jumlah == 0) {
		// 			$this->form_validation->set_message('check_stokbarang','Jumlah penjualan melebihi stok menu');
		// 			return FALSE;
		// 		} else {
		// 			return TRUE;
		// 		}
		}
		public function input_form(){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('datetimepicker', 'Tanggal Transaksi', 'required',
			array('required' => 'Anda harus memasukkan %s.')
			);			
			$this->form_validation->set_rules('id_beban', 'Nama Beban', 'required',
					array('required' => 'Anda harus memasukkan %s.')
					);		
				$this->form_validation->set_rules('total', 'Total', 'required',
					array('required' => 'Anda harus memasukkan %s.')
					);	
			
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
		$data['all_beban'] = $this->Beban_model->get_beban(); 
		$data['id_transaksi'] = $this->transaksi_model->gettransaksiId();
		$data['isi_data'] = $this->transaksi_model->getdatatransaksi();
			
		if ($this->form_validation->run() == FALSE)
		{
				
				$this->template->load('template/templet','transaksi/input_beban',$data);  
				
		}
			else
			{		
					$post = $this->input->post();
					$data['faktur_beban'] = 
					array(
						'transaksi_beban' => $post["transaksi_beban"],
						'datetimepicker' =>$post["datetimepicker"],
						'id_beban' =>$post["id_beban"],
						'total'=>$post["total"]  
										);
					$_SESSION['transaksi_beban'] = $post["transaksi_beban"];
					$_SESSION['datetimepicker'] = $post["datetimepicker"];
					$_SESSION['id_beban'] = $post["id_beban"];
					
					// $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
					// $data['faktur_beban'] = $this->penjualan_model->getDataDetail($_SESSION['transaksi_beban']);	
					// $data['isi_data'] = $this->penjualan_model->getDataDetail($_SESSION['transaksi_beban']);
					// $data['all_beban'] = $this->Beban_model->get_beban($_SESSION['transaksi_beban']); 
					// $data['id_transaksi'] = $this->transaksi_model->gettransaksiId($_SESSION['transaksi_beban']);// $this->load->view('template/head');
					// // $this->load->view('template/sidebar');
					// $this->load->view('template/topbar'); 
					$this->template->load('template/templet','penjualan/input_beban',$data);  
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
				$data['all_beban'] = $this->Beban_model->get_beban(); 
				$data['id_transaksi'] = $this->transaksi_model->gettransaksiId();
				// $data['barang'] = $this->Menu_model->getDataOrderByNama3($_SESSION['no_faktur']);
				// $data['konsumen'] = $this->M_Konsumen->getDataOrderByNama($_SESSION['no_faktur']); //untuk mengambil data menu
				// $data['ukuran'] = $this->M_Ukuran->getDataOrderByNama3($_SESSION['no_faktur']); //untuk mengambil data menu
				if ($this->form_validation->run() == FALSE)
				{	
					// $this->load->view('template/topbar_penjualan');
			// 		$this->load->view('template/head');
			// $this->load->view('template/sidebar');
			// $this->load->view('template/topbar'); 
			$this->template->load('template/templet','transaksi/input_beban',$data);   
			
				
				}else{
					//simpan ke database
					$this->penjualan_model->fungsi_input_data();
					$data['isi_data'] = $this->penjualan_model->getDataDetail($_SESSION['no_faktur']);
					$data['menu'] = $this->Menu_model->getDataOrderByNama3($_SESSION['no_faktur']); //untuk mengambil data menu
					$data['konsumen'] = $this->M_Konsumen->getDataOrderByNama3($_SESSION['no_faktur']); //untuk mengambil data menu
					$data['ukuran'] = $this->M_Ukuran->getDataOrderByNama($_SESSION['no_faktur']); 
					// $this->load->view('template/topbar_penjualan');
			// 			$this->load->view('template/head');
			// $this->load->view('template/sidebar');
			// $this->load->view('template/topbar'); 
			$this->template->load('template/templet','penjualan/form_input_detail_jual',$data);  
			
				}
				
		}
		
		//input form 2
		public function input_form_detail2(){
		
				$this->load->helper(array('form', 'url'));
				$this->load->library('form_validation');
			
				$this->form_validation->set_rules('nama', 'Nama Menu', 'required',
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
				if ($this->form_validation->run() == FALSE)
				{
			// 		$this->load->view('template/head');
			// $this->load->view('template/sidebar');
			// $this->load->view('template/topbar'); 
					    // $this->load->view('template/topbar_tokobuah');
						$this->template->load('template/templet','penjualan/form_input_detail_jual',$data);  
						
				}else{
			// 		$this->load->view('template/head');
			// $this->load->view('template/sidebar');
			// $this->load->view('template/topbar'); 
					// $this->load->view('template/topbar_tokobuah');
					$this->template->load('template/templet','penjualan/form_input_detail_jual',$data);  
			
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
				$nama_kategori = $cacah_data_penjualan['nama_kategori'];
				$satuan = $cacah_data_penjualan['satuan'];
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
				$pdf->Cell(10,6,$row['nama_kategori'],1,0);
				$pdf->Cell(10,6,$row['satuan'],1,0);
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
		public function index(){
			$data['isi_data'] = $this->penjualan_model->getData();
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
			$this->template->load('template/templet','penjualan/view_detail_penjualan',$data);  
			
			// $this->load->view('penjualan/view_detail_penjualan',$data);
		}
		
		
}
?>