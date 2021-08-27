<?php
	class Pembelian_model extends CI_Model {
		//deklarasi atribut dan access method-nya
		private $_table = "pembelian";
		private $_table_detail = "detail_pembelian";
		private $_table_stok = "kartu_stok";
		public $id_transaksi_beli;
		public $id_bb;
		public $id_supplier;
		public $waktu_transaksi;
		public $harga_satuan;
		public $jumlah_beli ;
		public $satuan;

		public function __construct(){
			$this->load->database();
			$this->load->helper(array('form', 'url')); 
			$this->load->library('form_validation');
		}
		public function getPembelianPerbulan($tahun){
			$tahun = date("Y");
			$query = "SELECT id,nama_bulan,totalpembelian FROM bulan
			LEFT JOIN (
			SELECT
				MONTH(pembelian.waktu_transaksi) as bulan, SUM(harga_satuan*jumlah_beli) as totalpembelian
				FROM detail_pembelian
				INNER JOIN pembelian ON pembelian.no_faktur = detail_pembelian.no_faktur
				WHERE YEAR(pembelian.waktu_transaksi) = '$tahun'
				GROUP BY MONTH(pembelian.waktu_transaksi)
				) pmb ON (bulan.id = pmb.bulan)";

				return $this->db->query($query);
		}
		public function getPembelianPerbulan1($tahun){
			$tahun = date("Y");
			$sql = "
				SELECT id,nama_bulan,totalpembelian FROM bulan
				LEFT JOIN (
					SELECT MONTH(pembelian.waktu_transaksi) as bulan, SUM(harga_satuan*jumlah_beli) as totalpembelian
					FROM detail_pembelian
					INNER JOIN pembelian ON detail_pembelian.no_faktur = pembelian.no_faktur
					WHERE YEAR(pembelian.waktu_transaksi) = '$tahun'
					GROUP BY MONTH(pembelian.waktu_transaksi)
				) pmb ON (bulan.id = pmb.bulan)
				";
			$query = $this->db->query($sql);
			return $query->result_array();			
		}
		public function getDataPembelianhariini(){
			$hariini = date("Y-m-d");
			return $this->db->get_where('pembelian', array('waktu_transaksi' => $hariini));
		}
		//untuk membuat jurnal umum
		public function generate_jurnal_umum($no_faktur,$id_supplier){
			//dapatkan total harga pembelian
			$sql = "SELECT a.id_transaksi,DATE_FORMAT(a.waktu_transaksi,'%Y-%m-%d') as tanggal,";
			$sql = $sql." sum(b.harga_satuan*b.jumlah_beli) as total_pembelian ";
			$sql = $sql." FROM ".$this->_table." a ";
			$sql = $sql." JOIN ".$this->_table_detail." b ";
			$sql = $sql." ON (a.no_faktur=b.no_faktur AND a.id_supplier=b.id_supplier) ";
			$sql = $sql." WHERE a.no_faktur = ".$this->db->escape($no_faktur)." and a.id_supplier = ".$this->db->escape($id_supplier);
			$sql = $sql." group by a.id_transaksi,DATE_FORMAT(a.waktu_transaksi,'%d-%m-%Y');";
				
			$query = $this->db->query($sql);
			$hasil = $query->result_array();
				
			foreach($hasil as $cacah):
				$total = $cacah['total_pembelian'];
				$tanggal = $cacah['tanggal'];
				$idtransaksi = $cacah['id_transaksi'];
			endforeach;
				
			//dapatkan kode akun yang terkait dengan transaksi pembelian untuk jurnal
			$sql2 = "SELECT * FROM view_coa WHERE transaksi = 'pembelian' ORDER BY posisi DESC" ;
				
			$query2 = $this->db->query($sql2);
			$hasil2 = $query2->result_array();
				
			foreach($hasil2 as $cacah):
				//masukkan ke tabel jurnal
				$sql2 = "INSERT INTO jurnal_umum ";
				$sql2 = $sql2." SET id_transaksi = ".$idtransaksi.", ";
				$sql2 = $sql2." kode_akun = ".$cacah['kode_akun'].", ";
				$sql2 = $sql2." tgl_jurnal = '".$tanggal."', ";
				$sql2 = $sql2." posisi_d_c = '".$cacah['posisi']."', ";
				$sql2 = $sql2." nominal = ".$total." , ";
				$sql2 = $sql2." kelompok = ".$cacah['kelompok'].", ";
				$sql2 = $sql2." transaksi = '".$cacah['transaksi']."' ";
				$query2 = $this->db->query($sql2);
			endforeach;	
		}
	
		public function fungsi_input_data(){
			$post = $this->input->post();
			$data['faktur_pembelian'] = array('no_faktur' 		=> $post["no_faktur"],
											'id_supplier' 		=> $post["id_supplier"], 
											'datetimepicker' 	=> $post["datetimepicker"],
											'nama_bb' 			=> $post["nama_bb"],
											'harga_satuan' 		=> $post["harga_satuan"],
											'jumlah_beli' 		=> $post["jumlah_beli"],
											'satuan' 			=> $post["satuan"],
										);
			//cek dulu apakah sudah ada
			$sql = "SELECT COUNT(*) as jml FROM pembelian WHERE no_faktur = ".$this->db->escape($post["no_faktur"]);
			$sql = $sql." AND id_supplier = ".$this->db->escape($post["id_supplier"]);
			$query = $this->db->query($sql);
			$hasil = $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['jml'];
			endforeach;
			//jumlah data 0 berarti belum ada datanya, maka dimasukkan ke tabel
			if($jml_data<1){
				//insert ke tabel pembelian dulu
				$sql = "INSERT INTO pembelian(no_faktur,id_supplier,waktu_transaksi)";
				$sql = $sql." VALUES(".$this->db->escape($post["no_faktur"]).",
									".$this->db->escape($post["id_supplier"]).",
									".$this->db->escape($post["datetimepicker"]).")";
				$query 	= $this->db->query($sql);
						
				//insert ke tabel detail pembelian
				$sql 	= "INSERT INTO detail_pembelian(id_bb,id_supplier,jumlah_beli,satuan,harga_satuan,no_faktur) ";
				$sql 	= $sql." VALUES(".$this->db->escape($post["nama_bb"]).",".$this->db->escape($post["id_supplier"]);
				$sql 	= $sql.",".$this->db->escape($post["jumlah_beli"]).",".$this->db->escape($post["satuan"]);
				$sql 	= $sql.",".$this->db->escape($post["harga_satuan"]);
				$sql 	= $sql.",".$this->db->escape($post["no_faktur"]).")";
				$query 	= $this->db->query($sql);	
						
				//insert ke tabel persediaan
				$sql = "INSERT INTO kartu_stok(no_faktur,keterangan,id_bb,harga_satuan,jumlah,total,tanggal_stok) ";
				$sql = $sql." VALUES(".$this->db->escape($post["no_faktur"]).",".$this->db->escape($post["keterangan"]).",".$this->db->escape($post["nama_bb"]).",".$this->db->escape($post["harga_satuan"]/1000).",".$this->db->escape($post["jumlah_beli"]*1000).",".$this->db->escape($post["harga_satuan"]*$post["jumlah_beli"]);
				$sql 	= $sql.",STR_TO_DATE(".$this->db->escape($post["datetimepicker"]).",'%Y-%m-%d %H:%i:%s')".")";
				$query 	= $this->db->query($sql);
				
				return $this->db->affected_rows();
			}else{
				//insert ke tabel detail pembelian
				$sql 	= "INSERT INTO detail_pembelian(id_bb,id_supplier,jumlah_beli,satuan,harga_satuan,no_faktur) ";
				$sql 	= $sql." VALUES(".$this->db->escape($post["nama_bb"]).",".$this->db->escape($post["id_supplier"]);
				$sql 	= $sql.",".$this->db->escape($post["jumlah_beli"]).",".$this->db->escape($post["satuan"]);
				$sql 	= $sql.",".$this->db->escape($post["harga_satuan"]);
				$sql 	= $sql.",".$this->db->escape($post["no_faktur"]).")";
				$query 	= $this->db->query($sql);

				//insert ke tabel persediaan
				$sql = "INSERT INTO kartu_stok(no_faktur,keterangan,id_bb,harga_satuan,jumlah,total,tanggal_stok) ";
				$sql = $sql." VALUES(".$this->db->escape($post["no_faktur"]).",".$this->db->escape($post["keterangan"]).",".$this->db->escape($post["nama_bb"]).",".$this->db->escape($post["harga_satuan"]/1000).",".$this->db->escape($post["jumlah_beli"]*1000).",".$this->db->escape($post["harga_satuan"]*$post["jumlah_beli"]);
				$sql 	= $sql.",STR_TO_DATE(".$this->db->escape($post["datetimepicker"]).",'%Y-%m-%d %H:%i:%s')".")";
				$query 	= $this->db->query($sql);
						
				return $this->db->affected_rows();
			}
		}	
		public function getData(){
			$sql 	= "SELECT a.*,b.nama_supplier as nama_supplier FROM ".$this->_table." a ";
			$sql 	= $sql." JOIN supplier b ON (a.id_supplier=b.id_supplier) ";
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}
		public function getDataDetail($no_faktur,$id_supplier){
			$sql 	= "SELECT a.*,d.waktu_transaksi,b.nama_bb,c.nama_supplier as nama_supplier FROM ".$this->_table_detail." a ";
			$sql 	= $sql." JOIN bahan_baku b ON (a.id_bb=b.id_bb) ";
			$sql 	= $sql." JOIN supplier c ON (a.id_supplier=c.id_supplier) ";
			$sql 	= $sql." JOIN pembelian d ON (a.no_faktur=d.no_faktur) ";
			$sql 	= $sql." WHERE a.no_faktur = ".$this->db->escape($no_faktur);"AND a.id_supplier = ".$this->db->escape($id_supplier);
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}
		public function getDataDetail1($no_faktur,$id_supplier){
			$sql 	= "SELECT a.*,d.waktu_transaksi,b.nama_bb,c.nama_supplier as nama_supplier FROM ".$this->_table_detail." a ";
			$sql 	= $sql." JOIN bahan_baku b ON (a.id_bb=b.id_bb) ";
			$sql 	= $sql." JOIN supplier c ON (a.id_supplier=c.id_supplier) ";
			$sql 	= $sql." JOIN pembelian d ON (a.no_faktur=d.no_faktur) ";
			$sql 	= $sql." WHERE a.no_faktur = ".$this->db->escape($no_faktur);"AND a.id_supplier = ".$this->db->escape($id_supplier);
			$sql 	= $sql."GROUP BY a.no_faktur";
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}

		public function getDataDetail2($no_faktur,$id_supplier){
			$sql 	= "SELECT a.*,d.waktu_transaksi,b.nama_bb,c.nama_supplier as nama_supplier FROM ".$this->_table_detail." a ";
			$sql 	= $sql." JOIN bahan_baku b ON (a.id_bb=b.id_bb) ";
			$sql 	= $sql." JOIN supplier c ON (a.id_supplier=c.id_supplier) ";
			$sql 	= $sql." JOIN pembelian d ON (a.no_faktur=d.no_faktur) ";
			$sql 	= $sql." WHERE a.no_faktur = ".$this->db->escape($no_faktur);"AND a.id_supplier = ".$this->db->escape($id_supplier);
			$sql 	= $sql."GROUP BY a.id_transaksi_beli";
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}		
		public function getPembelianId(){
			$sql 	= "SELECT (substring(IFNULL(MAX(no_faktur),0),5)+0) as hsl FROM ".$this->_table;
			$query 	= $this->db->query($sql);
			$hasil 	= $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['hsl'];
			endforeach;
			$id 	= 'PBB-';
			$nomor 	= str_pad(($jml_data+1),9,"0",STR_PAD_LEFT); //FAK-000001
			$id 	= $id.$nomor;
			return $id;
		}
		public function deleteFormInputDetail($id_transaksi_beli,$no_faktur,$id_supplier){
			//query data jumlah pembelian yang akan di hapus
			$sql 	= "SELECT id_bb,jumlah_beli FROM detail_pembelian WHERE no_faktur=".$this->db->escape($no_faktur);
			$sql 	= $sql." AND id_transaksi_beli = ".$id_transaksi_beli;
			$query 	= $this->db->query($sql);
			$hasil 	= $query->result_array();
			foreach($hasil as $cacah):
				//update stoknya ke semula sebelum dihapus
				
			endforeach;

			$sql3 = "DELETE FROM kartu_stok WHERE no_faktur=".$this->db->escape($no_faktur);
			$sql3 = $sql3."AND id_bb=".$this->db->escape($cacah["id_bb"]);
			$query3 = $this->db->query($sql3);
			$this->db->delete('kartu_stok',array("no_faktur"=>$no_faktur, "id_bb"=>$cacah["id_bb"]));
			return $this->db->delete('detail_pembelian', array("id_transaksi_beli" => $id_transaksi_beli));
		}	
	}
?>