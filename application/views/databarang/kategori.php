<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="row pt-3">
            <div class="col-md-3">
                <h3 class="">Kategori sepatu cv.Quilla</h3>

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">

                        <a href="http://"><button class="btn btn-primary"><i class="fas fa-plus">Tambah
                                    data</i></button></a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="barang">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama sepatu</th>
                                    <th>Jenis Sepatu</th>
                                    <th>Merek</th>
                                    <th class="text-center" style="">
                                        <i class="fas fa-directions bg-info"></i>
                                        aksi
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>183</td>
                                    <td>John Doe</td>
                                    <td>11-7-2014</td>
                                    <td>11-7-2014</td>


                                    <td>
                                        <a href="http://">
                                            <button class="badge bg-danger float-right   "><i
                                                    class="fas fa-trash-alt">hapus</i></button>
                                        </a>
                                        <a href="http://">
                                            <button class="badge bg-info float-right mr-3"><i
                                                    class="fas fa-eye">detail</i></button>
                                        </a>
                                        <a href="http://">
                                            <button class="badge bg-primary float-right mr-3 "><i
                                                    class="fas fa-edit">ubah</i></button>
                                        </a>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<script>
$(function() {

    $("#barang").DataTable({
        "responsive": true,
        "autoWidth": true,
        "info": true,
        "lengthChange": false,

        "paging": true,

    });
});
</script>
<!-- /.content -->