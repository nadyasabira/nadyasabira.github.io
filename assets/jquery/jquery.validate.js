
	<div class="card-body">
<center><h3>Data Detail Penjualan</h3></center>
 </div>
  <div class="container">
  <div class="card">
  <div class="card-body">
  <div class="container">

  
<span style="float: right">
 
			
<button onclick="location.href = '<?php echo site_url('penjualan/index') ?>';" type="button" class="btn btn-info btn-sm">		
<span class="glyphicon glyphicon-save"></span>
				Kembali </button>
  </span>

		
  </div>
<div class="constraint">
<table class="table table-bordered table-hover" style="width:100%" align="center">
        <thead>
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">No Faktur</th>
                <th class="text-center">Nama Menu </th>
                <th class="text-center">Ukuran </th>
                <th class="text-center">Jenis </th>                
                <th class="text-center">Jumlah</th>
				<th class="text-center">Harga</th>
        <th class="text-center">HPP</th>      
				<th class="text-center">Total</th>
		
            </tr>
        </thead>
        <tbody>
		<?php
			$total = 0;
			foreach($isi_data as $cacah):
				echo "<tr>";
					echo "<td>".$cacah['id_transaksi_penjualan']."</td>";
					echo "<td>".$cacah['no_nota']."</td>";
          echo "<td>".$cacah['nama']."</td>";
          // echo "<td>".$cacah['nama_kategori']."</td>";
          // echo "<td>".$cacah['jenis']."</td>";
					echo "<td>".$cacah['jml_beli']."</td>";
          echo "<td>Rp ".number_format($cacah['harga_jual'])."</td>";
          echo "<td>Rp ".number_format($cacah['harga_jual']*80/100)."</td>";          
					echo "<td>Rp ".number_format($cacah['jml_beli']*$cacah['harga_jual'])."</td>";
				
						?>
					
						<?php
					echo "</td>";
				echo "</tr>";
				$total = $total  + $cacah['jml_beli']*$cacah['harga_jual'];
			endforeach;
		?>
		<tr>
                <th class="text-center" colspan="6">Total</th>
                <th class="text-center" colspan="1"><?php echo "Rp ".number_format($total);?></th>
        </tr>
        </tbody>
        <button onclick="location.href = '<?php echo site_url('penjualan/selesai') ?>';" type="button" class="btn btn-info btn-sm">
				<span class="glyphicon glyphicon-save"></span>
				selesai
			
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


	 <div class="form-group col-md-2">
		  <label for="jenis">Jenis </label>
		  <?php echo "<b>".form_error('jenis')."</b>"; ?> 	
		  <select class="form-select" name="jenis">
		  <option value="">-- Pilih Jenis--</option>
			<option value="kotak">Kotak</option>
			<option value="bulat">Bulat</option>			
		  </select>
	 </div> 


	 <div class="form-group col-md-1">
		  <label for="jumlah">Jumlah </label>
		  <span class="text-danger">*</span>
		  <?php echo "<b>".form_error('jumlah')."</b>"; ?> 	
		  <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo set_value('jumlah');?>"placeholder="Jml">	
		</div>
	