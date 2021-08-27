<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <h1 class="m-0 text-dark">Peralatan</h1>
                </div>
            </div>
        </div>
    </div><hr>
    <div class="row">
    <div class="col">
    <div class="col-md-6 grid-margin stretch-card">
    <div class="container">
    <div class="card">
    <div class="card shadow w-80">
    <div class="card-header"><strong>Tambah Data Peralatan</strong></div>
    <div class="container">
    <div class="card-body">
    <form action="<?= base_url('peralatan/input_form') ?>" method="POST">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="nama_alat">Nama Peralatan</label>
                <?php echo "<b><font color='red'>".form_error('nama_alat')."</font></b>"; ?>   
                <input type="text" class="form-control" name="nama_alat" value="<?php echo set_value('nama_alat'); ?>" placeholder="Masukkan nama peralatan">
            </div><br>
            <div class="form-group col-md-12">
                <label for="satuan">satuan</label>
                <?php echo "<b><font color='red'>".form_error('satuan')."</font></b>"; ?> 
                <select type="text" class="form-control" name="satuan" value="<?php echo set_value('satuan'); ?>"> 
                    <option value="lusin">Lusin</option>
                    <option value="pcs">Pcs</option>
                </select>
            </div><br>
            <div class="form-group col-md-12">
                <label for="harga_satuan">Harga Satuan</label>
                <?php echo "<b><font color='red'>".form_error('harga_satuan')."</font></b>"; ?>    
                <input type="text" class="form-control" name="harga_satuan" value="<?php echo set_value('harga_satuan'); ?>" placeholder="Masukkan harga satuan">
            </div><br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="<?= base_url('peralatan/view_data') ?>" role="button">Batal</a>
            </div>
        </div>
    </form>
    </div>
    </div>
    </div>
    </div>  
    </div>
    </div>
    </div>
    </div>
</html>