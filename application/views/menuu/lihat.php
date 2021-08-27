  <h2 class="page-title">
          Data Menu
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
              <table class="table table-striped table-bordered" id="tabelmenu">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>ID Menu</th>
                          <th>Nama Menu</th>
                         
                          <th>Bentuk</th>
                          <th>Ukuran</th>
                      
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                                          <?php foreach ($all_menu as $menu): ?>
                                              <tr>
                                                  <td><?= $no++ ?></td>
                                                  <td><?= $menu->id_menu ?></td>
                                                  <td><?= $menu->nama ?></td>   
                                                
                                                  <td><?= $menu->jenis ?></td> 
                                                  <td><?= $menu->ukuran ?></td> 
                                                   <td>                                                       
                                                   <a href="#" data-id_menu="<?php echo $menu->id_menu; ?>" class="btn btn-sm btn-primary edit">Update
                                                        <!-- <li class="fa fa-pencil"></li> -->
                                                    </a>  
                                                    <a href="#" data-href="<?php echo base_url(); ?>menu1/hapus/<?php echo $menu->id_menu; ?>" class="btn btn-sm btn-danger hapus">Hapus
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
      <div class="modal modal-blur fade" id="modalmenu" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Input Menu</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div id="loadforminputmenu"></div>
          </div>          
          </div>
        </div>
      </div>
      <div class="modal modal-blur fade" id="modaleditmenu" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Menu</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div id="loadformeditmenu"></div>
          </div>          
      </div>
  </div>
  </div>
  <div class="modal modal-blur fade" id="modalhapusbarang" tabindex="-1" role="dialog" aria-hidden="true">
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
      <a href="#" id="hapusmenu" class="btn btn-danger">Yes, Delete</a>
      </div> 
      </div>
    </div>
  </div>

  <script>
      $(function(){
          $("#tambah").click(function(){
              $("#modalmenu").modal("show");
              $("#loadforminputmenu").load("<?php echo base_url(); ?>menu1/tambah");
          });
          $(".edit").click(function(){       
            var kodemenu = $(this).attr("data-kodemenu");
              $("#modaleditmenu").modal("show");              
              $("#loadformeditmenu").load("<?php echo base_url(); ?>menu1/ubah/"+kodemenu);
          }); 
          $(".hapus").click(function(){       
            var href = $(this).attr("data-href");
              $("#modalhapusbarang").modal("show");              
              $("$hapusmenu").attr("href", href);
          }); 
          $('#tabelmenu').DataTable();
      });
  </script>

                  
            
                    
                  