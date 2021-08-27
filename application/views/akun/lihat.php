<h2 class="page-title">
        Data Akun
    </h2>   
    <div class="row mt-3">
     <div class="col-md-12">
        <div class="card">
           <div class="card-body">
           <a href="#" class="btn btn-success mb-3" id="tambahakun">
           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
  Tambah Data
</a>
<div class="mb-3"><?= $this->session->flashdata('msg');   ?></div>
            <table class="table table-striped table-bordered" id="tabelakun">
                <thead>
                 <tr>
                   <td>No</td>
                   <td>Kode Akun</td>
                   <td>Nama Akun</td>
                   <td>Header Akun</td>
                   <td>Aksi</td>
                                           
                   </tr>
                 </thead>
                 <tbody>
                                        <?php foreach ($all_akun as $akun): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $akun->kode_akun ?></td>
                                                <td><?= $akun->nama_akun ?></td>   
                                                <td><?= $akun->header_akun?></td>
                                                
                                                    <td>
                                                    <a href="#" data-kodemenu="<?php echo $akun->kode_akun; ?>" class="btn btn-sm btn-primary ">Update
                                                        <!-- <li class="fa fa-pencil"></li> -->
                                                    </a>  
                                                    <a href="#" data-href="<?php echo base_url(); ?>menu1/hapus/<?php echo $akun->kode_akun; ?>" class="btn btn-sm btn-primary ">Hapus
                                                        <!-- <li class="fa fa-pencil"></li> -->
                                                    </a>     </td>
                                               
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
            </table>
     </div>
     </div>
     </div>
    </div>
    <div class="modal modal-blur fade" id="modalakun" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Input Akun</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           <div id="loadforminputakun"></div>
        </div>          
        </div>
      </div>
    </div>
    <div class="modal modal-blur fade" id="modaleditakun" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit akun</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           <div id="loadformeditakun"></div>
        </div>          
    </div>
</div>
    </div>
    <div class="modal modal-blur fade" id="modalhapusakun" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-body">
      <div class="modal-title">Anda Yakin Akan Menghapus Data Ini?</div>
      <div>Jika dihapus Maka data Anda akah Hilang Secara Permanen</div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
    <a href="#" id="hapusakun" class="btn btn-danger">Yes, Delete</a>
    </div> 
    </div>
  </div>
</div>

<script>
    $(function(){
        $("#tambahakun").click(function(){
            $("#modalakun").modal("show");
             $("#loadforminputakun").load("<?php echo base_url(); ?>akun/tambah");
        });
        $(".edit").click(function(){
        var id_akun = $($this).attr("data-id_akun");
            $("#modaleditakun").modal("show");
             $("#loadformeditakun").load("<?php echo base_url(); ?>akun/tambah");
        }); 
        $(".hapus").click(function(){
        var href = $($this).attr("data-href");
            $("#modalhapusakun").modal("show");
             $("#hapusakun").attr("href", href);
        });        
        $('#tabelakun').DataTable();
    });
</script>

                
          
                   
                