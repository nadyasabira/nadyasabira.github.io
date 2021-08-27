<?php

   //fungsi untuk mengecek apakah user berhak mengakses suatu alamat url atau tidak
   function cek_hak_akses($uri_segment_kesatu){
      $hasil = false;
      $uri_segment_kesatu = strtolower($uri_segment_kesatu);
      switch ($uri_segment_kesatu) {
         case "c_user":
             //yang berhak hanya admin
             if(strcmp($_SESSION['kelompok'],'Admin')==0){
               $hasil = true;
             }else{
               $hasil = false;
             }
             break;
         case "akun":
             //yang berhak hanya pegawai dan pemilik
             if((strcmp($_SESSION['kelompok'],'Pegawai')==0)) {
               $hasil = true;
             }else{
               $hasil = false;
             }
             break;
        case "transaksi":
             //yang berhak hanya pegawai dan pemilik
             if((strcmp($_SESSION['kelompok'],'Pegawai')==0)) {
               $hasil = true;
             }else{
               $hasil = false;
             }
             break;
        case "header":
             //yang berhak hanya pegawai dan pemilik
             if((strcmp($_SESSION['kelompok'],'Pegawai')==0)) {
               $hasil = true;
             }else{
               $hasil = false;
             }
             break;
        case "beban":
             //yang berhak hanya pegawai dan pemilik
             if((strcmp($_SESSION['kelompok'],'Pegawai')==0)) {
               $hasil = true;
             }else{
               $hasil = false;
             }
             break;
         case "halutama":
             //yang berhak hanya pegawai dan pemilik
             if((strcmp($_SESSION['kelompok'],'Pegawai')==0) or (strcmp($_SESSION['kelompok'],'Pemilik')==0)){
               $hasil = true;
             }else{
               $hasil = false;
             }
             break;
          case "menu":
             //yang berhak hanya pegawai dan pemilik
             if((strcmp($_SESSION['kelompok'],'Pegawai')==0)){
              $hasil = true;
            }else{
              $hasil = false;
            }
           break;
            //yang berhak hanya pegawai dan pemilik
         case "konsumen":
            if((strcmp($_SESSION['kelompok'],'Pegawai')==0)){
               $hasil = true;
             }else{
               $hasil = false;
             }
             break;
             case "bahanbaku":
            if((strcmp($_SESSION['kelompok'],'Pegawai')==0)){
               $hasil = true;
             }else{
               $hasil = false;
             }
             break;
             case "bahanpenolong":
            if((strcmp($_SESSION['kelompok'],'Pegawai')==0)){
               $hasil = true;
             }else{
               $hasil = false;
             }
             break;
             case "peralatan":
            if((strcmp($_SESSION['kelompok'],'Pegawai')==0)){
               $hasil = true;
             }else{
               $hasil = false;
             }
             break;
             case "supplier":
            if((strcmp($_SESSION['kelompok'],'Pegawai')==0)){
               $hasil = true;
             }else{
               $hasil = false;
             }
             break;
          case "hargamenu":
            //yang berhak hanya pegawai dan pemilik
            if((strcmp($_SESSION['kelompok'],'Pegawai')==0)){
               $hasil = true;
             }else{
               $hasil = false;
             }
             break;
        case "c_laporan":
            //yang berhak hanya pegawai dan pemilik
            if((strcmp($_SESSION['kelompok'],'Pegawai')==0) or (strcmp($_SESSION['kelompok'],'Pemilik')==0)){
               $hasil = true;
             }else{
               $hasil = false;
             }
             break;
         case "pembayaran":
            //yang berhak hanya pegawai dan pemilik
            if((strcmp($_SESSION['kelompok'],'Pegawai')==0)){
               $hasil = true;
             }else{
               $hasil = false;
             }
             break;
         case "pemesanan":
            //yang berhak hanya pegawai dan pemilik
            if((strcmp($_SESSION['kelompok'],'Pegawai')==0)){
               $hasil = true;
             }else{
               $hasil = false;
             }
            break;
            case "penjualan":
              //yang berhak hanya pegawai dan pemilik
              if((strcmp($_SESSION['kelompok'],'Pegawai')==0)){
                 $hasil = true;
               }else{
                 $hasil = false;
               }
              break;
              case "pembelian":
              //yang berhak hanya pegawai dan pemilik
              if((strcmp($_SESSION['kelompok'],'Pegawai')==0)){
                 $hasil = true;
               }else{
                 $hasil = false;
               }
              break;case "pembelian_bp":
              //yang berhak hanya pegawai dan pemilik
              if((strcmp($_SESSION['kelompok'],'Pegawai')==0)){
                 $hasil = true;
               }else{
                 $hasil = false;
               }
              break;case "pembelian_alat":
              //yang berhak hanya pegawai dan pemilik
              if((strcmp($_SESSION['kelompok'],'Pegawai')==0)){
                 $hasil = true;
               }else{
                 $hasil = false;
               }
              break;
              case "form_permintaan_bp":
              //yang berhak hanya pegawai dan pemilik
              if((strcmp($_SESSION['kelompok'],'Pegawai')==0)){
                 $hasil = true;
               }else{
                 $hasil = false;
               }
              break;
              case "form_permintaan_bb":
              //yang berhak hanya pegawai dan pemilik
              if((strcmp($_SESSION['kelompok'],'Pegawai')==0)){
                 $hasil = true;
               }else{
                 $hasil = false;
               }
              break;
             case "transaksi":
              //yang berhak hanya pegawai dan pemilik
              if((strcmp($_SESSION['kelompok'],'Pegawai')==0)){
                 $hasil = true;
               }else{
                 $hasil = false;
               }
              break;
        //  case "penjualan":
        //     //yang berhak hanya pegawai dan pemilik
        //     if((strcmp($_SESSION['kelompok'],'Pegawai')==0) or (strcmp($_SESSION['kelompok'],'Pemilik')==0)){
        //        $hasil = true;
        //      }else{
        //        $hasil = false;
        //      }
        //     break;   
        //     case "retur_penjualan":
        //       //yang berhak hanya pegawai dan pemilik
        //       if((strcmp($_SESSION['kelompok'],'Pegawai')==0) or (strcmp($_SESSION['kelompok'],'Pemilik')==0)){
        //          $hasil = true;
        //        }else{
        //          $hasil = false;
        //        }
        //       break;   
        //  case "supplier":
        //     //yang berhak hanya pegawai dan pemilik
        //     if((strcmp($_SESSION['kelompok'],'Pegawai')==0) or (strcmp($_SESSION['kelompok'],'Pemilik')==0)){
        //        $hasil = true;
        //      }else{
        //        $hasil = false;
        //      }
        //     break;    
        //     case "pegawai":
        //       //yang berhak hanya pegawai dan pemilik
        //       if((strcmp($_SESSION['kelompok'],'Pegawai')==0) or (strcmp($_SESSION['kelompok'],'Pemilik')==0)){
        //          $hasil = true;
        //        }else{
        //          $hasil = false;
        //        }
        //       break;    
        //       case "pelanggan":
        //     //yang berhak hanya pegawai dan pemilik
        //     if((strcmp($_SESSION['kelompok'],'Pegawai')==0) or (strcmp($_SESSION['kelompok'],'Pemilik')==0)){
        //        $hasil = true;
        //      }else{
        //        $hasil = false;
        //      }
        //     break;  
        //     case "supplier":
        //     //yang berhak hanya pegawai dan pemilik
        //     if((strcmp($_SESSION['kelompok'],'Pegawai')==0) or (strcmp($_SESSION['kelompok'],'Pemilik')==0)){
        //        $hasil = true;
        //      }else{
        //        $hasil = false;
        //      }
        //     break;   
        //     case "lap_beli":
        //       //yang berhak hanya pegawai dan pemilik
        //       if((strcmp($_SESSION['kelompok'],'Pegawai')==0) or (strcmp($_SESSION['kelompok'],'Pemilik')==0)){
        //          $hasil = true;
        //        }else{
        //          $hasil = false;
        //        }
        //       break;     
        //     case "laporan1":
        //       //yang berhak hanya pegawai dan pemilik
        //       if((strcmp($_SESSION['kelompok'],'Pegawai')==0) or (strcmp($_SESSION['kelompok'],'Pemilik')==0)){
        //          $hasil = true;
        //        }else{
        //          $hasil = false;
        //        }
        //       break;     
        //       case "laporan1":
        //         //yang berhak hanya pegawai dan pemilik
        //         if((strcmp($_SESSION['kelompok'],'Pegawai')==0) or (strcmp($_SESSION['kelompok'],'Pemilik')==0)){
        //            $hasil = true;
        //          }else{
        //            $hasil = false;
        //          }
                break;   
         default:
             $hasil = false;
     }
     return $hasil;
   }
   
?>
