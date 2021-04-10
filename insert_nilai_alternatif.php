<?php
require_once 'session.php';
$result = mysqli_query($conn, "SELECT * FROM alternatif WHERE id_pengguna = $id");
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
</body>

</html>