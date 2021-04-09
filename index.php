<?php

include("config.php");

#$result = mysqli_query($conn, "SELECT * from alternatif JOIN pengguna WHERE alternatif.id_pengguna = pengguna.id_pengguna");#
$result = mysqli_query($conn, "SELECT * from alternatif");

?>

<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi Perbandingan Laptop</title>
    <h1>Opsi Laptop</h1>
</head>
<body>
    <h2><a href="create.php"><button type="submit" name="save">Tambah Opsi</button></a></h2>
    <table>
        <thead>
            <tr>
                <th>Nama Produk</th>
            </tr>
    <?php
    while($data = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>".$data['nama']."</td>";
        //echo "<br></br>";
        echo "<td><a href='update.php'><button name='submit'>Ubah</button></a> | <a href='delete.php'><button name='delete'>Hapus</button></a></td></tr>"; //belum bisa ditekan
    }
    ?>
    </table>

</body>

</html>
