<section class="content-header">
  <h1>
    Database Karyawan & Guru
    <small>Add &nbsp <?php echo anchor('guru', ' ', array('class' => 'fa fa-reply btn btn-success btn-xs btn-flat', 'title' => 'back')); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Database Karyawan & Guru</li>
  </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
		  <!-- general form elements -->
		  <div class="box box-success">
		    <div class="box-header with-border">
		      <h3 class="box-title">Edit Karyawan & Guru</h3>&nbsp &nbsp 
		      
		    </div>
		    <!-- /.box-header -->
		    <!-- form start -->
		    
			<?php 
				echo form_open_multipart('guru/edit', 'role="form" class="form-horizontal"');
				echo form_hidden('id_guru', $guru['id_guru']);
			?>
		      <div class="box-body">

		        <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">NO ID</label>
	                <div class="col-sm-4">
	                    <input type="text" name="id_guru" value="<?= $guru['id_guru'] ?>" readonly='' id="form-field-1" class="form-control" required="">
	                </div>
	            </div>

		        <div class="form-group ">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    NAMA LENGKAP
	                </label>
	                <div class="col-sm-8">
	                    <input type="text" name="nama_guru" value="<?= $guru['nama_guru'] ?>" id="form-field-1" class="form-control" required="">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    ALAMAT
	                </label>
	                <div class="col-sm-5">
	                    <input type="text" name="alamat" value="<?= $guru['alamat'] ?>" id="form-field-1" class="form-control" required="">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    GENDER
	                </label>
	                <div class="col-sm-2">
	                    <?php
	                    echo form_dropdown('gender', array('Laki-laki' => 'LAKI LAKI', 'Perempuan' => 'PEREMPUAN'), $guru['gender'], "class='form-control' required=''");
	                    ?>
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    STATUS
	                </label>
	                <div class="col-sm-2">
	                    <?php
	                    echo form_dropdown('status', array('Aktif' => 'AKTIF', 'Nonaktif' => 'NONAKTIF'), $guru['status'], "class='form-control' required=''");
	                    ?>
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    TEMPAT & TGL LAHIR
	                </label>
	                <div class="col-sm-5">
	                    <input type="text" name="tempat_lahir" value="<?= $guru['tempat_lahir'] ?>" id="form-field-1" class="form-control" required="">
	                </div>
	                <div class="col-sm-2">
	                    <input type="date" name="tanggal_lahir" value="<?= $guru['tanggal_lahir'] ?>" id="form-field-1" class="form-control" required="">
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    RIWAYAT KARIR
	                </label>
	                <div class="col-sm-5">
	                	<textarea name="riwayat_karir" id="form-field-1" class="form-control" required="" cols="30" rows="10" ><?php echo $guru['riwayat_karir']; ?></textarea>

	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    RIWAYAT PENDIDIKAN
	                </label>
	                <div class="col-sm-5">
	                	<textarea name="riwayat_pend" id="form-field-1" class="form-control" required="" cols="30" rows="10"><?php echo $guru['riwayat_pend']; ?></textarea>
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    JABATAN
	                </label>
	                <div class="col-xs-3">
	                    <?php
			                echo cmb_dinamis('id_pegawai', 'tbl_pegawai', 'nama_jabatan', 'id_pegawai', $guru['id_pegawai']);
						?>
	                </div>
	            </div>
	            <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">
	                    NO TELPON / HP
	                </label>
	                <div class="col-sm-5">
	                    <input type="tel" name="no_telp" id="form-field-1" class="form-control" required="" value="<?= $guru['no_telp'] ?>">
	                </div>
	            </div>
		        <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-field-1">FOTO</label>
	                <div class="col-sm-2">
	                    <input type="file" name="userfile">
	                    <img class="col-md-12" src="<?php echo base_url()."/uploads/foto_guru/".$guru['foto']?>" width="300">
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