
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
							<form action="<?= base_url('menu1/proses_tambah') ?>"class="formmenu" id="form-tambah" method="POST">
								<div class="mb-3">
                           			 <label class="form-label">ID Menu</label>
										<input type="text" name="id_menu" placeholder="Masukkan Kode Barang" value="<?php echo $id_menu;?>"autocomplete="off"  class="form-control" readonly>
								  </div>
								<div class="form-group mb-3">
                           			 <label class="form-label">Nama Menu</label>
										<input type="text" name="nama" placeholder="Masukkan Nama Menu" autocomplete="off"  class="form-control" required>
								  </div>
								<div class="form-group mb-3">
									<label class="form-label"><strong>Jenis Kue</strong></label>
									<select name="jenis" id="jenis" class="form-control" required>
											<option value="">-- Pilih Jenis Kue--</option>
												<option value="Kotak">Kotak</option>
												<option value="Bulat">Bulat</option>
												</select>
										</div>
								<div class="form-group mb-3">
									<label class="form-label"><strong>Ukuran</strong></label>
									<select name="ukuran" id="ukuran" class="form-control" required>
											<option value="">-- Pilih Ukuran--</option>
												<option value="10CM">10CM</option>
												<option value="15CM">15CM</option>
												<option value="30CM">30CM</option>
												</select>
										</div>
								<!-- <div class="form-group mb-3">
									<label class="form-label"><strong>Kategori Menu</strong></label>
									<select name="id_kategori" id="id_kategori" class="form-control" required>
									<option value="">-- Pilih Kategori--</option>
									<?php
										foreach($kategori as $cacah):
									?>	
										<option value="<?php echo $cacah['id_kategori']?>"><?php echo $cacah['nama_kategori']?></option>
									<?php
									endforeach;
									?> 
									</select>
							   </div> -->

								<!-- <div class="form-group mb-3">
                           			 <label class="form-label">Stok</label>
										<input type="text" name="stok" placeholder="Masukkan Stok Menu" autocomplete="off"  class="form-control" required>
								  </div> -->
								  <!-- <div class="mb-3">
                           			 <label class="form-label"><strong>Harga Jual</strong></label>
										<input type="text" name="harga_jual" placeholder="Masukkan Harga Jual" autocomplete="off"  class="form-control" required>
								  </div> -->
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
									$('.formmenu').bootstrapValidator({
   										 fields: {
											nama: {
    										      message: 'Nama Menu Harus Diisi!',
    										      validators: {
   										  	 	    notEmpty: {
     										         message: 'Kode Barang Harus diisi!'
     										       }	
     										     }
     										   },
											jenis: {
    										      message: 'Jenis Kue Harus Diisi!',
    										      validators: {
   										  	 	    notEmpty: {
     										         message: 'Jenis Kue Harus diisi!'
     										       }	
     										     }
     										   },
											ukuran: {
    										      message: 'Ukuran Kue Harus Diisi!',
    										      validators: {
   										  	 	    notEmpty: {
     										         message: 'Ukuran Kue Harus diisi!'
     										       }	
     										     }
     										   },
											id_kategori: {
    										      message: 'Kategori Kue Harus Diisi!',
    										      validators: {
   										  	 	    notEmpty: {
     										         message: 'Kategori Kue Harus diisi!'
     										       }	
     										     }
     										   },
											stok: {
    										      message: 'Stok Harus Diisi!',
    										      validators: {
   										  	 	    notEmpty: {
     										         message: 'Stok Harus diisi!'
     										       }	
     										     }
     										   },
											  }
  										  });
										});
								</script>
			