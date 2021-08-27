<div class="content-wrapper">
    <div class="content-header">
     	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col">
            		<h1 class="m-0 text-dark"> Edit Bahan Penolong</h1>
         		</div>
        	</div>
    	</div>
    </div><hr>
    <div class="row">
    <div class="col">
    <div class="col-md-6 grid-margin stretch-card">
    <div class="container">
    <div class="card">
    <div class="card shadow w-80">
    <div class="card-header"><strong>Edit Data Bahan Penolong</strong></div>
    <div class="container">
    <div class="card-body">
		<?php
			foreach($data_form_input as $cacah):
				$id_bp=$cacah['id_bp'];
				$nama_bp=$cacah['nama_bp'];
				$satuan=$cacah['satuan'];
				$harga_satuan=$cacah['harga_satuan'];
			endforeach;
		?>
  		<?php echo form_open('bahanpenolong/edit_form/'.$id_bp); ?>
		<div class="form-row">
	 	<div class="form-group col-md-12">
			<input type="hidden" class="form-control" name="id_bp" value="<?php echo $id_bp; ?>">
			<label for="nama_bp"> Nama Bahan Penolong</label>
			<?php echo "<b><font color='red'>".form_error('nama_bp')."</font></b>"; ?>  	
			<input type="text" class="form-control" name="nama_bp" value="<?php echo $nama_bp; ?>">
		</div><br>
		<div class="form-group">
		<label for="satuan">satuan</label>
		<?php echo "<b><font color='red'>".form_error('satuan')."</font></b>"; ?> 
		<select type="text" class="form-control" name="satuan" value="<?php echo $satuan; ?>">	
			<option value="kg">Kg</option>
			<option value="liter">Liter</option>
			<option value="lusin">Lusin</option>
            <option value="pcs">Pcs</option>
		</select>
		</div> <br>
		<div class="form-group col-md-12">
			<label for="harga_satuan">Harga Satuan</label>
			<?php echo "<b><font color='red'>".form_error('harga_satuan')."</font></b>"; ?>  	
			<input type="text" class="form-control" name="harga_satuan" value="<?php echo $harga_satuan; ?>">
		</div><br>
		<div class="form-group" align="center">
			<button type="submit" class="btn btn-primary">Simpan</button>
			<a class="btn btn-danger" href="<?= base_url('bahanpenolong/view_data') ?>" role="button">Batal</a>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
	</body>
</html>