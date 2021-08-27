<div class="container">
  <br>
  <?php
	
	foreach($data_form_input as $cacah):
		$id_pesanan = $cacah['id_pesanan'];
		$id_konsumen = $cacah['id_konsumen'];
		$nama_konsumen = $cacah['nama_konsumen'];
		$nama = $cacah['nama'];
		$subtotal = $cacah['subtotal'];
		$waktu = $cacah['waktu'];
		// $dokumen = $cacah['dokumen'];
	endforeach;
  ?>
   <form action="<?php echo site_url('pemesanan1/edit_form/'.$id_pesanan.'/'.$id_konsumen) ?>" method="post" enctype="multipart/form-data" >
   <div class="row">
   <div class="col-sm-6">
   <div class="card text-center" style="width:18 rem">
   <div class="card-body">
   <h4 class="card-title">Informasi Data Pesanan</h4>
   
   <?php
		echo "<p>Nomor Pesanan			: ".$id_pesanan."</p>";
		echo "<p>Nama Pemesan		   	: ".$nama_konsumen." </p>";
		echo "<p>Nama Menu		   		: ".$nama." </p>";
		echo "<p>Tanggal Pesanan  		: ".$waktu." </p>";
		echo "<p>Subtotal				: Rp.".$subtotal." </p>";
	
	?>
	
	</div></div></div>
	<div class="col-sm-6">
	<div class="container">
	<div class="card">
   <div class="card-header">
   <div class="container">
   <h5 class="card-title" align="center">Update Data Pesanan</h5>
   <!-- <div class="card-body"> -->
	
   
  
   
   
   <div class="form-group">
		
		  <?php echo "<b>".form_error('id_pesanan')."</b>"; ?> 	
		  <input type="hidden" class="form-control" name="id_pesanan" value="<?php echo $id_pesanan ?>" placeholder="Masukkan No Faktur cth: PJL2012-01">
	 </div>
   
	 <div class="form-group">
		  <label for="id_konsumen">Supplier*:</label>
		  <select class="form-control" name="id_konsumen">
			<?php
			foreach($dataSupplier as $cacah_dataSupplier):
					//jika sama maka option-nya diberi selected untuk nilai default sesuai yang tersimpan didatabase
					if(strcmp($cacah_dataSupplier['id_konsumen'],$id_konsumen)==0){
						?>
						<option type="hidden"value="<?php echo $cacah_dataSupplier['id_konsumen']?>" selected><?php echo $nama_konsumen  ?></option>	
						<?php
					}else{
					?>
						<option type="hidden"value="<?php echo $cacah_dataSupplier['id_konsumen']?>"><?php echo $nama_konsumen ?></option>
					<?php
					}
				?>	
				<?php
			endforeach;
		  ?>
		  </select>
	 </div>
		

	 <!-- <div class="form-group">
		  <label for="dokumen">Dokumen:</label>
		
		  <input type="file" class="form-control-file" name="dokumen">
		  <input type="hidden" name="old_document" value="<?php echo $dokumen; ?>" />
		</div>  -->
   <br>
   <div class="row">
		<div class="col-md-6" align="left">
		<a class="btn btn-success" href="http://localhost/pakhir/index.php/pemesanan1/" role="button">Kembali</a>
		</div>
		<div class="col-sm-6"  align="right">
			<button type="submit" class="btn btn-success">Simpan</button>
		</div>
	</div>
	
	</div></div></div></div></div></div></div>
	<p>
	
	</form>
</body>
</html>