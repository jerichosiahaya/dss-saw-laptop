<?php
include_once("config.php");
require_once 'session.php';
$n1 = $_POST['n1'];
$n2 = $_POST['n2'];
$n3 = $_POST['n3'];
$n4 = $_POST['n4'];
$n5 = $_POST['n5'];
$n6 = $_POST['n6'];
$n7 = $_POST['n7'];
$laptop = $_POST['laptop'];
$insert = "INSERT INTO nilai_alternatif (id_alternatif, id_kriteria, id_nilai) VALUES ($laptop, 1, $n1), ($laptop, 2, $n2), ($laptop, 3, $n3), ($laptop, 4, $n4), ($laptop, 5, $n5), ($laptop, 6, $n6), ($laptop, 7, $n7)";
if (mysqli_query($conn, $insert)) {
    echo json_encode(array("statusCode" => 200));
} else {
    echo json_encode(array("statusCode" => 201));
}
mysqli_close($conn);
