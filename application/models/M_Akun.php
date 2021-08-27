<?php

class M_Akun extends CI_Model{
	private $_table = 'akun';

	public function lihat(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

// 	public function lihat_stok(){
// 		$query = $this->db->get_where($this->_table, 'stok > 1');
// 		return $query->result();
// 	}

	public function lihat_id($kode_akun){
		$query = $this->db->get_where($this->_table, ['kode_akun' => $kode_akun]);
		return $query->row();
	}

// 	public function lihat_nama($nama){
// 		$query = $this->db->select('*');
// 		$query = $this->db->where(['nama' => $nama]);
// 		$query = $this->db->get($this->_table);
// 		return $query->row();
// 	}

	public function tambah($data){
		$simpan = $this->db->insert($this->_table, $data);
		if ($simpan){
			return 1;
		}else{
			return 0;
		}
	}

// 	public function min_stok($stok, $nama){
// 		$query = $this->db->set('stok', 'stok-' . $stok, false);
// 		$query = $this->db->where('nama', $nama);
// 		$query = $this->db->update($this->_table);
// 		return $query;
// 	}

// 	public function ubah($data, $id_menu){
// 		$query = $this->db->set($data);
// 		$query = $this->db->where(['id_menu' => $id_menu]);
// 		$query = $this->db->update($this->_table);
// 		return $query;
// 	}

	public function hapus($kode_akun){
		return $this->db->delete($this->_table, ['kode_akun' => $kode_akun]);
	}
}