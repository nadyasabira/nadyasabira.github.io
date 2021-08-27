<div class="container">
  <h3>Pilih Kode Akun</h3>
  <form action="<?php echo site_url('C_Laporan/viewlaporanbukubesar') ?>" method="post" >
	 	<input type="hidden" name="bulan" value="<?php echo $bulan;?>" />	
		<input type="hidden" name="tahun" value="<?php echo $tahun;?>" />
		<div class="form-group">
			<label for="akun">Nama Akun*:</label>
		  <select class="form-control" name="akun">
				<?php
					foreach($akun as $cacah):
						if($cacah['kode_akun']==$akun_di_pilih){
				?>
				<option value="<?php echo $cacah['kode_akun']?>" selected><?php echo $cacah['nama_akun']?></option>
				<?php	
					}else{
				?>
				<option value="<?php echo $cacah['kode_akun']?>"><?php echo $cacah['nama_akun']?></option>
				<?php	
					}
				?>	
				<?php
					endforeach;
		  	?>
		  </select>
	 	</div>
	  <div class="row">
			<div class="col-sm-12" align="center">
				<button type="submit" class="btn btn-success">Proses</button>
			</div>
		</div><p>
	</form>	
</body>
</html>