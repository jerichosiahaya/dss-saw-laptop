<?php
require_once 'session.php';
include_once 'header.php';
$queryCheckSUM = "select sum(weight) as total from kriteria where id_pengguna = $id";
$result1 = mysqli_query($conn, $queryCheckSUM);
$tes = mysqli_fetch_assoc($result1);
$result2 = mysqli_query($conn, "select * FROM  alternatif WHERE alternatif.id_alternatif NOT IN (SELECT id_alternatif FROM nilai_alternatif) AND id_pengguna = $id");
$jumlahBelumIsi = mysqli_num_rows($result2);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" name="viewport" content="width-device-width, initial-scale=1" />
	<title>Kriteria | Laptopp</title>
</head>

<body>

	<input type="text" id="total_bobot" value="<?php echo $tes['total']; ?>" hidden>

	<!-- navbar -->
	<?php require 'navbar.php'; ?>
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
				<?php
				if ($jumlahBelumIsi > 0) {
					$classDisabled = "disabled";
				} else {
					$classDisabled = "";
				}
				?>
				<a class="nav-link <?php echo $classDisabled; ?>" href="hasil.php">Hasil</a>
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
				$query = mysqli_query($conn, "SELECT * FROM `kriteria` WHERE id_pengguna = $id") or die(mysqli_error($conn));
				while ($data = mysqli_fetch_array($query)) {
				?>
					<tr>
						<td><?php echo $data['nama'] ?></td>
						<td><?php echo $data['sifat'] ?></td>
						<td><?php echo $data['weight'] ?></td>
						<td><button class="btn btn-secondary" data-bs-toggle="modal" type="button" data-bs-target="#update_modal<?php echo $data['id_kriteria'] ?>"><span class="glyphicon glyphicon-edit"></span> <i class="fas fa-edit"></i> Edit</button></td>
					</tr>
				<?php

					include 'update_kriteria_modal.php';
				}
				?>
			</tbody>
		</table>
		<p>Total weight: <b id="totalWgth"></b></p>
		<div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
			Total <b>weight</b> harus memiliki nilai 1.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			totalWeight = $('#total_bobot').val();
			totalWeightMath = Math.floor(totalWeight * 100) / 100;
			//alert(totalWeightMath);
			$('#totalWgth').text(totalWeightMath);
			//$('#total_weight').val(totalWeightMath);
			var myBookId = $(this).data('id');
			$("#total_weight #bookId").val(myBookId);
		});
	</script>
</body>

</html>