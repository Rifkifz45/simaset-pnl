<div id="unggahfile" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Master Data User</h4>
			</div>
			<div class="col-sm-12">
				<div class="modal-body">
					<form action="<?= site_url('pages/admin/detailmutasi/unggah/') ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label">Unggah Dokumen</label>
							<div class="col-md-8">
								<input type="file" name="dokumen" id="dokumen" maxlength="255" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-8">
								<button type="submit" name="save" value="save" class="btn btn-primary"><i class="fas fa-save"></i> &nbsp;Save</button>&nbsp;
								<a type="button" class="btn btn-default active" data-dismiss="modal" aria-hidden="true"><i class="ion-arrow-return-left"></i>&nbsp;Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer no-margin-top">
			</div>
		</div>
	</div>
</div>