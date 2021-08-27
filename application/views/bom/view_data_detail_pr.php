<div class="content-wrapper">   
	<div class="d-flex flex-column">
		<div class="container-fluid">
			<div class="clearfix">
				<h2 class="page-title">Bill of Material</h2><hr>
			</div>
			<?php 
				foreach($isi_data as $cacah):
					$id_bom = $cacah['id_bom'];
					$nama = $cacah['nama'];
				endforeach;
			?>
			<div class="card shadow">
				<div class="card-header">
					<strong>Detail Bill of Material</strong>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<table class="table table-borderless">
								<tr>
									<td><strong>ID BOM</strong></td>
									<td>:</td>
									<td><?= $cacah['id_bom'] ?></td>
								</tr>
								<tr>
									<td><strong>Menu</strong></td>
									<td>:</td>
									<td><?= $cacah['nama'] ?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<table id="example" name = "example" class="table table-striped table-bordered" style="width:100%" align="center">
				        <thead>
					       	<tr>
					         	<th class="text-center">No</th>
						        <th class="text-center">Bahan Baku</th>
						        <th class="text-center">Jumlah</th>
					       	</tr>
					      </thead>
					      <tbody>
									<?php $no=1; 
										foreach($isi_data as $cacah):
											echo "<tr>";
												echo "<td align='center'>".$no++."</td>";
												echo "<td>".$cacah['nama_bb']."</td>";
												echo "<td align='center'>".$cacah['jumlah']." ". $cacah['satuan_bom']."</td>";
											echo "</tr>";
										endforeach;
									?>
						    </tbody>    	
    					</table><br>
    					<div align="center">
								<a href="<?= base_url('bom/view_data_pr') ?>" class="btn btn-info">Kembali</a>
							</div>
						</div>
					</div>		
				</div>
			</div>
		</div>
	</div>
</body>
</html>