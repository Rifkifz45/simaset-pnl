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
            <li class="active">Lokasi</li>
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
               Satuan dari Barang
               </small>
            </h1>
         </div>

         <!-- /.page-header -->
         <div class="row">
            <div class="col-xs-12">
               <!-- PAGE CONTENT BEGINS -->
               <div class="clearfix">
                  <div class="pull-right" style="margin-left: 15px;">
                     <button data-toggle="modal" data-target="#add" type="button" class="btn btn-sm btn-primary">
                     <i class="ace-icon fa fa-plus-circle"></i> Add New
                     </button>
                  </div>
                  <div class="pull-right tableTools-container"></div>
               </div>
               <div class="space-4"></div>
               <div class="table-header">
                  <span class="text-left"><?= count($satuan) ?> Data Available in field "Satuan"</span>
               </div>
               <div>
                  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                     <thead>
                        <tr>
                           <th class="center"> # </th>
                           <th> Kode Satuan </th>
                           <th> Uraian Satuan </th>
                           <th>
                              <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                              Action
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($satuan as $key => $value): ?>
                        <tr>
                           <td class="center">
                              #<?= $key + 1 ?>
                           </td>
                           <td><?= $value['id_satuan'] ?></td>
                           <td><?= $value['uraian_satuan'] ?></td>
                           <td class="center">
                              <div class="btn-group">
                                <a data-toggle="modal" data-target="#edit<?= $value['id_satuan'] ?>" data-toggle="tooltip" data-placement="top" rel="tooltip" title="Edit" class="btn btn-xs btn-info">
                                <i class="ace-icon glyphicon glyphicon-edit"></i>
                                </a>
                                <a data-toggle="modal" data-target="#delete<?= $value['id_satuan'] ?>" data-toggle="tooltip" data-placement="top" rel="tooltip" title="Delete" class="btn btn-xs btn-danger">
                                <i class="ace-icon glyphicon glyphicon-trash"></i>
                                </a>
                             </div>
                           </td>
                        </tr>
                        <?php endforeach ?>
                     </tbody>
                  </table>
               </div>

               <?= $this->include('admin/twebsatuan/modal-add') ?>
               <?= $this->include('admin/twebsatuan/modal-edit') ?>
               <?= $this->include('admin/twebsatuan/modal-delete') ?>
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
<?= $this->include('admin/twebkondisi/script.js') ?>
<?= $this->endSection('') ?>