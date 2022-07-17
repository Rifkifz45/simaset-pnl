<?php
  $db = \Config\Database::connect();
  $dataKode   = buatKode2("tweb_hak", "H");
?>

<div class="modal fade" id="add" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-primary" style="padding: 1rem;">
            <div class="col-md-7">
               <h4 class="modal-title"><div class="text-center">Entry Data Penguasaan</div></h4>
            </div>
            <div class="col md-3">
               
            </div>
         </div>
         <form method="post" action="<?= site_url('admin/hak/create') ?>" id="form" class="form-horizontal">
         <div class="modal-body form">
             <div class="form-body">
                <div class="form-group">
                   <label id="id_hak" class="control-label col-md-3">Kode</label>
                   <div class="col-md-9">
                      <input name="id_hak" id="id_hak" placeholder="Customer Name" class="form-control" type="text" value="<?= $dataKode ?>">
                      <span class="help-block"></span>
                   </div>
                </div>
                <div class="form-group">
                   <label class="control-label col-md-3"> Uraian</label>
                   <div class="col-md-9">
                      <input autofocus name="uraian_hak" placeholder="Nama Hak" class="form-control" type="text">
                      <span class="help-block"></span>
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