<section class="content-header">
  <h1>
  <i class="glyphicon glyphicon-calendar"></i>
    Calendar Events SDIT
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="welcome"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Calendar Events SDIT</li>
  </ol>
</section>


 <section class="content">
    <div class="row">
      
      <!-- /.col -->
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-body no-padding">
            <!-- THE CALENDAR -->
            <div id="calendar" class="col-xs-12">
              
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /. box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Calendar Event</h4>
      </div>
      <div class="modal-body">
      <?php echo form_open(site_url("calendar_SDIT/add_event"), array("class" => "form-horizontal")) ?>
      <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Nama Event</label>
                <div class="col-md-8 ui-front">
                    <input type="text" class="form-control" name="name" value="">
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Deskripsi Event</label>
                <div class="col-md-8 ui-front">
                    <!-- <input type="text" class="form-control" name="description"> -->
                    <textarea name="description" class="form-control" cols="35" rows="5"></textarea>
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading" >Tanggal Mulai Event</label>
                <div class="col-md-8 input-append date form_datetime">
                    <input class="form-control" type="text" value="" name="start_date" id="datetimepicker4">
                    <span class="add-on"><i class="icon-th"></i></span>
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading" >Tanggal Akhir Event</label>
                <div class="col-md-8 input-append date form_datetime">
                    <input class="form-control" type="text" value="" name="end_date" id="datetimepicker4">
                    <span class="add-on"><i class="icon-th"></i></span>
                </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Add Event">
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Calendar Event</h4>
      </div>
      <div class="modal-body">
      <?php echo form_open(site_url("calendar_SDIT/edit_event"), array("class" => "form-horizontal")) ?>
      <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Nama Event</label>
                <div class="col-md-8 ui-front">
                    <input type="text" class="form-control" name="name" value="" id="name">
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Deskripsi Event</label>
                <div class="col-md-8 ui-front">
                    <!-- <input type="text" class="form-control" name="description" id="description"> -->
                    <textarea name="description" class="form-control" id="description" cols="35" rows="5"></textarea>
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Tanggal Mulai Event</label>
                <div class="col-md-8 input-append date form_datetime">
                    <!-- <input type="text" class="form-control" name="start_date" id="start_date" > -->
                    <input class="form-control" type="text" value="" name="start_date" id="start_date">
                    <span class="add-on"><i class="icon-th"></i></span>
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Tanggal Akhir Event</label>
                <div class="col-md-8 input-append date form_datetime">
                    <!-- <input type="text" class="form-control" name="end_date" id="end_date" > -->
                    <input class="form-control" type="text" value="" name="end_date" id="end_date">
                    <span class="add-on"><i class="icon-th"></i></span>
                </div>
        </div>
        <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading">Hapus Event</label>
                    <div class="col-md-8">
                        <input type="checkbox" name="delete" value="1">
                    </div>
            </div>
            <input type="hidden" name="eventid" id="event_id" value="0" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Update Event">
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $(".form_datetime").datetimepicker({
        format: "yyyy/mm/dd HH:ii"
    });


    var date_last_clicked = null;

    $('#calendar').fullCalendar({
        eventSources: [
           {
           events: function(start, end, timezone, callback) {
                $.ajax({
                    url: '<?php echo base_url() ?>calendar_SDIT/get_events',
                    dataType: 'json',
                    data: {
                        // our hypothetical feed requires UNIX timestamps
                        start: start.unix(),
                        end: end.unix()
                    },
                    success: function(msg) {
                        var events = msg.events;
                        callback(events);
                    }
                });
              }
            },
        ],
        dayClick: function(date, jsEvent, view) {
            date_last_clicked = $(this);
            $(this).css('background-color', '#bed7f3');
            $('#addModal').modal();
        },
       eventClick: function(event, jsEvent, view) {
          $('#name').val(event.title);
          $('#description').val(event.description);
          $('#start_date').val(moment(event.start).format('YYYY/MM/DD HH:mm'));
          if(event.end) {
            $('#end_date').val(moment(event.end).format('YYYY/MM/DD HH:mm'));
          } else {
            $('#end_date').val(moment(event.start).format('YYYY/MM/DD HH:mm'));
          }
          $('#event_id').val(event.id);
          $('#editModal').modal();
       },
    });
});
</script>