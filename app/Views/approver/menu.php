<div id="sidebar" class="sidebar responsive ace-save-state">
	<script type="text/javascript">
		try{ace.settings.loadState('sidebar')}catch(e){}
	</script>
	<!-- /.sidebar-shortcuts -->
	<ul class="nav nav-list">
		<li class="<?=(current_url()==site_url('approver')) ? 'active':''?>">
			<a href="<?= site_url('approver') ?>">
			<i class="menu-icon fa fa-home"></i>
			<span class="menu-text"> Home </span>
			</a>
			<b class="arrow"></b>
		</li>
		<li class="
		<?=(current_url() == site_url('approver/profile')) ? 'active open':''?>
		<?=(current_url() == site_url('approver/user')) ? 'active open':''?>
		">
			<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-database"></i>
			<span class="menu-text"> Settings </span>
			<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="<?=(current_url() == site_url('approver/profile')) ? 'active':''?>">
					<a href="<?= site_url('approver/profile') ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						User Profile
					</a>

					<b class="arrow"></b>
				</li>

				<li class="<?=(current_url() == site_url('approver/user')) ? 'active':''?>">
					<a href="<?= site_url('approver/user') ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						User Module
					</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li class="
		<?=(current_url() == site_url('approver/penempatan')) ? 'active open':''?>
		<?=(current_url()==site_url('approver/mutasi')) ? 'active open':''?>
		">
			<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-database"></i>
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

				<li class="<?=(current_url()==site_url('approver/mutasi')) ? 'active':''?>">
					<a href="<?= site_url('approver/mutasi') ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Mutasi
					</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li class="
		<?=(current_url() == site_url('approver/statistik-group')) ? 'active':''?>
		<?=(current_url() == site_url('approver/statistik-chart')) ? 'active':''?>
		">
			<a href="<?= site_url('approver/statistik-group') ?>">
			<i class="menu-icon fa fa-line-chart"></i>
			<span class="menu-text"> Statistik </span>
			</a>
			<b class="arrow"></b>
		</li>
		<li class="<?=(current_url() == site_url('approver/reports')) ? 'active':''?>">
			<a href="<?= site_url('approver/reports') ?>">
			<i class="menu-icon fa fa-file-o"></i>
			<span class="menu-text"> Report </span>
			</a>
			<b class="arrow"></b>
		</li>
	</ul>
	<!-- /.nav-list -->
	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>