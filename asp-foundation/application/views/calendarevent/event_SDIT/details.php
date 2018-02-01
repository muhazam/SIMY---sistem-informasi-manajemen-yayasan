<section class="content-header">
  <h1>
    <i class="fa fa-users">
    </i>
      Management Calendar Events SDIT
      <small>Detail  &nbsp
      <?php echo anchor('calendar_SDIT/modul', ' ', array('class' => 'fa fa-reply btn btn-success btn-xs btn-flat', 'title' => 'back')); ?>

      </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Details Calendar Events SDIT</li>
  </ol>
</section>

<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box box-success'>            
        <div class="box-header ">
          <li class="box-title">Detail Calendar Events SDIT</li>
        </div>
          <div class="box-body">
            <div class='col-xs-12'>
              <table class="table table-responsive table-bordered table-striped table-hover dataTable">
                <tbody>
                  <tr><td class="col-xs-2"><b>NAMA EVENT</b></td><td width="1%">:</td><td><?php echo $title; ?></td></tr>
                  <tr><td><b>DESKRIPSI EVENT</b></td><td>:</td><td><?php echo $description; ?></td></tr>
                  <tr><td><b>TANGGAL EVENT</b></td><td>:</td><td><?php echo $start; ?></td></tr>
                  <tr><td><b>TANGGAL AKHIR EVENT</b></td><td>:</td><td><?php echo $end; ?></td></tr>
                </tbody>
              </table><br>
            </div>
          </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->