<?php
$db = \Config\Database::connect();
$dataKode   = buatKode2("user_login", "");
//include "btnsimpan.php";
?>

<div class="modal" id="add" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <div class="col-md-3">
          <h4 class="modal-title"><div class="text-center">Add Data User</div></h4>
        </div>
        <div class="col md-7">

        </div>
      </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/user/create') ?>" class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="id_kondisi" class="col-md-3 control-label">ID User : </label>
            <div class="col-md-7">
              <input type="text" id="id" name="id" required placeholder=" Masukan ID User" readonly value="<?= $dataKode ?>" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="uraian_kondisi" class="col-md-3 control-label">Nama Lengkap : </label>
            <div class="col-md-7">
              <input autofocus id="nama_user" type="text" name="nama_user" required placeholder=" Masukan Nama Lengkap" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="uraian_kondisi" class="col-md-3 control-label">Username : </label>
            <div class="col-md-7">
              <input id="username" type="text" name="username" required placeholder=" Masukan Username" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="uraian_kondisi" class="col-md-3 control-label">Password : </label>
            <div class="col-md-7">
              <input id="password" type="text" name="password" placeholder=" Masukkan Password. Default : 123" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="uraian_kondisi" class="col-md-3 control-label">Email : </label>
            <div class="col-md-7">
              <input id="email" type="text" name="email" required placeholder=" Masukan Email" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="uraian_kondisi" class="col-md-3 control-label">Phone : </label>
            <div class="col-md-7">
              <input id="phone" type="text" name="phone" required placeholder=" Phone Number" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="uraian_kondisi" class="col-md-3 control-label">Level : </label>
            <div class="col-md-7">
            	<select name="level" id="level" class="form-control">
            		<option value="" selected disabled>Pilih Level</option>
            		<option value="1">Admin</option>
            		<option value="2">Approver</option>
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