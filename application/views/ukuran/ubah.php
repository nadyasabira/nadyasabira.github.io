<!DOCTYPE html>
<html lang="en">

				

 <div class="container">
 <br>
 <h1 class="h3 mb-auto p-2 text-gray-800 ">Data Menu</h1>
 

		
				<hr>
				<div class="row">	
				<div class="col">			
						<div class="card shadow">
							<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
							 <div class="container">
							<div class="card-body">
								<form action="<?php echo base_url(); ?>kategori/proses_ubah" id="form-tambah" method="POST">
									<div class="form-row">
										<div class="form-group col-md-2">
											<label for="id_menu"><strong>Kode Menu</strong></label>
											<input type="text" name="id_menu" placeholder="Masukkan Kode Menu" autocomplete="off"  class="form-control" required value="<?= $kategori->id_kategori ?>" maxlength="8" readonly>
										</div>
										</div>
										<div class="form-row">
										<div class="form-group col-md-4">
											<label for="nama"><strong>Nama Menu</strong></label>
											<input type="text" name="nama" placeholder="Masukkan Nama Menu" autocomplete="off"  class="form-control" required value="<?= $kategori->nama?>">											
										</div>
										<div class="form-group col-md-3">
											<label for="jenis"><strong>Jenis Kue</strong></label>
											<select name="jenis" id="jenis" class="form-control" required>
											<option value="">-- Pilih Jenis Kue--</option>
												<option value="Kotak"<?= $kategori->jenis == 'Kotak' ? 'selected' : '' ?>>Kotak</option>
												<option value="Bulat"<?= $kategori->jenis == 'Bulat' ? 'selected' : '' ?>>Bulat</option>
												</select>
										</div>
										<div class="form-group col-md-2">
											<label for="ukuran"><strong>Ukuran</strong></label>
											<select name="ukuran" id="ukuran" class="form-control" required>
											<option value="">-- Pilih Ukuran--</option>
												<option value="10CM"<?= $kategori->ukuran == '10CM' ? 'selected' : '' ?>>10CM</option>
												<option value="15CM"<?= $kategori->ukuran == '15CM' ? 'selected' : '' ?>>15CM</option>
												<option value="30CM"<?= $kategori->ukuran == '30CM' ? 'selected' : '' ?>>30CM</option>
												</select>
										</div>	
										</div>	
										<div class="form-group col-md-2">
											<label for="id_kategori"><strong>Kategori</strong></label>
											<select name="id_kategori" id="id_kategori" class="form-control" required>
											<option value="">-- Pilih Kategori--</option>
											<?php foreach($kategori as $cacah) { ?>									
										<option <?php if ($kategori['id_kategori'] == $cacah->id_kategori) {
											echo "selected";
										} ?> value="<?php echo $cacah->id_kategori; ?>"><?php echo $cacah->nama_kategori; ?></option>
									<?php } ?>
									</selected>
									
										
									</div>
									<hr>
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
										<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
									</div>
								</form>
							</div>				
						</div>
					</div>
				</div>
			</div>
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
			
		
</body>
</html>