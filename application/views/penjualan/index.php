<!-- Main content -->
<div class="bg-secondary">
    <div class="container-fluid ml-0 ">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3 text-dark bg-info">
                    <div class="card-header ">


                        <h3 class="text-light"><strong>Transaksi penjualan </strong></h3>

                    </div>
                    <div class="row mt-0">
                        <div class="col-md-3 ">






                        </div>
                        <div class="col-md-9 ">
                            <div class="card-header">
                                <h5 class="text-info">Daftar Barang Toko Quilla Barang</h5>
                            </div>
                            <div class="card text-dark bg-dark">

                                <table id="tb_barang" class="table table-sm ">
                                    <thead>
                                        <tr>

                                            <th>#</th>
                                            <th>Kode barang</th>
                                            <th>Nama Barang</th>
                                            <th>stok</th>
                                            <th>harga</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($barang as $b) : ?>
                                        <tr>
                                            <td>
                                                <?= $i++ ?>
                                            </td>
                                            <td>
                                                <?= $b->kode_barang ?>
                                            </td>

                                            <td>
                                                <?= $b->nama_barang ?>
                                            </td>
                                            <td><?= $b->jml_barang ?></td>
                                            <td>
                                                Rp. <?= number_format($b->harga_jual)  ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('penjualan/beli/') . $b->kode_barang ?>">
                                                    <button class="btn btn-info btn-sm "><i class="fas fa-check-circle"
                                                            name="pilih"></i>
                                                        Pilih</button>
                                                </a>
                                            </td>

                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>




                            </div>
                        </div>




                    </div>

                    <div class="row   ">
                        <div class="col-md-12">

                            <div class="card bg-info">
                                <div class="card-header text-light ">
                                    <h5>Detail Transaksi</h5>

                                    <label for="">Tanggal</label>
                                    <input type="text" id="jamServer" value="<?= date('d-m-Y H:i'); ?>" readonly
                                        disabled>
                                </div>

                                <table id="dataTble" style="" class="table table-sm text-dark" border="1">
                                    <thead class="">

                                        <tr>
                                            <th>#</th>
                                            <th>Kode barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Beli</th>
                                            <th>harga</th>
                                            <th>Total</th>
                                            <th></th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($detail_transaksi as $transaksi) : ?>
                                        <tr>
                                            <td><?= $i++; ?>.</td>
                                            <td><?= $transaksi->kode_barang ?></td>
                                            <td><?= $transaksi->nama_barang ?></td>
                                            <td><?= $transaksi->jumlah_beli ?></td>
                                            <td>Rp.<?= number_format($transaksi->total_harga)  ?></td>
                                            <td>Rp.<?= number_format($transaksi->total_harga)  ?>
                                            </td>
                                            <td><button
                                                    onclick="deleteConfirm('<?= base_url() . 'penjualan/hapus/'  . $kode . '-' . $transaksi->kode_barang ?>')"
                                                    class="btn btn-danger btn-sm bg-danger"><i
                                                        class="fas fa-window-close"></i> Batalkan</button>
                                            </td>

                                        </tr>

                                        <?php endforeach;  ?>
                                        <tr class="">
                                            <td colspan="5">
                                                <h5 class="text-danger font-weight-bold"> <strong> Sub Total</strong>
                                                </h5>
                                            </td>
                                            <td colspan="2" class="text-danger font-weight-bold">
                                                <strong> Rp.<?= number_format($sub_total->total) ?></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row">

                                    <div class="col">

                                        <a href="<?= base_url('penjualan/bayar/') . $sub_total->total ?>"> <button
                                                class="btn btn-warning btn-lg float-right mr-4 mb-2 mt-2 " type="button"
                                                name="button"><i class="fas fa-money-check"> Bayar</i>
                                            </button></a>
                                        <?php $transaksi = $kode;
                                        $i = 1;
                                        $kode_transaksi = $transaksi - $i;

                                        if ($this->session->userdata('kode')) {

                                        ?>
                                        <a href="<?= base_url('penjualan/print/') . $kode_transaksi ?>"> <button
                                                class="btn btn-dark btn-lg float-right mr-4 mb-2 mt-2 " type="button"
                                                target="_blank" name="button"><i class="fas fa-print"></i>
                                                Print</button></a>

                                        <?php } ?>
                                    </div>
                                </div>

                            </div>
                        </div>




                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>
<!-- /.content -->
<!--Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body bg-info">
                <div class="row">
                    <div class="col-3 d-flex justify-content-center">
                        <i class="fa  fa-exclamation-triangle" style="font-size: 70px; color:red;"></i>
                    </div>
                    <div class="col-9 pt-2">
                        <h5>Apakah anda yakin?</h5>
                        <span>Ingin Batalkan Transaksi.</span>
                    </div>
                </div>

            </div>
            <div class="modal-footer bg-info">
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
<script>
$(document).ready(function() {
    $("#kd_barang").on('input', function() {

        var kd_barang = $(this).val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('databarang/cari') ?>",
            dataType: "JSON",
            data: {
                kd_barang: kd_barang
            },
            cache: false,
            success: function(data) {


                $.each(data, function(kode_barang, nama_barang, harga_jual)

                    {
                        $('[name="nm_barang"]').val(data.nama_barang);
                        $('[name="harga"]').val(data.harga_jual);





                    });

            }
        });
        return false;
    });

});
</script>

<script language="javascript">
function addRow(tableID) {

    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

    var cell1 = row.insertCell(0);
    var element1 = document.createElement("input");
    element1.type = "checkbox";
    element1.name = "chkbox[]";
    cell1.appendChild(element1);


    var cell2 = row.insertCell(1);
    var element3 = document.createElement("input");
    element3.type = "text";
    element3.name = "kd_barang";
    element3.id = "kd_barang";

    cell2.appendChild(element3);



    var cell3 = row.insertCell(2);
    var element2 = document.createElement("input");
    element2.type = "text";
    element2.name = "nm_barang";
    element2.id = "nm_barang";
    cell3.appendChild(element2);

    var cell4 = row.insertCell(3);
    var element4 = document.createElement("input");
    element4.type = "number";
    element4.name = "jml_beli";
    cell4.appendChild(element4);

    var cell5 = row.insertCell(4);
    var element5 = document.createElement("input");
    element5.type = "text";
    element5.name = "harga";
    element5.id = "harga";
    cell5.appendChild(element5);

    var cell6 = row.insertCell(5);
    var element6 = document.createElement("input");
    element6.type = "text";
    element6.name = "total";
    element6.id = "total";
    cell6.appendChild(element6);



}

function deleteRow(tableID) {
    try {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;

        for (var i = 0; i < rowCount; i++) {
            var row = table.rows[i];
            var chkbox = row.cells[0].childNodes[0];
            if (null != chkbox && true == chkbox.checked) {
                table.deleteRow(i);
                rowCount--;
                i--;
            }


        }
    } catch (e) {
        alert(e);
    }
}
$(function() {

    $("#dataTable").DataTable({
        "responsive": false,
        "autoWidth": false,
        "info": false,
        "lengthChange": false,

        "paging": false,

    });
});
$(function() {

    $("#tb_barang").DataTable({
        "responsive": true,
        "autoWidth": false,
        "info": false,
        "lengthChange": false,
        "lengthMenu": [
            [5, 10, 50, -1],
            [5, 10, 50, "All"]
        ],
        "paging": true,

    });
});


// $(document).ready(function() {
//     $(document).on('click', '#pilih', function() {

//         var data = [


//             kode_barang = $(this).data('kode'),
//             nama_barang = $(this).data('barang'),
//             harga_jual = $(this).data('harga')
//         ];

//         console.log(data);
//         $("#kd_barang").val(nama_barang);
//         $("#nm_barang").val(nama_barang);
//         $("#harga").val(harga_jual);

//         var data = [kode_barang];

//         for (var i = 0; i < data.length; i++) {

//             $("#kd_barang").val(data[i++]);
//         }



//         var id = ["#kd_barang"];
//         var nm = ['#nm_barang'];
//         var hr = ['#harga'];

//         for ($i = 0; i < id; i++) {
//             id++;
//         }
//         id.forEach((d) => {
//             $(d++).val(kode_barang);


//         });
//         nm.forEach((n) => {

//             $(n).val(nama_barang);

//         });
//         hr.forEach((h) => {

//             $(h).val(harga_jual);
//         });

//     })
// })
</script>