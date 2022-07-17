<?= $this->extend('admin/layout') ?>

<?= $this->section('head') ?>
<style>
   
</style>
<?= $this->endSection('') ?>

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
               Management data Inventaris Tanah
               </small>
            </h1>
         </div>

         <!-- /.page-header -->
         <div class="row">
            <div class="col-xs-12">
               <!-- PAGE CONTENT BEGINS -->
               <div class="clearfix">
                  <div class="pull-left">
                     <a href="<?= site_url('admin/inventaris_tanah/add') ?>" class="btn btn-sm btn-primary">
                     <i class="ace-icon fa fa-plus-circle"></i> Add New
                     </a>
                     <button data-toggle="modal" data-target="#import" type="button" class="btn btn-sm btn-success">
                     <i class="ace-icon glyphicon glyphicon-import"></i> Import Tanah
                     </button>
                  </div>
                  <div class="pull-right tableTools-container"></div>
               </div>
               <div class="space-4"></div>
               <div class="table-header">
                  <span class="text-left"><?= count($tanah) ?> Data Available in field "Inventaris Tanah"</span>
               </div>
               <div>
                  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                     <thead>
                        <tr>
                           <th class="center"> # </th>
                           <th> Kode Barang </th>
                           <th> NUP </th>
                           <th> Nama Barang </th>
                           <th> Luas Tanah (m<sup>2</sup>) </th>
                           <th> Tgl Perolehan </th>
                           <th> Asal Usul </th>
                           <th> Alamat </th>
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
                        <?php foreach ($detail as $key => $value): ?>
                        <tr>
                           <td class="center">
                              #<?= $key + 1 ?>
                           </td>
                           <td><?= $value->kode_barang ?></td>
                           <td><?= $value->nup ?></td>
                           <td><?= $value->nama_barang ?></td>
                           <td><?= $value->kuantitas ?></td>
                           <td><?= $value->tgl_perolehan ?></td>
                           <td><?= $value->id_perolehan ?></td>
                           <td><?= $value->alamat ?></td>
                           <td><?= $value->tercatat ?></td>
                           <td><?= $value->uraian_kondisi ?></td>
                           <td>Rp. <?= number_format($value->nilai_buku) ?></td>
                           <td width="100">
                              <div class="btn-group">
                                <a href="<?= site_url('admin/inventaris_tanah/detail/'.$value->id) ?>" data-toggle="tooltip" data-placement="left" rel="tooltip" type="button" title="Detail" class="btn btn-xs btn-success"><i class="ace-icon fa fa-folder-open-o"></i> </a>
                                <a href="<?= site_url('admin/inventaris_tanah/edit/'.$value->id) ?>" data-toggle="tooltip" data-placement="left" rel="tooltip" type="button" title="Edit" class="btn btn-xs btn-info"><i class="ace-icon glyphicon glyphicon-edit"></i> </a>
                                 <a data-toggle="modal" data-target="#delete<?= $value->id ?>" data-toggle="tooltip" data-placement="left" rel="tooltip" type="button" title="Delete" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash"></i> </a>
                             </div>
                           </td>
                        </tr>
                        <?php endforeach ?>
                     </tbody>
                  </table>
               </div>

               <?= $this->include('admin/inventaristanah/modal-import') ?>
               <?= $this->include('admin/inventaristanah/modal-delete') ?>
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

<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.1/js/dataTables.fixedColumns.min.js"></script>

<script src="<?= base_url('') ?>/template/assets/js/buttons.flash.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.html5.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.print.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/dataTables.select.min.js"></script>
<?= $this->include('admin/inventaristanah/script.js') ?>
<?= $this->endSection('') ?>