<div class="content-wrapper">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col">
				<h2 class="m-1 text-dark"> Grafik Pembelian</h2>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div><hr>
<div class="row">
    <div class="col">
        <div class=" grid-margin stretch-card">
            <div class="container">
                <div class="card">
                    <div class="card shadow w-80">
                    	<div class="card-header"><strong>Pilih Periode</strong></div>
                    	<div class="container">
                        	<div class="card-body">
                            	<div class="container">
									<form action="<?php echo site_url('chart_bb/view_chart') ?>" method="post" >
										<div class="form-group">
											<label for="tahun">Tahun</label>
											<select name="tahun" id="tahun" class="form-control">
												<option value="">Pilih tahun</option>
												<?php for ($i = 2019; $i <= date('Y'); $i++) { ?>
												<option <?php if ($this->input->get('tahun') == $i) {
													echo "selected='selected'";
												} ?> value="<?php echo $i ?>"><?php echo $i ?></option>
												<?php } ?>
											</select>
										</div>
									</div><br>
									<div class="row">
										<div class="col-sm-12" align="center">
											<button type="submit" class="btn btn-primary">Proses</button>
										</div>
									</div><p>
								</form>	
</body>
</html>