<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<link rel="icon" href="<?= site_url('icon/web.png') ?>" type="image/png">
		<title>SIMASET APPLICATION</title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<!-- page specific plugin styles -->
		<!-- text fonts -->
		<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/chosen.min.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<!--[if lte IE 9]>
		<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/ace-rtl.min.css" />
		<?= $this->renderSection('head') ?>
		<!--[if lte IE 9]>
		<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/ace-ie.min.css" />
		<![endif]-->
		<!-- inline styles related to this page -->
		<!-- ace settings handler -->
		<script src="<?= base_url('') ?>/template/assets/js/ace-extra.min.js"></script>
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
		<!--[if lte IE 8]>
		<script src="<?= base_url('') ?>/template/assets/js/html5shiv.min.js"></script>
		<script src="<?= base_url('') ?>/template/assets/js/respond.min.js"></script>
		<![endif]-->
			<style>
				.tooltip-inner {
			    min-width: 80px; /* the minimum width */
			}
			</style>
	</head>
	<body class="no-skin">
		<?= $this->include('admin/navbar') ?>
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
			<?= $this->include('admin/menu') ?>
			<?= $this->renderSection('content') ?>
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Ace</span>
							Page rendered in {elapsed_time} seconds
						</span>
					</div>
				</div>
			</div>
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
			</div><!-- /.main-container -->
			<!-- basic scripts -->
			<!--[if !IE]> -->
			<script src="<?= base_url('') ?>/template/assets/js/jquery-2.1.4.min.js"></script>
			<!-- <![endif]-->
			<!--[if IE]>
			<script src="<?= base_url('') ?>/template/assets/js/jquery-1.11.3.min.js"></script>
			<![endif]-->
			<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url('') ?>/template/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
			</script>
			<script src="<?= base_url('') ?>/template/assets/js/bootstrap.min.js"></script>
			<!-- page specific plugin scripts -->
			<!-- ace scripts -->
			<script src="<?= base_url('') ?>/template/assets/js/ace-elements.min.js"></script>
			<script src="<?= base_url('') ?>/template/assets/js/ace.min.js"></script>
			<?= $this->renderSection('script') ?>
			<!-- inline scripts related to this page -->
			<!-- Yandex.Metrika counter -->
			<script>
				$(function(){
					$('[rel="tooltip"] ').tooltip({trigger: "hover" })
				});
			</script>
		</body>
	</html>