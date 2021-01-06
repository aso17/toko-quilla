<!-- Main content -->
<div class="content">
    <div class="container-fluid bg-secondary">

        <div class="row pt-3">
            <div class="col-md-5">
                <h3 class="">Daftar Barang Toko.Quilla</h3>

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
                                    <th>kategori</th>
                                    <th>Merk</th>
                                    <th>Ukuran</th>
                                    <th>Warna</th>
                                    <th>Stok</th>

                                    <th>Harga </th>
                                    <?php if ($this->session->userdata('role') == "admin") { ?>
                                    <th class="text-center" style="">
                                        <i class="fas fa-directions bg-info"></i>
                                        aksi
                                    </th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                <?php foreach ($barang as $bar) : ?>
                                <tr>
                                    <td><?= $i++ ?>.</td>

                                    <td><?= $bar->nama_barang ?></td>
                                    <td><?= $bar->kategori_barang ?></td>

                                    <td><?= $bar->merk ?></td>
                                    <td><?= $bar->ukuran ?></td>
                                    <td><?= $bar->warna ?></td>

                                    <td><?= $bar->jml_barang ?></td>

                                    <td>Rp.<?= number_format($bar->harga_jual, 2, ',', '.') ?></td>

                                    <?php if ($this->session->userdata('role') == "admin") { ?>
                                    <td>
                                        <button class="btn btn-outline-danger btn-sm float-right "
                                            onclick="deleteConfirm('<?= base_url() . 'databarang/delete/' . $bar->kode_barang ?>')"><i
                                                class="fa fa-trash-alt"></i></button>
                                        <a href="http://">
                                            <button class="btn btn-outline-secondary btn-sm float-right ml-1 "><i
                                                    class="fas fa-eye">
                                                </i></button>
                                        </a>
                                        <a href="http://">
                                            <button class="btn btn-outline-info btn-sm float-right   "><i
                                                    class="fas fa-edit">
                                                </i></button>
                                        </a>
                                    </td>
                                    <?php } ?>

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

<!--Delete Confirmation-->
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