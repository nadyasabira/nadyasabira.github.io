
	<!-- 
	 <div class="container">
	 <br>
	 <h1 class="h3 mb-auto p-2 text-gray-800 ">Data ukuran</h1>

			
					<hr>
					<div class="row">
						<div class="col">
							<div class="card shadow">
								<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
	                            <div class="container">
								<div class="card-body"> -->
								<form action="<?= base_url('ukuran/proses_tambah') ?>"class="formukuran" id="form-tambah" method="POST">
									<div class="mb-3">
	                           			 <label class="form-label">ID ukuran</label>
											<input type="text" name="id_kategori" placeholder="Masukkan ID Ukuran" value="<?php echo $id_kategori;?>"autocomplete="off"  class="form-control" readonly>
									  </div>
									<div class="form-group mb-3">
	                           			 <label class="form-label">Ukuran</label>
											<input type="text" name="nama_kategori" placeholder="Masukkan  ukuran" autocomplete="off"  class="form-control" required>
									  </div>
									  	<div class="form-group mb-3">
	                           			 <label class="form-label">Satuan</label>
											<input type="text" name="satuan" placeholder="Masukkan Satuan" autocomplete="off"  class="form-control" required>
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
										$('.formukuran').bootstrapValidator({
	   										 fields: {
												nama_kategori: {
	    										      message: 'Nama ukuran Harus Diisi!',
	    										      validators: {
	   										  	 	    notEmpty: {
	     										         message: 'Nama ukuran Harus diisi!'
	     										       }	
	     										     }
	     										   },
	     										   satuan: {
	    										      message: 'Satuan Invalid!',
	    										      validators: {
	   										  	 	    notEmpty: {
	     										         message: 'Satuan Harus diisi!'
	     										       }	
	     										     }
	     										   },
												
												  }
	  										  });
											});
									</script>
				