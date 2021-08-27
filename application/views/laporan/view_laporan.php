  
 <div class="container">
<center> <h1 class="h3 mb-0 text-gray-800">Data Stok Pembelian</h1><br></center>
</div>
 
 <div class="container">
 <div class="card">
  <div class="card-body">
  <div class="container">
  </div>
<div class="row">
  <div class="container" align="center">
   <a href="http://localhost/fixbismillah/index.php/pembelian" class="btn btn-success btn-sm active mb-3" role="button" aria-pressed="true">Lihat Pembelian</a>
 </div></div>
    <table id="example" name = "example" class="table table-striped table-bordered" style="width:100%">      
  <div class="container"></div>
  <thead>
            <tr>
                <th class="text-center">ID Supplier</th>
                <th class="text-center">Harga Satuan</th>
                <th class="text-center">Jumlah Beli</th>
            </tr>
        </thead>
        <tbody>
		<?php
			foreach($isi_data as $cacah):
				echo "<tr>";
					echo "<td>".$cacah['id_supplier']."</td>";
					echo "<td>".$cacah['harga_satuan']."</td>";
					echo "<td>".$cacah['jumlah_beli']."</td>";
					?>
				</tr>
				<?php
			endforeach;
		?>
        </tbody>
        <tfoot>
            <tr>
                <th class="text-center">ID Supplier</th>
                <th class="text-center">Harga Satuan</th>
                <th class="text-center">Jumlah Beli</th>
            </tr>
        </tfoot>
    </table>
    <div class="row">
		<div class="col-sm-12" style="background-color:white;" align="center">
			   <a href="<?php echo site_url('laporan/cetak_laporan_pembelian_ke_pdf/'.$cacah['jumlah_beli'].'/'.$cacah['id_supplier']) ?>" target="_blank">Simpan PDF
			</a>
		</div>
	</div>
</body>
</html>