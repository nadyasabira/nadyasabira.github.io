  
  <div class="container">
  
  <div class="card-body">
  <div class="card">
  

     
<div class="container">
<div class="card-body">

  <center><h3 class="mb-3">Form Menu</h3></center>
  
  <?php echo form_open('menu/input_form'); ?>
  <div class="container">
  <div class="card">
  <div class="card-header">
		<!-- <div class="form-group">
		  <label for="tanggal">Tanggal Buat</label><span class="text-danger">*</span>
		  <?php echo "<b><font color='red'>".form_error('tgl_buat')."</font></b>"; ?> 	
		  <input type="date" class="form-control" id="datepicker" name="tgl_buat" value="<?php echo set_value('tgl_buat'); ?>">	
		</div>
		<div class="form-group">
		  <label for="tanggal">Expired</label><span class="text-danger">*</span>
		  <?php echo "<b><font color='red'>".form_error('tgl_habis')."</font></b>"; ?> 	
		  <input type="date" class="form-control" id="datepicker" name="tgl_habis" value="<?php echo set_value('tgl_habis'); ?>">	
		</div> -->
		<div class="form-group">
		  <label for="nama">Nama Menu</label><span class="text-danger">*</span>
		  <?php echo "<b><font color='red'>".form_error('nama')."</font></b>"; ?> 	
		  <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" placeholder="Masukkan Nama Menu cth: Coklat Keju">
		</div>  
		<div class="form-group">
		  <label for="gambar">Gambar</label><span class="text-danger">*</span>
		 
		  <input type="file" class="form-control-file" name="gambar"value="<?php echo set_value('gambar'); ?>">
		   <?php echo "<b><font color='red'>".form_error('gambar')."</font></b>"; ?> 
		</div> 
		<!-- <div class="form-group"> 
		  <label for="stok">Stok</label><span class="text-danger">*</span>
		  <?php echo "<b><font color='red'>".form_error('stok')."</font></b>"; ?> 
		  <input type="text" class="form-control" name="stok" value="<?php echo set_value('stok'); ?>" placeholder="Masukkan stok cth: 10"> -->
		</div>  
		
		
	 </div>
	 <div class="row">
		<div class="col-sm-12 mb-3"align="center">
		<div class="card-body">
			<button type="submit" class="btn btn-success">Simpan</button>
		</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	<p>
	
	</form>
	
</body>
</html>