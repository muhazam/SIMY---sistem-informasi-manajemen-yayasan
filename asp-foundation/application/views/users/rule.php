<section class="content-header">
  <h1>
    <i class="glyphicon glyphicon-lock">
    </i>
      Management Rule Users
      <small>&nbsp <?php echo anchor('users', ' ', array('class' => 'fa fa-reply btn btn-success btn-xs btn-flat', 'title' => 'back')); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Rule Users</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-4">
        <div class="box box-success panel-success">
            <div class="panel-heading">
                <i class="fa fa-external-link-square"></i> LEVEL USER
            </div>
            <div class="panel panel-body">
                <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                    <tr>
                      <td width='50px' class="text-center" align="center"><b>PILIH LEVEL</b></td>
                      <td><b><?php echo cmb_dinamis('level_user', 'tbl_level_user', 'nama_level', 'id_level_user',null, "id='level_user' onchange='loadData()'")  ?></b></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-8">
      <div class="box box-success panel-success"> 
          <div class="panel-heading">
              <i class="fa fa-external-link-square"></i> HAK AKSES MODULE
          </div>
          <div class="panel-body">
              <div id="tabel"></div>
 
          </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  $(document ).ready(function() {
    loadData();
  });
</script>
 
<script type="text/javascript">
  function loadData(){
    var level_user = $("#level_user").val();
    $.ajax({
        type:'GET',
        url :'<?php echo base_url() ?>rule/data',
        data:'level_user='+level_user,
        success:function(html){
          $("#tabel").html(html);
        }
    })
  }

  function addRule(id_modul) {
    var level_user = $('#level_user').val();
    $.ajax({
        type:'GET',
        url :'<?php echo base_url() ?>rule/add',
        data:'level_user='+level_user+'&id_menu='+id_modul,
        success:function(html){
          alert('Modul telah diberi akses!');
        }
    })
  }
</script> 