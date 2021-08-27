<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <h1 class="m-0 text-dark">Form Setoran Modal Awal</h1>
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
		<strong>Setoran Modal Awal</strong>
	</div>
  <div class="card-body">
  <table id="example" name = "example" class="table table-striped table-bordered" style="width:100%" align="center">
  <form action="<?php echo site_url('modal/input_modal') ?>" method="post" >
	<div class="row">
	<div class="form-group col-md-12">
		<label>No. Transaksi</label>
		<input type="text" style="text-align-last: center;"name="id_modal" value="<?php echo $id_modal?>" readonly class="form-control">
	</div><br></div><br>
	
	<div class="form-group col-md-12">
   <label>Tanggal Transaksi</label>
  	<?php echo "<b>".form_error('datetimepicker')."</b>"; ?> 		
    <input type="date" name="datetimepicker" value="<?php echo set_value('datetimepicker'); ?>" class="form-control" id="datetimepicker" readonly>
          </div><p>  </div>
          	<div class="form-group col-12">
		<label>Keterangan</label>
		<?php echo "<b>".form_error('keterangan')."</b>"; ?> 	
		<input type="text"style="text-align-last" name="keterangan"  class="form-control">
	</div></div>
	</div><p>
     <div class="form-group col-12">
		<label>Nominal</label>
		<?php echo "<b>".form_error('nominal')."</b>"; ?> 	
		<input type="text"style="text-align-last" name="nominal"  class="form-control">
	</div></div>
	</div><p>
<div class="row">
<div class="col-sm-12" style="background-color:white;" align="center">
<button type="submit" class="btn btn-primary">Simpan</button>
<a class="btn btn-danger" href="<?= base_url('modal') ?>" role="button">Batal</a>
</div></center>
</div>
<p>

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