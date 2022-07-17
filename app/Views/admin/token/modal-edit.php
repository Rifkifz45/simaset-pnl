<?php
$db = \Config\Database::connect();
$token = $db->table('set_token')->get()->getResultArray();
?>

<?php foreach ($token as $key => $value): ?>
<div class="modal fade" id="edit<?= $value['id'] ?>" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Form Edit Data</h3>
         </div>
         <form method="post" action="<?= site_url('admin/token/update') ?>" id="form" class="form-horizontal">
         <div class="modal-body form">
             <div class="form-body">
                <div class="form-group">
                   <label id="kategori" class="control-label col-md-3">Kode</label>
                   <div class="col-md-9">
                     <input type="hidden" name="id" id="id" value="<?= $value['id'] ?>">
                     <select disabled name="kategori" id="kategori" class="form-control">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="1" <?= $value['kategori'] == "1" ? "selected" : null ?>>Detail Product</option>
                        <option value="2" <?= $value['kategori'] == "2" ? "selected" : null ?>>Print Daftar Barang Ruangan</option>
                     </select>
                      <span class="help-block"></span>
                   </div>
                </div>
                <div class="form-group">
                   <label class="control-label col-md-3"> Token</label>
                   <div class="col-md-9">
                      <input autofocus name="token" placeholder="Masukan Token" class="form-control" type="text">
                      <span class="help-block"></span> <a href="">Generate Automatic</a>
                   </div>
                </div>
             </div>
         </div>
         <div class="modal-footer">
            <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
         </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<?php endforeach ?>