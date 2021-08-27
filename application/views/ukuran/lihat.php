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
  <div class="mb-3"><?= $this->session->flashdata('msg');   ?></div>
              <table class="table table-striped table-bordered" id="tabelukuran">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>ID ukuran</th>
                          <th>Nama ukuran</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                                          <?php foreach ($all_ukuran as $ukuran): ?>
                                              <tr>
                                                  <td><?= $no++ ?></td>
                                                  <td><?= $ukuran->id_ukuran ?></td>
                                                  <td><?= $ukuran->nama_ukuran ?></td>   
                                                 
                                                   <td>                                                       
                                                   <a href="#" data-id_ukuran="<?php echo $ukuran->id_ukuran; ?>" class="btn btn-sm btn-primary edit">Update
                                                        <!-- <li class="fa fa-pencil"></li> -->
                                                    </a>  
                                                    <a href="#" data-href="<?php echo base_url(); ?>ukuran/hapus/<?php echo $ukuran->id_ukuran; ?>" class="btn btn-sm btn-danger hapus">Hapus
                                                        <!-- <li class="fa fa-pencil"></li> -->
                                                    </a>      
                                                      </td>
                                                
                                              </tr>
                                          <?php endforeach ?>
                                      </tbody>

              </table>
      </div>
      </div>
      </div>
      </div>
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
      <div class="modal modal-blur fade" id="modaleditukuran" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit ukuran</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div id="loadformeditukuran"></div>
          </div>          
      </div>
  </div>
  </div>
  <div class="modal modal-blur fade" id="modalhapusukuran" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-body">
      <div class="modal-title">Apakah Anda Yakin akan Menghapus Data Ini?</div>
      <div>Anda akan kehilangan data anda secara permanen.</div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
     <a href="#" class="btn btn-danger">Yes,Delete</a
    </div>
  </div>
</div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
      <a href="#" id="hapusukuran" class="btn btn-danger">Yes, Delete</a>
      </div> 
      </div>
    </div>
  </div>

  <script>
      $(function(){
          $("#tambah").click(function(){
              $("#modalukuran").modal("show");
              $("#loadforminputukuran").load("<?php echo base_url(); ?>ukuran/tambah");
          });
          $(".edit").click(function(){       
            var id_ukuran = $(this).attr("data-id_ukuran");
              $("#modaleditukuran").modal("show");              
              $("#loadformeditukuran").load("<?php echo base_url(); ?>ukuran/ubah/"+id_ukuran);
          }); 
          $(".hapus").click(function(){       
            var href = $(this).attr("data-href");
              $("#modalhapusukuran").modal("show");              
              $("$hapusukuran").attr("href", href);
          }); 
          $('#tabelukuran').DataTable();
      });
  </script>

                  
            
                    
                  