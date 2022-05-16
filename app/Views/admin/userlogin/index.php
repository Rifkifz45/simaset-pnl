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
            <li class="active">Hak</li>
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
         <?= $this->include('admin/configurejs') ?>
         <div class="page-header">
            <h1>
               Data Store
               <small>
               <i class="ace-icon fa fa-angle-double-right"></i>
               Data User Login
               </small>
            </h1>
         </div>

         <!-- /.page-header -->
         <div class="row">
            <div class="col-xs-12">
               <!-- PAGE CONTENT BEGINS -->
               <div class="clearfix">
                  <div class="pull-right tableTools-container"></div>
               </div>
               <div class="space-4"></div>
               <div class="table-header">
                  <span class="text-left"> Data Available in field "User Login"</span>
               </div>
               <div>
                  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
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
                              <div class="btn-group">
                                <a data-toggle="modal" data-target="#detail<?= $value['id'] ?>" data-toggle="tooltip" data-placement="top" rel="tooltip" title="Edit" class="btn btn-sm btn-white">
                                <i class="ace-icon fa fa-info-circle"></i>
                                </a>
                             </div>
                           </td>
                        </tr>
                        <?php endforeach ?>
                     </tbody>
                  </table>
               </div>
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