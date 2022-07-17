<!DOCTYPE html>
<html>
	<head>
		<title>SIMASET PNL</title>
		<link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Logo_Politeknik_Negeri_Lhokseumawe.png/120px-Logo_Politeknik_Negeri_Lhokseumawe.png" />
		<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?= base_url('') ?>/landing/b/animate.css" />		
		<link rel="stylesheet" href="<?= base_url('') ?>/landing/b/bootstrap-default.css" />
		<link rel="stylesheet" href="<?= base_url('') ?>/landing/b/bootstrap-theme-graymor.css" />
		<link rel="stylesheet" href="<?= base_url('') ?>/landing/b/custom-style.css" />
	</head>
	<body id="index" class="with-login index-index">
		<div id="page-wrapper">
			<div id="topbar" class="navbar navbar-expand-md fixed-top navbar-dark bg-dark" style="background-color:#294a70 !important;">
				<div class="container-fluid">
					<div class="col-md-8 comp-grid">
						<a class="navbar-brand" href="<?= site_url('') ?>" style="font-weight: 700;"><i class="fa fa-leaf"></i> SIMASET PNL</a>
					</div>

					<div class="col-md-4 comp-grid">
						<div class="navbar-custom-menu">
							<ul class="nav navbar-nav">
								<li><a href="javascript:void" style="color: white; font-weight: 500; text-decoration: none;"><div id="time"></div></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div id="main-content">
				<!-- Page Main Content Start -->
				<div id="page-content" style="min-height: 70vh !important;">
					<div class="py-5">
						<div class="container">
							<div class="row ">
								<div class="col-md-8 comp-grid">
									<h2 >WELCOME to Sistem Informasi Manajemen Aset PNL </h2>
									<div class="">
										<style>
											body
											{ 
											background-image:  url(assets/images/bg-0.jpg);
											background-repeat: no-repeat;
											background-size: cover;
											}  
										</style>
										Please login to Access your Authorization
										<div>
											<br>
										</div>
									</div>
									<?php if (!empty(session()->getFlashdata('pesan'))) : ?>
						              <div class="alert alert-success alert-dismissible fade show" role="alert" data-dismiss="alert">
						                <strong>
						                  <i class="ace-icon fa fa-check"></i>
						                  Well Done!
						                  <?= session()->getFlashdata('pesan') ?></strong> .
						                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						                  <span aria-hidden="true">&times;</span>
						                </button>
						              </div>
						              <?php endif; ?>
						              <?php if (!empty(session()->getFlashdata('error'))) : ?>
						              <div class="alert alert-danger alert-dismissible fade show" role="alert" data-dismiss="alert">
						                <strong>
						                  <i class="ace-icon fa fa-times"></i>
						                  Failed!
						                  <?= session()->getFlashdata('error') ?></strong> .
						                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						                  <span aria-hidden="true">&times;</span>
						                </button>
						              </div>
						              <?php endif; ?>
								</div>
								<div class="col-md-4 comp-grid">
									<div  class="bg-light p-3 animated fadeIn page-content">
										<div>
											<h4><i class="fa fa-key"></i> User Login</h4>
											<hr />
											<form name="loginForm" action="<?= site_url('login/proses') ?>" class="needs-validation form page-form" method="post">
												<div class="input-group form-group">
													<input placeholder="Username Or Email" name="username"  required="required" class="form-control" type="text" autofocus  />
													<div class="input-group-append">
														<span class="input-group-text"><i class="form-control-feedback fa fa-user"></i></span>
													</div>
												</div>
												<div class="input-group form-group">
													<input  placeholder="Password" required="required" id="password" name="password" class="form-control " type="password" />
													<div class="input-group-append">
														<span class="input-group-text"><i class="form-control-feedback fa fa-key"></i></span>
													</div>
												</div>
												<div class="row clearfix mt-3 mb-3">
													<div class="col-6">
														<label class="">
														<input value="true" type="checkbox" onclick="myFunction()" />
														Show Password
														</label>
													</div>
													<div class="col-6">
														<a href="<?= site_url('reset_password') ?>" class="text-danger"> Reset Password?</a>
													</div>
												</div>
												<div class="form-group text-center">
													<button class="btn btn-primary btn-block btn-md" type="submit">
														Login <i class="fa fa-key"></i>
													</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="col-md-4 comp-grid">
								</div>
							</div>
						</div>
					</div>
					<div  class="">
						<div class="container">
							<div class="row ">
								<div class="col-md-12 comp-grid">
								</div>
								<div class="col-md-6 comp-grid">
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Page Main Content [End] -->
				<!-- Page Footer Start -->
				<footer class="main-footer no-print" style="background: #fff;padding: 15px;color: #444;border-top: 1px solid #d2d6de; position:absolute;bottom:0;width:100%;height:60px;">
			      <div class="pull-right hidden-xs">
			              </div>
			      <div class="container">
			        <strong>© 2022 | simasetpnl.rf.gd</strong>
			      </div><!-- /.container -->
			    </footer>
				<!-- Page Footer Ends -->
			</div>
		</div>
		<script type="text/javascript" src="<?= base_url('') ?>/landing/b/bootstrap-4.3.1.min.js"></script>
		<script type="text/javascript">
			function myFunction() {
			  var x = document.getElementById("password");
			  if (x.type === "password") {
			    x.type = "text";
			  } else {
			    x.type = "password";
			  }
			}
		</script>
		<script>
		var timeDisplay = document.getElementById("time");

		function refreshTime() {
			var dateString = new Date().toLocaleString("en-GB", {timeZone: "Asia/Jakarta"});
			var formattedString = dateString.replace(", ", " - ");
			timeDisplay.innerHTML = formattedString;
		}
		setInterval(refreshTime, 1000);
		</script>
	</body>
</html>