<div class="container">
    <br>
    <?php
    $total = 0;
    $subtotal1 = 0;
foreach($isi_data as $cacah):
    $no_nota = $cacah['no_nota'];
    $jenistransaksi = $cacah['jenistransaksi'];
    $waktu = $cacah['waktu'];
    $nama_konsumen = $cacah['nama_konsumen'];
    $subtotal = $cacah['subtotal'];
    $subtotal1 =$subtotal1 + $cacah['subtotal'];
    $total=$total + ($cacah['subtotal']*0.5);
endforeach;
?>
  
</div>
<form action="<?= base_url('penjualan/proses_bayar') ?>"class="formharga" id="formharga" method="POST">
        <input type="hidden" name="no_faktur" value="<?php echo $_SESSION['no_faktur']; ?>" />	
		<input type="hidden" name="datetimepicker" value="<?php echo $_SESSION['datetimepicker']; ?>" />
		<input type="hidden" name="id_konsumen" value="<?php echo $_SESSION['id_konsumen']; ?>" />
   
        <div class="input-icon mb-3">
        <?php
        echo "<p>Tanggal		        	: ".$waktu."</p>";
        echo "<p>Pelanggan		      	: ".$nama_konsumen."</p>";
        echo "<p>Total Penjualan			: ".$subtotal1."</p>";
        ?>
       
    </div>
    <input type="hidden" name="no_nota" id="no_nota" value="<?php echo $cacah['no_nota']; ?>">
    <input type="hidden" name="waktu" id="waktu" value="<?php echo $cacah['waktu']; ?>">
   

       <div class="input-icon mb-3">  
    <select class="form-select" name="jenistransaksi" id="jenistransaksi">
		  <option class=""value="" >--Jenis Transaksi--</option>
			<option value="tunai">Tunai</option>
			<option value="kredit">Kredit</option>			
		  </select>
	</div>
      <div class="input-icon mb-3">
        <label class="form-label">Jumlah Uang</label>
        <input placeholder="Jumlah Uang" type="number" class="form-control" name="jumlah_uang" id="jumlah_uang"required>
        <div class="input-icon mb-3">
          <label class="form-label">Total DP</label>
          <input type="hidden" name="subtotal" id="subtotal" value="<?php echo $total?>">
          <input placeholder="DP" type="text" class="form-control" name="total" id="total" value="<?php echo $total?>" readonly required>
        </div>
      </div>
      <div class="input-icon mb-3">
          <label class="form-label">Kembalian</label>
                            <input type="text" id="kembalian" class="form-control" placeholder="Total" readonly="">
                            </div>
                            <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary w-100">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg>	
										&nbsp;&nbsp;Simpan</button>
										<!-- <button type="reset" class="btn btn-danger">&nbsp;&nbsp;Batal</button> -->
									</div>
                 
                  <a href="http://localhost/pakhir/penjualan/input_form" class="btn btn-danger w-100" role="button" aria-pressed="true">Batal</a>
    </form>
  </div>
</div>
</div>
</div>
<script>
								$(function(){
									$('.formharga').bootstrapValidator({
   										 fields: {
											jenistransaksi: {
    										      message: 'Jenis Transaksi Harus diisi!',
    										      validators: {
   										  	 	    notEmpty: {
     										         message: 'Jenis Transaksi Harus diisi!'
     										       }	
     										     }
     										   },
											jumlah_uang: {
    										      message: 'Jumlah Uang Harus Diisi!',
    										      validators: {
   										  	 	    notEmpty: {
     										         message: 'Jumlah Uang Harus diisi!'
     										       }	
     										     }
     										   },
											
											
											  }
  										  });
										});
								</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#jumlah_uang, #total").keyup(function() {
            var total  = $("#total").val();
            var jumlah_uang = $("#jumlah_uang").val();

            var kembalian = parseInt(jumlah_uang) - parseInt(total);
            $("#kembalian").val(kembalian);
        });
    });
</script>
