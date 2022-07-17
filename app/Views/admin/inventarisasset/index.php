<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="main-content">
   <div class="main-content-inner">
      <div class="breadcrumbs ace-save-state" id="breadcrumbs">
         <ul class="breadcrumb">
            <li>
               <i class="ace-icon fa fa-home home-icon"></i>
               <a href="#">Home</a>
            </li>
            <li class="active">Data Inventaris</li>
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
               Inventaris
               <small>
               <i class="ace-icon fa fa-angle-double-right"></i>
               Management data Inventaris Asset Tetap Lainnya
               </small>
            </h1>
         </div>
         <?php if (!empty(session()->getFlashdata('pesan'))) : ?>
         <div class="row">
            <div class="col-xs-12"> 
               <div class="alert alert-block alert-success">
                  <button type="button" class="close" data-dismiss="alert">
                     <i class="ace-icon fa fa-times"></i>
                  </button>
                  <p>
                     <?= session()->getFlashdata('pesan') ?>
                  </p>
               </div>
            </div>
         </div>
         <?php endif; ?>
         <!-- /.page-header -->
         <div class="row">
            <div class="col-xs-12">
               <!-- PAGE CONTENT BEGINS -->
               <div class="clearfix">
                  <div class="pull-left">
                     <a href="<?= site_url('admin/inventaris_asset/add') ?>" class="btn btn-sm btn-primary">
                     <i class="ace-icon fa fa-plus-circle"></i> Add New
                     </a>
                     <button data-toggle="modal" data-target="#import" type="button" class="btn btn-sm btn-success">
                     <i class="ace-icon glyphicon glyphicon-import"></i> Import Asset
                     </button>
                  </div>
                  <div class="pull-right tableTools-container"></div>
               </div>
               <div class="space-2"></div>
               <div class="table-header">
                  <span class="text-left"><?= $jlh ?> Data Inventaris Gedung dan Bangunan Tersedia</span>
               </div>
               <div>
                  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                     <thead>
                        <tr>
                           <th class="center"> # </th>
                           <th> Kode Barang </th>
                           <th> NUP </th>
                           <th> Nama Barang </th>
                           <th> Qty </th>
                           <th> Tgl Perolehan </th>
                           <th> Asal Usul </th>
                           <th> Tercatat </th>
                           <th> Kondisi </th>
                           <th> Nilai Asset </th>
                           <th>
                              <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                              Action
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        
                     </tbody>
                  </table>
               </div>

               <?= $this->include('admin/inventarisasset/modal-import') ?>
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
<?= $this->include('admin/inventarisasset/script.js') ?>
<?= $this->endSection('') ?>