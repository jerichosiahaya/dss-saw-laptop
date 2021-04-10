<?php
	require_once 'config.php';
	
	if(ISSET($_POST['update'])){
		$id = $_POST['id_kriteria'];
		$nama = $_POST['nama'];
		$sifat= $_POST['sifat'];
		$weight = $_POST['weight'];
		
		mysqli_query($conn, "UPDATE `kriteria` SET `nama` = '$nama', `sifat` = '$sifat', `weight` = '$weight' WHERE `id_kriteria` = '$id'") or die(mysqli_error());

		header("location: kriteria.php");
	}
?>