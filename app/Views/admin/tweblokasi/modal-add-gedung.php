<?php
$db = \Config\Database::connect();
$dataKode   = buatKode2("tweb_gedung", "");
//include "btnsimpan.php";
?>

<div class="modal" id="add" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <h4 class="modal-title"><div class="text-left"><i class="fa fa-cog text-default"></i>&nbsp;Tambah Data Gedung</div></h4>
      </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/gedung/create') ?>" class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="id_gedung" class="col-md-3 control-label">Kode Gedung : </label>
            <div class="col-md-7">
              <input type="text" id="id_gedung" name="id_gedung" required value="<?= $dataKode ?>" maxlength="3" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="nama_gedung" class="col-md-3 control-label">Nama Gedung : </label>
            <div class="col-md-7">
              <input autofocus id="nama_gedung" type="text" name="nama_gedung" required placeholder=" Nama Gedung" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="keterangan" class="col-md-3 control-label">Keterangan : </label>
            <div class="col-md-7">
              <textarea placeholder="Keterangan Gedung" name="keterangan" id="keterangan" class="form-control"></textarea>
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