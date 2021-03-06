<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Aplikasi Sistem Informasi Manajemen Aset PNL | SIMASET PNL Ver 1.0</title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<!-- page specific plugin styles -->
		<!-- text fonts -->
		<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/fonts.googleapis.com.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<!--[if lte IE 9]>
		<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/ace-rtl.min.css" />
		<!--[if lte IE 9]>
		<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/ace-ie.min.css" />
		<![endif]-->
		<!-- inline styles related to this page -->
		<!-- ace settings handler -->
		<script src="<?= base_url('') ?>/template/assets/js/ace-extra.min.js"></script>
		<script src="<?= base_url('') ?>/template/assets/js/jquery-2.1.4.min.js"></script>
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
		<!--[if lte IE 8]>
		<script src="<?= base_url('') ?>/template/assets/js/html5shiv.min.js"></script>
		<script src="<?= base_url('') ?>/template/assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
				<span class="sr-only">Toggle sidebar</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<div class="navbar-header pull-left">
					<a href="./" class="navbar-brand">
					<small><i class="fa fa-leaf"></i>&nbsp; Simaset PNL</small>
					</a>
				</div>
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<i class="ace-icon fa fa-cog icon-animated-vertical"></i> <span>SIMASET PNL</span><i class="ace-icon fa fa-caret-down"></i>
							</a>
							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li><a href="./"><i class="ace-icon fa fa-home"></i>Home</a></li>
								<li class="divider"></li>
								<li>
									<a href=""><i class="ace-icon fa fa-key"></i>Login</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success"><i class="ace-icon fa fa-signal"></i></button>
						<button class="btn btn-info"><i class="ace-icon fa fa-pencil"></i></button>
						<button class="btn btn-warning"><i class="ace-icon fa fa-user"></i></button>
						<button class="btn btn-danger"><i class="ace-icon fa fa-cogs"></i></button>
					</div>
					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>
						<span class="btn btn-info"></span>
						<span class="btn btn-warning"></span>
						<span class="btn btn-danger"></span>
					</div>
				</div>
				<ul class="nav nav-list">
					<li class=""><a href="./"><i class="menu-icon fa fa-tachometer"></i><span class="menu-text"> Dashboard</span></a><b class="arrow"></b></li>
					<li class=""><a href="<?= site_url('user-login') ?>"><i class="menu-icon fa fa-key"></i><span class="menu-text"> Login</span></a><b class="arrow"></b></li>
				</ul>
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="./">Home</a>
							</li>
							<li class="active">Login</li>
						</ul>
					</div>
					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>
							<!-- /.ace-settings-box -->
							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
										Inside <b>.container</b>
										</label>
									</div>
								</div>
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div>
							</div>
						</div>
						<!-- /.content -->
						<div class="page-header">
							<h1>
								Sign in to SIMASET<small></small>
							</h1>
						</div>
						<div class="row">
							<div class="col-sm-10 col-sm-offset-1">
								<div class="login-container">
									<div class="center">
										<h1><i class="ace-icon fa fa-leaf"></i><span class="blue"> SIMASET</span> PNL</h1>
									</div>
									<div class="position-relative">
										<div class="login-box visible widget-box no-border">
											<div class="widget-body">
												<div class="widget-main">
													<?php if (session()->getFlashdata('msg') !== NULL) : ?>
													    <div class="alert alert-block alert-danger">
													        <?php echo session()->getFlashdata('msg'); ?>
													        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													    </div>
													<?php endif; ?>
													<h4 class="header blue lighter bigger"><i class="ace-icon fa fa-coffee orange"></i> Login To Access Your Autorization</h4>
													<div class="space-6"></div>
													<form action="<?= site_url('login/proses') ?>" method="POST">
														<fieldset>
															<div class="col-sm-4">
																<div>
																	<img src="<?= base_url('') ?>/template/assets/images/avatars/logo.jpg" width="100" height="100" />
																</div>
																<div class="space-4"></div>
															</div>
															<div class="col-sm-8">
																<label class="block clearfix">
																<span class="block input-icon input-icon-right">
																<input type="text" name="username" maxlength="64" class="form-control" placeholder=" Username" required/><i class="ace-icon fa fa-user"></i>
																</span>
																</label>
																<label class="block clearfix">
																<span class="block input-icon input-icon-right">
																<input type="password" name="password" maxlength="255" class="form-control" placeholder=" Password" required/><i class="ace-icon fa fa-lock"></i>
																</span>
																</label>
																<div class="space"></div>
																<div class="clearfix">
																	<label class="inline">
																	<input type="checkbox" class="ace" /><span class="lbl"> Remember Me</span>
																	</label>
																	<button type="submit" class="width-35 pull-right btn btn-sm btn-primary"><i class="ace-icon fa fa-key"></i><span class="bigger-110"> Login</span></button>
																</div>
																<div class="space-4"></div>
															</div>
														</fieldset>
													</form>
													<div class="social-or-login center">
														<span class="bigger-110"><i class="ace-icon fa fa-cog icon-animated-vertical"></i></span>
													</div>
													<div class="space-6"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<script> // 500 = 0,5 s
							$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
							setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
						</script>					
					</div>
				</div>
			</div>
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-110">
						<a href="#">SIMASET PNL</a> &copy; 2022. Version 1.0
						</span>
					</div>
				</div>
			</div>
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div>
		<!-- basic scripts -->
		<!--[if !IE]> -->
		<!-- <![endif]-->
		<!--[if IE]>
		<script src="<?= base_url('') ?>/template/assets/js/jquery-1.11.3.min.js"></script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url('') ?>/template/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?= base_url('') ?>/template/assets/js/bootstrap.min.js"></script>
		<!-- page specific plugin scripts -->
		<!--[if lte IE 8]>
		<script src="<?= base_url('') ?>/template/assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="<?= base_url('') ?>/template/assets/js/jquery-ui.custom.min.js"></script>
		<script src="<?= base_url('') ?>/template/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?= base_url('') ?>/template/assets/js/jquery.easypiechart.min.js"></script>
		<script src="<?= base_url('') ?>/template/assets/js/jquery.sparkline.index.min.js"></script>
		<script src="<?= base_url('') ?>/template/assets/js/jquery.flot.min.js"></script>
		<script src="<?= base_url('') ?>/template/assets/js/jquery.flot.pie.min.js"></script>
		<script src="<?= base_url('') ?>/template/assets/js/jquery.flot.resize.min.js"></script>
		<!-- ace scripts -->
		<script src="<?= base_url('') ?>/template/assets/js/ace-elements.min.js"></script>
		<script src="<?= base_url('') ?>/template/assets/js/ace.min.js"></script>
		<!-- inline scripts related to this page -->
	</body>
</html>