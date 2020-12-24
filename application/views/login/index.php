<!DOCTYPE html>
<html>

<head>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/fontawesome-free/css/all.min.css ' ?> ">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/dist/css/adminlte.min.css' ?> ">
    <!-- Google Font: Source Sans Pro -->
    <link href="" rel="stylesheet">


    <!-- jQuery -->
    <script src="<?= base_url() . 'assets/plugins/jquery/jquery.min.js' ?> "></script>
    <!-- Bootstrap 4 -->
    <script src=" <?= base_url() . 'assets/plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() . 'assets/dist/js/adminlte.min.js' ?>"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>

<body class="hold-transition login-page bg-secondary">
    <div class="login-box ">


        <!-- /.login-logo -->
        <div class="card bg-dark border border-danger shadow bg-danger rounded">
            <div class="login-logo ">
                <img src="<?= base_url() . 'assets/images/logo.png' ?>" alt="Aqila Logo"
                    class="brand-image img-circle elevation-3 m-3  float-left" style="opacity: 17" width="70px">
                <span class="brand-text font-weight-bold m-3 pr-3 float-left">CV.Quilla</span>
            </div>
            <div class="card-body login-card-body bg-dark ">
                <h4 class=" font-weight-bold text-center text-info">Login</h4>


                <form action="../../index3.html" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control border border-danger" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control border border-danger" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                </form>

                <div class="social-auth-links text-center mb-3">

                    <a href="#" class="btn btn-block btn-info font-weight-bold">
                        Masuk
                    </a>
                </div>
                <!-- /.social-auth-links -->


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->


</body>

</html>