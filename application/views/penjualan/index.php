<!-- Main content -->

<div class="container-fluid bg-secondary ">
    <div class="row ">
        <div class="col-md-12">
            <div class="card mt-3 text-dark">
                <div class="card-header ">

                    <h3>Transaksi penjualan</h3>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4 ">

                        <ul class=" list-group list-group-horizontal">
                            <tr>
                                <td>
                                    <li class="list-group-item">Nama Kasir</li>
                                </td>
                                <td>
                                    <li class="list-group-item">Dapibus ac fassssssci</li>
                                </td>
                            </tr>


                        </ul>
                        <ul class=" list-group list-group-horizontal">
                            <tr>
                                <td>
                                    <li class="list-group-item">Tangal Transaksi</li>
                                </td>
                                <td>
                                    <li class="list-group-item">Dapibus ac fassssssci</li>
                                </td>
                            </tr>


                        </ul>





                    </div>
                    <div class="col-md mr-4 ">
                        <div class="card-header">
                            <h3>Data Barang</h3>
                        </div>
                        <div class="card text-dark mx-4 ">

                            <table id="tb_barang" class="table table-sm ">
                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>Kode barang</th>
                                        <th>Nama Barang</th>
                                        <th>harga</th>
                                        <th>pilh</th>

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
                                        <td>
                                            <?= $b->harga_jual ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('penjualan/beli/') . $b->kode_barang ?>">
                                                <button class="btn btn-info btn-sm ">pilih</button>
                                            </a>
                                        </td>

                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>




                        </div>
                    </div>




                </div>
                <form action=" <?= base_url('databarang/cari') ?> " method=" post">
                    <div class="row mr-2  ">
                        <div class="col-md-12">

                            <div class="card ">
                                <div class="card-header bg-info">

                                    <label for="">Tanggal</label>
                                    <input type="text">
                                </div>

                                <table id="dataTble" style="" class="table table-sm">
                                    <thead class="">

                                        <tr>

                                            <th>#</th>
                                            <th>Kode barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Beli</th>
                                            <th>harga</th>
                                            <th>total</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                        </tr>

                                    </tbody>
                                </table>
                                <div class="row">

                                    <div class="col">

                                        <button class="btn btn-success btn-lg float-right mr-4 mb-2 mt-2 " type="submit"
                                            name="submit"><i class="fas fa-shopping-cart"></i>
                                            bayar</button>
                                    </div>
                                </div>

                            </div>
                        </div>




                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
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