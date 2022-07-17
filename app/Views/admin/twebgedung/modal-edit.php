<?php
$id_pengguna = 0;
?>

<?php foreach ($gedung as $key => $value): ?>
<div class="modal" id="edit<?= $value['id_gedung'] ?>" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary" style="padding: 1rem;">
		        <div class="col-md-3">
		          <h4 class="modal-title"><div class="text-center">Update Data Gedung</div></h4>
		        </div>
		        <div class="col md-7">

		        </div>
		      </div>

		    <form id="validation-form" action="<?= site_url('admin/gedung/update') ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="form-group">
					<label for="id_gedung" class="col-md-3 control-label">Kode Gedung : </label>
					<div class="col-md-7">
						<input type="hidden" id="foto_gedung_lama" name="foto_gedung_lama" value="<?= $value['foto_gedung'] ?>">
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
	            <label for="latitude" class="col-md-3 control-label">Latitude : </label>
	            <div class="col-md-7">
	              <input id="latitude" type="text" name="latitude" required placeholder=" Masukan Latitude" value="<?= $value['latitude'] ?>" class="form-control">
	            </div>
	          </div>

	          <div class="form-group">
	            <label for="longitude" class="col-md-3 control-label">Longitude : </label>
	            <div class="col-md-7">
	              <input id="longitude" type="text" value="<?= $value['longitude'] ?>" name="longitude" required placeholder=" Masukan Longitude" class="form-control">
	            </div>
	          </div>

	          <div class="form-group">
	            <label for="keterangan" class="col-md-3 control-label">Keterangan : </label>
	            <div class="col-md-7">
	              <textarea placeholder="Keterangan" class="form-control" name="keterangan" id="keterangan"><?= $value['keterangan'] ?></textarea>
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
					<label for="foto_gedung" class="col-md-3 control-label">Ganti Gambar : </label>
					<div class="col-md-7">
						<input type="file" id="id-input-file-2" name="foto_gedung" accept=".jpg,.png" /><div id="foto-error" class="help-block">Jika anda mengganti gambar gedung ini. Gambar gedung awal akan dihapus dan tidak tersedia lagi!</div>
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