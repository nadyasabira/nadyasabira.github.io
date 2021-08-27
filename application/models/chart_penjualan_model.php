<?php
Class chart_penjualan_model extends CI_Model
{
  private $_table = "detail_penjualan";


   public function penjualan(){
      $this->db->select("nama_menu,sum(jml_beli) as total");
      $this->db->from('detail_penjualan');
    //   $this->db->join('menu','detail_penjualan.id_menu=menu.id_menu');
      $this->db->group_by('nama_menu');
      return $this->db->get()->result();
    }
    public function penjualan2(){
      $this->db->select("nama_menu,sum(jml_beli) as total1");
      $this->db->from('detail_penjualan');
      $this->db->where('detail_penjualan.id_menu=detail_penjualan.id_menu');
      $this->db->group_by('nama_menu');
      return $this->db->get()->result();
    }
    function penjualan1(){
      // $this->db->join('menu','barang_harga.id_menu=menu.id_menu');
      // return $this->db->get('barang_harga');
  
      $sql = "SELECT nama_menu, sum(jml_beli) as total1 FROM ".$this->_table." a ";

      $sql = $sql." WHERE a.id_menu =a.id_menu";
      $sql = $sql." GROUP BY nama_menu";
      
      $query = $this->db->query($sql);
      
      return $query->result_array();
    }
    public function produkTerlaris()
    {
      return $this->db->query('SELECT nama_menu, sum(jml_beli) as total FROM `detail_penjualan` 
      ORDER BY CONVERT(total,decimal)  DESC LIMIT 5')->result();
    }
    public function GetPie(){
      $query=$this->db->query("select * from detail_penjualan;");
      return $query;
      }
  public function get_data_harga()
    {
        $query = "SELECT COUNT(*) AS total, nama_menu, sum(jml_beli) as total1 FROM detail_penjualan
                    GROUP BY nama_menu ORDER BY nama_menu DESC";

        $result = $this->db->query($query)->result_array();
        return $result;
    }

    // public function penjualan1(){
    //   $this->db->select("nama_menu,sum(jml_beli) as total");
    //   $this->db->from('detail_penjualan');
    //   $detail= $this->db->get_compiled_select();

    //   $this->db->select("nama_menu,sum(jml_beli) as total");
    //   $this->db->from('detail_penjualan_produk');
    //   $detail1= $this->db->get_compiled_select();

    //   $query = $this->db->query($detail . ' UNION ' . $detail1);

    //   return $query->result();
    // }
    // public function stok_penjualan(){
    //   $this->db->select("nama,sum(stok) as total,satuan");
    //   $this->db->from('bahan_penolong');
    //   $this->db->group_by('nama_penjualan');
    //   return $this->db->get()->result();
    // }
}

?>