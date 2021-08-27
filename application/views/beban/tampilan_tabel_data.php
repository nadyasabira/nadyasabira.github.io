<h2 class="page-title">
  	Data Beban-Beban
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
  				<table class="table table-striped table-bordered" id="tabelbeban">
  					<thead>
  						<tr>
  							<th>No</th>
							<th>Kode Akun</th>  
  							<th>Nama Beban</th>
  							<th>Jenis Beban</th>
                  <!--   <th>Jenis</th>
                    <th>Ukuran</th>
                    <th>Kategori</th> -->
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            	<?php
            	$no=1;
            	foreach($all_beban as $cacah):
            		echo "<tr>";
            		echo "<td>".$no++."</td>";
					echo "<td>".$cacah['kode_akun']."</td>";
            		echo "<td>".$cacah['nama_beban']."</td>";
            		echo "<td>".$cacah['jenis_beban']."</td>";
            		echo "<td>";
            		?><center>
            			<button onclick="location.href = '<?php echo site_url('beban/edit_form/'.$cacah['kode_akun']) ?>';" type="button" class="btn btn-success btn-sm">
            				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg> Edit
            			</button></center>
            			<?php
            			echo "</td>";
            			echo "</tr>";
            		endforeach;
            		?>
            	</tbody>
            </table>
            <div class="modal modal-blur fade" id="modalbeban" tabindex="-1" role="dialog" aria-hidden="true">
            	<div class="modal-dialog modal-dialog-centered" role="document">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title">Input Produk</h5>
            				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            			</div>
            			<div class="modal-body">
            				<div id="loadforminputbeban"></div>
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
            			$("#modalbeban").modal("show");
            			$("#loadforminputbeban").load("<?php echo base_url(); ?>beban/tambah");
            		});
            		
            		$('#tabelbeban').DataTable();
            	});
            </script>
        </div>
    </div>
</div>
</div>
</body>
</html>        