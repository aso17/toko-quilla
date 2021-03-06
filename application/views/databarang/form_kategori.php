<!-- right column -->
<div class="col-md-10 pt-3 pl-3">
    <!-- general form elements disabled -->
    <div class="card card-secondary">
        <div class="card-header">

            <h5 class="">Form <?= $judul ?></h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?= form_open_multipart($judul == 'ubah kategori' ? 'kategori/editkategori' : '') ?>

            <?php if ($judul == 'ubah kategori') {
            ?>
            <input type="hidden" value="<?= $kategory->id_kategori ?>" name="id_kategori">
            <?php } ?>

            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">

            <div class="row">
                <div class="col-sm-7">
                    <div class="form-group">
                        <label>*Kategori Barang</label>
                        <input type="text" value="<?php if ($judul == "ubah kategori") {
                                                        echo $kategory->kategori_barang;
                                                    } ?>"
                            class="form-control <?= form_error('kategori') ? 'is-invalid' : '' ?> " name="kategori"
                            autocomplete="off">
                        <div class="invalid-feedback">
                            <?= form_error('kategori') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <label>*Satuan</label>
                        <input type="text" value="<?php if ($judul == "ubah kategori") {
                                                        echo $kategory->satuan;
                                                    } ?>"
                            class="form-control <?= form_error('satuan') ? 'is-invalid' : '' ?> " name="satuan"
                            autocomplete="off">
                        <div class="invalid-feedback">
                            <?= form_error('satuan') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <label>*Tanggal input</label>
                        <input type="date" value="<?php if ($judul == "ubah kategori") {
                                                        echo $kategory->tgl_tambah;
                                                    } ?>"
                            class="form-control <?= form_error('tgl') ? 'is-invalid' : '' ?> " name="tgl"
                            autocomplete="off">
                        <div class="invalid-feedback">
                            <?= form_error('tgl') ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-7">
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-outline-dark"><i class="fas fa-save "></i>
                            <span
                                class="text-info font-weight-bold"><?= $judul == "ubah kategori" ? 'Update' : 'Simpan' ?></span>
                        </button>
                        <a href="<?= base_url('kategori') ?>"> <button type="button"
                                class="btn btn-outline-dark float-right"><span
                                    class="text-danger font-weight-bold">Kembali</span></button></a>
                    </div>
                </div>
            </div>

        </div>
    </div>





</div>
<?= form_close(); ?>
</div>
</div>