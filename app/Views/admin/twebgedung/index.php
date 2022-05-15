<?= $this->extend('admin/layout') ?>

<?= $this->section('head') ?>
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
					Data Gedung
					</small>
				</h1>
			</div>

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
						<span class="text-left"><?= count($gedung) ?> Data Available in field "Gedung"</span>
					</div>
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="center"> # </th>
									<th> Kode Gedung </th>
									<th> Nama </th>
									<th> Lantai </th>
									<th> Keterangan </th>
									<th> PJ </th>
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
										#<?= $key + 1 ?>
									</td>
									<td class="center"><?= $value['id_gedung'] ?></td>
									<td><?= $value['nama_gedung'] ?></td>
									<td class="center"><?= $value['qty_lantai'] ?></td>
									<td><?= $value['keterangan'] ?></td>
									<td class="center"><i data-toggle="tooltip" data-placement="left" rel="tooltip" class="fa fa-info-circle" title="<?= $value['nama_pengguna'] ?>"></i></td>
									<td class="center"><i class="fa fa-picture-o" aria-hidden="true"></i></td>
									<td class="center">
										<div class="btn-group">
											<a data-toggle="modal" data-target="" data-toggle="tooltip" data-placement="top" rel="tooltip" title="Detail" class="btn btn-xs btn-success">
                       <i class="ace-icon glyphicon glyphicon-folder-open"></i>
                       </a>
                       <a data-toggle="modal" data-target="#edit<?= $value['id_gedung'] ?>" data-toggle="tooltip" data-placement="top" rel="tooltip" title="Edit" class="btn btn-xs btn-info">
                       <i class="ace-icon glyphicon glyphicon-edit"></i>
                       </a>
                       <a data-toggle="modal" data-target="#delete<?= $value['id_gedung'] ?>" data-toggle="tooltip" data-placement="top" rel="tooltip" title="Delete" class="btn btn-xs btn-danger">
                       <i class="ace-icon glyphicon glyphicon-trash"></i>
                       </a>
                    </div>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
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

<?= $this->include('admin/twebgedung/script.js') ?>
<?= $this->endSection('') ?>