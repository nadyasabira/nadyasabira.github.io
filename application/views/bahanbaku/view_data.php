<h2 class="page-title">Data Bahan Baku</h2>   
<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <a class="btn btn-success mb-3" href="<?= base_url('bahanbaku/input_form') ?>">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <line x1="12" y1="5" x2="12" y2="19" />
            <line x1="5" y1="12" x2="19" y2="12" />
          </svg>Tambah Data
        </a>
      </div>
      <div class="card-body">
        <table class="table table-striped table-bordered" id="tabelakun">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama Bahan Baku</th>
              <th class="text-center">Satuan</th>
              <th class="text-center">Harga Satuan</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no=1;
              foreach($isi_data as $cacah):
                echo "<tr>";
                  echo "<td align='center'>".$no++."</td>";
                  echo "<td>".$cacah['nama_bb']."</td>";
                  echo "<td align='center'>". $cacah['satuan']."</td>";
                  echo "<td align='right'>Rp ".number_format($cacah['harga_satuan'])."</td>";
                  echo "<td>";
            ?>
            <button onclick="location.href = '<?php echo site_url('bahanbaku/edit_form/'.$cacah['id_bb']) ?>';" type="button" class="btn btn-success btn-sm">
              <span class="fa fa-edit">Edit</span>
            </button>
            <?php
                  echo "</td>";
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