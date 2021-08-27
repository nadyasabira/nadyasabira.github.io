  
  <div class="container">
  
  <div class="card-body">
  

 <center> <h1 class="h3 mb-0 text-gray-800">Data Barang</h1><br></center>
 </div>
  <div class="container">
  <div class="card">
  <div class="card-body">
  <div class="container">

  
<span style="float: right">
  <a href="http://localhost/tariksis/index.php/menu/input_form" class="btn btn-primary btn-sm active mb-3" role="button" aria-pressed="true">Tambah Data</a>
  </span>
  </div>
<div class="constraint">
<table id="example" name = "example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">Id Menu</th>
                <th class="text-center">Nama Menu</th>
                <!-- <th>Tanggal Buat</th>
                <th>Tanggal Expired</th> -->
                
                 <th class="text-center">Gambar</th>
             
                <th class="text-center">Stok</th>
				        <th class="text-center">Ubah/Hapus</th>
            </tr>
        </thead>
        <tbody>
		<?php
			foreach($isi_data as $cacah):
				echo "<tr>";
          echo "<td>".$cacah['id']."</td>";
          echo "<td>".$cacah['nama']."</td>";   
					// echo "<td>".$cacah['Tgl_buat']."</td>"
					// echo "<td>".$cacah['tgl_habis']."</td>"            
          
          ?>
        
              <td class="text-center"><img src="<?php echo base_url('upload/menu/'.$cacah['gambar']) ?>" class="img-thumbnail" width="64" /></td>
          <?php
   
          echo "<td>".$cacah['stok']."</td>";
					echo "<td>";
						?>
							<button onclick="location.href = '<?php echo site_url('menu/edit_form/'.$cacah['id']) ?>';" type="button" class="btn btn-success btn-sm">
								<span class="glyphicon glyphicon-edit"></span> Ubah
							</button>
							<a onclick="deleteConfirm('<?php echo site_url('menu/delete/'.$cacah['id']) ?>')" href="#!" class="btn btn-danger btn-sm">
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
               <th class="text-center">Id Menu</th>
                <!-- <th>Tanggal Buat</th>
                <th>Tanggal Habis</th> -->
                <th class="text-center">Nama Menu</th>
                <th class="text-center">Gambar</th>            
                <th class="text-center">Stok</th>
				<th>Ubah/Hapus</th>
            </tr>
        </tfoot>
    </table>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } 
} 
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