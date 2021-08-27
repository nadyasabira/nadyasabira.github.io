 <!-- Main content -->
   <h2 class="page-title">
        Data Supplier
    </h2>   
    <div class="row mt-3">
     <div class="col-md-12">
        <div class="card">
           <div class="card-body">
           <a class="btn btn-success mb-3" href="<?= base_url('Supplier/input_form') ?>">
           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
  Tambah Data
</a>
          </div>
          <div class="card-body">
            <table class="table table-striped table-bordered" id="tabelakun">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Supplier</th>
                  <th>No Telepon</th>
                  <th>Alamat</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=1;
                  foreach($isi_data as $cacah):
                    echo "<tr>";
                      echo "<td align='center'>".$no++."</td>";
                      echo "<td>".$cacah['nama_supplier']."</td>";
                      echo "<td>".$cacah['no_telp']."</td>";
                      echo "<td>".$cacah['alamat']."</td>";
                      echo "<td>".$cacah['email']."</td>";
                      echo "<td>";
                ?> 
                  <button onclick="location.href = '<?php echo site_url('supplier/edit_form/'.$cacah['id_supplier']) ?>';" type="button" class="btn btn-success btn-sm">
                    <span class="fa fa-edit"></span> Edit
                  </button>   
                <?php
                      echo "</td>";   
                    echo "</tr>";   
                  endforeach;
                ?>
              </tbody>
            </table>
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