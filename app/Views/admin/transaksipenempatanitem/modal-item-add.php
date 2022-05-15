<!-- Tambah Aset for Placement -->
<div class="modal" id="tambahitem" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary" style="padding: 1rem;">
				<h4 class="modal-title"><i class="fa fa-cog text-default"></i> Tambah Aset untuk Ditempatkan</h4>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/penempatanitem/create') ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label">Kode/Label Barang</label>
						<div class="col-md-6">
							<input type="hidden" id="id" name="id">
							<input type="hidden" id="idtransaksi_penempatan" name="idtransaksi_penempatan" value="<?= $penempatan['idtransaksi_penempatan'] ?>">
							<input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder=" Kode Barang" required>
						</div>
						<div class="col-md-2">
							<input type="text" class="form-control" name="nup" id="nup" placeholder=" NUP" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-8">
							<a class="btn btn-xs btn-success" href="javaScript:void(0)" onclick="window.open('<?= site_url('admin/penempatan/pencarian_barang') ?>','Pencarian Barang','toolbar=yes,scrollbars=yes,resizable=yes,top=30,width=800,height=800')" target="_SELF"><i class="fa fa-search-plus"></i>&nbsp;Search Items</a>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-8">
							<input type="text" readonly class="form-control" placeholder=" Nama Barang" name="nama_barang" id="nama_barang">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Pengguna</label>
						<div class="col-md-8">
							<select name="id_pengguna_modal" id="id_pengguna_modal" class="form-control" style="width:100%">
								<option value="1">Pilih Pengguna</option>
								<?php foreach ($pengguna as $key => $value): ?>
									<option value="<?= $value['id_pengguna'] ?>"><?= $value['nama_pengguna'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Pengguna</label>
						<div class="col-md-8">
							<select name="id_hak_modal" id="id_hak_modal" class="form-control" style="width:100%">
								<option value="1">Pilih Hak</option>
								<?php foreach ($hak as $key => $value): ?>
									<option value="<?= $value['id_hak'] ?>"><?= $value['uraian_hak'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Tambah</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END TAMBAH ASET -->