  <h2 class="page-title">
          Data Harga Menu
      </h2>   
      <div class="row mt-3">
       <div class="col-md-12">
          <div class="card">
             <div class="card-body">
             <a href="#" class="btn btn-success mb-3" id="tambah_harga">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
      Tambah Data
    </a>
    <div class="mb-3"><?php echo $this->session->flashdata('msg')?></div>    
             <?php echo form_error('simpan')?> 
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered" id="tabelharga">
               <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode harga</th>
                    <th>Nama Menu</th>
                    <th>Ukuran</th>
                    <th>Harga</th>

                  <!--   <th>Jenis</th>
                    <th>Ukuran</th>
                    <th>Kategori</th> -->
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                    foreach($all_harga as $cacah):
                      echo "<tr>";
                        echo "<td>".$no++."</td>";
                        echo "<td>".$cacah['kode_harga']."</td>";
                        echo "<td>".$cacah['nama']."</td>";
                         echo "<td>".$cacah['nama_kategori']." ".$cacah['satuan']."</td>";
                       
                        echo "<td>Rp ".number_format($cacah['harga'])."</td>";
                      
                        echo "<td>";
                  ?>
                    <button onclick="location.href = '<?php echo site_url('menu/edit_form_harga/'.$cacah['kode_harga']) ?>';" type="button" class="btn btn-success btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg> Edit
                    </button>
                  <?php
                        echo "</td>";
                      echo "</tr>";
                    endforeach;
                  ?>
                </tbody>
            </table>
            <div class="modal modal-blur fade" id="modalharga" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Input Harga</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <div id="loadforminputharga"></div>
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
            $("#tambah_harga").click(function(){
                $("#modalharga").modal("show");
                $("#loadforminputharga").load("<?php echo base_url(); ?>menu/tambah_harga");
            });
            
            $('#tabelharga').DataTable();
        });
    </script>
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>        