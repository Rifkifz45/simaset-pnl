<?php
$uri = new \CodeIgniter\HTTP\URI();
?>

<div id="sidebar" class="sidebar responsive ace-save-state">
	<script type="text/javascript">
		try{ace.settings.loadState('sidebar')}catch(e){}
	</script>
	<!-- /.sidebar-shortcuts -->
	<ul class="nav nav-list">
		<li class="<?=(current_url()==site_url('admin')) ? 'active':''?>">
			<a href="<?= site_url('admin') ?>">
			<i class="menu-icon glyphicon glyphicon-home"></i>
			<span class="menu-text"> Home </span>
			</a>
			<b class="arrow"></b>
		</li>
		<?php
		$uri = new \CodeIgniter\HTTP\URI();
		?>
		<li class="
		<?=(current_url() == site_url('admin/kategori')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/lokasi')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/lokasi/add')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/lokasi-kategori')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/gedung')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/gedung/add')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/kondisi')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/satuan')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/hak')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/perolehan')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/pengguna')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/pengguna-kategori')) ? 'active open':''?>
		">
			<a href="#" class="dropdown-toggle">
			<i class="menu-icon glyphicon glyphicon-edit"></i>
			<span class="menu-text">
			Data Store
			</span>
			<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="<?=(current_url() == site_url('admin/kategori')) ? 'active':''?>">
					<a href="<?= site_url('admin/kategori') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Kategori
					</a>
					<b class="arrow"></b>
				</li>
				<li class="
				<?=(current_url() == site_url('admin/lokasi')) ? 'active':''?>
				<?=(current_url() == site_url('admin/lokasi/add')) ? 'active':''?>
				<?=(current_url() == site_url('admin/lokasi-kategori')) ? 'active':''?>
				<?=(current_url() == site_url('admin/gedung')) ? 'active':''?>
				<?=(current_url() == site_url('admin/gedung/add')) ? 'active':''?>
				">
					<a href="<?= site_url('admin/lokasi') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Lokasi
					</a>
					<b class="arrow"></b>
				</li>
				<li class="<?=(current_url() == site_url('admin/kondisi')) ? 'active':''?>">
					<a href="<?= site_url('admin/kondisi') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Kondisi
					</a>
					<b class="arrow"></b>
				</li>
				<li class="<?=(current_url() == site_url('admin/satuan')) ? 'active':''?>">
					<a href="<?= site_url('admin/satuan') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Satuan
					</a>
					<b class="arrow"></b>
				</li>
				<li class="<?=(current_url() == site_url('admin/hak')) ? 'active':''?>">
					<a href="<?= site_url('admin/hak') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Hak
					</a>
					<b class="arrow"></b>
				</li>
				<li class="<?=(current_url() == site_url('admin/perolehan')) ? 'active':''?>">
					<a href="<?= site_url('admin/perolehan') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Perolehan
					</a>
					<b class="arrow"></b>
				</li>
				<li class="
				<?=(current_url() == site_url('admin/pengguna')) ? 'active':''?>
				<?=(current_url() == site_url('admin/pengguna-kategori')) ? 'active':''?>
				">
					<a href="<?= site_url('admin/pengguna') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Pengguna
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>

		<li class="
		<?=(current_url() == site_url('admin/inventaris')) ? 'active':''?>
		<?=(current_url() == site_url('admin/inventaris_tanah')) ? 'active':''?>
		<?=(current_url() == site_url('admin/inventaris_tanah/add')) ? 'active':''?>
		<?=(current_url() == site_url('admin/inventaris_peralatan')) ? 'active':''?>
		<?=(current_url() == site_url('admin/inventaris_peralatan/add')) ? 'active':''?>
		<?=(current_url() == site_url('admin/inventarisgedung')) ? 'active':''?>
		<?=(current_url() == site_url('admin/inventaris_gedung/add')) ? 'active':''?>
		<?=(current_url() == site_url('admin/inventaris_jalan')) ? 'active':''?>
		<?=(current_url() == site_url('admin/inventaris_jalan/add')) ? 'active':''?>
		<?=(current_url() == site_url('admin/inventaris_asset')) ? 'active':''?>
		<?=(current_url() == site_url('admin/inventaris_asset/add')) ? 'active':''?>
		<?=(current_url() == site_url('admin/inventaris_takberwujud')) ? 'active':''?>
		<?=(current_url() == site_url('admin/inventaris_takberwujud/add')) ? 'active':''?>
		">
			<a href="<?= site_url('admin/inventaris') ?>">
			<i class="menu-icon glyphicon glyphicon-cloud"></i>
			<span class="menu-text"> Data Inventaris </span>
			</a>
			<b class="arrow"></b>
		</li>
		<li class="
		<?=(current_url() == site_url('admin/statistik-chart')) ? 'active':''?>
		<?=(current_url() == site_url('admin/statistik-group')) ? 'active':''?>
		">
			<a href="<?= site_url('admin/statistik-group') ?>">
			<i class="menu-icon glyphicon glyphicon-stats"></i>
			<span class="menu-text"> Statistik </span>
			</a>
			<b class="arrow"></b>
		</li>
		<li class="
		<?=(current_url() == site_url('admin/penempatan')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/penempatan/new')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/mutasi')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/mutasi/new')) ? 'active open':''?>
		">
			<a href="#" class="dropdown-toggle">
			<i class="menu-icon glyphicon glyphicon-send"></i>
			<span class="menu-text"> Transaksi </span>
			<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="
				<?=(current_url() == site_url('admin/penempatan')) ? 'active':''?>
				<?=(current_url() == site_url('admin/penempatan/new')) ? 'active':''?>
				">
					<a href="<?= site_url('admin/penempatan') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Penempatan
					</a>
					<b class="arrow"></b>
				</li>
				<li class="
				<?=(current_url() == site_url('admin/mutasi')) ? 'active':''?>
				<?=(current_url() == site_url('admin/mutasi/new')) ? 'active':''?>
				">
					<a href="<?= site_url('admin/mutasi') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Mutasi
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li class="
		<?=(current_url() == site_url('admin/inventaris_ruangan')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/inventaris_lainnya')) ? 'active open':''?>
		">
			<a href="#" class="dropdown-toggle">
			<i class="menu-icon glyphicon glyphicon-level-up"></i>
			<span class="menu-text"> Menu Interaktif </span>
			<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="<?=(current_url() == site_url('admin/inventaris_ruangan')) ? 'active':''?>">
					<a href="<?= site_url('admin/inventaris_ruangan') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					List Barang Ruangan
					</a>
					<b class="arrow"></b>
				</li>
				<li class="<?=(current_url() == site_url('admin/inventaris_lainnya')) ? 'active':''?>">
					<a href="<?= site_url('admin/inventaris_lainnya') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					List Barang Lainnya
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li class="
		<?=(current_url()==site_url('admin/user')) ? 'active open':''?>
		<?=(current_url()==site_url('admin/user-profile')) ? 'active open':''?>
		<?=(current_url()==site_url('admin/backup-data')) ? 'active open':''?>
		<?=(current_url()==site_url('admin/cetak-label')) ? 'active open':''?>
		<?=(current_url()==site_url('admin/token')) ? 'active open':''?>
		">
			<a href="#" class="dropdown-toggle">
			<i class="menu-icon glyphicon glyphicon-cog"></i>
			<span class="menu-text"> Settings </span>
			<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="<?=(current_url()==site_url('admin/user-profile')) ? 'active':''?>">
					<a href="<?= site_url('admin/user-profile') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					User Profile
					</a>
					<b class="arrow"></b>
				</li>
				<li class="<?=(current_url()==site_url('admin/user')) ? 'active':''?>">
					<a href="<?= site_url('admin/user') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					User Management
					</a>
					<b class="arrow"></b>
				</li>
				<li class="<?=(current_url()==site_url('admin/backup-data')) ? 'active':''?>">
					<a href="<?= site_url('admin/backup-data') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Database
					</a>
					<b class="arrow"></b>
				</li>
				<li class="<?=(current_url()==site_url('admin/cetak-label')) ? 'active':''?>">
					<a href="<?= site_url('admin/cetak-label') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					QR Code
					</a>
					<b class="arrow"></b>
				</li>
				<li class="<?=(current_url()==site_url('admin/token')) ? 'active':''?>">
					<a href="<?= site_url('admin/token') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Set Token
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li class="
		<?=(current_url() == site_url('admin/reports')) ? 'active':''?>
		<?=(current_url() == site_url('admin/reports/penempatan_periode')) ? 'active':''?>
		<?=(current_url() == site_url('admin/reports/penempatan_lokasi')) ? 'active':''?>
		<?=(current_url() == site_url('admin/reports/penempatan_bulan')) ? 'active':''?>

		<?=(current_url() == site_url('admin/reports/mutasi_periode')) ? 'active':''?>
		<?=(current_url() == site_url('admin/reports/mutasi_lokasi')) ? 'active':''?>
		<?=(current_url() == site_url('admin/reports/mutasi_bulan')) ? 'active':''?>

		<?=(current_url() == site_url('admin/reports/penempatan_ruangan')) ? 'active':''?>
		<?=(current_url() == site_url('admin/reports/penempatan_lainnya')) ? 'active':''?>
		">
			<a href="<?= site_url('admin/reports') ?>">
			<i class="menu-icon glyphicon glyphicon-file"></i>
			<span class="menu-text"> Reports </span>
			</a>
			<b class="arrow"></b>
		</li>
	</ul>
	<!-- /.nav-list -->
	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>