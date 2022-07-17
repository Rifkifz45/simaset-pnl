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
					<a href="#">Other Pages</a>
				</li>
				<li class="active">Blank Page</li>
			</ul><!-- /.breadcrumb -->

			<div class="nav-search" id="nav-search">
				<form class="form-search">
					<span class="input-icon">
						<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
						<i class="ace-icon fa fa-search nav-search-icon"></i>
					</span>
				</form>
			</div><!-- /.nav-search -->
		</div>

		<div class="page-content">
			<?= $this->include('admin/configurejs') ?>
			<div class="page-header">
				<h1>
					Setting
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Backup Database
					</small>
				</h1>
			</div><!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="row">
					<div class="col-xs-12 col-sm-12 widget-container-col ui-sortable" id="widget-container-col-1">
						<div class="widget-box ui-sortable-handle" id="widget-box-1">
							<div class="widget-header">
								<h5 class="widget-title">Backup Database Panel</h5>

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
									<p class="alert alert-success">
										Backup Database berfungsi seperti restore point untuk menjaga data berdasarkan waktu tertentu!!!
									<?php
									$session = session();
									$pesan = $session->getFlashdata('pesan');
									if (isset($pesan)) {
										echo "<br>Backup Berhasil!!!";
									}
									?>
									</p>
									<div class="form-group">
									<p align="center">
										<a onclick="return confirm('Apakah Anda yakin ingin melakukan backup database?')" type="button" href="<?= site_url('admin/dobackup') ?>" title="Download" class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> &nbsp;Download</a>
									</p>
								</div>
								</div>
							</div>
						</div>
					</div>
									</div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
<?= $this->endSection() ?>