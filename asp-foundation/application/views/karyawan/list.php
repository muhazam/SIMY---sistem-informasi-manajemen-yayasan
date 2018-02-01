<section class="content-header">
  <h1><li class="fa fa-user-secret"></li>
    Database Karyawan
    <small>Advanced Tables</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Database karyawan</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Data Profile Karyawan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          
          <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
          
            <div class="row">
              <div class="col-sm-12">
                
                <table id="table" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr>
                      <!-- <th >NO</th> -->
                      <th >FOTO</th>
                      <th >NAMA</th>
                      <th >EMAIL</th>
                      <th >NO HP</th>
                      <!-- <th class="sorting">AKSI</th> -->
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

  <script type="text/javascript">

      var save_method; //for save method string
      var table;

      $(document).ready(function() {
          //datatables
          table = $('#table').DataTable({
              // "responsive": true,
              "scrollY": 400,
              "processing": true, //Feature control the processing indicator.
              "serverSide": true, //Feature control DataTables' server-side processing mode.
              "order": [], //Initial no order.
              // Load data for the table's content from an Ajax source
              "ajax": {
                  "url": '<?php echo site_url('karyawan/data'); ?>',
                  "type": "POST"
              },
              //Set column definition initialisation properties.
              "columns": [
                  {"data": "foto", "sClass": "text-center"},
                  {"data": "nama_lengkap"},
                  {"data": "email"},
                  {"data": "no_hp"}
              ],

          });

      });
      
  </script>