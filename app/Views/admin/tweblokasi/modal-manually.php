<div class="modal" id="add-manually" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <h4 class="modal-title"><div class="text-left"><i class="fa fa-cog text-default"></i>&nbsp;Tambah Data Lokasi Lainnya</div></h4>
      </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/lokasi/lainnya') ?>" class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="id_lokasi" class="col-md-3 control-label">Kode Lokasi : </label>
            <div class="col-md-7">
              <input autofocus type="text" id="id_lokasi" name="id_lokasi" required placeholder="Mis 0.POS.001" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="nama_lokasi" class="col-md-3 control-label">Nama Lokasi : </label>
            <div class="col-md-7">
              <input id="nama_lokasi" type="text" name="nama_lokasi" required placeholder=" Mis POS SATPAM 1" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="id_kategori_lokasi" class="col-md-3 control-label">Kategori : </label>
            <div class="col-md-7">
            <select id="kategori_modal" class="form-control" name="id_kategori_lokasi" id="id_kategori_lokasi" style="width:100%">
              <option value="" selected disabled>Pilih Kategori</option>
              <?php foreach ($kategori as $key => $value): ?>
              <option value="<?= $value['id_kategori_lokasi'] ?>"><?= $value['nama_kategori_lokasi'] ?></option>
              <?php endforeach ?>
            </select>
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