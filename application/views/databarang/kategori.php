<!-- Main content -->
<div class="content">
    <div class="container-fluid bg-secondary">

        <div class="row pt-3">
            <div class="col-md-5">
                <h3 class="">Kategori Barang Toko.Quilla</h3>

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <?php if ($this->session->userdata('role') == "admin") { ?>

                        <a href=" <?= base_url('kategori/tambahkategori') ?> ">
                            <button type="submit" name="submit" class="btn btn-outline-info"><i
                                    class="fas fa-plus-square mr-1 "></i>
                                <span class="text-dark font-weight-bold"> Kategori
                                    Barang</span>
                            </button>

                        </a>
                        <?php } ?>
                        <tr>
                        </tr>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body table-responsive  text-dark">


                        <?php $i = "A"; ?>
                        <?php foreach ($kategori as $kate) : ?>


                        <li class="list-group-item ">
                            <h6 class="text-info ml-4 font-weight-bold">
                                <h6><?= $i++ ?>.</h6> <?= $kate->kategori_barang; ?>
                                <?php if ($this->session->userdata('role') == "admin") { ?>
                                <button class="btn btn-outline-danger btn-sm float-right "
                                    onclick="deleteConfirm('<?= base_url() . 'kategori/delete/' . $kate->id_kategori ?>')"><i
                                        class="fa fa-trash-alt">hapus</i></button>
                                <a href="http://">
                                    <button class="btn btn-outline-info btn-sm float-right mr-2 "><i
                                            class="fas fa-edit">
                                            ubah</i></button>
                                </a>
                                <?php } ?>
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
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-3 d-flex justify-content-center">
                        <i class="fa  fa-exclamation" style="font-size: 70px; color:red;"></i>
                    </div>
                    <div class="col-9 pt-2">
                        <h5>Apakah anda yakin?</h5>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal"> Batal</button>
                <a id="btn-delete" class="btn btn-danger" href="#"> Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirm -->
<script type="text/javascript">
function deleteConfirm(url) {
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
}
</script>
<!-- /.content -->
<script>
<!-- /.content 
-->