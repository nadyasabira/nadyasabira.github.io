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
        <div class=" grid-margin stretch-card">
            <div class="container">
                <div class="card">
                    <div class="card shadow w-80">
                    <div class="card-header"><strong>Pilih Periode</strong></div>
                    <div class="container">
                        <div class="card-body">
                            <div class="container">
 							<form action="<?php echo site_url('C_Laporan/kartu_stock') ?>" method="GET" >
                            <div class="form-group">
                                        <label for="">Bahan Baku</label>
                                        <select name="bahan_baku" id="bahan_baku" class="form-control">
                                            <option value="">Pilih bahan baku</option>
                                        <?php foreach ($bahan_baku as $bb) { ?>
                                            <option <?php if ($this->input->get('bahan_baku') == $bb['id_bb']) {
                                                echo "selected='selected'";
                                            } ?> value="<?php echo $bb['id_bb'] ?>"><?php echo $bb['nama_bb'] ?>
                                            </option>
                                        <?php } ?>
                                        </select>
                                    </div><br>
                          		<div class="form-group">
		 							 <label for="no_faktur">Bulan</label>
		  <select class="form-control" name="bulan">
			<option value="1" >Januari</option>
			<option value="2">Februari</option>
			<option value="3">Maret</option>
			<option value="4">April</option>
			<option value="5">Mei</option>
			<option value="6">Juni</option>
			<option value="7">Juli</option>
			<option value="8">Agustus</option>
			<option value="9">September</option>
			<option value="10">Oktober</option>
			<option value="11">November</option>
			<option value="12">Desember</option>
		  </select>	  
	 </div><br>
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <option value="">Pilih tahun</option>
                                        <?php for ($i = 2021; $i <= date('Y'); $i++) { ?>
                                            <option <?php if ($this->input->get('tahun') == $i) {
                                                        echo "selected='selected'";
                                                    } ?> value="<?php echo $i ?>"><?php echo $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-12" align="center">
                                        <button type="submit" class="btn btn-primary">Proses</button>
                                    </div>
                                </div><br>
                                </form>

