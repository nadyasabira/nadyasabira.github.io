<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <h1 class="m-0 text-dark">Kartu Stok Bahan Baku</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div><hr>
<div class="row">
    <div class="col">
        <div class=" col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card shadow">
                        <div class="card-header"><strong>Pilih Nama Bahan Baku dan Periode</strong></div>
                        <div class="container">
                            <div class="card-body">
                                <form class="form-inline" action="<?php echo site_url('kartu_stok/view_kartu_stok') ?>" method="get">
                                    <div class="form-group col-md-12">
                                        <label for="">Bahan Baku</label>
                                        <select name="id_bb" id="id_bb" class="form-control">
                                            <option value="">Pilih bahan baku</option>
                                            <?php
                                                foreach ($nama_bb1 as $bb) {
                                                    echo "<option value = " . $bb->id_bb . ">" . $bb->nama_bb . "</option>";
                                                }
                                            ?>
                                            </option>
                                        </select>
                                    </div><br>
                                    <div class="form-group col-md-12">
                                        <label for="">Periode</label>
                                        <input type="month" class="form-control" id="tanggal" name="tanggal">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12" align="center">
                                        <button type="submit" class="btn btn-primary">Proses</button>
                                    </div>
                                </div><br>
                                </form>