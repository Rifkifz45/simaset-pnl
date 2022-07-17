<?= $this->extend('admin/layout') ?>

<?= $this->section('head') ?>
<style>
	
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="main-content">
   <div class="main-content-inner">
      <div class="breadcrumbs ace-save-state" id="breadcrumbs">
         <ul class="breadcrumb">
            <li>
               <i class="ace-icon fa fa-home home-icon"></i>
               <a href="#">Home</a>
            </li>
            <li class="active">User Login</li>
         </ul>
         <!-- /.breadcrumb -->
         <div class="nav-search" id="nav-search">
            <form class="form-search">
               <span class="input-icon">
               <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
               <i class="ace-icon fa fa-search nav-search-icon"></i>
               </span>
            </form>
         </div>
         <!-- /.nav-search -->
      </div>
      <div class="page-content">
         <div class="space-6"></div>

         <!-- /.page-header -->
         <div class="row">
            <div class="col-xs-12">
               <?php if (!empty(session()->getFlashdata('pesan'))) : ?>
               <div class="row">
                  <div class="col-xs-12"> 
                     <div class="alert alert-block alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                           <i class="ace-icon fa fa-times"></i>
                        </button>
                        <p>
                           <strong>
                              <i class="ace-icon fa fa-check"></i>
                              Well done!
                           </strong>
                           <?= session()->getFlashdata('pesan') ?>
                        </p>
                     </div>
                  </div>
               </div>
               <?php endif; ?>
               <!-- PAGE CONTENT BEGINS -->
               <div class="row">
                  <div class="col-xs-12">
                     <div class="widget-box">
                        <div class="widget-header">
                           <h4 class="widget-title">USER LOGIN</h4>
                           <div class="widget-toolbar">
                              <div class="pull-right" style="margin-left: 15px;">
                                 <button data-toggle="modal" data-target="#add" type="button" class="btn btn-sm btn-primary">
                                    <i class="ace-icon fa fa-plus-circle"></i> Add New
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div class="widget-body">
                           <div class="widget-main">
                              <div>
                                 <table id="dynamic-table" class="table table-striped table-bordered dataTable no-footer">
                                 <thead>
                                    <tr>
                                       <th class="center"> # </th>
                                       <th> Nama </th>
                                       <th> Username </th>
                                       <th> Email / Phone </th>
                                       <th> Level </th>
                                       <th> Joined </th>
                                       <th> Status </th>
                                       <th>
                                          <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                          Action
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php foreach ($user as $key => $value): ?>
                                 <tr>
                                    <td class="center"><?= $key + 1 ?></td>
                                    <td><?= $value['nama_user'] ?></td>
                                    <td><?= $value['username'] ?></td>
                                    <td><b><?= $value['email'] . "</b><br>" . $value['phone'] ?></td>
                                    <td class="center" style="vertical-align:middle;">
                                       <?php
                                       if ($value['level'] == 1) {
                                          echo "<span class=\"label label-sm label-success\">Admin</span>";
                                       }else if($value['level'] == 2){
                                          echo "<span class=\"label label-sm label-info arrowed arrowed-right\">Approver</span>";
                                       }else if($value['level'] == 3){
                                          echo "<span class=\"label label-sm label-inverse arrowed-in\">Penanggung Jawab</span>";
                                       }else{
                                          echo "";
                                       }
                                       ?>
                                    </td>
                                    <td><?= date("d/m/Y", strtotime($value['created_at'])); ?></td>
                                    <td class="center" style="vertical-align:middle">
                                       <?php
                                       if ($value['status_akun'] == 0) {
                                          echo "
                                          <span class=\"label label-warning\">
                                             Unverified
                                          </span>";
                                       }else if($value['status_akun'] == 1){
                                          echo "
                                          <span class=\"label label-success arrowed\">
                                             Verified
                                          </span>";
                                       }else if($value['status_akun'] == 2){
                                          echo "
                                          <span class=\"label label-danger arrowed-in\">
                                             Blocked
                                          </span>";
                                       }else{
                                          echo "";
                                       }
                                       ?>
                                    </td>
                                    <td class="center">
                                       <div class="action-buttons">
                                          <a href="#" data-toggle="modal" data-target="#edit<?= $value['id'] ?>" title="See Detail" class="green">
                                             <i class="ace-icon fa fa-pencil bigger-130"></i>
                                          </a>

                                          <a href="#" data-toggle="modal" data-target="#reset<?= $value['id'] ?>" title="Reset Password" class="yellow">
                                             <i class="ace-icon fa fa-refresh bigger-130"></i>
                                          </a>
                                       </div>
                                    </td>
                                 </tr>
                                 <?php endforeach ?>
                                 </tbody>
                              </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.span -->
               </div>
               <?= $this->include('admin/userlogin/modal-add') ?>
               <?= $this->include('admin/userlogin/modal-update') ?>
               <?= $this->include('admin/userlogin/modal-reset') ?>
               <?= $this->include('admin/userlogin/modal-detail') ?>
               <!-- PAGE CONTENT ENDS -->
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.page-content -->
   </div>
</div>
<!-- /.main-content -->
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<!-- page specific plugin scripts -->
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.flash.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.html5.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.print.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/dataTables.select.min.js"></script>
<?= $this->include('admin/userlogin/script.js') ?>
<?= $this->endSection('') ?>