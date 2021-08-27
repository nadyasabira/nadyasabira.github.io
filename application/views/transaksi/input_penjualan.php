<h2 class="page-title mb-3">
  Data Harga Menu
</h2>   

<div class="row">
  <div class="col-md-5">
    <div class="card">
      <div class="card-body">
        <div class="input-icon mb-3">
          <span class="input-icon-addon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><rect x="5" y="11" width="1" height="2" /><line x1="10" y1="11" x2="10" y2="13" /><rect x="14" y="11" width="1" height="2" /><line x1="19" y1="11" x2="19" y2="13" /></svg>
          </span>
          <input type="text" class="form-control" name="no_nota" id="no_nota"placeholder="No Faktur">
        </div>
        <div class="input-icon mb-3">
          <span class="input-icon-addon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
          </span>
          <input type="text" class="form-control" value="<?php echo date("Y-m-d");?>"name="waktu" id="waktu"placeholder="Tanggal Transaksi">
        </div>
        <div class="input-icon mb-3">
          <span class="input-icon-addon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
          </span>
          <input type="hidden" class="form-control" name="kode_pelanggan">
          <input type="text" class="form-control" name="namapelanggan" id="namapelanggan"placeholder="Pelanggan">
        </div>
        <!-- <div class="mb-3">
          <select name="jenistransaksi" id="jenistransaksi" class="form-select">
            <option value="">-- Pilih Jenis Transaksi--</option>
            <option value="tunai">Tunai</option>
            <option value="dp">Uang Muka</option>
          </select>
        </div> -->
        <div class="input-icon mb-3">
          <span class="input-icon-addon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><rect x="5" y="11" width="1" height="2" /><line x1="10" y1="11" x2="10" y2="13" /><rect x="14" y="11" width="1" height="2" /><line x1="19" y1="11" x2="19" y2="13" /></svg>
          </span>
          <input type="text" class="form-control" name="uangmuka" id="uangmuka"placeholder="Uang Muka">
        </div>
        <div class="input-icon mb-3" id="jt">
          <span class="input-icon-addon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
          </span>
          <input type="text" class="form-control" name="jatuhtempo" id="jatuhtempo"placeholder="Tanggal Jatuh Tempo">
        </div>
        <!-- <div class="input-icon mb-3">
          <span class="input-icon-addon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
          </span>
          <input type="hidden" class="form-control" name="id_user">
          <input type="text" class="form-control" name="nama_user" id="nama_user"placeholder="Kasir">
        </div>  -->
      </div>
    </div>
  </div>
  <div class="col-md-7">
    <div class="card card-sm">
      <div class="card-body d-flex align-items-center">
        <span class="bg-green text-white avatar mr-3 " style="height: 9rem;width: 9rem">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="19" r="2" /><circle cx="17" cy="19" r="2" /><path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" /></svg>
        </span>
        <div class="mr-3">
          <div class="font-weight-medium">
           <h2 id="totalpenjualan" style="font-size: 5rem">0</h2>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
<div class="row mt-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Data Menu</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-2">
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><rect x="5" y="11" width="1" height="2" /><line x1="10" y1="11" x2="10" y2="13" /><rect x="14" y="11" width="1" height="2" /><line x1="19" y1="11" x2="19" y2="13" /></svg>
              </span>
              <input type="text" class="form-control" name="id_menu" id="id_menu"placeholder="Kode Menu">
            </div>
          </div>
          <div class="col-md-4">
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="6" height="6" rx="1" /><rect x="14" y="4" width="6" height="6" rx="1" /><rect x="4" y="14" width="6" height="6" rx="1" /><rect x="14" y="14" width="6" height="6" rx="1" /></svg>
              </span>
              <input type="text" class="form-control" name="nama" id="nama"placeholder="Nama Menu">
            </div>
          </div>
          <div class="col-md-2">
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
              </span>
              <input type="text" class="form-control" style="text-align:right"name="harga" id="harga"placeholder="harga">
            </div>
          </div>
          <div class="col-md-2">
            <div class="input-icon mb-3">
              <span class="input-icon-addon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect width="6" height="6" x="9" y="5" rx="1" /><line x1="4" y1="7" x2="5" y2="7" /><line x1="4" y1="11" x2="5" y2="11" /><line x1="19" y1="7" x2="20" y2="7" /><line x1="19" y1="11" x2="20" y2="11" /><line x1="4" y1="15" x2="20" y2="15" /><line x1="4" y1="19" x2="20" y2="19" /></svg>
              </span>
              <input type="text" class="form-control" name="qty" id="qty"placeholder="Qty">
            </div>
          </div>
          <div class="col-md-2">
            <button class="btn btn-primary">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="19" r="2" /><circle cx="17" cy="19" r="2" /><path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" /></svg>
            </button>          
          </div>
        </div>
        <div class="row">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Menu</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>QTY</th>
                <th>Total</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
            <tfoot>
              <tr>
                <th colspan="5">Grand Total</th>
                <th></th>
                <th></th>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="row">
        <button type="submit" class="btn btn-primary w-100">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
        Simpan </button></div>
      </div>
    </div>
  </div>
</div>
</form>
<script>
  document.addEventListener("DOMContentLoaded", function () {
  	flatpickr(document.getElementById('waktu'), {
  	});
  });
</script>
<script>
$(function(){
    function hidejatuhtempo(){
        $("#jt").hide();
    }

    function showjt(){
        $("#jt").show();
    }

    function getJatuhtempo(){
        var waktu = $("#waktu").val();
        $.ajax({
            type: 'POST',
            url : '<?php base_url();?>transaksi/getJatuhTempo',
            data : {waktu:waktu},
            cache : false,
            success : function(respond){
                $("#jatuhtempo").val(respond);
            }
        })
    }
    
    hidejatuhtempo();
    $("#jenistransaksi").change(function(){
        var jenistransaksi = $(this).val();
        if (jenistransaksi == "dp"){
            showjt();
        } else{
            hidejatuhtempo();
        }
    });
});
</script>