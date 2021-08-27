<div class="container">
<center><h3> Data Pesanan</h3></center><br></center>
<div class="container">
 <div class="card">
  <div class="card-body">
  <div class="container">

  <div class="row justify-content-between">
    <div class="col-4"> 
  <div class="py-2">
   
  </div></div>
    <!-- <div class="col-4">
    </div>
   
    </div> -->



  </div>
  
 
<table id="example" name = "example" class="table table-striped table-bordered" style="width:100%" align="center">
        <thead>
        <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Nama Konsumen</th>
                <th class="text-center">Nama Menu</th>
                 <th class="text-center">Waktu</th>    
                 <th class="text-center">Waktu Selesai</th>          
				<th class="text-center">Status</th>
                <th class="text-center">Opsi</th>
				<!-- <th class="text-center">Hapus</th> -->
            </tr>
        </thead>
        <tbody>
        <?php
			foreach($isi_data as $cacah):
				echo "<tr>";
          echo "<td>".$cacah['id_pesanan']."</td>";
          echo "<td>".$cacah['nama_konsumen']."</td>";
          
                    echo "<td>".$cacah['nama']."</td>";
                    echo "<td align='center'>" . $cacah['waktu'] . "</td>";
                    echo "<td>".$cacah['waktu_selesai']."</td>";
					
					?>
                    
                    <td><?php echo $cacah['status']; ?></td>
					<td>
						<?php if ($cacah['status']=='selesai') {
							echo "";
						}else{
							?>
							<button onclick="location.href = '<?php echo site_url('pemesanan/proses/'.$cacah['id_pesanan'].'/'.$cacah['id_konsumen']) ?>'" type="button" class="btn btn-success btn-sm">
						<span class="glyphicon glyphicon-menu-hamburger"></span> Selesai
						<?php
						} ?>
					</td>		
				</tr>
				<?php
			endforeach;
		?>
        </tbody>
        </table>
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
</body>
</html>