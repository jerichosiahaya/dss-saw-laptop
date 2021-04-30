<?php
require_once 'session.php';
include_once 'header.php';
require 'config.php';
$query_kriteria = mysqli_query($conn, "SELECT * FROM `kriteria`") or die(mysqli_error());
$jumlah_kriteria = mysqli_num_rows($query_kriteria);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
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

<body>

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
                <a class="nav-link" href="insert_nilai_alternatif.php">Nilai Alternatif</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page">Hasil</a>
            </li>
        </ul>
        <!-- tabs -->

        <!-- pills -->
        <ul class="nav nav-pills mb-3 mt-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active btn" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Alternatif dan Kriteria</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link btn" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Normalisasi</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link btn" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Pembobotan</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link btn" id="pills-result-tab" data-bs-toggle="pill" data-bs-target="#pills-result" type="button" role="tab" aria-controls="pills-result" aria-selected="false">Result</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <!-- alternatif dan kriteria, belum ada perhitungan -->
                <h5 class="text-center text-upper"> <u> DAFTAR ALTERNATIF DAN KRITERIA </u></h5>
                <table class="table table-hover mt-4">
                    <tr>
                        <th rowspan="2">Alternatif Laptop</th>
                    <tr>
                        <?php
                        $kriteria = mysqli_query($conn, "SELECT * FROM `kriteria` WHERE id_pengguna = $id") or die(mysqli_error());
                        while ($data = mysqli_fetch_array($kriteria)) {
                        ?>
                            <th>
                                <?php echo $data['nama']; ?></th>

                        <?php } ?>
                    </tr>

                    <?php
                    $alternatif = mysqli_query($conn, "SELECT * FROM alternatif WHERE id_pengguna = $id");
                    while ($data = mysqli_fetch_array($alternatif)) {
                    ?>
                        <tr>
                            <td>
                                <?php echo $data['nama']; ?>
                            </td>
                            <?php
                            $id = $data['id_alternatif'];
                            $nilai_alternatif = mysqli_query($conn, "select nilai_alternatif.*, nilai_kriteria.*from nilai_alternatif join nilai_kriteria on nilai_kriteria.id_nilai = nilai_alternatif.id_nilai where  nilai_alternatif.id_alternatif = $id");
                            while ($data =  mysqli_fetch_array($nilai_alternatif)) { ?>
                                <td>
                                    <?php echo $data['keterangan']; ?>
                                </td>

                            <?php } ?>
                        </tr>
                    <?php } ?>

                </table>
                <!-- alternatif dan kriteria, belum ada perhitungan -->
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <!-- normalisasi -->
                <h5 class="text-center"><u> NORMALISASI </u></h5>
                <table class="table table-hover mt-4">
                    <tr>
                        <th rowspan="2">Alternatif Laptop</th>
                    <tr>
                        <?php
                        $kriteria = mysqli_query($conn, "SELECT * FROM kriteria WHERE id_pengguna = $id2") or die(mysqli_error());
                        while ($data = mysqli_fetch_array($kriteria)) {
                        ?>
                            <th>
                                <?php echo $data['nama']; ?></th>

                        <?php } ?>
                    </tr>

                    <?php
                    $alternatif = mysqli_query($conn, "SELECT * FROM alternatif WHERE id_pengguna = $id2");
                    while ($data = mysqli_fetch_array($alternatif)) {
                    ?>
                        <tr>
                            <td>
                                <?php echo $data['nama']; ?>
                            </td>
                            <?php
                            $id = $data['id_alternatif'];

                            $hasil_normalisasi = 0;
                            $nilai_alternatif = mysqli_query($conn, "select nilai_alternatif.*, nilai_kriteria.*, kriteria.* from nilai_alternatif join nilai_kriteria on nilai_kriteria.id_nilai = nilai_alternatif.id_nilai join kriteria on kriteria.id_kriteria = nilai_alternatif.id_kriteria where nilai_alternatif.id_alternatif = $id AND id_pengguna = $id2");

                            while ($data =  mysqli_fetch_array($nilai_alternatif)) {
                                if ($data['sifat'] == "cost") {
                                    $id_kriteria = $data['id_kriteria'];
                                    $min = mysqli_query($conn, "select kriteria.*, nilai_alternatif.*, nilai_kriteria.id_nilai, nilai_kriteria.id_kriteria, nilai_kriteria.keterangan, MIN(nilai_kriteria.bobot) as min from nilai_alternatif
                    join nilai_kriteria on nilai_kriteria.id_nilai = nilai_alternatif.id_nilai 
                    join kriteria on kriteria.id_kriteria = nilai_alternatif.id_kriteria where kriteria.id_kriteria = $id_kriteria AND id_pengguna = $id2");

                                    while ($data_min = mysqli_fetch_array($min)) { ?>
                                        <td>

                                            <?php
                                            echo number_format($hasil = $data_min['min'] / $data['bobot'], 3);
                                            $hasil_kali = $hasil * $data['weight'];
                                            $hasil_normalisasi = $hasil_normalisasi + $hasil_kali;

                                            ?>

                                        </td>
                                    <?php } ?>

                                    <?php } elseif ($data['sifat'] == "benefit") {
                                    $id_kriteria = $data['id_kriteria'];
                                    $max = mysqli_query($conn, "select kriteria.*, nilai_alternatif.*, nilai_kriteria.id_nilai, nilai_kriteria.id_kriteria, nilai_kriteria.keterangan, MAX(nilai_kriteria.bobot) as max from nilai_alternatif
                join nilai_kriteria on nilai_kriteria.id_nilai = nilai_alternatif.id_nilai 
                join kriteria on kriteria.id_kriteria = nilai_alternatif.id_kriteria where kriteria.id_kriteria = $id_kriteria AND id_pengguna = $id2");
                                    while ($data_max = mysqli_fetch_array($max)) { ?>
                                        <td>

                                            <?php
                                            echo number_format($hasil = $data['bobot'] / $data_max['max'], 3);


                                            ?>

                                        </td>
                                    <?php   } ?>
                                <?php }
                                ?>

                        <?php }
                        } ?>
                        </tr>
                </table>
                <!-- normalisasi -->
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <!-- pembobotan -->
                <h5 class="text-center"> <u> PEMBOBOTAN </u> </h5>
                <table class="table table-hover table-bordered mt-3">
                    <!-- judul kolom alternatif, kriteria, dan hasil pembobotan -->
                    <tr>
                        <th rowspan="2">Alternatif Laptop</th>
                        <th colspan="<?php echo $jumlah_kriteria; ?>" class="text-center">Kriteria</th>
                        <th rowspan="2">Hasil Pembobotan</th>
                    <tr>
                        <!-- nama kriteria -->
                        <?php
                        $kriteria = mysqli_query($conn, "SELECT * FROM `kriteria`  WHERE id_pengguna = $id2") or die(mysqli_error());
                        while ($data = mysqli_fetch_array($kriteria)) {
                        ?>
                            <th><?php echo $data['nama']; ?></th>
                        <?php } ?>
                    </tr>
                    <?php
                    $hasil_ranks = array();
                    $alternatif = mysqli_query($conn, "SELECT * FROM alternatif WHERE id_pengguna = $id2");
                    while ($data = mysqli_fetch_array($alternatif)) {
                    ?>
                        <tr>
                            <td>
                                <?php echo $data['nama'];
                                $hasil_rank2['nama'] = $data['nama'];
                                ?>
                            </td>
                            <?php
                            $id = $data['id_alternatif'];
                            $hasil_normalisasi = 0;
                            $nilai_alternatif = mysqli_query($conn, "select nilai_alternatif.*, nilai_kriteria.*, kriteria.* from nilai_alternatif join nilai_kriteria on nilai_kriteria.id_nilai = nilai_alternatif.id_nilai join kriteria on kriteria.id_kriteria = nilai_alternatif.id_kriteria where nilai_alternatif.id_alternatif = $id and id_pengguna = $id2");
                            while ($data =  mysqli_fetch_array($nilai_alternatif)) {
                                if ($data['sifat'] == "cost") {
                                    $id_kriteria = $data['id_kriteria'];
                                    $min = mysqli_query($conn, "select kriteria.*, nilai_alternatif.*, nilai_kriteria.id_nilai, nilai_kriteria.id_kriteria, nilai_kriteria.keterangan, MIN(nilai_kriteria.bobot) as min from nilai_alternatif
                    join nilai_kriteria on nilai_kriteria.id_nilai = nilai_alternatif.id_nilai 
                    join kriteria on kriteria.id_kriteria = nilai_alternatif.id_kriteria where kriteria.id_kriteria = $id_kriteria and id_pengguna = $id2");
                                    while ($data_min = mysqli_fetch_array($min)) { ?>
                                        <td>
                                            <?php
                                            number_format($hasil = $data_min['min'] / $data['bobot'], 3);
                                            echo  number_format($hasil_kali = $hasil * $data['weight'], 3);
                                            $hasil_normalisasi = $hasil_normalisasi + $hasil_kali;
                                            ?>
                                        </td>
                                    <?php } ?>
                                    <?php } elseif ($data['sifat'] == "benefit") {
                                    $id_kriteria = $data['id_kriteria'];
                                    $max = mysqli_query($conn, "select kriteria.*, nilai_alternatif.*, nilai_kriteria.id_nilai, nilai_kriteria.id_kriteria, nilai_kriteria.keterangan, MAX(nilai_kriteria.bobot) as max from nilai_alternatif
                join nilai_kriteria on nilai_kriteria.id_nilai = nilai_alternatif.id_nilai 
                join kriteria on kriteria.id_kriteria = nilai_alternatif.id_kriteria where kriteria.id_kriteria = $id_kriteria");
                                    while ($data_max = mysqli_fetch_array($max)) { ?>
                                        <td>
                                            <?php
                                            number_format($hasil = $data['bobot'] / $data_max['max'], 3);
                                            echo  number_format($hasil_kali = $hasil * $data['weight'], 3);
                                            $hasil_normalisasi = $hasil_normalisasi + $hasil_kali;
                                            ?>
                                        </td>
                                    <?php   } ?>
                                <?php } ?>
                            <?php
                            }
                            ?>
                            <td>
                                <?php
                                $hasil_rank['nilai'] = $hasil_normalisasi;
                                $hasil_rank['nama'] = $hasil_rank2['nama'];
                                $hasil_rank['nilai'];
                                array_push($hasil_ranks, $hasil_rank);
                                echo number_format($hasil_normalisasi, 3);
                                ?>
                            </td>
                        <?php } ?>
                        </tr>
                </table>
                <!-- pembobotan -->
            </div>
            <div class="tab-pane fade" id="pills-result" role="tabpanel" aria-labelledby="pills-result-tab">
                <h5 class="text-center"><u>HASIL RANK</u></h5>
                <table class="table table-hover table-bordered mt-3">
                    <tr>
                        <th>Ranking</th>
                        <th>Alternatif Laptop</th>
                        <th>Nilai Akhir</th>
                    </tr>
                    <?php
                    $no = 1;
                    rsort($hasil_ranks);
                    foreach ($hasil_ranks as $rank) { ?>
                        <tr>
                            <td><?php echo $no++ ?></>
                            </td>
                            <td><?php echo $rank['nama']; ?></td>
                            <td><?php echo $rank['nilai']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <!-- pills -->










    </div>

</body>

</html>