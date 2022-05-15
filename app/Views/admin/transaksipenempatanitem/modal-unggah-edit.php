<!-- Unggah File -->
<div class="modal" id="editfile<?php echo $penempatan['idtransaksi_penempatan'] ?>" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary" style="padding: 1rem;">
				<h4 class="modal-title"><i class="fa fa-cog text-default"></i> Update Dokumen Penempatan</h4>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/penempatan/edit_dokumen') ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label">Unggah Dokumen</label>
						<div class="col-md-8">
							<input type="hidden" name="idtransaksi_penempatan" id="idtransaksi_penempatan" value="<?= $penempatan['idtransaksi_penempatan'] ?>">
							<input type="hidden" id="dokumen_before" name="dokumen_before" value="<?= $penempatan['dokumen'] ?>">
							<input type="file" accept=".pdf" name="dokumen" id="" maxlength="255" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save changes</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Unggah File -->