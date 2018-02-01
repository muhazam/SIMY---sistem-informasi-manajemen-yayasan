<section class="content-header">
  <h1>
    Database Siswa
    <small>Add &nbsp <?php echo anchor('siswa', ' ', array('class' => 'fa fa-reply btn btn-success btn-xs btn-flat', 'title' => 'back')); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Database Siswa</li>
  </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
		  <!-- general form elements -->
		  <div class="box box-success">
		    <div class="box-header with-border">
		      <h3 class="box-title">Add Siswa</h3>&nbsp &nbsp 
		      
		    </div>
		    <!-- /.box-header -->
		    <!-- form start -->
		    
			<?php
            echo form_open_multipart('siswa/add', 'role="form" class="form-horizontal"');
            ?>
		      <div class="box-body">
		        <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">NIM</label>
	                <div class="col-sm-4">
	                    <input type="text" name="nim" placeholder="masukan nim" id="form-field-1" class="form-control" required="">
	                </div>
	            </div>
		        <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    NAMA LENGKAP
	                </label>
	                <div class="col-sm-9">
	                    <input type="text" name="nama" placeholder="masukan nama lengkap" id="form-field-1" class="form-control" required="">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    TEMPAT & TGL LAHIR
	                </label>
	                <div class="col-sm-5">
	                    <input type="text" name="tempat_lahir" placeholder="tempat lahir" id="form-field-1" class="form-control" required="">
	                </div>
	                <div class="col-sm-2">
	                    <input type="date" name="tanggal_lahir" placeholder="tanggal lahir" id="form-field-1" class="form-control" required="">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    ALAMAT
	                </label>
	                <div class="col-sm-5">
	                	<textarea name="alamat" id="form-field-1" class="form-control" required="" cols="30" rows="10" placeholder="Masukkan alamat lengkap"></textarea>
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
	                <label class="col-sm-2 control-label" for="form-field-1">FOTO</label>
	                <div class="col-sm-2">
	                    <input type="file" name="userfile">
	                </div>
	            </div>
	            <div class="form-group">
                <label class="col-sm-2 control-label" for="form-field-1">
                    PILIH ROMBEL KELAS
                </label>
                <div class="col-sm-2">
                   <?php echo cmb_dinamis('rombel', 'tbl_rombel', 'nama_rombel', 'id_rombel')?>
                </div>
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