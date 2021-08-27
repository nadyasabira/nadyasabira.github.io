
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0 text-dark">Supplier</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <hr>
    <div class="row">
    <div class="col">
    <div class="col-md-6 grid-margin stretch-card">
    <div class="container">
    <div class="card">
    <div class="card shadow w-80">
    <div class="card-header"><strong>Tambah Data Supplier</strong></div>
    <div class="container">
   	<div class="card-body">
    <form action="<?= base_url('supplier/input_form') ?>" method="POST">
	<div class="form-row">
  	<div class="form-group col-md-12">
		<input type="hidden" class="form-control" name="id" value="<?php echo set_value('$id'); ?>" readonly>
	</div>	
	<div class="form-group col-md-12">
		<label for="nama_supplier">Nama Supplier</label>
		<input type="text" class="form-control" name="nama_supplier" value="<?php echo set_value('nama_supplier'); ?>" placeholder="Masukkan nama cth: Hendro">
		<?php echo "<b><font color='red'>".form_error('nama_supplier')."</font></b>"; ?> 
	</div><br>		
	<div class="form-group col-md-12">
		<label for="no_telp">No Telp</label>
		<input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo set_value('no_telp'); ?>" placeholder="Masukkan Nomor Telepon">	
		<?php echo "<b>".form_error('no_telp')."</b>"; ?> 
	</div><br>
	<div class="form-group col-md-12">
		<label for="alamat">Alamat</label>
		<textarea class="form-control" id="alamat" name="alamat" value="<?php echo set_value('alamat'); ?>" placeholder="Masukkan Alamat" rows="3"></textarea>
		<?php echo "<b><font color='red'>".form_error('alamat')."</font></b>"; ?> 	
	</div> <br>
	<div class="form-group col-md-12">
		<label for="email">Email</label>
		<input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Masukkan email cth: axl@gmail.com">
		<?php echo "<b><font color='red'>".form_error('email')."</font></b>"; ?> 	
	</div><br>
	<div class="row">
	<div class="col-sm-12"align="center">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-danger" href="<?= base_url('supplier/view_data') ?>" role="button">Batal</a>
   	</div>
	</div> 
	</div>
	</div>
	</div>
	</div>	
	</form>
	</div>
	</div>
	</div>
	</div>
	</div>
</div>
	<script>
		$(document).ready(function(){
			// Format telepon.
			$( '#a' ).mask('999-999-999-999-999-999', {reverse: true});
			
		})
	 </script>
</body>
</html>