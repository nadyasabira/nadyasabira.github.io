  <h2 class="page-title">
          Data ukuran
      </h2>   
      <div class="row mt-3">
       <div class="col-md-12">
          <div class="card">
             <div class="card-body">
             <a href="#" class="btn btn-success mb-3" id="tambah">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
      Tambah Data
    </a>
    <div class="mb-3"><?php echo $this->session->flashdata('msg')?></div>    

            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered" id="tabelukuran">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Ukuran</th>
                     <th>Satuan</th>
               
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                    foreach($all_ukuran as $cacah):
                      echo "<tr>";
                        echo "<td>".$no++."</td>";
                        echo "<td>".$cacah['id_kategori']."</td>";
                        echo "<td>".$cacah['nama_kategori']."</td>";
                        echo "<td>".$cacah['satuan']."</td>";
                       
                        echo "<td>";
                  ?>
                    <button onclick="location.href = '<?php echo site_url('ukuran/edit_form/'.$cacah['id_kategori']) ?>';" type="button" class="btn btn-success btn-sm">
                      <span class="far fa-edit"></span> Edit
                    </button>
                  <?php
                        echo "</td>";
                      echo "</tr>";
                    endforeach;
                  ?>
                </tbody>
            </table>
            <div class="modal modal-blur fade" id="modalukuran" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Input ukuran</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <div id="loadforminputukuran"></div>
            </div>          
            </div>
          </div>
        </div>
            <script>
              $(document).ready(function() {
                $('#example').DataTable( {
                  "pagingType": "full_numbers"
                } );
              } );
            </script>
              <script>
        $(function(){
            $("#tambah").click(function(){
                $("#modalukuran").modal("show");
                $("#loadforminputukuran").load("<?php echo base_url(); ?>ukuran/tambah");
            });
            
            $('#tabelukuran').DataTable();
        });
    </script>
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>        