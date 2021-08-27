
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
							<form action="<?= base_url('konsumen/proses_ubah/' . $konsumen->id_konsumen) ?>" id="form-tambah" method="POST">
								<div class="mb-3">
                           			 <label class="form-label">ID Konsumen</label>
										<input type="text" name="id_konsumen" placeholder="Masukkan ID Konsumen" value="<?php echo $konsumen['id_konsumen'];?>"autocomplete="off"  class="form-control" readonly>
								  </div>
								<div class="form-group mb-3">
                           			 <label class="form-label">Nama Konsumen</label>
										<input type="text" name="nama_konsumen" placeholder="Masukkan Nama Konsumen" value="<?php echo $konsumen['nama_konsumen'];?>"autocomplete="off"  class="form-control" required>
								  </div>								

								<div class="form-group mb-3">
                           			 <label class="form-label">Alamat</label>
										<input type="text" name="alamat" placeholder="Masukkan Stok Menu" autocomplete="off"  class="form-control" required>
								  </div>
								  <div class="form-group mb-3">
                           			 <label class="form-label"><strong>No Telp</strong></label>
										<input type="text" name="no_telp" placeholder="Masukkan No Telp" autocomplete="off"  class="form-control" required>
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
									$('.formkonsumen').bootstrapValidator({
   										 fields: {
											nama_konsumen: {
    										      message: 'Nama Konsumen Tidak Valid!',
    										      validators: {
   										  	 	    notEmpty: {
     										         message: 'Nama Konsumen Harus diisi!'
     										       }	
     										     }
     										   },
											alamat: {
    										      message: 'Alamat Harus Diisi!',
    										      validators: {
   										  	 	    notEmpty: {
     										         message: 'Alamat Harus diisi!'
     										       }	
     										     }
     										   },
											no_telp: {
    										      message: 'No_Telp  Harus Diisi!',
    										      validators: {
   										  	 	    notEmpty: {
     										         message: 'No_Telp  Harus diisi!'
     										       }	
     										     }
     										   },
											
											  }
  										  });
										});
								</script>
			