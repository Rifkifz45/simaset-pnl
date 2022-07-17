<?php
$db = \Config\Database::connect();
$dataKode   = buatKode2("tweb_perolehan", "P");
?>

<div class="modal" id="add" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <div class="col-md-7">
          <h4 class="modal-title"><div class="text-center">Entry Data Perolehan</div></h4>
        </div>
        <div class="col md-3">

        </div>
      </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/perolehan/create') ?>" class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="id_perolehan" class="col-md-3 control-label">Kode Perolehan : </label>
            <div class="col-md-7">
              <input type="text" id="id_perolehan" name="id_perolehan" required value="<?= $dataKode ?>" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="uraian_perolehan" class="col-md-3 control-label">Uraian Perolehan : </label>
            <div class="col-md-7">
              <input autofocus id="uraian_perolehan" type="text" name="uraian_perolehan" required placeholder=" Uraian Perolehan" class="form-control">
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