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
                                <label>Tangal</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="date" name="awal" class="form-control datetimepicker-input"
                                        data-target="#reservationdate" />

                                </div>
                                <label>Sampai Tanggal </label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="date" name="ahir" class="form-control datetimepicker-input"
                                        data-target="#reservationdate" />

                                </div>
                            </div>

                            <button class="btn btn-outline-secondary font-bold float-right" type="submit"
                                name="cetak">Preview</button>

                    </div>
                    </form>
                    <!-- /.card-body -->
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->

        <div class="row">
            <div class="col">
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Penjualan</th>
                            <th>pendapatan</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php if ($_POST) { ?>
                        <?php foreach ($laporan as $lap) :  ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $lap->tgl_transaksi ?></td>
                            <td>Rp.<?= number_format($lap->sub_total)  ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2" class="text-danger"> <strong>Total pendapatan</strong> </td>
                            <td class="text-danger"> <strong>Rp.<?= number_format($total->total)  ?></strong> </td>
                        </tr>
                        <?php } else { ?>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<!-- /.content -->