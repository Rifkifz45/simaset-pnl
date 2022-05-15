<?php
$uri = new \CodeIgniter\HTTP\URI();
?>

<div id="sidebar" class="sidebar responsive ace-save-state">
	<script type="text/javascript">
		try{ace.settings.loadState('sidebar')}catch(e){}
	</script>
	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-success">
			<i class="ace-icon fa fa-signal"></i>
			</button>
			<button class="btn btn-info">
			<i class="ace-icon fa fa-pencil"></i>
			</button>
			<button class="btn btn-warning">
			<i class="ace-icon fa fa-users"></i>
			</button>
			<button class="btn btn-danger">
			<i class="ace-icon fa fa-cogs"></i>
			</button>
		</div>
		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>
			<span class="btn btn-info"></span>
			<span class="btn btn-warning"></span>
			<span class="btn btn-danger"></span>
		</div>
	</div>
	<!-- /.sidebar-shortcuts -->
	<ul class="nav nav-list">
		<li class="<?=(current_url()==site_url('admin')) ? 'active':''?>">
			<a href="<?= site_url('admin') ?>">
			<i class="menu-icon fa fa-tachometer"></i>
			<span class="menu-text"> Dashboard </span>
			</a>
			<b class="arrow"></b>
		</li>
		<li class="
		<?=(current_url() == site_url('admin/kategori')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/lokasi')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/lokasi/add')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/lokasi-kategori')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/gedung')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/kondisi')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/satuan')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/hak')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/perolehan')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/pengguna')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/pengguna-kategori')) ? 'active open':''?>
		">
			<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-pencil-square-o"></i>
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
		<?=(current_url() == site_url('admin/inventaris_peralatan')) ? 'active':''?>
		">
			<a href="<?= site_url('admin/inventaris') ?>">
			<i class="menu-icon glyphicon glyphicon-cloud"></i>
			<span class="menu-text"> Data Inventaris </span>
			</a>
			<b class="arrow"></b>
		</li>
		<li class="">
			<a href="#">
			<i class="menu-icon fa fa-line-chart "></i>
			<span class="menu-text"> Statistik </span>
			</a>
			<b class="arrow"></b>
		</li>
		<li class="<?=(current_url() == site_url('admin/penempatan')) ? 'active open':''?>
		<?=(current_url() == site_url('admin/penempatan/new')) ? 'active open':''?>">
			<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-check-square-o"></i>
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
				<li class="">
					<a href="<?= site_url('admin/mutasi') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Mutasi
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?= site_url('admin/user') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Penghapusan
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
			<i class="menu-icon fa fa-codepen"></i>
			<span class="menu-text"> Menu Interaktif </span>
			<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="<?=(current_url() == site_url('admin/inventaris_ruangan')) ? 'active':''?>">
					<a href="<?= site_url('admin/inventaris_ruangan') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					D B R
					</a>
					<b class="arrow"></b>
				</li>
				<li class="<?=(current_url() == site_url('admin/inventaris_lainnya')) ? 'active':''?>">
					<a href="<?= site_url('admin/inventaris_lainnya') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					D B L
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li class="">
			<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-print"></i>
			<span class="menu-text"> Report </span>
			<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="profile.html">
					<i class="menu-icon fa fa-caret-right"></i>
					K I B
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?= site_url('admin/user') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					D B R
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="pricing.html">
					<i class="menu-icon fa fa-caret-right"></i>
					D B L
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li class="">
			<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-cog"></i>
			<span class="menu-text"> Settings </span>
			<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="profile.html">
					<i class="menu-icon fa fa-caret-right"></i>
					User Profile
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?= site_url('admin/user') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					User Management
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="pricing.html">
					<i class="menu-icon fa fa-caret-right"></i>
					Database
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="pricing.html">
					<i class="menu-icon fa fa-caret-right"></i>
					Log Activity
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?= site_url('admin/user') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					QR Code
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li class="">
			<a href="">
			<i class="menu-icon fa fa-question-circle" aria-hidden="true"></i>
			<span class="menu-text"> Helps </span>
			</a>
			<b class="arrow"></b>
		</li>
	</ul>
	<!-- /.nav-list -->
	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>