<?php
   Class chart_bb_model extends CI_Model{
      public function getPembelianBB($bulan,$tahun){
         $bulan = str_pad($bulan,2,"0",STR_PAD_LEFT);
         $tahun = $tahun;
         $this->db->select("nama_bb,sum(jumlah_beli) as total");
         $this->db->from('detail_pembelian');
         $this->db->join('pembelian','detail_pembelian.no_faktur=pembelian.no_faktur');
         $this->db->join('bahan_baku','detail_pembelian.id_bb=bahan_baku.id_bb');
         $this->db->where('MONTH(pembelian.waktu_transaksi)',$bulan);
         $this->db->where('YEAR(pembelian.waktu_transaksi)',$tahun);
         $this->db->group_by('nama_bb');
         $this->db->order_by('bahan_baku.id_bb');
         return $this->db->get()->result();
      }
      public function getPembelianBB1($bulan,$tahun){
         $bulan = str_pad($bulan,2,"0",STR_PAD_LEFT);
         $tahun = $tahun;
         $sql = " SELECT nama_bb, sum(jumlah_beli) as total, bahan_baku.satuan
                  FROM detail_pembelian
                  JOIN pembelian ON detail_pembelian.no_faktur=pembelian.no_faktur
                  JOIN bahan_baku ON detail_pembelian.id_bb=bahan_baku.id_bb
                  WHERE MONTH(pembelian.waktu_transaksi) = '$bulan'
                  AND YEAR(pembelian.waktu_transaksi) = '$tahun'
                  GROUP BY bahan_baku.id_bb
                  ORDER BY bahan_baku.id_bb";
         $query = $this->db->query($sql);
         return $query->result_array();   
      }
      public function getTahun(){
         $sql = "
            SELECT tahun FROM
            (
               SELECT year(waktu_transaksi) as tahun 
               FROM pembelian
            ) x
            ORDER BY 1 ASC          
         ";
         $query = $this->db->query($sql);
         return $query->result_array();
      }
      public function getPembelianBP($bulan,$tahun){
         $bulan   = str_pad($bulan,2,"0",STR_PAD_LEFT);
         $tahun = $tahun;
         $this->db->select("nama_bp,sum(jumlah_beli) as total");
         $this->db->from('detail_pembelian_bp');
         $this->db->join('pembelian_bp','detail_pembelian_bp.no_faktur=pembelian_bp.no_faktur');
         $this->db->join('bahan_penolong','detail_pembelian_bp.id_bp=bahan_penolong.id_bp');
         $this->db->where('MONTH(pembelian_bp.waktu_transaksi)',$bulan);
         $this->db->where('YEAR(pembelian_bp.waktu_transaksi)',$tahun);
         $this->db->group_by('nama_bp');
         $this->db->order_by('bahan_penolong.id_bp');
         return $this->db->get()->result();
      }
      public function getPembelianBP1($bulan,$tahun){
         $bulan   = str_pad($bulan,2,"0",STR_PAD_LEFT);
         $tahun = $tahun;
         $sql = " SELECT nama_bp, sum(jumlah_beli) as total, bahan_penolong.satuan
                  FROM detail_pembelian_bp
                  JOIN pembelian_bp ON detail_pembelian_bp.no_faktur=pembelian_bp.no_faktur
                  JOIN bahan_penolong ON detail_pembelian_bp.id_bp=bahan_penolong.id_bp
                  WHERE MONTH(pembelian_bp.waktu_transaksi) = '$bulan'
                  AND YEAR(pembelian_bp.waktu_transaksi) = '$tahun'
                  GROUP BY bahan_penolong.id_bp
                  ORDER BY bahan_penolong.id_bp";
         $query = $this->db->query($sql);
         return $query->result_array(); 
      }
   }
?>