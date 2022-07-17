<?= $this->extend('admin/layout') ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="<?= base_url('') ?>/magnific/dist/magnific-popup.css">
<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/dist/css/select2.css" />
<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/dist/css/select2-bootstrap.css" />
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
				<li class="active">Gedung</li>
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
			<div class="space-6"></div>
			<div class="row">  
          <div class="col-md-4">
              <div class="panel panel-success ">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-6">
                              <i class="ace-icon glyphicon glyphicon-home fa-4x"></i>
                          </div>
                          <div class="col-xs-6 text-right">
                              <p class="announcement-heading" style="font-weight: bold; font-size: 24px; margin-bottom: 0px;"><?= count($gedung) ?></p>
                              <p class="announcement-text">Total Gedung</p>
                          </div>
                      </div>
                  </div>
                  <a href="<?= site_url('admin/gedung') ?>">
                      <div class="panel-footer announcement-bottom">
                          <div class="row">
                              <div class="col-xs-6">View</div>
                              <div class="col-xs-6 text-right">
                                  <i class="fa fa-arrow-circle-right"></i>
                              </div>
                          </div>
                      </div>
                  </a>
              </div>
          </div> 
          <div class="col-md-4">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-6">
                              <i class="ace-icon glyphicon glyphicon-bookmark fa-4x"></i>
                          </div>
                          <div class="col-xs-6 text-right">
                              <p class="announcement-heading" style="font-weight: bold; font-size: 24px; margin-bottom: 0px;"><?= count($lokasi_kategori) ?></p>
                              <p class="announcement-text">Total Kategori Lokasi</p>
                          </div>
                      </div>
                  </div>
                  <a href="<?= site_url('admin/lokasi-kategori') ?>">
                      <div class="panel-footer announcement-bottom">
                          <div class="row">
                              <div class="col-xs-6">View</div>
                              <div class="col-xs-6 text-right">
                                  <i class="fa fa-arrow-circle-right"></i>
                              </div>
                          </div>
                      </div>
                  </a>
              </div>
          </div> 
          <div class="col-md-4">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-6">
                              <i class="ace-icon glyphicon glyphicon-map-marker fa-4x"></i>
                          </div>
                          <div class="col-xs-6 text-right">
                              <p class="announcement-heading" style="font-weight: bold; font-size: 24px; margin-bottom: 0px;"><?= count($lokasi) ?></p>
                              <p class="announcement-text">Total Lokasi</p>
                          </div>
                      </div>
                  </div>
                  <a href="<?= site_url('admin/lokasi') ?>">
                      <div class="panel-footer announcement-bottom">
                          <div class="row">
                              <div class="col-xs-6">View</div>
                              <div class="col-xs-6 text-right">
                                  <i class="fa fa-arrow-circle-right"></i>
                              </div>
                          </div>
                      </div>
                  </a>
              </div>
          </div> 
     </div>

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
					<div class="row">
              <div class="col-xs-12">
                 <div class="widget-box">
                    <div class="widget-header">
                       <h4 class="widget-title">TWEB GEDUNG</h4>
                       <div class="widget-toolbar">
                          <button type="button" onclick="window.location.href='<?= site_url('admin/gedung/add') ?>'" class="btn btn-minier btn-primary">
                          <i class="ace-icon fa fa-plus-circle"></i> Add New
                          </button>
                       </div>
                    </div>
                    <div class="widget-body">
                       <div class="widget-main">
                          <div>
                             <table id="dynamic-table" class="table table-striped table-bordered dataTable no-footer">
                                <thead>
																<tr>
																	<th class="center"> # </th>
																	<th> Nama Gedung </th>
																	<th> Latitude </th>
																	<th> Longitude </th>
																	<th> Foto </th>
																	<th>
																		<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
																		Action
																	</th>
																</tr>
															</thead>
                              <tbody>
                              <?php foreach ($gedung as $key => $value): ?>
															<tr>
																<td class="center">
																	<?= $key + 1 ?>
																</td>
																<td><?= "<b> (" . $value['id_gedung'] . ")</b> " . $value['nama_gedung'] ?></td>
																<td><?= $value['latitude'] ?></td>
																<td><?= $value['longitude'] ?></td>
																<td class="center">
																	<a href="<?= site_url('uploads/gedung/'.$value['foto_gedung']) ?>" class="image-link">
																	   <img width="100px" src="<?= site_url('uploads/gedung/'.$value['foto_gedung']) ?>" />
																	</a>
																</td>
																<td class="center">
																	<div class="action-buttons">
																		<a class='yellow' title='Lihat Lokasi' href='<?= site_url('admin/gedung/'.$value['id_gedung']) ?>'><i class='ace-icon fa fa-search-plus bigger-130'></i></a>
																		<a href="<?= site_url('admin/gedung/edit/'.$value['id_gedung']) ?>" class='green' title='Edit Data' href=''><i class='ace-icon fa fa-pencil bigger-130'></i></a>
																		<a data-toggle="modal" data-target="#delete<?= $value['id_gedung'] ?>" class='red' title='Delete Data' href=''><i class='ace-icon fa fa-trash bigger-130'></i></a>
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

					<?= $this->include('admin/twebgedung/modal-add') ?>
					<?= $this->include('admin/twebgedung/modal-edit') ?>
					<?= $this->include('admin/twebgedung/modal-delete') ?>
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
<script src="<?= base_url('') ?>/template/assets/css/dist/js/select2.min.js"></script>
<script src="<?= base_url('') ?>/magnific/dist/jquery.magnific-popup.js"></script>
<?= $this->include('admin/twebgedung/script.js') ?>
<?= $this->endSection('') ?>