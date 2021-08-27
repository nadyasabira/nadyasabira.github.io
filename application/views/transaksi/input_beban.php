
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-">
          <div class="col">
            <h1 class="m-0 text-dark">Form Pengeluaran Beban </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <hr>
	<center>
	<div class="row">
	<div class="col">
	<div class="col-md-10 grid-margin stretch-card">
	<div class="container-fluid">
	<div class="card shadow">
	<div class="card-header">
		<strong>Isi Form Dibawah Ini!</strong>
	</div>
  <div class="card-body">
  <table id="example" name = "example" class="table table-striped table-bordered" style="width:100%" align="center">
  <form action="<?php echo site_url('transaksi/input_beban') ?>" method="post" >
	<div class="row">
	<center>
	<div class="form-group col-md-5">
		<label>No. Transaksi Beban</label>
		<!--  -->
		<input type="text" style="text-align-last: center;"name="id_trans_beban" value="<?php echo $id_trans_beban?>" readonly class="form-control">
	</div><br>
	
	<div class="form-group col-md-5">
   <label>Tanggal Transaksi</label>
  	<?php echo "<b>".form_error('datetimepicker')."</b>"; ?> 		
    <div class="input-icon col-mb-5" style="text-align-last: center;">
          <span class="input-icon-addon">		  
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
          </span>			   
		  <?php echo "<b>".form_error('datetimepicker')."</b>"; ?> 	
          <input type="text" class="form-control" value="<?php echo date("Y-m-d");?>"name="datetimepicker" id="datetimepicker"placeholder="Tanggal Transaksi">
          </div><p>  </div><br> 
	<!-- <div class="row"> -->
	<div class="form-group col-md-5">
		  <label for="kode_akun">Nama Beban </label>
		  <?php echo "<b>".form_error('kode_akun')."</b>"; ?> 	
		  <select class="form-select" name="kode_akun"style="text-align-last: center;">
		  <option value="">--Pilih Beban--</option>
			<?php
			foreach($all_beban as $cacah):
				?>	
					<option value="<?php echo $cacah['kode_akun']?>"><?php echo $cacah['nama_beban']?></option>
				<?php
			endforeach;
		  ?>
		  </select>
	 </div> <br>
     <div class="form-group col-5">
		<label>Total</label>
		<?php echo "<b>".form_error('total')."</b>"; ?> 	
		<input type="number"style="text-align-last: center;" name="total" value="total"  class="form-control" placeholder="Masukkan Total Beban">
	</div></div>
	</div><p></center>
<div class="row">
<div class="col-sm-12" style="background-color:white;" align="center">
<button type="submit" class="btn btn-success">Simpan</button>
</div></center>
</div>
<p>

</form>	

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
</body>
</html>






