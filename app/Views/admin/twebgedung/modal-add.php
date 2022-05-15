<?php
$db = \Config\Database::connect();
$dataKode   = buatKode2("tweb_gedung", "");
//include "btnsimpan.php";
?>

<div class="modal" id="add" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <h4 class="modal-title"><div class="text-left"><i class="fa fa-cog text-default"></i>&nbsp;Entry Data Gedung</div></h4>
      </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/gedung/create') ?>" class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="id_gedung" class="col-md-3 control-label">Kode Gedung : </label>
            <div class="col-md-7">
              <input type="text" id="id_gedung" name="id_gedung" required placeholder=" Kode Gedung" value="<?= $dataKode ?>" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="nama_gedung" class="col-md-3 control-label">Nama Gedung : </label>
            <div class="col-md-7">
              <input autofocus id="nama_gedung" type="text" name="nama_gedung" required placeholder=" Masukan Nama Gedung" class="form-control">
            </div>
          </div>

           <div class="form-group">
            <label for="qty_lantai" class="col-md-3 control-label">Qty Lantai: : </label>
            <div class="col-md-7">
              <select class="form-control" name="qty_lantai" id="qty_lantai" style="width:100%">
        				<option value="" disabled selected>Pilih Lantai</option>
        				<option value="1">1</option>
        				<option value="2">2</option>
        				<option value="3">3</option>
        				<option value="4">4</option>
        				<option value="5">5</option>
        				<option value="6">6</option>
        			</select>
            </div>
          </div>

           <div class="form-group">
            <label for="id_pengguna" class="col-md-3 control-label">Penanggung Jawab: </label>
            <div class="col-md-7">
              <select class="form-control" name="id_pengguna" id="id_pengguna" style="width:100%">
				<option value="" disabled selected>Pilih Penanggung Jawab:</option>
				<?php foreach ($pengguna as $key => $value): ?>
					<option value="<?= $value['id_pengguna'] ?>"><?= $value['nama_pengguna'] ?></option>
				<?php endforeach ?>
			</select>
            </div>
          </div>

           <div class="form-group">
            <label for="keterangan" class="col-md-3 control-label">Keterangan : </label>
            <div class="col-md-7">
              <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
            </div>
          </div>
           <div class="form-group">
            <label for="keterangan" class="col-md-3 control-label">Gambar : </label>
            <div class="col-md-7">
              <input type="file" id="id-input-file-2" name="foto" accept=".jpg,.png" /><div id="foto-error" class="help-block">Jika anda tidak menambahkan gambar gedung. Gambar default akan disediakan!</div>
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