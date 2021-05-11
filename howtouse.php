<?php
require 'session.php';
require 'header.php';
require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How To Use | Laptopp</title>
</head>

<body>

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
                    <a class="nav-link" href="index.php">Home</a>
                    <a class="nav-link active" aria-current="page" href="#">How To Use</a>
                    <a class="nav-link" aria-current="page" href="about.php">About</a>
                    <a class="nav-link" href="https://github.com/jerichosiahaya/dss-saw-laptop">Github</a>
                </div>
            </div>
            <span class="navbar-text">
                <a href="logout.php"><button type="button" class="btn btn-outline-danger btn-sm">LOGOUT </button></a>
            </span>
        </div>
    </nav>

    <div class="container mt-4">
        <h3>How To Use</h3>
        <hr>
        <h5>1. Tambah Alternatif</h5>
        <img src="img/1.jpg" class="img-fluid" alt="...">
        <p>Masukkan merk laptop yang diinginkan dengan menekan tombol  <a href="index.php"><button class='btn btn-secondary' id="tambah"><i class="fas fa-plus"></i> Add</button></a> </p>
        <h5>2. Edit Kriteria</h5>
        <img src="img/2.jpg" class="img-fluid" alt="...">
        <p>Kriteria default telah di-assign sebelumnya, kamu bisa mengedit bobot kriteria sesuai keinginanmu dengan cara menekan tombol <a href="kriteria.php"><button class="btn btn-secondary"><span class="glyphicon glyphicon-edit"></span> <i class="fas fa-edit"></i> Edit</button> </p></a>
        <h5>3. Masukkan Nilai Alternatif</h5>
        <img src="img/3_1.jpg" class="img-fluid" alt="...">
        <img src="img/3_2.jpg" class="img-fluid" alt="...">
        <p>Terdapat 2 menu pada halaman nilai alternatif: <b>Sudah Ada Nilai Alternatif</b> dan <b>Belum Ada Alternatif</b>, sesuai namanya kalau kamu sudah memasukkan nilai alternatif pada salah satu daftar laptop maka laptop akan muncul di menu Sudah Ada Nilai Alternatif, jika belum maka akan muncul pada menu Belum Ada Alternatif. Masukkan nilai alternatif dengan menakan tombol <a href="insert_isi_nilai_alternatif.php"><button type="button" class="btn btn-success"><i class="fas fa-plus"></i> Insert</button></a> atau edit nilai alternatif dengan menekan tombol <a href="insert_nilai_alternatif.php"><button type="button" class="btn btn-secondary"><i class="fas fa-edit"> </i> Edit</button></a></p>
        <h5>4. Lihat Hasil Rank</h5>
        <img src="img/4.jpg" class="img-fluid" alt="...">
        <p> Hasil rank akan muncul setelah semua nilai alternatif dimasukkan. Sekarang kamu sudah bisa mengetahui laptop mana yang paling terbaik di antara daftar laptop yang sudah dimasukkan. </p>
        <p>Cheers!</p>
    </div>
</body>

</html>