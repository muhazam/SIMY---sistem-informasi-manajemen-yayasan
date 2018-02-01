<section class="content-header">
  <h1>
    <i class="fa fa-users">
    </i>
      Database Santri
      <small>Detail &nbsp&nbsp <?php echo anchor('santri', ' ', array('class' => 'fa fa-reply btn btn-success btn-xs btn-flat', 'title' => 'back')); ?>
        &nbsp
      <?php echo anchor('santri/edit/'.$nim,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success btn-flat tooltips" data-placement="top" title="Edit"'); ?>
      </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Details Santri</li>
  </ol>
</section>

<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box box-success'>            
        <div class="box-header">
          <li class="box-title">Detail Santri</li>
        </div>
          <div class="box-body">
            <div class='col-xs-12'>
              <table class="table table-responsive table-bordered table-striped table-hover dataTable">
                <tbody>
                  <tr><td class="col-xs-3">NIM</td><td><?php echo $nim; ?></td></tr>
                  <tr><td>NAMA</td><td><?php echo $nama; ?></td></tr>
                  <tr><td>TANGGAL LAHIR</td><td><?php echo $tanggal_lahir; ?></td></tr>
                  <tr><td>TEMPAT LAHIR</td><td><?php echo $tempat_lahir; ?></td></tr>
                  <tr><td>ALAMAT</td><td><?php echo $alamat; ?></td></tr>
                  <tr><td>FOTO</td><td><img width='300px' src="<?php echo base_url().'uploads/foto_santri/'.$foto?>" class='img-responsive'></td></tr>
                </tbody>
              </table><br>
            </div>
          </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
