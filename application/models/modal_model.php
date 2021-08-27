<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class modal_model extends CI_Model {
		private $_table = 'setoran_modal';

		public function getDataDetail(){
			$query=$this->db->get('setoran_modal');
			return $query->result_array();
		}
		public function getmodalId(){
			$sql = "SELECT (substring(IFNULL(MAX(id_modal),0),5)+0) as hsl FROM ".$this->_table;
			$query = $this->db->query($sql);
			$hasil = $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['hsl'];
			endforeach;
			$id = 'TM-';
			$nomor = str_pad(($jml_data+1),9,"0",STR_PAD_LEFT); //FAK-000001
			$id = $id.$nomor;
			return $id;
		}
		public function fungsi_input_data2(){
			$post = $this->input->post();
			$data['faktur_modal'] = array('id_modal' => $this->modal_model->getmodalId(),
									   		'datetimepicker' => $post["datetimepicker"],
									   		'keterangan' => $post["keterangan"],
									   		'nominal' => $post["nominal"]
									);
			$sql = "SELECT COUNT(*) as jml FROM setoran_modal WHERE id_modal = ".$this->db->escape($post["id_modal"]);
			$query = $this->db->query($sql);
			$hasil = $query->result_array();
			foreach($hasil as $cacah):
				$jml_data = $cacah['jml'];
			endforeach;
			if($jml_data<1){
				$sql = "INSERT INTO setoran_modal(id_modal,tanggal,keterangan,nominal) ";
				$sql = $sql." VALUES(".$this->db->escape($post["id_modal"]).",";
				$sql = $sql." STR_TO_DATE(".$this->db->escape($post["datetimepicker"]).",'%Y-%m-%d')";
				$sql = $sql.",".$this->db->escape($post["keterangan"])."";
				$sql = $sql.",".$this->db->escape($post["nominal"]).")";
				$query = $this->db->query($sql);		
			}else{
				$sql = "INSERT INTO setoran_modal(id_modal,tanggal,keterangan,nominal) ";
				$sql = $sql." VALUES(".$this->db->escape($post["id_modal"]).",";
				$sql = $sql." STR_TO_DATE(".$this->db->escape($post["datetimepicker"]).",'%Y-%m-%d')";
				$sql = $sql.",".$this->db->escape($post["keterangan"])."";
				$sql = $sql.",".$this->db->escape($post["nominal"]).")";
				$query = $this->db->query($sql);
			}
		}
	}