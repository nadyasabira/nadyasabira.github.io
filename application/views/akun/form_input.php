<div class="card">
    <div class="card-header">
     
<div class="container">
  <center><h3>Form Input Akun</h3></center>
 
  <?php echo form_open('akun/input_form'); ?>
	 <div class="form-group">
		  <label for="nama_akun">Nama Akun</label><span class="text-danger">*</span>
		  <?php echo "<b>".form_error('nama_akun')."</b>"; ?>	
		  <input type="text" class="form-control" name="nama_akun" value="<?php echo set_value('nama_akun'); ?>" placeholder="Masukkan nama akun">
		</div>
		<div class="form-group">
		  <label for="kode_akun">Kode Akun:</label><span class="text-danger">*</span>
		  <?php echo "<b>".form_error('kode_akun')."</b>"; ?>
		  <input type="text" class="form-control" name="kode_akun" value="<?php echo set_value('kode_akun'); ?>" placeholder="Masukkan kode akun">
		</div> 
		<div class="form-group mb-3">
                            				<label class="form-label">Header Akun</label>
                            				<select name="nama_header" id="nama_header" class="form-select" required>
                            					<option value="">-- Pilih Header Akun--</option>
                            					<?php
                            					foreach($all_header as $cacah):
                            						?>	
                            						<option value="<?php echo $cacah['header_akun']?>"><?php echo $cacah['nama_header']."-". $cacah['nama']?></option>
                            						<?php
                            					endforeach;
                            					?>
                            				</select>
                            			</div>
	 </div>
	 <div class="row">
		<div class="col-sm-12"align="center">
			<button type="submit" class="btn btn-success">Simpan</button>
		</div>
		<div class="col-sm-12"align="center">
			<a href="view_data" class="btn btn-success">Lihat Akun</a>
		</div>
	</div>
	</div>
	</div>
	<p>
	
	</form>
	
</body>
</html>