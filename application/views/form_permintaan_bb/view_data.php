<h2 class="page-title">Data Permintaan Bahan Baku</h2>   
  <div class="row mt-3">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <a class="btn btn-success mb-3" href="<?= base_url('form_permintaan_bb/input_form') ?>">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            Tambah Data
          </a>
        </div>
        <div class="card-body">
          <table class="table table-striped table-bordered" id="tabelakun">
            <thead>
              <tr>
                <th class="text-center">ID Permintaan</th>
                <th class="text-center">Tanggal</th>
        				<th class="text-center">Detail</th>
              </tr>
            </thead>
            <tbody>
          		<?php
           			foreach($isi_data as $cacah):
           				echo "<tr>";
           				  echo "<td>".$cacah['id_permintaan_bb']."</td>";
           					echo "<td align='center'>".$cacah['tanggal']."</td>";
           		?>
         			<td>
         				<button onclick="location.href = '<?php echo site_url('form_permintaan_bb/view_data_detail2/'.$cacah['id_permintaan_bb']) ?>'" type="button" class="btn btn-info btn-sm">
         				  <span class="glyphicon glyphicon-menu-hamburger"></span> Detail
              </td>
    		<!--	<td>
                <a onclick="deleteConfirm('<?php echo site_url('form_permintaan_bb/delete_form/'.$cacah['no_faktur'].'/'.$cacah['id_supplier']) ?>')" href="#!" class="btn btn-danger btn-sm">
                  <span class="fa fa-trash"></span> Hapus
                </a>
              </td> -->			
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