<section class="content-header">
  <h1>
    <i class="fa fa-mortar-board">
    </i>
      Database Mata Pelajaran Ma'had Assunnah
      <small>Advanced Tables</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Database Mata Pelajaran Ma'had Assunnah</li>
  </ol>
</section>

<section class="content">
    <?php echo form_open('mapel/data_mapel_excel'); ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header breadcrumb">
              <li class="box-title">Data Mata Pelajaran Ma'had Assunnah</li>&nbsp &nbsp 
              <li>  
                <?php 
                    echo anchor('mapel/add',  '<i class="fa fa-plus-circle" aria-hidden="true"></i>', 'class="btn btn-xs btn-success btn-flat" title="Tambah Data"');
                ?>&nbsp
              </li> 
              <li><button type="submit" title="Export Data To Excel" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-save" aria-hidden="true" ></i> Excel</button></li>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              
                <div class="row">
                  <div class="col-sm-12">

                    <table id="mytable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
                      <thead>
                        <tr >
                          <th>NO</th>
                          <th class="text-center">MATA PELAJARAN</th>
                          <th class="sorting">JUDUL KITAB</th>
                          <th class="sorting">PENGAJAR</th>
                          <th class="sorting">TARGET</th>
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
    <?php echo "</form>"; ?>
      <!-- /.row -->
    </section>

<script src="template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="template/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        var t = $('#mytable').DataTable( {
            "responsive": true,
            "scrollX": true,
            "ajax": "<?php echo site_url('mapel/data'); ?>",
            "order": [[ 1, 'asc' ]],
            
            "columns": [
                {
                    "data": null,
                    "sClass": "text-center",
                    "orderable": false,
                    "width": "1%",
                },
                { "data": "nama_mapel", "sClass": "text-center", 'width': '120px'},
                { "data": "judul_kitab"},
                { "data": "nama", "sClass": "text-center", 'width': '190px'},
                { "data": "target"},
                { "data": "aksi", "orderable": false, "sClass": "text-center", "width": '50px'}
            ]
        } );
           
        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );
</script>