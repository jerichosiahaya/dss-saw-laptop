<?php
	require_once 'config.php';
	require_once 'session.php';
	
	if(ISSET($_POST['update'])){
		$id2 = $_POST['id_alternatif'];
		$nama = $_POST['nama'];
	
		
		mysqli_query($conn, "UPDATE `alternatif` SET `nama` = '$nama' WHERE `id_alternatif` = '$id2' AND `id_pengguna` = '$id'") or die(mysqli_error());

		header("location: index.php");
	}
?>