<!-- Content Header (Page header) -->

<!-- Main content -->
<div class="content ">
    <div class="container-fluid  ">
        <div class="row mt">
            <div class="col-md-12">
                <div class=" pt-3 pl-3 pr-3 ">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">

                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tablet-alt"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-dark">Qty Product</span>
                                    <span class="info-box-number">
                                        <?= $qty_product->barang; ?> item

                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>

                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-qrcode"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-dark">Category Pruduct</span>
                                    <span class="info-box-number"><?= $category->kat; ?> Category</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i
                                        class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-dark">Barang Terjual</span>
                                    <span class="info-box-number mt-2"><?= $terjual->jual; ?> item</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-dark">Jumlah Pelangan</span>
                                    <span class="info-box-number"><?= $pelanggan->transaksi; ?> Pelanggan</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>



                </div>
            </div>


        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->