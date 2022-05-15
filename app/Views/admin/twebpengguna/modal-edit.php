<?php foreach ($detail as $key => $value): ?>
<div class="modal" id="edit<?= $value->id_pengguna ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <h4 class="modal-title"><div class="text-left"><i class="fa fa-cog text-default"></i>&nbsp;Entry Data Pengguna</div></h4>
      </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/pengguna/update') ?>" class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="nama_pengguna" class="col-md-3 control-label">Nama Lengkap : </label>
            <div class="col-md-7">
              <input type="hidden" name="id_pengguna" id="id_pengguna" value="<?= $value->id_pengguna ?>">
              <input autofocus onfocus="this.setSelectionRange(this.value.length,this.value.length);" type="text" value="<?= $value->nama_pengguna ?>" id="nama_pengguna" name="nama_pengguna" required placeholder=" Nama Lengkap" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="nip" class="col-md-3 control-label">NIP : </label>
            <div class="col-md-7">
              <input id="nip" type="text" value="<?= $value->nip ?>" name="nip" required placeholder=" NIP / Identitas Lainnya" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="id_kategori_pengguna" class="col-md-3 control-label">Kategori : </label>
            <div class="col-md-7">
            <select id="" class="form-control" name="id_kategori_pengguna" id="id_kategori_pengguna" style="width:100%">
              <option value="" selected disabled>Pilih Kategori</option>
              <?php foreach ($kategori as $key => $value): ?>
                <option value="<?= $value['id_kategori_pengguna'] ?>"><?= $value['nama_kategori_pengguna'] ?></option>
              <?php endforeach ?>
            </select>
            </div>
          </div>

          <div class="form-group">
	        <label for="foto" class="col-md-3 control-label">Ganti Gambar : </label>
	        <div class="col-md-7">
	          <input type="file" id="id-input-file-2" name="foto" />
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