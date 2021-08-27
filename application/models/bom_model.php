<?php
	class bom_model extends CI_Model {
		private $_table = "bom";
		private $_table_detail = "detail_bom";
		public $id_bom;
		public $id_bb;
		public $id_menu;
		public $satuan_bom;
		public $jumlah;

		public function __construct(){
			$this->load->database();
			$this->load->helper(array('form', 'url')); 
			$this->load->library('form_validation');
		}
		public function fungsi_input_data(){
			$post = $this->input->post();
			$data['bom'] = array('id_bom' => $post["id_bom"],
								'id_menu' => $post["id_menu"],
								'nama_bb' => $post["nama_bb"],
								'jumlah' => $post["jumlah"],
								'satuan_bom' => $post["satuan_bom"],
								);
			//cek dulu apakah sudah ada
			$sql = "SELECT COUNT(*) as jml FROM bom WHERE id_bom = ".$this->db->escape($post["id_bom"]);
			$query = $this->db->query($sql);
			$hasil = $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['jml'];
			endforeach;
			//jumlah data 0 berarti belum ada datanya, maka dimasukkan ke tabel
			if($jml_data<1){
				//insert ke tabel pembelian dulu
				$sql = "INSERT INTO bom(id_bom,id_menu)";
				$sql = $sql." VALUES(".$this->db->escape($post["id_bom"]).",
									".$this->db->escape($post["id_menu"]).")";
				$query 	= $this->db->query($sql);
						
				//insert ke tabel detail pembelian
				$sql 	= "INSERT INTO detail_bom(id_bom,id_bb,jumlah,satuan_bom) ";
				$sql 	= $sql." VALUES(".$this->db->escape($post["id_bom"]);
				$sql 	= $sql.",".$this->db->escape($post["nama_bb"]).",".$this->db->escape($post["jumlah"]);
				$sql 	= $sql.",".$this->db->escape($post["satuan_bom"]).")";
				$query 	= $this->db->query($sql);	
						
				return $this->db->affected_rows();
			}else{
				//insert ke tabel detail pembelian
				$sql 	= "INSERT INTO detail_bom(id_bom,id_bb,jumlah,satuan_bom) ";
				$sql 	= $sql." VALUES(".$this->db->escape($post["id_bom"]);
				$sql 	= $sql.",".$this->db->escape($post["nama_bb"]).",".$this->db->escape($post["jumlah"]);
				$sql 	= $sql.",".$this->db->escape($post["satuan_bom"]).")";
				$query 	= $this->db->query($sql);	
				return $this->db->affected_rows();
			}
		}	
		public function getDataByIdBom($id_bom){
			$sql 	= "SELECT a.* FROM ".$this->_table." a ";
			$sql 	= $sql." WHERE a.id_bom =  ".$this->db->escape($id_bom);
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}
		public function getData(){
			$sql 	= "SELECT a.*,b.nama FROM ".$this->_table." a ";
			$sql 	= $sql." JOIN menu b ON (a.id_menu=b.id_menu) ";
			$sql 	= $sql." ORDER BY id_bom";
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}
		public function getData_Produksi(){
			$sql 	= "SELECT a.* FROM ".$this->_table." a ";
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}		
		public function getDataDetail($id_bom){
			$sql 	= "SELECT a.*,d.nama,b.nama_bb FROM ".$this->_table_detail." a ";
			$sql 	= $sql." JOIN bahan_baku b ON (a.id_bb=b.id_bb) ";
			$sql 	= $sql." JOIN bom c ON (a.id_bom=c.id_bom) ";
			$sql 	= $sql." JOIN menu d ON (c.id_menu=d.id_menu) ";
			$sql 	= $sql." WHERE a.id_bom = ".$this->db->escape($id_bom);
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}
		public function getBomId(){
			$sql 	= "SELECT (substring(IFNULL(MAX(id_bom),0),5)+0) as hsl FROM ".$this->_table;
			$query 	= $this->db->query($sql);
			$hasil 	= $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['hsl'];
			endforeach;
			$id 	= 'BOM-';
			$nomor 	= str_pad(($jml_data+1),3,"0",STR_PAD_LEFT); //FAK-000001
			$id 	= $id.$nomor;
			return $id;
		}	
		public function deleteFormInputDetail($id_detail){
			return $this->db->delete('detail_bom', array("id_detail" => $id_detail));
		}
		public function getDataDetail1($id_bom,$id_menu){
			$sql = "SELECT a.*,b.nama_bb,d.nama FROM " . $this->_table_detail . " a ";
			$sql = $sql . " JOIN bahan_baku b ON (a.id_bb=b.id_bb) ";
			$sql = $sql . " JOIN bom c ON (a.id_bom=c.id_bom) ";
			$sql = $sql . " JOIN menu d ON (c.id_menu=d.id_menu) ";
			$sql = $sql . " WHERE a.id_bom =  '" . $id_bom . "' AND c.id_menu = " . $this->db->escape($id_menu);
			$query = $this->db->query($sql);
			return $query->result_array();
		}
	}
?>