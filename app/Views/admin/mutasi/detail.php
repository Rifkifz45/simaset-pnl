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
				<li>
					<a href="#">Transaction</a>
				</li>
				<li class="active">Detail Mutasi</li>
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
					Data Mutasi Aset
					</small>
				</h1>
			</div>
			<!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="row">
						<div class="col-sm-6 color-dark widget-container-col ui-sortable" id="widget-container-col-12">
							<div class="widget-box transparent ui-sortable-handle" id="widget-box-12">
								<div class="widget-header">
									<div class="profile-user-info">
										<div class="profile-info-row">
											<div class="profile-info-name">
												<h4 class="widget-title lighter"><span class="label label-inverse pull-left"> Mutasi Aset #1 </span></h4>
											</div>

											<div class="profile-info-value">
												<span class="bigger-120">Politeknik Negeri Lhokseumawe</span>
											</div>
										</div>
									</div>
								</div>
								<div class="widget-body">
									<div class="widget-main padding-6 no-padding-left no-padding-right">
										<div class="profile-user-info">
											<div class="profile-info-row">
												<div class="profile-info-name"> ID SYS </div>
												<div class="profile-info-value">
													<span>MUT-00000<?= $mutasi['mutations_id'] ?></span>
												</div>
											</div>
											<div class="profile-info-row">
												<div class="profile-info-name"> Nama </div>
												<div class="profile-info-value">
													<span><?= $mutasi['mutations_name'] ?></span>
												</div>
											</div>
											<div class="profile-info-row">
												<div class="profile-info-name"> Locations </div>
												<div class="profile-info-value">
													<i class="fa fa-map-marker light-orange bigger-110"></i>
													<span>G1</span>
													<span>L01 - R01</span>
												</div>
											</div>
											<div class="profile-info-row">
												<div class="profile-info-name"> Deskripsi </div>
												<div class="profile-info-value">
													<span><i>NULL</i></span>
												</div>
											</div>
											<div class="profile-info-row">
												<div class="profile-info-name"> Tanggal Mutasi </div>
												<div class="profile-info-value">
													<span><?= $mutasi['mutations_date']; ?></span>
												</div>
											</div>
											<div class="profile-info-row">
												<div class="profile-info-name"> Status Mutasi </div>
												<div class="profile-info-value">
													<span>Pending</span>
												</div>
											</div>
											<div class="profile-info-row">
												<div class="profile-info-name"> User Posting </div>
												<div class="profile-info-value">
													<span>Muhammad Rifki Kardawi</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="space-12"></div>
					<div class="row">
						<div class="col-sm-12">
							<ul class="nav nav-tabs text-success">
								<li class="active"><a href="#detail" data-toggle="tab"><span class="visible-xs"> Detail</span><span class="hidden-xs"><i class="fa fa-list fa-lg text-default"></i> Detail</span></a></li>
								<li><a href="#unggah" data-toggle="tab"><span class="visible-xs"> Unggah File</span><span class="hidden-xs"><i class="fa fa-upload fa-lg text-default"></i> Unggah File</span></a></li>
								<li><a href="#tambah" data-toggle="tab"><span class="visible-xs"> Tambah Aset</span><span class="hidden-xs"><i class="fa fa-plus fa-lg text-default"></i> Tambah Aset</span></a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="detail">
									<div style="padding: 13px;" class="alert alert-block alert-success">
										<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
										</button>
										<i class="ace-icon fa fa-list green"></i>
										List Assets for Mutations
										<strong class="green">
										Ace
										<small>(v1.4)</small>
										</strong>
									</div>
									<div>
										<table id="dynamic-table1" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="center"> # </th>
													<th> ID System </th>
													<th> Kode Barang </th>
													<th> NUP </th>
													<th> Nama Barang </th>
													<th> Lokasi Asal </th>
													<th> Lokasi Tujuan </th>
													<th> Kepemilikan </th>
													<th>
														<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
														Action
													</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($m_detail as $key => $value): ?>
												<tr>
													<td><?= $key + 1 ?></td>
													<td>AST-00000<?= $value['mutations-detail_id'] ?></td>
													<td><?= $value['kode_barang']; ?></td>
													<td><?= $value['nup']; ?></td>
													<td><?= $value['nama_barang']; ?></td>
													<td><?= $value['location_old']; ?></td>
													<td><?= $value['location_new']; ?></td>
													<td><?= $value['kepemilikan']; ?></td>
													<td class="text-center">
														<a type="button" class="ace-icon btn-success btn-sm" title="Detail Data"><i class="fa fa-info-circle fa-sm"></i></a>
														<a type="button" class="ace-icon btn-danger btn-sm" title="Delete"><i class="fa fa-times fa-sm"></i></a>
													</td>
												</tr>
												<?php endforeach ?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="unggah">
									<button type="button" class="btn btn-xs btn-success m-b-10" data-toggle="modal" data-target="#unggahfile" title="Unggah Dokument">
									<i class="fa fa-upload"></i> &nbsp;Add Attachment
									</button>
									<div class="space-6"></div>
									<div style="padding: 13px;" class="alert alert-block alert-success">
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
									<div>
										<table id="dynamic-table2" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="center"> # </th>
													<th> ID System </th>
													<th> Nama Document </th>
													<th> Ukuran File </th>
													<th> Status </th>
													<th>
														<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
														Action
													</th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 1; ?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $mutasi['mutations_id'] ?></td>
													<td><?= $mutasi['mutations_document'] ?></td>
													<td><?= $mutasi['document_size'] ?></td>
													<td></td>
													<td class="text-center">
														<a type="button" class="ace-icon btn-success btn-sm" title="Detail Data"><i class="fa fa-info-circle fa-sm"></i></a>
														<a type="button" class="ace-icon btn-danger btn-sm" title="Delete"><i class="fa fa-times fa-sm"></i></a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="tambah">
									<div style="padding: 13px;" class="alert alert-block alert-success">
										<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
										</button>
										<i class="ace-icon fa fa-plus green"></i>
										Add List Assets for Mutations
										<strong class="green">
										Ace
										<small>(v1.4)</small>
										</strong>
									</div>
									<form action="" class="form-horizontal">
										<div class="form-group">
											<label class="col-md-9 control-label">Cari Aset</label>
											<div class="col-md-3">
												<div class="input-group">
													<input type="text" name="tgl_lhr" class="form-control" required="">
													<span class="input-group-btn">
													<button class="btn btn-sm btn-info" type="button" data-toggle="modal" data-target="#loadaset" title="Delete">
													<i class="fa fa-search-plus"></i>
													</button>
													</span>
												</div>
											</div>
										</div>
									</form>
									<div class="hr hr-18 hr-double dotted"></div>
									<div class="widget-box">
									<div class="widget-header widget-header-blue widget-header-flat">
										<h4 class="widget-title lighter">Search and Select Data for Mutations</h4>

										<div class="widget-toolbar">
											<label>
												<small class="green">
													<b>Validation</b>
												</small>

												<input id="skip-validation" type="checkbox" class="ace ace-switch ace-switch-4">
												<span class="lbl middle"></span>
											</label>
										</div>
									</div>

									<div class="widget-body">
										<div class="widget-main">
											<div id="fuelux-wizard-container" class="no-steps-container">
												<div class="step-content pos-rel">
													<div class="step-pane active" data-step="1">
														<form class="form-horizontal" id="validation-form" method="get" novalidate="novalidate">
															<div class="hr hr-dotted"></div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="platform">Kepemilikan</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="input-group" style="width:100%">
																		<span class="input-group-addon" style="min-width:37px; text-align:center;">
																			<i class="ace-icon fa fa-at"></i>
																		</span>
																		<select class="col-sm-8 col-xs-12" id="platform" name="platform" aria-required="true" aria-describedby="platform-error">
																			<option value> Choose ... </option>
																			<option value="linux">Milik Sendiri</option>
																			<option value="windows">Pihak Ketiga</option>
																		</select>
																	</div>
																</div>
															</div>
															<div class="space-2"></div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="phone">Kode Barang:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="input-group" style="width:100%">
																		<span class="input-group-addon" style="min-width:37px; text-align:center;">
																			<i class="ace-icon fa fa-tag"></i>
																		</span>

																		<input class="col-sm-8 col-xs-12" type="tel" id="phone" placeholder=" Kode Barang" name="phone" aria-required="true" aria-describedby="phone-error">
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right"></label>

																<div class="col-xs-12 col-sm-3">
																	<div class="input-group" style="width:100%">
																		<span class="input-group-addon" style="min-width:37px; text-align:center;">
																			<i class="fa fa-at"></i>
																		</span>

																		<input class="col-sm-12 col-xs-12" type="tel" id="phone" placeholder=" NUP Awal" name="phone" aria-required="true" aria-describedby="phone-error">
																	</div>
																</div>
																<div class="col-xs-12 col-sm-3">
																	<div class="input-group" style="width:100%">
																		<span class="input-group-addon" style="min-width:37px; text-align:center;">
																			<i class="fa fa-at"></i>
																		</span>

																		<input style="min-width: 230px !important;" placeholder=" NUP Akhir" class="col-sm-12 col-xs-12" type="tel" id="phone" name="phone" aria-required="true" aria-describedby="phone-error">
																	</div>
																</div>
																<div class="col-xs-12 col-sm-3">
																
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="phone">Nama Barang:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="input-group" style="width:100%">
																		<span class="input-group-addon" style="min-width:37px; text-align:center;">
																			<i class="ace-icon fa fa-th-list"></i>
																		</span>

																		<input class="col-sm-8 col-xs-12" type="tel" placeholder=" Nama Barang" id="phone" name="phone" aria-required="true" aria-describedby="phone-error">
																	</div>
																</div>
															</div>
															<div class="space-2"></div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="phone">Pilih Pengguna:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="input-group" style="width: 100%;">
																		<span class="input-group-addon" style="min-width:37px; text-align:center;">
																			<i class="ace-icon fa fa-user"></i>
																		</span>

																		<input placeholder=" Pengguna Aset" class="col-sm-8 col-xs-10" type="tel" id="phone" name="phone">
																		<div class="col-xs-2 col-sm-4">
																			<button data-toggle="modal" data-target="#loaduser" type="button" class="btn btn-sm btn-info"><i class="fa fa-search-plus"></i></button>
																		</div>
																	</div>
																</div>
															</div>
															<div class="space-2"></div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="phone">Pilih Lokasi:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="input-group" style="width: 100%;">
																		<span class="input-group-addon" style="min-width:37px; text-align:center;">
																			<i class="ace-icon fa fa-map-marker"></i>
																		</span>

																		<input placeholder=" Lokasi" class="col-sm-8 col-xs-10" type="tel" id="phone" name="phone" aria-required="true" aria-describedby="locations-error">
																		<div class="col-xs-2 col-sm-4">
																			<button data-toggle="modal" data-target="#loadlocation" type="button" class="btn btn-sm btn-info"><i class="fa fa-search-plus"></i> </button>
																		</div>
																	</div>
																	<div id="locations-error" class="help-block" style="color: red;">Tools location digunakan untuk memilih lokasi aset awal.</div>
																</div>
															</div>
															<div class="space-2"></div>
															<hr>
															<div class="wizard-actions">
																<button type="reset" class="btn btn-prev">
																	<i class="ace-icon fa fa-refresh"></i>
																	Reset
																</button>

																<button type="submit" class="btn btn-success btn-next" data-last="Finish">
																	Next
																<i class="ace-icon fa fa-arrow-right icon-on-right"></i></button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div>
								</div>
							</div>
						</div>
					</div>
					<!-- MODAL LOAD ASET -->
					<?= $this->include('admin/mutasi/detail-aset') ?>
					<!-- END MODAL LOAD -->
					<!-- MODAL LOAD USER -->
					<?= $this->include('admin/mutasi/detail-user') ?>
					<!-- END MODAL LOAD USER -->
					<!-- MODAL ATTACHMENT -->
					<?= $this->include('admin/mutasi/detail-unggah') ?>
					<!-- END MODAL ATTACHMENT -->
					<!-- MODAL LOAD LOCATION -->
					<?= $this->include('admin/mutasi/detail-location') ?>
					<!-- END MODAL LOAD LOCATION -->

					<div id="editfile" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h4 class="modal-title"><i class="ion-ios-gear text-danger"></i> Master Data User</h4>
								</div>
								<div class="col-sm-12">
									<div class="modal-body">
										<form action="<?= site_url('pages/admin/detailmutasi/editfile/') ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
											<div class="form-group">
												<label class="col-md-3 control-label">Edit Dokumen</label>
												<div class="col-md-8">
													<input type="hidden" name="nama_dokumen" id="nama_dokumen" value="">
													<input type="file" name="dokumen" id="dokumen" maxlength="255" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label"></label>
												<div class="col-md-8">
													<button type="submit" name="save" value="save" class="btn btn-primary"><i class="fas fa-save"></i> &nbsp;Update</button>&nbsp;
													<a type="button" class="btn btn-default active" data-dismiss="modal" aria-hidden="true"><i class="ion-arrow-return-left"></i>&nbsp;Cancel</a>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="modal-footer no-margin-top">
								</div>
							</div>
						</div>
					</div>
					<div id="deletefile" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title"><span class="label label-inverse"> # Delete</span> &nbsp; Are you sure you want to delete <u></u> from Database?</h5>
								</div>
								<div class="modal-body" align="center">
									<a href="<?php echo site_url('/pages/admin/deletedokumen/') ?>" class="btn btn-danger">&nbsp; &nbsp;YES&nbsp; &nbsp;</a>
								</div>
								<div class="modal-footer">
									<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
								</div>
							</div>
						</div>
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


<script type="text/javascript">
	<?= $this->include('admin/mutasi/dts1-daftarmutasi.js') ?>
	<?= $this->include('admin/mutasi/dts2-daftarfile.js') ?>
	<?= $this->include('admin/mutasi/dts3-searchaset.js') ?>
	<?= $this->include('admin/mutasi/dts4-searchuser.js') ?>
	<?= $this->include('admin/mutasi/dts5-searchlocation.js') ?>
</script>

<?= $this->endSection('') ?>