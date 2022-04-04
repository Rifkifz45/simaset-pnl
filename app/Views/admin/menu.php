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
		<li class="">
			<a href="<?= site_url('admin') ?>">
			<i class="menu-icon fa fa-tachometer"></i>
			<span class="menu-text"> Dashboard </span>
			</a>
			<b class="arrow"></b>
		</li>
		<li class="">
			<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-database"></i>
			<span class="menu-text">
			Data Store
			</span>
			<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?= site_url('admin/categories') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Categories
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?= site_url('admin/location-buildings') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Location
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="buttons.html">
					<i class="menu-icon fa fa-caret-right"></i>
					Status
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="content-slider.html">
					<i class="menu-icon fa fa-caret-right"></i>
					Unit of Measure
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="treeview.html">
					<i class="menu-icon fa fa-caret-right"></i>
					Historical Asset
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="jquery-ui.html">
					<i class="menu-icon fa fa-caret-right"></i>
					Person in Charge
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="nestable-list.html">
					<i class="menu-icon fa fa-caret-right"></i>
					User
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li class="">
			<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-file-excel-o"></i>
			<span class="menu-text"> Import </span>
			<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="tables.html">
					<i class="menu-icon fa fa-caret-right"></i>
					Drafted Import
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-caret-right"></i>
					Import Data
					<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>
					<ul class="submenu">
						<li class="">
							<a href="#">
							<i class="menu-icon fa fa-leaf green"></i>
							#2 Tanah
							</a>
							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="<?= site_url('admin/peralatan-mesin/view-import') ?>">
							<i class="menu-icon fa fa-leaf green"></i>
							#3 Mesin
							</a>
							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="#">
							<i class="menu-icon fa fa-leaf green"></i>
							#4 Gedung
							</a>
							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="#">
							<i class="menu-icon fa fa-leaf green"></i>
							#5 Irigasi
							</a>
							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="#">
							<i class="menu-icon fa fa-leaf green"></i>
							#6 Aset Tetap
							</a>
							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="#">
							<i class="menu-icon fa fa-leaf green"></i>
							#7 Konstruksi
							</a>
							<b class="arrow"></b>
						</li>
						<li class="">
							<a href="#">
							<i class="menu-icon fa fa-leaf green"></i>
							#8 Tak Berwujud
							</a>
							<b class="arrow"></b>
						</li>
					</ul>
				</li>
			</ul>
		</li>
		<li class="">
			<a href="<?= site_url('admin/master-asset') ?>">
			<i class="menu-icon fa fa-building-o"></i>
			<span class="menu-text"> Master Assets </span>
			</a>
			<b class="arrow"></b>
		</li>
		<li class="">
			<a href="#">
			<i class="menu-icon fa fa-bar-chart"></i>
			<span class="menu-text"> Statistik </span>
			</a>
			<b class="arrow"></b>
		</li>
		<li class="">
			<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-exchange"></i>
			<span class="menu-text"> Transaction </span>
			<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?= site_url('admin/mutasi') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					#1 Movement
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?= site_url('admin/user') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					#2 Disposal
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li class="">
			<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-link"></i>
			<span class="menu-text"> Menu Interactive </span>
			<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="profile.html">
					<i class="menu-icon fa fa-caret-right"></i>
					#1 Daftar Barang Ruangan
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?= site_url('admin/user') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					#2 Daftar Barang Lainnya
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?= site_url('admin/user') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					#3 Kartu Inventaris Barang
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li class="">
			<a href="calendar.html">
			<i class="menu-icon fa fa-qrcode"></i>
			<span class="menu-text">
			Cetak QR-Code
			</span>
			</a>
			<b class="arrow"></b>
		</li>
		<li class="">
			<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-file"></i>
			<span class="menu-text"> Report </span>
			<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="profile.html">
					<i class="menu-icon fa fa-caret-right"></i>
					Report KIB
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?= site_url('admin/user') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Report DBR
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="pricing.html">
					<i class="menu-icon fa fa-caret-right"></i>
					Report DBL
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li class="">
			<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-tag"></i>
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
					Backup Database
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="invoice.html">
					<i class="menu-icon fa fa-caret-right"></i>
					Logout
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
	</ul>
	<!-- /.nav-list -->
	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>