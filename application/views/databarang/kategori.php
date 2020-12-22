<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="row pt-3">
            <div class="col-md-5">
                <h3 class="">Kategori Barang cv.Quilla</h3>

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-warning">

                        <a href=" <?= base_url('databarang/tambahkategori') ?> ">
                            <button type="submit" name="submit" class="btn btn-outline-info"><i
                                    class="fas fa-plus-square mr-1 "></i>
                                <span class="text-dark font-weight-bold"> Kategori
                                    Barang</span>
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
                                    <th>Kategori Barang</th>
                                    <th>Satuan</th>
                                    <th>Tanggal input</th>

                                    <th class="text-center" style="">

                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kategori as $kate) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $kate->kategori_barang ?></td>
                                    <td><?= $kate->satuan ?></td>
                                    <td><?= $kate->tgl_input ?></td>



                                    <td>
                                        <a href="http://">
                                            <button class="badge bg-danger float-right mr-3   "><i
                                                    class="fas fa-trash-alt">hapus</i></button>
                                        </a>

                                        <a href="http://">
                                            <button class="badge bg-primary float-right mr-3 "><i
                                                    class="fas fa-edit">ubah</i></button>
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