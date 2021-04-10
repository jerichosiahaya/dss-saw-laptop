<?php
include_once("config.php");
require_once 'session.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$sifat = $_POST['sifat'];
$weight = $_POST['weight'];

$update = "update kriteria set kriteria.weight = '$weight', kriteria.nama = '$nama', kriteria.sifat = '$sifat' where kriteria.id_kriteria = '$id'";

if (mysqli_query($conn, $update)) {
    echo json_encode(array("statusCode" => 200));
} else {
    echo json_encode(array("statusCode" => 201));
}
mysqli_close($conn);