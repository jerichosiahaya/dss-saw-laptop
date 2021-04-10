<?php
include_once("config.php");
require_once 'session.php';
$nama = $_POST['nama'];
$insert = "INSERT INTO alternatif (nama, id_pengguna) VALUES ('$nama', $id)";
if (mysqli_query($conn, $insert)) {
    echo json_encode(array("statusCode" => 200));
} else {
    echo json_encode(array("statusCode" => 201));
}
mysqli_close($conn);
