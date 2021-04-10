<div class="modal fade" id="update_modal<?php echo $data['id_kriteria']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="update_kriteria_proses.php">
				<div class="modal-header">
					<h3 class="modal-title">Update User</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							<label>Firstname</label>
							<input type="hidden" name="id_kriteria" value="<?php echo $data['id_kriteria']?>"/>
							<input type="text" name="nama" value="<?php echo $data['nama']?>" class="form-control" required="required"/>
						</div>
						<div class="form-group">
							<label>Lastname</label>
							<input type="text" name="sifat" value="<?php echo $data['sifat']?>" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Address</label>
							<input type="text" name="weight" value="<?php echo $data['weight']?>" class="form-control" required="required"/>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button name="update" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Update</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>