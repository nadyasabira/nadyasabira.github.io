
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
							<form action="<?= base_url('akun/proses_tambah') ?>"class="formakun" id="form-tambah" method="POST">
								<div class="mb-3">
                           			 <label class="form-label">Kode akun</label>
									<input type="text" name="kode_akun" placeholder="Masukkan Kode akun" autocomplete="off"  class="form-control" required>
								  </div>
								<div class="form-group mb-3">
                           			 <label class="form-label">Nama akun</label>
										<input type="text" name="nama_akun" placeholder="Masukkan Nama akun" autocomplete="off"  class="form-control" required>
								  </div>								

								  <div class="form-group mb-3">
                            				<label class="form-label">Header Akun</label>
                            				<select name="nama_header" id="nama_header" class="form-select" required>
                            					<option value="">-- Pilih Header Akun--</option>
												<?php
			foreach($all_header as $cacah):
				?>	
					<option value="<?php echo $cacah['header_akun']?>"><?php echo $cacah['nama_header']?></option>
				<?php
			endforeach;
		  ?>
                            				</select>
                            			</div>
								  <div class="form-group mb-3">
                           			 <label class="form-label">Posisi </label>
										<input type="text" name="posisi_d_c" placeholder="Masukkan Posiis Akun" autocomplete="off"  class="form-control" required>
								  </div>
								 
								 
								  <div class="mb-3">
								
										<button type="submit" class="btn btn-primary w-100">
										<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg>	
										&nbsp;&nbsp;Simpan</button>
										<!-- <button type="reset" class="btn btn-danger">&nbsp;&nbsp;Batal</button> -->
									</div>
								</form>
							</div>	

							<script>
								$(function(){
									$('.formakun').bootstrapValidator({
   										 fields: {
											kode_akun: {
    										      message: 'Kode Akun Tidak Valid!',
    										      validators: {
   										  	 	    notEmpty: {
     										         message: 'Kode Akun Harus diisi!'
     										       }	
     										     }
     										   },
											nama_akun: {
    										      message: 'Nama Akun Harus Diisi!',
    										      validators: {
   										  	 	    notEmpty: {
     										         message: 'Nama Akun Harus diisi!'
     										       },
													stringLength: {
     										         min: 1,
													  max:50,
													  message: 'Masukkan karakter kurang dari 100 kata dan lebih dari 3 kata'	   										  	 	   																									  
     										       }	
     										     }
     										   },
											header_akun: {
    										      message: 'Header Akun  Harus Diisi!',
    										      validators: {
   										  	 	    notEmpty: {
     										         message: 'Header Akun Harus diisi!'
     										       },
													stringLength: {
     										         min: 1,
													  max:5,
													  message: 'Masukkan karakter kurang dari 100 kata dan lebih dari 3 kata'	   										  	 	   																									  
     										       }	
     										     }
     										   },
     										  posisi_d_c: {
    										      message: 'Posisi Tidak Valid!',
    										      validators: {
   										  	 	    notEmpty: {
     										         message: 'Posisi Akun Harus diisi!'
     										       }	
     										     }
     										   },
											
											  }
  										  });
										});
								</script>
			