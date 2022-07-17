<div class="modal fade" id="add" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Form Tambah Data</h3>
         </div>
         <form method="post" action="<?= site_url('admin/token/create') ?>" id="form" class="form-horizontal">
         <div class="modal-body form">
             <div class="form-body">
                <div class="form-group">
                   <label id="kategori" class="control-label col-md-3">Kode</label>
                   <div class="col-md-9">
                     <select name="kategori" id="kategori" class="form-control">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="1">Detail Product</option>
                        <option value="2">Print Daftar Barang Ruangan</option>
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