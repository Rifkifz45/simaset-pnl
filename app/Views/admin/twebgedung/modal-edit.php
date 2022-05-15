<?php
$id_pengguna = 0;
?>

<?php foreach ($gedung as $key => $value): ?>
<div class="modal" id="edit<?= $value['id_gedung'] ?>" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary" style="padding: 1rem;">
				<h4 class="modal-title"><div class="text-left"><i class="fa fa-cog text-default"></i>&nbsp;Update Data Gedung</div></h4>
			</div>
			<div class="modal-body">
				<form id="validation-form" action="<?= site_url('admin/gedung/update') ?>" class="form-horizontal" method="POST">
					<div class="form-group">
						<label for="id_gedung" class="col-md-3 control-label">Kode Gedung : </label>
						<div class="col-md-7">
							<input type="text" id="id_gedung" name="id_gedung" required placeholder=" Kode Gedung" value="<?= $value['id_gedung'] ?>" class="form-control" readonly>
						</div>
					</div>
					<div class="form-group">
						<label for="nama_gedung" class="col-md-3 control-label">Nama Gedung : </label>
						<div class="col-md-7">
							<input onfocus="this.setSelectionRange(this.value.length,this.value.length);" autofocus id="nama_gedung" type="text" name="nama_gedung" value="<?= $value['nama_gedung'] ?>" required placeholder=" Masukan Nama Gedung" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="qty_lantai" class="col-md-3 control-label">Qty Lantai: : </label>
						<div class="col-md-7">
							<select class="form-control" name="qty_lantai" id="qty_lantai" style="width:100%">
								<option value="" disabled selected>Pilih Lantai</option>
								<option value="1" <?= $value['qty_lantai'] == "1" ? "selected" : null ?>>1</option>
								<option value="2" <?= $value['qty_lantai'] == "2" ? "selected" : null ?>>2</option>
								<option value="3" <?= $value['qty_lantai'] == "3" ? "selected" : null ?>>3</option>
								<option value="4" <?= $value['qty_lantai'] == "4" ? "selected" : null ?>>4</option>
								<option value="5" <?= $value['qty_lantai'] == "5" ? "selected" : null ?>>5</option>
								<option value="6" <?= $value['qty_lantai'] == "6" ? "selected" : null ?>>6</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="id_pengguna" class="col-md-3 control-label">Penanggung Jawab: </label>
						<div class="col-md-7">
							<?php $id_pengguna = $id_pengguna + 1 ?>
							<select class="form-control" name="id_pengguna" id="id_pengguna<?= $id_pengguna ?>" style="width:100%">
								<option value="" disabled selected>Pilih Penanggung Jawab:</option>
								<?php foreach ($pengguna as $key => $pb): ?>
								<option value="<?= $pb['id_pengguna'] ?>" <?= $value['id_pengguna'] == $pb['id_pengguna'] ? "selected" : null ?>><?= $pb['nama_pengguna'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="keterangan" class="col-md-3 control-label">Keterangan : </label>
						<div class="col-md-7">
							<textarea class="form-control" name="keterangan" id="keterangan"><?= $value['keterangan'] ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="keterangan" class="col-md-3 control-label">Ganti Gambar : </label>
						<div class="col-md-7">
							<input type="file" id="id-input-file-2" name="foto" accept=".jpg,.png" /><div id="foto-error" class="help-block">Jika anda mengganti gambar gedung ini. Gambar gedung awal akan dihapus dan tidak tersedia lagi!</div>
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
<?php endforeach ?>