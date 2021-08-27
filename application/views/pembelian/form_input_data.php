<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <h1 class="m-0 text-dark">Pembelian Bahan Baku</h1>
        </div>
      </div>
    </div>
  </div><hr>
	<div class="row">
	<div class="col">
	<div class="col-md-6 grid-margin stretch-card">
	<div class="container-fluid">
	<div class="card shadow">
	<div class="card-header">
		<strong>Transaksi Pembelian Bahan Baku</strong>
	</div>
	<div class="card-body">
  	<form action="<?php echo site_url('pembelian/input_form') ?>" method="post" >
  	<div class="form-row">
		<div class="form-group col-4">
			<label>No. Faktur</label>
			<input type="text" name="no_faktur" value="<?php echo $faktur?>" readonly class="form-control">
		</div><br>
		<div class="form-group col-6" >
			<label for="tanggal">Tanggal Pembelian</label>
			<?php echo "<b>".form_error('datetimepicker')."</b>"; ?> 	
	    <input type="date" name="datetimepicker" value="<?php echo set_value('datetimepicker'); ?>" class="form-control" id="datetimepicker" readonly>
		</div><br>
		<div class="form-group col-7">
			<label for="id_supplier">Supplier</label>
			<select class="form-control" name="id_supplier">
				<?php
					foreach($dataSupplier as $cacah_dataSupplier):
				?>	
				<option value="<?php echo $cacah_dataSupplier['id_supplier']?>"><?php echo $cacah_dataSupplier['nama_supplier']?></option>
				<?php
					endforeach;
				?> 
			</select>
		</div><br>
	</div>
	<div class="form-group" align="center">
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a class="btn btn-danger" href="<?= base_url('pembelian') ?>" role="button">Batal</a>
	</div>
	</form>	
	</div>
	</div>
	</div>
	</div>
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