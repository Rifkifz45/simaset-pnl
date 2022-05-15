<div class="modal" id="add" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <h4 class="modal-title"><div class="text-left"><i class="fa fa-cog text-default"></i>&nbsp;Entry Data Satuan Barang</div></h4>
      </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/satuan/create') ?>" class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="id_satuan" class="col-md-3 control-label">Kode Satuan : </label>
            <div class="col-md-7">
              <input autofocus type="text" id="id_satuan" name="id_satuan" required maxlength="3" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="uraian_satuan" class="col-md-3 control-label">Uraian Satuan : </label>
            <div class="col-md-7">
              <input id="uraian_satuan" type="text" value="*" name="uraian_satuan" required placeholder=" Kode Bidang berdasarkan inputan golongan" class="form-control">
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