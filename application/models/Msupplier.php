<?php
    class Msupplier extends CI_Model{
        private $_table = "supplier";
        public $id_supplier;	
        public $nama_supplier;
        public $no_telp;
        public $alamat;
        public $email;

        public function __construct(){
            $this->load->database();
        }
        public function getsupplierId(){
            $sql = "SELECT (substring(IFNULL(MAX(id_supplier),0),4)+0) as hsl FROM ".$this->_table;
            $query = $this->db->query($sql);
            $hasil = $query->result_array();
            foreach($hasil as $cacah):
                $jml_data = $cacah['hsl'];
            endforeach;
            $id = 'SP-';
            $nomor = str_pad(($jml_data+1),3,"0",STR_PAD_LEFT); //ID-001
            $id = $id.$nomor;
            return $id;
        }
        public function fungsi_input_data(){
            $post                   = $this->input->post();
            $this->id               = $this->getsupplierId();
            $this->nama_supplier    = $post["nama_supplier"];
            $this->no_telp          = $post["no_telp"];
            $this->alamat           = $post["alamat"]; 
            $this->email            = $post["email"];

            $sql = "INSERT INTO supplier ";
            $sql = $sql." VALUES(".$this->db->escape($this->id).",".$this->db->escape($this->nama_supplier).",";
            $sql = $sql.$this->db->escape($this->no_telp).",".$this->db->escape($this->alamat);
            $sql = $sql.",".$this->db->escape($this->email).")";
            $query = $this->db->query($sql);
            return $this->db->affected_rows();
        }   
        public function getData(){
            $query = $this->db->get($this->_table); 
            return $query->result_array();
        }
        public function getDataOrderByNama(){
            $this->db->order_by('nama_supplier', 'ASC');
            $query = $this->db->get($this->_table); 
            return $query->result_array();
        }
        public function getDataEdit($id){
            $sql = "SELECT * ";
            $sql=$sql."FROM ".$this->_table." WHERE id_supplier = ".$this->db->escape($id);
            $query = $this->db->query($sql);
            return $query->result_array();
        }
        public function updateFormInput($id){
            $post = $this->input->post();
            $this->id= $post["id"];
            $this->nama_supplier= $post["nama_supplier"];        
            $this->alamat = $post["alamat"]; 
            $this->no_telp = $post["no_telp"];
            $this->email = $post["email"];

            $sql = "UPDATE ".$this->_table;
            $sql = $sql." SET nama_supplier = ".$this->db->escape($this->nama_supplier);     
            $sql = $sql.", alamat = ".$this->db->escape($this->alamat);
            $sql = $sql." ,no_telp= ".$this->db->escape($this->no_telp);
            $sql = $sql.", email= ".$this->db->escape($this->email);
            $sql = $sql." WHERE id_supplier = ".$this->db->escape($this->id);
            $query = $this->db->query($sql);
            return $this->db->affected_rows();
        }
    }
?>