<section class="content-header">
  <h1>
    <i class="fa fa-mortar-board">
    </i>
      Database Santri
      <small>Advanced Tables</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Database Santri</li>
  </ol>
</section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header breadcrumb">
              <li class="box-title">Data Profile Santri</li>&nbsp &nbsp 
              <li>  
                <?php 
                    echo anchor('santri/add', '<i class="fa fa-plus-circle" aria-hidden="true"></i>', 'class="btn btn-xs btn-success btn-flat" title="Tambah Data"');
                ?>&nbsp
              </li>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              
                <div class="row">
                  <div class="col-sm-12">
                    
                    <table id="mytable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
                      <thead>
                        <tr >
                          <th >NO</th>
                          <th >FOTO</th>
                          <th class="sorting">NIM</th>
                          <th class="sorting">NAMA</th>
                          <th class="sorting">TEMPAT LAHIR</th>
                          <th class="sorting">TANGGAL LAHIR</th>
                          <th class="sorting">ALAMAT</th>
                          <th class="text-center">AKSI</th>
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
            "ajax": "<?php echo site_url('santri/data'); ?>",
            "order": [[ 1, 'asc' ]],
            
            "columns": [
                {
                    "data": null,
                    "sClass": "text-center",
                    "orderable": true,
                    "width": "1%",
                },
                { "data": "foto", "orderable": false, "sClass": "text-center", "width": "3%"},
                {
                    "data": "nim",
                    "sClass": "text-center",
                    "width": "50px"
                },
                { "data": "nama"},
                { "data": "tempat_lahir", 'width': '100px', 'sClass': 'text-center'},
                { "data": "tanggal_lahir", "sClass": "text-center", 'width': '100px'},
                { "data": "alamat", 'width': '200px'},
                { "data": "aksi", "orderable": false, "sClass": "text-center"}
            ]
        } );
           
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );
</script>