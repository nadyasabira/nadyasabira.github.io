<div class="content-wrapper">
    <div class="content-header">
    	<div class="container-fluid">
        	<div class="row mb-2">
        		<div class="col">
            		<h1 class="m-0 text-dark">Bill of Material</h1>
          		</div><!-- /.col -->
        	</div><!-- /.row -->
      	</div><!-- /.container-fluid -->
    </div><hr>
	<div class="row">
		<div class="col">
			<div class="col-md-6 grid-margin stretch-card">
				<div class="container-fluid">
					<div class="card shadow">
						<div class="card-header">
							<strong>Form Bill of Material</strong>
						</div>
						<div class="card-body">
  							<form action="<?php echo site_url('bom/input_form') ?>" method="post" >
  								<div class="form-row">
									<div class="form-group col-12">
										<label>ID BOM</label>
										<input type="text" name="id_bom" value="<?php echo $id_bom ?>" readonly class="form-control">
									</div><br>
									<div class="form-group col-md-12">
                  						<label for="id_menu">Menu</label>
										<select class="form-control" name="id_menu">
											<?php
												foreach($menu as $cacah):
											?>	
											<option value="<?php echo $cacah['id_menu']?>"><?php echo $cacah['nama']?></option>
											<?php
												endforeach;
											?> 
										</select>
									</div><br>
									<div class="form-group" align="center">
										<button type="submit" class="btn btn-primary">Simpan</button>
										<a class="btn btn-danger" href="<?= base_url('bom') ?>" role="button">Batal</a>
									</div>
								</form>	
							</div>
						</div>
					</div>
				</div>
				<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	    		<script src="<?php echo base_url(); ?>assets/js/moment-with-locales.js"></script>
	    		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		</body>
</html>