
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0 text-dark">Data User</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <hr>
    <div class="row">
    <div class="col">
    <div class="col-md-6 grid-margin stretch-card">
    <div class="container">
    <div class="card">
    <div class="card shadow w-80">
    <div class="card-header"><strong>Form User Akun</strong></div>
    <div class="container">
    <div class="card-body">
  <form action="<?php echo site_url('C_User/input_form') ?>" method="post">
  <div class="form-row">
  <div class="form-group col-md-12">
 
  <div class="form-group col-md-12">
        <label for="nama_lengkap">Nama Lengkap</label><span class="text-danger">*</span>
        <?php echo "<b><font color='red'>".form_error('nama_lengkap')."</font></b>"; ?>   
        <input type="text" class="form-control" name="nama_lengkap" value="<?php echo set_value('nama_lengkap'); ?>" placeholder="Masukkan Nama Lengkap">
    </div><br>
        <label for="nama_lengkap">No.Handphone</label><span class="text-danger">*</span>
        <?php echo "<b><font color='red'>".form_error('no_hp')."</font></b>"; ?>   
        <input type="number" class="form-control" name="no_hp" value="<?php echo set_value('no_hp'); ?>" placeholder="Masukkan Nomor Handphone">
    </div><br>
  <div class="form-group col-md-12">
        <label for="username">Username</label><span class="text-danger">*</span>
        <?php echo "<b><font color='red'>".form_error('username')."</font></b>"; ?>   
        <input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" placeholder="Masukkan ID User">
    </div><br>
	<div class="form-group col-md-12">
        <label for="password">Password</label><span class="text-danger">*</span>
        <?php echo "<b><font color='red'>".form_error('password')."</font></b>"; ?>   
        <input type="text" class="form-control" name="password" value="<?php echo set_value('password'); ?>" placeholder="Masukkan Password">
    </div><br>
	<div class="form-group col-md-12">
        <label for="konfirmasi_password">Konfirmasi Password</label><span class="text-danger">*</span>
        <?php echo "<b><font color='red'>".form_error('konfirmasi_password')."</font></b>"; ?>   
        <input type="text" class="form-control" name="konfirmasi_password" value="<?php echo set_value('konfirmasi_password'); ?>" placeholder="Masukkan Password">
    </div><br>
		<div class="form-group col-md-12">
		<?php echo "<b>".form_error('level')."</b>"; ?> 
		<label for="level">level</label><span class="text-danger">*</span>
		<select name="level" class="form-select" required>
                            					<option value="">-- Pilih Kelompok--</option>
                            				
												<option value="Pegawai">Pegawai </option>
                        <option value="Pemilik">Pemilik</option>
										
                            				</select>
		</div>
	 </div>
	 <div class="row m-2">
		<div class="col-sm-12" align="center">
			<button type="submit" class="btn btn-primary">Simpan</button>
		</div>
	</div>
	<p>
	
	</form>
</body>
</html>