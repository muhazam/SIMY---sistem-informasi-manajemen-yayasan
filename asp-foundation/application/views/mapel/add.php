<section class="content-header">
  <h1>
    Database Mata Pelajaran Ma'had Assunnah
    <small>Add &nbsp <?php echo anchor('mapel', ' ', array('class' => 'fa fa-reply btn btn-success btn-xs btn-flat', 'title' => 'back')); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Database Mata Pelajaran Ma'had Assunnah</li>
  </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
		  <!-- general form elements -->
		  <div class="box box-success">
		    <div class="box-header with-border">
		      <h3 class="box-title">Add Mata Pelajaran Ma'had Assunnah</h3>&nbsp &nbsp
		    </div>
		    <!-- /.box-header -->
		    <!-- form start -->
		    
			<?php
            echo form_open_multipart('mapel/add', 'role="form" class="form-horizontal"');
            ?>
		      <div class="box-body">
		        <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">PELAJARAN</label>
	                <div class="col-sm-6">
	                    <input type="text" name="nama_mapel" id="form-field-1" class="form-control">
	                </div>
	            </div>
		        <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    JUDUL KITAB
	                </label>
	                <div class="col-sm-9">
	                    <input type="text" name="judul_kitab" id="form-field-1" class="form-control" required>
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    PENGAJAR
	                </label>
	                <div class="col-xs-3">
	                    <?php
	                    echo cmb_dinamis('id_pengajar', 'tbl_pengajar_mahad', 'nama', 'id_pengajar');
	                    ?>
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    TARGET
	                </label>
	                <div class="col-sm-5">
	                	<textarea name="target" id="form-field-1" class="form-control" required="" cols="30" rows="10" placeholder="Masukkan target tujuan"></textarea>
	                </div>
	            </div>
		      <!-- /.box-body -->

		      <div class="box-footer">
		        <div class="col-xs-1">
                    <button type="submit" name="submit" class="btn btn-primary btn-sm btn-flat" title="submit">Submit</button>

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