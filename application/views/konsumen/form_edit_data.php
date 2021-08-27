
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col">
					<h1 class="m-0 text-dark"> Edit Konsumen</h1>
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
										$id_konsumen=$cacah['id_konsumen'];
										$nama_konsumen=$cacah['nama_konsumen'];
										$alamat=$cacah['alamat'];
										$no_telp=$cacah['no_telp'];
									endforeach;
									?>
									<?php echo form_open('konsumen/edit_form/'.$id_konsumen); ?>
									<div class="form-row">
										<div class="form-group col-md-12">
											<input type="hidden" class="form-control" name="id_konsumen" value="<?php echo $id_konsumen; ?>">
											<label for="nama_konsumen"> Nama Konsumen <span class="text-danger">*</span></label>
											<?php echo "<b><font color='red'>".form_error('nama_konsumen')."</font></b>"; ?>  	
											<input type="text" class="form-control" name="nama_konsumen" value="<?php echo $nama_konsumen; ?>" placeholder="Masukkan nama_konsumen bahan baku cth: Tepung">
										</div><br>
										<div class="form-group">
											<label for="alamat">Alamat<span class="text-danger">*</span></label>
											<?php echo "<b><font color='red'>".form_error('alamat')."</font></b>"; ?> 
											<input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>" placeholder="Masukkan nama_konsumen bahan baku cth: Tepung">
										</div><br>
										<div class="form-group">
											<label for="no_telp">Nomor Telepon<span class="text-danger">*</span></label>
											<?php echo "<b><font color='red'>".form_error('no_telp')."</font></b>"; ?> 
												<input type="text" class="form-control" name="no_telp" value="<?php echo $no_telp; ?>" placeholder="Masukkan nama_konsumen bahan baku cth: Tepung">
										</div><br>
										
										<div class="form-group" align="center">
											<button type="submit" class="btn btn-primary">Simpan</button>
											<a class="btn btn-danger" href="<?= base_url('konsumen/index') ?>" role="button">Batal</a>
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