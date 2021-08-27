<h2 class="page-title">
          Data Setoran Modal
      </h2>   
      <div class="row mt-3">
       <div class="col-md-12">
          <div class="card">
             <div class="card-body">
             <a href="<?php echo base_url();?>modal/input_modal" class="btn btn-success mb-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
      Tambah Data
    </a>
        <div class="mb-3"><?php echo $this->session->flashdata('msg')?></div>      
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered" id="tabelmenu">
                <thead>
                  <tr>
                <th class="text-center">No</th> 
                <th class="text-center">No Transaksi</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Nominal</th>

                  </tr>
                </thead>
                <tbody>
        <?php
          $no=1;
			    foreach($isi_data as $cacah):
    				echo "<tr>";
              echo "<td align='center'>".$no++."</td>";
              echo "<td>".$cacah['id_modal']."</td>";        
              echo "<td>".$cacah['tanggal']."</td>";
              echo "<td>".$cacah['keterangan']."</td>";
              echo "<td align='right'>Rp ".number_format($cacah['nominal'])."</td>";
    		?>
				</td>		
				</tr>
				<?php
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