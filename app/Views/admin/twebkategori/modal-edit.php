<?php foreach ($kategori as $key => $value): ?>  
<div class="modal" id="edit<?= $value['idtweb_asset'] ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <h4 class="modal-title"><div class="text-left"><i class="fa fa-cog text-default"></i>&nbsp;Update Data Kodefikasi Barang</div></h4>
      </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/kategori/update') ?>" class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="golongan" class="col-md-3 control-label">Kode Golongan : </label>
            <div class="col-md-7">
              <input type="hidden" name="idtweb_asset" name="idtweb_asset" value="<?= $value['idtweb_asset'] ?>">
              <input value="<?= $value['golongan'] ?>" autofocus type="text" id="golongan" name="golongan" required placeholder=" 2 untuk Tanah, 3 untuk Peralatan Mesin dll" maxlength="3" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label for="bidang" class="col-md-3 control-label">Kode Bidang : </label>
            <div class="col-md-7">
              <input value="<?= $value['bidang'] ?>" id="bidang" type="text" value="*" name="bidang" required placeholder=" Kode Bidang berdasarkan inputan golongan" maxlength="3" class="form-control">
            </div>
          </div>

           <div class="form-group">
            <label for="kelompok" class="col-md-3 control-label">Kode Kelompok : </label>
            <div class="col-md-7">
              <input value="<?= $value['kelompok'] ?>" id="kelompok" type="text" value="*" name="kelompok" required placeholder=" Kode Kelompok berdasarkan inputan Bidang" maxlength="3" class="form-control">
            </div>
          </div>

           <div class="form-group">
            <label for="sub_kelompok" class="col-md-3 control-label">Kode Sub Kelompok : </label>
            <div class="col-md-7">
              <input value="<?= $value['sub_kelompok'] ?>" id="sub_kelompok" type="text" value="*" name="sub_kelompok" required placeholder=" Kode Sub Kelompok berdasarkan inputan Kelompok" maxlength="3" class="form-control">
            </div>
          </div>

           <div class="form-group">
            <label for="sub_sub_kelompok" class="col-md-3 control-label">Kode Sub-sub Kelompok : </label>
            <div class="col-md-7">
              <input value="<?= $value['sub_sub_kelompok'] ?>" id="sub_sub_kelompok" value="*" type="text" name="sub_sub_kelompok" required placeholder=" Kode Sub-sub Kelompok berdasarkan inputan Sub Kelompok" maxlength="3" class="form-control">
            </div>
          </div>

           <div class="form-group">
            <label for="uraian" class="col-md-3 control-label">Uraian : </label>
            <div class="col-md-7">
              <input value="<?= $value['uraian'] ?>" id="uraian" type="text" name="uraian" required placeholder=" Uraian dari Kode barang yang diinput" maxlength="255" class="form-control">
            </div>
          </div>

           <div class="form-group">
            <label for="keterangan" class="col-md-3 control-label">Keterangan : </label>
            <div class="col-md-7">
              <textarea class="form-control" id="keterangan" name="keterangan" placeholder=" Keterangan" maxlength="255"><?= $value['keterangan'] ?></textarea>
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