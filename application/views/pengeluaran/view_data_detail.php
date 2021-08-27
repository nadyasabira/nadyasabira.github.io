<div class="content-wrapper">
	<div class="d-flex flex-column">
		<div class="container-fluid">
			<div class="clearfix">
				<h2 class="page-title">Data Pengeluaran Bahan Baku</h2><hr>
			</div>
			<?php 
				foreach($isi_data as $cacah):
					$no_nota = $cacah['no_nota'];
					$tanggal = $cacah['tanggal'];
				endforeach;
			?>
			<div class="card shadow">
				<div class="card-header"><strong>Detail Pengeluaran Bahan Baku</strong></div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<table class="table table-borderless">
								<tr>
									<td><strong>No Faktur Pesanan</strong></td>
									<td>:</td>
									<td><?= $cacah['no_nota'] ?></td>
								</tr>
								<tr>
									<td><strong>Tanggal</strong></td>
									<td>:</td>
									<td><?= format_indo(date($cacah['tanggal'])); ?></td>
								</tr>
							</table>
						</div><hr>
					</div>
					<div class="row">
						<div class="col-md-6">
							<table class="table table-borderless">
								<tr>
									<td><strong>Data Pesanan</strong></td>
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
						        <th class="text-center">Menu</th>
						        <th class="text-center">Jumlah Pesanan</th>  
					       	</tr>
					      </thead>
					      <tbody>
								<?php $no=1; 
									foreach($pesanan as $cacah):
										echo "<tr>";
											echo "<td align='center'>".$no++."</td>";
											echo "<td>".$cacah['nama_menu']."</td>";
											echo "<td align='center'>".$cacah['jml_beli']."</td>";
										echo "</tr>";
									endforeach;
								?>
						    </tbody>    	
    					</table><hr>
    					<div class="row">
						<div class="col-md-6">
							<table class="table table-borderless">
								<tr>
									<td><strong>Data Bahan Baku</strong></td>
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
						        <th class="text-center">Jumlah Keluar</th>   
					       	</tr>
					      </thead>
					      <tbody>
									<?php $no=1; 
										foreach($isi_data as $cacah):
											echo "<tr>";
												echo "<td align='center'>".$no++."</td>";
												echo "<td>".$cacah['nama_bb']."</td>";
												echo "<td align='center'>".$cacah['jumlah']." ".$cacah['satuan_bom']."</td>";
											echo "</tr>";
										endforeach;
									?>
						    </tbody>    	
    					</table><br>
    					<div align="center">
								<a href="<?= base_url('pengeluaran_bb') ?>" class="btn btn-info">Kembali</a>
							</div>
						</div>
					</div>		
				</div>
</body>
</html>