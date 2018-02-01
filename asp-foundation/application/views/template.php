<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ASP FOUNDATION</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <base href="<?= base_url(); ?>"/>
  <link rel="stylesheet" href="template/plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="template/font-awesome-4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="template/ionicons-2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="assets/plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="assets/plugins/morris/morris.css">
  <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="assets/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    
  <script src="template/plugins/jQuery/jquery.min.js"></script>
  <script src="script/fullcalendar/lib/moment.min.js"></script>
  <script src="template/plugins/fullcalendar/fullcalendar.min.js"></script>
  <script src="script/fullcalendar/gcal.js"></script>


  
  <script type="text/javascript">
    var baseURL = "<?= base_url(); ?>";
  </script>

</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="welcome" class="logo">
      <span class="logo-mini"><b>ASP</b></span>
      <span class="logo-lg"><b class="text-aqua">ASP </b><b> FOUNDATION</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav"> 
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url().'uploads/foto_user/'.$this->session->userdata('foto')?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama_lengkap'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header" style="background: #222d32;">
                <img src="<?php echo base_url().'uploads/foto_user/'.$this->session->userdata('foto')?>"  class="img-circle" alt="User Image">
                <p>
                  <?php echo $this->session->userdata('nama_lengkap'); ?>
                  <small><b>
                    <?php echo $this->session->userdata('nama_level'); ?>
                  </b></small>
                </p>
              </li>
              
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile" class="btn btn-default btn-flat">PROFILE</a>
                </div>
                <div class="pull-right">
                  <?php echo anchor('auth/logout', 'LOG OUT', 'class="btn btn-default btn-flat"'); ?>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar" style="min-height: 0px !important;">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
<!--           <img src="<?php echo base_url();?>assets/dist/img/foundation.png" class="img-circle" alt="User Image"> -->
          <img src="<?php echo base_url().'uploads/foto_user/'.$this->session->userdata('foto')?>" class="img-circle user-image" alt="User Image">

        </div>
        <div class="pull-left info">    
          <p><?php echo $this->session->userdata('nama_level'); ?></p>
          <a href="welcome"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu">
        <li class="header">MENU NAVIGATION</li>
        <li><a href="welcome"><i class="fa fa-dashboard"></i> <span> DASHBOARD </span></a></li>
        
        <?php 
        $id_level_user = $this->session->userdata('id_level_user');
        $sql_menu = "SELECT * FROM table_menu WHERE id in(select id_menu from tbl_user_rule where id_level_user=$id_level_user) and is_main_menu=0";
        $main_menu = $this->db->query($sql_menu)->result();
        foreach ($main_menu as $main) {
          // cek sub menu
          $submenu = $this->db->get_where('table_menu', array('is_main_menu' => $main->id));
          if ($submenu->num_rows() > 0 ) {
            // tampilkan sub menu
            echo "<li>
                  <a href='javascript:void(0)'>
                    <i class ='".$main->icon."'></i>
                    <span class='title'> ".strtoupper($main->nama_menu)." </span>
                    <span class='pull-right-container'>
                      <i class='fa fa-angle-left pull-right'></i>
                    </span>
                  </a>
                  <ul class='treeview-menu'>";
            foreach ($submenu->result() as $sub) {
              echo "<li>".anchor($sub->link, "<i class='".$sub->icon."'></i>" .$sub->nama_menu)."</li>";
            }
            echo" </ul>
                </li>";
          }else {
            // tampilkan main menu
            echo "<li>".anchor($main->link, "<i class='".$main->icon."'></i> "."<span>".$main->nama_menu."</span>")."</li>";
          }
        }
        ?>

        <li class="header">END MENU</li>
        <li><a href="auth/logout"><i class="fa fa-sign-out"></i> <span> LOG OUT </span></a></li>

      </ul>
    </section>
  </aside>

  <div class="content-wrapper">
  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function() {
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/59dee57fc28eca75e4625919/default';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
    })();
  </script>
  <!--End of Tawk.to Script-->
  	<?php echo $contents; ?>
  
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>
        Developed by | <a href="https://www.linkedin.com/in/muhammad-azzam-alqorni-b4260611a/">Muhazam</a>
      </b>
      
    </div>
    <strong>
      Copyright &copy; 2017 <a href="http://www.assunnahpasuruan.com/">ASP FOUNDATION</a>  <b class="text-success">Version </b> <strong> | 1.0</strong>
    </strong>
  </footer>

</div>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<base src="<?= base_url(); ?>"/>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="template/plugins/raphael/raphael-min.js"></script>
<script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="assets/plugins/knob/jquery.knob.js"></script>
<script src="template/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="assets/plugins/fastclick/fastclick.js"></script>
<script src="assets/dist/js/app.min.js"></script>
<script src="assets/dist/js/demo.js"></script>

</body>
</html>