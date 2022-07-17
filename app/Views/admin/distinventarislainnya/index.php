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
            <li class="active">Daftar Barang Lainnya</li>
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
                           <h4 class="widget-title">TRANSAKSI PENEMPATAN DBL</h4>
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
                                          <th class="center"> # </th>
                                          <th> Kode Barang </th>
                                          <th> NUP </th>
                                          <th> Nama Barang </th>
                                          <th> Kondisi </th>
                                          <th> Lokasi </th>
                                          <th> Gambar </th>
                                          <th>
                                             <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                             Action
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($dist_lainnya as $key => $value): ?>
                                    <tr>
                                       <td class="center" style="vertical-align: middle;"><?= $key + 1 ?></td>
                                       <td class="center" style="vertical-align: middle;"><?= $value->kode_barang ?></td>
                                       <td class="center" style="vertical-align: middle;"><?= $value->nup ?></td>
                                       <td><b><?= $value->merk ?></b> <br> <?= $value->nama_barang ?></td>
                                       <td></td>
                                       <td><?= $value->nama_lokasi . " (" . $value->nama_gedung . ") " . "<br><b>" . $value->id_lokasi ?></b></td>
                                       <td class="center"><i class="fa fa-picture-o"></i></td>
                                       <td class="center">
                                          <div class="btn-group">
                                            <a data-toggle="modal" data-target="#edit" data-toggle="tooltip" data-placement="top" rel="tooltip" title="Edit" class="btn btn-xs btn-white">
                                            <i class="fa fa-history" aria-hidden="true"></i>&nbsp;Riwayat
                                            </a>
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
<?= $this->include('admin/distinventarislainnya/script.js') ?>
<?= $this->endSection('') ?>