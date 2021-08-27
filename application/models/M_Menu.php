<?php

class M_Menu extends CI_Model{
	protected $_table = 'menu';

	public function lihat(){
		
		$query = $this->db->get($this->_table);
		// $this->db->join('kategori_menu', 'menu.id_kategori = kategori_menu.id_kategori');
		return $query->result();
		
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}
	public function getMenuid(){
		$sql = "SELECT (substring(IFNULL(MAX(id_menu),0),4)+0) as hsl FROM ".$this->_table;
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		foreach($hasil as $cacah):
			$jml_data = $cacah['hsl'];
		endforeach;
		$id = 'M';
		$nomor = str_pad(($jml_data+1),3,"0",STR_PAD_LEFT); //ID-001
		$id = $id.$nomor;
		return $id;
	}

	public function lihat_stok(){
		$query = $this->db->get_where($this->_table, 'stok > 1');
		return $query->result();
	}

	public function getDataMenu()
			{
				return $this->db->get('menu');
			}

	public function lihat_id($id_menu){
		$query = $this->db->get_where($this->_table, ['id_menu' => $id_menu]);
		return $query->row();
	}

	public function lihat_nama($nama){
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

	public function min_stok($stok, $nama){
		$query = $this->db->set('stok', 'stok-' . $stok, false);
		$query = $this->db->where('nama', $nama);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function ubah($kodemenu){
			$sql = "SELECT * ";
					$sql=$sql."FROM ".$this->_table." WHERE id = ".$this->db->escape($id);
					$query = $this->db->query($sql);
					return $query->result_array();
		}
	

	public function hapus($id_menu){
		$hapus = $this->db->delete('menu', array('id_menu'=>$id_menu));
		if($hapus){
			return 1;
		}else{
			return 0;
		}
	}
	public function getDataOrderByNama(){
		$this->db->order_by('nama', 'ASC');
		$query = $this->db->get($this->_table);
		return $query->result_array();
	}
	
	//query buah yang tidak terdapat di tabel detail_pembelian
	public function getDataOrderByNama2($no_nota){
		$sql = "SELECT * ";
		$sql = $sql." FROM ".$this->_table;
		$sql = $sql." WHERE id_menu NOT IN ";
		$sql = $sql." (SELECT id_menu FROM detail_pembelian WHERE no_nota = '".$no_nota."') ";
		$sql = $sql." ORDER BY nama ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	//query buah yang tidak terdapat di tabel detail_penjualan
	public function getDataOrderByNama3($no_nota){
		$sql = "SELECT * ";
		$sql = $sql." FROM ".$this->_table;
		$sql = $sql." WHERE id_menu NOT IN ";
		$sql = $sql." (SELECT id_menu FROM detail_penjualan WHERE id_menu = '".$no_nota."') ";
		$sql = $sql." ORDER BY nama ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}