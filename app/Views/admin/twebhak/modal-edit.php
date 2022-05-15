<?php foreach ($hak as $key => $value): ?>
<div class="modal" id="edit<?= $value['id_hak'] ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <h4 class="modal-title"><div class="text-left"><i class="fa fa-cog text-default"></i>&nbsp;Entry Data hak Barang</div></h4>
      </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/hak/update') ?>" class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="id_hak" class="col-md-3 control-label">Kode hak : </label>
            <div class="col-md-7">
              <input type="text" id="id_hak" name="id_hak" required placeholder=" 2 untuk Tanah, 3 untuk Peralatan Mesin dll" value="<?= $value['id_hak'] ?>" maxlength="3" class="form-control" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="uraian_hak" class="col-md-3 control-label">Uraian hak : </label>
            <div class="col-md-7">
              <input autofocus onfocus="this.setSelectionRange(this.value.length,this.value.length);" id="uraian_hak" type="text" value="<?= $value['uraian_hak'] ?>" name="uraian_hak" required placeholder=" Kode Bidang berdasarkan inputan golongan" class="form-control">
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