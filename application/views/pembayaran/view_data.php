<div class="container">
<center><h3> Data Penerimaan Kas</h3></center><br></center>
<div class="container">
 <div class="card">
  <div class="card-body">
  <div class="container">

  <div class="row justify-content-between">
    <div class="col-4"> 
  <div class="py-2">
    <!-- <a href="http://localhost/pakhir/index.php/pembayaran/input_form" class="btn btn-primary btn-sm active mb-3" role="button" aria-pressed="true">Tambah Data</a>
  <a href="http://localhost/pakhir/index.php/C_Laporan/view_jual" class="btn btn-danger btn-sm active mb-3" role="button" aria-pressed="true">Laporan Penjualan</a>
   -->
  </div></div>
    <!-- <div class="col-4">
    </div>
   
    </div> -->



  </div>
  
 
<table id="example" name = "example" class="table table-striped table-bordered" style="width:100%" align="center">
        <thead>
        <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Nama Pelanggan</th>
				<th class="text-center">No Nota Penjualan</th>
                 <th class="text-center">Waktu</th>
                <th class="text-center">Waktu Bayar</th>
                <th class="text-center">Uang Muka</th>                
				<th class="text-center">Status</th>
               
				<!-- <th class="text-center">Hapus</th> -->
            </tr>
        </thead>
        <tbody>
        <?php
			foreach($isi_data as $cacah):
				echo "<tr>";
					echo "<td>".$cacah['id_bayar']."</td>";
                    echo "<td>".$cacah['nama_konsumen']."</td>";
                    echo "<td>".$cacah['no_nota']."</td>";
                    echo "<td align='center'>" . $cacah['waktu'] . "</td>";
                    echo "<td>".$cacah['waktu_bayar']."</td>";
					echo "<td>Rp ".number_format($cacah['subtotal'])."</td>";
					?>
                    
                    <td><?php echo $cacah['status']; ?></td>
					<td>
						<?php if ($cacah['status']=='lunas') {
							echo "";
						}else{
							?>
					
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
<div class="modal modal-blur fade" id="modalkonsumen" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Input konsumen</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <div id="loadforminputkonsumen"></div>
            </div>          
            </div>
          </div>
        </div>
            
              <script>
        $(function(){
            $("#tambah_bayar").click(function(){
                $("#modalkonsumen").modal("show");
                $("#loadforminputkonsumen").load("<?php echo base_url(); ?>pembayaran/tambah");
            });
            
            $('#tabelkonsumen').DataTable();
        });
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