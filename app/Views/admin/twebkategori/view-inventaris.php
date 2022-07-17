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
         <!-- /.page-header -->
         <div class="row">
            <div class="col-xs-12">
               <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                  <div class="col-xs-12">
                     <div class="widget-box">
                        <div class="widget-header">
                           <h4 class="widget-title">DATA INVENTARIS</h4>
                           <div class="widget-toolbar">
                              <a href="#" data-action="fullscreen" class="orange2">
                                 <i class="ace-icon fa fa-expand"></i>
                              </a>

                              <a href="#" data-action="reload">
                                 <i class="ace-icon fa fa-refresh"></i>
                              </a>

                              <a href="#" data-action="collapse">
                                 <i class="ace-icon fa fa-chevron-up"></i>
                              </a>

                              <a href="#" data-action="close">
                                 <i class="ace-icon fa fa-times"></i>
                              </a>
                           </div>
                        </div>
                        <div class="widget-body">
                           <div class="widget-main">
                              <div>
                                 <table id="dynamic-table" class="table table-striped table-bordered dataTable no-footer">
                                 <thead>
                                    <tr>
                                       <th class="center" width="5%"> # </th>
                                       <th width="15%"> Kode Golongan </th>
                                       <th width="20%"> Jenis Barang </th>
                                       <th> Keterangan </th>
                                       <th width="10%"> Qty Barang </th>
                                       <th width="7%">
                                          <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                          Action
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                 $site=array('inventaris_tanah','inventaris_peralatan','inventaris_gedung','inventaris_jalan','inventaris_asset','inventaris_konstruksi', 'inventaris_takberwujud');
                                 foreach ($kategori as $key => $value): ?>
                                 <tr>
                                    <td class="center">
                                       <?= $key + 1 ?>
                                    </td>
                                    <td class="center"><?= $value['golongan'] ?></td>
                                    <td><?= $value['uraian'] ?></td>
                                    <td><?= $value['keterangan'] ?></td>
                                    <td class="center">
                                       <?php
                                         $db = \Config\Database::connect();
                                         $query = $db->table($site[$key]);
                                         echo $query->countAllResults();
                                       ?>
                                    </td>
                                    <td class="center">
                                       <div class="btn-group">
                                         <a href="<?= site_url('admin/' . $site[$key]) ?>" data-toggle="tooltip" data-placement="top" rel="tooltip" title="Lihat Data" class="btn btn-sm btn-white">
                                         <i class="ace-icon fa fa-eye"></i>
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
<?= $this->include('admin/twebkategori/script2.js') ?>
<?= $this->endSection('') ?>