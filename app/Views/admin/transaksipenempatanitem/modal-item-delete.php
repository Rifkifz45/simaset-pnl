<?php
foreach ($item as $key => $value) : ?>
<div id="deleteitem<?php echo $value->idtransaksi_penempatan_item ?>" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="padding: 1rem;">
				<h5 class="modal-title"><h3 class="text-center"><b class="">Delete Temp Barang?</b></h3><h5 class="text-center">Are you sure want to delete <strong>this</strong>? You can't undo this action</h5></h5>
			</div>
			<div class="modal-body" align="center">
				<div class="alert alert-danger" role="alert">
				  <h4 class="alert-heading"><i class="fa fa-exclamation-triangle"></i> Warning</h4>
				  <p>By deleting this data, It may affected other table</p>
				</div>
				<a href="javascript:;" data-dismiss="modal" class="btn btn-success">NO, Cancel</a>
				<a href="<?= site_url('admin/penempatanitem/delete/'.$value->idtransaksi_penempatan_item) ?>" class="btn btn-danger">&nbsp; &nbsp;YES, Delete it&nbsp;&nbsp;<i class="fa fa-trash fa-lg"></i>&nbsp; &nbsp;</a>
			</div>
			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>