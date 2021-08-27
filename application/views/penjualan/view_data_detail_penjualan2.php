<h3>Data Detail Penjualan</h3>
<?php 
    //cacah data dari tabel detail pembelian dengan id sesuai dengan inputan user
	$total = 0;
	foreach($isi_data as $cacah):
		$id_transaksi_penjualan = $cacah['id_transaksi_penjualan'];
		$id_menu = $cacah['id_menu'];
		$harga_jual = $cacah['harga_jual'];
		$jml_beli = $cacah['jml_beli'];
		$no_faktur = $cacah['id_penjualan'];
		$nama = $cacah['nama'];
		$total = $total + ($jml_beli*$harga_jual);
	endforeach;
?>
<?php
		echo "<h5>No Faktur	= ".$no_faktur."</h5>";
		echo "<h5>Total		= Rp ".number_format($total)."</h5>";
	?>
<table id="example" name = "example" class="table table-striped table-bordered" style="width:100%" align="center">
        <thead>
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">menu</th>
                <th class="text-center">Jml</th>
				<th class="text-center">Harga</th>
				<th class="text-center">Total</th>
				<th class="text-center">Hapus</th>
            </tr>
        </thead>
        <tbody>
		<?php
			foreach($isi_data as $cacah):
				echo "<tr>";
					echo "<td>".$cacah['id_transaksi_penjualan']."</td>";
					echo "<td>".$cacah['nama']."</td>";
					echo "<td>".$cacah['jml_beli']."</td>";
					echo "<td>Rp ".number_format($cacah['harga_jual'])."</td>";
					echo "<td>Rp ".number_format($cacah['jml_beli']*$cacah['harga_jual'])."</td>";
					echo "<td>";
						?>
							<a onclick="deleteConfirm('<?php echo site_url('penjualan/delete_form_detail/'.$cacah['id_transaksi_penjualan'].'/'.$cacah['id_penjualan']) ?>')" href="#!" class="btn btn-danger btn-sm">
								<span class="glyphicon glyphicon-trash"></span> Hapus
							</a>
						<?php
					echo "</td>";
				echo "</tr>";
			endforeach;
		?>
        </tbody>
        <tfoot>
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">menu</th>
                <th class="text-center">Jml</th>
				<th class="text-center">Harga</th>
				<th class="text-center">Total</th>
				<th class="text-center">Hapus</th>
        </tfoot>
        </div></div></div>
    </table>
	<div class="row">
		<div class="col-md-12" align="center">
		<a class="btn btn-success" href="http://localhost/van/index.php/penjualan/index/" role="button">Kembali</a>
		</div>
   
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
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
					
<p>
</body>
</html>