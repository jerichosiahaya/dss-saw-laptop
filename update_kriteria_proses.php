<?php

require_once 'config.php';
if (isset($_POST['update'])) {
	$id = $_POST['id_kriteria'];
	$nama = $_POST['nama'];
	$sifat = $_POST['sifat'];
	$weight = $_POST['weight'];

	// $queryCheckSUM = "select sum(weight) as total from kriteria where id_pengguna = $id";
	// $result = mysqli_query($conn, $queryCheckSUM);
	// $isMoreThan1 = mysqli_fetch_assoc($result);

	// if ($isMoreThan1['total'] > 1) {
	// 	//header('Location: kriteria.php');
	// 	$message = "wrong answer";
	// 	echo "<script type='text/javascript'>alert('$message');</script>";
	// 	//header('Location: kriteria.php');
	// } else {
	// 	mysqli_query($conn, "UPDATE `kriteria` SET `nama` = '$nama', `sifat` = '$sifat', `weight` = '$weight' WHERE `id_kriteria` = '$id'") or die(mysqli_error());
	// 	header("Location: kriteria.php");
	// }

	mysqli_query($conn, "UPDATE `kriteria` SET `nama` = '$nama', `sifat` = '$sifat', `weight` = '$weight' WHERE `id_kriteria` = '$id'") or die(mysqli_error());
	header("Location: kriteria.php");
}
