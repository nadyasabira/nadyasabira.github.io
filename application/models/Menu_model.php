<?php
class Menu_model extends CI_Model {
	private $_table = "menu";
	private $_tableukuran = "kategori_menu";
	private $_tableharga = "barang_harga";
	
	// private $_table1 = "persediaan";
		
		public $id;
		// public $tgl_buat;
		// public $tgl_habis;
		public $nama;
		public $gambar="default.jpg";
		public $harga ;

        public function __construct()
        {
                $this->load->database();
        }
        public function getSupplierId(){
				$sql = "SELECT (substring(IFNULL(MAX(id),0),4)+0) as hsl FROM ".$this->_table;
				$query = $this->db->query($sql);
				$hasil = $query->result_array();
				foreach($hasil as $cacah):
					$jml_data = $cacah['hsl'];
				endforeach;
				$id = 'M-';
				$nomor = str_pad(($jml_data+1),3,"0",STR_PAD_LEFT); //ID-001
				$id = $id.$nomor;
				return $id;
			}
	public function getMenuid(){
		$sql = "SELECT (substring(IFNULL(MAX(id_menu),0),4)+0) as hsl FROM ".$this->_table;
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		foreach($hasil as $cacah):
			$jml_data = $cacah['hsl'];
		endforeach;
		$id = 'M';
		$nomor = str_pad(($jml_data+1),3,"0",STR_PAD_LEFT); //ID-001
		$id = $id.$nomor;
		return $id;
	}
	public function getHargaid(){
		$sql = "SELECT (substring(IFNULL(MAX(kode_harga),0),4)+0) as hsl FROM ".$this->_tableharga;
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		foreach($hasil as $cacah):
			$jml_data = $cacah['hsl'];
		endforeach;
		$id = 'KH-';
		$nomor = str_pad(($jml_data+1),3,"0",STR_PAD_LEFT); //ID-001
		$id = $id.$nomor;
		return $id;
	}
        public function get_menu()
        	{
        		$query=$this->db->get('menu');
        		return $query->result_array();
			}
			
		//   public function get_menu()
        // 	{
        // 		$query=$this->db->get('barang_harga');
        // 		return $query->result_array();
		// 	}
			// public function getStokMenu($idmenu,$jml){
			// 	$sql = "
			// 				SELECT IF (".$jml." <= stok, 'ok', 'not ok') as Status_stok
			// 				FROM ".$this->_table."
			// 				WHERE id_menu = ".$this->db->escape($idmenu)."
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
				$this->id_menu = $this->getmenuId();
			
				$this->nama = $post["nama"]; 
				$this->jenis = $post["jenis"]; 
				$this->ukuran = $post["ukuran"];
				// $this->stok = $post["stok"];
			
			
			$sql = "INSERT INTO menu";
				$sql = $sql." VALUES(".$this->db->escape($this->id_menu).",".$this->db->escape($this->nama);
				$sql = $sql.",".$this->db->escape($this->jenis);
				$sql = $sql.",".$this->db->escape($this->ukuran).",0)";
				$query = $this->db->query($sql);
				return $this->db->affected_rows();
		}
		public function tambah($data){
		$simpan = $this->db->insert($this->_table, $data);
		if ($simpan){
			return 1;
		}else{
			return 0;
		}
	}

	public function tambah_harga($data){
		$simpan = $this->db->insert($this->_tableharga, $data);
		if ($simpan){
			return 1;
		}else{
			return 0;
		}
	}
		public function getDataInput(){
				$query = $this->db->get('menu'); //SELECT * FROM form_input
				return $query->result_array();
			}
			
			public function getDataEdit($id_menu){
				$sql = "SELECT * ";
				$sql=$sql."FROM ".$this->_table." WHERE id_menu = ".$this->db->escape($id_menu);
				$query = $this->db->query($sql);
				return $query->result_array();
			}

		
        public function updateFormInput($id_menu)
		{
			$post = $this->input->post();
			$this->id_menu = $post['id_menu'];			
			$this->nama = $post["nama"]; 
				// $this->jenis = $post["jenis"]; 
				// $this->ukuran = $post["ukuran"];
			// $this->stok = $post["stok"];
		
			$sql = "UPDATE ".$this->_table;
			$sql = $sql." SET nama = ".$this->db->escape($this->nama);
			$sql = $sql." WHERE id_menu = ".$this->db->escape($this->id_menu);
			$query = $this->db->query($sql);
			return $this->db->affected_rows();
		}
		public function getDataOrderByNama(){
			$this->db->order_by('nama', 'ASC');
			$query = $this->db->get($this->_table);
			return $query->result_array();
		}
		
		public function getDataEditHarga($kode_harga){
				$sql = "SELECT * ";
				$sql=$sql."FROM ".$this->_tableharga." WHERE kode_harga = ".$this->db->escape($kode_harga);
				$query = $this->db->query($sql);
				return $query->result_array();
			}

		
        public function updateFormInputHarga($kode_harga)
		{
			$post = $this->input->post();
			$this->kode_harga = $post['kode_harga'];			
			// $this->id_menu = $post["id_menu"]; 
			// $this->id_kategori = $post["id_kategori"]; 
			// $this->satuan = $post["satuan"]; 
			// $this->harga = $post["harga"];
		
			$sql = "UPDATE ".$this->_tableharga;
			// $sql = $sql." SET kode_harga = ".$this->db->escape($this->kode_harga);
			// $sql = $sql.", id_kategori= ".$this->db->escape($this->ukuran);
			// $sql = $sql.", satuan= ".$this->db->escape($this->satuan);
			$sql = $sql." SET harga = ".$this->db->escape($this->harga);
			// $sql = $sql.",harga= ".$this->db->escape($this->harga);
			// $sql = $sql." WHERE kode_harga = ".$this->db->escape($this->kode_harga);
			$query = $this->db->query($sql);
			return $this->db->affected_rows();
		}
		
		// public function getDataOrderByNama(){
		// 	$this->db->order_by('nama', 'ASC');
		// 	$query = $this->db->get($this->_table);
		// 	return $query->result_array();
		// }
		//query buah yang tidak terdapat di tabel detail_pembelian
		public function getDataOrderByNama2($no_faktur){
			$sql = "SELECT * ";
			$sql = $sql." FROM ".$this->_table;
			$sql = $sql." WHERE id_menu NOT IN ";
			$sql = $sql." (SELECT id_menu FROM barang_harga WHERE id_menu = '".$id_menu."') ";
			$sql = $sql." ORDER BY nama ASC";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		
		//query buah yang tidak terdapat di tabel detail_penjualan
		public function getDataOrderByNama3($id_pesanan){
			$sql = "SELECT * ";
			$sql = $sql." FROM ".$this->_table;
			$sql = $sql." WHERE id_menu NOT IN ";
			$sql = $sql." (SELECT id_menu FROM detail_penjualan WHERE id_menu = '".$id_pesanan."') ";
			$sql = $sql." ORDER BY nama ASC";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function getDataOrderByNama4(){
			$sql = "SELECT * ";
			$sql = $sql." FROM ".$this->_table;
			$sql = $sql." WHERE id_menu NOT IN ";
			$sql = $sql." (SELECT id_menu FROM bom) ";
			$sql = $sql." ORDER BY nama ASC";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function deleteFormInput($id)
		{
			return $this->db->delete('menu', array("id" => $id));
		}

		function getdataharga(){
			// $this->db->join('menu','barang_harga.id_menu=menu.id_menu');
			// return $this->db->get('barang_harga');

			$sql = "SELECT a.*,b.nama,c.nama_kategori,c.satuan FROM ".$this->_tableharga." a ";
			$sql = $sql." JOIN menu b ON (a.id_menu=b.id_menu) ";
			$sql = $sql." JOIN kategori_menu c ON (a.id_kategori=c.id_kategori) ";
			// $sql = $sql." WHERE a.no_nota =".$this->db->escape($no_faktur);
			$query = $this->db->query($sql);
			
			return $query->result_array();
		}
		public function getDataOrderByNamaHarga(){
			$this->db->order_by('kode_harga', 'ASC');
			$query = $this->db->get($this->_tableharga);
			return $query->result_array();
		}
		
		private function _uploadImage()
		{
			$config['upload_path']          = './upload/menu';
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
