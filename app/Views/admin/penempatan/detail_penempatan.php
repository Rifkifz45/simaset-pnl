<?= $this->extend('admin/layout') ?>

<?= $this->section('head') ?>
<style>
	.panel.with-nav-tabs .panel-heading {
    padding: 5px 5px 0 5px;
}

.panel.with-nav-tabs .nav-tabs {
    border-bottom: none;
}

.panel.with-nav-tabs .nav-justified {
    margin-bottom: -1px;
}

/********************************************************************/
/*** PANEL DEFAULT ***/
.with-nav-tabs.panel-default .nav-tabs>li>a,
.with-nav-tabs.panel-default .nav-tabs>li>a:hover,
.with-nav-tabs.panel-default .nav-tabs>li>a:focus {
    color: #777;
}

.with-nav-tabs.panel-default .nav-tabs>.open>a,
.with-nav-tabs.panel-default .nav-tabs>.open>a:hover,
.with-nav-tabs.panel-default .nav-tabs>.open>a:focus,
.with-nav-tabs.panel-default .nav-tabs>li>a:hover,
.with-nav-tabs.panel-default .nav-tabs>li>a:focus {
    color: #777;
    background-color: #ddd;
    border-color: transparent;
}

.with-nav-tabs.panel-default .nav-tabs>li.active>a,
.with-nav-tabs.panel-default .nav-tabs>li.active>a:hover,
.with-nav-tabs.panel-default .nav-tabs>li.active>a:focus {
    color: #555;
    background-color: #fff;
    border-color: #ddd;
    border-bottom-color: transparent;
}

.with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu {
    background-color: #f5f5f5;
    border-color: #ddd;
}

.with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu>li>a {
    color: #777;
}

.with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu>li>a:hover,
.with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu>li>a:focus {
    background-color: #ddd;
}

.with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu>.active>a,
.with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu>.active>a:hover,
.with-nav-tabs.panel-default .nav-tabs>li.dropdown .dropdown-menu>.active>a:focus {
    color: #fff;
    background-color: #555;
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
								  <span class="editable editable-click" id="username"><?= $penempatan['placement_id'] ?></span>
								</div>
							  </div>
							  <div class="profile-info-row">
								<div class="profile-info-name"> Lokasi </div>
								<div class="profile-info-value">
								  <i class="fa fa-map-marker light-orange bigger-110"></i>
								  <span class="editable editable-click">G1</span>
								  <span class="editable editable-click">L01 - R01</span>
								</div>
							  </div>
							  <div class="profile-info-row">
								<div class="profile-info-name"> Keterangan </div>
								<div class="profile-info-value">
								  <span class="editable editable-click"><i>NULL</i></span>
								</div>
							  </div>
							</div>
						  </div>
						</div>
					</div>
					<?php if (!empty(session()->getFlashdata('pesan'))) : ?>
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
                        	<a data-toggle="modal" data-target="#tambahaset" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-primary" title="Tambah"><i class="ace-icon fa fa-plus bigger-120"></i>&nbsp;Tambah Data&nbsp;</a>
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
										<span class="text-left">Results for "Rooms Table"</span>
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
													<th>
														<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
														Action
													</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($detail as $key => $value): ?>
												<tr>
													<td class="center"><?= $key + 1 ?></td>
													<td><?= $value->kode_barang ?></td>
													<td><?= $value->nup ?></td>
													<td><?= $value->nama_barang ?></td>
													<td><?= $value->merk_tipe ?></td>
													<td class="center"><button class="btn btn-minier btn-warning"><i class="fa fa-paper-plane"></i></button>&emsp;<?= $value->pengguna_aset ?></td>
													<td class="text-center">
														<a data-toggle="modal" data-target="#deletedetail<?php echo $value->id ?>" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-danger" title="Delete Data"><i class="ace-icon fa fa-trash bigger-120"></i></a>
													</td>
												</tr>
												<?php endforeach ?>
											</tbody>
										</table>
									</div>
                        </div>
                        <div class="tab-pane fade" id="tab2default">
                        	<a data-toggle="modal" data-target="#unggahfile" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-primary" title="Tambah" <?= !empty($penempatan['placement_document']) ? "disabled" : null ?>><i class="ace-icon fa fa-upload bigger-120"></i>&nbsp;Add Attachment&nbsp;</a>
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
												<?php $no=0; if (!empty($penempatan['placement_document'])): ?>
												<tr>
													<td class="center"><?= $no + 1 ?></td>
													<td><?= $penempatan['placement_document'] ?></td>
													<td><?= $penempatan['document_size'] ?> KB</td>
													<td class="text-center">
														<a target="_blank" href="<?= site_url('admin/penempatan/viewpdf/'.$penempatan['placement_id']) ?>" data-toggle="tooltip" rel="tooltip" data-placement="top" class="btn btn-xs btn-success" type="button" title="View File"><i class="ace-icon fa fa-file-pdf-o bigger-120"></i></a>
														<a data-toggle="modal" data-target="#editfile<?php echo $penempatan['placement_id'] ?>" data-toggle="tooltip" rel="tooltip" data-placement="top" class="btn btn-xs btn-info" type="button" title="Ganti File"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></a>
														<a data-toggle="modal" data-target="#deletefile<?php echo $penempatan['placement_id'] ?>" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-danger" title="Delete"><i class="ace-icon fa fa-trash bigger-120"></i></a>
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
				<!-- Unggah File -->
				<div class="modal" id="unggahfile" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-primary" style="padding: 1rem;">
								<h4 class="modal-title"><i class="fa fa-cog text-default"></i> Unggah Dokumen Penempatan</h4>
							</div>
							<div class="modal-body">
								<form action="<?= site_url('admin/penempatan/unggahdokumen/'.$penempatan['placement_id']) ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-md-3 control-label">Unggah Dokumen</label>
										<div class="col-md-8">
											<input type="file" accept=".pdf" name="dokumen" id="dokumen" maxlength="255" class="form-control">
										</div>
									</div>
							</div>
							<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Save changes</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
							</form>
						</div>
					</div>
				</div>
				<!-- End Unggah File Edit -->

				<!-- Tambah Aset for Placement -->
				<div class="modal" id="tambahaset" tabindex="-1" role="dialog">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header bg-primary" style="padding: 1rem;">
								<h4 class="modal-title"><i class="fa fa-cog text-default"></i> Tambah Aset untuk Ditempatkan</h4>
							</div>
							<div class="modal-body">
								<form action="<?= site_url('admin/penempatan/adddetail/'.$penempatan['placement_id']) ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-md-3 control-label">Kode/Label Barang</label>
										<div class="col-md-7">
											<input type="hidden" name="placement_id" id="placement_id" value="<?= $penempatan['placement_id'] ?>">
											<input type="text" class="form-control" name="txtKodeInventaris" id="txtKodeInventaris" required>
										</div>
										<div class="col-md-1">
											<button class="btn btn-sm btn-primary" type="button" onclick="window.open('<?= site_url('admin/penempatan/pencarian_barang') ?>','Pencarian Barang','toolbar=yes,scrollbars=yes,resizable=yes,top=30,width=4000,height=4000')" target="_SELF"><i class="ace-icon fa fa-search-plus fa-lg"></i></button>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label"></label>
										<div class="col-md-8">
											<input type="text" readonly class="form-control" placeholder="Nama Barang" name="txtNamaBrg" id="txtNamaBrg">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Pengguna</label>
										<div class="col-md-8">
											<select name="pengguna" id="pengguna" class="form-control">
												<option value="1">Pilih Pengguna</option>
												<option value="2">Pengguna 1</option>
												<option value="3">Pengguna 2</option>
												<option value="4">Pengguna 3</option>
											</select>
										</div>
									</div>
							</div>
							<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Tambah</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
							</form>
						</div>
					</div>
				</div>
				<!-- END TAMBAH ASET -->

				<!-- Edit File -->
				<div class="modal" id="editfile<?php echo $penempatan['placement_id'] ?>" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-primary" style="padding: 1rem;">
								<h4 class="modal-title"><i class="fa fa-cog text-default"></i> Ganti Dokumen Penempatan</h4>
							</div>
							<div class="modal-body">
								<form action="<?= site_url('admin/penempatan/gantidokumen/'.$penempatan['placement_id']) ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-md-3 control-label">Ganti Dokumen</label>
										<div class="col-md-8">
											<input type="hidden" name="nama_dokumen" id="nama_dokumen" value="<?= $penempatan['placement_document'] ?>">
											<input type="file" accept=".pdf" name="dokumen" id="dokumen" maxlength="255" class="form-control">
										</div>
									</div>
							</div>
							<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Save changes</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
							</form>
						</div>
					</div>
				</div>
				<!-- End Edit File -->

				<div id="deletefile<?php echo $penempatan['placement_id'] ?>" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"><span class="label label-inverse"> # Delete</span> &nbsp; Are you sure you want to delete <u>this file</u> from Database?</h5>
							</div>
							<div class="modal-body" align="center">
								<a href="<?= site_url('admin/penempatan/hapusdokumen/'.$penempatan['placement_id']) ?>" class="btn btn-danger">&nbsp; &nbsp;YES&nbsp; &nbsp;</a>
							</div>
							<div class="modal-footer">
								<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
							</div>
						</div>
					</div>
				</div>

				<?php foreach ($detail as $key => $value): ?>
				<div id="deletedetail<?php echo $value->id ?>" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"><span class="label label-inverse"> # Delete</span> &nbsp; Are you sure you want to delete <u><?= $value->kode_barang ?></u> from Detail Placement?</h5>
							</div>
							<div class="modal-body" align="center">
								<a href="<?= site_url('admin/penempatan/hapusdetail/'.$value->id) ?>" class="btn btn-danger">&nbsp; &nbsp;YES&nbsp; &nbsp;</a>
							</div>
							<div class="modal-footer">
								<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach ?>
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
	<?= $this->include('admin/penempatan/datatable-1.js') ?>
	<?= $this->include('admin/penempatan/datatable-2.js') ?>
</script>
<?= $this->endSection('') ?>