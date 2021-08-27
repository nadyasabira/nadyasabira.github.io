<?php

    class M_Pembayaran extends CI_Model{
		private $_table = "pembayaran";
		private $_table_detail = "detail_penjualan";


        public function bayar($id_bayar,$id_konsumen)
	{
			date_default_timezone_set('Asia/Jakarta');
			$today = date('Y-m-d H:i:s');
			$sql = "UPDATE `pembayaran` SET `status` = 'lunas', `waktu_bayar`='$today' WHERE `pembayaran`.`no_nota` = '$id_bayar' and `pembayaran`.`id_konsumen`='$id_konsumen';";
			return $this->db->query($sql);
	}
	public function get_bayar()
        	{
        		$query=$this->db->get('pembayaran');
        		return $query->result_array();
			}

	public function getdataInfoPesanan()
	{
		$this->db->where('id_pesanan');
		return $this->db->get('pesanan');
	}
	public function getDataDetails($no_faktur){
		$sql = "SELECT a.*,b.nama_konsumen FROM ".$this->_table." a ";
		$sql = $sql." JOIN konsumen b ON (a.id_konsumen=b.id_konsumen) ";
		$sql = $sql." WHERE a.no_nota =".$this->db->escape($no_faktur);
		$query = $this->db->query($sql);
		
		return $query->result_array();
	}

	public function getDataDetail(){
			$sql = "SELECT a.*,c.nama_konsumen FROM ".$this->_table." a ";
			$sql = $sql." JOIN konsumen c ON (a.id_konsumen=c.id_konsumen) ";
			
			$query = $this->db->query($sql);
			
			return $query->result_array();
		}
    
    
    }
?>