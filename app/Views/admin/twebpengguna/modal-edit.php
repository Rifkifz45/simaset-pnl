<?php
$id_kategori_pengguna = 0;
$pangkat = 0;

foreach ($detail as $key => $value): ?>
<div class="modal" id="edit<?= $value->id_pengguna ?>" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <div class="col-md-3">
          <h4 class="modal-title"><div class="text-center">Update Data Pengguna</div></h4>
        </div>
        <div class="col md-7">

        </div>
      </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/pengguna/update') ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nama_pengguna" class="col-md-3 control-label">Nama Lengkap : </label>
            <div class="col-md-7">
              <input type="hidden" name="id_pengguna" id="id_pengguna" value="<?= $value->id_pengguna ?>">
              <input type="hidden" name="fotoLama" id="fotoLama" value="<?= $value->foto_pengguna ?>">
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
              <?php $id_kategori_pengguna = $id_kategori_pengguna + 1 ?>
              <select class="form-control chosen-select" name="id_kategori_pengguna" id="id_kategori_pengguna<?= $id_kategori_pengguna ?>" style="width:100%">
                <option value="" selected disabled>Pilih Kategori</option>
                <?php foreach ($kategori as $key => $kat): ?>
                  <option value="<?= $kat['id_kategori_pengguna'] ?>" <?= $value->id_kategori_pengguna == $kat['id_kategori_pengguna'] ? "selected" : null ?>><?= $kat['nama_kategori_pengguna'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="pangkat" class="col-md-3 control-label">Pangkat : </label>
            <div class="col-md-7">
              <?php $pangkat = $pangkat + 1 ?>
              <select name="pangkat" id="pangkat<?= $pangkat ?>" class="form-control chosen-select" style="width:100%">
                <option value="" selected disabled>Pilih Pangkat</option>
                <option value="Juru Muda" <?= $value->pangkat == "Juru Muda" ? "selected" : null ?>>Juru Muda</option>
                <option value="Juru Muda Tk.I" <?= $value->pangkat == "Juru Muda Tk.I" ? "selected" : null ?>>Juru Muda Tk.I</option>
                <option value="Juru" <?= $value->pangkat == "Juru" ? "selected" : null ?>>Juru</option>
                <option value="Juru Tk.I" <?= $value->pangkat == "Juru Tk.I" ? "selected" : null ?>>Juru Tk.I</option>
                <option value="Pengatur Muda" <?= $value->pangkat == "Pengatur Muda" ? "selected" : null ?>>Pengatur Muda</option>
                <option value="Pengatur Muda Tk.I" <?= $value->pangkat == "Pengatur Muda Tk.I" ? "selected" : null ?>>Pengatur Muda Tk.I</option>
                <option value="Pengatur" <?= $value->pangkat == "Pengatur" ? "selected" : null ?>>Pengatur</option>
                <option value="Pengatur Tk.I" <?= $value->pangkat == "Pengatur Tk.I" ? "selected" : null ?>>Pengatur Tk.I</option>
                <option value="Penata Muda" <?= $value->pangkat == "Penata Muda" ? "selected" : null ?>>Penata Muda</option>
                <option value="Penata Muda Tk.I" <?= $value->pangkat == "Penata Muda Tk.I" ? "selected" : null ?>>Penata Muda Tk.I</option>
                <option value="Penata" <?= $value->pangkat == "Penata" ? "selected" : null ?>>Penata</option>
                <option value="Penata Tk.I" <?= $value->pangkat == "Penata Tk.I" ? "selected" : null ?>>Penata Tk.I</option>
                <option value="Pembina" <?= $value->pangkat == "Pembina" ? "selected" : null ?>>Pembina</option>
                <option value="Pembina Tk.I" <?= $value->pangkat == "Pembina Tk.I" ? "selected" : null ?>>Pembina Tk.I</option>
                <option value="Pembina Utama Muda" <?= $value->pangkat == "Pembina Utama Muda" ? "selected" : null ?>>Pembina Utama Muda</option>
                <option value="Pembina Utama Madya" <?= $value->pangkat == "Pembina Utama Madya" ? "selected" : null ?>>Pembina Utama Madya</option>
                <option value="Pembina Utama" <?= $value->pangkat == "Pembina Utama" ? "selected" : null ?>>Pembina Utama</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="golongan" class="col-md-3 control-label">Golongan : </label>
            <div class="col-md-7">
              <input value="<?= $value->golongan ?>" id="golongan" type="text" name="golongan" required placeholder=" Golongan" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="jabatan" class="col-md-3 control-label">Jabatan : </label>
            <div class="col-md-7">
              <input type="text" id="jabatan" name="jabatan" required placeholder=" Jabatan" class="form-control" value="<?= $value->jabatan ?>">
            </div>
          </div>

          <div class="form-group">
	        <label for="foto_pengguna" class="col-md-3 control-label">Ganti Gambar : </label>
	        <div class="col-md-7">
	          <input type="file" id="id-input-file-2" name="foto_pengguna" />
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