<?php foreach ($user as $key => $value): ?>
<div class="modal" id="edit<?= $value['id'] ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary" style="padding: 1rem;">
        <div class="col-md-3">
          <h4 class="modal-title"><div class="text-center">Update Status User</div></h4>
        </div>
        <div class="col md-7">

        </div>
      </div>
      <div class="modal-body">
        <form id="validation-form" action="#" class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="uraian_satuan" class="col-md-3 control-label">Update Level : </label>
            <div class="col-md-7">
              <select name="" id="" class="form-control">
                <option value="1">Admin</option>
                <option value="2">Approver</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="uraian_satuan" class="col-md-3 control-label">Update Status : </label>
            <div class="col-md-7">
              <select name="" id="" class="form-control">
                <option value="0">Unverified</option>
                <option value="1">Verified</option>
                <option value="2">Blocked</option>
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