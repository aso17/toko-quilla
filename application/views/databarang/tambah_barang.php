<!-- right column -->
<div class="col-md-10 pt-3 pl-3">
    <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h5 class="">Form Tambah Barang</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?= form_open_multipart('kandidat/proses') ?>

            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">

            <div class="row">
                <div class="col-sm-7">
                    <div class="form-group">
                        <label>*Nama barang</label>
                        <input type="text" class="form-control <?= form_error('nm_barang') ? 'is-invalid' : '' ?> "
                            name="nm_barang" autocomplete="off">
                        <div class="invalid-feedback">
                            <?= form_error('nm_barang') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7">

                    <div class="form-group ">
                        <label>*kategori Barang</label>
                        <select class="form-control  <?= form_error('kategori') ? 'is-invalid' : '' ?> "
                            name="kategori">
                            <option>pilih</option>
                            <option value="Calon Ketua RW">Calon Ketua RW</option>


                        </select>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-7">
                    <!-- text input -->
                    <div class="form-group">
                        <label>*Ukuran</label>
                        <input type="text" class="form-control <?= form_error('ukuran') ? 'is-invalid' : '' ?>"
                            name="ukuran" autocomplete="off">
                        <div class="invalid-feedback">
                            <?= form_error('ukuran') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <label>*Warna</label>
                        <input type="date" class="form-control <?= form_error('warna') ? 'is-invalid' : '' ?>"
                            name="warna">
                        <div class="invalid-feedback">
                            <?= form_error('warna') ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-7">
                    <!-- select -->
                    <div class="form-group">
                        <label>*Jumlah Barang</label>
                        <input type="text" class="form-control <?= form_error('jml_barang') ? 'is-invalid' : '' ?>"
                            name="jml_barang">
                        <div class="invalid-feedback">
                            <?= form_error('jml_barang') ?>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        <?= form_error('jml_barang') ?>
                    </div>
                </div>
                <div class="col-sm-7">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>*Harga Satuan</label>
                        <input type="text" class="form-control <?= form_error('harga') ? 'is-invalid' : '' ?>"
                            name="harga">
                        <div class="invalid-feedback">
                            <?= form_error('harga') ?>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        <?= form_error('harga') ?>
                    </div>
                </div>
            </div>

            <div class="row">

            </div>
            <div class="col-sm-7">
                <div class="form-group">
                    <label>*Tanggal Input</label>
                    <input type="date" class="form-control <?= form_error('pendidikan') ? 'is-invalid' : '' ?>"
                        name="pendidikan" autocomplete="off">
                    <div class="invalid-feedback">
                        <?= form_error('pendidikan') ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-info"><i
                            class="fas fa-paper-plane"></i>Save</button>
                    <a href="<?= base_url('') ?>"> <button type="button"
                            class="btn btn-danger float-right">Cancel</button></a>
                </div>
            </div>
        </div>

    </div>
</div>





</div>
<?= form_close(); ?>
</div>
</div>