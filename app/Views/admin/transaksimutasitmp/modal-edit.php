<?php
 $id_pengguna = 0;
 $db = \Config\Database::connect();
$dataKode   = buatKode("transaksi_mutasi", "MB");
 $tmp = "SELECT * FROM `transaksi_mutasi_tmp` LEFT JOIN `inventaris_peralatan` ON `inventaris_peralatan`.idinventaris_peralatan=`transaksi_mutasi_tmp`.idinventaris_peralatan WHERE `transaksi_mutasi_tmp`.idtransaksi_mutasi LIKE '".$dataKode."'";
 $query = $db->query($tmp)->getResult();

foreach ($query as $key => $value): ?>  
<div class="modal" id="edittmp<?= $value->idtransaksi_mutasi_tmp ?>" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <div class="col-md-5">
          <h4 class="modal-title"><div class="text-center">Update Pengguna Barang</div></h4>
        </div>
        <div class="col md-5">

        </div>
      </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/mutasitmp/update') ?>" class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="id_pengguna" class="col-md-3 control-label">Pengguna Barang : </label>
            <div class="col-md-9">
              <input type="hidden" name="idtransaksi_mutasi_tmp" name="idtransaksi_mutasi_tmp" value="<?= $value->idtransaksi_mutasi_tmp ?>">
              <?php $id_pengguna = $id_pengguna + 1; ?>
              <select class="form-control chosen-select" name="id_pengguna_modal" id="id_pengguna_modal">
                <option disabled selected value=""> Pilih Pengguna </option>
                <?php foreach ($pengguna as $key => $pen): ?>
                <option value="<?= $pen['id_pengguna'] ?>" <?=($value->id_pengguna ==$pen['id_pengguna'])?'selected':'';?>><?= $pen['nama_pengguna'] ?></option>                  
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