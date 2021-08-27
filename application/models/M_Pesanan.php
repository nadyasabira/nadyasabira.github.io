<?php

    class M_Pesanan extends CI_Model{
		private $_table = "pesanan";
		private $_table_detail = "detail_penjualan";


    public function proses($id_pesanan,$id_konsumen)
	{
			date_default_timezone_set('Asia/Jakarta');
			$today = date('Y-m-d H:i:s');
			$sql = "UPDATE `pesanan` SET `status` = 'selesai', `waktu_selesai`='$today' WHERE `pesanan`.`id_pesanan` = '$id_pesanan' and `pesanan`.`id_konsumen`='$id_konsumen';";
			return $this->db->query($sql);
	}
	public function get_pesanan()
        	{
        		$query=$this->db->get('pesanan');
        		return $query->result_array();
			}

	public function getDataDetail(){
			$sql = "SELECT a.*,c.nama,b.nama_konsumen FROM ".$this->_table." a ";
			$sql = $sql." JOIN menu c ON (a.id_menu=c.id_menu) ";
			$sql = $sql." JOIN konsumen b ON (a.id_konsumen=b.id_konsumen) ";
			$query = $this->db->query($sql);
			
			return $query->result_array();
		}
		public function getDataOrderByNama3($no_faktur){
			$sql = "SELECT * ";
			$sql = $sql." FROM ".$this->_table;
			$sql = $sql." WHERE id_menu NOT IN ";
			$sql = $sql." (SELECT id_menu FROM detail_penjualan WHERE id_menu = '".$no_faktur."') ";
			$sql = $sql." ORDER BY nama ASC";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function getDataEdit($no_faktur,$id_konsumen){
			$sql = "SELECT a.*,b.nama_konsumen as nama_konsumen ";
			$sql = $sql." FROM ".$this->_table." a ";
			$sql = $sql." JOIN konsumen b ON (a.id_konsumen=b.id_konsumen) ";
			$sql = $sql." WHERE a.no_faktur= ".$this->db->escape($no_faktur);
			$sql = $sql." AND a.id_konsumen= ".$this->db->escape($id_konsumen);
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function updateFormInput($no_faktur,$id_konsumen)
		{
			$post = $this->input->post();
			$no_faktur_baru = $post["no_faktur"];
			$id_konsumen_baru = $post["id_konsumen"];
			$datetimepicker = $post["datetimepicker"];		
			
		
			
			$sql = "UPDATE ".$this->_table;
			$sql = $sql." SET no_faktur = ".$this->db->escape($no_faktur_baru).", id_konsumen= ".$this->db->escape($id_konsumen_baru);
			$sql = $sql." ,no_faktur = ".$this->db->escape($no_faktur_baru).", id_konsumen= ".$this->db->escape($id_konsumen_baru);
			$sql = $sql." ,waktu = ".$this->db->escape($datetimepicker).",dokumen=".$this->db->escape($this->doc);
			$sql = $sql." ,subtotal = ".$this->db->escape($subtotal);
			$sql = $sql." WHERE no_faktur = ".$this->db->escape($no_faktur)." AND id_konsumen = ".$this->db->escape($id_konsumen);
			$query = $this->db->query($sql);
			return $this->db->affected_rows();
		}
    
    
    }
?>