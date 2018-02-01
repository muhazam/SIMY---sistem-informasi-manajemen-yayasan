

<section class="content-header">
  <h1><i class="fa fa-dashboard"></i>
    Dashboard
    <small>ASP Foundation</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<section class="content">
    <div class="col-lg-4">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h4><b>Event Yayasan</b></h4>

          <h4><i>Event Berikutnya</i></h4><br>
          	<div class="breadcrumb">
	          	<h4 style="color: black;"><?php echo ($event_global) ? $event_global->title : '-'; ?></h4>
				<h5 style="color: black;">
	                <?= ($event_global) ? date_format(date_create($event_global->end), 'd F Y') : '-'; ?>
				</h5>
				<h6 style="color: black;"><?php echo ($event_global) ? $event_global->description : '-'; ?></h6>
			</div>
        </div>
		
		<div class="icon">
			<i class="ion ion-calendar"></i>
		</div>
        <!-- <a href="#" class="small-box-footer">Detail info <i class="fa fa-arrow-circle-right"></i></a> -->
      </div>
    </div>
    
    <div class="col-lg-4">
      <!-- small box -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h4><b>Calendar Event SDIT</b></h4>

          <h4><i>Event Berikutnya</i></h4><br>
          	<div class="breadcrumb">
	          	<h4 style="color: black;"><?php echo ($event_SDIT) ? $event_SDIT->title : '-'; ?></h4>
				<h5 style="color: black;">
	                <?= ($event_SDIT) ? date_format(date_create($event_SDIT->start), 'd F Y') : '-'; ?>
				</h5>
				<h6 style="color: black;"><?php echo ($event_SDIT) ? $event_SDIT->description : '-'; ?></h6>
			</div>
        </div>
		
		<div class="icon">
			<i class="ion ion-calendar"></i>
		</div>
        <!-- <a href="#" class="small-box-footer">Detail info <i class="fa fa-arrow-circle-right"></i></a> -->
      </div>
    </div>
    
    <div class="col-lg-4">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h4><b>Calendar Event Ma'had</b></h4>

          <h4><i>Event Berikutnya</i></h4><br>
          	<div class="breadcrumb">
	          	<h4 style="color: black;"><?php echo ($event_mahad) ? $event_mahad->title : '-'; ?></h4>
				<h5 style="color: black;">
	                <?php echo ($event_mahad) ? date_format(date_create($event_mahad->start), 'd F Y') : '-'; ?>
				</h5>
				<h6 style="color: black;"><?php echo ($event_mahad) ? $event_mahad->description : '-'; ?></h6>
			</div>
        </div>
		
		<div class="icon">
			<i class="ion ion-calendar"></i>
		</div>
        <!-- <a href="#" class="small-box-footer">Detail info <i class="fa fa-arrow-circle-right"></i></a> -->
      </div>
    </div>
</section>
