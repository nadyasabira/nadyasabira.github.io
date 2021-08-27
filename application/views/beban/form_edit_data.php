
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
							<div class="card-header"><strong>Edit Data!</strong></div>
							<div class="container">
								<div class="card-body">
									<?php
									foreach($data_form_input as $cacah):
										$kode_akun=$cacah['kode_akun'];
										$jenis_beban=$cacah['jenis_beban'];
										$nama_beban=$cacah['nama_beban'];
										// $ukuran=$cacah['ukuran'];
									endforeach;
									?>
									<?php echo form_open('beban/edit_form/'.$kode_akun); ?>
									<div class="form-row">
									<div class="form-group col-md-12">
											<label for="kode_akun"> ID Beban<span class="text-danger">*</span></label>
											<?php echo "<b><font color='red'>".form_error('kode_akun')."</font></b>"; ?>  	
											<input type="text" class="form-control" name="kode_akun" readonly value="<?php echo $kode_akun; ?>" placeholder="Masukkan nama bahan baku cth: Tepung">
										</div><br>
										<div class="form-group mb-3">
                            				<label for="jenis_beban">Jenis Beban </label>
                            				<?php echo "<b>".form_error('jenis_beban')."</b>"; ?> 	
                            				<select class="form-select" name="jenis_beban"><?php echo $jenis_beban?>
                            					<option value=""></option>
                            					<option value="Beban Operasional">Beban Operasional</option>
                            					<option value="Beban Administrasi Umum">Beban Administrasi Umum</option>			
                            				</select></div>

									<div class="form-group col-md-12">
											<label for="nama_beban"> Nama Beban <span class="text-danger">*</span></label>
											<?php echo "<b><font color='red'>".form_error('nama_beban')."</font></b>"; ?>  	
											<input type="text" class="form-control" name="nama_beban" value="<?php echo $nama_beban; ?>" placeholder="Masukkan nama bahan baku cth: Tepung">
										</div><br>

										
										
										<div class="form-group" align="center">
											<button type="submit" class="btn btn-primary">Simpan</button>
											<a class="btn btn-danger" href="<?= base_url('beban/index') ?>" role="button">Batal</a>
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