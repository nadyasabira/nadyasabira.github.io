<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0 text-dark">Dashboard</h1>
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- <div class="alert alert-success" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon mr-1" width="24" height="24" viewBox="0 0 24 24"
     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
     <path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
  
    </div> -->
    <div class="row">
    <div class="col-md-6 col-xl-3">
              <div class="card card-sm">
                <div class="card-body d-flex align-items-center">
                  <span class="bg-red text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                  </span>
                  <div class="mr-3">
                    <div class="font-weight-medium">
                      <?php echo $all_konsumen; ?> Konsumen
                    </div>
                    <div class="text-muted">Data Konsumen</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-3">
              <div class="card card-sm">
                <div class="card-body d-flex align-items-center">
                  <span class="bg-green text-white avatar mr-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="19" r="2" /><circle cx="17" cy="19" r="2" /><path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" /></svg>
                  </span>
                  <div class="mr-3">
                    <div class="font-weight-medium">
                    <?php echo $all_penjualan; ?> Penjualan
                    </div>
                    <div class="text-muted">Transaksi Hari Ini</div>
                  </div>
                </div>
              </div>
            </div> 
            <div class="col-md-6 col-xl-3">
              <div class="card card-sm">
                <div class="card-body d-flex align-items-center">
                  <span class="bg-green text-white avatar mr-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="19" r="2" /><circle cx="17" cy="19" r="2" /><path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" /></svg>
                  </span>
                  <div class="mr-3">
                    <div class="font-weight-medium">
                    <?php echo $all_pembelian; ?> Pembelian
                    </div>
                    <div class="text-muted">Transaksi Hari Ini</div>
                  </div>
                </div>
              </div>
            </div> 
            <div class="col-md-6 col-xl-3">
              <div class="card card-sm">
                <div class="card-body d-flex align-items-center">
                  <span class="bg-blue text-white avatar mr-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="5" y="3" width="14" height="18" rx="2" /><line x1="9" y1="7" x2="15" y2="7" /><line x1="9" y1="11" x2="15" y2="11" /><line x1="9" y1="15" x2="13" y2="15" /></svg>
                  </span>
                  <div class="mr-3">
                    <div class="font-weight-medium">
                    <?php echo $all_menu; ?> Data Menu
                    </div>
                    <div class="text-muted">Daftar Menu</div>
                  </div>
                </div>
              </div>
            </div>    
            <!-- <div class="col-md-6 col-xl-3">
              <div class="card card-sm">
                <div class="card-body d-flex align-items-center">
                  <span class="bg-orange text-white avatar mr-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /><path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727" /><path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727" /></svg>
                  </span>
                  <div class="mr-3">
                    <div class="font-weight-medium">
                     1000000
                    </div>
                    <div class="text-muted">Pendapatan Hari Ini</div>
                  </div>
                </div>
              </div>
            </div>     -->
            <div class="col-12">
            <h1 class="mt-2 mb-3 h2 text-dark">Grafik</h1>
          </div>
      
         
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Produk Laris Terjual</h3>
              </div>
              <div class="card-body">
              <table class="table table-striped table-bordered">
                 <thead>
                 <tr>
                  <td>No</td>
                  <td>Nama</td>
                  <td>Jumlah</td>
                  </tr>
                 </thead>
                 <tbody>
                 <?php
              $no = 1;
              foreach ($hasil1 as $cacah) :
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                // echo "<td>".$cacah['kode_harga']."</td>";
                echo "<td>" . $cacah['nama_menu'] . "</td>";
              
                echo "<td>" . $cacah['total1'] . " Buah</td>";
             
              
              ?>
               
              <?php
                echo "</td>";
                echo "</tr>";
              endforeach;
              ?> 
                 </tbody>
              </table>
              <div class="chart">
                <div id="piechart"  style="height: 300px;max-height: 250px;"></div>
          
                <?php
    //Inisialisasi nilai variabel awal
    $nama_menu= "";
    $jumlah=null;
    foreach ($hasil as $item)
    {
        $penjualan=$item->nama_menu;
        $nama_menu .= "'$penjualan'". ", ";
        $jum=$item->total;
        $jumlah .= "$jum". ", ";
    }
    ?>
                </div>
              </div>
            </div>
          </div><br>

          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Daftar Pesanan</h3>
              </div>
              <div class="card-body" style="height: 300px;max-height: 250px;">
              <div class="table-responsive">
              <table class="table table-vcenter card-table table-striped">
                 <thead>
                 <tr>
                 <th class="text-center">ID</th>
                <th class="text-center">No Faktur</th>        
                <th class="text-center">Detail Pesanan</th>
        <th class="text-center">Status</th>
                  </tr>
                 </thead>
                 <tbody>
                 <?php
              $no = 1;
              foreach ($all_pesanan as $cacah) :
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>".$cacah['no_nota']."</td>";
                ?>
                <td class="text-center">
                <button onclick="location.href = '<?php echo site_url('pemesanan1/view_data_penjualan_detail2/'.$cacah['id_pesanan']) ?>'" type="button" class="btn btn-info btn-sm">
                  <center><span class="glyphicon glyphicon-menu-hamburger"></span> Detail</center>
          </td>
          <td class="text-center">
                  <?php if ($cacah['status'] == 'proses') { ?>
                    <p class="alert-info">Menu sedang diproses</p>
                  <?php } else if ($cacah['status'] == 'selesai') { ?>
                    <p class="alert-success">Pemesanan Selesai</p>
                  <?php }  else if ($cacah['status'] == 'pending') { ?>
                    <p class="alert-danger">Pending</p>
                  <?php }else{?>

                    
                   
                            <?php } ?>
             
               
              <?php
                echo "</td>";
                echo "</tr>";
              endforeach;
              ?> 
                 </tbody>
              </table>
              
         
                </div>
              </div>
            </div>
          </div><br>
          <!-- <div class="col-md-6">
          <tr>
          <td></td>
          <td></td>
          </tr>
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Detail</h3>
              </div>
              <div class="card-body">
                <div class="chart" style="height: 100px;max-height: 250px; overflow-y: scroll;">
             
                  </ul>
                </div>
              </div>
            </div> -->
       

   
</head>

<body>
    <div class="container mt-3" style="width:600px">
       
        <br />
       

        </div>
    </div>
          
          <!-- <div class="col-12">
            <h1 class="mt-2 mb-3 h2 text-dark"></h1>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Grafik Penjualan</h3> 
              </div>
              <div class="card-body">
                <?php foreach($rekappenjualan as $d){
                  $bulan[] = $d->nama_bulan;
                  $totalpenjualan[] = $d->totalpenjualan;  
                }    
                      
                  ?>
                <div class="chart">
                  <div id="grafik_penjualan"></div>
                </div>
              </div>
            </div>
          </div>
        </div><br> -->
      </div><!-- /.container-fluid -->     
            
      </div><!-- /.container-fluid -->
                </div>
               </div>
          </div>
            </div>
            </div>
        </div>
        <script src="<?php echo base_url('assets/vendor/adminlte/plugins/chart.js/Chart.min.js') ?>"></script>
        <script>
  var transaksi_hariUrl = '<?php echo site_url('transaksi/transaksi_hari') ?>';
  var transaksi_terakhirUrl = '<?php echo site_url('transaksi/transaksi_terakhir') ?>';
  var stok_hariUrl = '<?php echo site_url('stok_masuk/stok_hari') ?>';
  var produk_terlarisUrl = '<?php echo site_url('produk/produk_terlaris') ?>';
  var data_stokUrl = '<?php echo site_url('produk/data_stok') ?>';
  var penjualan_bulanUrl = '<?php echo site_url('transaksi/penjualan_bulan') ?>';
</script>
<script src="<?php echo base_url('assets/js/unminify/dashboard.js') ?>"></script>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>

    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['nama_menu', 'total1'],
            <?php
            foreach ($dataHarga as $harga) {
                echo "['" . $harga['nama_menu'] . "'," . $harga['total1'] . "],";
            }
            ?>
        ]);
        var options = {
            title: 'Total Produk Terjual',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>
<script type="text/javascript" src="<?php echo base_url('assets/chartjs/chartjs/Chart.js')?>"></script>
        <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-total-sales'), {
          chart: {
            type: "donut",
            fontFamily: 'inherit',
            height: 240,
            sparkline: {
              enabled: true
            },
            animations: {
              enabled: false
            },
          },
          
          fill: {
            opacity: 1,
          },
          series: [<?php echo $jumlah; ?>],
          labels: [<?php echo $nama_menu; ?>],
          // colors: ["#206bc4", "#5eba00", "#fa4654", "#fab005"],
          grid: {
            strokeDashArray: 4,
          },
          backgroundColor: ['rgb(255, 99, 132)','rgba(56, 86, 255, 0.87)','rgb(60, 179, 113)','rgb(175, 238, 239)','rgb(0,128,128)','rgb(19, 100, 0)','rgb(0, 255, 254)','rgb(115, 255, 216)','rgb(0, 0, 0)','rgb(0, 0, 255)','rgb(138, 43, 226)','rgb(165, 42, 42)','rgb(222, 184, 135)','rgb(95, 158, 160)','rgb(127, 255, 1)','rgb(210, 105, 30)','rgb(251, 127, 80)','rgb(100, 149, 237)','rgb(225, 248, 220)','rgb(220, 20, 60)','rgb(62, 254, 255)','rgb(0, 0, 139)','rgb(29, 139, 139)','rgb(184, 134, 11)','rgb(189, 183, 107)','rgb(139, 0, 140)','rgb(85, 107, 47)',' rgb(251, 140, 1)','rgb(153, 50, 204)','rgb(139, 5, 0)','rgb(233, 150, 122)','rgb(143, 188, 144)','rgb(72, 61, 139)','rgb(47, 79, 79)','rgb(48, 206, 209)','rgb(148, 0, 211)','rgb(249, 19, 147)','rgb(43, 191, 254)','rgb(105, 105, 105)','rgb(30, 144, 255)','rgb(178, 34, 33)','rgb(34, 139, 35)','rgb(249, 0, 255)','rgb(253, 215, 3)','rgb(218, 165, 32)','rgb(27, 128, 1)','rgb(173, 255, 48)','rgb(240, 255, 240)','rgb(205, 92, 92)','rgb(75, 0, 130)',' rgb(240, 230, 140)','rgb(124, 252, 2)','rgb(173, 216, 230)','rgb(240, 128, 128)','rgb(144, 238, 144)','rgb(252, 182, 193)','rgb(251, 160, 122)','rgb(40, 178, 170)','rgb(135, 206, 250)','rgb(119, 136, 153)','rgb(176, 196, 222)','rgb(63, 255, 0)','rgb(50, 205, 50)','rgb(249, 0, 255)','rgb(128, 4, 0)','rgb(102, 205, 170)','rgb(0, 0, 205)','rgb(186, 85, 211)','rgb(147, 112, 219)','rgb(60, 179, 113)','rgb(123, 103, 238)','rgb(62, 250, 153)','rgb(72, 209, 204)','rgb(199, 21, 133)','rgb(25, 25, 112)','rgb(0, 0, 128)','rgb(128, 128, 1)','rgb(107, 142, 35)','rgb(252, 165, 3)','rgb(250, 69, 1)','rgb(218, 112, 214)','rgb(219, 112, 147)',''],
                borderColor: ['rgb(255, 99, 132)'],
          legend: {
            show: false,
          },
        
        })).render();
      });
      // @formatter:on
    </script>