<?php
require_once 'session.php';
include_once 'header.php';
// $result = mysqli_query($conn, "SELECT * FROM alternatif WHERE id_pengguna = $id");
$queryHarga = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 1");
$queryProcessor = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 2");
$queryRAM = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 3");
$queryHDD = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 4");
$queryBattery = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 5");
$queryVGA = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 6");
$queryLayar = mysqli_query($conn, "SELECT * FROM nilai_kriteria WHERE id_kriteria = 7");
$id_alternatif = $_GET['id_alternatif'];
$query = "select * from nilai_alternatif where nilai_alternatif.id_alternatif = $id_alternatif";
$query2 =  mysqli_query($conn, "select * from alternatif where alternatif.id_alternatif = $id_alternatif");
$query3 = mysqli_query($conn, "select nilai_alternatif.id_nilai_alternatif, nilai_alternatif.id_kriteria, nilai_alternatif.id_nilai, nilai_kriteria.keterangan from nilai_alternatif, nilai_kriteria where nilai_alternatif.id_nilai = nilai_kriteria.id_nilai and id_alternatif = $id_alternatif");
$result_query2 = mysqli_fetch_assoc($query2);
$result_query3 = mysqli_fetch_all($query3);
// echo $result_query3['keterangan'][4];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Nilai Alternatif | Laptopp</title>
</head>

<body>

    <!-- <pre>
<?php
// print_r($result_query3[0]);
?>
    </pre> -->

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://i.ibb.co/mRgTp8V/laptopp.png" alt="" width="100" height="29">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">About</a>
                    <a class="nav-link" href="#">Github</a>
                </div>
            </div>
            <span class="navbar-text">
                <a href="logout.php">LOGOUT</a>
            </span>
        </div>
    </nav>
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
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Hasil</a>
            </li>
        </ul>
        <!-- tabs -->

        <!-- breadcumbs -->
        <nav aria-label="breadcrumb" class="mt-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="insert_nilai_alternatif.php">Nilai Alternatif</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Nilai Alternatif</li>
            </ol>
        </nav>
        <!-- breadcumbs -->

        <!-- <img src="https://mdp.co.id/upload/pictures/product/LP7594.jpg" class="img-fluid" alt="..."> -->

        <form method="POST" action="update_nilai_alternatif_process.php">
            <div class="mb-3">
                <label for="laptop" class="form-label">Laptop:</label>
                <input type="text" class="form-control" id="laptop" aria-describedby="laptop" style="width: 50%;" value="<?php echo $result_query2['nama']; ?>" disabled>
                <input type="text" class="form-control" name="chosen_laptop" id="chosen_laptop" aria-describedby="laptop" style="width: 50%;" value="<?php echo $id_alternatif; ?>" hidden>
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>

            <!-- option select harga -->
            <input type="text" class="form-control" name="id_harga" id="id_harga" aria-describedby="harga" style="width: 50%;" value="<?php echo $result_query3[0][0]; ?>" hidden>
            <label for="harga" class="form-label">Harga:</label>
            <select class="form-select select-alternative" style="width:50%;" name="harga" id="harga" required>
                <?php
                while ($data = mysqli_fetch_array($queryHarga)) {
                ?>
                    <option value="<?php echo $data['id_nilai']; ?>" hidden selected="true"><?php echo $result_query3[0][3]; ?></option>
                    <option value="<?php echo $data['id_nilai']; ?>"><?php echo $data['keterangan']; ?></option>
                <?php
                }
                ?>
            </select>
            <!-- option select harga -->

            <!-- option select processor -->
            <input type="text" class="form-control" name="id_processor" id="id_processor" aria-describedby="processor" style="width: 50%;" value="<?php echo $result_query3[1][0]; ?>" hidden>
            <label for="processor" class="form-label mt-4">Processor:</label>
            <select class="form-select select-alternative" style="width:50%;" name="processor" id="processor" required>
                <?php
                while ($data = mysqli_fetch_array($queryProcessor)) {
                ?>
                    <option value="<?php echo $data['id_nilai']; ?>" hidden selected="true"><?php echo $result_query3[1][3]; ?></option>
                    <option value="<?php echo $data['id_nilai']; ?>"><?php echo $data['keterangan']; ?></option>
                <?php
                }
                ?>
            </select>
            <!-- option select processor -->

            <!-- option select RAM -->
            <input type="text" class="form-control" name="id_ram" id="id_ram" aria-describedby="ram" style="width: 50%;" value="<?php echo $result_query3[2][0]; ?>" hidden>
            <label for="ram" class="form-label mt-4">RAM:</label>
            <select class="form-select select-alternative" style="width:50%;" name="ram" id="ram" required>
                <?php
                while ($data = mysqli_fetch_array($queryRAM)) {
                ?>
                    <option value="<?php echo $data['id_nilai']; ?>" hidden selected="true"><?php echo $result_query3[2][3]; ?></option>
                    <option value="<?php echo $data['id_nilai']; ?>"><?php echo $data['keterangan']; ?></option>
                <?php
                }
                ?>
            </select>
            <!-- option select RAM -->

            <!-- option select storage -->
            <input type="text" class="form-control" name="id_storage" id="id_storage" aria-describedby="storage" style="width: 50%;" value="<?php echo $result_query3[3][0]; ?>" hidden>
            <label for="storage" class="form-label mt-4">Storage:</label>
            <select class="form-select select-alternative" style="width:50%;" name="storage" id="storage" required>
                <?php
                while ($data = mysqli_fetch_array($queryHDD)) {
                ?>
                    <option value="<?php echo $data['id_nilai']; ?>" hidden selected="true"><?php echo $result_query3[3][3]; ?></option>
                    <option value="<?php echo $data['id_nilai']; ?>"><?php echo $data['keterangan']; ?></option>
                <?php
                }
                ?>
            </select>
            <!-- option select storage -->

            <!-- option select baterai -->
            <input type="text" class="form-control" name="id_baterai" id="id_baterai" aria-describedby="baterai" style="width: 50%;" value="<?php echo $result_query3[4][0]; ?>" hidden>
            <label for="battery" class="form-label mt-4">Baterry:</label>
            <select class="form-select select-alternative" style="width:50%;" name="battery" id="battery" required>
                <?php
                while ($data = mysqli_fetch_array($queryBattery)) {
                ?>
                    <option value="<?php echo $data['id_nilai']; ?>" hidden selected="true"><?php echo $result_query3[4][3]; ?></option>
                    <option value="<?php echo $data['id_nilai']; ?>"><?php echo $data['keterangan']; ?></option>
                <?php
                }
                ?>
            </select>
            <!-- option select baterai -->

            <!-- option select VGA -->
            <input type="text" class="form-control" name="id_vga" id="id_vga" aria-describedby="harga" style="width: 50%;" value="<?php echo $result_query3[5][0]; ?>" hidden>
            <label for="vga" class="form-label mt-4">VGA:</label>
            <select class="form-select select-alternative" style="width:50%;" name="vga" id="vga" required>
                <?php
                while ($data = mysqli_fetch_array($queryVGA)) {
                ?>
                    <option value="<?php echo $data['id_nilai']; ?>" hidden selected="true"><?php echo $result_query3[5][3]; ?></option>
                    <option value="<?php echo $data['id_nilai']; ?>"><?php echo $data['keterangan']; ?></option>
                <?php
                }
                ?>
            </select>
            <!-- option select VGA -->

            <!-- option select layar -->
            <input type="text" class="form-control" name="id_layar" id="id_layar" aria-describedby="layar" style="width: 50%;" value="<?php echo $result_query3[6][0]; ?>" hidden>
            <label for="layar" class="form-label mt-4">Layar:</label>
            <select class="form-select select-alternative" style="width:50%;" name="layar" id="layar" required>
                <?php
                while ($data = mysqli_fetch_array($queryLayar)) {
                ?>
                    <option value="<?php echo $data['id_nilai']; ?>" hidden selected="true"><?php echo $result_query3[6][3]; ?></option>
                    <option value="<?php echo $data['id_nilai']; ?>"><?php echo $data['keterangan']; ?></option>
                <?php
                }
                ?>
            </select>
            <!-- option select layar -->

            <button type="submit" name="update" class="btn btn-primary mt-4">Submit</button>
        </form>
        <button id="tes">TEST</button>

    </div>

    <script>
        $(document).ready(function() {
            $('#laptop').on('change', function() {
                $('#form_n').removeAttr('hidden');
            });

            $('#tes').on('click', function() {
                laptop = $('#laptop').val();
                a = $('#harga').val();
                b = $('#processor').val()
                c = $('#ram').val()
                d = $('#vga').val()
                e = $('#battery').val()
                f = $('#storage').val()
                g = $('#layar').val()
                alert(a + ' ' + b + ' ' + c + ' ' + d + ' ' + e + ' ' + f + ' ' + g + ' ');
                //alert(b);

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