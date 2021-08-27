<!DOCTYPE html>
<html> 
    <body>
        <div class="col-md-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Data Pembelian Bahan Baku Periode <?= $tahun; ?></h3> 
                </div>
                <canvas id="myChart"></canvas>
                <?php
                    //Inisialisasi nilai variabel awal
                    $nama_bulan= "";
                    $totalpembelian="";
                    $jumlah=null;
                    foreach ($rekappembelian as $item){
                        $bulan=$item->nama_bulan;
                        $nama_bulan .= "'$bulan'". ", ";
                        $jum=$item->totalpembelian;
                        $jumlah .= "$jum". ", ";
                    }
                ?><br>
                <div class="row">
                    <div class="col-md-4">
                        <table id="example" name = "example" class="table table-striped table-bordered" style="width:100%" align="center">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Bulan</th>
                                    <th class="text-center">Total Pembelian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1; 
                                    foreach($rekappembelian1 as $cacah):
                                        echo "<tr>";
                                            echo "<td align='center'>".$no++."</td>";
                                            echo "<td>".$cacah['nama_bulan']."</td>";
                                            echo "<td align='right'>Rp ".number_format($cacah['totalpembelian'])."</td>";  
                                        echo "</tr>";
                                    endforeach;
                                ?>
                            </tbody>        
                        </table>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="col-md-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Data Pembelian Bahan Penolong Periode <?= $tahun; ?></h3> 
                </div>
                <canvas id="myChart1"></canvas>
                <?php
                    //Inisialisasi nilai variabel awal
                    $nama_bulan1= "";
                    $totalpembelian_bp="";
                    $jumlah1=null;
                    foreach ($rekappembelian_bp as $item){
                        $bulan=$item->nama_bulan;
                        $nama_bulan1 .= "'$bulan'". ", ";
                        $jum=$item->totalpembelian_bp;
                        $jumlah1 .= "$jum". ", ";
                    }
                ?><br>
                <div class="row">
                    <div class="col-md-4">
                        <table id="example" name = "example" class="table table-striped table-bordered" style="width:100%" align="center">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Bulan</th>
                                    <th class="text-center">Total Pembelian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1; 
                                    foreach($rekappembelian_bp1 as $cacah):
                                        echo "<tr>";
                                            echo "<td align='center'>".$no++."</td>";
                                            echo "<td>".$cacah['nama_bulan']."</td>";
                                            echo "<td align='right'>Rp ".number_format($cacah['totalpembelian_bp'])."</td>";  
                                        echo "</tr>";
                                    endforeach;
                                ?>
                            </tbody>        
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo base_url('assets/chartjs/chartjs/Chart.js')?>"></script>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',
                // The data for our dataset
                data: {
                    labels: [<?php echo $nama_bulan; ?>],
                    datasets: [{
                        label:'Data Pembelian Bahan Baku ',
                        backgroundColor: ['rgb(255,0,0)','rgb(255,215,0)','rgb(128,128,0)','rgb(0,128,0)','rgb(0,128,128)','rgb(0,0,255)','rgb(255,20,147)','rgb(139,69,19)','rgb(128,0,128)','rgb(75,0,130)','rgb(0,0,0)','rgb(128,128,128)'],
                        borderColor: ['rgb(255, 99, 132)'],
                        data: [<?php echo $jumlah; ?>],
                    }]
                },
                // Configuration options go here
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        </script>
        <script>
            var ctx = document.getElementById('myChart1').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',
                // The data for our dataset
                data: {
                    labels: [<?php echo $nama_bulan1; ?>],
                    datasets: [{
                        label:'Data Pembelian Bahan Penolong ',
                        backgroundColor: ['rgb(255,0,0)','rgb(255,215,0)','rgb(128,128,0)','rgb(0,128,0)','rgb(0,128,128)','rgb(0,0,255)','rgb(255,20,147)','rgb(139,69,19)','rgb(128,0,128)','rgb(75,0,130)','rgb(0,0,0)','rgb(128,128,128)'],
                        data: [<?php echo $jumlah1; ?>],
                    }]
                },
                // Configuration options go here
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        </script>
    </body>
</html>