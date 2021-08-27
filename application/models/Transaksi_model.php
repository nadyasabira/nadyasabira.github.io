<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	private $table = 'transaksi';
	private $_table = 'transaksi_beban';


	public function removeStok($id, $stok)
	{
		$this->db->where('id', $id);
		$this->db->set('stok', $stok);
		return $this->db->update('produk');
	}

	public function generate_jurnal_umum(){
			
		//dapatkan total harga_jual pembelian
		$sql = "SELECT a.id_transaksi,DATE_FORMAT(a.tanggal,'%Y-%m-%d') as tanggal,";
		$sql = $sql." SUM(a.total) as total_beban ";
		$sql = $sql." FROM ".$this->_table." a ";
		$sql = $sql." WHERE a.id_trans_beban =id_trans_beban";
		$sql = $sql." group by a.id_transaksi,DATE_FORMAT(a.tanggal,'%d-%m-%Y');";
		
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		
		foreach($hasil as $cacah):
			$total = $cacah['total_beban'];
			$tanggal = $cacah['tanggal'];
			$id_trans_beban = $cacah['id_transaksi'];
		endforeach;
		
		//dapatkan kode akun yang terkait dengan transaksi pembelian untuk jurnal
		$sql2 = "SELECT * FROM view_coa WHERE transaksi = 'pembebanan' ORDER BY kelompok ASC, posisi DESC" ;
		
		$query2 = $this->db->query($sql2);
		$hasil2 = $query2->result_array();
		
		foreach($hasil2 as $cacah):
			if(($cacah['kelompok']+0)==1){
				$total = $total_beban;
			}else{
				$total = $total_beban;
			}
			//masukkan ke tabel jurnal
			$sql2 = "INSERT INTO jurnal_umum ";
			$sql2 = $sql2." SET id_transaksi = ".$idtransaksi.", ";
			$sql2 = $sql2." kode_akun = ".$cacah['kode_akun'].", ";
			$sql2 = $sql2." tgl_jurnal = '".$tanggal."', ";
			$sql2 = $sql2." posisi_d_c = '".$cacah['posisi']."', ";
			$sql2 = $sql2." nominal = ".$total." , ";
			$sql2 = $sql2." kelompok = ".$cacah['kelompok']." , ";
			$sql2 = $sql2." transaksi = '".$cacah['transaksi']."' ";
			$query2 = $this->db->query($sql2);
		endforeach;
		
	}
	

	public function addTerjual($id, $jumlah)
	{
		$this->db->where('id', $id);
		$this->db->set('terjual', $jumlah);
		return $this->db->update('produk');;
	}
	public function get_transaksi()
	{
		$query=$this->db->get('transaksi_beban');
		return $query->result_array();
	}

	public function getDataDetail(){
		$sql = "SELECT a.*,b.nama_beban FROM ".$this->_table." a ";
		$sql = $sql." JOIN beban b ON (a.kode_akun=b.kode_akun) ";
		$sql = $sql." WHERE a.id_trans_beban";
		$query = $this->db->query($sql);
		
		return $query->result_array();
	}
	function getdatatransaksi(){
			
		$sql = "SELECT a.*,b.nama_beban FROM ".$this->_table." a ";
		$sql = $sql." JOIN beban b ON (a.kode_akun=b.kode_akun) ";
		// $sql = $sql." WHERE a.no_nota =".$this->db->escape($no_faktur);
		$query = $this->db->query($sql);
		
		return $query->result_array();
	}
	public function tambah($data){
		$simpan = $this->db->insert($this->_table, $data);
		if ($simpan){
			return 1;
		}else{
			return 0;
		}
	}
	public function gettransaksiId(){
		$sql = "SELECT (substring(IFNULL(MAX(id_trans_beban),0),5)+0) as hsl FROM ".$this->_table;
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		foreach($hasil as $cacah):
			$jml_data = $cacah['hsl'];
		endforeach;
		$id = 'TB';
		$nomor = str_pad(($jml_data+1),3,"0",STR_PAD_LEFT); //FAK-000001
		$id = $id.$nomor;
		return $id;
	}

	public function fungsi_input_data(){
		$post = $this->input->post();
		$this->id_trans_beban = $this->gettransaksiId();
		$this->datetimepicker = $post["datetimepicker"];
		$this->kode_akun = $post["kode_akun"];
		$this->total = $post["total"];
		
	
	
		$sql = "INSERT INTO transaksi_beban(id_trans_beban,kode_akun,tanggal,total) ";
		$sql = $sql." VALUES(".$this->db->escape($this->id_trans_beban).",".$this->db->escape($this->kode_akun);
		$sql = $sql.",".$this->db->escape($this->datetimepicker);
		$sql = $sql.",".$this->db->escape($this->total).")";
		$query = $this->db->query($sql);
		return $this->db->affected_rows();

		// $sql2 = "INSERT INTO jurnal_umum ";
		// $sql2 = $sql2." SET id_transaksis = ".$idtransaksi.", ";
		// $sql2 = $sql2." kode_akun = ".$cacah['kode_akun'].", ";
		// $sql2 = $sql2." tgl_jurnal = '".$tanggal."', ";
		// $sql2 = $sql2." posisi_d_c = '".$cacah['posisi']."', ";
		// $sql2 = $sql2." nominal = '".$cacah['posisi']."', ";
		// $sql2 = $sql2." kelompok = ".$cacah['kelompok']." , ";
		// $sql2 = $sql2." transaksi = '".$cacah['transaksi']."' ";
		// $query2 = $this->db->query($sql2);
	}

	public function fungsi_input_data2(){
		$post = $this->input->post();
		
		$data['faktur_beban'] = array('id_trans_beban' => $this->transaksi_model->gettransaksiId(),
								   'datetimepicker' => $post["datetimepicker"],
								   'kode_akun' => $post["kode_akun"],
								   'total' => $post["total"]
								   );
		
		//cek dulu apakah sudah ada
		$sql = "SELECT COUNT(*) as jml FROM transaksi_beban WHERE id_trans_beban = ".$this->db->escape($post["id_trans_beban"]);
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		foreach($hasil as $cacah):
			$jml_data = $cacah['jml'];
		endforeach;
		//jumlah data 0 berarti belum ada datanya, maka dimasukkan ke tabel
		if($jml_data<1){

	
			// insert ke tabel penjualan dulu
			$sql = "INSERT INTO transaksi_beban(id_trans_beban,tanggal,total,kode_akun) ";
			$sql = $sql." VALUES(".$this->db->escape($post["id_trans_beban"]).",";
			$sql = $sql." STR_TO_DATE(".$this->db->escape($post["datetimepicker"]).",'%Y-%m-%d')";
			$sql = $sql.",".$this->db->escape($post["total"]);
			$sql = $sql.",".$this->db->escape($post["kode_akun"]).")";
			$query = $this->db->query($sql);		

		// 	//dapatkan total harga_jual pembelian
		// $sql = "SELECT a.id_transaksi,DATE_FORMAT(a.tanggal,'%Y-%m-%d') as tanggal,";
		// $sql = $sql." sum(a.total) as total_beban ";
		// $sql = $sql." FROM ".$this->_table." a ";
		// $sql = $sql." WHERE a.id_trans_beban = id_trans_beban";
		// $sql = $sql." group by a.id_transaksi,DATE_FORMAT(a.tanggal,'%d-%m-%Y');";
		
		// $query = $this->db->query($sql);
		// $hasil = $query->result_array();
		
		// foreach($hasil as $cacah):
		// 	$total = $cacah['total_beban'];
		// 	$tanggal = $cacah['tanggal'];
		// 	$transaksi_beban = $cacah['id_transaksi'];
		// endforeach;
		
		// // dapatkan kode akun yang terkait dengan transaksi pembelian untuk jurnal
		// $sql2 = "SELECT * FROM view_coa WHERE transaksi = 'pembebanan' ORDER BY kelompok ASC, posisi DESC" ;
		
		// $query2 = $this->db->query($sql2);
		// $hasil2 = $query2->result_array();
		
		// foreach($hasil2 as $cacah):
		// 	if(($cacah['kelompok']+0)==1){
		// 		$total = $total_beban;
		// 	}else{
		// 		$total = $total_beban;
		// 	}
		// // 	// masukkan ke tabel jurnal
		// 	$sql2 = "INSERT INTO jurnal_umum ";
		// 	$sql2 = $sql2." SET id_transaksis = ".$idtransaksi.", ";
		// 	$sql2 = $sql2." kode_akun = ".$cacah['kode_akun'].", ";
		// 	$sql2 = $sql2." tgl_jurnal = '".$tanggal."', ";
		// 	$sql2 = $sql2." posisi_d_c = '".$cacah['posisi']."', ";
		// 	$sql2 = $sql2." nominal = '".$cacah['posisi']."', ";
		// 	$sql2 = $sql2." kelompok = ".$cacah['kelompok']." , ";
		// 	$sql2 = $sql2." transaksi = '".$cacah['transaksi']."' ";
		// 	$query2 = $this->db->query($sql2);
		// endforeach;
		
			
		
		
		}else{
			//untuk mendapatkan HPPnya
			// $HPP = $this->getharga_jualHPP_FIFO($post["nama"], $post["jumlah"]);
			//$HPP = $this->getharga_jualHPP_LIFO($post["nama"], $post["jumlah"]);
			// $HPP = $this->getharga_jualHPP_Average($post["nama"], $post["jumlah"]);
		
			//insert ke tabel detail penjualan
			
			$sql = "INSERT INTO transaksi_beban(id_trans_beban,tanggal,total,kode_akun) ";
			$sql = $sql." VALUES(".$this->db->escape($post["id_trans_beban"]).",";
			$sql = $sql." STR_TO_DATE(".$this->db->escape($post["datetimepicker"]).",'%Y-%m-%d')";
			$sql = $sql.",".$this->db->escape($post["total"]);
			$sql = $sql.",".$this->db->escape($post["kode_akun"]).")";
			$query = $this->db->query($sql);
	

		// 	//dapatkan total harga_jual pembelian
		// $sql = "SELECT a.id_trans_beban,DATE_FORMAT(a.tanggal,'%Y-%m-%d') as tanggal,";
		// $sql = $sql." a.total as total_beban, ";
		// $sql = $sql." FROM ".$this->_table." a ";
		// $sql = $sql." WHERE a.id_trans_beban = ".$this->db->escape($this->id_trans_beban);
		// $sql = $sql." group by a.id_transaksi,DATE_FORMAT(a.tanggal,'%d-%m-%Y');";
		
		// $query = $this->db->query($sql);
		// $hasil = $query->result_array();
		
		// foreach($hasil as $cacah):
		// 	$total = $cacah['total_beban'];
		// 	$tanggal = $cacah['tanggal'];
		// 	$transaksi_beban = $cacah['id_transaksi'];
		// endforeach;
		
		// //dapatkan kode akun yang terkait dengan transaksi pembelian untuk jurnal
		// $sql2 = "SELECT * FROM view_coa WHERE transaksi = 'pembebanan' ORDER BY kelompok ASC, posisi DESC" ;
		
		// $query2 = $this->db->query($sql2);
		// $hasil2 = $query2->result_array();
		
		// foreach($hasil2 as $cacah):
		// 	if(($cacah['kelompok']+0)==1){
		// 		$total = $total_beban;
		// 	}else{
		// 		$total = $total_beban;
		// 	}
		// 	//masukkan ke tabel jurnal
		// 	$sql2 = "INSERT INTO jurnal_umum ";
		// 	$sql2 = $sql2." SET id_transaksi = ".$idtransaksi.", ";
		// 	$sql2 = $sql2." kode_akun = ".$cacah['kode_akun'].", ";
		// 	$sql2 = $sql2." tgl_jurnal = '".$tanggal."', ";
		// 	$sql2 = $sql2." posisi_d_c = '".$cacah['posisi']."', ";
		// 	$sql2 = $sql2." nominal = ".$total." , ";
		// 	$sql2 = $sql2." kelompok = ".$cacah['kelompok']." , ";
		// 	$sql2 = $sql2." transaksi = '".$cacah['transaksi']."' ";
		// 	$query2 = $this->db->query($sql2);
		// endforeach;
		
		// }
		
	}
	
}
	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function read()
	{
		$this->db->select('transaksi.id, transaksi.tanggal, transaksi.barcode, transaksi.qty, transaksi.total_bayar, transaksi.jumlah_uang, transaksi.diskon, pelanggan.nama as pelanggan');
		$this->db->from($this->table);
		$this->db->join('pelanggan', 'transaksi.pelanggan = pelanggan.id', 'left outer');
		return $this->db->get();
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}
	// public function getDataDetail($no_faktur)
	// {
	// 	$sql = "SELECT a.*,b.nama_beban FROM ".$this->_table." a ";
	// 	$sql = $sql." JOIN beban b ON (a.kode_akun=b.kode_akun) ";
	// 	$sql = $sql." WHERE a.transaksi_beban =".$this->db->escape($no_faktur);
	// 	$query = $this->db->query($sql);
		
	// 	return $query->result_array();
	// }
	

	public function getProduk($barcode, $qty)
	{
		$total = explode(',', $qty);
		foreach ($barcode as $key => $value) {
			$this->db->select('nama_produk');
			$this->db->where('id', $value);
			$data[] = '<tr><td>'.$this->db->get('produk')->row()->nama_produk.' ('.$total[$key].')</td></tr>';
		}
		return join($data);
	}


	public function penjualanBulan($date)
	{
		$qty = $this->db->query("SELECT qty FROM transaksi WHERE DATE_FORMAT(tanggal, '%d %m %Y') = '$date'")->result();
		$d = [];
		$data = [];
		foreach ($qty as $key) {
			$d[] = explode(',', $key->qty);
		}
		foreach ($d as $key) {
			$data[] = array_sum($key);
		}
		return $data;
	}

	public function transaksiHari($hari)
	{
		return $this->db->query("SELECT COUNT(*) AS total FROM transaksi WHERE DATE_FORMAT(tanggal, '%d %m %Y') = '$hari'")->row();
	}

	public function transaksiTerakhir($hari)
	{
		return $this->db->query("SELECT transaksi.qty FROM transaksi WHERE DATE_FORMAT(tanggal, '%d %m %Y') = '$hari' LIMIT 1")->row();
	}

	public function getAll($id)
	{
		$this->db->select('transaksi.nota, transaksi.tanggal, transaksi.barcode, transaksi.qty, transaksi.total_bayar, transaksi.jumlah_uang, pengguna.nama as kasir');
		$this->db->from('transaksi');
		$this->db->join('pengguna', 'transaksi.kasir = pengguna.id');
		$this->db->where('transaksi.id', $id);
		return $this->db->get()->row();
	}

	public function getName($barcode)
	{
		foreach ($barcode as $b) {
			$this->db->select('nama_produk, harga');
			$this->db->where('id', $b);
			$data[] = $this->db->get('produk')->row();
		}
		return $data;
	}

}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */