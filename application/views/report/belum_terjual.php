<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="row pt-3">
            <div class="col-md-5">


            </div>
        </div>
        <div class="row pt-3 bg-secondary">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header  bg-info">
                        <h4 class="text-dark"> <strong>T</strong>oko <strong>Q</strong>uilla
                        </h4>
                        <p class="text-dark font-bold "> Jl.kadu Rt/RW 001/002 kec.Curug Tangerang</p>
                        <h5 class="text-dark text-center"> <strong class="">Laporan Brang Belum Terjual</strong></h5>
                        <div class="d-flex justify-content-center  float-right mb-2 mr-5 ">
                            <button class="btn btn-dark text-light btn-sm dropdown-toggle font-weight-bold"
                                type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export
                                Laporan</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-dark" href="<?= base_url('report/exportPdf') ?>"
                                    target="_blank"><i class="fas fa-file-pdf"></i>cetak pdf</a>

                            </div>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap " id="barang_blmterjual">
                            <thead>
                                <tr class="text-dark">
                                    <?php $i = 1; ?>
                                    <th>#</th>

                                    <th>Nama</th>

                                    <th>Merk</th>
                                    <th>Ukuran</th>
                                    <th>Warna</th>
                                    <th>Stok</th>

                                    <th>Harga Jual</th>

                                </tr>
                            </thead>
                            <tbody class="text-dark font-bold">
                                <?php foreach ($barang as $bar) : ?>
                                <tr>
                                    <td><?= $i++ ?>.</td>

                                    <td><?= $bar->nama_barang ?></td>


                                    <td><?= $bar->merk ?></td>
                                    <td><?= $bar->ukuran ?></td>
                                    <td><?= $bar->warna ?></td>

                                    <td><?= $bar->jml_barang ?></td>

                                    <td>Rp.<?= number_format($bar->harga_jual, 2, ',', '.') ?></td>


                                </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<script>
$(function() {

    $("#barang_blmterjual").DataTable({
        "responsive": true,
        "autoWidth": false,
        "info": true,
        "lengthChange": false,

        "paging": true,

    });
});
</script>
<!-- /.content -->