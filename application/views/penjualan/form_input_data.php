
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-">
          <div class="col">
            <h1 class="m-0 text-dark">Form Pemesanan </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <hr>
	<center>
	<div class="row">
	<div class="col">
	<div class="col-md-8 grid-margin stretch-card">
	<div class="container-fluid">
	<div class="card shadow">
	<div class="card-header">

		<strong>Isi Form Dibawah Ini!</strong>
	</div>
  <div class="card-body">
  <table id="example" name = "example" class="table table-striped table-bordered" style="width:100%" align="center">
  <form action="<?php echo site_url('penjualan/input_form') ?>" method="post" >

	<div class="form-row">
	<div class="form-group col-md-5">
		<label>No. Faktur</label>
		<input style="text-align-last: center;"type="text" name="no_faktur" value="<?php echo $faktur?>" readonly class="form-control">
	</div>
	</div><p>
	<div class="form-row">
		<div class="form-group col-md-5">
		  <label for="id_konsumen">Nama Konsumen </label><br>
      <?= form_error('id_konsumen', '<medium class="text-danger pl-3">', '</medium>'); ?>
		  <select class="form-select" name="id_konsumen" style="text-align-last: center;">
		  <option value=""> Pilih Konsumen </option>
			<?php
			foreach($konsumen as $cacah):
				?>	
					<option value="<?php echo $cacah['id_konsumen']?>"><?php echo $cacah['nama_konsumen']?></option>
				<?php
			endforeach;
		  ?>
		  </select>
	 </div> 
	 <!-- <input type="hidden" name="id_konsumen" id="id_konsumen">
                <input type="text" readonly class="form-control" placeholder="Pelanggan" id="nama_konsumen" name="nama_konsumen"> -->
	 </div><p>
	<div class="form-row">
	<div class="form-group col-5" >
		<label for="tanggal">Tanggal Pemesanan</label>
		<?php echo "<b>".form_error('datetimepicker')."</b>"; ?> 	
		<input  style="text-align-last: center;"type="text" class="form-control" value="<?php echo date("Y-m-d");?>"name="datetimepicker" id="datetimepicker"placeholder="Tanggal Transaksi">
	 </div> 
	 </div><p>
<div class="row">
<div class="col-sm-12" style="background-color:white;" align="center">
<button type="submit" class="btn btn-success">Simpan</button>
</div>
</div>
<p>

            </table>
            </div>          
            </div>
          </div>
        </div>

<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/moment-with-locales.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>


<script type="text/javascript">
$(function () { 
$('.datetimepicker').datetimepicker({
format: 'YYYY-MM-DD HH:mm:ss',

});
});
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
  	flatpickr(document.getElementById('datetimepicker'), {
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

    //  function loaddatabarang(){
    //   var id_user = $("#id_user").val();
    //   $.ajax({
    //     type: 'POST',
    //     url: '<?php echo base_url();?>penjual/getDatabarangtemp',
    //     data: {
    //       id_menu: id_menu
    //     },
    //     cache: false,
    //     success: function(respond) {
    //       $("#loaddatabarang").html(respond);
    //     }
    //   });
    // }

    // loaddatabarang();
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

    

//   $("#formPenjualan").submit(function() {
//       var no_faktur = $("#no_faktur").val();
//       var tgltransaksi = $("#tgltransaksi").val();
//       var id_konsumen = $("#id_konsumen").val();
//       var jenistransaksi = $("#jenistransaksi").val();
       
//       if(no_faktur == ""){
//         swal("Opps!", "No Faktur Harus Diisi", "warning");
//         return false;
//       }else if(tgltransaksi == ""){
//         swal("Opps!", "Tanggal Harus Diisi", "warning");
//         return false;
//       }else if(id_konsumen == ""){
//         swal("Opps!", "Konsumen Harus Diisi", "warning");
//         return false;
//       }else if(jenistransaksi == ""){
//         swal("Opps!", "Jenis Transaksi Harus Diisi", "warning");
//         return false;
//       } else{
//         return true;
//       }
//   }); 

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

//   $("#id_menu").click(function(){
//     $("#modalbarangharga").modal("show");
//   });

//   $("#tabelmenu").DataTable();

//   $(".pilihbarang").click(function(){
//     var idmenu = $(this).attr("data-kodemen");
//     var namamenu = $(this).attr("data-namamen");
//     var harga = $(this).attr("data-harga");
//     var ukuran = $(this).attr("data-ukuran");
//     $("#id_menu").val(idmenu);
//     $("#nama").val(namamenu);
//     $("#harga").val(harga);
//     $("#ukuran").val(ukuran);
//     $("#modalbarangharga").modal("hide");
//   });

//   $("#tambahbarang").click(function(){
//     var no_faktur = $("#no_faktur").val();
//     var id_menu = $("#id_menu").val();
//     var harga = $("#harga").val();
//     var ukuran = $("#ukuran").val();
//     var qty = $("#qty").val();
//     // var id_user = $("#id_user").val();
    
//     if (id_menu == "") {
//       swal("Opps!", "Menu Harus Dipilih", "warning");
//     }else if (qty == "" || qty == 0) {
//       swal("Opps!", "QTY Harus Diisi", "warning");
//     }else {
//       $.ajax({
//         type: 'POST',
//         url: '<?php echo base_url(); ?>penjual/simpanbarangtemp',
//         data: {
//           no_faktur: no_faktur,
//           id_menu: id_menu,
//           harga: harga,
//           ukuran: ukuran,
//           qty: qty
//           // id_user: id_user
//         },
//         cache: false,
//         success: function(respond) {
//           if(respond==1){
//             swal("Opps!", "Data sudah ada", "warning");
//           }

//         }
//       });
//     }
//   });

});

</script>
</body>
</html>






