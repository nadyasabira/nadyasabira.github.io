<center>
	<h2>Laporan Pembelian Bahan Baku</h2>
	<h4>Per <?=date('Y-m-d')?></h4>
	<table border="1" style="border-collapse">
		<tr>
			<th>No</th>
			<th>Id Transaksi</th>
            <th>Tanggal</th>
            <th>Supplier</th>
            <th>Jumlah</th>
            <th>Total</th>
		</tr>
	   <?php $no=0; $gtotal=0; foreach ($pembelian as $row) { ?>
        <tr>
        	<td><?=$no=$no+1?></td>
            <td><?=$row->no_faktur?></td>
            <td><?=$row->tanggal?></td>
            <td><?=$row->nama_supplier?></td>
            <td><?=$row->total_beli?></td>
            <td><?=nominal($row->total)?></td>
            <?php $gtotal=$gtotal+$row->total?>
        </tr>
        <?php } ?>
        <tr>
            <td class="text-right" colspan="5">Total</td>
            <td><?= nominal($gtotal)?></td>
        </tr>
    </table>
</center>