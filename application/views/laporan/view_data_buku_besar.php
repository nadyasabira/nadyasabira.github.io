<div class="container">
  <h3>Pilih Nama Akun</h3>
  <form action="<?php echo site_url('C_Laporan/viewlaporanbukubesar') ?>" method="post" >
	 	<input type="hidden" name="bulan" value="<?php echo $bulan;?>" />	
		<input type="hidden" name="tahun" value="<?php echo $tahun;?>" />
	  <div class="form-group">
		  <label for="akun">Nama Akun</label>
		  <select class="form-control" name="akun">
				<?php
				foreach($akun as $cacah):
					if($cacah['kode_akun']==$akun_di_pilih){
				?>
				<option value="<?php echo $cacah['kode_akun']?>" selected><?php echo $cacah['nama_akun']?></option>
				<?php	
					}else{
				?>
				<option value="<?php echo $cacah['kode_akun']?>"><?php echo $cacah['nama_akun']?></option>
				<?php	
					}
				?>	
				<?php
					endforeach;
		  	?>
		  </select>
	 	</div><p>
	  <div class="row">
			<div class="col-sm-12" align="center">
				<button type="submit" class="btn btn-success">Proses</button>
			</div>
		</div><p><hr>
		<div class="row">
			<div class="col-sm-12" align="center">
				<b>CV.OEI CAKE</b>
			</div>
			<div class="col-sm-12" align="center">
				<b>Buku Besar</b>
			</div>
			<div class="col-sm-12" align="center">
				<b>Periode <?php echo format_bulan($bulan)." ".$tahun; ?></b>
			</div>
		</div><p><p>
		<div class="row">
			<div class="col-sm-6" align="left">
				<b>Nama Akun: <?php
					foreach($akun as $cacah):
						if($cacah['kode_akun']==$akun_di_pilih){
					?>
					<?php echo $cacah['nama_akun']?>
					<?php	
						}
					?>	
					<?php
						endforeach;
		  		?></b><p>
			</div>
			<div class="col-sm-6" align="right">
				<b>Kode Akun:  <?php echo $akun_di_pilih;?></b><p>
			</div>
		</div>
		<table class="table table-bordered"style="background-color:white;">
			<thead>
		  	<tr>
          <th rowspan="2" class="text-center">Tanggal</th>
          <th rowspan="2" style="width: 25%" class="text-center">Keterangan</th>
        	<th rowspan="2" style="width: 5%">Ref</th>
          <th rowspan="2" class="text-center">Debit</th>
          <th rowspan="2" class="text-center">Kredit</th>
          <th colspan="2" class="text-center">Saldo</th>
        </tr>
        <tr>
          <th class="text-center">Debit</th>
          <th class="text-center">Kredit</th>
	      </tr>
			</thead> 
			<tbody>
			<tr>
				<td>-</td>
				<td style="background-color: #eee">Saldo Awal</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<?php
					if(strcmp($posisi_saldo_normal,'d')==0){
						echo "<td style='background-color: #eee' class='text-right'>".format_rp($saldo_awal)."</td>";
						echo "<td>-</td>";
						$saldo_debet = $saldo_awal;
						$saldo_kredit = 0;
					}else{
						echo "<td>-</td>";
						echo "<td style='background-color: #eee' class='text-right'>".format_rp($saldo_awal)."</td>";
						$saldo_debet = 0;
						$saldo_kredit = $saldo_awal;
					}
				?>
			</tr>
			<?php
				if(strcmp($posisi_saldo_normal,'d')==0){
					$saldo_debet = $saldo_awal;
					$saldo_kredit = 0;
				}else{
					$saldo_debet = 0;
					$saldo_kredit = $saldo_awal;
				}
			?>
			<?php
				foreach($buku_besar as $cacah):
					echo "<tr>";
						echo "<td>".$cacah['tgl_jurnal']."</td>";
						echo "<td>".$cacah['nama_akun']."</td>";
						if(strcmp($cacah['posisi_d_c'],'d')==0){
							echo "<td>-</td>";
							echo "<td class='text-right'>".format_rp($cacah['nominal'])."</td>";
							echo "<td>-</td>";
							if(strcmp($posisi_saldo_normal,'d')==0){
								$saldo_debet = ($saldo_debet  + $cacah['nominal']);
								echo "<td class='text-right'>".format_rp($saldo_debet)."</td>";
								echo "<td class='text-right'>".format_rp($saldo_kredit)."</td>";
							}else{
								$saldo_kredit = $saldo_kredit  - $cacah['nominal'];
								echo "<td class='text-right'>".format_rp(+$saldo_debet)."</td>";
								echo "<td class='text-right'>".format_rp($saldo_kredit)."</td>";
							}
						}else{
							echo "<td>-</td>";
							echo "<td>-</td>";
							echo "<td class='text-right'>".format_rp($cacah['nominal'])."</td>";
							if(strcmp($posisi_saldo_normal,'d')==0){
								$saldo_debet = $saldo_debet  - $cacah['nominal'];
								echo "<td class='text-right'>".format_rp($saldo_debet)."</td>";
								echo "<td class='text-right'>".format_rp($saldo_kredit)."</td>";
							}else{
								$saldo_kredit = $saldo_kredit  + $cacah['nominal'];
								echo "<td class='text-right'>".format_rp($saldo_debet)."</td>";
								echo "<td class='text-right'>".format_rp($saldo_kredit)."</td>";
							}
						}
					echo "</tr>";
				endforeach;
				if(strcmp($posisi_saldo_normal,'d')==0){
					$saldo_akhir = $saldo_debet - $saldo_kredit ;
				}else{
					$saldo_akhir = $saldo_kredit - $saldo_debet ;
				}
			?>
			<tr>
				<td>-</td>
				<td style='background-color: #eee'>Saldo Akhir</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<?php
					if(strcmp($posisi_saldo_normal,'d')==0){
						echo "<td style='background-color: #eee' class='text-right'>".format_rp($saldo_akhir)."</td>";
						echo "<td style='background-color: ' >-</td>";
					}else{
						echo "<td style='background-color: #black' >-</td>";
						echo "<td style='background-color: #eee' class='text-right'>".format_rp($saldo_akhir)."</td>";
					}
				?>
			</tr>
		</tbody>
	</table><p>
</div>
</body>
</html>
</form>		
</body>
</html>