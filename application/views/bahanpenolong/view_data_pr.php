<h2 class="page-title">Data Bahan Penolong</h2>   
<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <table class="table table-striped table-bordered" id="tabelakun">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama Bahan Penolong</th>
              <th class="text-center">Satuan</th>
              <th class="text-center">Harga Satuan</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no=1;
              foreach($isi_data as $cacah):
                echo "<tr>";
                  echo "<td align='center'>".$no++."</td>";
                  echo "<td>".$cacah['nama_bp']."</td>";
                  echo "<td align='center'>". $cacah['satuan']."</td>";
                  echo "<td align='right'>Rp ".number_format($cacah['harga_satuan'])."</td>";
                echo "</tr>";
              endforeach;
            ?>
          </tbody>
        </table>
        <script>
          $(document).ready(function() {
            $('#example').DataTable( {
              "pagingType": "full_numbers"
            } );
          } );
        </script>
        <script>
          $(function(){
            $('#tabelakun').DataTable();
          });
        </script>
        </div>
      </div>
    </div>
  </div>
</body>
</html>        