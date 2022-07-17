<?php foreach ($penempatan as $key => $value): ?>
<div class="modal fade" id="review<?php echo $value['idtransaksi_penempatan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary" style="padding: 1rem;">
		        <div class="col-md-7">
		          <h4 class="modal-title"><div class="text-center">Review Permintaan Penempatan</div></h4>
		        </div>
		        <div class="col md-3">

		        </div>
		      </div>
			<div class="modal-body">
				<form method="POST" action="<?= site_url('approver/penempatan/review/'.$value['idtransaksi_penempatan']) ?>">
					<div class="control-group">
						<label class="control-label">Update Status Penempatan :</label>

						<div class="checkbox">
							<label>
								<input value="Pending" name="review" type="checkbox" class="ace ace-checkbox-2">
								<span class="lbl"> Pending</span>
							</label>
						</div>

						<div class="checkbox">
							<label>
								<input value="Accepted" <?= $value['status_penempatan'] == "Accepted" ? "disabled" : NULL ?> name="review" type="checkbox" class="ace ace-checkbox-2">
								<span class="lbl"> Accepted</span>
							</label>
						</div>

						<div class="checkbox">
							<label>
								<input value="Rejected" <?= $value['status_penempatan'] == "Rejected" ? "disabled" : NULL ?> name="review" class="ace ace-checkbox-2" type="checkbox">
								<span class="lbl"> Rejected</span>
							</label>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label">Message :</label>
						<textarea autofocus required name="response" class="form-control" id="form-field-8" placeholder="Default Text">No Message ...</textarea>
					</div>
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-sm btn-danger">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach ?>