<?php
$session = session();
?>

<div id="navbar" class="navbar navbar-default ace-save-state">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
		<span class="sr-only">Toggle sidebar</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<div class="navbar-header pull-left">
			<a href="<?= site_url('admin') ?>" class="navbar-brand">
				<small>
					<i class="fa fa-archive"></i>
					<span class="white">SIMASETPNL [<small>SUPPORT QRCODE SCANNER</small>]</span>
					<span class="white" id="id-text2"><u></u></span>
				</small>
			</a>
		</div>
		
		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="light-blue dropdown-modal">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="<?= base_url('uploads/user/'.$session->get('foto_user')) ?>" alt="<?php
							echo $session->get('nama_user')
							?> Photo " />
						<span class="user-info">
							<small>Welcome,</small>
							<?php
							echo $session->get('nama_user')
							?>
						</span>
						<i class="ace-icon fa fa-caret-down"></i>
					</a>
					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="<?= site_url('admin/user-profile') ?>">
								<i class="ace-icon fa fa-user"></i>
								Profile
							</a>
						</li>
						<li>
							<a href="<?= site_url('admin/logout') ?>">
								<i class="ace-icon fa fa-power-off"></i>
								Logout
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		</div><!-- /.navbar-container -->
	</div>