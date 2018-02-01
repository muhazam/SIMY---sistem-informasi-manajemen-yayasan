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
    <div class="container">
    <h2>City Country - Harviacode</h2>
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4">
                <?php echo anchor(site_url('world/create'), 'Create', 'class="btn btn-primary"'); ?>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-4 text-right">
                <?php echo anchor(site_url('world/excel'), 'Excel', 'class="btn btn-primary"'); ?>
        </div>
    </div>
    <table class="table table-bordered table-striped" id="mytable">
        <thead>
            <tr>
                <th width="80px">No</th>
                <th>Nama Kota</th>
                <th>Populasi</th>
                <th>Nama Negara</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
    </div>
</section>

<script src="<?php echo base_url('template/plugins/jQuery/jquery.min.js') ?>" ></script>
        <script src="<?php echo base_url('template/plugins/datatables/jquery.dataTables.js') ?>" ></script>
        <script src="<?php echo base_url('template/plugins/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "world/json", "type": "POST"},
                    columns: [
                        {
                            "data": "ID",
                            "orderable": false
                        },
                        {"data": "namakota"},
                        {"data": "populasi"},
                        {"data": "namanegara"},
                        {"data": "view"}
                    ],
                    order: [[1, 'asc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>

