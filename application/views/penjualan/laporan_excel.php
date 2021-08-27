<center>
	<h2>Laporan Penjualan</h2>
	<h4>Per <?=date('Y-m-d')?></h4>
	<table border="1" style="border-collapse">
		<tr>
			<th>No</th>
			<th>Id Transaksi</th>
            <th>Tanggal</th>
            <th>Jumlah</th>

		</tr>
		<?php $no=0; $gtotal=0; foreach ($penjualan as $row) { ?>
        <tr>
        	 <td><?=$no=$no+1?></td>
             <td><?=$row->id_penjualan?></td>
             <td><?=$row->waktu?></td>
             <td><?=nominal($row->total)?></td>
             <?php $gtotal=$gtotal+$row->total?>
        </tr>
        <?php } ?>
        <tr>
        <td class="text-right" colspan="3">Total</td>
        <td><?= nominal($gtotal)?></td>
        </tr>
    </table>
</center>