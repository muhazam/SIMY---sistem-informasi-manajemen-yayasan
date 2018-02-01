<section class="content-header">
  <h1>
    Database Users
    <small>Add &nbsp <?php echo anchor('users', ' ', array('class' => 'fa fa-reply btn btn-success btn-xs btn-flat', 'title' => 'back')); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Database users</li>
  </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
		  <!-- general form elements -->
		  <div class="box box-success">
		    <div class="box-header with-border">
		      <h3 class="box-title">Add Users</h3>&nbsp &nbsp 
		      
		    </div>
		    <!-- /.box-header -->
		    <!-- form start -->
		    
			<?php echo form_open_multipart('users/add', 'role="form" class="form-horizontal"');  ?>
		      <div class="box-body">

		        <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    NAMA LENGKAP
	                </label>
	                <div class="col-sm-9">
	                    <input type="text" name="nama_lengkap" placeholder="masukan nama lengkap" id="form-field-1" class="form-control" required="">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    USERNAME
	                </label>
	                <div class="col-sm-5">
	                    <input type="text" name="username" placeholder="username" id="form-field-1" class="form-control" required="">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    PASSWORD
	                </label>
	                <div class="col-sm-4">
	                    <input type="password" name="password" placeholder="password" id="form-field-1" class="form-control" required="">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    EMAIL
	                </label>
	                <div class="col-sm-4">
	                    <input type="email" name="email" placeholder="isi Email disini" id="form-field-1" class="form-control" required="">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    GENDER
	                </label>
	                <div class="col-sm-2">
	                    <?php
	                    echo form_dropdown('gender', array('Laki-laki' => 'LAKI LAKI', 'Perempuan' => 'PEREMPUAN'), null, "class='form-control' required=''");
	                    ?>
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    LEVEL USERS
	                </label>
	                <div class="col-xs-3">
	                    <?php
	                    echo cmb_dinamis('id_level_user', 'tbl_level_user', 'nama_level', 'id_level_user');
	                    ?>
	                </div>
	            </div>
		        <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">FOTO</label>
	                <div class="col-sm-2">
	                    <input type="file" name="userfile">
	                </div>
	            </div>
		      </div>
		      <!-- /.box-body -->

		      <div class="box-footer">
		        <div class="col-xs-1">
                    <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat" title="submit">Simpan</button>
                </div>
                <div>

                </div>
		      </div>
		    </form>
		  </div>
		  <!-- /.box -->
		</div>
	</div>
</section>