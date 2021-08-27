
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col">
					<h1 class="m-0 text-dark"> Edit Kategori</h1>
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
										$id_kategori=$cacah['id_kategori'];
										$nama_kategori=$cacah['nama_kategori'];
										$satuan=$cacah['satuan'];
									
									endforeach;
									?>
									<?php echo form_open('ukuran/edit_form/'.$id_kategori); ?>
									<div class="form-row">
										<div class="form-group col-md-12">
											<input type="hidden" class="form-control" name="id_kategori" value="<?php echo $id_kategori; ?>">
											<label for="nama_kategori"> Nama kategori<span class="text-danger">*</span></label>
											<?php echo "<b><font color='red'>".form_error('nama_kategori')."</font></b>"; ?>  	
											<input type="text" class="form-control" name="nama_kategori" value="<?php echo $nama_kategori; ?>" placeholder="Masukkan nama bahan baku cth: Tepung">
										</div><br>
										<label for="satuan">Satuan<span class="text-danger">*</span></label>
											<?php echo "<b><font color='red'>".form_error('satuan')."</font></b>"; ?>  	
											<input type="text" class="form-control" name="satuan" value="<?php echo $satuan; ?>" placeholder="Masukkan nama bahan baku cth: Tepung">
										</div><br>
										
										<div class="form-group" align="center">
											<button type="submit" class="btn btn-primary">Simpan</button>
											<a class="btn btn-danger" href="<?= base_url('ukuran/index') ?>" role="button">Batal</a>
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