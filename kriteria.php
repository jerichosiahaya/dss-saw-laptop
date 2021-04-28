<?php
require_once 'session.php';
include_once 'header.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" name="viewport" content="width-device-width, initial-scale=1" />
	<title>Kriteria | Laptopp</title>
</head>

<body>

	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="index.php">
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

	<div class="container mt-4">

		<!-- tabs -->
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" href="index.php">Alternatif</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="kriteria.php">Kriteria</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="insert_nilai_alternatif.php">Nilai Alternatif</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Hasil</a>
			</li>
		</ul>
		<!-- tabs -->

		<table class="table mt-4">
			<thead>
				<tr>
					<th>Nama Kriteria</th>
					<th>Sifat Kriteria</th>
					<th>Bobot (Weight)</th>
					<th></th>

				</tr>
			</thead>
			<tbody>
				<?php
				require 'config.php';
				$query = mysqli_query($conn, "SELECT * FROM `kriteria`") or die(mysqli_error());
				while ($data = mysqli_fetch_array($query)) {
				?>
					<tr>
						<td><?php echo $data['nama'] ?></td>
						<td><?php echo $data['sifat'] ?></td>
						<td><?php echo $data['weight'] ?></td>
						<td><button class="btn btn-secondary" data-bs-toggle="modal" type="button" data-bs-target="#update_modal<?php echo $data['id_kriteria'] ?>"><span class="glyphicon glyphicon-edit"></span> <i class="fas fa-edit"></i> EDIT</button></td>
					</tr>
				<?php

					include 'update_kriteria_modal.php';
				}
				?>
			</tbody>
		</table>

	</div>

</body>

</html>