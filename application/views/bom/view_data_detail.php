<div class="content-wrapper">   
	<div class="d-flex flex-column">
		<div class="container-fluid">
			<div class="clearfix">
				<h2 class="page-title">Bill of Material</h2><hr>
			</div>
			<?php 
    			//cacah data dari tabel detail pembelian dengan id sesuai dengan inputan user
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
				<a href="<?= base_url('bom') ?>" class="btn btn-info">Kembali</a>
			</div>
						</div>
					</div>		
				</div>
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
					
<p>
</body>
</html>