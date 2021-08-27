<?php

class Model_penjualan extends CI_Model{
    private $_table = "penjualann";

    public function getPenjualanId(){
        $sql = "SELECT (substring(IFNULL(MAX(no_faktur),0),5)+0) as hsl FROM ".$this->_table;
        $query = $this->db->query($sql);
        $hasil = $query->result_array();
        foreach($hasil as $cacah):
            $jml_data = $cacah['hsl'];
        endforeach;
        $id = 'FAK-';
        $nomor = str_pad(($jml_data+1),6,"0",STR_PAD_LEFT); //FAK-000001
        $id = $id.$nomor;
        return $id;
    }

    function cekBarangtemp($id_menu,$id_user)
    {
        return $this->db->get_where('penjualan_detail_temp',array('id_menu' => $id_menu,'id_user' => $id_user));
    }

    function insertBarangtemp($data)
    {
        $this->db->insert('penjualan_detail_temp', $data);
    }
  
    function getDatabarangtemp($id_user)
    {
        $this->db->select('penjualan_detail_temp.id_menu,harga, ukuran,qty,(qty * penjualan_detail_temp.harga) as total');
        $this->db->from('penjualan_detail_temp');
        $this->db->join('barang_harga','penjualan_detail_temp.id_menu = barang_harga.id_menu');
        $this->db->where('id_user',$id_user);
        return $this->db->get();
    }
}   