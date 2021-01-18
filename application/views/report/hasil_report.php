<div class="content">
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12 mt-3">
                <div class="card">

                    <div class="row justify-center mt-3  mx-3">

                        <div class="col-md-12">



                            <h4 class="text-info"> <strong>T</strong>oko <strong>Q</strong>uilla
                            </h4>
                            <p class="text-info font-bold "> Jl.kadu Rt/RW 001/002 kec.Curug Tangerang</p>
                            <h4 class="text-info text-center"> <strong class="">Hasil Laporan Penjualan</strong></h4>

                            <div class="form-group text-center">
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
                                    aria-expanded="false">Export Laporan</button>
                                <div class="dropdown-menu bg-dark">
                                    <a class="dropdown-item text-dark "
                                        href="<?= base_url('report/cetak_pdf/') . $tgl_awal . '/' . $tgl_ahir ?>"
                                        target="_blank"><i class="fas fa-file-pdf "></i> Cetak pdf</a>
                                    <!-- <a class="dropdown-item text-success"
                                        href="<?php //base_url('Laporan/cetak_excel/') 
                                                ?>"><i
                                            class="fas fa-file-excel"></i>Cetak Exel</a> -->
                                </div>
                            </div>
                        </div>


                    </div>


                    <table class="table pl-3 pr-3" id="report" border="1">
                        <thead class="bg-secondary" border="1">

                            <tr>

                                <th style="">Kode transaksi</th>
                                <th style="">Kode barang</th>
                                <th style="">Nama barang</th>
                                <th style="">Tanggal Penjualan</th>
                                <th style="">pendapatan</th>


                            </tr>
                            <tr></tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php if ($_POST) { ?>
                            <?php foreach ($laporan as $lap) :  ?>
                            <tr>

                                <td> <?= $lap->id_transaksi ?></td>
                                <td> <?= $lap->kode_barang ?></td>
                                <td> <?= $lap->nama_barang ?></td>
                                <td><?= date($lap->tgl_input) ?></td>
                                <td>Rp.<?= number_format($lap->total_harga)  ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4" class="text-danger">
                                    <h4> <strong>Total pendapatan</strong></h4>
                                </td>
                                <td class="text-danger"> <strong>Rp.
                                        <?= number_format($total->total)  ?>
                                    </strong> </td>
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