<h2 class="page-title">
          Daftar Akun
      </h2>   
      <div class="row mt-3">
       <div class="col-md-12">
          <div class="card">
             <div class="card-body">
             <a href="<?php base_urL();?>input_form" class="btn btn-success mb-3" id="tambah_harga">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
      Tambah Data
    </a>
 
             <?php echo form_error('simpan')?> 
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered" id="tabelC_User">
        <thead>
            <tr>
                <th class="text-center">Id User</th>
                <th class="text-center">Nama Pemilik</th>
                <th class="text-center">No Handphone</th>
                <th class="text-center">Username</th>
                 <th class="text-center">Kelompok</th>
				        <th class="text-center">Ubah/Hapus</th>
            </tr>
        </thead>
        <tbody>
		<?php
			foreach($isi_data as $cacah):
				echo "<tr>";
					echo "<td class='text-center'>".$cacah['id_user']."</td>";
					echo "<td class='text-center'>".$cacah['nama_lengkap']."</td>";
					echo "<td class='text-center'>".$cacah['no_hp']."</td>";
          echo "<td class='text-center'>".$cacah['username']."</td>";
          echo "<td class='text-center'>".$cacah['level']."</td>";
					echo "<td class='text-center'>";
						?>
						 
							<a onclick="deleteConfirm('<?php echo site_url('C_User/delete_form/'.$cacah['id_user']) ?>')" href="#!" class="btn btn-danger btn-sm">
								<span class="glyphicon glyphicon-trash"></span> Hapus
							</a>
						<?php
					echo "</td>";
				echo "</tr>";
			endforeach;
		?>
        </tbody>
       
    </table>
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

<script>
              $(document).ready(function() {
                $('#example').DataTable( {
                  "pagingType": "full_numbers"
                } );
              } );
            </script>
              <script>
        $(function(){
          
            $('#tabelC_User').DataTable();
        });
    </script>
</body>
</html>