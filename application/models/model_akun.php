<?php
class model_akun extends CI_Model {
	private $_table = "akun";
	// private $_table1 = "persediaan";
		
		public $kode_akun;
	
		public $nama_akun;
	
		public $header_akun ;

        public function __construct()
        {
                $this->load->database();
        }
   //      public function getSupplierId(){
			// 	$sql = "SELECT (substring(IFNULL(MAX(id),0),4)+0) as hsl FROM ".$this->_table;
			// 	$query = $this->db->query($sql);
			// 	$hasil = $query->result_array();
			// 	foreach($hasil as $cacah):
			// 		$jml_data = $cacah['hsl'];
			// 	endforeach;
			// 	$id = 'M-';
			// 	$nomor = str_pad(($jml_data+1),3,"0",STR_PAD_LEFT); //ID-001
			// 	$id = $id.$nomor;
			// 	return $id;
			// }

			// public function getakunId(){
			// 	$sql = "SELECT (substring(IFNULL(MAX(id_akun),0),4)+0) as hsl FROM ".$this->_table;
			// 	$query = $this->db->query($sql);
			// 	$hasil = $query->result_array();
			// 	foreach($hasil as $cacah):
			// 		$jml_data = $cacah['hsl'];
			// 	endforeach;
			// 	$id = 'M';
			// 	$nomor = str_pad(($jml_data+1),3,"0",STR_PAD_LEFT); //ID-001
			// 	$id = $id.$nomor;
			// 	return $id;
			// }
        public function get_akun()
        	{
        		$query=$this->db->get('akun');
        		return $query->result_array();
			}
			function getdataakun(){
			
				$sql = "SELECT a.*,b.nama_header FROM ".$this->_table." a ";
				$sql = $sql." JOIN header_akun b ON (a.header_akun=b.header_akun) ";
				// $sql = $sql." WHERE a.no_nota =".$this->db->escape($no_faktur);
				$query = $this->db->query($sql);
				
				return $query->result_array();
			}
			
			// public function getStokakun($idakun,$jml){
			// 	$sql = "
			// 				SELECT IF (".$jml." <= stok, 'ok', 'not ok') as Status_stok
			// 				FROM ".$this->_table."
			// 				WHERE id_akun = ".$this->db->escape($idakun)."
			// 	";
			// 	$query = $this->db->query($sql);
			// 	$hasil = $query->result_array();
			// 	foreach($hasil as $cacah):
			// 		$status = $cacah['Status_stok'];
			// 	endforeach;
			// 	return($status);
				
			// }
        public function fungsi_input_data(){
				$post = $this->input->post();
				$this->kode_akun =$post["kode_akun"]; 
				$this->nama_akun = $post["nama_akun"]; 
				$this->header_akun = $post["header_akun"]; 
				// $this->ukuran = $post["ukuran"];
				// $this->stok = $post["stok"];
			
			
			$sql = "INSERT INTO akun";
				$sql = $sql." VALUES(".$this->db->escape($this->kode_akun).",".$this->db->escape($this->nama_akun);
				$sql = $sql.",".$this->db->escape($this->header_akun).",)";
				$query = $this->db->query($sql);
				return $this->db->affected_rows();
		}
		public function getDataInput(){
				$query = $this->db->get('akun'); //SELECT * FROM form_input
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
			
			public function getDataEdit($id_akun){
				$sql = "SELECT * ";
				$sql=$sql."FROM ".$this->_table." WHERE id_akun = ".$this->db->escape($id_akun);
				$query = $this->db->query($sql);
				return $query->result_array();
			}

		
        public function updateFormInput($id_akun)
		{
			$post = $this->input->post();
			$this->id_akun = $post['id_akun'];			
			$this->nama = $post["nama"]; 
				$this->jenis = $post["jenis"]; 
				$this->ukuran = $post["ukuran"];
			// $this->stok = $post["stok"];
		
			$sql = "UPDATE ".$this->_table;
			$sql = $sql." SET kode_akun = ".$this->db->escape($this->kode_akun);
			$sql = $sql.", nama_akun= ".$this->db->escape($this->nama_akun);
			$sql = $sql.", header_akun= ".$this->db->escape($this->header_akun);
			$sql = $sql." WHERE kode_akun = ".$this->db->escape($this->kode_akun);
			$query = $this->db->query($sql);
			return $this->db->affected_rows();
		}
		public function getDataOrderByNama(){
			$this->db->order_by('nama_akun', 'ASC');
			$query = $this->db->get($this->_table);
			return $query->result_array();
		}
		
		//query buah yang tidak terdapat di tabel detail_pembelian
		// public function getDataOrderByNama2($no_faktur){
		// 	$sql = "SELECT * ";
		// 	$sql = $sql." FROM ".$this->_table;
		// 	$sql = $sql." WHERE id_akun NOT IN ";
		// 	$sql = $sql." (SELECT id_akun FROM detail_pembelian WHERE no_faktur = '".$no_faktur."') ";
		// 	$sql = $sql." ORDER BY nama ASC";
		// 	$query = $this->db->query($sql);
		// 	return $query->result_array();
		
	
		//query buah yang tidak terdapat di tabel detail_penjualan
		public function getDataOrderByNama3($no_faktur){
			$sql = "SELECT * ";
			$sql = $sql." FROM ".$this->_table;
			$sql = $sql." WHERE kode_akun NOT IN ";
			$sql = $sql." (SELECT kode_akun FROM detail_penjualan WHERE kode_akun = '".$no_faktur."') ";
			$sql = $sql." ORDER BY nama ASC";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		
		public function deleteFormInput($id)
		{
			return $this->db->delete('akun', array("id" => $id));
		}
		private function _uploadImage()
		{
			$config['upload_path']          = './upload/akun';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['file_name']			= uniqid();
			$config['overwrite']			= true;
			$config['max_size']             = 1024; // 1MB

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				return $this->upload->data("file_name");
			}
			
			return "default.jpg";
		}
		
		private function _deleteImage($id)
		{
			$buah = $this->getDataEdit($id);
			foreach($buah as $cacah):
				$gambar = $cacah['gambar'];
			endforeach;
			if ($gambar != "default.jpg")
			 {
				$filename = explode(".", $gambar);
				return array_map('unlink', glob(FCPATH."upload/gambar/".$filename[0].".*"));
			}
		}

		
	}
	?>
