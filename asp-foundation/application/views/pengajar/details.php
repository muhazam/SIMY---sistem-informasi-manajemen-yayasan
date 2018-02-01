<section class="content-header">
  <h1>
    <i class="fa fa-users">
    </i>
      Management Pengajar Ma'had
      <small>Detail  &nbsp
      <?php echo anchor('pengajar', ' ', array('class' => 'fa fa-reply btn btn-success btn-xs btn-flat', 'title' => 'back')); ?> &nbsp
      <?php echo anchor('pengajar/edit/'.$id_pengajar,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success btn-flat tooltips" data-placement="top" title="Edit"'); ?>

      </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Details Pengajar Ma'had</li>
  </ol>
</section>

<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box box-success'>            
        <div class="box-header ">
          <li class="box-title">Detail Pengajar Ma'had</li>
        </div>
          <div class="box-body">
            <div class='col-xs-12'>
              <table class="table table-responsive table-bordered table-striped table-hover dataTable">
                <tbody>
                  <tr><td><b>NO ID</b></td><td>:</td><td><?php echo $id_pengajar; ?></td></tr>
                  <tr><td class="col-xs-2"><b>NAMA LENGKAP</b></td><td width="1%">:</td><td><?php echo $nama; ?></td></tr>
                  <tr><td><b>ALAMAT</b></td><td>:</td><td><?php echo $alamat; ?></td></tr>
                  <tr><td><b>STATUS</b></td><td>:</td><td><?php echo $status; ?></td></tr>
                  <tr><td><b>NO TELP/HP</b></td><td>:</td><td><?php echo $no_telp; ?></td></tr>
                </tbody>
              </table><br>
            </div>
          </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
