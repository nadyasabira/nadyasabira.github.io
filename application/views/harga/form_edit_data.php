
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col">
					<h1 class="m-0 text-dark"> Edit Harga Produk</h1>
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
							<div class="card-header"><strong>Form Edit Data Harga!</strong></div>
							<div class="container">
								<div class="card-body">
									<?php
									foreach($data_form_input as $cacah):
										$kode_harga=$cacah['kode_harga'];	
										$ukuran=$cacah['ukuran'];								
										$harga=$cacah['harga'];
									
									endforeach;
									?>
									<?php echo form_open('hargamenu/edit_form/'.$kode_harga); ?>
									<div class="form-row">
									<div class="form-group col-md-12">
									<input type="hidden" class="form-control" name="kode_harga" value="<?php echo $kode_harga; ?>">
									<div class="form-group mb-3">
											<label class="form-label">Ukuran</label>
											<?php echo "<b><font color='red'>".form_error('ukuran')."</font></b>"; ?>
                            				<select name="ukuran" id="ukuran" class="form-control" required>
                            					<option value="">-- Pilih Ukuran Kue--</option>
                            					<option value="10">10 </option>
												<option value="15">15 </option>
												<option value="20">20 </option>
                            				</select>
											</div>

                            			<div class="form-group mb-3">
                            				<label class="form-label">Harga</label>
                            				<?php echo "<b><font color='red'>".form_error('harga')."</font></b>"; ?>
                            				<input type="text" name="harga" id="harga" placeholder="Masukkan Harga" autocomplete="off"  class="form-control" value="<?php echo $harga;?>" required>
                            			</div>
										
										
										<div class="form-group" align="center">
											<button type="submit" class="btn btn-primary">Simpan</button>
											<a class="btn btn-danger" href="<?= base_url('hargamenu/index') ?>" role="button">Batal</a>
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