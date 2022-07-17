<?php foreach ($penempatan as $key => $value): ?>
<div class="modal fade" id="approve<?php echo $value['idtransaksi_penempatan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-success" style="padding: 1rem;">
		        <div class="col-md-3">
		          <h4 class="modal-title"><div class="text-center">Terima Permintaan Penempatan</div></h4>
		        </div>
		        <div class="col md-7">

		        </div>
		      </div>
			<div class="modal-body">
				<form method="POST" action="<?= site_url('approver/penempatan/terima/'.$value['idtransaksi_penempatan']) ?>">
					<div class="form-group">
						<label for="message-text" class="col-form-label">Message:</label>
						<textarea required class="form-control" name="response" id="response"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-xs btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-xs btn-success">Approve</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach ?>