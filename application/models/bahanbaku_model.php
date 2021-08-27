<?php
	class bahanbaku_model extends CI_Model {
		private $_table = "bahan_baku";
		public $id_bb;
		public $nama_bb;
		public $satuan;
		public $harga_satuan;

	    public function __construct(){
	        $this->load->database();
		}
		public function getidbahanbaku(){
			$sql 	= "SELECT (substring(IFNULL(MAX(id_bb),0),5)+0) as hsl FROM ".$this->_table;
			$query 	= $this->db->query($sql);
			$hasil 	= $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['hsl'];
			endforeach;
			$id 	= 'BB-';
			$nomor 	= str_pad(($jml_data+1),3,"0",STR_PAD_LEFT); //FAK-000001
			$id 	= $id.$nomor;
			return $id;
		}	
	    public function fungsi_input_data(){
			$post 			= $this->input->post();
			$this->id_bb 	= $this->getidbahanbaku();
			$this->nama_bb 	= $post["nama_bb"]; 
			$this->satuan 	= $post["satuan"];
			$this->harga_satuan = $post["harga_satuan"];
			$sql = "INSERT INTO bahan_baku(id_bb,nama_bb,satuan,harga_satuan)";
			$sql = $sql." VALUES(".$this->db->escape($this->id_bb).",".$this->db->escape($this->nama_bb);
			$sql = $sql.",".$this->db->escape($this->satuan).",".$this->db->escape($this->harga_satuan).")";
			$query 	= $this->db->query($sql);
			return $this->db->affected_rows();
		}
		public function getDataInput(){
			$query = $this->db->get('bahan_baku'); 
			return $query->result_array();
		}	
		public function getDataEdit($id_bb){
			$sql 	= "SELECT * ";
			$sql 	= $sql."FROM ".$this->_table." WHERE id_bb = ".$this->db->escape($id_bb);
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}
	   	public function updateFormInput($id){
			$post 			= $this->input->post();
			$this->id_bb 	= $post['id_bb'];
			$this->nama_bb 	= $post["nama_bb"];
			$this->satuan 	= $post["satuan"];
			$this->harga_satuan	= $post["harga_satuan"];			
			$sql 			= "UPDATE ".$this->_table;
			$sql 			= $sql." SET nama_bb = ".$this->db->escape($this->nama_bb);
			$sql 			= $sql.", satuan= ".$this->db->escape($this->satuan);
			$sql 			= $sql.", harga_satuan= ".$this->db->escape($this->harga_satuan);
			$sql 			= $sql." WHERE id_bb = ".$this->db->escape($this->id_bb);
			$query 			= $this->db->query($sql);
			return $this->db->affected_rows();
		}
		public function getDataOrderByNama(){
			$this->db->order_by('nama_bb', 'ASC');
			$query = $this->db->get($this->_table);
			return $query->result_array();
		}
		public function getDataOrderByNama2($no_faktur){
			$sql 	= "SELECT * ";
			$sql 	= $sql." FROM ".$this->_table;
			$sql 	= $sql." WHERE id_bb NOT IN ";
			$sql 	= $sql." (SELECT id_bb FROM detail_pembelian WHERE no_faktur = '".$no_faktur."') ";
			$sql 	= $sql." ORDER BY nama_bb ASC";
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}
		public function getDataOrderByNama3($id_permintaan_bb){
			$sql 	= "SELECT * ";
			$sql 	= $sql." FROM ".$this->_table;
			$sql 	= $sql." WHERE id_bb NOT IN ";
			$sql 	= $sql." (SELECT id_bb FROM detail_permintaan_bb WHERE id_permintaan_bb = '".$id_permintaan_bb."') ";
			$sql 	= $sql." ORDER BY nama_bb ASC";
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}
		public function getDataOrderByNama4($id_bom){
			$sql 	= "SELECT * ";
			$sql 	= $sql." FROM ".$this->_table;
			$sql 	= $sql." WHERE id_bb NOT IN ";
			$sql 	= $sql." (SELECT id_bb FROM detail_bom WHERE id_bom = '".$id_bom."') ";
			$sql 	= $sql." ORDER BY nama_bb ASC";
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}	
		public function getDataBB($id_bb){
	        $this->db->select('*');
	        $this->db->from('bahan_baku');
	        $query = $this->db->get();
	        if ($query->num_rows() != 0) {
	            return $query->row();
	        } else {
	            return false;
	        }
    	}	
    	public function getNamaBB1(){
        	return $this->db->get($this->_table)->result();
    	}
	}
?>