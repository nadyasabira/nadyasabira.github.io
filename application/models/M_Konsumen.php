<?php

class M_Konsumen extends CI_Model{
	protected $_table = 'konsumen';

	public function lihat(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	// public function lihat_stok(){
	// 	$query = $this->db->get_where($this->_table, 'stok > 1');
	// 	return $query->result();
	// }
	public function getkonsumenid(){
		$sql = "SELECT (substring(IFNULL(MAX(id_konsumen),0),4)+0) as hsl FROM ".$this->_table;
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		foreach($hasil as $cacah):
			$jml_data = $cacah['hsl'];
		endforeach;
		$id = 'KN-';
		$nomor = str_pad(($jml_data+1),3,"0",STR_PAD_LEFT); //ID-001
		$id = $id.$nomor;
		return $id;
	}
 public function get_konsumen()
        	{
        		$query=$this->db->get('konsumen');
        		return $query->result_array();
			}

			public function getDataPelanggan()
			{
				return $this->db->get('konsumen');
			}
	public function getDataOrderByNama3($id_pesanan){
			$sql = "SELECT * ";
			$sql = $sql." FROM ".$this->_table;
			$sql = $sql." WHERE id_konsumen NOT IN ";
			$sql = $sql." (SELECT id_konsumen FROM detail_penjualan WHERE id_konsumen = '".$id_pesanan."') ";
			$sql = $sql." ORDER BY nama_konsumen ASC";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function getDataOrderByNama(){
			$this->db->order_by('nama_konsumen', 'ASC');
			$query = $this->db->get($this->_table);
			return $query->result_array();
		}

public function getDataEdit($id_konsumen){
				$sql = "SELECT * ";
				$sql=$sql."FROM ".$this->_table." WHERE id_konsumen = ".$this->db->escape($id_konsumen);
				$query = $this->db->query($sql);
				return $query->result_array();
			}

		
        public function updateFormInput($id_konsumen)
		{
			$post = $this->input->post();
			$this->id_konsumen = $post['id_konsumen'];			
			$this->nama_konsumen = $post["nama_konsumen"]; 
				$this->alamat = $post["alamat"]; 
				$this->no_telp = $post["no_telp"];
			// $this->stok = $post["stok"];
		
			$sql = "UPDATE ".$this->_table;
			$sql = $sql." SET nama_konsumen = ".$this->db->escape($this->nama_konsumen);
			$sql = $sql.", alamat= ".$this->db->escape($this->alamat);
			$sql = $sql.", no_telp= ".$this->db->escape($this->no_telp);
			$sql = $sql." WHERE id_konsumen = ".$this->db->escape($this->id_konsumen);
			$query = $this->db->query($sql);
			return $this->db->affected_rows();
		}
		// public function getDataOrderByNama(){
		// 	$this->db->order_by('nama', 'ASC');
		// 	$query = $this->db->get($this->_table);
		// 	return $query->result_array();
		// }
			

	public function lihat_id($id_konsumen){
		$query = $this->db->get_where($this->_table, ['id_konsumen' => $id_konsumen]);
		return $query->row();
	}

	public function lihat_nama($nama_konsumen){
		$query = $this->db->select('*');
		$query = $this->db->where(['nama' => $nama]);
		$query = $this->db->get($this->_table);
		return $query->row();
	}

	public function tambah($data){
		$simpan = $this->db->insert($this->_table, $data);
		if ($simpan){
			return 1;
		}else{
			return 0;
		}
	}

	// public function min_stok($stok, $nama){
	// 	$query = $this->db->set('stok', 'stok-' . $stok, false);
	// 	$query = $this->db->where('nama', $nama);
	// 	$query = $this->db->update($this->_table);
	// 	return $query;
	// }

	public function ubah($data, $id_konsumen){
		$simpan = $this->db->update('konsumen', $data, array('id_konsumen' => $id_konsumen));
		if ($simpan){
			return 1;
		}else{
			return 0;
		}
	}

	public function hapus($id_konsumen){
		$hapus = $this->db->delete($this->_table, ['id_konsumen' => $id_konsumen]);
		if ($hapus){
			return 1;
		}else{
			return 0;
		}
	}
}