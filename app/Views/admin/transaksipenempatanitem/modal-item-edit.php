<?php
$id_pengguna = 0;
$id_hak = 0;
foreach ($item as $key => $value): ?>  
<div class="modal" id="pengguna<?= $value->idtransaksi_penempatan_item ?>" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
            <div class="col-md-4">
              <h4 class="modal-title"><div class="text-center">Update Item</div></h4>
            </div>
            <div class="col md-7">

            </div>
          </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/penempatanitem/update') ?>" class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="id_pengguna" class="col-md-3 control-label">Pengguna Barang : </label>
            <div class="col-md-8">
              <input type="hidden" name="idtransaksi_penempatan_item" name="idtransaksi_penempatan_item" value="<?= $value->idtransaksi_penempatan_item ?>">
              <?php $id_pengguna = $id_pengguna + 1 ?>
              <select class="form-control" name="id_pengguna" id="id_pengguna<?= $id_pengguna ?>" style="width:100%">
                <option disabled selected value=""> Pilih Pengguna </option>
                <?php foreach ($pengguna as $key => $pen): ?>
                <option value="<?= $pen['id_pengguna'] ?>" <?= $value->id_pengguna == $pen['id_pengguna'] ? 'selected':'';?>><?= $pen['nama_pengguna'] ?></option>                  
                <?php endforeach ?>
            </select>
            </div>
          </div>

          <div class="form-group">
            <label for="id_pengguna" class="col-md-3 control-label">Penguasaan : </label>
            <div class="col-md-8">
              <?php $id_hak = $id_hak + 1 ?>
              <select class="form-control" name="id_hak" id="id_hak<?= $id_hak ?>" style="width:100%">
                <option disabled selected value=""> Pilih Hak </option>
                <?php foreach ($hak as $key => $hk): ?>
                <option value="<?= $hk['id_hak'] ?>" <?= $value->id_hak == $hk['id_hak'] ? 'selected':'';?>><?= $hk['uraian_hak'] ?></option>
                <?php endforeach ?>
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
<?php endforeach ?>