
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0 text-dark"> Edit Supplier</h1>
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
	<div class="card-header"><strong>Edit Data Supplier</strong></div>
	<div class="container">
	<div class="card-body">
	<?php
		foreach($data_form_input as $cacah):
			$id=$cacah['id_supplier'];
			$nama_supplier=$cacah['nama_supplier'];		
			$alamat=$cacah['alamat'];
			$no_telp=$cacah['no_telp'];
			$email=$cacah['email'];
		endforeach;
	?>
  	<?php echo form_open('supplier/edit_form/'.$id); ?>
	<div class="form-group col-md-12">
		<input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
		<label for="nama_supplier"> Nama Supplier<span class="text-danger">*</span></label>		 
		<input type="text" class="form-control" name="nama_supplier" value="<?php echo $nama_supplier; ?>">
		<?php echo "<b>".form_error('nama_supplier')."</b>"; ?> 	
	</div><br>
	<div class="form-group col-md-12">
		<label for="no_telp">No Telp</label>		
		<input type="text" class="form-control" name="no_telp" value="<?php echo $no_telp; ?>" >
		<?php echo "<b>".form_error('no_telp')."</b>"; ?> 	
	</div> <br>
	<div class="form-group ">
		<label for="alamat">Alamat</label>
		<input type="text" class="form-control" name="alamat" rows="2" value="<?php echo $alamat; ?>" >
		<?php echo "<b>".form_error('alamat')."</b>"; ?> 	
	</div> <br>
	<div class="form-group ">
		<label for="email">Email</label>
		<?php echo "<b>".form_error('email')."</b>"; ?> 	
		<input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
	</div> <br>
	<div class="row"></div>
	<div class="col-sm-12"align="center">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-danger" href="<?= base_url('supplier/view_data') ?>" role="button">Batal</a>
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
</div>
	 <script>
		$(document).ready(function(){
			// Format mata uang.
			$( '#harga' ).mask('0.000.000.000.000.000', {reverse: true});
		})
	 </script>
</body>
</html>