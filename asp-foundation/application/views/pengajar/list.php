<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-user">
    </i>
      Management Modul Pengajar Ma'had
      <small>Modul Pengajar Ma'had </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Modul Pengajar Ma'had</li>
  </ol>
</section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success panel panel-success">
            <div class="panel-heading breadcrumb">
              <li class="fa fa-external-link-square"></li>&nbsp DATA PENGAJAR MA'HAD&nbsp &nbsp 
              <li>  
                <?php 
                    echo anchor('pengajar/add', '<i class="fa fa-plus-circle" aria-hidden="true"></i>', 'class="btn btn-xs btn-success btn-flat" title="Tambah Data"');
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
                          <th class="sorting">NAMA PENGAJAR</th>
                          <th class="sorting">STATUS</th>
                          <th class="sorting">NO TELP</th>
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
            "ajax": "<?php echo site_url('pengajar/data'); ?>",
            "order": [[ 1, 'asc' ]],
            
            "columns": [
                {
                    "data": null,
                    "sClass": "text-center",
                    "orderable": false,
                    "width": "1%",
                },
                { "data": "nama"},
                { "data": "status", "sClass": "text-center"},
                { "data": "no_telp", "sClass": "no_telp"},
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
