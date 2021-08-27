<div class="container">
	<div class="card-body">
<center><h3>Data Detail Pembayaran</h3></center>
 </div>
  <div class="container">
  <div class="card">
  <div class="card-body">
  <div class="container">

  
<span style="float: right">
 
			
		
<a class="btn btn-success" href="http://localhost/van/index.php/penjualan/view_data/" role="button">Kembali</a>
  </span>

		
  </div>
<div class="constraint">
<table class="table table-bordered table-hover" style="width:100%" align="center">
        <thead>
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">No Faktur</th>
                <th class="text-center">Nama Konsumen </th>
               
            </tr>
        </thead>
        <tbody>
		<?php
			$total = 0;
			foreach($isi_data as $cacah):
				echo "<tr>";
					echo "<td>".$cacah['id_bayar']."</td>";
					echo "<td>".$cacah['no_nota']."</td>";
					echo "<td>".$cacah['nama_konsumen']."</td>";
					
						?>
							<a onclick="deleteConfirm('<?php echo site_url('penjualan/delete_form_detail2/'.$cacah['id_transaksi_penjualan']) ?>')" href="#!" class="btn btn-danger btn-sm">
								<span class="glyphicon glyphicon-trash"></span> Hapus
							</a>
						<?php
					echo "</td>";
				echo "</tr>";
				$total = $total  + $cacah['jml_brownies']*$cacah['harga_jual'];
			endforeach;
		?>
		<tr>
                <th class="text-center" colspan="5">Total</th>
                <th class="text-center" colspan="2"><?php echo "Rp ".number_format($total);?></th>
        </tr>
        </tbody>
       
			
    </table>
</div>
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

<div class="row">
		<div class="col-sm-12" style="background-color:white;" align="right">
			
		</div>

	</div>	
<p>
</body>
</html>