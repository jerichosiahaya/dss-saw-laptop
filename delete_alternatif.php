<?php
include_once("config.php");
require_once 'session.php';


$id_alternatif = $_GET['id_alternatif'];

echo $id_alternatif;

$delete = "delete from nilai_alternatif where id_alternatif = $id_alternatif; delete from alternatif where id_alternatif = $id_alternatif";

if ($conn->query($delete) === TRUE) {
    header("Location: index.php");
 } else {
     echo "Error deleting record: " . $conn->error;
 }
mysqli_close($conn);