  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0 text-dark">Penjualan Pesanan Kue</h1>
			
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
	<hr>
  <h2 class="page-title">
      Data Penjualan
    </h2>
<form action="<?php echo site_url('penjualan/input_form_detail') ?>" id="formPenjualan"method="post"  >

		<input type="hidden" name="no_faktur" value="<?php echo $_SESSION['no_faktur']; ?>" />	
		<input type="hidden" name="datetimepicker" value="<?php echo $_SESSION['datetimepicker']; ?>" />
		<input type="hidden" name="id_konsumen" value="<?php echo $_SESSION['id_konsumen']; ?>" />
  
    <div class="row">
        <div class="col-md-5">
          <div class="card">
            <div class="card-body">
            <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                      <i class="fa fa-barcode"></i>
                    </span>
                    <input type="text" readonly class="form-control" placeholder="Kode Menu" id="id_menu" name="id_menu">
                  </div>       
                  <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="6" height="6" rx="1" /><rect x="14" y="4" width="6" height="6" rx="1" /><rect x="4" y="14" width="6" height="6" rx="1" /><rect x="14" y="14" width="6" height="6" rx="1" /></svg>
                    </span>
                    <input type="text" readonly class="form-control" placeholder="Nama Menu" id="nama" name="nama">
                  </div>
                  <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                    </span>
                    <input type="text" readonly class="form-control" style="text-align:left"placeholder="Harga" id="harga" name="harga">
                  </div> 
                  
                  <div class="input-icon mb-3">
                    
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">                        
                      </div>
                      <input type="text" class="form-control" placeholder="Ukuran" style="text-align:right" id="ukuran" name="ukuran" readonly>
                      <span class="input-group-text">CM</span>
                    </div>
                  </div></div>
                
                  <div class="input-icon mb-3">  
		  <!-- <label for="jenis">Bentuk </label> -->
		  
		  <select class="form-select" name="jenis" id="bentuk">
		  <option value="" >Pilih Bentuk</option>
			<option value="kotak">Kotak</option>
			<option value="bulat">Bulat</option>			
		  </select>
	 </div> 
	
	  
                  <div class="input-icon mb-3">
                   
                    <input type="number" class="form-control" placeholder="QTY" id="jumlah" name="jumlah">
                  </div> 
				<div class="col-md-1" align="right">
                    <button type="submit" class="btn btn-primary">
                    <i class="fa fa-cart-plus" style="font-size:1.3rem"></i>
                  </button>
                  <?php echo "<b>".form_error('nama')."</b>"; ?> 
                </div>
              </div>
	<p>
	</div></div>
	</form>	
	
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
                    <!-- <th>Kode harga</th> -->
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
                        // echo "<td>".$cacah['kode_harga']."</td>";
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
              <h4 class="card-title"> Rincian Pemesanan </h4>
            </div>
	<div class="container"><br>
	<table class="table table-bordered table-hover" style="width:100%" align="center">
        <thead>
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">No Faktur</th>
                <th class="text-center">Tanggal</th>                
				<!-- <th class="text-center">Nama Pelanggan</th> -->
                <th class="text-center">Nama Menu </th>
				<th class="text-center">Bentuk</th>
				<!-- <th class="text-center">Ukuran</th> -->
                <th class="text-center">Jumlah</th>
				<th class="text-center">Harga</th>
        <th class="text-center">HPP</th>        
				<th class="text-center">Total</th>
				<th class="text-center">Aksi</th>
		
            </tr>
        </thead>
        <tbody>
		<?php
			$total = 0;
			foreach($isi_data as $cacah):
				echo "<tr>";
					echo "<td>".$cacah['id_transaksi_penjualan']."</td>";
					echo "<td>".$cacah['no_nota']."</td>";
          echo "<td>".$cacah['waktu']."</td>";
					// echo "<td>".$cacah['nama_konsumen']."</td>";
					echo "<td>".$cacah['nama']."</td>";
					echo "<td>".$cacah['jenis']."</td>";	
					// echo "<td>".$cacah['nama_kategori']." CM</td>";					
					echo "<td>".$cacah['jml_beli']."</td>";
          echo "<td>Rp ".number_format($cacah['harga_jual'])."</td>";
          echo "<td>Rp ".number_format($cacah['harga_jual']*80/100)."</td>";          
					echo "<td>Rp ".number_format($cacah['jml_beli']*$cacah['harga_jual'])."</td>";
				echo "<td>"
						?>
						<a onclick="deleteConfirm('<?php echo site_url('penjualan/delete_form_detail2/'.$cacah['id_transaksi_penjualan']) ?>')" href="#!" class="btn btn-danger btn-sm">
								<span class="glyphicon glyphicon-trash"></span> Hapus
							</a>
						<?php
					echo "</td>";
				echo "</tr>";
				$total = $total  + $cacah['jml_beli']*$cacah['harga_jual'];
			endforeach;
		?>
		<tr>
                <th class="text-center" colspan="8">Grand Total</th>
                <th class="text-center" colspan="2">
                  <p id="grandtotal"><?php echo "Rp ".number_format($total);?></p></th>
        </tr>
        </tbody>
		
      
			
    </table>
	<div class="form-group" align="right">

											<a href="#"class="btn btn-success" role="button" id="tambah">Bayar</a>

</div><br>
</div>

<script>
$(function(){
	$("#formPenjualan").submit(function() {
      var id_menu = $("#id_menu").val();
      var bentuk = $("#bentuk").val();
      var jumlah = $("#jumlah").val();
       
      if(id_menu == ""){
        swal("Opps!", "Menu Harus Dipilih", "warning");
        return false;
      }else if(bentuk == ""){
        swal("Opps!", "Bentuk Kue Harus Diisi", "warning");
        return false;
      }else if(jumlah == ""){
        swal("Opps!", "Jumlah Harus Diisi", "warning");
        return false;
      } else{
        return true;
      }
  }); 
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

    function loadgrandtotal() {
      var grandtotal = $("#grandtotal").text();
      $("#totalpenjualan").text(grandtotal);
    }
    loadgrandtotal();
    

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
	var bentuk = $("#bentuk").val();
    var jumlah = $("#jumlah").val();
   
    
    if (id_menu == "") {
      swal("Opps!", "Menu Harus Dipilih", "warning");
    }else if (jumlah == "" || jumlah == 0) {
      swal("Opps!", "jumlah Harus Diisi", "warning");
    }else {
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>penjualan/input_form_detail',
        data: {
          // no_faktur: no_faktur,
          id_menu: id_menu,
          harga: harga,
          ukuran: ukuran,
          jumlah: jumlah,
		      bentuk: bentuk,
        //   id_user: id_user
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


		 <script>
		$(document).ready(function(){
			// Format mata uang.
			$('#harga').mask('0.000.000.000.000.000', {reverse: true});		
			
		})
		</script>
	<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>
<script>
        $(function(){
            $("#tambah").click(function(){
                $("#modalbayar").modal("show");
                $("#loadforminputbayar").load("<?php echo base_url(); ?>penjualan/bayar");
            });
            
            $('#tabelbayar').DataTable();
        });
    </script>
    <script>
  var produkGetNamaUrl = '<?php echo site_url('produk/get_nama') ?>';
  var produkGetStokUrl = '<?php echo site_url('produk/get_stok') ?>';
  var addUrl = '<?php echo site_url('transaksi/add') ?>';
  var getBarcodeUrl = '<?php echo site_url('produk/get_barcode') ?>';
  var pelangganSearchUrl = '<?php echo site_url('pelanggan/search') ?>';
  var cetakUrl = '<?php echo site_url('transaksi/cetak/') ?>';
</script>
<script src="<?php echo base_url('assets/js/unminify/transaksi.js') ?>"></script>
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
<div class="modal modal-blur fade" id="modalbayar" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Input Produk</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <div id="loadforminputbayar"></div>
            </div>          
            </div>
          </div>
        </div>
<div class="row">
		<div class="col-sm-12" style="background-color:white;" align="right">
			
		</div>

	</div>	


