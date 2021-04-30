<div class="modal fade" id="update_modal<?php echo $data['id_alternatif'] ?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="update_nama_alternatif_proses.php">
				<div class="modal-header">
					<h3 class="modal-title">Edit Alternatif</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							<label class="mb-2">Nama Alternatif Laptop</label>
							<input type="hidden" name="id_alternatif" value="<?php echo $data['id_alternatif'] ?>" />
							<input type="text" name="nama" value="<?php echo $data['nama'] ?>" class="form-control" required="required" />
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