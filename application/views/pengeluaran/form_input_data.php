<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <h1 class="m-0 text-dark">Form Pengeluaran Bahan Baku</h1>
        </div><!-- /.col -->
     	</div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div><hr>
	<div class="row">
	<div class="col">
	<div class="col-md-5 grid-margin stretch-card">
	<div class="container-fluid">
	<div class="card shadow">
	<div class="card-header">
		<strong>Pengeluaran Bahan Baku</strong>
	</div>
  <div class="card-body">
  <table id="example" name = "example" class="table table-striped table-bordered" style="width:100%" align="center">
  <form action="<?php echo site_url('pengeluaran_bb/input_form') ?>" method="post" >
  	<input type="hidden" name="keterangan" value="produksi" />	
  	<input type="hidden" name="harga_satuan" value="0" />	
  	<input type="hidden" name="total" value="0" />	
	<div class="row">
	<div class="form-group col-md-12">
		<label>ID Pengeluaran</label>
		<input type="text" name="id_keluar" value="<?php echo $id_keluar?>" readonly class="form-control">
	</div><br>
	</div><br>
	<div class="form-group col-md-12">
  	<label>Tanggal</label>
  	<?php echo "<b>".form_error('datetimepicker')."</b>"; ?> 		
    <input type="date" name="datetimepicker" value="<?php echo set_value('datetimepicker'); ?>" class="form-control" id="datetimepicker" readonly>
  </div>
	</div><br>
  <div class="form-group col-md-12">
		<label for="no_nota">No Faktur Pesanan</label>
		<select name = "no_nota" class = "form-control" id="no_nota">
			<option value="" style="text-align:center"disabled selected>-Pilih No Faktur-</option>
			<?php
				foreach($nota as $brg){
					echo "<option value = ".$brg['no_nota'].">".$brg['no_nota']."</option>";
				}
			?>
		</select>
	</div><br>
<div class="row">
<div class="col-sm-12" style="background-color:white;" align="center">
<button type="submit" class="btn btn-primary">Simpan</button>
<a class="btn btn-danger" href="<?= base_url('pengeluaran_bb') ?>" role="button">Batal</a>
</div></center>
</div><p>
</form>	
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/moment-with-locales.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js"></script>	
<script type="text/javascript">
 	$(document).ready( function() {
   	var now = new Date();
  	var month = (now.getMonth() + 1);               
   	var day = now.getDate();
   	if (month < 10) 
     	month = "0" + month;
   	if (day < 10) 
     	day = "0" + day;
   	var today = now.getFullYear() + '-' + month + '-' + day;
   	$('#datetimepicker').val(today);
	});
</script>		
</body>
</html>