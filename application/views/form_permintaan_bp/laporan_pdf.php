<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Laporan Pembelian</title>
	</head>
	<style type="text/css">
		td, th {
  			border: 1px solid #000;
			text-align: center;
			padding: 8px;
		}
	</style>
	<body>
		<div style="width: 500px; margin: auto;"><br>
		<center>
			OEI CAKE<br>
			Laporan Pembelian Bahan Baku<br>
			<?php echo 'Per' .date('Y-m-d'); ?><hr>
		<table class="table w-100 table-bordered table-hover">
			<thead>
				<tr>
                    <th>No</th>
                    <th>No Faktur</th>
                    <th>Tanggal</th>
                   	<th>Supplier</th>                                      
                    <th>Total Transaksi</th>
                </tr>
            </thead>
			<tbody>
                <?php $no=1; $gtotal=0; foreach ($pembelian as $row) { ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$row->no_faktur?></td>
                        <td><?=$row->tanggal?></td>
                        <td><?=$row->nama_supplier?></td>
                        <td><?=nominal($row->total)?></td>
                        <?php $gtotal=$gtotal+$row->total?>
                    </tr>
                <?php } ?>
                    <tr>
                        <td class="text-right" colspan="4">Total</td>
                        <td><?= nominal($gtotal)?></td>
                    </tr>
            </tbody>
        </div>                          
            </table><hr>
	</div>
	<script>
		window.print()
	</script>
</body>
</html>