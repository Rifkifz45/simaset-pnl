<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi ujian online (CBT) tanpa ribet!">
    <meta name="author" content="">
    <title>Politeknik Negeri Lhokseumawe | simasetpnl.rf.gd</title>
    <meta property="og:title" content="Aplikasi CBT Online | SMP Negeri 1 Kota Jambi" />
    <meta property="og:description" content="Aplikasi ujian online (CBT) tanpa ribet!" />
    <meta property="og:url" content="https://admin123" />
    <meta property="og:image" content="https://admin123/logo" />
    <link rel="icon" type="image/png" sizes="32x32" href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Logo_Politeknik_Negeri_Lhokseumawe.png/618px-Logo_Politeknik_Negeri_Lhokseumawe.png">
    <link media="all" type="text/css" rel="stylesheet" href="https://ujian.spensajambi.sch.id/assets/bootstrap/css/bootstrap.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="https://ujian.spensajambi.sch.id/assets/fontawesome/css/font-awesome.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="https://ujian.spensajambi.sch.id/assets/themes/portal/style.css?t=2.0">
    <?= $this->renderSection('head') ?>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-offset-2 col-md-8 col-xs-12 wrapper">
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <li role="presentation" id="beranda" class="active">
                    <a href="https://ujian.spensajambi.sch.id">Home</a>
                  </li>
                  <li role="presentation" id="jadwal">
                    <a href="https://ujian.spensajambi.sch.id/schedule">About Us</a>
                  </li>
                  <li role="presentation" id="contact">
                    <a href="https://ujian.spensajambi.sch.id/contact">Detail</a>
                  </li>
                  <li role="presentation" id="contact">
                    <a href="https://ujian.spensajambi.sch.id/contact">Print</a>
                  </li>
                  <li role="presentation">
                    <a href="<?= site_url('page-login') ?>">Login </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <div class="row top-header">
            <div class="col-md-1 col-sm-2 col-lg-1 visible-md-block visible-lg-block">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Logo_Politeknik_Negeri_Lhokseumawe.png/618px-Logo_Politeknik_Negeri_Lhokseumawe.png" width="50">
            </div>
            <div class="col-md-10 col-xs-12 col-sm-12">
              <div class="header">
                <h1>Politeknik Negeri Lhokseumawe</h1>
                <p class="alamat">Jl. Medan - Banda Aceh No.Km. 280, RW.Buketrata, Mesjid Punteut, Kec. Blang Mangat, Kota Lhokseumawe, Aceh 24301</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 header-portal">
              <img src="<?= base_url('uploads/landing.jpg') ?>" class="img-responsive" alt="IMAGE">
            </div>
          </div>
          <div class="row content">
            <div class="col-md-12">
              <p class="text-center pagination"></p>
              WOJDNJKNLK
            </div>
          </div>
          <div class="footer"> SISTEM INFORMASI ASET KAMPUS POLITEKNIK NEGERI LHOKSEUMAWE | Your IP: 
          <?php
          //whether ip is from share internet
          if (!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
          }

          //whether ip is from proxy
          elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
          }
          //whether ip is from remote address
          else{
            $ip_address = $_SERVER['REMOTE_ADDR'];
          }
          echo $ip_address;
        ?> </div>
        </div>
      </div>
    </div>
    <script src="https://ujian.spensajambi.sch.id/assets/js/jquery-3.4.1.min.js"></script>
    <script src="https://ujian.spensajambi.sch.id/assets/bootstrap/js/bootstrap.min.js"></script>
    <?= $this->renderSection('script') ?>
  </body>
</html>