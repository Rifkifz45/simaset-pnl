<?php
$db = \Config\Database::connect();
$dataKode   = buatKode2("tweb_kondisi", "K");
//include "btnsimpan.php";
?>

<div class="modal" id="add" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <div class="col-md-7">
          <h4 class="modal-title"><div class="text-center">Entry Data Kondisi Barang</div></h4>
        </div>
        <div class="col md-3">

        </div>
      </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/kondisi/create') ?>" class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="id_kondisi" class="col-md-3 control-label">Kode Kondisi : </label>
            <div class="col-md-7">
              <input type="text" id="id_kondisi" name="id_kondisi" required placeholder=" Masukan Kode Kondisi" value="<?= $dataKode ?>" maxlength="3" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="uraian_kondisi" class="col-md-3 control-label">Uraian Kondisi : </label>
            <div class="col-md-7">
              <input autofocus id="uraian_kondisi" type="text" name="uraian_kondisi" required placeholder=" Kondisi dari Barang" class="form-control">
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