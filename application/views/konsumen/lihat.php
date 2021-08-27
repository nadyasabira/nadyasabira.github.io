<h2 class="page-title">
        Data Konsumen
    </h2>   
    <div class="row mt-3">
     <div class="col-md-12">
        <div class="card">
           <div class="card-body">
           <a href="#" class="btn btn-success mb-3" id="tambahkonsumen">
           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
  Tambah Data
</a>
<div class="mb-3"><?= $this->session->flashdata('msg');   ?></div>
    <table class="table table-striped table-bordered" id="tabelkonsumen">
             <thead>
                    <tr>
                        <td>No</td>
                        <td>ID Konsumen</td>
                        <td>Nama Konsumen</td>
                        <td>Alamat</td>
                        <td>Nomor Telepon</td>
                        <td>Aksi</td>
                                          
                  </tr>
             </thead>
     <tbody>
           <?php foreach ($all_konsumen as $konsumen): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $konsumen->id_konsumen ?></td>
                        <td><?= $konsumen->nama_konsumen ?></td>   
                        <td><?= $konsumen->alamat ?></td> 
                        <td><?= $konsumen->no_telp ?></td>    
                                                
                     <td>
                     <a href="#" data-id_konsumen="<?php echo $konsumen->id_konsumen; ?>" class="btn btn-sm btn-primary edit">Update
                                                        <!-- <li class="fa fa-pencil"></li> -->
                                                    </a>  
                                                    <a href="#" data-href="<?php echo base_url(); ?>konsumen/hapus/<?php echo $konsumen->id_konsumen; ?>" class="btn btn-sm btn-danger hapus">Hapus
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
<div class="modal modal-blur fade" id="modalkonsumen" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Input Data Konsumen</h5>
<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div id="loadforminputkonsumen"></div>
</div>
</div>
</div>
</div>
<div class="modal modal-blur fade" id="modaleditkonsumen" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Edit Data Konsumen</h5>
<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<div id="loadformeditkonsumen"></div>
</div>
</div>
</div>
</div>
<div class="modal modal-blur fade" id="modalhapuskonsumen" tabindex="-1" role="dialog" aria-hidden="true">
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
      <a href="#" id="hapuskonsumen" class="btn btn-danger">Yes, Delete</a>
      </div> 
      </div>
    </div>
  </div>

  <script>
      $(function(){
          $("#tambahkonsumen").click(function(){
              $("#modalkonsumen").modal("show");
              $("#loadforminputkonsumen").load("<?php echo base_url(); ?>konsumen/tambah");
          });
          $(".edit").click(function(){       
            var id_konsumen = $(this).attr("data-id_konsumen");
              $("#modaleditkonsumen").modal("show");              
              $("#loadformeditkonsumen").load("<?php echo base_url(); ?>konsumen/ubah/"+id_konsumen);
          }); 
          $(".hapus").click(function(){       
            var href = $(this).attr("data-href");
              $("#modalhapuskonsumen").modal("show");              
              $("$hapuskonsumen").attr("href", href);
          }); 
          $('#tabelkonsumen').DataTable();
      });
  </script>