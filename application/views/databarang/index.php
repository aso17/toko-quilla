<!-- Main content -->
<div class="content">
    <div class="container-fluid">

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

                                    <th>Harga jual</th>
                                    <?php if ($this->session->userdata('role') == "admin") { ?>
                                    <th class="text-center">
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

                                        <button class="btn btn-outline-secondary btn-sm float-right ml-1 mr-1 "
                                            id=detail-barang data-toggle="modal" data-target="#modal-detail"
                                            data-kode="<?= $bar->kode_barang ?>" data-nama="<?= $bar->nama_barang ?>"
                                            data-katego="<?= $bar->kategori_barang ?>" data-ukuran="<?= $bar->ukuran ?>"
                                            data-merk="<?= $bar->merk ?>" data-stok="<?= $bar->jml_barang ?>"
                                            data-hrg_satuan="Rp.<?= number_format($bar->harga_satuan)  ?>"
                                            data-hrg_jual="Rp.<?= number_format($bar->harga_jual)  ?>"
                                            data-tgl="<?= $bar->tgl_creat ?>"><i class="fas fa-eye">
                                            </i></button>

                                        <a href="<?= base_url('databarang/edit/') . $bar->kode_barang ?>">
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
            <div class="modal-body bg-info">
                <div class="row">
                    <div class="col-3 d-flex justify-content-center">
                        <i class="fa  fa-exclamation" style="font-size: 70px; color:red;"></i>
                    </div>
                    <div class="col-9 pt-2">
                        <h5>Apakah anda yakin?</h5>

                    </div>
                </div>

            </div>
            <div class="modal-footer bg-info">
                <button class="btn btn-default" type="button" data-dismiss="modal"> Batal</button>
                <a id="btn-delete" class="btn btn-danger" href="#"> Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirm -->
<div class="modal fade" id="modal-detail" role="dialog">
    <div class="modal-dialog sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close btn btn-danger" data-dismiss="modal">&times; close</button>
            </div>
            <div class="modal-body">
                <h4 class="modal-title">Detail Barang</h4>
                <div class="card">


                </div>
                <ul class="list-group">
                    <li class="ml-3">kode Barang</li>
                    <li class="list-group-item mt-0 bg-secondary">
                        <p id="kode"></p>
                    </li>
                    <li class="ml-3 ">nama Barang</li>
                    <li class="list-group-item bg-secondary">
                        <p id="nm"></p>

                    </li>
                    <li class="ml-3 ">Kategori</li>
                    <li class="list-group-item bg-secondary">
                        <p id="categ"></p>
                    </li>
                    <li class="ml-3 ">Ukuran</li>
                    <li class="list-group-item bg-secondary">
                        <p id="s_ize"></p>
                    </li>
                    <li class="ml-3 ">Jumlah Stok</li>
                    <li class="list-group-item bg-secondary">
                        <p id="s_tok"></p>
                    </li>
                    <li class="ml-3 ">Harga satuan</li>
                    <li class="list-group-item bg-secondary">
                        <p id="satuan_harga"></p>
                    </li>
                    <li class="ml-3 ">Harga jual</li>
                    <li class="list-group-item bg-secondary">
                        <p id="j_ual"></p>
                    </li>
                    <li class="ml-3 ">Tanggal input</li>
                    <li class="list-group-item bg-secondary">
                        <p id="tgl_input"></p>
                    </li>
                </ul>


            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $(document).on('click', '#detail-barang', function() {
        const kd = $(this).data('kode');
        const nm = $(this).data('nama');
        const kate = $(this).data('katego');
        const size = $(this).data('ukuran');
        const st = $(this).data('stok');
        const h_satuan = $(this).data('hrg_satuan');
        const jual = $(this).data('hrg_jual');
        const inputan = $(this).data('tgl');

        $('#kode').text(kd);

        $('#nm').text(nm);
        //$('#tgl').text(tgllahir);
        $('#categ').text(kate);
        $('#s_ize').text(size);
        $('#s_tok').text(st);
        $('#satuan_harga').text(h_satuan);
        $('#j_ual').text(jual);
        $('#tgl_input').text(inputan);


    })
})
</script>
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
        "autoWidth": true,
        "info": true,
        "lengthChange":false,

        "paging": true,

    });
});
</script>
<!-- /.content -->