<?php

   //fungsi untuk format bulan
   function format_bulan($a){
      $a = str_pad($a,2,"0",STR_PAD_LEFT);
      $bulanIndonesia = array(
         '01' => 'Januari',
         '02' => 'Februari',
         '03' => 'Maret',
         '04' => 'April',
         '05' => 'Mei',
         '06' => 'Juni',
         '07' => 'Juli',
         '08' => 'Agustus',
         '09' => 'September',
         '10' => 'Oktober',
         '11' => 'November',
         '12' => 'Desember',
      );
      return $bulanIndonesia[$a];
   }
    function format_bulan1($a){
      $a = str_pad($a,2,"0",STR_PAD_LEFT);
      $bulanIndonesia = array(
         'January' => 'Januari',
         'February' => 'Februari',
         'March' => 'Maret',
         'April' => 'April',
         'May' => 'Mei',
         'June' => 'Juni',
         'July' => 'Juli',
         'August' => 'Agustus',
         'September' => 'September',
         'October' => 'Oktober',
         'November' => 'November',
         'December' => 'Desember',
      );
      return $bulanIndonesia[$a];

      
   }
  

   
?>
