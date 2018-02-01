<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-user">
    </i>
      Halaman Profile User
      <small>Setting Profile</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Profile</li>
  </ol>
</section>

<section class="content"> 
  <div class="row">
    <div class="col-md-4">
      <!-- Profile Image -->
      <div class="box box-success"><br>
        <div class="box-body box-profile">
          <img src="<?php echo base_url().'uploads/foto_user/'.$this->session->userdata('foto')?>" class="profile-user-img img-responsive img-circle" alt="User profile picture"><br>

          <h3 class="profile-username text-center"><?php echo $this->session->userdata('nama_lengkap'); ?></h3>
          <p class="text-muted text-center"><?php echo $this->session->userdata('nama_level'); ?></p><br>

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Username </b> <i class="pull-right"><?php echo $this->session->userdata('username'); ?></i>
            </li>
            <li class="list-group-item">
              <b>Email </b> <i class="pull-right"><?php echo $this->session->userdata('email'); ?></i>
            </li>
            <li class="list-group-item">
              <b>Jenis Kelamin </b> <i class="pull-right"><?php echo $this->session->userdata('gender'); ?></i>
            </li>
          </ul><br>
        </div>
      </div>
    </div>
    
    <div class="col-md-8">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs"> 
          <li class="tab col s3"><a href="#password"  data-toggle="tab"><b>UBAH PASSWORD</b></a></li>
        </ul>

        <div class="tab-content"> 
          <div class="tab-pane" id="password">
            <form class="form-horizontal" action="<?php echo base_url('profile/save_password') ?>" method="POST">
              <div class="form-group">
                <label for="old" class="col-sm-2 control-label">Password Lama</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" required="" placeholder="Password Lama" name="old" value="<?php echo set_value('old');?>">
                </div>
              </div>
              <div class="form-group">
                <label for="new" class="col-sm-2 control-label">Password Baru</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" required="" placeholder="Password Baru" name="new" value="<?php echo set_value('new');?>">
                </div>
              </div>
              <div class="form-group">
                <label for="passKonf" class="col-sm-2 control-label">Konfirmasi Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" required='' placeholder="Konfirmasi Password" name="re_new" value="<?php echo set_value('re_new');?>">
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success btn-sm btn-flat">Ubah</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

  <div class="col-md-6">
    <div class="error btn-danger">
      <?= validation_errors() ?>
      <?= $this->session->flashdata('error') ?>
    </div>
  </div>
    </div>
  </div>
</section>