<?php foreach ($perolehan as $key => $value): ?>
<div class="modal" id="edit<?= $value['id_perolehan'] ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <h4 class="modal-title"><div class="text-left"><i class="fa fa-cog text-default"></i>&nbsp;Entry Data Perolehan Barang</div></h4>
      </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/perolehan/update') ?>" class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="id_perolehan" class="col-md-3 control-label">Kode Perolehan : </label>
            <div class="col-md-7">
              <input type="text" id="id_perolehan" name="id_perolehan" required placeholder=" 2 untuk Tanah, 3 untuk Peralatan Mesin dll" value="<?= $value['id_perolehan'] ?>" maxlength="3" class="form-control" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="uraian_perolehan" class="col-md-3 control-label">Uraian Perolehan : </label>
            <div class="col-md-7">
              <input autofocus onfocus="this.setSelectionRange(this.value.length,this.value.length);" id="uraian_perolehan" type="text" value="<?= $value['uraian_perolehan'] ?>" name="uraian_perolehan" required placeholder=" Kode Bidang berdasarkan inputan golongan" class="form-control">
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