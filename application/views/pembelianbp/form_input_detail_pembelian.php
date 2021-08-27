<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <h1 class="m-0 text-dark">Pembelian Bahan Penolong</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div><hr>
	<div class="row">
	<div class="col">
	<div class="container-fluid">
	<div class="card shadow">
	<div class="card-header">
		<strong>Transaksi Pembelian Bahan Penolong</strong>
	</div>
	<div class="card-body">
	<form action="<?php echo site_url('pembelian_bp/simpan_barang') ?>" method="post"  >
	<input type="hidden" name="no_faktur" value="<?php echo $_SESSION['no_faktur']; ?>" />
	<input type="hidden" name="id_supplier" value="<?php echo $_SESSION['id_supplier']; ?>" />	
	<input type="hidden" name="datetimepicker" value="<?php echo $_SESSION['datetimepicker']; ?>" />
  <input type="hidden" name="keterangan" value="pembelian" />
	<div class="row">
	<div class="form-group col-md-3">
		<label for="nama_bp">Bahan Penolong</label>
		<?php echo form_error('nama_bp'); ?>
		<select name = "nama_bp" class = "form-control" id="id_bp">
			<option value="" style="text-align:center"disabled selected>-Pilih Bahan Penolong-</option>
      <?php $data = $bp; ?>
			<?php
				foreach($barang as $brg){
					echo "<option value = ".$brg['id_bp'].">".$brg['nama_bp']."</option>";
				}
			?>
		</select><br>
	</div>
	<div class="form-group col-md-2">
		<label for="harga_satuan">Harga Satuan:</label>
		<?php echo "<b>".form_error('harga_satuan')."</b>"; ?> 	
		<input type="text" class="form-control" id="harga_satuan" name="harga_satuan" value="" readonly>
	</div>
	<div class="form-group col-md-2">
		<label for="jumlah_beli">Jumlah Pembelian:</label>
		<?php echo "<b>".form_error('jumlah_beli')."</b>"; ?> 	
		<input type="number" class="form-control" id="jumlah_beli" name="jumlah_beli" value="<?php echo set_value('jumlah_beli'); ?>" placeholder="Jumlah beli" min="1" required>
	</div>
	<div class="form-group col-md-1">
		<label for="satuan">satuan:</label>
		<?php echo "<b><font color='red'>".form_error('satuan')."</font></b>"; ?> 
		<input type="text" class="form-control" id="satuan" name="satuan" value="" readonly>
	</div>  
	<div class="form-group col-md-2"><br>
    <button type="submit" class="btn btn-primary btn-block" id="btn_tambah_transaksi" disabled>Tambah</button>
</div>
</div><br><br><br><br>
  <table id="example" name = "example" class="table table-striped table-bordered" style="width:100%" align="center">
    <thead>
      <tr>
        <th class="text-center">No</th>
        <th class="text-center">Bahan Penolong</th>
        <th class="text-center">Jumlah</th>
        <th class="text-center">Harga</th>
				<th class="text-center">Subtotal</th>
				<th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; $gtotal=0; $total=0;
        foreach($isi_data as $cacah):
				  echo "<tr>";
            echo "<td align='center'>".$no++."</td>";
            echo "<td>".$cacah['nama_bp']."</td>";
            echo "<td align='center'>".$cacah['jumlah_beli']." ". $cacah['satuan']."</td>";
            echo "<td align='right'>Rp ".number_format($cacah['harga_satuan'])."</td>";
            echo "<td align='right'>Rp ".number_format($cacah['jumlah_beli']*$cacah['harga_satuan'])."</td>";
            echo "<td>";
            $total=$cacah['jumlah_beli']*$cacah['harga_satuan'];
            $gtotal=$gtotal+$total;
			?>
			<a onclick="deleteConfirm('<?php echo site_url('pembelian_bp/delete_form_detail2/'.$cacah['id_transaksi_beli_bp'].'/'.$cacah['no_faktur'].'/'.$cacah['id_supplier']) ?>')" href="#!" class="btn btn-danger btn-sm">
				<span class="glyphicon glyphicon-trash"></span> Hapus
			</a>
			<?php
				   echo "</td>";
			   	echo "</tr>";
			 endforeach;
		  ?>
      <th colspan="4" class="text-right">Total</th>
      <th class="text-right">Rp <?= number_format($gtotal); ?></th>
      <td>
        <button onclick="location.href = '<?php echo site_url('pembelian_bp/selesai') ?>';" type="button" class="btn btn-primary btn-sm">
          <span class="fa fa-save"></span>
          Selesai
        </button>
      </td>
    </tbody>
  </table>
</div>
<script>
  $(document).ready(function() {
    $('#id_bp').on("change", function() {
      let tes = document.getElementById("id_bp").value;
      if (tes != '') {
        $('#btn_tambah_transaksi').removeAttr('disabled')
      }
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url() . "pembelian_bp/ambildataBahanPenolong" ?>',
        dataType: 'json',
        success: function(data) {
          let bb = '';
          for (var i = 0; i < data['bp'].length; i++) {
            if (data['bp'][i].id_bp == tes) {
              bp = data['bp'][i].harga_satuan;
              namaBrg = data['bp'][i].nama_bp;
            }
          }
          document.getElementById("harga_satuan").value = bp;
        }
      });
    });
    $('#dataTables-example').dataTable();
  });
</script>
<script>
  $(document).ready(function() {
    $('#id_bp').on("change", function() {
      let tes = document.getElementById("id_bp").value;
      if (tes != '') {
        $('#btn_tambah_transaksi').removeAttr('disabled')
      }
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url() . "pembelian_bp/ambildataBahanPenolong" ?>',
        dataType: 'json',
        success: function(data) {
          let bb = '';
          for (var i = 0; i < data['bp'].length; i++) {
            if (data['bp'][i].id_bp == tes) {
              bp = data['bp'][i].satuan;
              namaBrg = data['bp'][i].nama_bp;
            }
          }
          document.getElementById("satuan").value = bp;
        }
      });
    });
    $('#dataTables-example').dataTable();
  });
</script>
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
<script>	
	$(document).ready(function(){
		// Format mata uang.
		$('#harga_satuan').mask('0.000.000.000.000.000', {reverse: true});		
	})
</script>	
</body>
</html>