
<section class="content-header">
  <h1>
    Management Users
    <small>Edit  &nbsp <?php echo anchor('users', ' ', array('class' => 'fa fa-reply btn btn-success btn-xs btn-flat', 'title' => 'back')); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Database Users</li>
  </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
		  <!-- general form elements -->
		  	<div class="box box-success">
			    <div class="box-header with-border">
			      <h3 class="box-title">Edit Users</h3>&nbsp &nbsp
			    </div>
			    <!-- /.box-header -->
			    <!-- form start -->
			    
				<?php 
					echo form_open_multipart('users/edit', 'role="form" class="form-horizontal"');
					echo form_hidden('id_user', $user['id_user']);
				?>
				    <div class="box-body">
			    	
				        <div class="form-group">
			                <label class="col-sm-2 control-label" for="form-field-1">
			                    NAMA LENGKAP
			                </label>
			                <div class="col-sm-7">
			                    <input type="text" value="<?= $user['nama_lengkap'] ?>" name="nama_lengkap" placeholder="masukan nama lengkap" id="form-field-1" class="form-control">
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-2 control-label" for="form-field-1">
			                    USERNAME
			                </label>
			                <div class="col-sm-5">
			                    <input type="text" value="<?= $user['username'] ?>" name="username" placeholder="tempat username" id="form-field-1" class="form-control">
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-2 control-label" for="form-field-1">
			                    PASSWORD
			                </label>
			                <div class="col-sm-5">
			                    <input type="password" name="password" placeholder="Masukan Password" id="form-field-1" class="form-control" required="">
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-2 control-label" for="form-field-1">
			                    EMAIL
			                </label>
			                <div class="col-sm-5">
			                    <input type="email" value="<?= $user['email'] ?>" name="email" placeholder="Masukan Email" id="form-field-1" class="form-control">
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-2 control-label" for="form-field-1">
			                    GENDER
			                </label>
			                <div class="col-sm-2">
			                    <?php
			                    echo form_dropdown('gender', array('Laki-laki' => 'LAKI LAKI', 'Perempuan' => 'PEREMPUAN'), $user['gender'], "class='form-control'");
			                    ?>
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="col-sm-2 control-label" for="form-field-1">
			                    LEVEL USER
			                </label>
			                <div class="col-sm-3">
			                    <?php
			                    echo cmb_dinamis('id_level_user', 'tbl_level_user', 'nama_level', 'id_level_user', $user['id_level_user']);
			                    ?>
			                </div>
			            </div>
				        <div class="form-group">
			                <label class="col-sm-2 control-label" for="form-field-1">FOTO</label>
			                <div class="col-sm-4 breadcrumb">
			                    <input type="file" name="userfile"><br>
			                    <img class="col-md-12" src="<?php echo base_url().'uploads/foto_user/'.$user['foto']?>" width="300">
			                </div>
			            </div>
		                <div class="col-sm-2 control-label" for="form-field-1">
		                    
		                </div>
				        <div class="col-sm-2">
		                    <button type="submit" name="submit" class="btn btn-primary btn-flat" title="Update">Update</button>
		                </div>
		                
					<!-- /.box-body -->  
				    </div>
		      	</div>
		    </form>
		  </div>
		  <!-- /.box -->
		</div>
	</div>
</section>