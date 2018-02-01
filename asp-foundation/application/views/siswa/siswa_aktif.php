<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-user">
    </i>
      Siswa Per Kelas
      <small>Modul Siswa Per Kelas &nbsp </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Modul Users</li>
  </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box box-success panel-success">
                <div class="panel-heading">
                    <i class="fa fa-external-link-square"></i> ROMBEL KELAS
                </div>
                <div class="panel panel-body">
                <?= form_open('siswa/data_by_rombel_excel'); ?>
                    <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                        <tr>
                            <td>PILIH ROMBEL</td>
                            <td><div onchange='loadSiswa()'><?php echo cmb_dinamis('rombel', 'tbl_rombel', 'nama_rombel', 'id_rombel',null,"id='rombel2' ") ?></div></td>
                        </tr>
                        <tr><td></td><td><button type="submit" title="Export Data To Excel" class="btn btn-danger btn-sm btn-flat"><i class="glyphicon glyphicon-save" aria-hidden="true" ></i> Export to Excel</button></td></tr>
                    </table>
                <?= form_close(); ?>
                </div>
            </div>
        </div>

        <div class="col-md-8">
          <div class="box box-success panel-success"> 
              <div class="panel-heading">
                  <i class="fa fa-external-link-square"></i> DATA SISWA
              </div>
              <div class="panel-body">
                  <div id="dataSiswa"></div>
     
              </div>
          </div>
        </div>
    </div>
</section>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/jquery.dataTables.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script> -->

<script src="template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="template/plugins/datatables/dataTables.bootstrap.min.js"></script>


<script type="text/javascript">
    $(document ).ready(function() {
        var rombel = $("#rombel2").val();
        loadSiswa(rombel);
    });
</script>

<script type="text/javascript">

    function loadSiswa(rombel){
        var rombel = $("#rombel2").val();
        // alert(rombel);
        $.ajax({
            type:'GET',
            url :'<?php echo base_url() ?>siswa/load_data_siswa_by_rombel',
            data:'rombel='+rombel,
            success:function(html){
                $("#dataSiswa").html(html);
            }
        })
    
    }

    rombel.on( 'order.dt search.dt', function () {
            rombel.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
</script>

