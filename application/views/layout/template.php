<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Quilla</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/fontawesome-free/css/all.min.css ' ?> ">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/dist/css/adminlte.min.css' ?> ">
    <!-- Google Font: Source Sans Pro -->
    <link href="" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css' ?>">
    <link rel="stylesheet"
        href="<?= base_url() . 'assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css' ?>">
    <link rel="stylesheet"
        href="<?= base_url() . 'assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css' ?>">
    <link rel="stylesheet"
        href="<?= base_url() . 'assets/plugins/datatables-buttons/css/buttons.dataTables.min.css' ?>">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/sweetalert2/dark.css' ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/toastr/toastr.min.css' ?>">
    <link rel="stylesheet" href="">


    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url() . 'assets/plugins/jquery/jquery.min.js' ?> "></script>
    <!-- Bootstrap 4 -->
    <script src=" <?= base_url() . 'assets/plugins/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() . 'assets/dist/js/adminlte.min.js' ?>"></script>
    <!-- DataTables -->
    <script src="<?= base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/plugins/datatables-responsive/js/dataTables.responsive.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js' ?>"></script>
    <script src="<?= base_url() . 'assets/plugins/datatables-buttons/js/dataTables.buttons.min.js' ?>"></script>
    <!-- Sweetalert -->
    <script src="<?= base_url() . 'assets/plugins/sweetalert2/sweetalert2.min.js' ?>"></script>
    <!-- Toastr -->
    <script src="<?= base_url() . 'assets/plugins/toastr/toastr.min.js' ?>"></script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light text-light"
            style="background-color:#8B0000;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link  font-weight-bold text-light">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block ">
                    <a href="#" class="nav-link font-weight-bold text-light">Contact</a>
                </li>
            </ul>


        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar  elevation-4" style=" background-color:#000000;">
            <!-- Brand Logo -->
            <a href="" class="brand-link  text-light">
                <img src="<?= base_url() . 'assets/images/logo.png' ?>" alt="Aqila Logo"
                    class="brand-image img-circle elevation-3" style="opacity: 17">
                <span class="brand-text font-weight-bold"> Cv Quilla</span><br>


            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="text-center">
                    <div class="brand-image mx-auto">
                        <img src="<?= base_url() . 'assets/images/user/komenk.jpeg' ?>" class=" mx-auto d-block"
                            alt="User Image" width="100px;" height="100px" style="border-radius: 50%;">
                        <p class="text-info font-weight-bold mt-3 mx-4 ">{12341111111156}</p>
                        <p class="text-info font-weight-bold ">Quilla Mutia kom</p>
                    </div>

                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-1">
                    <ul class="nav nav-pills nav-sidebar flex-column  " data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item ">
                            <a href="<?= base_url('Dashboard') ?>" class="nav-link font-weight-bold text-light">
                                <p>
                                    <i class="nav-icon fa fa-tachometer-alt"></i>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link font-weight-bold text-light">
                                <p>
                                    <i class="fas fa-angle-left right"></i>
                                    <i class="fas fa-server"></i>
                                    Master

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('databarang') ?>"
                                        class="nav-link font-weight-bold text-light">
                                        <i class="fas fa-table"></i>
                                        <p>
                                            Data Barang

                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('databarang/kategori') ?>"
                                        class="nav-link font-weight-bold text-light">
                                        <i class="fas fa-layer-group"></i>
                                        <p>Kategori Barang</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a href="<?= base_url('penjualan') ?>" class="nav-link font-weight-bold text-light">
                                <p>
                                    <i class="fas fa-align-left"></i>
                                    Entry Penjualan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?= base_url('Dashboard') ?>" class="nav-link font-weight-bold text-light">
                                <p>
                                    <i class="fas fa-file-invoice"></i>
                                    Laporan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?= base_url('Dashboard') ?>" class="nav-link font-weight-bold text-light">
                                <p>
                                    <i class="fas fa-cogs"></i>
                                    Pengaturan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?= base_url('Dashboard') ?>" class="nav-link font-weight-bold text-danger">
                                <p>
                                    <i class="fas fa-sign-out-alt "></i>
                                    Keluar
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <div class="content">


                <?= $contents ?>


            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer" style=" background-color:#8B0000;">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2019 <a href=" https://adminlte.io">A_so </a>. </strong> All rights reserved.
        </footer>
    </div> <!-- ./wrapper -->


</body>

</html>