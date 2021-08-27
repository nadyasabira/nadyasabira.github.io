<!DOCTYPE html>
<html> 
  <body>
    <div class="col-md-12">
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Data Pembelian Bahan Baku Periode <?php echo format_bulan($bulan)." ".$tahun; ?></h3> 
        </div>
        <canvas id="myChart"></canvas>
        <?php
          //Inisialisasi nilai variabel awal
          $nama_bb= "";
          $total="";
          $jumlah=null;
          foreach ($rekappembelian as $item){
            $bb=$item->nama_bb;
            $nama_bb .= "'$bb'". ", ";
            $jum=$item->total;
            $jumlah .= "$jum". ", ";
          }
        ?><br>
        <div class="row">
          <div class="col-md-4">
            <table id="example" name = "example" class="table table-striped table-bordered" style="width:100%" align="center">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Nama Bahan Baku</th>
                  <th class="text-center">Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $no=1; 
                  foreach($rekappembelian1 as $cacah):
                    echo "<tr>";
                      echo "<td align='center'>".$no++."</td>";
                      echo "<td>".$cacah['nama_bb']."</td>";
                      echo "<td align='center'>".$cacah['total']." ". $cacah['satuan']."</td>";
                    echo "</tr>";
                  endforeach;
                ?>
              </tbody>        
            </table>
          </div>
        </div>
      </div>
    </div><br><br>
    <div class="col-md-12">
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Data Pembelian Bahan Penolong Periode <?php echo format_bulan($bulan)." ".$tahun; ?></h3> 
        </div>
        <canvas id="myChart1"></canvas>
        <?php
          //Inisialisasi nilai variabel awal
          $nama_bp= "";
          $total="";
          $jumlah1=null;
          foreach ($rekappembelian_bp as $item){
            $bp=$item->nama_bp;
            $nama_bp .= "'$bp'". ", ";
            $jum=$item->total;
            $jumlah1 .= "$jum". ", ";
          }
        ?><br>
        <div class="row">
          <div class="col-md-4">
            <table id="example" name = "example" class="table table-striped table-bordered" style="width:100%" align="center">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Nama Bahan Penolong</th>
                  <th class="text-center">Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $no=1; 
                  foreach($rekappembelian_bp1 as $cacah):
                    echo "<tr>";
                      echo "<td align='center'>".$no++."</td>";
                      echo "<td>".$cacah['nama_bp']."</td>";
                      echo "<td align='center'>".$cacah['total']." ". $cacah['satuan']."</td>";
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
          labels: [<?php echo $nama_bb; ?>],
          datasets: [{
            label:'Data Pembelian Bahan Baku ',
            backgroundColor: ['rgb(255,98,75)','rgb(9,149,229)','rgb(101,27,200)','rgb(193,93,135)','rgb(251,233,137)','rgb(249,152,189)','rgb(210,151,155)','rgb(159,188,166)','rgb(224,178,119)','rgb(179,253,0)','rgb(155,209,197)','rgb(88,63,128)','rgb(229,170,174)'],
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
          labels: [<?php echo $nama_bp; ?>],
          datasets: [{
            label:'Data Pembelian Bahan Penolong ',
            backgroundColor: ['rgb(255,98,75)','rgb(9,149,229)','rgb(101,27,200)','rgb(193,93,135)','rgb(251,233,137)','rgb(249,152,189)','rgb(210,151,155)','rgb(159,188,166)','rgb(224,178,119)','rgb(179,253,0)','rgb(155,209,197)','rgb(88,63,128)','rgb(229,170,174)'],
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