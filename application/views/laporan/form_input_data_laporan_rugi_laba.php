
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col">
					<h1 class="m-0 text-dark"> Laporan Laba Rugi</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<hr>
<center>

 <h3>Input Bulan Tahun Laporan</h3> 
  
  
  <div class="container p-4">
  <div class="card w-50 auto">
  <div class="card-body ">
 <!--  <h3>Input Periode Laporan Rugi Laba</h3> -->
  <form action="<?php echo site_url('C_Laporan/laporanlabarugi') ?>" method="post" >
  
	<div class="form-group">
		  <label for="no_faktur">Bulan: </label>
		  <select class="form-control" name="bulan">
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
	 </div><br>
	
		<div class="form-group">
										<label for="tahun">Tahun:</label>
										<select name="tahun" id="tahun" class="form-control">
											<option value="">Pilih tahun ....</option>
											<?php for ($i = 2019; $i <= date('Y'); $i++) { ?>
												<option <?php if ($this->input->get('tahun') == $i) {
															echo "selected='selected'";
														} ?> value="<?php echo $i ?>"><?php echo $i ?></option>
											<?php } ?>
										</select>
									</div>
									</div><br>
	 
	 <div class="row">
		<div class="col-sm-12"  align="center">
			<button type="submit" class="btn btn-success">Proses</button>
		</div>
	</div>
	<p>
	
	</form>	
		
    </body>
    </div>
</html>






