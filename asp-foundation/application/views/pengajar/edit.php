<section class="content-header">
  <h1>
    Database Pengajar Ma'had
    <small>Add &nbsp <?php echo anchor('pengajar', ' ', array('class' => 'fa fa-reply btn btn-success btn-xs btn-flat', 'title' => 'back')); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Database Pengajar Ma'had</li>
  </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
		  <!-- general form elements -->
		  <div class="box box-success">
		    <div class="box-header with-border">
		      <h3 class="box-title">Edit Pengajar Ma'had</h3>&nbsp &nbsp 
		      
		    </div>
		    <!-- /.box-header -->
		    <!-- form start -->
		    
			<?php 
				echo form_open_multipart('pengajar/edit', 'role="form" class="form-horizontal"');
				echo form_hidden('id_pengajar', $pengajar['id_pengajar']);
			?>
		      <div class="box-body">

		        <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">NO ID</label>
	                <div class="col-sm-4">
	                    <input type="text" name="id_pengajar" value="<?= $pengajar['id_pengajar'] ?>" readonly='' id="form-field-1" class="form-control" required="">
	                </div>
	            </div>

		        <div class="form-group ">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    NAMA LENGKAP
	                </label>
	                <div class="col-sm-8">
	                    <input type="text" name="nama" value="<?= $pengajar['nama'] ?>" id="form-field-1" class="form-control" required="">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    ALAMAT
	                </label>
	                <div class="col-sm-5">
	                	<textarea name="alamat" id="form-field-1" class="form-control" required="" cols="30" rows="9"><?= $pengajar['alamat'] ?></textarea>
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    STATUS
	                </label>
	                <div class="col-sm-2">
	                    <?php
	                    echo form_dropdown('status', array('Aktif' => 'AKTIF', 'Nonaktif' => 'NONAKTIF'), $pengajar['status'], "class='form-control' required=''");
	                    ?>
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    NO TELPON / HP
	                </label>
	                <div class="col-sm-5">
	                    <input type="tel" name="no_telp" id="form-field-1" class="form-control" required="" value="<?= $pengajar['no_telp'] ?>">
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