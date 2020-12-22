<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="row pt-3">
            <div class="col-md-5">
                <h3 class="">Daftar sepatu cv.Quilla</h3>

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-warning">

                        <a href=" <?= base_url('databarang/tambah_barang') ?> ">
                            <button type="submit" name="submit" class="btn btn-outline-info"><i
                                    class="fas fa-plus-square mr-1 "></i>
                                <span class="text-dark font-weight-bold">Data Barang</span>
                            </button>

                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="barang">
                            <thead>
                                <tr>
                                    <?php $i = 1; ?>
                                    <th>No</th>
                                    <th>Nama barang</th>
                                    <th>kategori</th>
                                    <th>Merek</th>
                                    <th>Ukuran</th>
                                    <th>Warna</th>
                                    <th>Stok</th>

                                    <th>Harga </th>

                                    <th class="text-center" style="">
                                        <i class="fas fa-directions bg-info"></i>
                                        aksi
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($barang as $bar) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $bar->nama_barang ?></td>
                                    <td><?= $bar->kategori_barang ?></td>

                                    <td><?= $bar->merk ?></td>
                                    <td><?= $bar->ukuran ?></td>
                                    <td><?= $bar->warna ?></td>

                                    <td><?= $bar->jml_barang ?></td>

                                    <td>Rp.<?= number_format($bar->harga_jual, 2, ',', '.') ?></td>

                                    <td>
                                        <a href="http://">
                                            <button class="badge bg-danger float-right "><i class="fas fa-trash-alt">
                                                    hapus</i></button>
                                        </a>
                                        <a href="http://">
                                            <button class="badge bg-info float-right mr-2"><i class="fas fa-eye">
                                                    detail</i></button>
                                        </a>
                                        <a href="http://">
                                            <button class="badge bg-primary float-right mr-2 "><i class="fas fa-edit">
                                                    ubah</i></button>
                                        </a>
                                    </td>

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
        "autoWidth": true,
        "info": true,
        "lengthChange": false,

        "paging": true,

    });
});
</script>
<!-- /.content -->