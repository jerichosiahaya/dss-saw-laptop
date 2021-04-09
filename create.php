<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi Perbandingan Laptop</title>
</head>
<body>
    <h2>Halaman Input</h2>
    <form action="create.php" method="post">
    <a href="index.php">Kembali ke Beranda</a> 
    <br></br>
    <label>Masukkan nama laptop:</label>
    <input type="text" name="nama" placeholder="Nama Laptop" required>
    <h2><button type="submit" name="submit">Simpan</button></h2>
    
    <?php
    if (isset($_POST['submit'])){
        $nama = $_POST['nama'];

        include("config.php");
        $result = mysqli_query($conn, "INSERT INTO alternatif(nama) VALUES ('$nama')");
        header("Location: index.php");
        mysqli_close($conn);
    }
    ?>
    </form>
</body>

</html>
