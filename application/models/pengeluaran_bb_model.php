<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class pengeluaran_bb_model extends CI_Model {
		private $_table = 'bb_keluar';

		public function getDataDetail(){
			$query=$this->db->get('bb_keluar');
			return $query->result_array();
		}
		public function getPengeluaranId(){
			$sql = "SELECT (substring(IFNULL(MAX(id_keluar),0),5)+0) as hsl FROM ".$this->_table;
			$query = $this->db->query($sql);
			$hasil = $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['hsl'];
			endforeach;
			$id = 'BBK-';
			$nomor = str_pad(($jml_data+1),9,"0",STR_PAD_LEFT); //FAK-000001
			$id = $id.$nomor;
			return $id;
		}
		public function fungsi_input_data2(){
			$post = $this->input->post();
			$data['bb_keluar'] = array('id_keluar' => $this->pengeluaran_bb_model->getPengeluaranId(),
									   		'datetimepicker' => $post["datetimepicker"],
									   		'no_nota' => $post["no_nota"],
									   		'keterangan' => $post["keterangan"],
									   		'total' => $post["total"],
									   		'harga_satuan' => $post["harga_satuan"]
									);
			$sql = "SELECT COUNT(*) as jml FROM bb_keluar WHERE id_keluar = ".$this->db->escape($post["id_keluar"]);
			$query = $this->db->query($sql);
			$hasil = $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['jml'];
			endforeach;
			if($jml_data<1){
				$sql = "INSERT INTO bb_keluar(id_keluar,tanggal,no_nota,keterangan) ";
				$sql = $sql." VALUES(".$this->db->escape($post["id_keluar"]).",";
				$sql = $sql." STR_TO_DATE(".$this->db->escape($post["datetimepicker"]).",'%Y-%m-%d')";
				$sql = $sql.",".$this->db->escape($post["no_nota"]);
				$sql = $sql.",".$this->db->escape($post["keterangan"]).")";
				$query = $this->db->query($sql);	

				$sql2 = "SELECT bb_keluar.*,detail_bom.jumlah,bahan_baku.id_bb,menu.nama,sum(pesanan.jml_beli*detail_bom.jumlah) as jumlah_keluar";
                $sql2 = $sql2." FROM bb_keluar";
                $sql2 = $sql2." JOIN pesanan ";
                $sql2 = $sql2." ON (bb_keluar.no_nota=pesanan.no_nota) ";
                $sql2 = $sql2." JOIN bom";
                $sql2 = $sql2." ON (pesanan.id_menu=bom.id_menu) ";
                $sql2 = $sql2." JOIN menu";
                $sql2 = $sql2." ON (bom.id_menu=menu.id_menu) ";
                $sql2 = $sql2." JOIN detail_bom";
                $sql2 = $sql2." ON (bom.id_bom=detail_bom.id_bom) ";
                $sql2 = $sql2." JOIN bahan_baku";
                $sql2 = $sql2." ON (detail_bom.id_bb=bahan_baku.id_bb) ";
                $sql2 = $sql2." WHERE bb_keluar.no_nota = '".$this->input->post('no_nota')."'";
                $sql2 = $sql2." group by id_bb";
                    
                $query2 = $this->db->query($sql2);
                $hasil = $query2->result_array();

                foreach($hasil as $cacah):
                    $sql2 = "INSERT INTO kartu_stok";
                    $sql2 = $sql2." SET keterangan = '".$this->input->post('keterangan')."', ";
                    $sql2 = $sql2." id_bb = '".$cacah['id_bb']."', ";
                    $sql2 = $sql2." harga_satuan = 0, ";
                    $sql2 = $sql2." jumlah = ".$cacah['jumlah_keluar']." , ";
                    $sql2 = $sql2." total = 0, ";
                    $sql2 = $sql2." tanggal_stok = '".$this->input->post('datetimepicker')."' ";
                    $query2 = $this->db->query($sql2);
                endforeach;

                /*$sql3 = "SELECT bb_keluar.*,detail_bom.jumlah,bahan_baku.id_bb,menu.nama,sum(pesanan.jml_beli*detail_bom.jumlah) as jumlah_keluar";
                $sql3 = $sql3." FROM bb_keluar";
                $sql3 = $sql3." JOIN pesanan ";
                $sql3 = $sql3." ON (bb_keluar.no_nota=pesanan.no_nota) ";
                $sql3 = $sql3." JOIN bom";
                $sql3 = $sql3." ON (pesanan.id_menu=bom.id_menu) ";
                $sql3 = $sql3." JOIN menu";
                $sql3 = $sql3." ON (bom.id_menu=menu.id_menu) ";
                $sql3 = $sql3." JOIN detail_bom";
                $sql3 = $sql3." ON (bom.id_bom=detail_bom.id_bom) ";
                $sql3 = $sql3." JOIN bahan_baku";
                $sql3 = $sql3." ON (detail_bom.id_bb=bahan_baku.id_bb) ";
                $sql3 = $sql3." WHERE bb_keluar.no_nota = '".$this->input->post('no_nota')."'";
                $sql3 = $sql3." group by id_bb";
                    
                $query3 = $this->db->query($sql3);
                $hasil3 = $query3->result_array();

                foreach($hasil3 as $cacah):
                    $sql4 = "UPDATE bahan_baku SET stok = stok - ".$cacah['jumlah_keluar'];
                    $sql4 = $sql4." WHERE id_bb = '".$cacah['id_bb']."'";
                    $query4 = $this->db->query($sql4);

                endforeach;*/

			}else{
				$sql = "INSERT INTO bb_keluar(id_keluar,tanggal,no_nota,keterangan) ";
				$sql = $sql." VALUES(".$this->db->escape($post["id_keluar"]).",";
				$sql = $sql." STR_TO_DATE(".$this->db->escape($post["datetimepicker"]).",'%Y-%m-%d')";
				$sql = $sql.",".$this->db->escape($post["no_nota"]);
				$sql = $sql.",".$this->db->escape($post["keterangan"]).")";
				$query = $this->db->query($sql);	

				$sql2 = "SELECT bb_keluar.*,detail_bom.jumlah,bahan_baku.id_bb,menu.nama,sum(pesanan.jml_beli*detail_bom.jumlah) as jumlah_keluar";
                $sql2 = $sql2." FROM bb_keluar";
                $sql2 = $sql2." JOIN pesanan ";
                $sql2 = $sql2." ON (bb_keluar.no_nota=pesanan.no_nota) ";
                $sql2 = $sql2." JOIN bom";
                $sql2 = $sql2." ON (pesanan.id_menu=bom.id_menu) ";
                $sql2 = $sql2." JOIN menu";
                $sql2 = $sql2." ON (bom.id_menu=menu.id_menu) ";
                $sql2 = $sql2." JOIN detail_bom";
                $sql2 = $sql2." ON (bom.id_bom=detail_bom.id_bom) ";
                $sql2 = $sql2." JOIN bahan_baku";
                $sql2 = $sql2." ON (detail_bom.id_bb=bahan_baku.id_bb) ";
                $sql2 = $sql2." WHERE bb_keluar.no_nota = '".$this->input->post('no_nota')."'";
                $sql2 = $sql2." group by id_bb";
                
                $query2 = $this->db->query($sql2);
                $hasil = $query2->result_array();

                foreach($hasil as $cacah):
                    $sql2 = "INSERT INTO kartu_stok";
                    $sql2 = $sql2." SET keterangan = '".$this->input->post('keterangan')."', ";
                    $sql2 = $sql2." id_bb = '".$cacah['id_bb']."', ";
                    $sql2 = $sql2." harga_satuan = 0, ";
                    $sql2 = $sql2." jumlah = ".$cacah['jumlah_keluar']." , ";
                    $sql2 = $sql2." total = 0, ";
                    $sql2 = $sql2." tanggal_stok = '".$this->input->post('datetimepicker')."' ";
                    $query2 = $this->db->query($sql2);
                endforeach;
                /*$sql3 = "SELECT bb_keluar.*,detail_bom.jumlah,bahan_baku.id_bb,menu.nama,sum(pesanan.jml_beli*detail_bom.jumlah) as jumlah_keluar";
                $sql3 = $sql3." FROM bb_keluar";
                $sql3 = $sql3." JOIN pesanan ";
                $sql3 = $sql3." ON (bb_keluar.no_nota=pesanan.no_nota) ";
                $sql3 = $sql3." JOIN bom";
                $sql3 = $sql3." ON (pesanan.id_menu=bom.id_menu) ";
                $sql3 = $sql3." JOIN menu";
                $sql3 = $sql3." ON (bom.id_menu=menu.id_menu) ";
                $sql3 = $sql3." JOIN detail_bom";
                $sql3 = $sql3." ON (bom.id_bom=detail_bom.id_bom) ";
                $sql3 = $sql3." JOIN bahan_baku";
                $sql3 = $sql3." ON (detail_bom.id_bb=bahan_baku.id_bb) ";
                $sql3 = $sql3." WHERE bb_keluar.no_nota = '".$this->input->post('no_nota')."'";
                $sql3 = $sql3." group by id_bb";
                    
                $query3 = $this->db->query($sql3);
                $hasil3 = $query3->result_array();

                foreach($hasil3 as $cacah):
                    $sql4 = "UPDATE bahan_baku SET stok = stok - ".$cacah['jumlah_keluar'];
                    $sql4 = $sql4." WHERE id_bb = '".$cacah['id_bb']."'";
                    $query4 = $this->db->query($sql4);
                endforeach;*/
    		}
		}
		public function getDataNota(){
			$sql 	= "SELECT no_nota ";
			$sql 	= $sql." FROM pesanan";
			$sql 	= $sql." WHERE no_nota NOT IN ";
			$sql 	= $sql." (SELECT no_nota FROM bb_keluar) ";
			$sql 	= $sql." GROUP BY no_nota";
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}
		public function getDataDetail2($no_nota){
			$sql 	= "SELECT bb_keluar.*,pesanan.nama_menu,pesanan.jml_beli,bahan_baku.nama_bb,sum(pesanan.jml_beli*detail_bom.jumlah) as jumlah,detail_bom.satuan_bom";
			$sql 	= $sql." FROM bb_keluar";
			$sql 	= $sql." JOIN pesanan ON (bb_keluar.no_nota=pesanan.no_nota) ";
            $sql    = $sql." JOIN bom ON (pesanan.id_menu=bom.id_menu) ";
            $sql    = $sql." JOIN detail_bom ON (bom.id_bom=detail_bom.id_bom) ";
            $sql    = $sql." JOIN bahan_baku ON (detail_bom.id_bb=bahan_baku.id_bb) ";
			$sql 	= $sql." WHERE bb_keluar.no_nota = ".$this->db->escape($no_nota);
            $sql    = $sql." GROUP BY detail_bom.id_bb";
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}
        public function getDataDetail3($no_nota){
            $sql    = "SELECT bb_keluar.*,pesanan.nama_menu,pesanan.jml_beli";
            $sql    = $sql." FROM bb_keluar";
            $sql    = $sql." JOIN pesanan ON (bb_keluar.no_nota=pesanan.no_nota) ";
            $sql    = $sql." WHERE bb_keluar.no_nota = ".$this->db->escape($no_nota);
            $query  = $this->db->query($sql);
            return $query->result_array();
        }
	}
?>