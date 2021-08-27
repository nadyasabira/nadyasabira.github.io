<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col">
                    <h1 class="m-0 text-dark">Kartu Stok Bahan Baku</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow">
    <div class="card-header"><strong>Pilih Nama Bahan Baku dan Periode</strong></div>
    <div class="card-body">
        <form class="form-inline" action="<?php echo site_url('kartu_stok/view_kartu_stok') ?>" method="get">
            <div class="row">
                <div class="form-group col-md-3">
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
                </div>
                <div class="form-group col-md-3">
                    <label for="">Periode</label>
                    <input type="month" class="form-control" id="tanggal" name="tanggal">
                </div>
                <div class="form-group col-sm-3"><p><p>
                    <button type="submit" class="btn btn-primary">Proses</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body pt-0">
        <div class="row">
            <div class="py-1">
                <button onclick="window.print()" class="btn btn-danger mb-3">Eksport PDF</button>
            </div>
            <div class="row">
                <div class="col-sm-12" align="center">
                    <b>CV.OEI CAKE</b>
                </div>
                <div class="col-sm-12" align="center">
                    <b>Kartu Stok</b>
                </div>
                    <div class="col-sm-12" align="center">
                        <b>Periode <?= format_bulan1($bulan)  ?> <?= $tahun ?></b>
                    </div>
                </div><p>
                <div class="row">
                    <div class="col-md-4">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Bahan Baku</strong></td>
                                <td>:</td>
                                <td><?= $nama_bb->nama_bb; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Satuan</strong></td>
                                <td>:</td>
                                <td><?= $satuan_bom->satuan_bom; ?></td>
                            </tr>
                        </table>
                    </div>
                    <table class="table table-striped table-light table-bordered table-hover" id="1" width="100%" cellspacing="0">
                        <thead>
                            <tr class="bg-gray-400">
                                <th rowspan="2" style="text-align:center">Tanggal</th>
                                <th colspan="3" class="text-center">Pembelian</th>
                                <th colspan="3" class="text-center">Pemakaian</th>
                                <th colspan="3" class="text-center">Persediaan</th>
                            </tr>
                            <tr class="bg-gray-400 ">
                                <th style="text-align:center">Jumlah</th>
                                <th style="text-align:center">Harga Satuan</th>
                                <th style="text-align:center">Total</th>
                                <th style="text-align:center">Jumlah</th>
                                <th style="text-align:center">Harga Satuan</th>
                                <th style="text-align:center">Total</th>
                                <th style="text-align:center">Jumlah</th>
                                <th style="text-align:center">Harga Satuan</th>
                                <th style="text-align:center">Total</th>
                            </tr>
                            <?php
                                $total_jumlah_input_barang = 0;
                                $total_harga_input_barang = 0;
                                $total_jumlah_pemakaian = 0;
                                $total_harga_pemakaian = 0;
                                $unit = 0;
                                $jumlah = 0;
                                $jumlah_penj = 0;
                                $unit_penj = 0;
                                $saldo = 0;
                                $saldo_harga = 0;
                                $saldo1 = 0;
                                $saldo_k = array(0);
                                $saldo_h = array(0);
                                $saldo_t = array(0);
                                $cek = 0;
                                $no = 1;
                                $saldo_terakhir = 0;
                                foreach ($kartu_stok as $data) {
                                    $nama_transaksi = $data->keterangan;
                                    if ($nama_transaksi == "pembelian") {
                                        $cek++;
                                        array_push($saldo_k, $data->jumlah);
                                        array_push($saldo_h, $data->harga_satuan);
                                        array_push($saldo_t, $data->total);
                                        $z = 0;
                                        $saldo1 = 0;
                                        $saldo = 0;
                                        for ($i = 0; $i <= $cek; $i++) {
                                            if ($saldo_k[$i] != 0) {
                            ?>
                            <tr>
                                <td align="center"><?php if ($z == 0) echo format_indo(date($data->tanggal_stok)); ?></td>
                                <td align="center"><?php if ($z == 0) echo $data->jumlah; ?></td>
                                <td align="right"><?php if ($z == 0) echo format_rp($data->harga_satuan); ?></td>
                                <td align="right"> <?php if ($z == 0) echo format_rp($data->total); ?></td>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"></td>
                                <td align="center"><?php echo $saldo_k[$i]; ?></td>
                                <td align="right"><?php echo format_rp($saldo_h[$i]); ?></td>
                                <td align="right"><?php echo format_rp($saldo_t[$i]); ?></td>
                            </tr>
                            <?php
                                            $saldo1 = $saldo1 + $saldo_k[$i];
                                            $saldo = $saldo + $saldo_t[$i];
                                            // $saldo1 = $saldo_k[$i];
                                            // $saldo = $saldo_t[$i];
                                            $z++;
                                        }
                                    }
                                    $unit = $unit + $data->jumlah;
                                    $jumlah = $jumlah + $data->total;
                                    $total_jumlah_input_barang = $total_jumlah_input_barang + $data->jumlah;
                                    $total_harga_input_barang = $total_harga_input_barang + $data->total;
                                } else if ($nama_transaksi == "retur penjualan") {
                                    $cek++;
                                    array_push($saldo_k, $data->jumlah);
                                    array_push($saldo_h, $data->harga);
                                    array_push($saldo_t, $data->total);
                                    $z = 0;
                                    $saldo1 = 0;
                                    $saldo = 0;
                                    for ($i = 0; $i <= $cek; $i++) {
                                        if ($saldo_k[$i] != 0) {
                        ?>
                        <tr>
                            <td align="center"><?php if ($z == 0) echo format_indo(date($data->tanggal_stok)); ?></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center">(<?php if ($z == 0) echo $data->jumlah; ?></td>
                            <td align="right">(<?php if ($z == 0) echo format_rp($data->harga_satuan); ?>)</td>
                            <td align="right"> (<?php if ($z == 0) echo format_rp($data->total); ?>)</td>
                            <td align="center"><?php echo $saldo_k[$i]; ?></td>
                            <td align="right"><?php echo format_rp($saldo_h[$i]); ?></td>
                            <td align="right"><?php echo format_rp($saldo_t[$i]); ?></td>
                        </tr>
                        <?php
                                            $saldo1 = $saldo1 + $saldo_k[$i];
                                            $saldo = $saldo + $saldo_t[$i];
                                            // $saldo1 = $saldo_k[$i];
                                            // $saldo = $saldo_t[$i];
                                            $z++;
                                        }                                                
                                    }
                                    $unit_penj = $unit_penj - $data->jumlah;
                                    $jumlah_penj = $jumlah_penj - $data->total;
                                    $total_jumlah_input_barang = $total_jumlah_input_barang + $data->jumlah;
                                    $total_harga_input_barang = $total_harga_input_barang + $data->total;
                                } else {
                                    $status = false;
                                    $z = 0;
                                    $idx = 0;
                                    $my_saldo_k = $data->jumlah;
                                    $jumlah_terpakai = 0;
                                    $harga_terpakai = 0;
                                    $saldo = 0;
                                    $saldo1 = 0;
                                    while ($status == false) {
                                        if ($saldo_k[$idx] > 0) {
                                            if ($my_saldo_k > $saldo_k[$idx]) {
                                                $jumlah_terpakai = $saldo_k[$idx];
                                                $my_saldo_k = $my_saldo_k - $jumlah_terpakai;
                                                $saldo_k[$idx] = 0;
                                                $harga_terpakai = $saldo_h[$idx];
                                            } else if ($my_saldo_k == $saldo_k[$idx]) {
                                                $saldo_k[$idx] = $saldo_k[$idx] - $my_saldo_k;
                                                $jumlah_terpakai = $my_saldo_k;
                                                $my_saldo_k = 0;
                                                $harga_terpakai = $saldo_h[$idx];
                                            } else {
                                                $saldo_k[$idx] = $saldo_k[$idx] - $my_saldo_k;
                                                $jumlah_terpakai = $my_saldo_k;
                                                $my_saldo_k = 0;
                                                $harga_terpakai = $saldo_h[$idx];
                                            }
                                            if ($my_saldo_k == 0) {
                                                $status = true;
                                            }
                                                $saldo_t[$idx] = $saldo_k[$idx] * $saldo_h[$idx];
                                                $total_harga_terpakai = $jumlah_terpakai * $harga_terpakai;
                                                $total_jumlah_pemakaian = $total_jumlah_pemakaian + $jumlah_terpakai;
                                                $total_harga_pemakaian = $total_harga_pemakaian + $total_harga_terpakai;
                                                $saldo = $saldo + $saldo_t[$idx];
                                                $saldo1 = $saldo1 + $saldo_k[$idx];
                                                if ($nama_transaksi == "retur") {
                        ?>
                        <tr>
                            <td align="center"><?php if ($z == 0) echo format_indo(date($data->tanggal_stok)); ?></td>
                            <td align="center">(<?php echo $jumlah_terpakai; ?></td>
                            <td align="right"> (<?php echo format_rp($harga_terpakai); ?>)</td>
                            <td align="right"> (<?php echo format_rp($total_harga_terpakai); ?>)</td>
                            <td align="center"></td>
                            <td align="right"></td>
                            <td align="right"></td>
                            <td align="center"><?php if ($saldo_k[$idx] != 0) echo $saldo_k[$idx]; ?></td>
                            <td align="right"><?php if ($saldo_k[$idx] != 0) echo format_rp($saldo_h[$idx]); ?></td>
                            <td align="right"><?php if ($saldo_k[$idx] != 0) echo format_rp($saldo_t[$idx]); ?></td>
                        </tr>
                        <?php
                                                    $unit = $unit - $jumlah_terpakai;
                                                    $jumlah = $jumlah - $total_harga_terpakai;
                                                } else if ($nama_transaksi == "produksi") {
                                                    $unit_penj = $unit_penj + $jumlah_terpakai;
                                                    $jumlah_penj = $jumlah_penj + $total_harga_terpakai;
                        ?>
                        <tr>
                            <td align="center"><?php if ($z == 0) echo format_indo(date($data->tanggal_stok)); ?></td>
                            <td align="center"></td>
                            <td align="right"></td>
                            <td align="right"></td>
                            <td align="center"><?php echo $jumlah_terpakai; ?></td>
                            <td align="center"><?php echo format_rp($harga_terpakai); ?></td>
                            <td align="center"><?php echo format_rp($total_harga_terpakai); ?></td>
                            <td align="center"><?php if ($saldo_k[$idx] != 0) echo $saldo_k[$idx]; ?></td>
                            <td align="right"><?php if ($saldo_k[$idx] != 0) echo format_rp($saldo_h[$idx]); ?></td>
                            <td align="right"><?php if ($saldo_k[$idx] != 0) echo format_rp($saldo_t[$idx]); ?></td>
                        </tr>
                        <?php
                                                }
                                                $z++;
                                            }
                                            $idx++;
                                        }
                                        for ($i = $idx; $i <= $cek; $i++) {
                                            if ($saldo_k[$i] != 0) {
                        ?>
                        <tr>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="right"></td>
                            <td align="right"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"><?php if ($saldo_k[$i] != 0) echo $saldo_k[$i]; ?></td>
                            <td align="right"> <?php if ($saldo_k[$i] != 0) echo format_rp($saldo_h[$i]); ?></td>
                            <td align="right"><?php if ($saldo_k[$i] != 0) echo format_rp($saldo_t[$i]); ?></td>
                        </tr>
                        <?php
                                            }
                                            $saldo = $saldo + $saldo_t[$idx];
                                            $saldo1 = $saldo1 + $saldo_k[$idx];
                                        }
                                    }
                                    $no++;
                                }
                        ?>
                        <tr>
                            <td class="text-center " style="background-color:green,font-color:black">Saldo Pembelian</td>
                            <td align="center"><?php echo $unit; ?></td>
                            <td></td>
                            <td align="right"><?php echo format_rp($jumlah); ?></td>
                            <td align="center"></td>
                            <td></td>
                            <td align="right"></td>
                            <td align="center"></td>
                            <td></td>
                            <td align="right"></td>
                        </tr>
                        <tr>
                            <td align="center">Saldo Harga Pokok Penjualan</td>
                            <td align="center"></td>
                            <td></td>
                            <td></td>
                            <td align="center"><?php echo $unit_penj; ?></td>
                            <td></td>
                            <td align="right"><?php echo format_rp($jumlah_penj); ?></td>
                            <td></td>
                            <td></td>
                            <td align="right"></td>
                        </tr>
                        <tr>
                            <td align="center">Saldo Total</td>
                            <td align="center"></td>
                            <td></td>
                            <td align="right"></td>
                            <td align="center"></td>
                            <td></td>
                            <td align="right"></td>
                            <td align="center"><?php echo $saldo1; ?></td>
                            <td></td>
                            <td align="right"><?php echo format_rp($saldo); ?></td>
                        </tr>
                        <?php
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>  
</body>
</html>