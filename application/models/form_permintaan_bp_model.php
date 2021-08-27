<?php
	class form_permintaan_bp_model extends CI_Model {
		private $_table = "permintaan_bp";
		private $_table_detail = "detail_permintaan_bp";
		public $id_detail_permintaan_bp;
		public $id_bp;
		public $id_permintaan_bp;
		public $tanggal;
		public $satuan;
		public $jumlah;

		public function __construct(){
			$this->load->database();
			$this->load->helper(array('form', 'url')); 
			$this->load->library('form_validation');
		}
		public function fungsi_input_data(){
			$post = $this->input->post();
			$data['permintaan'] = array('id_permintaan_bp' 		=> $post["id_permintaan_bp"],
											'datetimepicker' 	=> $post["datetimepicker"],
											'nama_bp' 			=> $post["nama_bp"],
											'jumlah' 			=> $post["jumlah"],
											'satuan' 			=> $post["satuan"]
										);
			$sql = "SELECT COUNT(*) as jml FROM permintaan_bp WHERE id_permintaan_bp = ".$this->db->escape($post["id_permintaan_bp"]);
			$query = $this->db->query($sql);
			$hasil = $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['jml'];
			endforeach;
			if($jml_data<1){
				$sql = "INSERT INTO permintaan_bp(id_permintaan_bp,tanggal)";
				$sql = $sql." VALUES(".$this->db->escape($post["id_permintaan_bp"]).",
									".$this->db->escape($post["datetimepicker"]).")";
				$query 	= $this->db->query($sql);
						
				$sql = "INSERT INTO detail_permintaan_bp(id_bp,jumlah,satuan,id_permintaan_bp) ";
				$sql = $sql." VALUES(".$this->db->escape($post["nama_bp"]);
				$sql = $sql.",".$this->db->escape($post["jumlah"]).",".$this->db->escape($post["satuan"]);
				$sql = $sql.",".$this->db->escape($post["id_permintaan_bp"]).")";
				$query = $this->db->query($sql);			
				return $this->db->affected_rows();
			}else{
				$sql = "INSERT INTO detail_permintaan_bp(id_bp,jumlah,satuan,id_permintaan_bp) ";
				$sql = $sql." VALUES(".$this->db->escape($post["nama_bp"]);
				$sql = $sql.",".$this->db->escape($post["jumlah"]).",".$this->db->escape($post["satuan"]);
				$sql = $sql.",".$this->db->escape($post["id_permintaan_bp"]).")";
				$query = $this->db->query($sql);
				return $this->db->affected_rows();
			}
		}	
		public function getData(){
			$sql 	= "SELECT a.* FROM ".$this->_table." a ";
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}
		public function getData_pemilik(){
			$sql 	= "SELECT a.* FROM ".$this->_table." a ";
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}
		public function getDataDetail($id_permintaan_bp){
			$sql 	= "SELECT a.*,c.tanggal,b.nama_bp FROM ".$this->_table_detail." a ";
			$sql 	= $sql." JOIN bahan_penolong b ON (a.id_bp=b.id_bp) ";
			$sql 	= $sql." JOIN permintaan_bp c ON (a.id_permintaan_bp=c.id_permintaan_bp) ";
			$sql 	= $sql." WHERE a.id_permintaan_bp = ".$this->db->escape($id_permintaan_bp);
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}
		public function getPermintaanId(){
			$sql 	= "SELECT (substring(IFNULL(MAX(id_permintaan_bp),0),5)+0) as hsl FROM ".$this->_table;
			$query 	= $this->db->query($sql);
			$hasil 	= $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['hsl'];
			endforeach;
			$id 	= 'MBP-';
			$nomor 	= str_pad(($jml_data+1),9,"0",STR_PAD_LEFT); //FAK-000001
			$id 	= $id.$nomor;
			return $id;
		}		
		public function deleteFormInputDetail($id_detail){
			return $this->db->delete('detail_permintaan_bp', array("id_detail_permintaan_bp" => $id_detail));
		}		
	}
?>