<!-- Main content -->
<div class="content">
    <div class="container-fluid bg-secondary">

        <div class="row pt-3">
            <!-- right column -->
            <div class="col-md-10 pt-3 pl-3">
                <!-- general form elements disabled -->
                <div class="card card text-dark">
                    <div class="card-header bg-dark">
                        <h5 class="">Form Tambah Users</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?= form_open_multipart('users/proces') ?>

                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                            value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">

                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label>*Nik</label>
                                    <input type="text"
                                        class="form-control <?= form_error('nik') ? 'is-invalid' : '' ?> " name="nik"
                                        autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= form_error('nik') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">

                                <div class="form-group ">
                                    <label>*Nama Lengkap</label>
                                    <input type="text"
                                        class="form-control <?= form_error('nm_lengkap') ? 'is-invalid' : '' ?> "
                                        name="nm_lengkap" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= form_error('nm_lengkap') ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>*Username</label>
                                    <input type="text"
                                        class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>"
                                        name="username" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= form_error('username') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label>*No telpon</label>
                                    <input type="text"
                                        class="form-control <?= form_error('no_tlp') ? 'is-invalid' : '' ?>"
                                        name="no_tlp">
                                    <div class="invalid-feedback">
                                        <?= form_error('no_tlp') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label for="exampleInputFile">*Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                name="foto">
                                            <label class="custom-file-label" for="exampleInputFile">Choose</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-7">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>*Role</label>
                                    <select class="form-control  <?= form_error('agama') ? 'is-invalid' : '' ?> "
                                        name="role">
                                        <option>pilih</option>
                                        <option value="admin">Admin</option>
                                        <option value="kasir">Kasir</option>

                                    </select>
                                </div>
                                <div class="invalid-feedback">
                                    <?= form_error('agama') ?>
                                </div>
                            </div>
                            <div class="col-sm-7">

                                <div class="form-group">
                                    <label>*Password</label>
                                    <input type="password"
                                        class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>"
                                        name="password">
                                    <div class="invalid-feedback">
                                        <?= form_error('password') ?>
                                    </div>
                                </div>
                                <div class="invalid-feedback">
                                    <?= form_error('password') ?>
                                </div>
                            </div>

                        </div>



                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-outline-dark"><i
                                        class="fas fa-save "></i>
                                    <span class="text-info font-weight-bold">Simpan</span>
                                </button>
                                <a href="<?= base_url('users') ?>"> <button type="button"
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

<script>
$('.custom-file-input').on('change', function() {
    let filename = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(filename);
})
</script>