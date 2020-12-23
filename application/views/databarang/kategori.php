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

                        <?php foreach ($kategori as $kate) : ?>


                        <li class="list-group-item ">
                            <h6 class="text-info ml-4 font-weight-bold"><?= $kate->kategori_barang; ?>
                                <a href="http://">
                                    <button class="badge bg-danger float-right mr"><i
                                            class="fas fa-trash-alt">hapus</i></button>
                                </a>
                                <a href="http://">
                                    <button class="badge bg-primary float-right mr-2 "><i class="fas fa-edit">
                                            ubah</i></button>
                                </a>
                            </h6>

                        </li>

                        <?php endforeach; ?>

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

<!-- /.content -->