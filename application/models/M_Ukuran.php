<?php

class M_Ukuran extends CI_Model{
	protected $_table = 'kategori_menu';

	public function lihat(){
		
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}
	public function getukuranid(){
		$sql = "SELECT (substring(IFNULL(MAX(id_kategori),0),4)+0) as hsl FROM ".$this->_table;
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		foreach($hasil as $cacah):
			$jml_data = $cacah['hsl'];
		endforeach;
		$id = 'UK-';
		$nomor = str_pad(($jml_data+1),3,"0",STR_PAD_LEFT); //ID-001
		$id = $id.$nomor;
		return $id;
	}
	public function get_ukuran()
        	{
        		$query=$this->db->get('kategori_menu');
        		return $query->result_array();
			}
	// public function getDataOrderByNama(){
	// 		$this->db->order_by('nama_kategori', 'ASC');
	// 		$query = $this->db->get($this->_table);
	// 		return $query->result_array();
	// 	}
	public function getDataOrderByNama3($no_faktur){
		$sql = "SELECT * ";
		$sql = $sql." FROM ".$this->_table;
		$sql = $sql." WHERE id_kategori NOT IN ";
		$sql = $sql." (SELECT id_kategori FROM detail_penjualan WHERE id_kategori = '".$no_faktur."') ";
		$sql = $sql." ORDER BY nama_kategori ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// public function lihat_stok(){
	// 	$query = $this->db->get_where($this->_table, 'stok > 1');
	// 	return $query->result();
	// }

	public function lihat_id($id_kategori){
		$query = $this->db->get_where($this->_table, ['id_kategori' => $id_kategori]);
		return $query->row();
	}

	public function lihat_nama($nama_kategori){
		$query = $this->db->select('*');
		$query = $this->db->where(['nama_kategori' => $nama_kategori]);
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
    
    public function getDataOrderByNama(){
        $this->db->order_by('nama_kategori', 'ASC');
        $query = $this->db->get($this->_table); 
        return $query->result_array();
    }

	public function min_stok($stok, $nama_kategori){
		$query = $this->db->set('stok', 'stok-' . $stok, false);
		$query = $this->db->where('nama_kategori', $nama_kategori);
		$query = $this->db->update($this->_table);
		return $query;
	}

		public function getDataEdit($id_kategori){
				$sql = "SELECT * ";
				$sql=$sql."FROM ".$this->_table." WHERE id_kategori = ".$this->db->escape($id_kategori);
				$query = $this->db->query($sql);
				return $query->result_array();
			}
		public function updateFormInput($id_kategori)
		{
			$post = $this->input->post();
			$this->id_kategori = $post['id_kategori'];			
			$this->nama_kategori = $post["nama_kategori"]; 
			$this->satuan = $post["satuan"]; 
			// $this->stok = $post["stok"];
		
			$sql = "UPDATE ".$this->_table;
			$sql = $sql." SET id_kategori = ".$this->db->escape($this->id_kategori);
			$sql = $sql.", nama_kategori= ".$this->db->escape($this->nama_kategori);
			$sql = $sql.", satuan= ".$this->db->escape($this->satuan);
			$sql = $sql." WHERE id_kategori = ".$this->db->escape($this->id_kategori);
			$query = $this->db->query($sql);
			return $this->db->affected_rows();
		}

	public function hapus($id_kategori){
		return $this->db->delete($this->_table, ['id_kategori' => $id_kategori]);
    }
    
	// public function getDataOrderByNama(){
	// 	$this->db->order_by('nama_kategori', 'ASC');
	// 	$query = $this->db->get($this->_table);
	// 	return $query->result_array();
	// }
	
	//query buah yang tidak terdapat di tabel detail_pembelian
	public function getDataOrderByNama2($no_nota){
		$sql = "SELECT * ";
		$sql = $sql." FROM ".$this->_table;
		$sql = $sql." WHERE id_kategori NOT IN ";
		$sql = $sql." (SELECT id_kategori FROM detail_pembelian WHERE no_nota = '".$no_nota."') ";
		$sql = $sql." ORDER BY nama ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	

}