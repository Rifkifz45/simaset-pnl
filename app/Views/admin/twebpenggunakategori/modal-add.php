<div class="modal" id="add" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <h4 class="modal-title"><div class="text-left"><i class="fa fa-cog text-default"></i>&nbsp;Entry Data Kategori Pengguna</div></h4>
      </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/pengguna-kategori/create') ?>" class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="nama_kategori_pengguna" class="col-md-3 control-label">Nama Kategori : </label>
            <div class="col-md-7">
              <input autofocus id="nama_kategori_pengguna" type="text" name="nama_kategori_pengguna" required placeholder=" Nama Kategori" class="form-control">
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