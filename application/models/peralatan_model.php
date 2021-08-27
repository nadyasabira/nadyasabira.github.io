<?php
	class peralatan_model extends CI_Model {
		private $_table = "peralatan";
		public $id_alat;
		public $nama_alat;
		public $satuan;
		public $harga_satuan;

	    public function __construct(){
	        $this->load->database();
		}
		public function getidperalatan(){
			$sql 	= "SELECT (substring(IFNULL(MAX(id_alat),0),5)+0) as hsl FROM ".$this->_table;
			$query 	= $this->db->query($sql);
			$hasil 	= $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['hsl'];
			endforeach;
			$id 	= 'PA-';
			$nomor 	= str_pad(($jml_data+1),3,"0",STR_PAD_LEFT); //FAK-000001
			$id 	= $id.$nomor;
			return $id;
		}
	    public function get_peralatan(){
	        $query=$this->db->get('peralatan');
	        return $query->result_array();
		}		
	    public function fungsi_input_data(){
			$post 			= $this->input->post();
			$this->id_alat 	= $this->getidperalatan();
			$this->nama_alat = $post["nama_alat"]; 
			$this->satuan 	= $post["satuan"];
			$this->harga_satuan = $post["harga_satuan"];
			$sql = "INSERT INTO peralatan(id_alat,nama_alat,satuan,harga_satuan)";
			$sql = $sql." VALUES(".$this->db->escape($this->id_alat).",".$this->db->escape($this->nama_alat);
			$sql = $sql.",".$this->db->escape($this->satuan).",".$this->db->escape($this->harga_satuan).")";
			$query = $this->db->query($sql);
			return $this->db->affected_rows();
		}
		public function getDataInput(){
			$query = $this->db->get('peralatan'); //SELECT * FROM form_input
			return $query->result_array();
		}		
		public function getDataEdit($id_alat){
			$sql 	= "SELECT * ";
			$sql 	= $sql."FROM ".$this->_table." WHERE id_alat = ".$this->db->escape($id_alat);
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}
	   	public function updateFormInput($id){
			$post 			= $this->input->post();
			$this->id_alat 	= $post['id_alat'];
			$this->nama_alat = $post["nama_alat"];
			$this->satuan 	= $post["satuan"];
			$this->harga_satuan	= $post["harga_satuan"];			
			$sql 			= "UPDATE ".$this->_table;
			$sql 			= $sql." SET nama_alat = ".$this->db->escape($this->nama_alat);
			$sql 			= $sql.", satuan= ".$this->db->escape($this->satuan);
			$sql 			= $sql.", harga_satuan= ".$this->db->escape($this->harga_satuan);
			$sql 			= $sql." WHERE id_alat = ".$this->db->escape($this->id_alat);
			$query 			= $this->db->query($sql);
			return $this->db->affected_rows();
		}
		public function getDataOrderByNama(){
			$this->db->order_by('nama_alat', 'ASC');
			$query = $this->db->get($this->_table);
			return $query->result_array();
		}
		public function getDataOrderByNama2($no_faktur){
			$sql 	= "SELECT * ";
			$sql 	= $sql." FROM ".$this->_table;
			$sql 	= $sql." WHERE id_alat NOT IN ";
			$sql 	= $sql." (SELECT id_alat FROM detail_pembelian_alat WHERE no_faktur = '".$no_faktur."') ";
			$sql 	= $sql." ORDER BY nama_alat ASC";
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}		
	}
?>