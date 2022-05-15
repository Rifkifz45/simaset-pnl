<?php
  $id_lantai = 0;
  $id_gedung = 0;
  $id_kategori_lokasi  = 0;
  $id_pengguna  = 0;
?>

<?php foreach ($detail as $key => $value): ?>  
<div class="modal" id="edit<?= $value->id_lokasi ?>" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <h4 class="modal-title"><div class="text-left"><i class="fa fa-cog text-default"></i>&nbsp;Update Data Lokasi</div></h4>
      </div>
      <div class="modal-body">
        <form id="validation-form" action="<?= site_url('admin/lokasi/update') ?>" class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="id_lokasi" class="col-md-3 control-label">Kode Lokasi : </label>
            <div class="col-md-7">
              <input value="<?= $value->id_lokasi ?>" type="text" id="id_lokasi" name="id_lokasi" class="form-control" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="nama_lokasi" class="col-md-3 control-label">Nama Lokasi : </label>
            <div class="col-md-7">
              <input onfocus="this.setSelectionRange(this.value.length,this.value.length);" autofocus id="nama_lokasi" type="text" value="<?= $value->nama_lokasi; ?>" name="nama_lokasi" required placeholder=" Nama Lokasi" class="form-control">
            </div>
          </div>

          <div class="form-group">
          <label for="id_gedung" class="col-md-3 control-label">Letak Lokasi : </label>
          <div class="col-md-4">
            <?php $id_gedung = $id_gedung + 1 ?>
            <select id="id_gedung<?= $id_gedung ?>" class="form-control" name="id_gedung" style="width:100%">
              <option value="" selected disabled>Pilih Gedung</option>
              <?php foreach ($gedung as $key => $gdb): ?>
                <option value="<?= $gdb['id_gedung'] ?>" <?=($value->id_gedung ==$gdb['id_gedung'])?'selected':'';?>><?= $gdb['nama_gedung'] ?></option>
              <?php endforeach ?>
            </select>
          </div>

          <div class="col-md-2">
            <?php $id_lantai = $id_lantai + 1 ?>
            <select id="lantai<?= $id_lantai ?>" class="form-control" name="lantai" id="lantai" style="width:100%">
              <option value="" selected disabled>Pilih Lantai</option>
              <option value="1" <?= $value->lantai == "1" ? "selected" : null ?>>1</option>
              <option value="2" <?= $value->lantai == "2" ? "selected" : null ?>>2</option>
              <option value="3" <?= $value->lantai == "3" ? "selected" : null ?>>3</option>
              <option value="4" <?= $value->lantai == "4" ? "selected" : null ?>>4</option>
              <option value="5" <?= $value->lantai == "5" ? "selected" : null ?>>5</option>
              <option value="6" <?= $value->lantai == "6" ? "selected" : null ?>>6</option>
            </select>
          </div>
           <div class="col-md-1">
            <?php
              $lokasi = $value->id_lokasi;
              $lokasi = substr($lokasi, -3);
            ?>
            <input type="text" class="form-control" id="code" name="code" value="<?= $lokasi ?>">
          </div>
        </div>

           <div class="form-group">
            <label for="id_kategori_lokasi" class="col-md-3 control-label">Kategori : </label>
            <div class="col-md-7">
              <?php $id_kategori_lokasi = $id_kategori_lokasi + 1  ?>
            <select class="form-control" name="id_kategori_lokasi" id="id_kategori_lokasi<?= $id_kategori_lokasi ?>" style="width:100%">
              <option value="" selected disabled>Pilih Kategori</option>
              <?php foreach ($kategori as $key => $kat): ?>
              <option value="<?= $kat['id_kategori_lokasi'] ?>" <?=($value->id_kategori_lokasi ==$kat['id_kategori_lokasi'])?'selected':'';?>><?= $kat['nama_kategori_lokasi'] ?></option>
              <?php endforeach ?>
            </select>
            </div>
          </div>

          <div class="form-group">
    			<label for="id_pengguna" class="col-md-3 control-label">Penanggung Jawab : </label>
    			<div class="col-md-7">
            <?php $id_pengguna = $id_pengguna + 1 ?>
    				<select id="id_pengguna<?= $id_pengguna ?>" class="form-control" name="id_pengguna" style="width:100%">
    					<option value="" selected disabled>Pilih Penanggung Jawab</option>
              <?php foreach ($pengguna as $key => $pen): ?>
                <option value="<?= $pen['id_pengguna'] ?>" <?=($value->id_pengguna==$pen['id_pengguna'])?'selected':'';?>> <?= $pen['nama_pengguna'] ?></option>
              <?php endforeach ?>
    				</select>
    			</div>
    		</div>

       <div class="form-group">
        <label for="foto" class="col-md-3 control-label">Ganti Gambar : </label>
        <div class="col-md-7">
          <input type="file" id="id-input-file-2" name="foto" />
          <div id="foto-error" class="help-block">Jika anda mengganti gambar lokasi ini. Gambar lokasi awal akan dihapus dan tidak tersedia lagi!</div>
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