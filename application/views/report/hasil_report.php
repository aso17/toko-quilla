<div class="content">
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-10 mt-3">
                <div class="card">


                    <div class="row justify-center">
                        <div class="col-md-12">
                            <h5> <strong class="text-info ml-3">Hasil Laporan Penjualan</strong></h5>
                            <div class="form-group">
                                <label class="ml-3">Tangal</label>
                                <div>
                                    <p class="ml-3"><?= $this->input->post('awal') ?></p>

                                </div>
                                <label class="ml-3">Sampai Tanggal </label>
                                <div>
                                    <p class="ml-3"><?= $this->input->post('ahir') ?></p>

                                </div>
                            </div>
                        </div>


                    </div>


                    <table class="table" id="report" border="1">
                        <thead class="bg-secondary">

                            <tr>
                                <th style="width: 3%;">No</th>
                                <th style="width: 10px;">Tanggal Penjualan</th>
                                <th style="width: 7%;">pendapatan</th>


                            </tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php if ($_POST) { ?>
                            <?php foreach ($laporan as $lap) :  ?>
                            <tr>
                                <td><?= $i++ ?>.</td>
                                <td><?= $lap->tgl_transaksi ?></td>
                                <td>Rp.<?= number_format($lap->sub_total)  ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="2" class="text-danger">
                                    <h4> <strong>Total pendapatan</strong></h4>
                                </td>
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

</div>
<!-- /.row -->
</div><!-- /.container-fluid -->

<!-- /.content -->