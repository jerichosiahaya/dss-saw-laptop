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
    <title>Nilai Alternatif</title>
</head>

<body>
    <form action="" id="option_laptop" name="option_laptop">
        <label for="laptop">Laptop:</label>
        <select name="choose_laptop" id="laptop">
            <option value="" disabled selected>---</option>
            <?php
            while ($data = mysqli_fetch_array($result)) {
            ?>
                <option value="<?php echo $data['id_alternatif']; ?>"><?php echo $data['nama']; ?></option>
            <?php
            }
            ?>
        </select>
        <input type="submit" id="submit" value="Submit">
        <br><br>
        <div id="form_n" hidden>
            <select name="n1" id="n1">
                <option value="" disabled selected>---</option>
                <?php
                while ($n1 = mysqli_fetch_array($query1)) {
                ?>
                    <option value="<?php echo $n1['id_nilai']; ?>"><?php echo $n1['keterangan']; ?></option>
                <?php
                }
                ?>
            </select>
            <br><br>
            <select name="n2" id="n2">
                <option value="" disabled selected>---</option>
                <?php
                while ($n2 = mysqli_fetch_array($query2)) {
                ?>
                    <option value="<?php echo $n2['id_nilai']; ?>"><?php echo $n2['keterangan']; ?></option>
                <?php
                }
                ?>
            </select>
            <br><br>
            <select name="n3" id="n3">
                <option value="" disabled selected>---</option>
                <?php
                while ($n3 = mysqli_fetch_array($query3)) {
                ?>
                    <option value="<?php echo $n3['id_nilai']; ?>"><?php echo $n3['keterangan']; ?></option>
                <?php
                }
                ?>
            </select>
            <br><br>
            <select name="n4" id="n4">
                <option value="" disabled selected>---</option>
                <?php
                while ($n4 = mysqli_fetch_array($query4)) {
                ?>
                    <option value="<?php echo $n4['id_nilai']; ?>"><?php echo $n4['keterangan']; ?></option>
                <?php
                }
                ?>
            </select>
            <br><br>
            <select name="n5" id="n5">
                <option value="" disabled selected>---</option>
                <?php
                while ($n5 = mysqli_fetch_array($query5)) {
                ?>
                    <option value="<?php echo $n5['id_nilai']; ?>"><?php echo $n5['keterangan']; ?></option>
                <?php
                }
                ?>
            </select>
            <br><br>
            <select name="n6" id="n6">
                <option value="" disabled selected>---</option>
                <?php
                while ($n6 = mysqli_fetch_array($query6)) {
                ?>
                    <option value="<?php echo $n6['id_nilai']; ?>"><?php echo $n6['keterangan']; ?></option>
                <?php
                }
                ?>
            </select>
            <br><br>
            <select name="n7" id="n7">
                <option value="" disabled selected>---</option>
                <?php
                while ($n7 = mysqli_fetch_array($query7)) {
                ?>
                    <option value="<?php echo $n7['id_nilai']; ?>"><?php echo $n7['keterangan']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <button id="tes">TEST</button>
    </form>

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