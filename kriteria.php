<?php
require_once 'session.php';
include_once 'header.php';
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width-device-width, initial-scale=1"/>
	</head>
<body>
		<table>
			<thead>
				<tr>
					<th>Nama Kriteria</th>
					<th>Sifat Kriteria</th>
					<th>Bobot (Weight)</th>

				</tr>
			</thead>
			<tbody>
				<?php
					require 'config.php';
					$query = mysqli_query($conn, "SELECT * FROM `kriteria`") or die(mysqli_error());
					while($data = mysqli_fetch_array($query)){
				?>
				<tr>
					<td><?php echo $data['nama']?></td>
					<td><?php echo $data['sifat']?></td>
					<td><?php echo $data['weight']?></td>
					<td><button class="btn btn-warning" data-bs-toggle="modal" type="button" data-bs-target="#update_modal<?php echo $data['id_kriteria']?>"><span class="glyphicon glyphicon-edit"></span> Edit</button></td>
				</tr>
				<?php
					
					include 'update_kriteria_modal.php';
					
					}
				?>
			</tbody>
		</table>

</body>	
</html>