<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <center>
        <h2>Data Stok</h2>
        <h4>Per  <?=date('Y-m-d')?></h4>
        <table border="1" style="border-collapse: collapse">
            <tr>
                <th>No</th>
                <th>ID Supplier</th>
                <th>Harga Satuan</th>
                <th>Jumlah</th>
            </tr>
            <?php $no=0; foreach($penjualan as $row) {?>
                <tr>
                    <td><?=$no=$no+1?></td>
                    <td><?=$row->id_supplier?></td>
                    <td><?=$row->harga_satuan?></td>
                    <td><?=$row->jumlah_beli?></td>
                </tr>
                <?php } ?>
        </table>
    </center>

</body>
</html>