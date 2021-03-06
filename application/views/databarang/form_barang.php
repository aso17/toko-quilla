<!-- Main content -->
<div class="content">
    <div class="container-fluid bg-secondary">

        <div class="row pt-3">

            <!-- right column -->
            <div class="col-md-10 pt-3 pl-3">
                <!-- general form elements disabled -->
                <div class="card card text-dark">
                    <div class="card-header bg-dark">
                        <h5 class="">Form <?= $judul ?></h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?= form_open_multipart($judul == 'Ubah Data Barang' ? 'databarang/editbarang' : '') ?>

                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                            value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">

                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label>*Kode Barang</label>
                                    <input type="text" value="<?php if ($judul == "Ubah Data Barang") {
                                                                    echo $barang['kode_barang'];
                                                                } ?>"
                                        class="form-control <?= form_error('kd_barang') ? 'is-invalid' : '' ?> "
                                        name="kd_barang" autocomplete="off">

                                    <div class="invalid-feedback">
                                        <?= form_error('kd_barang') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label>*Nama barang</label>
                                    <input type="text" value="<?php if ($judul == "Ubah Data Barang") {
                                                                    echo $barang['nama_barang'];
                                                                } ?>"
                                        class=" form-control <?= form_error('nm_barang') ? 'is-invalid' : '' ?> "
                                        name=" nm_barang" autocomplete="off">
                                    <div class=" invalid-feedback">
                                        <?= form_error('nm_barang') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">

                                <div class="form-group ">
                                    <label>*kategori Barang</label>
                                    <select class="form-control  <?= form_error('kategori') ? 'is-invalid' : '' ?> "
                                        name="kategori">
                                        <?php if ($judul == "Tambah Barang") { ?>
                                        <option> pilih </option>
                                        <?php foreach ($kategori as $kat) : ?>
                                        <option value="<?= $kat->id_kategori ?>"><?= $kat->kategori_barang ?></option>
                                        <?php endforeach; ?>

                                        <?php } else { ?>
                                        <?php foreach ($kategori as $kat) : ?>
                                        <option value="<?= $kat->id_kategori ?> ?>"><?= $kat->kategori_barang ?>
                                            <?php endforeach; ?>
                                        </option>


                                        <?php } ?>

                                    </select>
                                    <div class="invalid-feedback">
                                        <?= form_error('kategori') ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>*Ukuran</label>
                                    <input type="text" value="<?php if ($judul == "Ubah Data Barang") {
                                                                    echo $barang['ukuran'];
                                                                } ?>"
                                        class="form-control <?= form_error('ukuran') ? 'is-invalid' : '' ?>"
                                        name="ukuran" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= form_error('ukuran') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label>*Warna</label>
                                    <input type="text" value="<?php if ($judul == "Ubah Data Barang") {
                                                                    echo $barang['warna'];
                                                                } ?>"
                                        class="form-control <?= form_error('warna') ? 'is-invalid' : '' ?>"
                                        name="warna">
                                    <div class="invalid-feedback">
                                        <?= form_error('warna') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label>*Merk</label>
                                    <input type="text" value="<?php if ($judul == "Ubah Data Barang") {
                                                                    echo $barang['nama_barang'];
                                                                } ?>"
                                        class="form-control  <?= form_error('merk') ? 'is-invalid' : '' ?>" name="merk">
                                    <div class="invalid-feedback">
                                        <?= form_error('merk') ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <!-- select -->
                                <div class="form-group">
                                    <label>*Jumlah Barang</label>
                                    <input type="number" value="<?php if ($judul == "Ubah Data Barang") {
                                                                    echo $barang['jml_barang'];
                                                                } ?>"
                                        class="form-control <?= form_error('jml_barang') ? 'is-invalid' : '' ?>"
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
                                    <input type="text" value="<?php if ($judul == "Ubah Data Barang") {
                                                                    echo $barang['harga_satuan'];
                                                                } ?>"
                                        class="form-control <?= form_error('harga') ? 'is-invalid' : '' ?>"
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
                                <input type="date" value="<?php if ($judul == "Ubah Data Barang") {
                                                                echo $barang['tgl_tambah'];
                                                            } ?>"
                                    class="form-control <?= form_error('tgl_input') ? 'is-invalid' : '' ?>"
                                    name="tgl_input" autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= form_error('tgl_input') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-outline-dark"><i
                                        class="fas fa-save "></i>

                                    <span
                                        class="text-info font-weight-bold"><?= $judul == "Ubah Data Barang" ? 'Update' : 'Simpan' ?></span>
                                </button>
                                <a href="<?= base_url('databarang') ?>"> <button type="button"
                                        class="btn btn-outline-dark float-right"><span
                                            class="text-danger font-weight-bold">Kembali</span></button></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>





    </div>
    <?= form_close(); ?>
</div>