<!-- Main content -->
<div class="content">
    <div class="container-fluid bg-secondary">

        <div class="row pt-3">
            <div class="col-md-5">
                <h3 class="">Daftar Users</h3>

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <a href=" <?= base_url('Users/tambah') ?> ">
                            <button type="submit" name="submit" class="btn btn-outline-info"><i
                                    class="fas fa-plus-square mr-1 "></i>
                                <span class="text-dark font-weight-bold">Users</span>
                            </button>

                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table class="table table-hover text-nowrap" id="users">
                            <thead>
                                <tr class="text-dark">
                                    <?php $i = 1; ?>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>NIk</th>
                                    <th class="text-center">foto</th>
                                    <th>role</th>
                                    <th style="width:7px"></th>

                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                <?php foreach ($users as $us) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $us->username; ?></td>
                                    <td><?= $us->nik_ktp; ?></td>

                                    <td><img src="<?= base_url() . 'assets/images/user/' . $us->image; ?>" alt="users"
                                            width="70px" height="70px" class="rounded mx-auto d-block">
                                    </td>

                                    <td><?= $us->role; ?></td>
                                    <td><button class="btn btn-outline-danger btn-sm"
                                            onclick="deleteConfirm('<?= base_url() . 'users/delete/' . $us->id_user ?>')"><i
                                                class="fa fa-trash-alt"> Hapus</i> </button></td>

                                </tr>
                                <?php endforeach; ?>




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

<!--Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-3 d-flex justify-content-center">
                        <i class="fa  fa-exclamation" style="font-size: 70px; color:red;"></i>
                    </div>
                    <div class="col-9 pt-2">
                        <h5>Apakah anda yakin?</h5>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal"> Batal</button>
                <a id="btn-delete" class="btn btn-danger" href="#"> Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirm -->
<script type="text/javascript">
function deleteConfirm(url) {
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
}
</script>
<!-- /.content -->
<script>
$(function() {

    $("#users").DataTable({
        "responsive": true,
        "autoWidth": false,
        "info": true,
        "lengthChange": false,

        "paging": false,

    });
});
</script>
<!-- /.content -->