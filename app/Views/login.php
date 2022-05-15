<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
		<title>Login - Sistem Informasi Manajemen Aset PNL</title>
		<link rel="icon" href="images/Logo_Politeknik_Negeri_Lhokseumawe.png">
		<style>
			.login, .image{min-height: 100vh}.bg-image{background-image: url('https://lh5.googleusercontent.com/p/AF1QipNMBy7B6sMBTK5ij-PyJ-lSJHDJKUNGRwFCrKPX=w600-h650-p-k-no');background-size: cover;background-position: center center}
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row no-gutter">
				<div class="col-md-6 d-none d-md-flex bg-image">
				</div>
				<div class="col-md-6 bg-light">
					<div class="login d-flex align-items-center py-5">
						<div class="container">
							<div class="row">
								<div class="col-lg-7 col-xl-6 mx-auto">
									<h3 class="display-4">LOGIN!!</h3>
									<br> 
									<form action="<?= site_url('login/proses') ?>" method="POST">
										<div class="form-group mb-3"> <input id="inputEmail" name="username" type="text" placeholder="Username" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4"> </div>
										<div class="form-group mb-3"> <input id="inputPassword" type="password" placeholder="Password" name="password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-danger"><br> </div>
										<div class="custom-control custom-checkbox mb-3"> <input id="customCheck1" type="checkbox" checked class="custom-control-input"> <label for="customCheck1" class="custom-control-label">Remember password</label> </div>
										<button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button> 
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>