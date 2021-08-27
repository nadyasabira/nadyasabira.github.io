<!DOCTYPE html>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <h1 class="m-0 text-dark">Pelanggan</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <button class="btn btn-success" data-toggle="modal" data-target="#modal" onclick="add()">Add</button>
          </div>
          <div class="card-body">
            <table class="table w-100 table-bordered table-hover" id="pelanggan">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Telepon</th>
                  <th>Keterangan</th>
                  <th>Actions</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>

<div class="modal fade" id="modal">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title">Add Data</h5>
    <button class="close" data-dismiss="modal">
      <span>&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form id="form">
      <input type="hidden" name="id">
      <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" placeholder="Nama" name="nama" required>
      </div>
      <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
          <option value="Pria">Pria</option>
          <option value="Wanita">Wanita</option>
          <option value="Lainya">Lainya</option>
        </select>
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
      </div>
      <div class="form-group">
        <label>Telepon</label>
        <input type="number" class="form-control" placeholder="Telepon" name="telepon" required>
      </div>
      <button class="btn btn-success" type="submit">Add</button>
      <button class="btn btn-danger" data-dismiss="modal">Close</button>
    </form>
  </div>
</div>
</div>
</div>
<!-- ./wrapper -->
<?php $this->load->view('includes/footer'); ?>
<?php $this->load->view('partials/footer'); ?>
<script src="<?php echo base_url('assets/vendor/adminlte/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/adminlte/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/adminlte/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script>
  var readUrl = '<?php echo site_url('pelanggan/read') ?>';
  var addUrl = '<?php echo site_url('pelanggan/add') ?>';
  var deleteUrl = '<?php echo site_url('pelanggan/delete') ?>';
  var editUrl = '<?php echo site_url('pelanggan/edit') ?>';
  var get_pelangganUrl = '<?php echo site_url('pelanggan/get_pelanggan') ?>';
</script>
<script src="<?php echo base_url('assets/js/pelanggan.min.js') ?>"></script>
</body>
</html>
