<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 mt-3">
                <div class="card card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title text-info"> <strong>Laporan Penjualan</strong> </h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('report/hasil_report') ?>" method="post">
                            <!-- Date -->
                            <div class="form-group">
                                <label for="reservationdate">Tangal</label>
                                <div id="awal" class="input-group date" id="reservationdate"
                                    data-target-input="nearest">
                                    <input type="date" name="awal" class="form-control datetimepicker-input"
                                        data-target="#reservationdate" />

                                </div>
                                <label>Sampai Tanggal </label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="date" name="ahir" class="form-control datetimepicker-input"
                                        data-target="#reservationdate" />

                                </div>
                            </div>

                            <button class="btn btn-outline-dark font-bold float-right text-info" type="submit"
                                name="cetak">Print Preview</button>

                    </div>
                    </form>
                    <!-- /.card-body -->
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->


    </div>
</div>

<script>
$(function() {

    $("#report").DataTable({
        "responsive": true,
        "autoWidth": false,
        "info": false,
        "lengthChange": false,
        "lengthMenu": [
            [5, 10, 50, -1],
            [5, 10, 50, "All"]
        ],
        "paging": true,

    });
});
</script>
<!-- /.content -->