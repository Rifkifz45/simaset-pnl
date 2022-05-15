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
		<li class="<?=(current_url()==site_url('approver')) ? 'active':''?>">
			<a href="<?= site_url('approver') ?>">
			<i class="menu-icon fa fa-tachometer"></i>
			<span class="menu-text"> Dashboard </span>
			</a>
			<b class="arrow"></b>
		</li>
		<li class="">
			<a href="#">
			<i class="menu-icon glyphicon glyphicon-cloud"></i>
			<span class="menu-text"> Data Inventaris </span>
			</a>
			<b class="arrow"></b>
		</li>
		<li class="">
			<a href="#">
			<i class="menu-icon fa fa-line-chart"></i>
			<span class="menu-text"> Statistik </span>
			</a>
			<b class="arrow"></b>
		</li>
		<li class="<?=(current_url() == site_url('approver/penempatan')) ? 'active open':''?>">
			<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-check-square-o"></i>
			<span class="menu-text"> Transaksi </span>
			<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="
				<?=(current_url()==site_url('approver/penempatan')) ? 'active':''?>
				">
					<a href="<?= site_url('approver/penempatan') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					Penempatan
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="#">
					<i class="menu-icon fa fa-caret-right"></i>
					Mutasi
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="#">
					<i class="menu-icon fa fa-caret-right"></i>
					Penghapusan
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li class="<?=(current_url()==site_url('approver/inventaris_ruangan')) ? 'active open':''?>">
			<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-codepen"></i>
			<span class="menu-text"> Menu Interactive </span>
			<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="<?=(current_url()==site_url('approver/inventaris_ruangan')) ? 'active':''?>">
					<a href="<?= site_url('approver/inventaris_ruangan') ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					D B R
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="#">
					<i class="menu-icon fa fa-caret-right"></i>
					D B L
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="#">
					<i class="menu-icon fa fa-caret-right"></i>
					K I B
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
					<a href="#">
					<i class="menu-icon fa fa-caret-right"></i>
					Report KIB
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="#">
					<i class="menu-icon fa fa-caret-right"></i>
					Report DBR
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="#">
					<i class="menu-icon fa fa-caret-right"></i>
					Report DBL
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
					<a href="#">
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
					<a href="#">
					<i class="menu-icon fa fa-caret-right"></i>
					Backup Database
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="#">
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