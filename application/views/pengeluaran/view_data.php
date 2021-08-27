<h2 class="page-title">Data Pengeluaran Bahan Baku</h2>   
<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <a class="btn btn-success mb-3" href="<?= base_url('pengeluaran_bb/input_form') ?>">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <line x1="12" y1="5" x2="12" y2="19" />
            <line x1="5" y1="12" x2="19" y2="12" />
          </svg>
          Tambah Data
        </a>
      </div>
      <div class="card-body">
        <table class="table table-striped table-bordered" id="tabelakun">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">No Faktur Pesanan</th>
              <th class="text-center">Tanggal</th>
       				<th class="text-center">Detail</th>      				
            </tr>
          </thead>
          <tbody>
         		<?php $no=1;
         			foreach($isi_data as $cacah):
         				echo "<tr>";
                  echo "<td align='center'>".$no++."</td>";
         				  echo "<td>".$cacah['no_nota']."</td>";
         					echo "<td align='center'>".$cacah['tanggal']."</td>";
         		?>
        		<td>
        			<button onclick="location.href = '<?php echo site_url('pengeluaran_bb/view_data_detail/'.$cacah['no_nota']) ?>'" type="button" class="btn btn-info btn-sm">
        			  <span class="glyphicon glyphicon-menu-hamburger"></span> Detail
            </td>		
          </tr>
          <?php
            endforeach;
	        ?>
          </tbody>
        </table>
<!-- <?php echo $this->pagination->create_links(); ?> -->
  <script>
    $(document).ready(function() {
      $('#example').DataTable( {
        "pagingType": "full_numbers"
      } );
	  $(".perbesar").fancybox();
    } );
  </script>
  <script>
    $(function(){
        
        $('#tabelakun').DataTable();
    });
</script>
</div>
</div>
</body>
</html>