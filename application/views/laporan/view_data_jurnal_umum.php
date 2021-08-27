<div class="container">
	<div class="row">
		<div class="col-sm-12" align="center">
			<b>CV.OEI CAKE</b>
		</div>
		<div class="col-sm-12" align="center">
			<b>Jurnal Umum</b>
		</div>
		<div class="col-sm-12" align="center">
			<b>Periode <?php echo format_bulan($bulan)." ".$tahun; ?></b>
		</div>
	</div><p><p>
  <table class="table table-bordered"style="background-color:white;" >
    <thead>
      <tr>
        <th class="text-center">Tanggal</th>
        <th class="text-center">Keterangan</th>
				<th class="text-center">No Akun</th>
				<th class="text-center">Debet</th>
				<th class="text-center">Kredit</th>
      </tr>
    </thead>
    <tbody>
    	<?php
	 			$debet=0;
	 			$kredit=0;
				foreach($jurnal as $cacah):
					echo "<tr>";
						echo "<td align='center'>".format_indo(date($cacah['tanggal']));
						if(strcmp($cacah['posisi_d_c'],'d')==0){
							echo "<td>".$cacah['nama_akun']."</td>";
						}else{
							echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$cacah['nama_akun']."</td>";	
						}
						echo "<td align='center'>".$cacah['kode_akun']."</td>";	
						if(strcmp($cacah['posisi_d_c'],'d')==0){
							echo "<td align='right'>".format_rp($cacah['nominal'])."</td>";
							echo "<td>-</td>";	
						}else{
							echo "<td>-</td>";	
							echo "<td align='right'>".format_rp($cacah['nominal'])."</td>";
						}
						if(strcmp($cacah['posisi_d_c'],'d')==0){
							$debet=$debet + $cacah['nominal'];					
						}else{
							$kredit=$kredit + $cacah['nominal'];
						}
					echo "</tr>";	
				endforeach;	
			?>
	 		<tr>
	 			<th class="text-center"  style="background-color:green,font-color:black"colspan="3">Total</th>
	 			<th class='text-right'><?= format_rp($debet)?></th>
	 			<th class='text-right'><?= format_rp($kredit)?></th>
    	</tbody>
  	</table><p>
</div>
</body>
</html>