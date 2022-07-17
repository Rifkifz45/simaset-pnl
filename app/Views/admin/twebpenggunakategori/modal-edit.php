<?php foreach ($kategori as $key => $value): ?>
<div class="modal" id="edit<?= $value['id_kategori_pengguna'] ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
          <div class="col-md-7">
             <h4 class="modal-title"><div class="text-center">Update Data Pengguna Kategori</div></h4>
          </div>
          <div class="col md-3">
             
          </div>
       </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/pengguna-kategori/update') ?>" class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="nama_kategori_pengguna" class="col-md-3 control-label">Nama Kategori : </label>
            <div class="col-md-7">
              <input type="hidden" name="id_kategori_pengguna" name="id_kategori_pengguna" value="<?= $value['id_kategori_pengguna'] ?>">
              <input autofocus onfocus="this.setSelectionRange(this.value.length,this.value.length);" id="nama_kategori_pengguna" type="text" name="nama_kategori_pengguna" value="<?= $value['nama_kategori_pengguna'] ?>" required placeholder=" Nama Kategori" class="form-control">
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