<?php 
    defined('BASEPATH') or exit('No direct script access allowed');
    class kartu_stok_model extends CI_Model{
        private $_table = "bahan_baku";
        private $_table_detail = "detail_bom";

        public function getKartuStok($tanggal, $id_bb){
            $this->db->order_by('id', 'ASC');
            return $this->db->from('kartu_stok')
                    ->where('id_bb', $id_bb)
                    ->where("DATE_FORMAT(tanggal_stok,'%Y-%m')", $tanggal)
                    ->get()
                    ->result();
        }
        public function getBB($id_bb){
            return $this->db->get_where($this->_table, ["id_bb" => $id_bb])->row();
        }
        public function getSatuan($id_bb){
            return $this->db->get_where($this->_table_detail, ["id_bb" => $id_bb])->row();
        }
    }