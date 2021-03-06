<?php
require_once 'session.php';
include_once 'header.php';
$result = mysqli_query($conn, "select * FROM alternatif WHERE alternatif.id_alternatif  IN (SELECT id_alternatif FROM nilai_alternatif) AND id_pengguna = $id");
$result2 = mysqli_query($conn, "select * FROM  alternatif WHERE alternatif.id_alternatif NOT IN (SELECT id_alternatif FROM nilai_alternatif) AND id_pengguna = $id");
$query1 = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 1");
$query2 = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 2");
$query3 = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 3");
$query4 = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 4");
$query5 = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 5");
$query6 = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 6");
$query7 = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 7");
$query_kriteria = mysqli_query($conn, "SELECT * FROM `kriteria`") or die(mysqli_error($conn));
$jumlah_kriteria = mysqli_num_rows($query_kriteria);

$jumlah = mysqli_num_rows($result2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Alternatif | Laptopp</title>
</head>

<body>

    <!-- <pre>
<?php
// $n1 = mysqli_fetch_array($query4);
// print_r($n1);
// print_r($query2);
?>
    </pre> -->

    <!-- navbar -->
    <?php require 'navbar.php'; ?>
    <!-- navbar -->

    <div class="container mt-4">

        <!-- tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Alternatif</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kriteria.php">Kriteria</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="insert_nilai_alternatif.php">Nilai Alternatif</a>
            </li>
            <li class="nav-item">
                <?php
                if ($jumlah > 0) {
                    $classDisabled = "disabled";
                } else {
                    $classDisabled = "";
                }
                ?>
                <a class="nav-link <?php echo $classDisabled; ?>" href="hasil.php">Hasil</a>
            </li>
        </ul>
        <!-- tabs -->

        <ul class="nav nav-pills mb-3 mt-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active btn" id="pills-sudah-tab" data-bs-toggle="pill" data-bs-target="#pills-sudah" type="button" role="tab" aria-controls="pills-sudah" aria-selected="true">Sudah Ada Nilai Alternatif</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link btn" id="pills-belum-tab" data-bs-toggle="pill" data-bs-target="#pills-belum" type="button" role="tab" aria-controls="pills-belum" aria-selected="false">Belum ada Nilai Alternatif (<?php echo $jumlah ?>)</button>
            </li>

        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-sudah" role="tabpanel" aria-labelledby="pills-sudah-tab">
                <div class="alert alert-primary alert-dismissible fade show mt-4" role="alert">
                    Jika ingin mengubah nilai kriteria pada salah satu alternatif (laptop), silahkan tekan tombol <b>Edit</b>.
                </div>
                <table class="table mt-4">
                    <tr>
                        <th rowspan="2">Alternatif Laptop</th>
                    <tr>
                        <?php
                        $kriteria = mysqli_query($conn, "SELECT * FROM `kriteria` WHERE id_pengguna = $id ") or die(mysqli_error($conn));
                        while ($data = mysqli_fetch_array($kriteria)) {
                        ?>
                            <th><?php echo $data['nama']; ?></th>
                        <?php }  ?>
                        <th>Action</th>
                    </tr>

                    <?php
                    $alternatif = mysqli_query($conn, "select * FROM alternatif WHERE alternatif.id_alternatif  IN (SELECT id_alternatif FROM nilai_alternatif) AND id_pengguna = $id");
                    while ($data = mysqli_fetch_array($alternatif)) {
                    ?>
                        <tr>
                            <td><?php echo $data['nama']; ?></td>
                            <?php
                            $id = $data['id_alternatif'];
                            $nilai_alternatif = mysqli_query($conn, "select nilai_alternatif.*, nilai_kriteria.*from nilai_alternatif join nilai_kriteria on nilai_kriteria.id_nilai = nilai_alternatif.id_nilai where  nilai_alternatif.id_alternatif = $id");
                            while ($data =  mysqli_fetch_array($nilai_alternatif)) { ?>
                                <td><?php echo $data['keterangan']; ?></td>
                            <?php } ?>
                            <td><a href="update_nilai_alternatif.php?id_alternatif=<?php echo $id; ?>"><button type="button" class="btn btn-secondary"><i class="fas fa-edit"> </i> Edit</button></a></td>
                        </tr>
                    <?php } ?>

                </table>

            </div>
            <div class="tab-pane fade" id="pills-belum" role="tabpanel" aria-labelledby="pills-belum-tab">
                <?php
                if ($jumlah > 0) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
                        Masukkan nilai dari masing-masing kriteria dengan menekan tombol <b>Insert</b> pada salah satu alternatif (laptop).
                    </div>
                <?php
                } else { ?>
                    <div class="alert alert-primary alert-dismissible fade show mt-4" role="alert">
                        Belum ada alternatif (laptop) yang perlu dimasukkan nilai kriterianya. Silahkan tambahkan alternatif baru pada tab <b>Alternatif</b>.
                    </div>
                <?php } ?>

                <?php
                if ($jumlah <= 0) {
                    $hide = "hidden";
                } else {
                    $hide = "";
                }
                ?>

                <table class="table table-hover mt-3" <?php echo $hide; ?>>
                    <thead>
                        <tr>
                            <th scope="col">Alternatif Laptop </th>
                            <th scope="col"></th>
                        </tr>
                        <?php
                        while ($data = mysqli_fetch_array($result2)) {
                        ?>
                            <tr>
                                <td><?php echo $data['nama'] ?></td>
                                <td><a href="insert_isi_nilai_alternatif.php"><button type="button" class="btn btn-success"><i class="fas fa-plus"></i> Insert</button></a></td>

                            </tr>
                        <?php

                        }
                        ?>
                </table>

            </div>

            <!-- <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">Merk Laptop</th>
                    <th scope="col">Processor</th>
                    <th scope="col">Harga</th>
                    <th scope="col">RAM</th>
                    <th scope="col">HDD</th>
                    <th scope="col">Baterai</th>
                    <th scope="col">VGA</th>
                    <th scope="col">Layar</th>
                </tr>
                <?php
                while ($data = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $data['nama'] . "</td>";
                    //echo "<td><a href='update.php'><button type='button' class='btn btn-primary' name='submit'>Ubah</button></a> | <a href='delete.php'><button type='button' class='btn btn-danger' name='delete'>Hapus</button></a></td></tr>"; //belum bisa ditekan
                }
                ?>
        </table> -->






            <!-- <a href="update_nilai_alternatif.php"><button type="button" class="btn btn-light">Update Nilai Alternatif</button></a> -->
        </div>

        <script>
            $(document).ready(function() {
                $('#laptop').on('change', function() {
                    $('#form_n').removeAttr('hidden');
                });

                $('#tes').on('click', function() {
                    laptop = $('#laptop').val();
                    a = $('#n1').val();
                    b = $('#n2').val()
                    c = $('#n3').val()
                    d = $('#n4').val()
                    e = $('#n5').val()
                    f = $('#n6').val()
                    g = $('#n7').val()
                    alert(a + ' ' + b + ' ' + c + ' ' + d + ' ' + e + ' ' + f + ' ' + g + ' ' + laptop);

                });

                $('#submit').on('click', function() {
                    laptop = $('#laptop').val();
                    a = $('#n1').val();
                    b = $('#n2').val();
                    c = $('#n3').val();
                    d = $('#n4').val();
                    e = $('#n5').val();
                    f = $('#n6').val();
                    g = $('#n7').val();
                    //alert(a + ' ' + b + ' ' + c + ' ' + d + ' ' + e + ' ' + f + ' ' + g + ' ' + laptop);
                    if (a != "" && b != "" && c != "" && d != "" && e != "" && f != "" && g != "" && laptop != "") {
                        $.ajax({
                            type: "POST",
                            url: "insert_nilai_alternatif_process.php",
                            data: {
                                'laptop': laptop,
                                'n1': a,
                                'n2': b,
                                'n3': c,
                                'n4': d,
                                'n5': e,
                                'n6': f,
                                'n7': g,
                            },
                            cache: false,
                            success: function(dataResult) {
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    alert("Success!");
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