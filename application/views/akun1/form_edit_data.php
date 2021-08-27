<?php
	foreach($data_form_input as $cacah):
		$id_user = $cacah['id_user'];
		$password = $cacah['password'];
		$kelompok = $cacah['kelompok'];
	endforeach;
  ?>
<div class="container">
  <h3>Edit Data Akun</h3>
  <form action="<?php echo site_url('akun/edit_form/'.$id_user) ?>" method="post">
  		<input type="hidden" class="form-control" name="id_user" >	
		<div class="form-group">
			<label>User: <?php echo $id_user ?></label>
		</div> 	
		<div class="form-group">
		  <label for="password">Password:</label>
		  <?php echo "<b>".form_error('password')."</b>"; ?> 	
		  <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" placeholder="Masukkan password baru cth: passwordbaru1234">
		</div> 
		<div class="form-group">
		  <label for="konfirmasi_password">Konfirmasi Password:</label>
		  <?php echo "<b>".form_error('konfirmasi_password')."</b>"; ?> 	
		  <input type="password" class="form-control" name="konfirmasi_password" value="<?php echo set_value('konfirmasi_password'); ?>" placeholder="Masukkan konfirmasi password cth: passwordbaru1234">
		</div> 
		<div class="form-group">
		<?php echo "<b>".form_error('kelompok')."</b>"; ?> 
		  <label for="kelompok">Kelompok User*:</label>
			  <select class="form-control" name="kelompok">
				<?php
					if(strcmp($kelompok,"Pemilik")==0){
						?>
							<option value="Pemilik" selected>Pemilik</option>
							<option value="Pegawai">Pegawai</option>
						<?php
					}else{
						?>
							<option value="Pemilik">Pemilik</option>
							<option value="Pegawai" selected>Pegawai</option>
						<?php
					}
				?>
				
			  </select>	
		</div>
	 </div>
	 <div class="row">
		<div class="col-sm-12" style="background-color:white;" align="center">
			<button type="submit" class="btn btn-default">Ubah</button>
		</div>
	</div>
	<p>
	
	</form>
</body>
</html>