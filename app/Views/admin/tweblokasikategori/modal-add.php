<?php
$db = \Config\Database::connect();
$dataKode   = buatKode2("tweb_lokasi_kategori", "");
//include "btnsimpan.php";
?>

<div class="modal" id="add" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <h4 class="modal-title"><div class="text-left"><i class="fa fa-cog text-default"></i>&nbsp;Entry Data Kategori Lokasi</div></h4>
      </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/lokasi-kategori/create') ?>" class="form-horizontal" method="POST">
           <div class="form-group">
            <label for="id_kategori_lokasi" class="col-md-3 control-label">ID Kategori : </label>
            <div class="col-md-7">
              <input type="text" id="id_kategori_lokasi" name="id_kategori_lokasi" required readonly value="<?= $dataKode ?>" placeholder=" Masukan ID Kategori dari Lokasi" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="nama_kategori_lokasi" class="col-md-3 control-label">Nama Kategori : </label>
            <div class="col-md-7">
              <input autofocus type="text" id="nama_kategori_lokasi" name="nama_kategori_lokasi" required placeholder=" Masukan Nama Kategori dari Lokasi" class="form-control">
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