<section class="content-header">
  <h1>
    <i class="fa fa-users">
    </i>
      Management Users
      <small>Detail  &nbsp
      <?php echo anchor('guru', ' ', array('class' => 'fa fa-reply btn btn-success btn-xs btn-flat', 'title' => 'back')); ?> &nbsp
      <?php echo anchor('guru/edit/'.$id_guru,'<i class="fa fa-edit"></i>','class="btn btn-xs btn-success btn-flat tooltips" data-placement="top" title="Edit"'); ?>

      </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Details Karyawan & Guru</li>
  </ol>
</section>

<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box box-success'>            
        <div class="box-header ">
          <li class="box-title">Detail User</li>
        </div>
          <div class="box-body">
            <div class='col-xs-12'>
              <table class="table table-responsive table-bordered table-striped table-hover dataTable">
                <tbody>
                  <tr><td><b>NO ID</b></td><td>:</td><td><?php echo $id_guru; ?></td></tr>
                  <tr><td class="col-xs-2"><b>NAMA LENGKAP</b></td><td width="1%">:</td><td><?php echo $nama_guru; ?></td></tr>
                  <tr><td><b>ALAMAT</b></td><td>:</td><td><?php echo $alamat; ?></td></tr>
                  <tr><td><b>STATUS</b></td><td>:</td><td><?php echo $status; ?></td></tr>
                  <tr><td><b>JENIS KELAMIN</b></td><td>:</td><td><?php echo $gender; ?></td></tr>
                  <tr><td><b>TANGGAL LAHIR</b></td><td>:</td><td><?php echo $tanggal_lahir; ?></td></tr>
                  <tr><td><b>TEMPAT LAHIR</b></td><td>:</td><td><?php echo $tempat_lahir; ?></td></tr>
                  <tr><td><b>RIWAYAT KARIR</b></td><td>:</td><td><?php echo $riwayat_karir; ?></td></tr>
                  <tr><td><b>RIWAYAT PENDIDIKAN</b></td><td>:</td><td><?php echo $riwayat_pend; ?></td></tr>
                  <tr><td><b>JABATAN</b></td><td>:</td><td><?php echo $nama_jabatan; ?></td></tr>
                  <tr><td><b>NO TELP/HP</b></td><td>:</td><td><?php echo $no_telp; ?></td></tr>
                  <tr><td><b>FOTO</b></td><td>:</td><td><img width='300px' src="<?php echo base_url().'uploads/foto_guru/'.$foto?>" class='img-responsive'></td></tr>
                </tbody>
              </table><br>
            </div>
          </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
