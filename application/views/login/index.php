<!DOCTYPE html>
<html>

<head>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/fontawesome-free/css/all.min.css ' ?> ">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/dist/css/adminlte.min.css' ?> ">
    <!-- Google Font: Source Sans Pro -->
    <link href="" rel="stylesheet">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/sweetalert2/dark.css' ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/toastr/toastr.min.css' ?>">

    <script src="<?= base_url() . 'assets/dist/js/adminlte.min.js' ?>"></script>
    <!-- jQuery -->
    <script src="<?= base_url() . 'assets/plugins/jquery/jquery.min.js' ?> "></script>
    <!-- Bootstrap 4 -->
    <script src=" <?= base_url() . 'assets/plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
    <!-- Sweetalert -->
    <script src="<?= base_url() . 'assets/plugins/sweetalert2/sweetalert2.min.js' ?>"></script>
    <!-- Toastr -->
    <script src="<?= base_url() . 'assets/plugins/toastr/toastr.min.js' ?>"></script>
    <!-- AdminLTE App -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>

<body class="hold-transition login-page bg-secondary">
    <div class="login-box ">


        <!-- /.login-logo -->
        <div class="card bg-dark shadow bg-danger rounded">
            <div class="login-logo ">
                <img src="<?= base_url() . 'assets/images/logo.png' ?>" alt="Aqila Logo"
                    class="brand-image img-circle elevation-3 m-3  float-left" style="opacity: 17" width="70px">
                <span class="brand-text font-weight-bold m-3 pr-3 float-left">Toko.Quilla</span>
            </div>
            <div class="card-body login-card-body bg-dark">
                <h4 class=" font-weight-bold text-center text-info pb-2">Login</h4>


                <form action="" method="post">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                        value="<?= $this->security->get_csrf_hash(); ?>" style="display: none  ">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>"
                            placeholder="username" name="username" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>

                        </div>
                        <div class="invalid-feedback">
                            <?= form_error('username') ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>"
                            placeholder="Password" name="password" autocomplete="off">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= form_error('password') ?>
                        </div>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col">
                            <button type="submit" class="btn btn-info btn-block">Masuk</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->


</body>

</html>
<script type="text/javascript">
$(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: '',
        showConfirmButton: false,
        timer: 1000
    });
    <?php if ($this->session->flashdata('success')) { ?>
    Toast.fire({
        icon: 'success',
        title: '<?= $this->session->flashdata('success'); ?>'
    });
    <?php } else if ($this->session->flashdata('error')) {  ?>
    Toast.fire({
        icon: 'error',
        title: '<?= $this->session->flashdata('error'); ?>'
    });
    <?php } else if ($this->session->flashdata('warning')) {  ?>
    Toast.fire({
        icon: 'warning',
        title: '<?= $this->session->flashdata('warning'); ?>'
    });
    <?php } else if ($this->session->flashdata('info')) {  ?>
    Toast.fire({
        icon: 'info',
        title: '<?= $this->session->flashdata('info'); ?>'
    });
    <?php } ?>
});
</script>