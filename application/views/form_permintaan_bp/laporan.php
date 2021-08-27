
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0 text-dark">Laporan Pembelian Bahan Baku</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
           
                <div class="py-3">
                    <a href="<?=base_url("index.php/pembelian/input_form")?>" class="btn btn-primary">Tambah Data</a>
                    <a target="_blank" href="<?=site_url('lap_bb/view_data')?>" class="btn btn-danger">Eksport PDF</a>
                    <a href="<?=site_url('lap_bb/pembelian_excel')?>" class="btn btn-success">Eksport Excel</a>
              
           
             <div class="card-body">                  
              <table class="table table-striped table-bordered" id="tabelakun">
              <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No Faktur</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Supplier</th>                                        
                        <th scope="col">Total Transaksi</th>
                    </tr>
                </thead>
            <tbody>
                <?php $no=1; $gtotal=0; foreach ($pembelian as $row) { ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$row->no_faktur?></td>
                        <td><?=$row->tanggal?></td>
                        <td><?=$row->nama_supplier?></td>
                        <td><?=nominal($row->total)?></td>
                       
                        <?php $gtotal=$gtotal+$row->total?>
                    </tr>
                <?php } ?>
                    
            </tbody>
        </div>                          
            </table>
<script>
    $(function(){
        
        $('#tabelakun').DataTable();
    });
</script>
    </div>
    <div class="form-group" align="center">
        <button onclick="location.href ='http://localhost/pakhir/index.php/pembelian/'" type="button" class="btn btn-info">
            <span class="glyphicon glyphicon-edit"></span> Kembali
        </button>
    </div>
</div> 
