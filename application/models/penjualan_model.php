		<?php
		class Penjualan_model extends CI_Model {

				//deklarasi atribut dan access method-nya
				private $_table = "penjualan";
				private $_table_detail = "detail_penjualan";
				private $_table_detail_pembelian = "detail_pembelian";
				private $_bayar = "histori_bayar";
				private $_pesan = "pesanan";


				// public function __construct()
				// {
				//         $this->load->database();
				// 		$this->load->helper(array('form', 'url')); 
				// 		$this->load->library('form_validation');
				// }
				
				
				//untuk memberi nilai harga_jual jual berdasarkan id menu dengan metode AVERAGE
				// public function getharga_jualHPP_Average($id, $jmljual){
				// 	$sql = "
				// 			SELECT HPP_AVERAGE 
				// 			FROM menu 
				// 			WHERE id = ".$this->db->escape($id)."
				// 	";
					
				// 	$query = $this->db->query($sql);
				// 	$hasil = $query->result_array();
				// 	foreach($hasil as $cacah):
				// 		$HPP = $cacah['HPP_AVERAGE'];
				// 	endforeach;
					
				// 	return $HPP;
				// }
				
				//untuk memberi nilai harga_jual jual berdasarkan id menu dengan metoda LIFO

				public function generate_jurnal_umum($no_faktur){
					
					//dapatkan total harga_jual pembelian
					$sql = "SELECT a.id_transaksi,DATE_FORMAT(a.waktu,'%Y-%m-%d') as tanggal,";
					$sql = $sql." sum(b.hpp*b.jml_beli) as total_hpp_penjualan, ";
					$sql = $sql." sum(b.harga_jual*b.jml_beli) as total_hargajual_penjualan, ";
					$sql = $sql." sum(b.harga_jual*b.jml_beli)*0.5 as total_dp ";
					$sql = $sql." FROM ".$this->_table." a ";
					$sql = $sql." JOIN ".$this->_table_detail." b ";
					$sql = $sql." ON (a.no_nota=b.no_nota) ";
					$sql = $sql." WHERE a.no_nota = ".$this->db->escape($no_faktur);
					$sql = $sql." group by a.id_transaksi,DATE_FORMAT(a.waktu,'%d-%m-%Y');";
					
					$query = $this->db->query($sql);
					$hasil = $query->result_array();
					
					foreach($hasil as $cacah):
						$total_hpp = $cacah['total_hpp_penjualan'];
						$total_harga_jual = $cacah['total_hargajual_penjualan'];
						$total_dp = $cacah['total_dp'];
						$tanggal = $cacah['tanggal'];
						$idtransaksi = $cacah['id_transaksi'];
						$angka = '1';

					endforeach;
					
					//dapatkan kode akun yang terkait dengan transaksi pembelian untuk jurnal
					$sql2 = "SELECT * FROM view_coa WHERE transaksi = 'dp' ORDER BY kelompok ASC, posisi DESC" ;
					
					$query2 = $this->db->query($sql2);
					$hasil2 = $query2->result_array();
					
					foreach($hasil2 as $cacah):
						if(($cacah['kelompok']+0)==1){
							$total = $total_dp;
						}else{
							$total = $total_dp+$total_dp;
						}
						//masukkan ke tabel jurnal
						$sql2 = "INSERT INTO jurnal_umum ";
						$sql2 = $sql2." SET id_transaksi = ".$idtransaksi.", ";
						$sql2 = $sql2." kode_akun = ".$cacah['kode_akun'].", ";
						$sql2 = $sql2." tgl_jurnal = '".$tanggal."', ";
						$sql2 = $sql2." posisi_d_c = '".$cacah['posisi']."', ";
						$sql2 = $sql2." nominal = ".$total." , ";
						$sql2 = $sql2." kelompok = ".$cacah['kelompok']." , ";
						$sql2 = $sql2." transaksi = '".$cacah['transaksi']."', ";
						$sql2 = $sql2." is_created = ".$angka."  ";
						$query2 = $this->db->query($sql2);
					endforeach;
					
				}
				public function generate_jurnal_umum1($no_faktur){
					
					//dapatkan total harga_jual pembelian
					$sql = "SELECT a.id_transaksi,DATE_FORMAT(a.waktu,'%Y-%m-%d') as tanggal,";
					$sql = $sql." sum(b.hpp*b.jml_beli) as total_hpp_penjualan, ";
					$sql = $sql." sum(b.harga_jual*b.jml_beli) as total_hargajual_penjualan, ";
					$sql = $sql." sum(b.harga_jual*b.jml_beli)*0.5 as total_dp ";
					$sql = $sql." FROM ".$this->_table." a ";
					$sql = $sql." JOIN ".$this->_table_detail." b ";
					$sql = $sql." ON (a.no_nota=b.no_nota) ";
					$sql = $sql." WHERE a.no_nota = ".$this->db->escape($no_faktur);
					$sql = $sql." group by a.id_transaksi,DATE_FORMAT(a.waktu,'%d-%m-%Y');";
					
					$query = $this->db->query($sql);
					$hasil = $query->result_array();
					
					$subtotal=0;
					foreach($hasil as $cacah):
						$total_hpp = $cacah['total_hpp_penjualan'];
						$total_harga_jual = $cacah['total_hargajual_penjualan'];
						$total_dp = $cacah['total_dp'];
						$tanggal = $cacah['tanggal'];
						$idtransaksi =$cacah['id_transaksi'];
						
						$angka = '1';
					endforeach;
					
					//dapatkan kode akun yang terkait dengan transaksi pembelian untuk jurnal
					$sql2 = "SELECT * FROM view_coa WHERE transaksi = 'tunai' ORDER BY kelompok ASC, posisi DESC" ;
					
					$query2 = $this->db->query($sql2);
					$hasil2 = $query2->result_array();
					
					foreach($hasil2 as $cacah):
						if(($cacah['kelompok']+0)==1){
							$total = $total_harga_jual;
						}else{
							$total = $total_harga_jual;
						}
						//masukkan ke tabel jurnal
						$sql2 = "INSERT INTO jurnal_umum ";
						$sql2 = $sql2." SET id_transaksi = ".$idtransaksi.", ";
						$sql2 = $sql2." kode_akun = ".$cacah['kode_akun'].", ";
						$sql2 = $sql2." tgl_jurnal = '".$tanggal."', ";
						$sql2 = $sql2." posisi_d_c = '".$cacah['posisi']."', ";
						$sql2 = $sql2." nominal = ".$total." , ";
						$sql2 = $sql2." kelompok = ".$cacah['kelompok']." , ";
						$sql2 = $sql2." transaksi = '".$cacah['transaksi']."', ";
						$sql2 = $sql2." is_created = ".$angka."  ";
						$query2 = $this->db->query($sql2);
					endforeach;
					
				}
				
				//untuk mendapatkan nomor faktur otomatis
				public function getPenjualanId(){
					$sql = "SELECT (substring(IFNULL(MAX(no_nota),0),5)+0) as hsl FROM ".$this->_table;
					$query = $this->db->query($sql);
					$hasil = $query->result_array();
					foreach($hasil as $cacah):
						$jml_data = $cacah['hsl'];
					endforeach;
					$id = 'FAK-';
					$nomor = str_pad(($jml_data+1),6,"0",STR_PAD_LEFT); //FAK-000001
					$id = $id.$nomor;
					return $id;
				}

				public function getDataPenjualanhariini()
					{
						$hariini = date("Y-m-d");
						return $this->db->get_where('penjualan', array('waktu' => $hariini));
					}

				public function getBayarHariIni()
				{
					$hariini = date("Y-m-d");
					$this->db->select("SUM(");
				}
				public function getTahun(){
					$sql = "
					   SELECT tahun FROM
					   (
						  SELECT year(waktu) as tahun 
						  FROM penjualan
					   ) x
					   ORDER BY 1 ASC          
					";
					$query = $this->db->query($sql);
					return $query->result_array();
				 }	
				 public function getPenjualan($bulan,$tahun){
					$bulan = str_pad($bulan,2,"0",STR_PAD_LEFT);
					$tahun = $tahun;
					$this->db->select("nama_menu,sum(jml_beli) as total");
					$this->db->from('detail_penjualan');
					$this->db->join('penjualan','detail_penjualan.no_nota=penjualan.no_nota');
					// $this->db->join('bahan_baku','detail_pembelian.id_bb=bahan_baku.id_bb');
					$this->db->where('MONTH(penjualan.waktu)',$bulan);
					$this->db->where('YEAR(penjualan.waktu)',$tahun);
					$this->db->group_by('nama_menu');
					return $this->db->get()->result();
				 }		
				//  function getPenjualan1(){
				// 	$bulan = str_pad($bulan,2,"0",STR_PAD_LEFT);
				// 	$tahun = $tahun;
				// 	$sql =""
				//   }

				 public function getPenjualanPerbulan1()
				 {
					 $tahun = date("Y");
					 $query = "SELECT id,nama_bulan,totalpenjualan FROM bulan
					 LEFT JOIN (
					 SELECT
						 MONTH(detail_penjualan.waktu) as bulan, SUM(harga_jual*jml_beli) as totalpenjualan
						 FROM detail_penjualan
						 INNER JOIN penjualan ON detail_penjualan.no_nota = penjualan.no_nota
						 WHERE YEAR(penjualan.waktu) = '$tahun'
						 GROUP BY MONTH(penjualan.waktu)
						 ) pnj ON (bulan.id = pnj.bulan)";
 
						 return $this->db->query($query);
				 }
				 public function getPenjualanPerbulan2($tahun)
				 {
					 $tahun = date("Y");
					$sql = "
					SELECT id,nama_bulan,totalpenjualan FROM bulan
					LEFT JOIN (
					SELECT
						MONTH(detail_penjualan.waktu) as bulan, SUM(harga_jual*jml_beli) as totalpenjualan
						FROM detail_penjualan
						INNER JOIN penjualan ON detail_penjualan.no_nota = penjualan.no_nota
						WHERE YEAR(penjualan.waktu) = '$tahun'
						GROUP BY MONTH(penjualan.waktu)
						) pnj ON (bulan.id = pnj.bulan)
						";
						$query = $this->db->query($sql);
						return $query->result_array();			
					
				 }


				public function getPenjualanPerbulan($tahun)
				{
					$tahun = date("Y");
					$query = "SELECT id,nama_bulan,totalpenjualan FROM bulan
					LEFT JOIN (
					SELECT
						MONTH(penjualan.waktu) as bulan, SUM(harga_jual*jml_beli) as totalpenjualan
						FROM detail_penjualan
						INNER JOIN penjualan ON detail_penjualan.no_nota = penjualan.no_nota
						WHERE YEAR(penjualan.waktu) = '$tahun'
						GROUP BY MONTH(penjualan.waktu)
						) pnj ON (bulan.id = pnj.bulan)";

						return $this->db->query($query);
				}

				function check_nama($nama_menu){
					$this->db->select('detail_penjualan');
					$this->db->where('nama_menu',$nama_menu);		
					$query =$this->db->get('data');
					$row = $query->row();
					if ($query->num_rows > 0){
						return $row->nama; 
					}else{
						return "";
				}
				}
				public function tambah($data){
				$simpan = $this->db->insert($this->_bayar, $data);
				if ($simpan){
					return 1;
				}else{
					return 0;
				}
			}
			public function tambah1($data){
				$simpan = $this->db->insert($this->_pesan, $data);
				if ($simpan){
					return 1;
				}else{
					return 0;
				}
			}
			public function getbayarid(){
				$sql = "SELECT (substring(IFNULL(MAX(id_bayar),0),4)+0) as hsl FROM ".$this->_bayar;
				$query = $this->db->query($sql);
				$hasil = $query->result_array();
				foreach($hasil as $cacah):
					$jml_data = $cacah['hsl'];
				endforeach;
				$id = 'BYR-';
				$nomor = str_pad(($jml_data+1),3,"0",STR_PAD_LEFT); //ID-001
				$id = $id.$nomor;
				return $id;
			}
				
				//untuk mendapatkan data penjualan menu detail
				public function getDataDetail($no_faktur){
					$sql = "SELECT a.*,b.nama FROM ".$this->_table_detail." a ";
					$sql = $sql." JOIN menu b ON (a.id_menu=b.id_menu) ";
					$sql = $sql." WHERE a.no_nota =".$this->db->escape($no_faktur);
					$query = $this->db->query($sql);
					
					return $query->result_array();
				}

				//untuk mendapatkan data penjualan menu detail
				public function getDataBayar($no_faktur){
					$sql = "SELECT a.*,b.nama_konsumen,c.subtotal,c.hpp,c.id_menu,c.nama_menu,c.jml_beli FROM ".$this->_table." a ";
					$sql = $sql." JOIN konsumen b ON (a.id_konsumen=b.id_konsumen) ";
					$sql = $sql." JOIN detail_penjualan c ON (a.no_nota=c.no_nota) ";
					$sql = $sql." WHERE a.no_nota =".$this->db->escape($no_faktur);
					$query = $this->db->query($sql);
					
					return $query->result_array();
				}

				public function getDataBayar1(){
					$sql = "SELECT a.*,b.nama_konsumen,c.subtotal,c.hpp,c.id_menu,c.nama_menu,c.jml_beli FROM ".$this->_table." a ";
					$sql = $sql." JOIN konsumen b ON (a.id_konsumen=b.id_konsumen) ";
					$sql = $sql." JOIN detail_penjualan c ON (a.no_nota=c.no_nota) ";
					$sql = $sql." WHERE a.no_nota =a.no_nota";
					$query = $this->db->query($sql);
					
					return $query->result_array();
				}

				public function get_detail_penjualan()
				{
					$query=$this->db->get('detail_penjualan');
					return $query->result_array();
				}
				
				//fungsi input data penjualan
				public function fungsi_input_data(){
					$post = $this->input->post();
					
					$data['faktur_penjualan'] = array('no_faktur' => $post["no_faktur"],
											'datetimepicker' => $post["datetimepicker"],
											//    'id_kategori' => $post["id_kategori"],
											'id_konsumen' => $post["id_konsumen"],
											'nama' => $post["nama"],
											'jumlah' => $post["jumlah"],
											'jenis' => $post["jenis"],
											// 'status' => 'Belum Lunas'
											);
					
					//cek dulu apakah sudah ada
					$sql = "SELECT COUNT(*) as jml FROM penjualan WHERE no_nota = ".$this->db->escape($post["no_faktur"]);
					$query = $this->db->query($sql);
					$hasil = $query->result_array();
					foreach($hasil as $cacah):
						$jml_data = $cacah['jml'];
					endforeach;
					//jumlah data 0 berarti belum ada datanya, maka dimasukkan ke tabel
					if($jml_data<1){
			
						//insert ke tabel penjualan dulu
						$sql = "INSERT INTO penjualan(no_nota,waktu,id_konsumen) ";
						$sql = $sql." VALUES(".$this->db->escape($post["no_faktur"]).",";
						$sql = $sql." STR_TO_DATE(".$this->db->escape($post["datetimepicker"]).",'%Y-%m-%d')";
						$sql = $sql.",".$this->db->escape($post["id_konsumen"]).")";
						// $sql = $sql.",".$this->db->escape("Belum Lunas").")";
						$query = $this->db->query($sql);
						
					
						
						$sql = "INSERT INTO detail_penjualan(no_nota,id_menu,nama_menu,jml_beli,harga_jual,subtotal,hpp,jenis,catatan,waktu) ";
						$sql = $sql." VALUES(".$this->db->escape($post["no_faktur"]).",".$this->db->escape($post["id_menu"]);
						$sql = $sql.",".$this->db->escape($post["nama"]);
						$sql = $sql.",".$this->db->escape($post["jumlah"]).",".$this->db->escape($post["harga"]);
						$sql = $sql.",".$this->db->escape($post["jumlah"]*$post["harga"]);
						$sql = $sql.",".$this->db->escape($post["hargaproduksi"]);
						$sql = $sql.",".$this->db->escape($post["jenis"]);
						$sql = $sql.",".$this->db->escape($post["catatan"]).",";
						$sql = $sql." STR_TO_DATE(".$this->db->escape($post["datetimepicker"]).",'%Y-%m-%d'))";
						// $sql = $sql.",".$this->db->escape($post["id_konsumen"]);
						$query = $this->db->query($sql);

						
						// $sql = "INSERT INTO pembayaran(no_nota,id_konsumen,subtotal,waktu) ";
						// $sql = $sql." VALUES(".$this->db->escape($post["no_faktur"]).",".$this->db->escape($post["id_konsumen"]);
						// $sql = $sql.",".$this->db->escape($post["jumlah"]*$post["harga"]).",";
						// $sql = $sql." STR_TO_DATE(".$this->db->escape($post["datetimepicker"]).",'%Y-%m-%d %H:%i:%s'))";
						// $query = $this->db->query($sql);
						
						// $sql = "INSERT INTO pesanan(jml_beli) ";
						// $sql = $sql." VALUES(".$this->db->escape($post["jumlah"]).")";
						// $query = $this->db->query($sql);
						//update stok barang
					
						
						// return $this->db->affected_rows();
					
					}else{
						//untuk mendapatkan HPPnya
						// $HPP = $this->getharga_jualHPP_FIFO($post["nama"], $post["jumlah"]);
						//$HPP = $this->getharga_jualHPP_LIFO($post["nama"], $post["jumlah"]);
						// $HPP = $this->getharga_jualHPP_Average($post["nama"], $post["jumlah"]);
					
						//insert ke tabel detail penjualan
						
						$sql = "INSERT INTO detail_penjualan(no_nota,id_menu,nama_menu,jml_beli,harga_jual,subtotal,hpp,jenis,catatan,waktu) ";
						$sql = $sql." VALUES(".$this->db->escape($post["no_faktur"]).",".$this->db->escape($post["id_menu"]);
						$sql = $sql.",".$this->db->escape($post["nama"]);
						$sql = $sql.",".$this->db->escape($post["jumlah"]).",".$this->db->escape($post["harga"]);
						$sql = $sql.",".$this->db->escape($post["jumlah"]*$post["harga"]);
						$sql = $sql.",".$this->db->escape($post["hargaproduksi"]);
						$sql = $sql.",".$this->db->escape($post["jenis"]);
						$sql = $sql.",".$this->db->escape($post["catatan"]).",";
						$sql = $sql." STR_TO_DATE(".$this->db->escape($post["datetimepicker"]).",'%Y-%m-%d'))";
						$query = $this->db->query($sql);

						// $sql = "INSERT INTO pembayaran(no_nota,id_konsumen,subtotal,waktu) ";
						// $sql = $sql." VALUES(".$this->db->escape($post["no_faktur"]).",".$this->db->escape($post["id_konsumen"]);
						// $sql = $sql.",".$this->db->escape($post["jumlah"]*$post["harga"]).",";
						// $sql = $sql." STR_TO_DATE(".$this->db->escape($post["datetimepicker"]).",'%Y-%m-%d %H:%i:%s'))";
						// $query = $this->db->query($sql);

						// $sql = "INSERT INTO pesanan(no_nota,id_menu,nama_menu,id_konsumen,status,subtotal,jml_beli,hpp,waktu) ";
						// $sql = $sql." VALUES(".$this->db->escape($post["no_faktur"]).",".$this->db->escape($post["id_menu"]);
						// $sql = $sql.",".$this->db->escape($post["nama"]);
						// $sql = $sql.",".$this->db->escape($post["id_konsumen"]);
						// $sql = $sql.",".$this->db->escape('proses');
						// $sql = $sql.",".$this->db->escape($post["jumlah"]*$post["harga"]);
						// $sql = $sql.",".$this->db->escape($post["jumlah"]);
						// $sql = $sql.",".$this->db->escape($post["harga"]*80/100).",";
						// $sql = $sql." STR_TO_DATE(".$this->db->escape($post["datetimepicker"]).",'%Y-%m-%d'))";
						// $query = $this->db->query($sql);
						
						//update stok barang
						// $sql = "UPDATE menu SET stok = stok - ".$this->db->escape($post["jumlah"]);
						// $sql = $sql." WHERE id_menu = ".$this->db->escape($post["nama"]);
						// $query = $this->db->query($sql);
						
						// return $this->db->affected_rows();
					}
					
				}
				public function getAllDataPenjualan()
				{
					// $query = $this->db->query('SELECT * FROM `tb_penjualan` INNER JOIN `tb_pegawai` ON `tb_penjualan`.`id_pegawai` = `tb_pegawai`.`id_pegawai` INNER JOIN `tb_pelanggan` ON `tb_penjualan`.`id_pelanggan` = `tb_pelanggan`.`id_pelanggan` INNER JOIN `tb_barang` ON `tb_penjualan`.`id_barang` = `tb_barang`.`id_barang`');
					$query = $this->db->join('penjualan', 'penjualan.no_nota = detail_penjualan.no_nota')
						// ->join('menu', 'menu.id_menu = tb_penjualan.id_menu')
						->join('konsumen', 'konsumen.id_konsumen = penjualan.id_konsumen')
						->get('detail_penjualan');
			
			
			
					return $query->result_array();
				}
				

				
				public function deleteFormInput($no_faktur)
				{
					//query data jumlah pembelian yang akan di hapus
					$sql = "SELECT id_menu,jml_beli FROM detail_penjualan WHERE no_nota = ".$this->db->escape($no_faktur);
					$query = $this->db->query($sql);
					$hasil = $query->result_array();
					
					
					
					//hapus data tabel anaknya
					$this->db->delete('detail_penjualan', array("no_nota" => $no_faktur));
					//baru hapus tabel induknya
					return $this->db->delete('penjualan', array("no_nota" => $no_faktur));
					
				}

				public function deleteFormInputDetailPenjualan($id_transaksi_penjualan)
				{
					//query data jumlah pembelian yang akan di hapus
					$sql = "SELECT id_menu,jml_beli FROM detail_penjualan ";
					$sql = $sql." WHERE id_transaksi_penjualan = ".$id_transaksi_penjualan;
					$query = $this->db->query($sql);
					$hasil = $query->result_array();
				
				
					return $this->db->delete('detail_penjualan', array("id_transaksi_penjualan" => $id_transaksi_penjualan));
				}
				
				public function getDataByNoFaktur($no_faktur){
					$sql = "SELECT a.*,c.harga_jual,c.jenis,c.jml_beli,b.nama,d.nama_konsumen,d.alamat, no_telp,e.dp,e.jumlah_bayar FROM ".$this->_table." a ";
					$sql = $sql." JOIN detail_penjualan c ON (a.no_nota=c.no_nota) ";
					$sql = $sql." JOIN menu b ON (c.id_menu=b.id_menu) ";
					$sql = $sql." JOIN konsumen d ON (a.id_konsumen=d.id_konsumen) ";
					$sql = $sql." JOIN histori_bayar e ON (a.no_nota=e.no_nota) ";
					$sql = $sql." WHERE a.no_nota =  ".$this->db->escape($no_faktur);
					$query = $this->db->query($sql);
					
					return $query->result_array();
				}
				
				public function getData(){
					$sql = "SELECT a.*,b.nama_konsumen
								(SELECT sum(jml_beli*harga_jual) 
								FROM detail_penjualan 
								WHERE no_nota = a.no_nota) as total 
								JOIN konsumen b ON(a.id_konsumen=b.id_konsumen)
							FROM ".$this->_table." a ";
					$query = $this->db->query($sql);
					return $query->result_array();
				}
				// public function proses($no_nota,$id_konsumen)
				// {
				// 		date_default_timezone_set('Asia/Jakarta');
				// 		$today = date('Y-m-d H:i:s');
				// 		$sql = "UPDATE `penjualan` SET `status` = 'Lunas', `waktu_lunas`='$today' WHERE `penjualan`.`no_nota` = '$no_nota' and `penjualan`.`id_konsumen`='$id_konsumen';";
						
				// 		return $this->db->query($sql);
				// }
				public function getData1(){
					$sql = "SELECT a.*,b.nama_konsumen,sum(c.jml_beli*c.harga_jual)as total,d.jumlah_dp FROM ".$this->_table." a ";
					$sql = $sql." JOIN detail_penjualan c ON (a.no_nota=c.no_nota) ";
					$sql = $sql." JOIN konsumen b ON (a.id_konsumen=b.id_konsumen) ";
					$sql = $sql." JOIN histori_bayar d ON (a.no_nota=d.no_nota) ";
					$sql = $sql." WHERE a.no_nota = a.no_nota";
					$query = $this->db->query($sql);
					return $query->result_array();
				}

				public function getDatapenjualanCount($no_nota,$nama_konsumen,$dari,$sampai)
				{
					if($no_nota !=""){
						$this->db->where('penjualan.no_nota', $no_nota);
					}
					if($nama_konsumen !=""){
						$this->db->like('nama_konsumen', $nama_konsumen);
					}
					if($dari !=""){
						$this->db->where('penjualan.waktu >', $dari);
					}
					if($sampai !=""){
						$this->db->where('penjualan.waktu <', $sampai);
					}

					$this->db->select('*,penjualan.waktu,nama_konsumen,histori_bayar.jumlah_dp,totalpenjualan,totalbayar');
					$this->db->from('penjualan');
					$this->db->join('konsumen','konsumen.id_konsumen = penjualan.id_konsumen');
					$this->db->join('histori_bayar','penjualan.no_nota = histori_bayar.no_nota');
					$this->db->join('view_totalpenjualan','penjualan.no_nota=view_totalpenjualan.no_nota');
					$this->db->join('view_totalbayar','penjualan.no_nota=view_totalbayar.no_nota','left');
					return $this->db->get();
				}
				public function getData2($rowno,$rowperpage,$no_nota,$nama_konsumen,$dari,$sampai)
				{
					if($no_nota !=""){
						$this->db->where('penjualan.no_nota', $no_nota);
					}
					if($nama_konsumen !=""){
						$this->db->like('nama_konsumen', $nama_konsumen);
					}
					if($dari !=""){
						$this->db->where('penjualan.waktu >', $dari);
					}
					if($sampai !=""){
						$this->db->where('penjualan.waktu <', $sampai);
					}

					$this->db->select('*,penjualan.waktu,nama_konsumen,histori_bayar.jumlah_dp,totalpenjualan,totalbayar');
					$this->db->from('penjualan');
					$this->db->join('konsumen','konsumen.id_konsumen = penjualan.id_konsumen');
					$this->db->join('histori_bayar','penjualan.no_nota = histori_bayar.no_nota');
					$this->db->join('view_totalpenjualan','penjualan.no_nota=view_totalpenjualan.no_nota');
					$this->db->join('view_totalbayar','penjualan.no_nota=view_totalbayar.no_nota','left');
					$this->db->limit($rowperpage,$rowno);
					return $this->db->get();
				}
				
				// public function getData2()
				// {
				// 	$this->db->select('penjualan.*,nama_konsumen,jml_beli,harga_jual,jumlah_dp,totalpenjualan,totalbayar');
				// 	$this->db->from('penjualan');
				// 	$this->db->join('konsumen','konsumen.id_konsumen = penjualan.id_konsumen');
				// 	$this->db->join('detail_penjualan','penjualan.no_nota = detail_penjualan.no_nota');
				// 	$this->db->join('histori_bayar','penjualan.no_nota = histori_bayar.no_nota');
				// 	$this->db->join('view_totalpenjualan','penjualan.no_nota=view_totalpenjualan.no_nota');
				// 	$this->db->join('view_totalbayar','penjualan.no_nota=view_totalbayar.no_nota','left');
				// 	return $this->db->get();
				// }
				// public function getDataBayar(){
				// 	$sql = "SELECT a.*,c.subtotal,b.nama_konsumen FROM ".$this->_table." a ";
				// 	$sql = $sql." JOIN detail_penjualan c ON (a.no_nota=c.no_nota) ";
				// 	$sql = $sql." JOIN konsumen b ON (c.id_konsumen=b.id_konsumen) ";
				// 	$sql = $sql." WHERE a.no_nota =  ".$this->db->escape($no_faktur);
				// 	$query = $this->db->query($sql);
					
				// 	return $query->result_array();
				// }
				
				
		}
		?>