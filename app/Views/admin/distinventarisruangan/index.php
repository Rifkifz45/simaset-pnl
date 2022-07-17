<?= $this->extend('admin/layout') ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="<?= base_url('') ?>/magnific/dist/magnific-popup.css">
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
            <li class="active">Daftar Barang Ruangan</li>
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
               <?php if (!empty(session()->getFlashdata('error'))) : ?>
               <div class="row">
                  <div class="col-xs-12"> 
                     <div class="alert alert-block alert-danger">
                        <button type="button" class="close" data-dismiss="alert">
                           <i class="ace-icon fa fa-times"></i>
                        </button>
                        <p>
                           <strong>
                              <i class="ace-icon fa fa-time"></i>
                              Error!
                           </strong>
                           <?= session()->getFlashdata('error') ?>
                        </p>
                     </div>
                  </div>
               </div>
               <?php endif; ?>
               <div class="row">
                  <div class="col-xs-12">
                     <div class="widget-box">
                        <div class="widget-header">
                           <h4 class="widget-title">PENEMPATAN ITEM DBR</h4>
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
                                          <th> Pengguna </th>
                                          <th> Gambar </th>
                                          <th>
                                             <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                             Action
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach ($dist_ruangan as $key => $value): ?>
                                       <tr>
                                          <td class="center" style="vertical-align: middle;"><?= $key + 1 ?></td>
                                          <td class="center" style="vertical-align: middle;"><?= $value->kode_barang ?></td>
                                          <td class="center" style="vertical-align: middle;"><?= $value->nup ?></td>
                                          <td><b><?= $value->merk ?></b> <br> <?= $value->nama_barang ?></td>
                                          <td class="center">
                                             <?php
                                             if ($value->uraian_kondisi == "Baik") {
                                                echo '<span class="label label-success arrowed">'.$value->uraian_kondisi.'</span>';
                                             }else if($value->uraian_kondisi == "Rusak Ringan"){
                                                echo '<span class="label label-info arrowed-in-right arrowed">'.$value->uraian_kondisi.'</span>';
                                             }else if ($value->uraian_kondisi == "Rusak Berat") {
                                                echo '<span class="label label-danger arrowed-in"><i class="ace-icon fa fa-exclamation-triangle"></i>  '.$value->uraian_kondisi.'</span>';
                                             }else{
                                                echo '';
                                             }
                                             ?>
                                          </td>
                                          <td><?= $value->nama_gedung . " Lantai " . $value->lantai . "" . "<br><b>" . $value->nama_lokasi ?></b></td>
                                          <td><?= $value->nama_pengguna ?></td>
                                          <td class="center">
                                             <?php
                                             if ($value->fotoinventaris_peralatan != NULL) { ?>
                                                 <a href="<?= base_url('uploads/dbr/'.$value->fotoinventaris_peralatan) ?>" class="image-link">
                                                <img width="100px" src="<?= base_url('uploads/dbr/'.$value->fotoinventaris_peralatan) ?>" alt="" />
                                                </a>
                                             <?php } else{ ?>
                                                <a data-toggle="modal" data-target="#unggahfoto<?= $value->idinventaris_peralatan ?>" href="" class="btn btn-minier btn-white"><i class="fa fa-upload"></i> Upload</a>
                                             <?php }
                                             ?>
                                          </td>
                                          <td class="">
                                             <div class="btn-group">
                                               <a href="<?= site_url('admin/inventaris_ruangan/'. $value->idinventaris_peralatan) ?>" data-toggle="tooltip" data-placement="top" rel="tooltip" title="Edit" class="btn btn-sm btn-info">
                                               <i class="fa fa-history" aria-hidden="true"></i>&nbsp;Riwayat
                                               </a><br>
                                               <?php if ($value->fotoinventaris_peralatan != NULL): ?>
                                                  <a data-toggle="modal" data-target="#editfoto<?= $value->idinventaris_peralatan ?>" data-toggle="tooltip" data-placement="top" rel="tooltip" title="Swap" class="btn btn-sm btn-danger">
                                                   <i class="fa fa-history" aria-hidden="true"></i>&nbsp;Change Foto
                                                   </a>
                                               <?php endif ?>
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
         <?= $this->include('admin/distinventarisruangan/modal-add_foto') ?>
         <?= $this->include('admin/distinventarisruangan/modal-edit_foto') ?>
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
<script src="<?= base_url('') ?>/magnific/dist/jquery.magnific-popup.js"></script>
<?= $this->include('admin/distinventarisruangan/script.js') ?>
<?= $this->endSection('') ?>