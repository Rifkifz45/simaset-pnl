<div class="modal" id="import" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <h4 class="modal-title"><div class="text-left"><i class="fa fa-cog text-default"></i>&nbsp;Import Data Inventaris Tanah</div></h4>
      </div>
      <div class="modal-body">
        <form onSubmit="if(!confirm('Yakin ingin mengupload file ini?')){return false;}" id="validation-form" action="<?= site_url('admin/inventaris_gedung/import') ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label class="col-md-3 control-label">Import File : </label>
            <div class="col-md-7">
              <input type="file" name="file_excel" id="id-input-file-2" accept=".xlsx,.xls,.csv" required />
            </div>
          </div>
          <div class="form-group">
            <label for="bidang" class="col-md-3 control-label">Pilih Kategori : </label>
            <div class="col-md-7">
              <select name="opsi" class="form-control" id="opsi" required style="width: 100%;">
                <option value="" selected disabled> Choose Option ..</option>
                <option value="1">Bangunan dan Gedung</option>
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