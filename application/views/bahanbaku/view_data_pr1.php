<h2 class="page-title">Data Bahan Baku</h2>   
<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <table class="table table-striped table-bordered" id="tabelakun">
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
              foreach($isi_data1 as $cacah):
                echo "<tr>";
                  echo "<td align='center'>".$no++."</td>";
                  echo "<td>".$cacah['nama_bb']."</td>";
                    echo "<td align='center'>".$cacah['stok']." ". $cacah['satuan_bom']."</td>";
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