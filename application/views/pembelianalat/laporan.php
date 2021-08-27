<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <h1 class="m-0 text-dark">Laporan Pembelian Peralatan Periode <?php echo format_bulan($bulan)." ".$tahun; ?></h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">   
                <div class="py-3">
                    <button onclick="window.print()" class="btn btn-danger mb-3">Eksport PDF</button>
                    <div class="card-body">                  
                        <table class="table table-striped table-bordered" id="tabelakun">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">No Faktur</th>
                                    <th scope="col" class="text-center">Tanggal</th>
                                    <th scope="col" class="text-center">Supplier</th>                                        
                                    <th scope="col" class="text-center">Total Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1; $gtotal=0;
                                    foreach($pembelian_alat as $cacah):
                                        echo "<tr>";
                                            echo "<td align='center'>".$no++."</td>";
                                            echo "<td>".$cacah['no_faktur']."</td>";
                                            echo "<td align='center'>".$cacah['tanggal']."</td>";
                                            echo "<td>".$cacah['nama_supplier']."</td>";
                                            echo "<td align='right'>Rp ".number_format($cacah['total'])."</td>";
                                        echo "</tr>";
                                        $total=$cacah['total'];
                                        $gtotal=$gtotal+$total;
                                    endforeach;
                                ?>
                                <th colspan="4" class="text-right">Total</th>
                                <th class="text-right">Rp <?= number_format($gtotal); ?></th>
                            </tbody>        
                        </table>
                    </div>                          
                    <script>
                        $(function(){
                            $('#tabelakun').DataTable();
                        });
                    </script>
                </div> 