<?php
	class pembelian_bp_model extends CI_Model {
		private $_table = "pembelian_bp";
		private $_table_detail = "detail_pembelian_bp";
		public $id_transaksi_beli_bp;
		public $id_bp;
		public $id_supplier;
		public $waktu_transaksi;
		public $harga_satuan;
		public $jumlah_beli;
		public $satuan;

		public function __construct(){
			$this->load->database();
			$this->load->helper(array('form', 'url')); 
			$this->load->library('form_validation');
		}	
		public function getPembelianPerbulan($tahun){
			$tahun = $tahun;
			$query = "SELECT id,nama_bulan,totalpembelian_bp FROM bulan
			LEFT JOIN (
			SELECT
				MONTH(pembelian_bp.waktu_transaksi) as bulan, SUM(harga_satuan*jumlah_beli) as totalpembelian_bp
				FROM detail_pembelian_bp
				INNER JOIN pembelian_bp ON pembelian_bp.no_faktur = detail_pembelian_bp.no_faktur
				WHERE date_format(pembelian_bp.waktu_transaksi,'%Y') = '".$tahun."'
				GROUP BY MONTH(pembelian_bp.waktu_transaksi)
				) pmb ON (bulan.id = pmb.bulan)";

				return $this->db->query($query);
		}
		public function getPembelianPerbulan1($tahun){
			$tahun = date("Y");
			$sql = "
				SELECT id,nama_bulan,totalpembelian_bp FROM bulan
				LEFT JOIN (
					SELECT MONTH(pembelian_bp.waktu_transaksi) as bulan, SUM(harga_satuan*jumlah_beli) as totalpembelian_bp
					FROM detail_pembelian_bp
					INNER JOIN pembelian_bp ON detail_pembelian_bp.no_faktur = pembelian_bp.no_faktur
					WHERE YEAR(pembelian_bp.waktu_transaksi) = '$tahun'
					GROUP BY MONTH(pembelian_bp.waktu_transaksi)
				) pmb ON (bulan.id = pmb.bulan)
				";
			$query = $this->db->query($sql);
			return $query->result_array();			
		}
		public function generate_jurnal_umum($no_faktur,$id_supplier){
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
				$angka = '4';
			endforeach;
				
			$sql2 = "SELECT * FROM view_coa WHERE transaksi = 'pembelian_bp' ORDER BY posisi DESC" ;
			$query2 = $this->db->query($sql2);
			$hasil2 = $query2->result_array();
				
			foreach($hasil2 as $cacah):
				$sql2 = "INSERT INTO jurnal_umum ";
				$sql2 = $sql2." SET id_transaksi = ".$idtransaksi.", ";
				$sql2 = $sql2." kode_akun = ".$cacah['kode_akun'].", ";
				$sql2 = $sql2." tgl_jurnal = '".$tanggal."', ";
				$sql2 = $sql2." posisi_d_c = '".$cacah['posisi']."', ";
				$sql2 = $sql2." nominal = ".$total." , ";
				$sql2 = $sql2." kelompok = ".$cacah['kelompok'].", ";
				$sql2 = $sql2." transaksi = '".$cacah['transaksi']."', ";
				$sql2 = $sql2." is_created = ".$angka."";
				$query2 = $this->db->query($sql2);
			endforeach;
		}
		public function fungsi_input_data(){
			$post = $this->input->post();
			$data['faktur_pembelian'] = array('no_faktur' 		=> $post["no_faktur"],
											'id_supplier' 		=> $post["id_supplier"], 
											'datetimepicker' 	=> $post["datetimepicker"],
											'nama_bp' 			=> $post["nama_bp"],
											'harga_satuan' 		=> $post["harga_satuan"],
											'jumlah_beli' 		=> $post["jumlah_beli"],
											'satuan' 			=> $post["satuan"],
										);
			$sql = "SELECT COUNT(*) as jml FROM pembelian_bp WHERE no_faktur = ".$this->db->escape($post["no_faktur"]);
			$sql = $sql." AND id_supplier = ".$this->db->escape($post["id_supplier"]);
			$query = $this->db->query($sql);
			$hasil = $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['jml'];
			endforeach;
			if($jml_data<1){
				$sql = "INSERT INTO pembelian_bp(no_faktur,id_supplier,waktu_transaksi)";
				$sql = $sql." VALUES(".$this->db->escape($post["no_faktur"]).",
									".$this->db->escape($post["id_supplier"]).",
									".$this->db->escape($post["datetimepicker"]).")";
				$query 	= $this->db->query($sql);
						
				$sql 	= "INSERT INTO detail_pembelian_bp(id_bp,id_supplier,harga_satuan,jumlah_beli,satuan,no_faktur) ";
				$sql 	= $sql." VALUES(".$this->db->escape($post["nama_bp"]).",".$this->db->escape($post["id_supplier"]);
				$sql 	= $sql.",".$this->db->escape($post["harga_satuan"]).",".$this->db->escape($post["jumlah_beli"]);
				$sql 	= $sql.",".$this->db->escape($post["satuan"]);
				$sql 	= $sql.",".$this->db->escape($post["no_faktur"]).")";
				$query 	= $this->db->query($sql);	
						
				return $this->db->affected_rows();
			}else{
				$sql 	= "INSERT INTO detail_pembelian_bp(id_bp,id_supplier,harga_satuan,jumlah_beli,satuan,no_faktur) ";
				$sql 	= $sql." VALUES(".$this->db->escape($post["nama_bp"]).",".$this->db->escape($post["id_supplier"]);
				$sql 	= $sql.",".$this->db->escape($post["harga_satuan"]).",".$this->db->escape($post["jumlah_beli"]);
				$sql 	= $sql.",".$this->db->escape($post["satuan"]);
				$sql 	= $sql.",".$this->db->escape($post["no_faktur"]).")";
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
			$sql = "SELECT a.*,d.waktu_transaksi,b.nama_bp,c.nama_supplier as nama_supplier FROM ".$this->_table_detail." a ";
			$sql = $sql." JOIN bahan_penolong b ON (a.id_bp=b.id_bp) ";
			$sql = $sql." JOIN supplier c ON (a.id_supplier=c.id_supplier) ";
			$sql = $sql." JOIN pembelian_bp d ON (a.no_faktur=d.no_faktur) ";
			$sql = $sql." WHERE a.no_faktur = ".$this->db->escape($no_faktur);"AND a.id_supplier = ".$this->db->escape($id_supplier);
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}
		public function getDataDetail1($no_faktur,$id_supplier){
			$sql = "SELECT a.*,d.waktu_transaksi,b.nama_bp,c.nama_supplier as nama_supplier FROM ".$this->_table_detail." a ";
			$sql = $sql." JOIN bahan_penolong b ON (a.id_bp=b.id_bp) ";
			$sql = $sql." JOIN supplier c ON (a.id_supplier=c.id_supplier) ";
			$sql = $sql." JOIN pembelian_bp d ON (a.no_faktur=d.no_faktur) ";
			$sql = $sql." WHERE a.no_faktur = ".$this->db->escape($no_faktur);"AND a.id_supplier = ".$this->db->escape($id_supplier);
			$sql = $sql."GROUP BY a.no_faktur";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function getDataDetail2($no_faktur,$id_supplier){
			$sql 	= "SELECT a.*,d.waktu_transaksi,b.nama_bp,c.nama_supplier as nama_supplier FROM ".$this->_table_detail." a ";
			$sql 	= $sql." JOIN bahan_penolong b ON (a.id_bp=b.id_bp) ";
			$sql 	= $sql." JOIN supplier c ON (a.id_supplier=c.id_supplier) ";
			$sql 	= $sql." JOIN pembelian_bp d ON (a.no_faktur=d.no_faktur) ";
			$sql 	= $sql." WHERE a.no_faktur = ".$this->db->escape($no_faktur);"AND a.id_supplier = ".$this->db->escape($id_supplier);
			$sql 	= $sql."GROUP BY a.id_transaksi_beli_bp";
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
			$id 	= 'PBP-';
			$nomor 	= str_pad(($jml_data+1),9,"0",STR_PAD_LEFT); //FAK-000001
			$id 	= $id.$nomor;
			return $id;
		}			
		public function deleteFormInputDetail($id_detail,$no_faktur){
			$sql = "SELECT id_bp,jumlah_beli FROM detail_pembelian_bp WHERE no_faktur=".$this->db->escape($no_faktur);
			$sql 	= $sql." AND id_transaksi_beli_bp = ".$id_detail;
			$query 	= $this->db->query($sql);
			$hasil 	= $query->result_array();

			return $this->db->delete('detail_pembelian_bp', array("id_transaksi_beli_bp" => $id_detail));
		}		
	}
?>