<div class="content-wrapper">
	<div class="d-flex flex-column">
		<div class="container-fluid">
			<div class="clearfix">
				<h2 class="page-title">Data Pembelian Peralatan</h2><hr>
			</div>
			<?php 
				foreach($isi_data as $cacah):
					$no_faktur = $cacah['no_faktur'];
					$waktu_transaksi = $cacah['waktu_transaksi'];
					$nama_supplier = $cacah['nama_supplier'];
				endforeach;
			?>
			<div class="card shadow">
				<div class="card-header">
					<strong>Detail Pembelian</strong>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<table class="table table-borderless">
								<tr>
									<td><strong>No Pembelian</strong></td>
									<td>:</td>
									<td><?= $cacah['no_faktur'] ?></td>
								</tr>
								<tr>
									<td><strong>Tanggal Transaksi</strong></td>
									<td>:</td>
									<td><?= format_indo(date($cacah['waktu_transaksi'])); ?></td>
								</tr>
								<tr>
									<td><strong>Supplier</strong></td>
									<td>:</td>
									<td><?= $cacah['nama_supplier'] ?></td>
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
					          <th class="text-center">Peralatan</th>
					          <th class="text-center">Jumlah</th>
										<th class="text-center">Harga</th>
										<th class="text-center">Total</th>
				          </tr>
				        </thead>
				        <tbody>
									<?php $no=1; $gtotal=0; $total=0;
										foreach($isi_data as $cacah):
											echo "<tr>";
												echo "<td align='center'>".$no++."</td>";
												echo "<td>".$cacah['nama_alat']."</td>";
												echo "<td align='center'>".$cacah['jumlah_beli']." ". $cacah['satuan']."</td>";
												echo "<td align='right'>Rp ".number_format($cacah['harga_satuan'])."</td>";
												echo "<td align='right'>Rp ".number_format($cacah['jumlah_beli']*$cacah['harga_satuan'])."</td>";	
											echo "</tr>";
											$total=$cacah['jumlah_beli']*$cacah['harga_satuan'];
											$gtotal=$gtotal+$total;
										endforeach;
									?>
									<th colspan="4" class="text-right">Total</th>
									<th class="text-right">Rp <?= number_format($gtotal); ?></th>
        				</tbody>
    					</table><br>
    					<div align="center">
								<a href="<?= base_url('pembelian_alat') ?>" class="btn btn-info">Kembali</a>
							</div>
    				</div>
    			</div>
    		</div>
				<script>
					$(document).ready(function() {
				    $('#example').DataTable( {
				    	"pagingType": "full_numbers"
				    });
					});
				</script>
				<script>
					function deleteConfirm(url){
						$('#btn-delete').attr('href', url);
						$('#deleteModal').modal();
					}
				</script>
				<!-- Logout Delete Confirmation-->
				<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
				        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">X</span>
				        </button>
				      </div>
				      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
				      <div class="modal-footer">
				        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
				        <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
				      </div>
				    </div>
				  </div>
				</div>
</body>
</html>