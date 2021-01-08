<div class="content">
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-10 mt-3">
                <div class="card">


                    <div class="row justify-center mt-3 text-center mx-3">
                        <div class="col-md-12">
                            <h4 class="text-info text-center"> <strong class="">Hasil Laporan Penjualan</strong>
                            </h4>
                            <div class="form-group">
                                <label class=" text-info">Tangal</label>
                                <div>
                                    <p class=" text-info"><?= $this->input->post('awal') ?></p>

                                </div>
                                <label class=" text-info">Sampai Dengan Tanggal </label>
                                <div>
                                    <p class=" text-info"><?= $this->input->post('ahir') ?></p>

                                </div>
                            </div>
                            <div class="d-flex justify-content-center  float-right mb-2 mr-5 ">
                                <button class="btn btn-outline-info text-dark btn-sm dropdown-toggle font-weight-bold"
                                    type="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Cetak Laporan</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item text-dark" href="<?= base_url('Laporan/cetak_pdf/') ?>"
                                        target="_blank"><i class="fas fa-file-pdf"></i>cetak pdf</a>
                                    <a class="dropdown-item text-success"
                                        href="<?= base_url('Laporan/cetak_excel/') ?>"><i
                                            class="fas fa-file-excel"></i>Cetak Exel</a>
                                </div>
                            </div>
                        </div>


                    </div>


                    <table class="table pl-3 pr-3" id="report" border="1">
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
                                <td> Tanggal Penjualan <?= $lap->tgl_transaksi ?></td>
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


    <!-- /.row -->
</div>
<!-- /.container-fluid -->

<!-- /.content -->