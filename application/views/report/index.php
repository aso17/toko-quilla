<!-- Main content -->
<div class="content">
    <div class="container-fluid ">
        <div class="row mx-auto ">
            <div class="col-md-12 mt-5">
                <div class="card card  card-outline">
                    <div class="card-header bg-secondary">
                        <h3 class=" text-light"> <strong>Laporan Penjualan</strong> </h3>
                    </div>
                    <div class="card-body bg-secondary">

                        <div class="row mb-5 pb-5">
                            <div class="col-md-6 bg-info pt-3 ml-3 pl-3 pr-3">
                                <form action="<?= base_url('report/hasil_report') ?>" method="post">
                                    <!-- Date -->
                                    <div class="form-group">
                                        <label for="reservationdate">Tangal</label>
                                        <div id="awal" class="input-group date" id="reservationdate"
                                            data-target-input="nearest">
                                            <input type="date" id="reservationdate" name="awal"
                                                class="form-control datetimepicker-input" data-target="#reservationdate"
                                                required />

                                        </div>
                                        <label for="reservationdat">Sampai Tanggal </label>
                                        <div class="input-group date" data-target-input="nearest">
                                            <input type="date" name="ahir" id="reservationdat"
                                                class="form-control datetimepicker-input" data-target="#reservationdate"
                                                required />

                                        </div>
                                    </div>

                                    <button class="btn btn-outline-dark font-bold float-right text-light mb-5"
                                        type="submit" name="cetak">Print Preview</button>

                                </form>



                                <div class="card-footer text-muted">
                                    <div class="alert alert-warning text-center mt-5 pt-" role="alert">
                                        info : Isilah data Dengan Benar!
                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>

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