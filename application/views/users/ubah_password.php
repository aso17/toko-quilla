<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5 bg-info">
                    <div class="card-header bg-dark ">
                        <h3>Halaman Ubah Password User</h3>

                    </div>
                    <div class="row mx-auto">
                        <div class="col-md">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>*Password Lama</label>
                                    <input type="password"
                                        class="form-control <?= form_error('pass') ? 'is-invalid' : '' ?> " name="pass"
                                        autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= form_error('pass') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>*Password Baru</label>
                                    <input type="password"
                                        class="form-control <?= form_error('pass_baru') ? 'is-invalid' : '' ?> "
                                        name="pass_baru" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= form_error('pass_baru') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>*Konfirmasi Password Baru</label>
                                    <input type="password"
                                        class="form-control <?= form_error('konfirmasi_pass') ? 'is-invalid' : '' ?> "
                                        name="konfirmasi_pass" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= form_error('konfirmasi_pass') ?>
                                    </div>
                                </div>
                                <button class="btn btn-outline-dark float-right text-bold mb-3">Submit</button>
                            </form>
                        </div>
                    </div>


                    <div class="card-footer text-muted">
                        <div class="alert alert-warning text-center" role="alert">
                            info : Isilah data Dengan Benar!
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->