<div class="modal fade" id="update_modal<?php echo $data['id_kriteria'] ?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="update_kriteria_proses.php">
				<div class="modal-header">
					<h3 class="modal-title">Edit Kriteria</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							<label class="mb-2">Nama Kriteria</label>
							<input type="hidden" name="id_kriteria" value="<?php echo $data['id_kriteria'] ?>" />
							<input type="text" name="nama" value="<?php echo $data['nama'] ?>" class="form-control" required="required" />
						</div>
						<div class="form-group mt-3">
							<label class="mb-2">Sifat Kriteria</label>
							<!-- <input type="text" name="sifat" value="<?php echo $data['sifat'] ?>" class="form-control" required="required" /> -->
							<select class="form-select" name="sifat">
<<<<<<< Updated upstream
								<option  hidden selected="true"><?php echo $data['sifat'] ?></option>
=======
								<option hidden selected="true"><?php echo $data['sifat'] ?></option>
>>>>>>> Stashed changes
								<option value="cost">cost</option>
								<option value="benefit">benefit</option>
							</select>
						</div>
						<div class="form-group mt-3">
							<label class="mb-2">Bobot Kriteria</label>
							<input type="text" name="weight" value="<?php echo $data['weight'] ?>" class="form-control" required="required" />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button name="update" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> SUBMIT</button>
					<button class="btn btn-danger" type="button" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CLOSE</button>
				</div>
		</div>
		</form>
	</div>
</div>
</div>