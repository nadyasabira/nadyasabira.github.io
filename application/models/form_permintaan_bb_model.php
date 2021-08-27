<?php
	class form_permintaan_bb_model extends CI_Model {
		private $_table = "permintaan_bb";
		private $_table_detail = "detail_permintaan_bb";
		public $id_detail_permintaan_bb;
		public $id_bb;
		public $id_permintaan_bb;
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
			$data['permintaan'] = array('id_permintaan_bb' 		=> $post["id_permintaan_bb"],
											'datetimepicker' 	=> $post["datetimepicker"],
											'nama_bb' 			=> $post["nama_bb"],
											'jumlah' 		=> $post["jumlah"],
											'satuan' 			=> $post["satuan"],
										);
			$sql = "SELECT COUNT(*) as jml FROM permintaan_bb WHERE id_permintaan_bb = ".$this->db->escape($post["id_permintaan_bb"]);
			$query = $this->db->query($sql);
			$hasil = $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['jml'];
			endforeach;
			if($jml_data<1){
				$sql = "INSERT INTO permintaan_bb(id_permintaan_bb,tanggal)";
				$sql = $sql." VALUES(".$this->db->escape($post["id_permintaan_bb"]).",
									".$this->db->escape($post["datetimepicker"]).")";
				$query 	= $this->db->query($sql);
						
				$sql = "INSERT INTO detail_permintaan_bb(id_bb,jumlah,satuan,id_permintaan_bb) ";
				$sql = $sql." VALUES(".$this->db->escape($post["nama_bb"]);
				$sql = $sql.",".$this->db->escape($post["jumlah"]).",".$this->db->escape($post["satuan"]);
				$sql = $sql.",".$this->db->escape($post["id_permintaan_bb"]).")";
				$query = $this->db->query($sql);	
				return $this->db->affected_rows();
			}else{
				$sql = "INSERT INTO detail_permintaan_bb(id_bb,jumlah,satuan,id_permintaan_bb) ";
				$sql = $sql." VALUES(".$this->db->escape($post["nama_bb"]);
				$sql = $sql.",".$this->db->escape($post["jumlah"]).",".$this->db->escape($post["satuan"]);
				$sql = $sql.",".$this->db->escape($post["id_permintaan_bb"]).")";
				$query = $this->db->query($sql);
				return $this->db->affected_rows();
			}
		}
		public function getData(){
			$sql 	= "SELECT a.* FROM ".$this->_table." a ";
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}
		public function getData_Pemilik(){
			$sql 	= "SELECT a.* FROM ".$this->_table." a ";
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}	
		public function getDataDetail($id_permintaan_bb){
			$sql 	= "SELECT a.*,c.tanggal,b.nama_bb FROM ".$this->_table_detail." a ";
			$sql 	= $sql." JOIN bahan_baku b ON (a.id_bb=b.id_bb) ";
			$sql 	= $sql." JOIN permintaan_bb c ON (a.id_permintaan_bb=c.id_permintaan_bb) ";
			$sql 	= $sql." WHERE a.id_permintaan_bb = ".$this->db->escape($id_permintaan_bb);
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}	
		public function getPermintaanId(){
			$sql 	= "SELECT (substring(IFNULL(MAX(id_permintaan_bb),0),5)+0) as hsl FROM ".$this->_table;
			$query 	= $this->db->query($sql);
			$hasil 	= $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['hsl'];
			endforeach;
			$id 	= 'MBB-';
			$nomor 	= str_pad(($jml_data+1),9,"0",STR_PAD_LEFT); //FAK-000001
			$id 	= $id.$nomor;
			return $id;
		}	
		public function deleteFormInputDetail($id_detail){
			return $this->db->delete('detail_permintaan_bb', array("id_detail_permintaan_bb" => $id_detail));
		}		
	}
?>