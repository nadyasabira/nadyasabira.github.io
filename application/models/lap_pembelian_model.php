<?php  
	class lap_pembelian_model extends ci_model{
		public function getTahun(){
			$sql = "
					SELECT tahun FROM
					(
						SELECT year(waktu_transaksi) as tahun 
						FROM pembelian
						UNION
						SELECT year(waktu_transaksi) as tahun
						FROM pembelian_bp
						UNION
						SELECT year(waktu_transaksi) as tahun
						FROM pembelian_alat
					) x
					ORDER BY 1 ASC		
				";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_pembelian($bulan,$tahun){
			$bulan = str_pad($bulan,2,"0",STR_PAD_LEFT);
			$tahun = $tahun;
			$sql="SELECT pembelian.no_faktur,DATE_FORMAT(pembelian.waktu_transaksi,'%Y-%m-%d') as tanggal, supplier.nama_supplier,sum(detail_pembelian.jumlah_beli) as total_beli,detail_pembelian.harga_satuan,sum(detail_pembelian.jumlah_beli*detail_pembelian.harga_satuan) as total
				FROM detail_pembelian
				JOIN pembelian ON detail_pembelian.no_faktur=pembelian.no_faktur
				JOIN supplier ON detail_pembelian.id_supplier=supplier.id_supplier
				WHERE MONTH(pembelian.waktu_transaksi) = '$bulan'
               AND YEAR(pembelian.waktu_transaksi) = '$tahun'
				GROUP BY detail_pembelian.no_faktur";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_pembelian_bp($bulan,$tahun){
			$bulan = str_pad($bulan,2,"0",STR_PAD_LEFT);
			$tahun = $tahun;
			$sql="SELECT pembelian_bp.no_faktur,DATE_FORMAT(pembelian_bp.waktu_transaksi,'%Y-%m-%d') as tanggal, supplier.nama_supplier,sum(detail_pembelian_bp.jumlah_beli) as total_beli,detail_pembelian_bp.harga_satuan,sum(detail_pembelian_bp.jumlah_beli*detail_pembelian_bp.harga_satuan) as total
				FROM detail_pembelian_bp
				JOIN pembelian_bp ON detail_pembelian_bp.no_faktur=pembelian_bp.no_faktur
				JOIN supplier ON detail_pembelian_bp.id_supplier=supplier.id_supplier
				WHERE MONTH(pembelian_bp.waktu_transaksi) = '$bulan'
               AND YEAR(pembelian_bp.waktu_transaksi) = '$tahun'
				GROUP BY detail_pembelian_bp.no_faktur";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function get_pembelian_alat($bulan,$tahun){
			$bulan = str_pad($bulan,2,"0",STR_PAD_LEFT);
			$tahun = $tahun;
			$sql="SELECT pembelian_alat.no_faktur,DATE_FORMAT(pembelian_alat.waktu_transaksi,'%Y-%m-%d') as tanggal, supplier.nama_supplier,sum(detail_pembelian_alat.jumlah_beli) as total_beli,detail_pembelian_alat.harga_satuan,sum(detail_pembelian_alat.jumlah_beli*detail_pembelian_alat.harga_satuan) as total
				FROM detail_pembelian_alat
				JOIN pembelian_alat ON detail_pembelian_alat.no_faktur=pembelian_alat.no_faktur
				JOIN supplier ON detail_pembelian_alat.id_supplier=supplier.id_supplier
				WHERE MONTH(pembelian_alat.waktu_transaksi) = '$bulan'
               AND YEAR(pembelian_alat.waktu_transaksi) = '$tahun'
				GROUP BY detail_pembelian_alat.no_faktur";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
	}
?>