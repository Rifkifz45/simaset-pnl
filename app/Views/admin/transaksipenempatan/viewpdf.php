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
					<a href="#">Transaksi</a>
				</li>
				<li class="active">View PDF</li>
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
					View PDF
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						<?= $penempatan['idtransaksi_penempatan'] ?>
					</small>
				</h1>
			</div><!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="row">
	                <div id="user-profile-1" class="user-profile row">
	                  <div class="col-xs-12 col-sm-6">
	                    <div class="profile-user-info profile-user-info-striped">
	                      <div class="profile-info-row">
	                        <div class="profile-info-name"> ID </div>
	                        <div class="profile-info-value">
	                          <span class="editable editable-click" id="username"><?= $penempatan['idtransaksi_penempatan'] ?></span>
	                        </div>
	                      </div>
	                      <div class="profile-info-row">
	                        <div class="profile-info-name"> Name </div>
	                        <div class="profile-info-value">
	                          <span class="editable editable-click" id="age"><?= $penempatan['dokumen'] ?></span>
	                        </div>
	                      </div>
	                      <div class="profile-info-row">
	                        <div class="profile-info-name"> Size </div>
	                        <div class="profile-info-value">
	                          <span class="editable editable-click" id="age"><?= number_format($penempatan['ukuran_dokumen']) ?> Kb</span>
	                        </div>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
	              <div class="space-4"></div>
					<div class="row">
						<div class="col-sm-12">
							<embed src="<?= site_url('uploads/penempatan_barang/'.$penempatan['dokumen']) ?>" frameborder="0" title="View Dokumen Penempatan" width="100%" height="700px">
						</div>
					</div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
<?= $this->endSection() ?>