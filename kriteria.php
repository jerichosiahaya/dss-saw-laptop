<?php
require_once 'session.php';
include_once 'header.php';
$result = mysqli_query($conn, "SELECT * FROM kriteria");
?>

<html>
<head>
    <title>Kriteria</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Kriteria</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($data = mysqli_fetch_array($result)) {
                //$percent = round((float)$data['weight'] * 100 ) . '%';
                echo "<tr>";
                echo "<td>" . $data['nama'] . "</td>";
                echo "<td>" . $data['sifat'] . "</td>";
                echo "<td>" . $data['weight'] . "</td>";
                echo "<td><button name='submit' data-bs-toggle='modal' data-bs-target='#modalUpdateKriteria" . $data['id_kriteria'] . "'> Edit </button>";
            
            ?>



            <div class="modal fade" id="modalUpdateKriteria<?php echo $data['id_kriteria'] ?>" tabindex="-1"
                aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Ubah Bobot Kriteria</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <small class="text-muted">No :</small>
                            <input class="form-control form-insert mb-2" type="text" id="id" name="nama"
                                value="<?php echo $data['id_kriteria']; ?>" disabled>

                            <small class="text-muted">Nama Kriteria :</small>
                            <input class="form-control form-insert mb-2" type="text" id="nama" name="nama"
                                value="<?php echo $data['nama']; ?>" disabled>

                            <small class="text-muted">Sifat :</small>
                            <input class="form-control form-insert mb-2" type="text" id="sifat" name="nama"
                                value="<?php echo $data['sifat']; ?>" disabled>


                            <small class="text-muted">Bobot:</small>
                            <input class="form-control form-insert mb-2" type="text" id="weight" name="nama"
                                value="<?php echo $data['weight']; ?>">
                        </div>
                        <div class="modal-footer">
                            <input type="button" name="simpan" class="btn btn-primary" value="Simpan" id="simpan">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php
     }
                ?>
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
                    $('#simpan').on('click', function () {
                                var id = $('#id').val();
                                var nama = $('#nama').val();
                                var sifat = $('#sifat').val();
                                var weight = $('#weight').val(); 
                                if (id != "" && nama != "" && sifat != "" && weight != "") {
                                    $.ajax({
                                        type: "POST",
                                        url: "update_kriteria_process.php",
                                        data: {
                                            'id' : id,
                                            'nama': nama,
                                            'sifat': sifat,
                                            'weight': weight,
                                        },
                                        cache: false,
                                        success: function (dataResult) {
                                            var dataResult = JSON.parse(dataResult);
                                            if (dataResult.statusCode == 200) {
                                                // alert("Success!");
                                                location.reload();
                                            } else {
                                                alert("Error occured !");
                                            }
                                        }
                                    });
                                } else {
                                    alert('Harap isi semua data!');
                                }
                            });
                    });
    </script>
</body>

</html>