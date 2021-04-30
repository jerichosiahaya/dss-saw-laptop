<?php
require_once 'session.php';
include_once 'header.php';
$result = mysqli_query($conn, "SELECT * FROM alternatif WHERE id_pengguna = $id");
$query1 = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 1");
$query2 = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 2");
$query3 = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 3");
$query4 = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 4");
$query5 = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 5");
$query6 = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 6");
$query7 = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 7");
$query_kriteria = mysqli_query($conn, "SELECT * FROM `kriteria`") or die(mysqli_error($conn));
$jumlah_kriteria = mysqli_num_rows($query_kriteria);
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
                <a class="nav-link" href="hasil.php">Hasil</a>
            </li>
        </ul>
        <!-- tabs -->


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
            $alternatif = mysqli_query($conn, "SELECT * FROM alternatif WHERE id_pengguna = $id");
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
                    <td><a href="update_nilai_alternatif.php?id_alternatif=<?php echo $id; ?>"><button type="button" class="btn btn-secondary">EDIT</button></a></td>
                </tr>
            <?php } ?>

        </table>

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

        <a href="insert_isi_nilai_alternatif.php"><button type="button" class="btn btn-primary">Insert Nilai Alternatif</button></a>
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