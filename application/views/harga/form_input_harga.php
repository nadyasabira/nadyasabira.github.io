
<!-- 
 <div class="container">
 <br>
 <h1 class="h3 mb-auto p-2 text-gray-800 ">Data Menu</h1>

		
				<hr>
				<div class="row">
					<div class="col">
						<div class="card shadow">
							<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
                            <div class="container">
                            	<div class="card-body"> -->
                            		<form action="<?= base_url('menu/proses_tambah_harga') ?>"class="formharga" id="form-tambah" method="POST">
                            			<div class="form-group">
                            				<label class="form-label">Kode Harga</label>
											<input type="text" name="kode_harga" placeholder="Masukkan Kode Barang" value="<?php echo $kode_harga;?>"autocomplete="off"  class="form-control" readonly>
                            			</div></div>
                            			<div class="form-group mb-3">
                            				<label class="form-label">Nama Menu</label>
                            				<select name="id_menu" id="id_menu" class="form-select" required>
                            					<option value="">-- Pilih Nama Menu--</option>
                            					<?php
                            					foreach($all_menu as $cacah):
                            						?>	
                            						<option value="<?php echo $cacah['id_menu']?>"><?php echo $cacah['id_menu']."-". $cacah['nama']?></option>
                            						<?php
                            					endforeach;
                            					?>
                            				</select>
                            			</div>
                            			<div class="form-group mb-3">
                            				<label class="form-label">Ukuran</label>
                            				<select name="ukuran" id="ukuran" class="form-control" required>
                            					<option value="">-- Pilih Ukuran Kue--</option>
                            					<?php
                            					foreach($all_kategori as $cacah):
                            						?>	
                            						<option value="<?php echo $cacah['id_kategori']?>"><?php echo $cacah['nama_kategori']?></option>
                            						<?php
                            					endforeach;
                            					?>
                            				</select>
                            			</div>   
                            			<div class="form-group mb-3">
                            				<label class="form-label">Satuan</label>
                            				<input type="text" name="satuan" id="satuan" placeholder="Masukkan Harga" autocomplete="off"  class="form-control" required>
                            			</div>                            			
                            			<div class="form-group mb-3">
                            				<label class="form-label">Harga</label>
                            				<input type="text" name="harga" id="harga" placeholder="Masukkan Harga" autocomplete="off"  class="form-control" required>
                            			</div>
						<div class="form-group mb-3">
										<button type="submit" class="btn btn-primary w-100">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg>	
										&nbsp;&nbsp;Simpan</button>
										<!-- <button type="reset" class="btn btn-danger">&nbsp;&nbsp;Batal</button> -->
									</div>
								</form>
							</div>	

							<script>
								$(function(){
									$('.formharga').bootstrapValidator({
										fields: {
										
											ukuran: {
												message: 'Ukuran Tidak Valid!!',
												validators: {
													notEmpty: {
														message: 'Ukuran Kue Harus diisi!'
													}	
												}
											},
											satuan: {
												message: 'Satuan Tidak Valid!!',
												validators: {
													notEmpty: {
														message: 'Satuan Harus diisi!'
													}	
												}
											},
											harga: {
												message: 'Harga Tidak Valid!!',
												validators: {
													notEmpty: {
														message: 'Harga Harus diisi!'
													}	
												}
											},
											
										}
									});

									// function loadkodeharga()
									// {
									// 	var kodemenu = $("#id_menu").val();
									// 	var kodeukuran = $("#ukuran").val();
									// 	var kodeharga = kodemenu + kodeukuran;
									// 	$("#kodeharga").val(kodeharga);
									// }

									// $("#id_menu").change(function(){
									// 	loadkodeharga();
									// });

									// $("#ukuran").change(function(){
									// 	loadkodeharga();
									// });
								});
							</script>
