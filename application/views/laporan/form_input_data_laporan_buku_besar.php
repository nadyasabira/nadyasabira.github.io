<div class="content-wrapper">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col">
				<center><h1 class="m-1 text-dark"> Laporan Periode Laporan Buku Besar</h1></center>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div><hr>
<div class="container">
	<form action="<?php echo site_url('C_Laporan/laporanbukubesar') ?>" method="post" >
		<div class="panel-body">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="akun">Akun:</label>
						<select class="form-control" name="akun">
							<option value="">Pilih Akun ....</option>
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
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="no_faktur">Bulan: </label>
						<select class="form-control" name="bulan">
							<option value="">Pilih Bulan ....</option>
							<option value="1">Januari</option>
							<option value="2">Februari</option>
							<option value="3">Maret</option>
							<option value="4">April</option>
							<option value="5">Mei</option>
							<option value="6">Juni</option>
							<option value="7">Juli</option>
							<option value="8">Agustus</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>	  
					</div>
				</div>  
				<div class="col-md-3">
					<div class="form-group">
						<label for="tahun">Tahun</label>
						<select name="tahun" id="tahun" class="form-control">
							<option value="">Pilih tahun ....</option>
							<?php for ($i = 2020; $i <=2022; $i++) { ?>
							<option <?php if ($this->input->get('tahun') == $i) {
								echo "selected='selected'";
							} ?> value="<?php echo $i ?>"><?php echo $i ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-sm-3"><p></p>
					<button type="submit" class="btn btn-success">Proses</button>
				</div>
			</div><p>
		</form>		
	</body>
</html>