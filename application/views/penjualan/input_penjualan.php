<h2 class="page-title">
      Data Penjualan
    </h2>
    <form id="formPenjualan" method="POST">

      <div class="row">
        <div class="col-md-5">
          <div class="card">
            <div class="card-body">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><rect x="5" y="11" width="1" height="2" /><line x1="10" y1="11" x2="10" y2="13" /><rect x="14" y="11" width="1" height="2" /><line x1="19" y1="11" x2="19" y2="13" /></svg>
                </span>
                <input style="text-align-last: left;"type="text" name="no_faktur" value="<?php echo $faktur?>" readonly class="form-control">
              </div> 
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                </span>
                <input type="text" class="form-control" value="<?php echo date("Y-m-d");?>"name="tgltransaksi" id="tgltransaksi"placeholder="Tanggal Transaksi">
              </div> 
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                </span>
                <input type="hidden" name="id_konsumen" id="id_konsumen">
                <input type="text" readonly class="form-control" placeholder="Pelanggan" id="nama_konsumen" name="nama_konsumen">
              </div> 
              <div class="mb-3">
                <select name="jenistransaksi" id="jenistransaksi" class="form-select">
                  <option value="">Pilih Jenis Transaksi </option>
                  <option value="tunai">Tunai</option>
                  <option value="kredit">Kredit</option>
                </select>
              </div>
              <div class="input-icon mb-3" id="jt">
                <span class="input-icon-addon">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                </span>
                <input type="text" readonly class="form-control" placeholder="Jatuh Tempo" id="jatuhtempo" name="jatuhtempo">
              </div> 
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                </span>
                <input type="hidden" value="<?php echo $this->session->userdata('id_user'); ?>" name="id_user" id="id_user">
                <input type="text" value="<?php echo $this->session->userdata('id_user') ." - " . $this->session->userdata('nama_lengkap'); ?>"readonly class="form-control" placeholder="Kasir" id="username" name="username">
              </div>
            </div>
          </div> 
        </div>
        <div class="col-md-7">
          <div class="card card-sm">
            <div class="card-body d-flex align-items-center">
              <span class="bg-blue text-white avatar mr-3" style="height: 9rem; width:9rem;">
                <i class="fa fa-shopping-cart" style="font-size:5rem"></i>
              </span>
              <div class="mr-3">
                <h2 id="totalpenjualan" style="font-size:5rem">0</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Data Barang </h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-2">
                  <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                      <i class="fa fa-barcode"></i>
                    </span>
                    <input type="text" readonly class="form-control" placeholder="Kode Menu" id="id_menu" name="id_menu">
                  </div> 
                </div>
                <div class="col-md-3">
                  <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="6" height="6" rx="1" /><rect x="14" y="4" width="6" height="6" rx="1" /><rect x="4" y="14" width="6" height="6" rx="1" /><rect x="14" y="14" width="6" height="6" rx="1" /></svg>
                    </span>
                    <input type="text" readonly class="form-control" placeholder="Nama Menu" id="nama" name="nama">
                  </div> 
                </div>
                <div class="col-md-2">
                  <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                    </span>
                    <input type="text" readonly class="form-control" style="text-align:right"placeholder="Ukuran" id="ukuran" name="ukuran">
                  </div> 
                </div>
                <div class="col-md-2">
                  <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                    </span>
                    <input type="text" readonly class="form-control" style="text-align:right"placeholder="Harga" id="harga" name="harga">
                  </div> 
                </div>
                <div class="col-md-2">
                  <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect width="6" height="6" x="9" y="5" rx="1" /><line x1="4" y1="7" x2="5" y2="7" /><line x1="4" y1="11" x2="5" y2="11" /><line x1="19" y1="7" x2="20" y2="7" /><line x1="19" y1="11" x2="20" y2="11" /><line x1="4" y1="15" x2="20" y2="15" /><line x1="4" y1="19" x2="20" y2="19" /></svg>
                    </span>
                    <input type="text" class="form-control" placeholder="QTY" id="qty" name="qty">
                  </div> 
                </div>
                <div class="col-md-1">
                  <a href="#" class="btn btn-primary" id="tambahbarang">
                    <i class="fa fa-cart-plus" style="font-size:1.3rem"></i>
                  </a>
                </div>
              </div>
              <div class="row">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Harga</th>
                      <th>Ukuran</th>
                      <th>QTY</th>
                      <th>Total</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="loaddatabarang">
                    
                    
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="6">Grand Total</th>
                      <th></th>
                      <th></th>
                    </tr>
                    
                  </tfoot>
                </table>
              </div>
              <div class="row mt-3">
              <button type="submit" class="btn btn-primary w100"><i class="fa fa-send mr-2"></i>Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <div class="modal modal-blur fade" id="modalkonsumen" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Data konsumen</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <table class="table table-striped table-bordered" id="tabelkonsumen">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID konsumen</th>
                    <th>Nama konsumen</th>
               <th>Alamat</th>
                    <th>Nomor Telepon</th>
                         
               
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                    foreach($all_konsumen as $cacah):
                      echo "<tr>";
                        echo "<td>".$no++."</td>";
                        echo "<td>".$cacah['id_konsumen']."</td>";
                        echo "<td>".$cacah['nama_konsumen']."</td>";
                        echo "<td>".$cacah['alamat']."</td>";
                         echo "<td>".$cacah['no_telp']."</td>";
                        echo "<td>";
                  ?>
                    <a href ='#' class="btn btn-sm btn-primary pilih" data-kodekon="<?php echo $cacah['id_konsumen'] ?>" data-namakon="<?php echo $cacah['nama_konsumen'] ?>"> Pilih
             
                    </a>

                    
                  <?php
                        echo "</td>";
                      echo "</tr>";
                    endforeach;
                  ?>
                </tbody>
            </table>
            </div>          
            </div>
          </div>
        </div>
      
       <div class="modal modal-blur fade" id="modalbarangharga" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Data Harga Barang</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <table class="table table-striped table-bordered" id="tabelmenu">
              <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode harga</th>
                    <th>Nama Menu</th>
                    <th>Ukuran</th>
                    <th>Harga</th>

                  <!--   <th>Jenis</th>
                    <th>Ukuran</th>
                    <th>Kategori</th> -->
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                    foreach($all_harga as $cacah):
                      echo "<tr>";
                        echo "<td>".$no++."</td>";
                        echo "<td>".$cacah['kode_harga']."</td>";
                        echo "<td>".$cacah['nama']."</td>";
                         echo "<td>".$cacah['ukuran']." ".$cacah['satuan']."</td>";
                       
                        echo "<td>Rp ".number_format($cacah['harga'])."</td>";
                      
                        echo "<td>";
                  ?>
                     <a href ='#' class="btn btn-sm btn-primary pilihbarang" data-kodemen="<?php echo $cacah['id_menu'] ?>" data-ukuran="<?php echo $cacah['ukuran'] ?>" data-namamen="<?php echo $cacah['nama'] ?>"data-harga="<?php echo $cacah['harga'] ?>"> Pilih
             
             </a>
                  <?php
                        echo "</td>";
                      echo "</tr>";
                    endforeach;
                  ?>
                </tbody>
            </table>
            </div>          
            </div>
          </div>
        </div> 

        

<script type="text/javascript">
$(function () { 
$('.datetimepicker').datetimepicker({
format: 'YYYY-MM-DD HH:mm:ss',

});
});
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
  	flatpickr(document.getElementById('tgltransaksi'), {
  	});
  });
</script>

<script>
  $(function(){
    function hidejatuhtempo() {
        $("#jt").hide();
    }

    function showjt() {
      $("#jt").show();
    }

     function getJatuhtempo(){
       var tgltransaksi = $("#tgltransaksi").val();
       $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>penjual/getJatuhtempo',
          data: {
            tgltransaksi: tgltransaksi
          },
          cache: false,
          success: function(respond){
            $("#jatuhtempo").val(respond);
          }
       });
     }

     function loaddatabarang(){
      var id_menu = $("#id_menu").val();
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url();?>penjual/getDatabarangtemp',
        data: {
          id_menu: id_menu
        },
        cache: false,
        success: function(respond) {
          $("#loaddatabarang").html(respond);
        }
      });
    }

    loaddatabarang();
    getJatuhtempo();
    hidejatuhtempo();
    $("#jenistransaksi").change(function(){
      var jenistransaksi = $(this).val();
      if(jenistransaksi == "kredit"){
        showjt();
      }else{
        hidejatuhtempo();
      }

    });

    $("#tgltransaksi").change(function(){
      getJatuhtempo();
    });

    

  $("#formPenjualan").submit(function() {
      var no_faktur = $("#no_faktur").val();
      var tgltransaksi = $("#tgltransaksi").val();
      var id_konsumen = $("#id_konsumen").val();
      var jenistransaksi = $("#jenistransaksi").val();
       
      if(no_faktur == ""){
        swal("Opps!", "No Faktur Harus Diisi", "warning");
        return false;
      }else if(tgltransaksi == ""){
        swal("Opps!", "Tanggal Harus Diisi", "warning");
        return false;
      }else if(id_konsumen == ""){
        swal("Opps!", "Konsumen Harus Diisi", "warning");
        return false;
      }else if(jenistransaksi == ""){
        swal("Opps!", "Jenis Transaksi Harus Diisi", "warning");
        return false;
      } else{
        return true;
      }
  }); 

  $("#nama_konsumen").click(function(){
    $("#modalkonsumen").modal("show");
  });

  $("#tabelkonsumen").DataTable();

  $(".pilih").click(function(){
    var id_konsumen = $(this).attr("data-kodekon");
    var nama_konsumen = $(this).attr("data-namakon");
    $("#id_konsumen").val(id_konsumen);
    $("#nama_konsumen").val(nama_konsumen);
    $("#modalkonsumen").modal("hide");
  });

  $("#id_menu").click(function(){
    $("#modalbarangharga").modal("show");
  });

  $("#tabelmenu").DataTable();

  $(".pilihbarang").click(function(){
    var idmenu = $(this).attr("data-kodemen");
    var namamenu = $(this).attr("data-namamen");
    var harga = $(this).attr("data-harga");
    var ukuran = $(this).attr("data-ukuran");
    $("#id_menu").val(idmenu);
    $("#nama").val(namamenu);
    $("#harga").val(harga);
    $("#ukuran").val(ukuran);
    $("#modalbarangharga").modal("hide");
  });

  $("#tambahbarang").click(function(){
    // var no_faktur = $("#no_faktur").val();
    var id_menu = $("#id_menu").val();
    var harga = $("#harga").val();
    var ukuran = $("#ukuran").val();
    var qty = $("#qty").val();
    var id_user = $("#id_user").val();
    
    if (id_menu == "") {
      swal("Opps!", "Menu Harus Dipilih", "warning");
    }else if (qty == "" || qty == 0) {
      swal("Opps!", "QTY Harus Diisi", "warning");
    }else {
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>penjual/simpanbarangtemp',
        data: {
          // no_faktur: no_faktur,
          id_menu: id_menu,
          harga: harga,
          ukuran: ukuran,
          qty: qty,
          id_user: id_user
        },
        cache: false,
        success: function(respond) {
          if(respond==1){
            swal("Opps!", "Data sudah ada", "warning");
          }

        }
      });
    }
  });

});

</script>