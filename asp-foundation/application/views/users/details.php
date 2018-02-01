<section class="content-header">
  <h1>
    <i class="fa fa-users">
    </i>
      Management Users
      <small>Detail  &nbsp
      <?php echo anchor('users', ' ', array('class' => 'fa fa-reply btn btn-success btn-xs btn-flat', 'title' => 'back')); ?> &nbsp
      <?php echo anchor('users/edit/'.$id_user,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success btn-flat tooltips" data-placement="top" title="Edit"'); ?>
      </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Details User</li>
  </ol>
</section>

<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box box-success'>            
        <div class="box-header ">
          <li class="box-title">Detail User</li>
        </div>
          <div class="box-body">
            <div class='col-xs-12'>
              <table class="table table-responsive table-bordered table-striped table-hover dataTable">
                <tbody>
                  <tr><td class="col-xs-2"><b>NAMA LENGKAP</b></td><td width="1%">:</td><td><?php echo $nama_lengkap; ?></td></tr>
                  <tr><td><b>USERNAME</b></td><td>:</td><td><?php echo $username; ?></td></tr>
                  <tr><td><b>EMAIL</b></td><td>:</td><td><?php echo $email; ?></td></tr>
                  <tr><td><b>JENIS KELAMIN</b></td><td>:</td><td><?php echo $gender; ?></td></tr>
                  <tr><td><b>LEVEL AKUN</b></td><td>:</td><td><?php echo $nama_level; ?></td></tr>
                  <tr><td><b>FOTO</b></td><td>:</td><td><img width='300px' src="<?php echo base_url().'uploads/foto_user/'.$foto?>" class='img-responsive'></td></tr>
                </tbody>
              </table><br>
            </div>
          </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
