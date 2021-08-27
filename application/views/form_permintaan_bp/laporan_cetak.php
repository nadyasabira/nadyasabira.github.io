<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cetak</title>
</head>
<body>
	<div style="width: 500px; margin: auto;">
		<br>
		<center>
			OEI CAKE<br>
			Jl. Letkol Iskandar, Tengah Padang, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38113<br><br><hr>
			<table width="100%">
				<?php
            		foreach($pembelian as $cacah):
            			echo "<tr>";
            				echo "<td>".$cacah['no_faktur']."</td>";
            				echo "<td align='center'>".$cacah['nama_supplier']."</td>";
            				echo "<td align='right'>".$cacah['waktu_transaksi']."</td>";
            		endforeach; ?>
			</table>
			<hr>
			<table class="table w-100 table-bordered table-hover">
			<thead>
				<tr>
                    <th>No</th>
                    <th width="15%">ID</th>
                    <th width="35%">Nama Bahan Baku</th>
                    <th>Jumlah</th>
                   	<th width="25%">Harga</th>                                      
                    <th width="35%">Subtotal</th>
                </tr>
            </thead>
			<tbody>
				<?php $no=1; $gtotal=0; $total=0;
					foreach($isi_data as $cacah):
						echo "<tr>";
							echo "<td>".$no++."</td>";
							echo "<td>".$cacah['id_bb']."</td>";
							echo "<td>".$cacah['nama_bb']."</td>";
							echo "<td align='center'>".$cacah['jumlah_beli']." ". $cacah['satuan']."</td>";
							echo "<td align='right'>Rp ".number_format($cacah['harga_satuan'])."</td>";
							echo "<td align='right'>Rp ".number_format($cacah['jumlah_beli']*$cacah['harga_satuan'])."</td>";	
						echo "</tr>";
						$total=$cacah['jumlah_beli']*$cacah['harga_satuan'];
						$gtotal=$gtotal+$total;
					endforeach;
				?>
				<th colspan="5" align="right">Total</th>
				<th align="right">Rp <?= number_format($gtotal); ?></th>
			</tbody>    	
			</table>
			<hr>
			</center>
	</div>
	<script>
		window.print()
	</script>
</body>
</html>