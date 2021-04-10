<?php
require_once 'session.php';
include_once 'header.php';
$result = mysqli_query($conn, "SELECT * FROM alternatif WHERE id_pengguna = $id");
?>

<!DOCTYPE html>
<html>
<!-- 
    Jericho C Siahaya
    Saturday, 10 April 2021
 -->

<head>
    <title>Home</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Nama Produk</th>
            </tr>
            <?php
            while ($data = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $data['nama'] . "</td>";
                echo "<td><a href='update.php'><button name='submit'>Ubah</button></a> | <a href='delete.php'><button name='delete'>Hapus</button></a></td></tr>"; //belum bisa ditekan
            }
            ?>
    </table>
    <button id="tambah">Add</button>
    <form action="" id="save" method="post" hidden>
        <label>Masukkan nama laptop:</label>
        <input type="text" id="nama" name="nama" placeholder="Nama Laptop" required>
        <button type="submit" id="simpan" name="submit">Submit</button>
    </form>
    <a href="kriteria.php">Kriteria</a>
    <script>
        $(document).ready(function() {

            $('#tambah').on('click', function() {
                $('#save').toggle('fast');
                // $(this).toggleClass('button-warning'); // to change button color, just in case
                $(this).text(function(i, v) {
                    return v === 'Add' ? 'Cancel' : 'Add'
                })
            });

            $('#simpan').on('click', function() {
                laptop = $('#nama').val();
                // alert(laptop);
                if (laptop != "") {
                    $.ajax({
                        type: "POST",
                        url: "insert_alternatif_process.php",
                        data: {
                            'nama': laptop,
                        },
                        cache: false,
                        success: function(dataResult) {
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