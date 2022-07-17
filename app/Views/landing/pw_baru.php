<!DOCTYPE html>
<html>
  <head>
    <title>SIMASET PNL</title>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Logo_Politeknik_Negeri_Lhokseumawe.png/120px-Logo_Politeknik_Negeri_Lhokseumawe.png" />
    <link rel="stylesheet" href="<?= base_url('') ?>/template/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://simaset.ibisa.ac.id/assets/css/animate.css" />
    <link rel="stylesheet" href="https://simaset.ibisa.ac.id/assets/css/bootstrap-default.css" />
    <link rel="stylesheet" href="https://simaset.ibisa.ac.id/assets/css/bootstrap-theme-graymor.css" />
    <link rel="stylesheet" href="https://simaset.ibisa.ac.id/assets/css/custom-style.css" />
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
                <li>
                  <a href="javascript:void" style="color: white; font-weight: 500; text-decoration: none;">
                    <div id="time"></div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="main-content">
        <!-- Page Main Content Start -->
        <div id="page-content" style="margin-top: 50px;">
          <div class="container">
            <div>
              <h3>Password Reset </h3>
              <small class="text-muted">
              Please provide the valid email address you used to register
              </small>
              <?php if (!empty(session()->getFlashdata('pesan'))) : ?>
              <div><br></div>
              <div class="alert alert-danger alert-dismissible fade show" role="alert" data-dismiss="alert">
                <strong>
                  <i class="ace-icon fa fa-times"></i>
                  Error!
                  <?= session()->getFlashdata('pesan') ?></strong> .
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php endif; ?>
              <?php if (!empty(session()->getFlashdata('sukses'))) : ?>
              <div><br></div>
              <div class="alert alert-success alert-dismissible fade show" role="alert" data-dismiss="alert">
                <strong>
                  <i class="ace-icon fa fa-check"></i>
                  Well Done!
                  <?= session()->getFlashdata('sukses') ?></strong> .
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php endif; ?>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-8">
                <form method="post" action="<?= site_url('pw_baru/verify') ?>">
                  <div class="row">
                    <div class="col-9">
                      <input value="" placeholder="New Password" required="required" class="form-control default" name="password" type="password">
                    </div>
                  </div>
                  <div><br></div>
                  <div class="row">
                    <div class="col-9">
                      <input value="" placeholder="New Password Confirm" required="required" class="form-control default" name="new_password" type="password">
                    </div>
                  </div>
                  <div><br></div>
                  <div class="row">
                    <div class="col-9">
                      <input placeholder="Reset Key" required="required" class="form-control default" name="reset_key" type="text" value="<?= $key ?>">
                    </div>
                  </div>
                  <div><br></div>
                  <div class="row">
                    <div class="col-3">
                      <button class="btn btn-success" type="submit"> Send <i class="fa fa-envelope"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <br>
          </div>
        </div>
        <!-- Page Main Content [End] -->
        <!-- Page Footer Start -->
        <footer class="main-footer no-print" style="background: #fff;padding: 15px;color: #444;border-top: 1px solid #d2d6de; position:absolute;bottom:0;width:100%;height:60px;">
          <div class="pull-right hidden-xs">
          </div>
          <div class="container">
            <strong>© 2022 | simasetpnl.rf.gd</strong>
          </div>
          <!-- /.container -->
        </footer>
        <!-- Page Footer Ends -->
      </div>
    </div>
    <script type="text/javascript" src="https://simaset.ibisa.ac.id/assets/js/bootstrap-4.3.1.min.js"></script>
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