
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
										$kode_harga=$cacah['kode_harga'];
										$nama=$cacah['id_menu'];
										$nama_kategori=$cacah['id_kategori'];
										$satuan=$cacah['satuan'];
										$harga=$cacah['harga'];
									endforeach;
									?>
									<?php echo form_open('menu/edit_form_harga/'.$kode_harga); ?>
									<div class="form-row">
									
											<div class="form-group mb-12">
                            				<label class="form-label">Nama Menu</label>
                            				 <?php echo "<b><font color='red'>".form_error('id_menu')."</font></b>"; ?>
                            				<select name="id_menu" id="id_menu" class="form-control"  required>
                            					
												<?php
			foreach($all_menu as $cacah):
					//jika sama maka option-nya diberi selected untuk nilai default sesuai yang tersimpan didatabase
					if(strcmp($cacah['id_menu'],$id_menu)==0){
						?>
						<option type="hidden"value="<?php echo $cacah['id_menu']?>" selected><?php echo $nama  ?></option>	
						<?php
					}else{
					?>
						<option type="hidden"value="<?php echo $cacah['id_menu']?>"><?php echo $nama ?></option>
					<?php
					}
				?>	
				<?php
			endforeach;
		  ?>
                            				</select>
                            			</div>
                            				<div class="form-group mb-3">
                            				<label class="form-label">Ukuran</label>
                            				<?php echo "<b><font color='red'>".form_error('ukuran')."</font></b>"; ?>
                            				<select name="ukuran" id="ukuran" class="form-control"  required>
											<?php
			foreach($all_kategori as $cacah):
					//jika sama maka option-nya diberi selected untuk nilai default sesuai yang tersimpan didatabase
					if(strcmp($cacah['id_kategori'],$id_kategori)==0){
						?>
						<option type="hidden"value="<?php echo $cacah['id_kategori']?>" selected><?php echo $nama_kategori  ?></option>	
						<?php
					}else{
					?>
						<option type="hidden"value="<?php echo $cacah['id_kategori']?>"><?php echo $nama_kategori ?></option>
					<?php
					}
				?>	
				<?php
			endforeach;
		  ?>
                            				</select>
                            			</div>   
                            		   
                            			<div class="form-group mb-3">
                            				<label class="form-label">Satuan</label>
                            				<?php echo "<b><font color='red'>".form_error('satuan')."</font></b>"; ?>
                            				<select name="satuan" id="satuan" class="form-control"  required>
											<?php
			foreach($all_kategori as $cacah):
					//jika sama maka option-nya diberi selected untuk nilai default sesuai yang tersimpan didatabase
					if(strcmp($cacah['id_kategori'],$id_kategori)==0){
						?>
						<option type="hidden"value="<?php echo $cacah['id_kategori']?>" selected><?php echo $satuan  ?></option>	
						<?php
					}else{
					?>
						<option type="hidden"value="<?php echo $cacah['id_kategori']?>"><?php echo $satuan ?></option>
					<?php
					}
				?>	
				<?php
			endforeach;
		  ?>
                            				</select>
                            			</div>                              			
                            			<div class="form-group mb-3">
                            				<label class="form-label">Harga</label>
                            				<?php echo "<b><font color='red'>".form_error('harga')."</font></b>"; ?>
                            				<input type="text" name="harga" id="harga" placeholder="Masukkan Harga" autocomplete="off"  class="form-control" value="<?php echo $harga;?>" required>
                            			</div>
										
										
										<div class="form-group" align="center">
											<button type="submit" class="btn btn-primary">Simpan</button>
											<a class="btn btn-danger" href="<?= base_url('menu/harga') ?>" role="button">Batal</a>
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