<?php foreach ($kondisi as $key => $value): ?>
<div class="modal" id="edit<?= $value['id_kondisi'] ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <div class="col-md-7">
          <h4 class="modal-title"><div class="text-center">Update Data Satuan Barang</div></h4>
        </div>
        <div class="col md-3">

        </div>
      </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/kondisi/update') ?>" class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="id_kondisi" class="col-md-3 control-label">Kode Kondisi : </label>
            <div class="col-md-7">
              <input type="text" id="id_kondisi" name="id_kondisi" required placeholder=" 2 untuk Tanah, 3 untuk Peralatan Mesin dll" value="<?= $value['id_kondisi'] ?>" maxlength="3" class="form-control" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="uraian_kondisi" class="col-md-3 control-label">Uraian Kondisi : </label>
            <div class="col-md-7">
              <input autofocus onfocus="this.setSelectionRange(this.value.length,this.value.length);" id="uraian_kondisi" type="text" value="<?= $value['uraian_kondisi'] ?>" name="uraian_kondisi" required placeholder=" Kode Bidang berdasarkan inputan golongan" class="form-control">
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