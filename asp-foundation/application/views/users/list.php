<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-user">
    </i>
      Management Modul Users
      <small>Modul Users &nbsp <?php echo anchor('rule','HAK AKSES USER',array('class'=>'btn btn-danger btn-xs btn-flat', 'title'=>'Rule Users'));?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Modul Users</li>
  </ol>
</section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success panel panel-success">
            <div class="panel-heading breadcrumb">
              <li class="fa fa-external-link-square"></li>&nbsp DATA AKUN USERS&nbsp &nbsp 
              <li>  
                <?php 
                    echo anchor('users/add', '<i class="fa fa-plus-circle" aria-hidden="true"></i>', 'class="btn btn-xs btn-success btn-flat" title="Tambah Data"');
                ?>&nbsp
              </li>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              
                <div class="row">
                  <div class="col-sm-12">
                    
                    <table id="mytable" class="table table-bordered table-hover table-striped table-responsive dataTable" role="grid" aria-describedby="example1_info">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>FOTO</th>
                          <th class="sorting">NAMA LENGKAP</th>
                          <th class="sorting">EMAIL</th>
                          <th class="sorting">LEVEL AKUN</th>
                          <th>AKSI</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        
                      </tbody> 
                    </table>
                  
                  </div>
                </div>
              
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

<script src="template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="template/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        var t = $('#mytable').DataTable( {
            "responsive": true,
            "scrollX": true,
            "ajax": "<?php echo site_url('users/data'); ?>",
            "order": [[ 1, 'asc' ]],
            
            "columns": [
                {
                    "data": null,
                    "sClass": "text-center",
                    "orderable": false,
                    "width": "5px",
                },
                { 
                    "data": "foto",
                    "sClass": "text-center", 
                    "orderable": false, 
                    "width": "40px",
                },
                { "data": "nama_lengkap"},
                { "data": "email"},
                { "data": "nama_level", "sClass": "text-center", "width":"200px" },
                { "data": "aksi", "orderable": false, "sClass": "text-center", "width": "80px"}
            ]
        } );
           
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );
</script>