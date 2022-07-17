<!-- Unggah File -->
<div class="modal" id="unggahfile" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary" style="padding: 1rem;">
				<div class="col-md-4">
					<h4 class="modal-title">
						<div class="text-center">Unggah Dokumen</div>
					</h4>
				</div>
		        <div class="col md-6">

		        </div>
		    </div>
			<div class="modal-body">
				<form action="<?= site_url('admin/penempatan/add_dokumen') ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label">Unggah Dokumen</label>
						<div class="col-md-8">
							<input type="hidden" name="idtransaksi_penempatan" id="idtransaksi_penempatan" value="<?= $penempatan['idtransaksi_penempatan'] ?>">
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