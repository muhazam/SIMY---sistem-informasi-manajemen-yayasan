<section class="content-header">
  <h1>
    Database siswa
    <small>Add &nbsp <?php echo anchor('siswa', ' ', array('class' => 'fa fa-reply btn btn-success btn-xs btn-flat', 'title' => 'back')); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Database siswa</li>
  </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
		  <!-- general form elements -->
		  <div class="box box-success">
		    <div class="box-header with-border">
		      <h3 class="box-title">Edit siswa</h3>&nbsp &nbsp
		    </div>
		    <!-- /.box-header -->
		    <!-- form start -->
		    
			<?php
            echo form_open_multipart('siswa/edit', 'role="form" class="form-horizontal"');
            echo form_hidden('nim', $siswa['nim']);
            ?>
		      <div class="box-body">
		        <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">NIM</label>
	                <div class="col-sm-9">
	                    <input type="text" value="<?= $siswa['nim'] ?>" readonly="" id="form-field-1" class="form-control">
	                </div>
	            </div>
		        <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    NAMA LENGKAP
	                </label>
	                <div class="col-sm-9">
	                    <input type="text" value="<?= $siswa['nama'] ?>" name="nama" id="form-field-1" class="form-control" required>
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    TEMPAT & TGL LAHIR
	                </label>
	                <div class="col-sm-5">
	                    <input type="text" value="<?= $siswa['tempat_lahir'] ?>" name="tempat_lahir" placeholder="tempat lahir" id="form-field-1" class="form-control" required>
	                </div>
	                <div class="col-sm-2">
	                    <input type="date" value="<?= $siswa['tanggal_lahir'] ?>" name="tanggal_lahir" placeholder="tanggal lahir" id="form-field-1" class="form-control" required>
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    ALAMAT
	                </label>
	                <div class="col-sm-5">
	                	<textarea name="alamat" id="form-field-1" class="form-control" required="" cols="30" rows="10"><?= $siswa['alamat'] ?></textarea>
	                </div>
	            </div>
				<div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    GENDER
	                </label>
	                <div class="col-sm-2">
	                    <?php
	                    echo form_dropdown('gender', array('Laki-laki' => 'LAKI LAKI', 'Perempuan' => 'PEREMPUAN'), $siswa['gender'], "class='form-control'");
	                    ?>
	                </div>
	            </div>
		        <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">FOTO</label>
	                <div class="col-sm-4 breadcrumb">
	                    <input type="file" name="userfile"><br>
	                    <img class="col-md-12" src="<?php echo base_url()."/uploads/".$siswa['foto']?>" width="100px">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    PILIH ROMBEL KELAS
	                </label>
	                <div class="col-sm-2">
	                   <?php echo cmb_dinamis('rombel', 'tbl_rombel', 'nama_rombel', 'id_rombel', $siswa['id_rombel']);?>
	                </div>
	            </div>
		      
		      <!-- /.box-body -->

		      
		        <div class="col-xs-12">
                    <button type="submit" name="submit" class="btn btn-primary btn-md btn-flat" title="Update">Update</button>
                </div>
		      </div>
		    </form>
		  </div>
		  <!-- /.box -->
		</div>
	</div>
</section>