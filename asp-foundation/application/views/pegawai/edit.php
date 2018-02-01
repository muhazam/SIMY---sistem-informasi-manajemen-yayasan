
<section class="content-header">
  <h1>
    Management Jabatan Pegawai
    <small>Edit  &nbsp <?php echo anchor('pegawai', ' ', array('class' => 'fa fa-reply btn btn-success btn-xs btn-flat', 'title' => 'back')); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Database Jabatan Pegawai</li>
  </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
		  <!-- general form elements -->
		  	<div class="box box-success">
			    <div class="box-header with-border">
			      <h3 class="box-title">Edit Jabatan Pegawai</h3>&nbsp &nbsp
			    </div>
			    <!-- /.box-header -->
			    <!-- form start -->
			    
				<?php 
					echo form_open('pegawai/edit', 'role="form" class="form-horizontal"');
					echo form_hidden('id_pegawai', $pegawai['id_pegawai']);
				?>
				    <div class="box-body">
			    
				        <div class="form-group">
			                <label class="col-sm-2 control-label" for="form-field-1">
			                    NAMA JABATAN
			                </label>
			                <div class="col-sm-7">
			                    <input type="text" value="<?= $pegawai['nama_jabatan'] ?>" name="nama_jabatan" placeholder="masukan nama Jabatan!" id="form-field-1" class="form-control">
			                </div>
			            </div>
					      <!-- /.box-body -->  
		                <div class="col-sm-2 control-label" for="form-field-1">
		                    
		                </div>
				        <div class="col-sm-2">
		                    <button type="submit" name="submit" class="btn btn-primary btn-flat" title="Update">Update</button>
		                </div>
		                
				    </div>
		      	</div>
		    </form>
		  </div>
		  <!-- /.box -->
		</div>
	</div>
</section>