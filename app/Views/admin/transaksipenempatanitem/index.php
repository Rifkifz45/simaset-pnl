<?= $this->extend('admin/layout') ?>
<?= $this->section('head') ?>
<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/dist/css/select2.css" />
<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/dist/css/select2-bootstrap.css" />
<?= $this->include('admin/transaksipenempatanitem/style.css'); ?>
<style>
	.Disabled{
		pointer-events: none;
		cursor: not-allowed;
		opacity: 0.65;
		filter: alpha(opacity=65);
		-webkit-box-shadow: none;
		box-shadow: none;
	}
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
				<li>
					<a href="<?= site_url('admin/penempatan') ?>">Placement</a>
				</li>
				<li class="active">Placement Detail</li>
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
					Detail
					<small>
					Data Penempatan Aset
					</small>
				</h1>
			</div>
			<!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="row">
						<div id="user-profile-1" class="user-profile row">
							<div class="col-xs-12 col-sm-6">
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name"> ID SYS </div>
										<div class="profile-info-value">
											<span class="editable editable-click" id="username"><?= $penempatan['idtransaksi_penempatan'] ?></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Lokasi </div>
										<div class="profile-info-value">
											<i class="fa fa-map-marker light-orange bigger-110"></i>
											<span class="editable editable-click"><?= $penempatan['nama_gedung'] ?></span>
											<span class="editable editable-click"><?= $penempatan['nama_lokasi'] ?></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> Keterangan </div>
										<div class="profile-info-value">
											<span class="editable editable-click"><?= $penempatan['keterangan'] ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php if (!empty(session()->getFlashdata('pesan'))) : ?>
					<div class="space-12"></div>
					<div class="alert alert-block alert-success" style="margin-bottom: 0;">
						<button type="button" class="close" data-dismiss="alert">
						<i class="ace-icon fa fa-times"></i>
						</button>
						<i class="ace-icon fa fa-check success"></i>
						<?= session()->getFlashdata('pesan') ?>
					</div>
					<?php endif; ?>
					<div class="space-12"></div>
					<div class="row">
						<div class="col-md-12 col-xs-12">
							<div class="panel with-nav-tabs panel-default">
								<div class="panel-heading">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#tab1default" data-toggle="tab"><i class="ace-icon fa-sm glyphicon glyphicon-list"></i> Detail </a></li>
										<li><a href="#tab2default" data-toggle="tab"><i class="ace-icon fa-sm glyphicon glyphicon-upload"></i> Unggah File </a></li>
									</ul>
								</div>
								<div class="panel-body">
									<div class="tab-content">
										<div class="tab-pane fade in active" id="tab1default">
											<a data-toggle="modal" data-target="#tambahitem" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-primary" title="Tambah"><i class="ace-icon fa fa-plus-circle bigger-120"></i>&nbsp;Tambah Data&nbsp;</a>
											<div class="space-6"></div>
											<div style="padding: 13px; margin-bottom: 0px;" class="alert alert-block alert-success">
												<button type="button" class="close" data-dismiss="alert">
												<i class="ace-icon fa fa-times"></i>
												</button>
												<i class="ace-icon fa fa-list green"></i>
												List Assets for Placement
												<strong class="green">
												Ace
												<small>(v1.4)</small>
												</strong>
											</div>
											<div class="space-6"></div>
											<div class="table-header">
												<span class="text-left">Results for "Data to Distribution"</span>
											</div>
											<div>
												<table id="dynamic-table" class="table table-striped table-bordered table-hover">
													<thead>
														<tr>
															<th class="center"> # </th>
															<th> Kode Barang </th>
															<th> NUP </th>
															<th> Nama Barang </th>
															<th> Merk / Tipe </th>
															<th> Pengguna Aset </th>
															<th> Penguasaan </th>
															<th>
																<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
																Action
															</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($item as $key => $value): ?>
														<tr>
															<td class="center"><?= $key + 1 ?></td>
															<td><?= $value->kode_barang ?></td>
															<td><?= $value->nup ?></td>
															<td><?= $value->nama_barang ?></td>
															<td><?= $value->merk ?></td>
															<td><?= $value->nama_pengguna ?></td>
															<td><?= $value->uraian_hak ?></td>
															<td class="text-center">
																<a data-toggle="modal" data-target="#pengguna<?php echo $value->idtransaksi_penempatan_item ?>" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-info" title="Edit Pengguna"><i class="ace-icon glyphicon glyphicon-edit bigger-120"></i></a>
																<a data-toggle="modal" data-target="#deleteitem<?php echo $value->idtransaksi_penempatan_item ?>" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-danger" title="Delete Data"><i class="ace-icon fa fa-trash"></i></a>
															</td>
														</tr>
														<?php endforeach ?>
													</tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane fade" id="tab2default">
											<a data-toggle="modal" data-target="#unggahfile" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-primary <?= !empty($penempatan['dokumen']) ? "Disabled" : null ?>" title="Tambah"><i class="ace-icon fa fa-upload bigger-120"></i>&nbsp;Add Attachment&nbsp;</a>
											<div class="space-6"></div>
											<div style="padding: 13px; margin-bottom:0px" class="alert alert-block alert-success">
												<button type="button" class="close" data-dismiss="alert">
												<i class="ace-icon fa fa-times"></i>
												</button>
												<i class="ace-icon fa fa-upload green"></i>
												Detail Document Uploaded
												<strong class="green">
												Ace
												<small>(v1.4)</small>
												</strong>
											</div>
											<div class="space-6"></div>
											<div class="table-header">
												<span class="text-left">Results for "Document" for Placement</span>
											</div>
											<div>
												<table id="dynamic-table2" class="table table-striped table-bordered table-hover">
													<thead>
														<tr>
															<th> # </th>
															<th> Nama Document </th>
															<th> Ukuran File </th>
															<th>
																<i class="ace-icon fa fa-clock-o bigger-110"></i>
																Action
															</th>
														</tr>
													</thead>
													<tbody >
														<?php $no=0; if (!empty($penempatan['dokumen'])): ?>
														<tr>
															<td class="center"><?= $no + 1 ?></td>
															<td><?= $penempatan['dokumen'] ?></td>
															<td><?= number_format($penempatan['ukuran_dokumen']) ?> KB</td>
															<td class="text-center">
																<a target="_blank" href="<?= site_url('admin/penempatan/viewpdf/'.$penempatan['idtransaksi_penempatan']) ?>" data-toggle="tooltip" rel="tooltip" data-placement="top" class="btn btn-xs btn-success" type="button" title="View File"><i class="ace-icon fa fa-file-pdf-o bigger-120"></i></a>
																<a data-toggle="modal" data-target="#editfile<?php echo $penempatan['idtransaksi_penempatan'] ?>" data-toggle="tooltip" rel="tooltip" data-placement="top" class="btn btn-xs btn-info" type="button" title="Ganti File"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></a>
																<a data-toggle="modal" data-target="#deletefile<?php echo $penempatan['idtransaksi_penempatan'] ?>" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-danger" title="Delete"><i class="ace-icon fa fa-trash bigger-120"></i></a>
															</td>
														</tr>
														<?php endif ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?= $this->include('admin/transaksipenempatanitem/modal-item-add') ?>
				<?= $this->include('admin/transaksipenempatanitem/modal-item-edit') ?>
				<?= $this->include('admin/transaksipenempatanitem/modal-item-delete') ?>

				<?= $this->include('admin/transaksipenempatanitem/modal-unggah-add') ?>
				<?= $this->include('admin/transaksipenempatanitem/modal-unggah-edit') ?>
				<?= $this->include('admin/transaksipenempatanitem/modal-unggah-delete') ?>
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
<script src="<?= base_url('') ?>/template/assets/css/dist/js/select2.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.flash.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.html5.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.print.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/dataTables.select.min.js"></script>
<script type="text/javascript">
	<?= $this->include('admin/transaksipenempatanitem/datatable-detail.js') ?>
	<?= $this->include('admin/transaksipenempatanitem/datatable-unggah.js') ?>
</script>
<?= $this->endSection('') ?>