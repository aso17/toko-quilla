<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Responsive Hover Table</h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="barang">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Reason</th>
                                    <th>Reason</th>
                                    <th>Reason</th>
                                    <th>Reason</th>
                                    <th>Reason</th>
                                    <th>Reason</th>
                                    <th>Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>183</td>
                                    <td>John Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-success">Approved</span></td>
                                    <td>ffff.</td>
                                    <td>ffff.</td>
                                    <td>ffff.</td>
                                    <td>ffff.</td>
                                    <td>ffff.</td>
                                    <td>ffff.</td>
                                    <td>ffff.</td>
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