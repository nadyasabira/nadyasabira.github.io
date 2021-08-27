
	<div class="card-body">
<center><h3>Data Detail Pesanan</h3></center>
 </div>
  <div class="container">
  <div class="card">
  <div class="card-body">
  <div class="container">

  
<span style="float: right">
 
			


		
  </div>
<div class="constraint">
<table class="table table-bordered table-hover" style="width:100%" align="center">
        <thead>
            <tr>
                <th class="text-center">No Pesanan</th>
                <th class="text-center">Menu Pesanan </th>
                <th class="text-center">Jumlah</th>
             </tr>
        </thead>
        <tbody>
		<?php
			$total = 0;
			foreach($isi_data as $cacah):
				echo "<tr>";
					echo "<td>".$cacah['id_pesanan']."</td>";
          echo "<td>".$cacah['nama']."</td>";
		  echo "<td>".$cacah['jml_beli']."</td>";
      echo "<td>".$cacah['subtotal']."</td>";
          
						?>
				
						<?php
					echo "</td>";
				echo "</tr>";
			
			endforeach;
		?>

        </tbody>
    
			
    </table></div></div></div><p>
    <div class="form-group" align="center">

											<a class="btn btn-success" onclick="location.href = '<?php echo site_url('pemesanan1/index') ?>';" role="button">Selesai</a>
                 
  </span>
</div><br>
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