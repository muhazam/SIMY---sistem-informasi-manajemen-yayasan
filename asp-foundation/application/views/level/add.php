<section class="content-header">
  <h1>
    Management Level Users
    <small>Add &nbsp <?php echo anchor('level', ' ', array('class' => 'fa fa-reply btn btn-success btn-xs btn-flat', 'title' => 'back')); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Database Level Users</li>
  </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
		  <!-- general form elements -->
		  <div class="box box-success">
		    <div class="box-header with-border">
		      <h3 class="box-title">Add Level</h3>&nbsp &nbsp 
		      
		    </div>
		    <!-- /.box-header -->
		    <!-- form start -->
		    
			<?php echo form_open('level/add', 'role="form" class="form-horizontal"');  ?>
		      <div class="box-body">

		        <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    NAMA LEVEL
	                </label>
	                <div class="col-sm-5">
	                    <input type="text" name="nama_level" placeholder="Masukan nama level!" id="form-field-1" class="form-control" required="">
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