<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class beban_angkut_model extends CI_Model {
		private $_table = 'biaya_angkut_pembelian';
		private $_table1 = 'pembelian';

		public function getDataDetail(){
			$query=$this->db->get('biaya_angkut_pembelian');
			return $query->result_array();
		}
		public function getbebanId(){
			$sql = "SELECT (substring(IFNULL(MAX(id_biaya_angkut),0),5)+0) as hsl FROM ".$this->_table;
			$query = $this->db->query($sql);
			$hasil = $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['hsl'];
			endforeach;
			$id = 'BAP-';
			$nomor = str_pad(($jml_data+1),9,"0",STR_PAD_LEFT); //FAK-000001
			$id = $id.$nomor;
			return $id;
		}
		public function fungsi_input_data2(){
			$post = $this->input->post();
			$data['faktur_beban'] = array('id_biaya_angkut' => $this->beban_angkut_model->getbebanId(),
									   		'datetimepicker' => $post["datetimepicker"],
									   		'no_faktur' => $post["no_faktur"],
									   		'nominal' => $post["nominal"]
									);
			$sql = "SELECT COUNT(*) as jml FROM biaya_angkut_pembelian WHERE id_biaya_angkut = ".$this->db->escape($post["id_biaya_angkut"]);
			$query = $this->db->query($sql);
			$hasil = $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['jml'];
			endforeach;
			if($jml_data<1){
				$sql = "INSERT INTO biaya_angkut_pembelian(id_biaya_angkut,tanggal,no_faktur,nominal) ";
				$sql = $sql." VALUES(".$this->db->escape($post["id_biaya_angkut"]).",";
				$sql = $sql." STR_TO_DATE(".$this->db->escape($post["datetimepicker"]).",'%Y-%m-%d')";
				$sql = $sql.",".$this->db->escape($post["no_faktur"])."";
				$sql = $sql.",".$this->db->escape($post["nominal"]).")";
				$query = $this->db->query($sql);		
			}else{
				$sql = "INSERT INTO biaya_angkut_pembelian(id_biaya_angkut,tanggal,no_faktur,nominal) ";
				$sql = $sql." VALUES(".$this->db->escape($post["id_biaya_angkut"]).",";
				$sql = $sql." STR_TO_DATE(".$this->db->escape($post["datetimepicker"]).",'%Y-%m-%d')";
								$sql = $sql.",".$this->db->escape($post["no_faktur"])."";
				$sql = $sql.",".$this->db->escape($post["nominal"]).")";
				$query = $this->db->query($sql);
			}
		}
		public function getNoFaktur(){
			$sql 	= "SELECT no_faktur ";
			$sql 	= $sql." FROM pembelian";
			$sql 	= $sql." WHERE no_faktur NOT IN ";
			$sql 	= $sql." (SELECT no_faktur FROM biaya_angkut_pembelian) ";
			$query 	= $this->db->query($sql);
			return $query->result_array();
		}
	}