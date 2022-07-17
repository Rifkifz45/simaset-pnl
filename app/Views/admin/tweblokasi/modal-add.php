<div class="modal" id="add" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <div class="col-md-3">
          <h4 class="modal-title"><div class="text-center">Entry Data Lokasi</div></h4>
        </div>
        <div class="col md-7">

        </div>
      </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/lokasi/create') ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="id_lokasi" class="col-md-3 control-label">Kode Lokasi : </label>
            <div class="col-md-7">
              <input type="text" id="id_lokasi" name="id_lokasi" required placeholder=" Kode Lokasi" value="" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="latitude" class="col-md-3 control-label">Lokasi : </label>
            <div class="col-md-5">
              <select class="form-control" name="id_gedung" id="id_gedung_modal" style="width:100%">
                <option value="" selected disabled>Pilih Gedung</option>
                <?php foreach ($gedung as $key => $value): ?>
                <option value="<?= $value['id_gedung'] ?>"><?= "(<b>" . $value['id_gedung'] . "</b>) " . $value['nama_gedung'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-md-2">
              <select class="form-control" name="lantai" id="lantai" style="width:100%">
              <option value="" disabled selected>Pilih Lantai</option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
            </select>
            </div>
          </div>

          <div class="form-group">
            <label for="latitude" class="col-md-3 control-label">Kategori : </label>
            <div class="col-md-7">
             <select class="form-control" name="id_kategori_lokasi" id="id_kategori_lokasi" style="width: 100%;">
              <option value="" selected disabled>Pilih Kategori</option>
              <?php foreach ($kategori as $key => $value): ?>
              <option value="<?= $value['id_kategori_lokasi'] ?>"><?= $value['nama_kategori_lokasi'] ?></option>
              <?php endforeach ?>
            </select>
            </div>
          </div>

          <div class="form-group">
            <label for="latitude" class="col-md-3 control-label">Penanggung Jawab : </label>
            <div class="col-md-7">
             <select id="pj_select2" class="form-control" name="id_pengguna" id="id_pengguna">
              <option value="" disabled selected>Pilih Penanggung Jawab</option>
              <?php foreach ($pengguna as $key => $value): ?>
                <option value="<?= $value['id_pengguna'] ?>"><?= $value['nama_pengguna'] ?></option>
              <?php endforeach ?>
            </select>
            </div>
          </div>

          <div class="form-group">
            <label for="nama_lokasi" class="col-md-3 control-label">Nama Lokasi : </label>
            <div class="col-md-7">
              <input autofocus id="nama_lokasi" type="text" name="nama_lokasi" required placeholder=" Masukan Nama Lokasi" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="luas_lokasi" class="col-md-3 control-label">Luas Lokasi : </label>
            <div class="col-md-7">
              <input id="luas_lokasi" type="text" name="luas_lokasi" required placeholder=" Masukan Luas Lokasi" class="form-control">
            </div>
          </div>

           <div class="form-group">
            <label for="foto_lokasi" class="col-md-3 control-label">Gambar : </label>
            <div class="col-md-7">
              <input type="file" id="id-input-file-2" name="foto_lokasi" accept=".jpg,.png" /><div id="foto-error" class="help-block">Jika anda tidak menambahkan gambar gedung. Gambar default akan disediakan!</div>
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