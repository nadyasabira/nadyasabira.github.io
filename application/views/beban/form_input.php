
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
								<?php echo validation_errors();?>
                            		<form action="<?= base_url('beban/proses_tambah') ?>"class="formbeban" id="form-tambah" method="POST">
                            			
                            			<div class="form-group mb-3">
                            					<label class="form-label">Kode Akun</label>
                            					<?php echo "<b><font color='red'>".form_error('kode_akun')."</font></b>"; ?> 
												<input type="text" name="kode_akun" placeholder="Masukkan Kode Akun" value="<?php echo $kode_akun;?>"autocomplete="off"  class="form-control" readonly>
                            				</div>	
                            				<div class="form-group mb-3">
                            					<label class="form-label">Nama Beban</label>
                            					<?php echo "<b><font color='red'>".form_error('nama_beban')."</font></b>"; ?> 
                            					<input type="text" name="nama_beban" placeholder="Masukkan Nama Beban" autocomplete="off"  class="form-control" required>
                            				</div>	
																	
                            			
                            			<div class="form-group mb-3">
                            				<label for="jenis_beban">Jenis Beban </label>
                            				<?php echo "<b>".form_error('jenis_beban')."</b>"; ?> 	
                            				<select class="form-select" name="jenis_beban">
                            					<option value="">-- Pilih Jenis Beban--</option>
                            					<option value="Beban Operasional">Beban Operasional</option>
                            					<option value="Beban Administrasi Umum">Beban Administrasi Umum</option>			
                            				</select></div>
								
								
										<button type="submit" class="btn btn-primary w-100">
										<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg>	
										&nbsp;&nbsp;Simpan</button>
										<!-- <button type="reset" class="btn btn-danger">&nbsp;&nbsp;Batal</button> -->
									</div>
								</form>
							</div>	

							<script>
								$(function(){
									$('.formbeban').bootstrapValidator({
										fields: {
											message: 'Nama Beban tidak Valid',
											nama_beban: {
												validators: {
													notEmpty: {
														message: 'Nama Beban tidak boleh kosong!',
													},											
													
													stringLength: {
														min: 3,
														max:35,
														message: 'Masukkan karakter kurang dari 100 kata dan lebih dari 3 kata'	   										  	 	   																									  
													}	
												}												
											},
											message: 'Jenis Beban tidak Valid',
											jenis_beban: {
												validators: {
													notEmpty: {
														message: 'Jenis Beban tidak boleh kosong!',
													},								
													
												}												
											}
										}
									});
								});
							</script>
