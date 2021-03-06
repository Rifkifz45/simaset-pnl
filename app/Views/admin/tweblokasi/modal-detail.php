<?php foreach ($detail as $key => $value): ?>
<div class="modal" id="detail<?= $value->id_lokasi ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <h4 class="modal-title"><div class="text-left">Detail Data <b><?= $value->nama_lokasi ?></b></div></h4>
      </div>
      <div class="modal-body">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1">
						  	<img width="100%" src="<?= base_url('uploads/lokasi/'.$value->foto_lokasi) ?>" />
						  </div>
						</div>						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?= $value->nama_lokasi ?></h3>
						<div class="space-8"></div>
						<table width="800" border="0" cellspacing="1" cellpadding="4" class="table-print">
						  <tr>
						    <td width="100">Kode Lokasi</td>
						    <td width="10"><b>:</b></td>
						    <td width="581" valign="top"><strong><?= $value->id_lokasi ?></strong></td>
						  </tr>
						  <tr>
						    <td width="100">Nama Gedung</td>
						    <td width="10"><b>:</b></td>
						    <td width="581" valign="top"><strong><?= $value->nama_gedung ?></strong></td>
						  </tr>
						  <tr>
						    <td width="100">Kategori</td>
						    <td width="10"><b>:</b></td>
						    <td width="581" valign="top"><strong><?= $value->nama_kategori_lokasi ?></strong></td>
						  </tr>
						  <tr>
						    <td width="100">Penanggung Jawab</td>
						    <td width="10"><b>:</b></td>
						    <td width="581" valign="top"><strong><?= $value->nama_pengguna ?></strong></td>
						  </tr>
						  <tr>
						    <td width="100">Lantai</td>
						    <td width="10"><b>:</b></td>
						    <td width="581" valign="top"><strong><?= $value->lantai ?></strong></td>
						  </tr>
						  <tr>
						    <td width="100">Keterangan</td>
						    <td width="10"><b>:</b></td>
						    <td width="581" valign="top"><strong><?= $value->keterangan ?></strong></td>
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