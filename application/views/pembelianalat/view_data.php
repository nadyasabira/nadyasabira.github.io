<h2 class="page-title">Data Pembelian Peralatan</h2>   
<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <a class="btn btn-success mb-3" href="<?= base_url('pembelian_alat/input_form') ?>">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <line x1="12" y1="5" x2="12" y2="19" />
            <line x1="5" y1="12" x2="19" y2="12" />
          </svg>
          Tambah Data
        </a>
      </div>
      <div class="card-body">
        <table class="table table-striped table-bordered" id="tabelakun">  
          <thead>
            <tr>
              <th class="text-center">No Faktur</th>
              <th class="text-center">Supplier</th>
              <th class="text-center">Tanggal Pembelian</th>
       				<th class="text-center">Detail</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
         		<?php
         			foreach($isi_data as $cacah):
         				echo "<tr>";
         				  echo "<td>".$cacah['no_faktur']."</td>";
         					echo "<td>".$cacah['nama_supplier']."</td>";
         					echo "<td align='center'>".$cacah['waktu_transaksi']."</td>";
         		?>
       			<td>
       				<button onclick="location.href = '<?php echo site_url('pembelian_alat/view_data_detail2/'.$cacah['no_faktur'].'/'.$cacah['id_supplier']) ?>'" type="button" class="btn btn-info btn-sm">
        				<span class="glyphicon glyphicon-menu-hamburger"></span> Detail
       			</td>	
            <td>
              <button onclick="location.href = '<?php echo site_url('pembelian_alat/cetak/'.$cacah['no_faktur'].'/'.$cacah['id_supplier']) ?>'" type="button" class="btn btn-success btn-sm">
                <span class="glyphicon glyphicon-menu-hamburger"></span> Cetak
            </td> 
      	<!--<td>
              <a onclick="deleteConfirm('<?php echo site_url('pembelian_alat/delete_form/'.$cacah['no_faktur'].'/'.$cacah['id_supplier']) ?>')" href="#!" class="btn btn-danger btn-sm">
       					<span class="fa fa-trash"></span> Hapus
       				</a>
            </td>	-->		
            </tr>
      			<?php
              endforeach;
      		  ?>
          </tbody>
        </table>
	<!-- <?php echo $this->pagination->create_links(); ?> -->
  <script>
    $(document).ready(function() {
      $('#example').DataTable( {
        "pagingType": "full_numbers"
      } );
	  $(".perbesar").fancybox();
    } );
  </script>
  <script>
    function deleteConfirm(url){
      $('#btn-delete').attr('href', url);
	    $('#deleteModal').modal();
    }
  </script>
  <script>
    $(function(){
        
        $('#tabelakun').DataTable();
    });
</script>
</div>
</div>
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
</div>
</body>
</html>