  <div class="container">
  <center> <h1 class="h3 mb-0 text-gray-800">Laporan Penjualan</h1><br></center>
                        <div class="row">
                            <div class=".col-md-12">
                           
                            <!--  notifikasi sukses -->
                            <?php $data=$this->session->flashdata('sukses');
                            if($data!=''){ ?>
                                <div class="alert alert-success" role="alert"><?=$data?></div>
                                <?php } ?>
                                <!--  notifikasi error -->
                            <?php $data2=$this->session->flashdata('error');
                            
                            if($data2!=''){ ?>
                                <div class="alert alert-danger" role="alert"><?=$data2?></div>
                                <?php } ?>
                                
                                <!-- end notification -->
                                <div class="py-3">
                                    <a href="<?=base_url("index.php/C_Penjualan/input_form")?>" class="btn btn-primary btn-sm">Tambah Data</a>
                                    <a target="_blank" href="<?=site_url('C_Laporan/penjualan_pdf')?>" class="btn btn-danger btn-sm">Eksport PDF</a>
                                    <a href="<?=site_url('C_Laporan/penjualan_excel')?>" class="btn btn-success btn-sm">Eksport Excel</a>
                                </div>
                                </div>
                                
                                <table class="table table-bordered table-hover">
                            
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=0; $gtotal=0; foreach ($penjualan as $row) { ?>
                                            <tr>
                                                <td><?=$no=$no+1?></td>
                                                <td><?=$row->no_nota?></td>
                                                <td><?=$row->waktu?></td>
                                                <td><?=nominal($row->total)?></td>
                                                <?php $gtotal=$gtotal+$row->total?>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td class="text-right" colspan="3">Total</td>
                                            <td><?= nominal($gtotal)?></td>
                                        </tr>
                                    </tbody>
                                    </div>
                                    
                                </table> </div>
                                <div class="form-group" align="center">
    <button onclick="location.href ='http://localhost/pakhir/index.php/penjualan/'" type="button" class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-edit"></span> Kembali
                            </button></div>
                            </div>
                        