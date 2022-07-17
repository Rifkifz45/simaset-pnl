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
				<li class="active">Reports</li>
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
					Reports
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Cetak Laporan dalam bentuk PDF / Excel
					</small>
				</h1>
			</div><!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="row">
						<div class="col-sm-4 widget-container-col ui-sortable" id="widget-container-col-12">
							<div class="widget-box transparent ui-sortable-handle" id="widget-box-12">
								<div class="widget-header">
									<h4 class="widget-title lighter">Data Store</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main padding-6 no-padding-left no-padding-right">
										<ul class="list-unstyled spaced">
											<li>
											<a href="<?= site_url('admin/reports/kategori') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan Kategori
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/gedung') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan Gedung
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/lokasi') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan Lokasi
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/lokasi-kategori') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan Kategori Lokasi
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/kondisi') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan Kondisi
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/satuan') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan Satuan
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/hak') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan Hak
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/perolehan') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan Perolehan
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/pengguna') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan Pengguna
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/pengguna-kategori') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan Kategori Pengguna
											</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4 widget-container-col ui-sortable" id="widget-container-col-12">
							<div class="widget-box transparent ui-sortable-handle" id="widget-box-12">
								<div class="widget-header">
									<h4 class="widget-title lighter">Kartu Inventaris Barang</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main padding-6 no-padding-left no-padding-right">
										<ul class="list-unstyled spaced">
											<li>
											<a href="<?= site_url('admin/reports/kib_tanah') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan KIB Tanah
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/kib_alatbesar') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan KIB Alat Besar
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/kib_alatangkut') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan KIB Alat Angkutan
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/kib_alatsenjata') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan KIB Alat Senjata
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/kib_bangunangedung') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan KIB Bangunan Gedung
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/kib_bangunanair') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan KIB Bangunan Air
											</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4 widget-container-col ui-sortable" id="widget-container-col-12">
							<div class="widget-box transparent ui-sortable-handle" id="widget-box-12">
								<div class="widget-header">
									<h4 class="widget-title lighter">Transaksi</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main padding-6 no-padding-left no-padding-right">
										<ul class="list-unstyled spaced">
											<li>
											<a href="<?= site_url('admin/reports/penempatan_periode') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan Penempatan per Periode
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/penempatan_bulan') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan Penempatan per Bulan
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/penempatan_lokasi') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan Penempatan per Lokasi
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/mutasi_periode') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan Mutasi per Periode
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/mutasi_bulan') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan Mutasi per Bulan
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/mutasi_lokasi') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan Mutasi per Lokasi
											</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="row">
						<div class="col-sm-4 widget-container-col ui-sortable" id="widget-container-col-12">
							<div class="widget-box transparent ui-sortable-handle" id="widget-box-12">
								<div class="widget-header">
									<h4 class="widget-title lighter">Menu Interaktif</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main padding-6 no-padding-left no-padding-right">
										<ul class="list-unstyled spaced">
											<li>
											<a href="<?= site_url('admin/reports/penempatan_ruangan') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan Daftar Barang Ruangan
											</a>
											</li>
											<li>
											<a href="<?= site_url('admin/reports/penempatan_lainnya') ?>" style="text-decoration: none;">
												<i class="ace-icon fa fa-star bigger-110"></i>
												Laporan Daftar Barang Lainnya
											</a>
											</li>
										</ul>
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