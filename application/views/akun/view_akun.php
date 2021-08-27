<p >
<div class="button btn-success" > </div>
</p>
<table id="example" name = "example" class="table table-striped table-bordered" style="width:50%" align="center">
        <thead>
            <tr>
                <th>Kode Akun</th>
                <th>Nama Akun</th>
                <th>Header Akun</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		<?php
      foreach($isi_data as $cacah):
        echo "<tr>";
          echo "<td>".$cacah['kode_akun']."</td>";
          echo "<td>".$cacah['nama_akun']."</td>";
          echo "<td>".$cacah['header_akun']."</td>";
          echo "<td>";
            ?>
							<button onclick="location.href = '<?php echo site_url('akun/edit_form/'.$cacah['kode_akun']) ?>';" type="button" class="btn btn-success btn-sm">
								<span class="glyphicon glyphicon-edit"></span> Ubah
							</button>
							<a onclick="deleteConfirm('<?php echo site_url('akun/delete_form/'.$cacah['kode_akun']) ?>')" href="#!" class="btn btn-danger btn-sm">
								<span class="glyphicon glyphicon-trash"></span> Hapus
							</a>
						<?php
					echo "</td>";
				echo "</tr>";
      endforeach;
		?>
        </tbody>
    </table>
    <div class="form-group" align="center">
    <button onclick="location.href ='http://localhost/tariksis/index.php/akun/input_form'" type="button" class="btn btn-success btn-sm">
                                <span class="glyphicon glyphicon-edit"></span> Tambah Data
                            </button></div>
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
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">X</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
      </div>
    </div>
  </div>
</div>
</body>
</html>