<?php

   //fungsi untuk mengecek apakah sesi dengan 
   //variabel nama sudah di set
   function cek_login(){
      if(isset($_SESSION['nama'])){
         return true;
      }else{
         return false;
      }
   }
   
?>
