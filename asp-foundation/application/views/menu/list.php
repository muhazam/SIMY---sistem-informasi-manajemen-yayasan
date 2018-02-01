<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-th-list">
    </i>
      Management Modul Menu
      <small>Main Menu &nbsp <?php echo anchor('rule','HAK AKSES USER',array('class'=>'btn btn-danger btn-xs btn-flat', 'title'=>'Rule Users'));?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Main Menu</li>
  </ol>
</section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header breadcrumb">
              <li class="box-title">Data Modul Menu</li>&nbsp &nbsp 
              <li>  
                <?php 
                    echo anchor('menu/add', '<i class="fa fa-plus-circle" aria-hidden="true"></i>', 'class="btn btn-xs btn-success btn-flat" title="Tambah Data"');
                ?>&nbsp
              </li>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              
                <div class="row">
                  <div class="col-sm-12">
                    
                    <table id="mytable" class="table table-bordered table-hover table-responsive dataTable" role="grid" aria-describedby="example1_info">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th class="sorting">NAMA MEMU</th>
                          <th class="sorting">LINK</th>
                          <th class="sorting">ICON</th>
                          <th class="sorting">IS MAIN MENU</th>
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
            "ajax": "<?php echo site_url('menu/data'); ?>",
            "order": [[ 1, 'asc' ]],
            
            "columns": [
                {
                    "data": null,
                    "sClass": "text-center",
                    "orderable": false,
                    "width": "5px",
                },
                { "data": "nama_menu"},
                { "data": "link", 'sClass': 'text-center'},
                { "data": "icon", "sClass": "text-center", "width":"200px" },
                { "data": "is_main_menu", 'sClass': 'text-center'},
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