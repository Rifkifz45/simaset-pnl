<!-- Unggah File -->
<?php foreach ($dist_ruangan as $key => $value): ?>
<div class="modal" id="unggahfoto<?= $value->idinventaris_peralatan ?>" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary" style="padding: 1rem;">
		        <div class="col-md-8">
		          <h4 class="modal-title"><div class="text-center">Unggah Foto untuk <b> <?= $value->nama_barang ?></b> dengan NUP: <b><?= $value->nup ?></b></div></h4>
		        </div>
		        <div class="col md-3">

		        </div>
		      </div>
			<div class="modal-body">
				<form action="<?= site_url('admin/inventaris_ruangan/addfoto') ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label">Unggah Dokumen</label>
						<div class="col-md-8">
							<input type="hidden" name="idinventaris_peralatan" id="idinventaris_peralatan" value="<?= $value->idinventaris_peralatan ?>">
							<input type="file" accept=".jpg,.jpeg,.png" name="foto_dbr" id="" maxlength="255" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Upload</button>
					<a href="<?= site_url('admin/inventaris_ruangan/reset/'.$value->idinventaris_peralatan) ?>" class="btn btn-success">Set Default</a>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Unggah File -->
<?php endforeach ?>