<?php
include_once("config.php");
require_once 'session.php';
$id_alternatif = $_GET['id_alternatif'];
//echo $id_alternatif;

$delete1 = "delete from nilai_alternatif where id_alternatif = $id_alternatif";
$delete2 = "delete from alternatif where id_alternatif = $id_alternatif";

if (mysqli_query($conn, $delete1)) {
    if (mysqli_query($conn, $delete2)) {
        header('Location: index.php');
    }
}

// if ($conn->query($delete) === TRUE) {
//     header("Location: index.php");
// } else {
//     echo "Error deleting record: " . $conn->error;
// }
mysqli_close($conn);
