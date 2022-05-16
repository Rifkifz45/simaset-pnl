<?php foreach ($user as $key => $value): ?>
<div class="modal" id="detail<?= $value['id'] ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <h4 class="modal-title"><div class="text-left">Detail Data <b><?= $value['nama_user'] ?></b></div></h4>
      </div>
      <div class="modal-body">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1">
						  	<img src="http://placekitten.com/400/252" />
						  </div>
						</div>						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?= $value['nama_user'] ?> (Admin)</h3>
						<table width="800" border="0" cellspacing="1" cellpadding="4" class="table-print">
						  <tr>
						    <td width="70">Username</td>
						    <td width="10"><b>:</b></td>
						    <td width="581" valign="top"><strong><?= $value['username'] ?></strong></td>
						  </tr>
						  <tr>
						    <td width="70">Email</td>
						    <td width="10"><b>:</b></td>
						    <td width="581" valign="top"><strong><?= $value['email'] ?></strong></td>
						  </tr>
						  <tr>
						    <td width="70">Phone</td>
						    <td width="10"><b>:</b></td>
						    <td width="581" valign="top"><strong><?= $value['phone'] ?></strong></td>
						  </tr>
						  <tr>
						    <td width="70">Level</td>
						    <td width="10"><b>:</b></td>
						    <td width="581" valign="top"><strong><?= $value['level'] ?></strong></td>
						  </tr>
						  <tr>
						    <td width="70">Status Akun</td>
						    <td width="10"><b>:</b></td>
						    <td width="581" valign="top"><strong><?= $value['status_akun'] ?></strong></td>
						  </tr>
						  <tr>
						    <td width="70">Created At</td>
						    <td width="10"><b>:</b></td>
						    <td width="581" valign="top"><strong><?= date("d/m/Y H:i:s", strtotime($value['created_at'])); ?> WIB</strong></td>
						  </tr>
						  <tr>
						    <td width="70">Created By</td>
						    <td width="10"><b>:</b></td>
						    <td width="581" valign="top"><strong><?= $value['status_akun'] ?></strong></td>
						  </tr>
						  <tr>
						    <td width="70">Updated At</td>
						    <td width="10"><b>:</b></td>
						    <td width="581" valign="top"><strong><?= $value['status_akun'] ?></strong></td>
						  </tr>
						  <tr>
						    <td width="70">Updated By</td>
						    <td width="10"><b>:</b></td>
						    <td width="581" valign="top"><strong><?= $value['status_akun'] ?></strong></td>
						  </tr>
						</table>
					</div>
				</div>
			</div>
		</div>
    </div>
    <div class="modal-footer">
		<button type="submit" class="btn btn-primary">Save changes</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	</div>
  </div>
</div>
</div>
<?php endforeach ?>

