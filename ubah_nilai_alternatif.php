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


        <form action="" id="option_laptop" name="option_laptop" class="mt-4">

            <!-- option select -->
            <label for="laptop" class="mb-3">Laptop:</label>
            <select class="form-select select-alternative" style="width:50%;" name="choose_laptop" id="laptop">
                <option value="" disabled selected>---</option>
                <?php
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <option value="<?php echo $data['id_alternatif']; ?>"><?php echo $data['nama']; ?></option>
                <?php
                }
                ?>
            </select>
            <!-- option select -->

            <input type="submit" class="btn btn-primary mt-3" id="submit" value="Submit">

            <br><br>
            <div id="form_n" hidden>

                <!-- harga -->
                <select class="form-select select-alternative" style="width:50%;" name="n1" id="n1">
                    <option value="" disabled selected>---</option>
                    <?php
                    while ($n1 = mysqli_fetch_array($query1)) {
                    ?>
                        <option value="<?php echo $n1['id_nilai']; ?>"><?php echo $n1['keterangan']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <!-- harga -->
                <br><br>

                <!-- processor -->
                <select class="form-select select-alternative" style="width:50%;" name="n2" id="n2">
                    <option value="" disabled selected>---</option>
                    <?php
                    while ($n2 = mysqli_fetch_array($query2)) {
                    ?>
                        <option value="<?php echo $n2['id_nilai']; ?>"><?php echo $n2['keterangan']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <!-- processor -->
                <br><br>

                <!-- ram -->
                <select class="form-select select-alternative" style="width:50%;" name="n3" id="n3">
                    <option value="" disabled selected>---</option>
                    <?php
                    while ($n3 = mysqli_fetch_array($query3)) {
                    ?>
                        <option value="<?php echo $n3['id_nilai']; ?>"><?php echo $n3['keterangan']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <!-- ram -->
                <br><br>

                <!-- hdd -->
                <select class="form-select select-alternative" style="width:50%;" name="n4" id="n4">
                    <option value="" disabled selected>---</option>
                    <?php
                    while ($n4 = mysqli_fetch_array($query4)) {
                    ?>
                        <option value="<?php echo $n4['id_nilai']; ?>"><?php echo $n4['keterangan']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <!-- hdd -->
                <br><br>

                <!-- baterai -->
                <select class="form-select select-alternative" style="width:50%;" name="n5" id="n5">
                    <option value="" disabled selected>---</option>
                    <?php
                    while ($n5 = mysqli_fetch_array($query5)) {
                    ?>
                        <option value="<?php echo $n5['id_nilai']; ?>"><?php echo $n5['keterangan']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <!-- baterai -->
                <br><br>

                <!-- vga -->
                <select class="form-select select-alternative" style="width:50%;" name="n6" id="n6">
                    <option value="" disabled selected>---</option>
                    <?php
                    while ($n6 = mysqli_fetch_array($query6)) {
                    ?>
                        <option value="<?php echo $n6['id_nilai']; ?>"><?php echo $n6['keterangan']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <!-- vga -->
                <br><br>

                <!-- layar -->
                <select class="form-select select-alternative" style="width:50%;" name="n7" id="n7">
                    <option value="" disabled selected>---</option>
                    <?php
                    while ($n7 = mysqli_fetch_array($query7)) {
                    ?>
                        <option value="<?php echo $n7['id_nilai']; ?>"><?php echo $n7['keterangan']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <!-- layar -->

            </div>
            <button id="tes">TEST</button>
        </form>
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