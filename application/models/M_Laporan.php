<?php  
	class M_Laporan extends CI_Model{
	    private $_table = "penjualan";
	    private $_table_detail = "detail_penjualan";
    
    	public function __construct(){
            $this->load->database();
            $this->load->helper(array('form', 'url')); 
            $this->load->library('form_validation');
    	}
	    public function getAkun(){
			$sql = "
					Select nama_akun,a.kode_akun
					FROM jurnal_umum a
					JOIN akun b ON (a.kode_akun=b.kode_akun)
					GROUP BY nama_akun,a.kode_akun
					ORDER BY kode_akun asc
				";
			$query = $this->db->query($sql);
			return $query->result_array();
	    }
		public function getPosisiSaldoNormal($akun){
			$sql = "SELECT posisi_d_c
					FROM akun 
					WHERE kode_akun = ".$this->db->escape($akun);
			$query = $this->db->query($sql);
			$hasil = $query->result_array();
			foreach($hasil as $cacah):
				$posisi_saldo_normal = $cacah['posisi_d_c'];
			endforeach;
			return $posisi_saldo_normal;
	    }
		public function getSaldoAwalBukuBesar($bulan,$tahun,$akun){
			$posisi_saldo_normal = $this->getPosisiSaldoNormal($akun);
			$bulan = str_pad($bulan,2,"0",STR_PAD_LEFT);
			$waktu = $tahun."-".$bulan;
			$sql = "
					SELECT tbl1.posisi_d_c,ifnull(tbl2.total,0) as nominal FROM
					(
						SELECT 'd' posisi_d_c
						UNION
						SELECT 'c' posisi_d_c
					) tbl1
					LEFT OUTER JOIN
					(
						Select a.posisi_d_c,sum(a.nominal) as total
						FROM jurnal_umum a
						JOIN akun b ON (a.kode_akun=b.kode_akun)
						WHERE a.kode_akun = ".$akun." 
						AND date_format(a.tgl_jurnal,'%Y-%m') < '".$waktu."'
						GROUP BY  a.posisi_d_c
						ORDER BY id_transaksi
					) tbl2
					ON (tbl1.posisi_d_c = tbl2.posisi_d_c)
				";
			$query = $this->db->query($sql);
			$hasil = $query->result_array();
			$saldo_debet = 0;
			$saldo_kredit = 0;
			foreach($hasil as $cacah):
				if(strcmp($cacah['posisi_d_c'],'d')==0){
					$saldo_debet = $saldo_debet + $cacah['nominal'];
				}else{
					$saldo_kredit = $saldo_kredit - $cacah['nominal'];
				}
			endforeach;
			if(strcmp($posisi_saldo_normal,'d')==0){
				$saldo = $saldo_debet + $saldo_kredit;
			}else{
				$saldo =  $saldo_kredit - $saldo_debet;
			}
			return $saldo;
		}
		public function getJurnalUmum($bulan,$tahun){
			$bulan = str_pad($bulan,2,"0",STR_PAD_LEFT);
			$waktu = $bulan."-".$tahun;
			$sql="	SELECT a.id_transaksi, a.tgl_jurnal as tanggal, a.posisi_d_c,a.nominal,a.kelompok,b.nama_akun,a.kode_akun
					FROM jurnal_umum a
					JOIN akun b ON (a.kode_akun=b.kode_akun)
					WHERE   DATE_FORMAT(a.tgl_jurnal,'%m-%Y') = ".$this->db->escape($waktu)." ORDER BY id_transaksi asc, 1 ASC, 2 ASC, 5 ASC, 3 DESC ";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function getBeban($bulan,$tahun){
			$bulan = str_pad($bulan,2,"0",STR_PAD_LEFT);
			$waktu = $bulan."-".$tahun;
			$sql = "
					Select nama_akun,a.kode_akun,a.posisi_d_c,sum(a.nominal) as total,c.jenis_beban
					FROM jurnal_umum a
					JOIN akun b ON (a.kode_akun=b.kode_akun)
					JOIN beban c ON (a.kode_akun=c.kode_akun)
					WHERE a.kode_akun like '5%' AND jenis_beban like '%Beban Pemasaran%'
					AND date_format(a.tgl_jurnal,'%m-%Y') = '".$waktu."'
					GROUP BY nama_akun,a.kode_akun,a.posisi_d_c
					ORDER BY posisi_d_c
				";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function getBeban1($bulan,$tahun){
			$bulan = str_pad($bulan,2,"0",STR_PAD_LEFT);
			$waktu = $bulan."-".$tahun;
			$sql = "
					Select nama_akun,a.kode_akun,a.posisi_d_c,sum(a.nominal) as total,c.jenis_beban
					FROM jurnal_umum a
					JOIN akun b ON (a.kode_akun=b.kode_akun)
					JOIN beban c ON (a.kode_akun=c.kode_akun)
					WHERE a.kode_akun like '5%' AND jenis_beban like '%Beban Administrasi Umum%'
					AND date_format(a.tgl_jurnal,'%m-%Y') = '".$waktu."'
					GROUP BY nama_akun,a.kode_akun,a.posisi_d_c
					ORDER BY posisi_d_c
				";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function getPendapatan($bulan,$tahun){
			$bulan = str_pad($bulan,2,"0",STR_PAD_LEFT);
			$waktu = $bulan."-".$tahun;
			$sql = "
					Select nama_akun,a.kode_akun,a.posisi_d_c,sum(a.nominal) as total
					FROM jurnal_umum a
					JOIN akun b ON (a.kode_akun=b.kode_akun)
					WHERE a.kode_akun like '4%' 
					AND date_format(a.tgl_jurnal,'%m-%Y') = '".$waktu."'
					GROUP BY nama_akun,a.kode_akun,a.posisi_d_c
					ORDER BY posisi_d_c
				";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function getBukuBesar($bulan,$tahun,$akun){
			$bulan = str_pad($bulan,2,"0",STR_PAD_LEFT);
			$waktu = $bulan."-".$tahun;
			$sql = "
					Select nama_akun,a.tgl_jurnal,a.kode_akun,a.posisi_d_c,a.nominal
					FROM jurnal_umum a
					JOIN akun b ON (a.kode_akun=b.kode_akun)
					WHERE a.kode_akun = ".$akun." 
					AND date_format(a.tgl_jurnal,'%m-%Y') = '".$waktu."'
					ORDER BY a.tgl_jurnal,id_transaksi
				";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function getTahun(){
			$sql = "
					SELECT tahun FROM
					(
						SELECT year(waktu_transaksi) as tahun 
						FROM pembelian
						UNION
						SELECT year(waktu) as tahun 
						FROM penjualan
					) x
					ORDER BY 1 ASC		
				";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
	}