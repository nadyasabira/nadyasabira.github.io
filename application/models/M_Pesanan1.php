<?php

    class M_Pesanan1 extends CI_Model{
		private $_table = "pesanan";
		private $_table_detail = "detail_penjualan";


    public function proses($id_pesanan,$no_nota)
	{
			date_default_timezone_set('Asia/Jakarta');
			$today = date('Y-m-d H:i:s');
			$sql = "UPDATE `pesanan` SET `status` = 'selesai', `waktu_selesai`='$today' WHERE `pesanan`.`id_pesanan` = '$id_pesanan' and `pesanan`.`no_nota`='$no_nota';";
			return $this->db->query($sql);
			$sql2 = "UPDATE `histori_bayar` SET `is_created` = '4'  WHERE `pesanan`.`id_pesanan` = '$id_pesanan' and `histori_bayar`.`id_pesanan`='$id_pesanan';";
			return $this->db->query($sql2);
			
			
	}

	public function generate_jurnal_umum(){
					
		//dapatkan total harga_jual pembelian
		$sql = "SELECT a.id_transaksi,DATE_FORMAT(a.waktu,'%Y-%m-%d') as tanggal,";
		$sql = $sql." b.hpp as total_hpp_penjualan, ";
		$sql = $sql." sum(b.harga_jual*b.jml_beli) as total_hargajual_penjualan, ";
		$sql = $sql." sum(b.harga_jual*b.jml_beli)*0.5 as total_dp ";
		$sql = $sql." FROM ".$this->_table." a ";
		$sql = $sql." JOIN ".$this->_table_detail." b ";
		$sql = $sql." ON (a.no_nota=b.no_nota) ";
		$sql = $sql." WHERE a.no_nota = a.no_nota";
		$sql = $sql." group by a.id_transaksi,DATE_FORMAT(a.waktu,'%d-%m-%Y');";
		
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		
		foreach($hasil as $cacah):
			$total_hpp = $cacah['total_hpp_penjualan'];
			$total_harga_jual = $cacah['total_hargajual_penjualan'];
			$total_dp = $cacah['total_dp'];
			$tanggal = $cacah['tanggal'];
			$id_transaksi = $cacah['id_transaksi'];
			$angka = '2';
		endforeach;
		
		//dapatkan kode akun yang terkait dengan transaksi pembelian untuk jurnal
		$sql2 = "SELECT * FROM view_coa WHERE transaksi = 'hpp' ORDER BY kelompok ASC, posisi DESC" ;
		
		$query2 = $this->db->query($sql2);
		$hasil2 = $query2->result_array();
		
		foreach($hasil2 as $cacah):
			if(($cacah['kelompok']+0)==1){
				$total = $total_hpp;
			}else{
				$total = $total_hpp;
			}
			//masukkan ke tabel jurnal
			$sql2 = "INSERT INTO jurnal_umum ";
			$sql2 = $sql2." SET id_transaksi = ".$id_transaksi.", ";
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
		public function generate_jurnal_umum5(){
					
		//dapatkan total harga_jual pembelian
		$sql = "SELECT a.id_transaksi,DATE_FORMAT(a.waktu,'%Y-%m-%d') as tanggal,";
		$sql = $sql." b.hpp as total_hpp_penjualan, ";
		$sql = $sql." sum(b.harga_jual*b.jml_beli) as total_hargajual_penjualan, ";
		$sql = $sql." sum(b.harga_jual*b.jml_beli)*0.5 as total_dp ";
		$sql = $sql." FROM ".$this->_table." a ";
		$sql = $sql." JOIN ".$this->_table_detail." b ";
		$sql = $sql." ON (a.no_nota=b.no_nota) ";
		$sql = $sql." WHERE a.no_nota = a.no_nota";
		$sql = $sql." group by a.id_transaksi,DATE_FORMAT(a.waktu,'%d-%m-%Y');";
		
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		
		foreach($hasil as $cacah):
			$total_hpp = $cacah['total_hpp_penjualan'];
			$total_harga_jual = $cacah['total_hargajual_penjualan'];
			$total_dp = $cacah['total_dp'];
			$tanggal = $cacah['tanggal'];
			$id_transaksi = $cacah['id_transaksi'];
			$angka = '2';
		endforeach;
		
		//dapatkan kode akun yang terkait dengan transaksi pembelian untuk jurnal
		$sql2 = "SELECT * FROM view_coa WHERE transaksi = 'hpp' ORDER BY kelompok ASC, posisi DESC" ;
		
		$query2 = $this->db->query($sql2);
		$hasil2 = $query2->result_array();
		
		foreach($hasil2 as $cacah):
			if(($cacah['kelompok']+0)==1){
				$total = $total_hpp;
			}else{
				$total = $total_hpp;
			}
			//masukkan ke tabel jurnal
			$sql2 = "INSERT INTO jurnal_umum ";
			$sql2 = $sql2." SET id_transaksi = ".$id_transaksi.", ";
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
	public function generate_jurnal_umum1(){
					
		//dapatkan total harga_jual pembelian
		$sql = "SELECT a.id_transaksi,DATE_FORMAT(a.waktu,'%Y-%m-%d') as tanggal,";
		$sql = $sql." b.hpp as total_hpp_penjualan, ";
		$sql = $sql." sum(b.harga_jual*b.jml_beli) as total_hargajual_penjualan, ";
		$sql = $sql." sum(b.harga_jual*b.jml_beli)*0.5 as total_dp ";
		$sql = $sql." FROM ".$this->_table." a ";
		$sql = $sql." JOIN ".$this->_table_detail." b ";
		$sql = $sql." ON (a.no_nota=b.no_nota) ";
		$sql = $sql." WHERE a.no_nota = a.no_nota";
		$sql = $sql." group by a.id_transaksi,DATE_FORMAT(a.waktu,'%d-%m-%Y');";
		
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		
		foreach($hasil as $cacah):
			$total_hpp = $cacah['total_hpp_penjualan'];
			$total_harga_jual = $cacah['total_hargajual_penjualan'];
			$total_dp = $cacah['total_dp'];
			$tanggal = $cacah['tanggal'];
			$id_transaksi = $cacah['id_transaksi'];
			$angka = '2';
		endforeach;
		
		//dapatkan kode akun yang terkait dengan transaksi pembelian untuk jurnal
		$sql2 = "SELECT * FROM view_coa WHERE transaksi = 'hpp' ORDER BY kelompok ASC, posisi DESC" ;
		
		$query2 = $this->db->query($sql2);
		$hasil2 = $query2->result_array();
		
		foreach($hasil2 as $cacah):
			if(($cacah['kelompok']+0)==1){
				$total = $total_hpp;
			}else{
				$total = $total_hpp;
			}
			//masukkan ke tabel jurnal
			$sql2 = "INSERT INTO jurnal_umum ";
			$sql2 = $sql2." SET id_transaksi = ".$id_transaksi.", ";
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
	public function get_pesanan()
        	{
        		$query=$this->db->get('pesanan');
        		return $query->result_array();
			}

	public function getDataDetail(){
			$sql = "SELECT a.*,c.nama,b.nama_konsumen FROM ".$this->_table." a ";
			$sql = $sql." JOIN menu c ON (a.id_menu=c.id_menu) ";
			$sql = $sql." JOIN konsumen b ON (a.id_konsumen=b.id_konsumen) ";
			
			$query = $this->db->query($sql);
			
			return $query->result_array();
		}
	public function getData(){
			$sql = "SELECT a.*,
						(SELECT sum(jml_beli*harga_jual) 
						FROM detail_penjualan 
						WHERE no_nota = a.no_nota) as total 
					FROM ".$this->_table." a ";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function Cobain() {
			$sql = "SELECT a.*,b.nama_konsumen FROM ".$this->_table." a ";
			$sql = $sql." JOIN konsumen b ON (a.id_konsumen=b.id_konsumen) ";
			$query = $this->db->query($sql);
			
			return $query->result_array();
		}

		public function getDataDetail1($id_pesanan){
			$sql = "SELECT a.*,b.nama,c.nama_konsumen FROM ".$this->_table." a ";
			$sql = $sql." JOIN menu b ON (a.id_menu=b.id_menu) ";
			$sql = $sql." JOIN konsumen c ON (a.id_konsumen=c.id_konsumen) ";
			$sql = $sql." WHERE a.id_pesanan =".$this->db->escape($id_pesanan);
			$query = $this->db->query($sql);
			
			return $query->result_array();
		}
		public function getDataOrderByNama3($id_pesanan){
			$sql = "SELECT * ";
			$sql = $sql." FROM ".$this->_table;
			$sql = $sql." WHERE id_menu NOT IN ";
			$sql = $sql." (SELECT id_menu FROM detail_penjualan WHERE id_menu = '".$id_pesanan."') ";
			$sql = $sql." ORDER BY nama ASC";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function getDataEdit($id_pesanan,$id_konsumen){
			$sql = "SELECT a.*,b.nama_konsumen as nama_konsumen,c.nama ";
			$sql = $sql." FROM ".$this->_table." a ";
			$sql = $sql." JOIN konsumen b ON (a.id_konsumen=b.id_konsumen) ";
			$sql = $sql." JOIN menu c ON (a.id_menu=c.id_menu) ";
			$sql = $sql." WHERE a.id_pesanan =".$this->db->escape($id_pesanan);
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function updateFormInput($id_pesanan,$id_konsumen)
		{
			$post = $this->input->post();
			$id_pesanan_baru = $post["id_pesanan"];
			$id_konsumen_baru = $post["id_konsumen"];
			$id_menu_baru = $post["id_menu"];
			$datetimepicker = $post["datetimepicker"];		
			
		
			
			$sql = "UPDATE ".$this->_table;
			$sql = $sql." SET id_pesanan = ".$this->db->escape($id_pesanan_baru).", id_konsumen= ".$this->db->escape($id_konsumen_baru);
			$sql = $sql." ,id_pesanan = ".$this->db->escape($id_pesanan_baru).", id_konsumen= ".$this->db->escape($id_konsumen_baru);
			$sql = $sql." ,waktu = ".$this->db->escape($datetimepicker);
			// $sql = $sql." ,subtotal = ".$this->db->escape($subtotal);
			$sql = $sql." WHERE id_pesanan = ".$this->db->escape($id_pesanan)." AND id_konsumen = ".$this->db->escape($id_konsumen);
			$query = $this->db->query($sql);
			return $this->db->affected_rows();
		}
    
    
    }
?>