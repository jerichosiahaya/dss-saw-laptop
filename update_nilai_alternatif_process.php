<?php

require_once 'config.php';
if (isset($_POST['update'])) {
    $id_harga = $_POST['id_harga'];
    $id_processor = $_POST['id_processor'];
    $id_ram = $_POST['id_ram'];
    $id_vga = $_POST['id_vga'];
    $id_battery = $_POST['id_baterai'];
    $id_layar = $_POST['id_layar'];
    $id_storage = $_POST['id_storage'];

    $id = $_POST['chosen_laptop'];
    $harga = $_POST['harga'];
    $processor = $_POST['processor'];
    $ram = $_POST['ram'];
    $vga = $_POST['vga'];
    $layar = $_POST['layar'];
    $battery = $_POST['battery'];
    $storage = $_POST['storage'];

    // INSERT INTO nilai_alternatif (id_nilai_alternatif, id_alternatif, id_kriteria, id_nilai) VALUES ($id_harga, $id, 1, $harga), ($id_processor, $id, 2, $processor), ($id_ram, $id, 3, $ram), ($id_storage, $id, 4, $storage), ($id_battery, $id, 5, $battery), ($id_vga, $id, 6, $vga), ($id_layar, $id, 7, $layar) ON DUPLICATE KEY UPDATE id_kriteria=VALUES(id_kriteria), id_nilai=VALUES(id_nilai)
    mysqli_query($conn, "INSERT INTO nilai_alternatif (id_nilai_alternatif, id_alternatif, id_kriteria, id_nilai) VALUES ($id_harga, $id, 1, $harga), ($id_processor, $id, 2, $processor), ($id_ram, $id, 3, $ram), ($id_storage, $id, 4, $storage), ($id_battery, $id, 5, $battery), ($id_vga, $id, 6, $vga), ($id_layar, $id, 7, $layar) ON DUPLICATE KEY UPDATE id_kriteria=VALUES(id_kriteria), id_nilai=VALUES(id_nilai)") or die(mysqli_error());
    header("Location: insert_nilai_alternatif.php");
}
