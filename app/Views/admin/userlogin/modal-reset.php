<?php foreach ($user as $key => $value) : ?>
<div id="reset<?php echo $value['id'] ?>" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="padding: 1rem;">
				<h5 class="modal-title"><h3 class="text-center"><b class="">Reset Password</b></h3><h5 class="text-center">Password <strong>"<?= $value['nama_user'] ?>"</strong> Will reset to 123</h5></h5>
			</div>
			<div class="modal-body" align="center">
				<form action="">
				<a href="<?= site_url('admin/user/reset/'.$value['id']) ?>" class="btn btn-warning">&nbsp; &nbsp;YES, Reset it&nbsp;&nbsp;<i class="fa fa-refresh" aria-hidden="true"></i>&nbsp; &nbsp;</a>
				</form>
			</div>
			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>