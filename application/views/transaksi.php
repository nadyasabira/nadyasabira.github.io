  <h2 class="page-title">
          Data Harga Menu
      </h2>   
      <div class="row mt-3">
       <div class="col-md-12">
          <div class="card">
             <div class="card-body">
             <a href="<?php echo base_url(); ?>transaksi/inputpenjualan" class="btn btn-success mb-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
      Tambah Data
    </a>`
              
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered" id="tabelmenu">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No Faktur</th>
                    <th>Tanggal</th>
                    <th>Kode Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Jenis Transaksi</th>
                    <th>Jatuh Tempo</th>
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                 
                </tbody>
            </table>
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
                $("#modalmenu").modal("show");
                $("#loadforminputmenu").load("<?php echo base_url(); ?>menu/tambah");
            });
            
            $('#tabelmenu').DataTable();
        });
    </script>
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>        