<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="row pt-3">
            <div class="col-md-5">
                <h3 class="">Laporan Barang Belum Terjual</h3>

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php if ($this->session->userdata('role') == "admin") { ?>
                        <a href=" <?= base_url('databarang/tambah_barang') ?> ">
                            <button type="submit" name="submit" class="btn btn-outline-info"><i
                                    class="fas fa-plus-square mr-1 "></i>
                                <span class="text-dark font-weight-bold">Insert Barang</span>
                            </button>

                        </a>
                        <?php } ?>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="barang">
                            <thead>
                                <tr class="text-dark">
                                    <?php $i = 1; ?>
                                    <th>#</th>

                                    <th>Nama</th>

                                    <th>Merk</th>
                                    <th>Ukuran</th>
                                    <th>Warna</th>
                                    <th>Stok</th>

                                    <th>Harga </th>

                                </tr>
                            </thead>
                            <tbody class="text-dark">
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

    $("#barang").DataTable({
        "responsive": true,
        "autoWidth": false,
        "info": true,
        "lengthChange": false,

        "paging": true,

    });
});
</script>
<!-- /.content -->