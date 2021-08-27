
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0 text-dark"> Edit Menu</h1>
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
    <div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
    <div class="container">
    <div class="card-body">
		<?php
			foreach($data_form_input as $cacah):
				$id_menu=$cacah['id_menu'];
				$nama=$cacah['nama'];
				$jenis=$cacah['jenis'];
				$ukuran=$cacah['ukuran'];
			endforeach;
		?>
  		<?php echo form_open('menu1/ubah/'.$id_menu); ?>
		<div class="form-row">
	 	<div class="form-group col-md-12">
			<input type="hidden" class="form-control" name="id_menu" value="<?php echo $id_menu; ?>">
			<label for="nama"> Nama Menu<span class="text-danger">*</span></label>
			<?php echo "<b><font color='red'>".form_error('nama')."</font></b>"; ?>  	
			<input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" placeholder="Masukkan nama bahan baku cth: Tepung">
		</div><br>
		<div class="form-group col-md-12">
			<label for="jenis">Jenis<span class="text-danger">*</span></label>
			<?php echo "<b><font color='red'>".form_error('jenis')."</font></b>"; ?>  	
			<input type="text" class="form-control" name="jenis" value="<?php echo $jenis; ?>" placeholder="Masukkan jenis">
		</div><br>
		<div class="form-group col-md-12">
			<label for="ukuran">Ukuran<span class="text-danger">*</span></label>
			<?php echo "<b><font color='red'>".form_error('ukuran')."</font></b>"; ?>  	
			<input type="text" class="form-control" name="ukuran" value="<?php echo $ukuran; ?>" placeholder="Masukkan jenis">
		</div><br>
		<div class="form-group" align="center">
			<button type="submit" class="btn btn-primary">Simpan</button>
			<a class="btn btn-danger" href="<?= base_url('menu1/index') ?>" role="button">Batal</a>
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