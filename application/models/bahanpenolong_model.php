<?php
	class bahanpenolong_model extends CI_Model {
		private $_table = "bahan_penolong";
		public $id_bp;
		public $nama_bp;
		public $satuan;
		public $harga_satuan;

	    public function __construct(){
	        $this->load->database();
		}
		public function getidbahanpenolong(){
			$sql 	= "SELECT (substring(IFNULL(MAX(id_bp),0),5)+0) as hsl FROM ".$this->_table;
			$query 	= $this->db->query($sql);
			$hasil 	= $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['hsl'];
			endforeach;
			$id 	= 'BP-';
			$nomor 	= str_pad(($jml_data+1),3,"0",STR_PAD_LEFT); //FAK-000001
			$id 	= $id.$nomor;
			return $id;
		}		
	    public function fungsi_input_data(){
			$post 			= $this->input->post();
			$this->id_bp 	= $this->getidbahanpenolong();
			$this->nama_bp 	= $post["nama_bp"]; 
			$this->satuan 	= $post["satuan"];
			$this->harga_satuan = $post["harga_satuan"];
			$sql = "INSERT INTO bahan_penolong(id_bp,nama_bp,satuan,harga_satuan)";
			$sql = $sql." VALUES(".$this->db->escape($this->id_bp).",".$this->db->escape($this->nama_bp);
			$sql = $sql.",".$this->db->escape($this->satuan).",".$this->db->escape($this->harga_satuan).")";
			$query 	= $this->db->query($sql);
			return $this->db->affected_rows();
		}
		public function getDataInput(){
			$query = $this->db->get('bahan_penolong'); //SELECT * FROM form_input
			return $query->result_array();
		}		
		public function getDataEdit($id_bp){
			$sql 	= "SELECT * ";
			$sql 	= $sql."FROM ".$this->_table." WHERE id_bp = ".$this->db->escape($id_bp);
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}
	   	public function updateFormInput($id){
			$post 			= $this->input->post();
			$this->id_bp 	= $post['id_bp'];
			$this->nama_bp 	= $post["nama_bp"];
			$this->satuan 	= $post["satuan"];
			$this->harga_satuan	= $post["harga_satuan"];			
			$sql 			= "UPDATE ".$this->_table;
			$sql 			= $sql." SET nama_bp = ".$this->db->escape($this->nama_bp);
			$sql 			= $sql.", satuan= ".$this->db->escape($this->satuan);
			$sql 			= $sql.", harga_satuan= ".$this->db->escape($this->harga_satuan);
			$sql 			= $sql." WHERE id_bp = ".$this->db->escape($this->id_bp);
			$query 			= $this->db->query($sql);
			return $this->db->affected_rows();
		}
		public function getDataOrderByNama(){
			$this->db->order_by('nama_bp', 'ASC');
			$query = $this->db->get($this->_table);
			return $query->result_array();
		}
		public function getDataOrderByNama2($no_faktur){
			$sql 	= "SELECT * ";
			$sql 	= $sql." FROM ".$this->_table;
			$sql 	= $sql." WHERE id_bp NOT IN ";
			$sql 	= $sql." (SELECT id_bp FROM detail_pembelian_bp WHERE no_faktur = '".$no_faktur."') ";
			$sql 	= $sql." ORDER BY nama_bp ASC";
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}
		public function getDataOrderByNama3($id_permintaan_bp){
			$sql 	= "SELECT * ";
			$sql 	= $sql." FROM ".$this->_table;
			$sql 	= $sql." WHERE id_bp NOT IN ";
			$sql 	= $sql." (SELECT id_bp FROM detail_permintaan_bp WHERE id_permintaan_bp = '".$id_permintaan_bp."') ";
			$sql 	= $sql." ORDER BY nama_bp ASC";
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}		
	}
?>