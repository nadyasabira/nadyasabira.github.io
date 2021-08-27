<div class="container">
<center>
  <h3> Data Pesanan</h3>
 </center><br></center>
<div class="container">
<div class="card">
  <div class="card-body">

     <div class="row mt-3">
       <div class="col-5">
         <div class="py-2">
          <a href="http://localhost/pakhir/index.php/penjualan/input_form" class="btn btn-primary btn-sm active mb-3" role="button" aria-pressed="true">Tambah Pesanan</a>
          <a href="http://localhost/pakhir/index.php/C_Laporan/view_jual" class="btn btn-danger btn-sm active mb-3" role="button" aria-pressed="true">Laporan Penjualan</a>

         </div>
       </div>
     </div>
     <form action="<?php echo base_url(); ?>penjualan/index" method="POST">
       <div class="input-icon mb-3">
         <span class="input-icon-addon">
          <i class="fa fa-barcode"></i>
        </span>
        <input type="text" value="<?php echo $no_nota?>"class="form-control" placeholder="No Faktur" id="no_nota" name="no_nota">
       </div>
       <div class="input-icon mb-3">
         <span class="input-icon-addon">
          <i class="fa fa-barcode"></i>
         </span>
         <input type="text" value="<?php echo $nama_konsumen?>"class="form-control" placeholder="Nama Konsumen" id="nama_konsumen" name="nama_konsumen">
       </div>
       <div class="row">
       
         <div class="col-md-6">Tanggal Masuk
          <div class="input-icon mb-3">
            <span class="input-icon-addon">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                 <rect x="4" y="5" width="16" height="16" rx="2" />
                 <line x1="16" y1="3" x2="16" y2="7" />
                 <line x1="8" y1="3" x2="8" y2="7" />
                 <line x1="4" y1="11" x2="20" y2="11" />
                 <line x1="11" y1="15" x2="12" y2="15" />
                 <line x1="12" y1="15" x2="12" y2="18" />
               </svg>
            </span>
            <input type="date" value="<?php echo $dari?>"class="form-control" name="dari" id="dari" placeholder="Dari">
          </div>
         </div>
         <div class="col-md-6">Tanggal Keluar     
           <div class="input-icon mb-3">
             <span class="input-icon-addon">
               <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                 <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                 <rect x="4" y="5" width="16" height="16" rx="2" />
                <line x1="16" y1="3" x2="16" y2="7" />
                 <line x1="8" y1="3" x2="8" y2="7" />
                 <line x1="4" y1="11" x2="20" y2="11" />
                 <line x1="11" y1="15" x2="12" y2="15" />
                 <line x1="12" y1="15" x2="12" y2="18" />
               </svg>
             </span>
             <input type="date" value="<?php echo $sampai?>" class="form-control" name="sampai" id="sampai" placeholder="Sampai">
           </div>
        </div>
       </div>
       <div class="mb-3">
        <button type="submit" name="submit" id="submit" class="btn btn-primary w-100"><i class="fa fa-search mr-2"></i> Cari Data</button>
       </div>
     </form>
     <table id="example" name="example" class="table table-striped table-bordered">
       <thead>
         <tr>
         <th class="text-center">No</th>
          <th class="text-center">No Faktur Penjualan</th>
          <th class="text-center">ID Konsumen</th>
           <th class="text-center">Nama Konsumen</th>
          <th class="text-center">Tanggal Bayar</th>
          <th class="text-center">Tanggal Lunas</th>
          <th class="text-center">Total Penjualan</th>
          <th class="text-center">Total DP </th>
          <th class="text-center"> Sisa Bayar </th>
           <th class="text-center">Status </th>
           <th class="text-center" colspan="3">Total</th>
           <!-- <th class="text-center">Hapus</th> -->
         </tr>
       </thead>
      <tbody>
         <?php
         $row = 0;
         $no = $row + 1;
        foreach ($penjualan as $cacah){
          ?>
            <tr>
              <td><?php echo $no;?></td>
              <td><?php echo $cacah->no_nota;?></td>
              <td><?php echo $cacah->id_konsumen;?></td>
              <td><?php echo $cacah->nama_konsumen;?></td>
              <td><?php echo $cacah->waktu;?></td>
              <td><?php echo $cacah->waktu_lunas;?></td>
              <td><?php echo number_format($cacah->totalpenjualan);?></td>
              <td><?php echo number_format($cacah->jumlah_dp);?></td>
              <td><?php echo number_format($cacah->totalpenjualan - $cacah->jumlah_dp);?></td>
              
          <td align="center"><?php echo $cacah->status; ?></td>
          <td align="center">

          <button onclick="location.href = '<?php echo site_url('penjualan/view_data_penjualan_detail2/' . $cacah->no_nota) ?>'" type="button" class="btn btn-info btn-sm">
              <span class="glyphicon glyphicon-menu-hamburger"></span> Detail
           </td>
           <td align="center">

          <a href="<?php echo base_url(); ?>penjualan/cetak_laporan_penjualan_ke_pdf/<?php echo $cacah->no_nota; ?>" class="btn btn-sm btn-primary"><i class="fa fa-print"></i></a>
           </td>
           <td>
           
            <?php if ($cacah->status == 'Lunas') {
               echo "";
             } else {
             ?>
              <button onclick="location.href = '<?php echo site_url('penjualan/proses/' . $cacah->no_nota . '/' . $cacah->id_konsumen) ?>'" type="button" class="btn btn-success btn-sm">Simpan </td></button>
              
              </tr>
          <?php }
               $no++;
              }
                        
        ?>       
        <!-- <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-print"></i></a>  -->

       </tbody>

    </table>
    <div><?php echo $pagination; ?></div>
 <script>
 $(document).ready(function() {
   $('#example').DataTable({
    "pagingType": "full_numbers"
   });
  });
 </script>
   <script>
function deleteConfirm(url) {
  $('#btn-delete').attr('href', url);
  $('#deleteModal').modal();
                                                                                                                                                                                                                              }
  </script>
  <!-- Logout Delete Confirmation-->
 <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">X</span>
  </button>
  </div>
  <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
  <div class="modal-footer">
   <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
   <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
  </div>
  </div>
  </div>
 </div>
  </div>
 </div>
  </body>
  </html>