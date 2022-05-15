<?php foreach ($penempatan as $key => $value): ?>
<div class="modal fade" id="reject<?php echo $value['idtransaksi_penempatan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><span class="label label-danger"> # Reject</span>&emsp;Are you sure want to reject this?</h5>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?= site_url('approver/penempatan/tolak/'.$value['idtransaksi_penempatan']) ?>">
					<div class="form-group">
						<label for="message-text" class="col-form-label">Message:</label>
						<textarea required class="form-control" name="keterangan" id="message-text"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-xs btn-danger">Reject</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach ?>