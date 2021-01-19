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
            style="background-color:#191970;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class=" nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('dashboard') ?>"
                        class=" btn btn-outline-dark nav-link mr-2 font-weight-bold text-light">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block ">
                    <a href="" class="btn btn-outline-dark nav-link font-weight-bold text-light " id=detail-barang
                        data-toggle="modal" data-target="#modal">Contact</a>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar  elevation-4" style=" background-color:#191970;">
            <!-- Brand Logo -->
            <a href="" class="brand-link  text-light">
                <img src="<?= base_url() . 'assets/images/logo.png' ?>" alt="Aqila Logo"
                    class="brand-image img-circle elevation-3" style="opacity: 17">
                <span class="brand-text font-weight-bold"><strong>T</strong>oko <strong>Q</strong>uilla</span><br>


            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="text-center">
                    <div class="brand-image mx-auto">
                        <img src="<?= base_url() . 'assets/images/user/' . $this->session->userdata('image') ?>"
                            class=" mx-auto d-block" alt="User Image" width="60px;" height="60px"
                            style="border-radius: 50%;">
                        <p class="text-warning fw-light pt-3  mx-4 ">
                            <?= $this->session->userdata('role') ?></p>
                        <p class="text-warning fw-light  "><?= $this->session->userdata('nama_lengkap') ?></p>
                    </div>

                </div>
                <hr class="font-monospace">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item ">
                            <a href="<?= base_url('dashboard') ?>"
                                class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? 'active bg-danger' : '' ?> fst-normal text-light">
                                <p>
                                    <i class="fas fa-igloo text-info"></i>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">


                            <li class="nav-item ">
                                <a href="<?= base_url('penjualan') ?>"
                                    class="nav-link  <?= $this->uri->segment(1) == 'penjualan' ? 'active bg-danger' : '' ?> font-bold text-light">
                                    <p>
                                        <i class="fas fa-align-left text-info"></i>
                                        Entry Penjualan
                                    </p>
                                </a>
                            </li>
                            </a>
                            <li class="nav-item">
                                <a href="<?= base_url('user') ?>"
                                    class="nav-link font-bold <?= $this->uri->segment(1) == 'databarang' ? 'active bg-danger' : '' ?> fst-normal text-light">
                                    <i class="fas fa-angle-left right"></i>
                                    <i class="fas fa-pager text-info"></i>
                                    <p>
                                        Master

                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('databarang') ?>"
                                            class="nav-link <?= $this->uri->segment(2) == 'daftarbarang/index' ? 'active bg-danger' : '' ?> font-bold  font-bold text-light"
                                            class="nav-link">
                                            <i class="fas fa-table text-info"></i>
                                            <p>
                                                Daftar Barang

                                            </p>
                                        </a>
                                    </li>

                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('kategori') ?>"
                                            class="nav-link <?= $this->uri->segment(1) == 'kategori' ? 'active bg-danger' : '' ?> font-bold text-light"
                                            class="nav-link">
                                            <i class="fas fa-layer-group text-info"></i>
                                            <p>Kategori Barang</p>
                                        </a>
                                    </li>

                                </ul>
                                <?php if ($this->session->userdata('role') == "admin") { ?>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('users') ?>"
                                            class="nav-link  <?= $this->uri->segment(1) == 'users' ? 'active bg-danger' : '' ?> font-bold text-light"
                                            class="nav-link  text-light ">
                                            <i class="fas fa-user-tag text-info"></i>
                                            <p>Users</p>
                                        </a>
                                    </li>

                                </ul>
                                <?php } ?>
                            </li>
                            <li class="nav-item ">
                                <a href="<?= base_url('report') ?>"
                                    class="nav-link <?= $this->uri->segment(1) == 'report' ? 'active bg-danger' : '' ?> font-bold text-light">
                                    <i class="fas fa-angle-left right"></i>
                                    <p>
                                        <i class="fas fa-file-invoice text-info"></i>
                                        Report
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('report') ?>" class="nav-link  font-bold text-light"
                                            class="nav-link">
                                            <i class="fas fa-calculator text-info"></i>
                                            <p>Hasil Penjualan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('report/belum_terjual') ?>"
                                            class="nav-link  font-bold text-light" class="nav-link">
                                            <i class="fab fa-accusoft text-info "></i></i>
                                            <p>Barang Belum Terjual</p>
                                        </a>
                                    </li>

                                </ul>

                            </li>
                            <li class="nav-item ">
                                <a href="<?= base_url('users/ubah_password') ?>"
                                    class="nav-link <?= $this->uri->segment(1) == 'setting' ? 'active bg-danger' : '' ?> font-bold text-light">
                                    <p>
                                        <i class="fas fa-cogs text-info"></i>
                                        Setting
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="<?= base_url('users/logout') ?>" class="nav-link font-weight-bold text-danger">
                                    <p>
                                        <i class="fas fa-sign-out-alt "></i>
                                        Logout
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
        <footer class="main-footer" style=" background-color:#191970;">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2020-2021 <a href=" https://adminlte.io">A_so </a>. </strong> All rights reserved.
        </footer>
    </div> <!-- ./wrapper -->
    <!-- Alert Config -->


    <div class="modal fade  text-light" id="modal" role="dialog">
        <div class="modal-dialog sm" role="document">
            <div class="modal-content" style="background-color:#191970;">
                <?php $this->db->select('*');
                $this->db->from('tb_user');
                $query = $this->db->get()->result();

                //return $query;  
                // $data['users'] = $query;

                ?>
                <div class="modal-header" style="background-color:#191970;">
                    <button type="button" class="close btn btn-danger text-light" data-dismiss="modal">&times;
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="modal-title">Kontak Users</h4>
                    <div class="card">


                    </div>
                    <?php foreach ($query as $u) : ?>
                    <ul class="list-group">
                        <li class="ml-3"><?= $u->nama_lengkap ?></li>
                        <li class="list-group-item mt-0 bg-secondary">
                            <p id="nama"><?= $u->no_telpon ?></p>
                        </li>

                    </ul>

                    <?php endforeach; ?>


                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

    </script>
    <script type="text/javascript">
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-center',
            showConfirmButton: false,
            timer: 2000
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


    $('.custom-file-input').on('change', function() {
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filename);
    })
    </script>


</body>

</html>