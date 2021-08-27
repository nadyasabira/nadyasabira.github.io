<?php
class beban_model extends CI_Model {
	private $_table = "beban";
	private $_table_akun = "akun";
	
	
	// private $_table1 = "persediaan";
		
		public $kode_akun;
		// public $tgl_buat;
		// public $tgl_habis;
		public $nama_beban;
		

        public function __construct()
        {
                $this->load->database();
        }

        public function getbebanid(){
            $sql = "SELECT (substring(IFNULL(MAX(kode_akun),0),3)+0) as hsl FROM ".$this->_table;
            $query = $this->db->query($sql);
            $hasil = $query->result_array();
            foreach($hasil as $cacah):
                $jml_data = $cacah['hsl'];
            endforeach;
            $id = '51';
            $nomor = str_pad(($jml_data+1),1,"0",STR_PAD_LEFT); //ID-001
            $id = $id.$nomor;
            return $id;
        }

        public function get_beban()
        	{
        		$query=$this->db->get('beban');
        		return $query->result_array();
			}

			//query buah yang tidak terdapat di tabel detail_penjualan
		public function getDataOrderByNama3($idtransaksi){
			$sql = "SELECT * ";
			$sql = $sql." FROM ".$this->_table;
			$sql = $sql." WHERE kode_akun NOT IN ";
			$sql = $sql." (SELECT kode_akun FROM transaksi_beban WHERE kode_akun = '".$idtransaksi."') ";
			$sql = $sql." ORDER BY nama_beban ASC";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		
			
		//   public function get_beban()
        // 	{
        // 		$query=$this->db->get('barang_harga');
        // 		return $query->result_array();
		// 	}
			// public function getStokbeban($idbeban,$jml){
			// 	$sql = "
			// 				SELECT IF (".$jml." <= stok, 'ok', 'not ok') as Status_stok
			// 				FROM ".$this->_table."
			// 				WHERE kode_akun = ".$this->db->escape($idbeban)."
			// 	";
			// 	$query = $this->db->query($sql);
			// 	$hasil = $query->result_array();
			// 	foreach($hasil as $cacah):
			// 		$status = $cacah['Status_stok'];
			// 	endforeach;
			// 	return($status);
				
			// }
      
		public function tambah($data){
		$simpan = $this->db->insert($this->_table, $data);
		if ($simpan){
			return 1;
		}else{
			return 0;
		}
	}
	public function tambah_akun($data){
		$simpan2 = $this->db->insert($this->_table_akun, $data);
		if ($simpan2){
			return 1;
		}else{
			return 0;
		}
	}

			
			public function getDataEdit($kode_akun){
				$sql = "SELECT * ";
				$sql=$sql."FROM ".$this->_table." WHERE kode_akun = ".$this->db->escape($kode_akun);
				$query = $this->db->query($sql);
				return $query->result_array();
			}

		
        public function updateFormInput($kode_akun)
		{
			$post = $this->input->post();
			$this->kode_akun = $post['kode_akun'];			
			$this->nama_beban = $post["nama_beban"]; 
			$this->jenis_beban = $post["jenis_beban"]; 
				// $this->ukuran = $post["ukuran"];
			// $this->stok = $post["stok"];
		
			$sql = "UPDATE ".$this->_table;
			$sql = $sql." SET nama_beban = ".$this->db->escape($this->nama_beban);
			$sql = $sql.", jenis_beban= ".$this->db->escape($this->jenis_beban);
			$sql = $sql." WHERE kode_akun = ".$this->db->escape($this->kode_akun);
			$query = $this->db->query($sql);
			return $this->db->affected_rows();
		}
		public function getDataOrderByNama(){
			$this->db->order_by('nama_beban', 'ASC');
			$query = $this->db->get($this->_table);
			return $query->result_array();
		}
		
	
		public function getDataOrderByNama2($no_faktur){
			$sql = "SELECT * ";
			$sql = $sql." FROM ".$this->_table;
			$sql = $sql." WHERE kode_akun NOT IN ";
			$sql = $sql." (SELECT kode_akun FROM barang_harga WHERE kode_akun = '".$kode_akun."') ";
			$sql = $sql." ORDER BY nama ASC";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		
		//query buah yang tidak terdapat di tabel detail_penjualan
		// public function getDataOrderByNama3($no_faktur){
		// 	$sql = "SELECT * ";
		// 	$sql = $sql." FROM ".$this->_table;
		// 	$sql = $sql." WHERE kode_akun NOT IN ";
		// 	$sql = $sql." (SELECT kode_akun FROM detail_penjualan WHERE kode_akun = '".$no_faktur."') ";
		// 	$sql = $sql." ORDER BY nama ASC";
		// 	$query = $this->db->query($sql);
		// 	return $query->result_array();
		// }
		
		public function deleteFormInput($id)
		{
			return $this->db->delete('beban', array("kode_akun" => $kode_akun));
		}

		

		
	}
	?>
