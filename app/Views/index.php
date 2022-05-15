<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Manajemen Aset PNL</title>
    <link rel="icon" href="<?= base_url('') ?>/login/images/Logo_Politeknik_Negeri_Lhokseumawe.png">
    <link href="https://fonts.googleapis.com/css?family=Dosis:600|Roboto:400,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url('') ?>/login/css/bootstrap.min.css?ver=1.1.0" rel="stylesheet">
    <link href="<?= base_url('') ?>/login/css/paper-kit.min.css?ver=1.1.0" rel="stylesheet">
    <link href="<?= base_url('') ?>/login/css/main.css?ver=1.1.0" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('') ?>/login/css/index.css">
  </head>
  <body id="top">
    <header>
      <div class="aa-header">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-gradient">
          <div class="container">
            <img class="img-fluid pr-3 aa-logo-img" src="<?= base_url('') ?>/login/images/logo.png" alt="logo"><a class="navbar-brand px-0 py-0" href="#">SIMASET PNL</a>
            <div class="collapse navbar-collapse">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#tujuan">Tujuan</a></li>
                <li class="nav-item"><a class="nav-link" href="#alur">Alur Aplikasi</a></li>
                <li class="nav-item"><a class="nav-link" href="#tim">Tim</a></li>
                <li class="nav-item"><a class="nav-link" href="#screenshots">Screenshot Aplikasi</a></li>
                <li class="nav-item"><a class="btn btn-outline-neutral btn-round" href="<?= site_url('page-login') ?>">Login Now</a></li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="container aa-header-content text-left text-white">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <h1 class="text-white mb-4">SIMASET PNL <br/>App Landing Template</h1>
              <p>SIMASET PNL merupakan aplikasi manajemen aset yang dikembangkan sebagai upaya penatausahaan aset Barang Milik Negara (BMN) di lingkungan Politeknik Negeri Lhokseumawe.</p>
              <ul class="py-1 list-unstyled">
                <li class="py-2"><i class="fa fa-check-circle pr-4" aria-hidden="true"></i> Melakukan Inventarisasi Aset di Politeknik Negeri Lhokseumawe</li>
                <li class="py-2"><i class="fa fa-check-circle pr-4" aria-hidden="true"></i> Melakukan Inventarisasi Aset menggunakan QR-Code</li>
                <li class="py-2"><i class="fa fa-check-circle pr-4" aria-hidden="true"></i> Menampilkan data Aset dengan visualisasi Mapping</li>
              </ul>
              <a class="mt-4 btn btn-outline-neutral btn-round" href="#features">Start Exploring</a>
            </div>
            <div class="col-md-6 col-sm-12 text-right"><img class="img-fluid" src="https://preview.colorlib.com/theme/safario/img/home/xhero-img.png.pagespeed.ic.LaxhZHLnb9.webp" width="80%" alt="Image"></div>
          </div>
        </div>
      </div>
    </header>
    <div class="page-content">
      <div>
        <div class="aa-product-features section" id="tujuan">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="title pb-3">Tujuan Pembuatan Aplikasi</h2>
                    <p class="pb-5">Tujuan dari penatausahaan aset Barang Milik Negara (BMN) menggunakan Aplikasi Quick Respont (QR) Code Aset adalah sebagai berikut :</p>
                </div> 
            </div> <!-- end row -->

            <section class="py-6 bg-light-primary">
            <div class="container">
                <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 text-center justify-content-center px-xl-6 aos-init aos-animate" data-aos="fade-up">
                    <div class="col my-3">
                        <div class="card border-hover-primary hover-scale">
                            <div class="card-body">
                                <div class="text-primary mb-5">
                                    <svg width="60" height="60" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="currentColor" opacity="0.3"></path>
                                            <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="currentColor"></path>
                                            <rect fill="currentColor" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"></rect>
                                            <rect fill="currentColor" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"></rect>
                                            <rect fill="currentColor" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"></rect>
                                            <rect fill="currentColor" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"></rect>
                                            <rect fill="currentColor" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"></rect>
                                            <rect fill="currentColor" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"></rect>
                                        </g>
                                    </svg>
                                </div>
                                <h6 class="font-weight-bold mb-3">Tujuan Jangka Pendek</h6>
                                <p class="text-muted mb-0">Terlaksananya proyek perubahan penatausahaan aset Barang Milik Negara yang dapat diakses menggunakan PC / Smartphone secara online</p>
                            </div>
                        </div>
                    </div>
                    <div class="col my-3">
                        <div class="card border-hover-primary hover-scale">
                            <div class="card-body">
                                <div class="text-primary mb-5">
                                    <svg width="60" height="60" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="currentColor"></path>
                                            <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="currentColor" opacity="0.3"></path>
                                        </g>
                                    </svg>
                                </div>
                                <h6 class="font-weight-bold mb-3">Tujuan Jangka Menengah</h6>
                                <p class="text-muted mb-0">Terwujudnya tertib administrasi aset BMN Politeknik Negeri Lhokseumawe, serta penambahan fitur Pemetaan Aset pada aplikasi QR-Code Aset.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col my-3">
                        <div class="card border-hover-primary hover-scale">
                            <div class="card-body">
                                <div class="text-primary mb-5">
                                    <svg width="60" height="60" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path d="M22,17 L22,21 C22,22.1045695 21.1045695,23 20,23 L4,23 C2.8954305,23 2,22.1045695 2,21 L2,17 L6.27924078,17 L6.82339262,18.6324555 C7.09562072,19.4491398 7.8598984,20 8.72075922,20 L15.381966,20 C16.1395101,20 16.8320364,19.5719952 17.1708204,18.8944272 L18.118034,17 L22,17 Z" fill="currentColor"></path>
                                            <path d="M2.5625,15 L5.92654389,9.01947752 C6.2807805,8.38972356 6.94714834,8 7.66969497,8 L16.330305,8 C17.0528517,8 17.7192195,8.38972356 18.0734561,9.01947752 L21.4375,15 L18.118034,15 C17.3604899,15 16.6679636,15.4280048 16.3291796,16.1055728 L15.381966,18 L8.72075922,18 L8.17660738,16.3675445 C7.90437928,15.5508602 7.1401016,15 6.27924078,15 L2.5625,15 Z" fill="currentColor" opacity="0.3"></path>
                                            <path d="M11.1288761,0.733697713 L11.1288761,2.69017121 L9.12120481,2.69017121 C8.84506244,2.69017121 8.62120481,2.91402884 8.62120481,3.19017121 L8.62120481,4.21346991 C8.62120481,4.48961229 8.84506244,4.71346991 9.12120481,4.71346991 L11.1288761,4.71346991 L11.1288761,6.66994341 C11.1288761,6.94608579 11.3527337,7.16994341 11.6288761,7.16994341 C11.7471877,7.16994341 11.8616664,7.12798964 11.951961,7.05154023 L15.4576222,4.08341738 C15.6683723,3.90498251 15.6945689,3.58948575 15.5161341,3.37873564 C15.4982803,3.35764848 15.4787093,3.33807751 15.4576222,3.32022374 L11.951961,0.352100892 C11.7412109,0.173666017 11.4257142,0.199862688 11.2472793,0.410612793 C11.1708299,0.500907473 11.1288761,0.615386087 11.1288761,0.733697713 Z" fill="currentColor" fill-rule="nonzero" transform="translate(11.959697, 3.661508) rotate(-270.000000) translate(-11.959697, -3.661508) "></path>
                                        </g>
                                    </svg>
                                </div>
                                <h6 class="font-weight-bold mb-3">Tujuan Jangka Panjang</h6>
                                <p class="text-muted mb-0">Agar aplikasi Manajemen Aset dapat terhubung dengan aplikasi Simak BMN dan dapat digunakan untuk semua Fakultas yang berada pada Politeknik Negeri Lhokseumawe</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>   
        </div>
        </div>
        <div class="aa-download-section section bg-gradient" id="alur">
          <div class="container text-center text-white">
            <h2 class="title pb-3 text-white">Alur Aplikasi</h2>
            <p class="pb-5">Berikut merupakan alur utama yang terdapat pada aplikasi untuk memberikan gambaran awal mengenai aplikasi Manajemen Aset dengan QR-Code.</p>
            <div class="container">                      
              <div class="row pb-3">
                <div class="col">
                  <div class="card" style="padding-top: 15px;">
                    <div class="card-body">
                    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                        <div class="timeline-step">
                            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2003">
                                <div class="inner-circle"></div>
                                <p class="h6 mt-3 mb-1">Event One</p>
                                <p class="h6 text-muted mb-0 mb-lg-0">Pendataan Ulang Aset</p>
                            </div>
                        </div>
                        <div class="timeline-step">
                            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2004">
                                <div class="inner-circle"></div>
                                <p class="h6 mt-3 mb-1">Event Two</p>
                                <p class="h6 text-muted mb-0 mb-lg-0">Input Data Pada Aplikasi</p>
                            </div>
                        </div>
                        <div class="timeline-step">
                            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2005">
                                <div class="inner-circle"></div>
                                <p class="h6 mt-3 mb-1">Event Three</p>
                                <p class="h6 text-muted mb-0 mb-lg-0">Cetak QR-Code</p>
                            </div>
                        </div>
                        <div class="timeline-step">
                            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2010">
                                <div class="inner-circle"></div>
                                <p class="h6 mt-3 mb-1">Event Four</p>
                                <p class="h6 text-muted mb-0 mb-lg-0">Tempel QR-Code</p>
                            </div>
                        </div>
                        <div class="timeline-step mb-0">
                            <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2020">
                                <div class="inner-circle"></div>
                                <p class="h6 mt-3 mb-1">Event Five</p>
                                <p class="h6 text-muted mb-0 mb-lg-0">Lihat Laporan Aset</p>
                            </div>
                        </div>
                      </div>
                    </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="aa-testimonials-section section" id="tim">
          <div class="container">
            <div class="text-center">
              <h2 class="title pb-3">Tim yang Terlibat</h2>
              <p class="pb-5">Berikut merupakan susunan tim kerja yang terlibat dalam proses pembuatan aplikasi QR-Code Aset.</p>
            </div>
            <div class="aa-testimonials">

              <div class="row">
                <div class="col-md-4 mb-3">
                  <div class="aa-testimonials-body">
                    <p>Bertugas merancang dan membuat alur sistem, desain, dan database dari aplikasi serta bertanggung jawab dalam proses pembuatan aplikasi dari awal hingga proses implementasi aplikasi oleh operator BMN.</p>
                    <div class="row pt-3">
                      <div class="col-lg-5 col-md-12"><img class="img-fluid" src="<?= base_url('') ?>/login/images/user1.jpg" alt="Face 1"/></div>
                      <div class="col-lg-7 col-md-12 pt-3">
                        <div class="h5">IMRON ROSADI, S.KOM</div>
                        <p class="text-muted">Pic Staf TIK</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="aa-testimonials-body">
                    <p>Bertugas memberikan data aset barang yang lengkap dan benar kepada PIC IT sebagai panduan pembuatan aplikasi serta bertanggung jawab penuh terhadap pengelolaan aset barang Politeknik Negeri Lhokseumawe.</p>
                    <div class="row pt-3">
                      <div class="col-lg-5 col-md-12"><img class="img-fluid" src="<?= base_url('') ?>/login/images/user2.jpg" alt="Face 2"/></div>
                      <div class="col-lg-7 col-md-12 pt-3">
                        <div class="h5">SUMARDIANSYAH, SE</div>
                        <p class="text-muted">Pic Operator BMN</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="aa-testimonials-body">
                    <p>Bertugas membantu proses pendataan ulang aset yang dilakukan oleh PIC operator BMN. Mengidentifikasi selisih data aset dengan kondisi di lapangan sehingga tidak terjadi kesalahan penginputan data.</p>
                    <div class="row pt-3">
                      <div class="col-lg-5 col-md-12"><img class="img-fluid" src="<?= base_url('') ?>/login/images/user3.jpg" alt="Face 2"/></div>
                      <div class="col-lg-7 col-md-12 pt-3">
                        <div class="h5">SUMARDIANSYAH, SE</div>
                        <p class="text-muted">Pic Staff BMN</p>
                      </div>
                    </div>
                  </div>
                </div>                
              </div>
            </div>
          </div>
        </div>
        <div class="aa-screenshots section" id="screenshots">
          <div class="container text-center">
            <h2 class="title pb-3">Take a look at our screenshots</h2>
            <p class="pb-5">Add your app screenshots below. Make sure to make them lively by putting them inside real device mockups<br>Replace this text to describe the screenshots of your app.</p>
            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="card page-carousel">
                  <div class="carousel slide" id="aa-carousel-indicators" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li class="active " data-target="#aa-carousel-indicators" data-slide-to="0"></li>
                      <li class="" data-target="#aa-carousel-indicators" data-slide-to="1"></li>
                      <li class="" data-target="#aa-carousel-indicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                      <div class="carousel-item active">
                        <img class="img-fluid" src="<?= base_url('') ?>/login/images/3.jpg" alt="First slide"/>
                        <div class="carousel-caption d-none d-md-block"> </div>
                      </div>
                      <div class="carousel-item">
                        <img class="img-fluid" src="<?= base_url('') ?>/login/images/4.jpg" alt="Second slide"/>
                        <div class="carousel-caption d-none d-md-block"> </div>
                      </div>
                      <div class="carousel-item">
                        <img class="img-fluid" src="<?= base_url('') ?>/login/images/5.jpg" alt="Third slide"/>
                        <div class="carousel-caption d-none d-md-block"> </div>
                      </div>
                    </div>
                    <a class="left carousel-control carousel-control-prev bg-danger" href="#aa-carousel-indicators" role="button" data-slide="prev"><span class="fa fa-angle-left"></span><span class="sr-only">Previous</span></a><a class="right carousel-control carousel-control-next bg-danger" href="#aa-carousel-indicators" role="button" data-slide="next"><span class="fa fa-angle-right"></span><span class="sr-only">Next</span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer-black aa-footer">
      <div class="container py-5">
        <div class="row text-center">
          <div class="col-md-12"><a class="btn btn-link btn-neutral" href="#"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a><a class="btn btn-link btn-neutral" href="#"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a><a class="btn btn-link btn-neutral" href="#"><i class="fa fa-google-plus fa-2x" aria-hidden="true"></i></a><a class="btn btn-link btn-neutral" href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></div>
          <div class="col-md-12">
            <p class="mt-3">Copyright &copy; Awesome App. All rights reserved.<br>Design - <a class="credit" href="https://templateflip.com" target="_blank">TemplateFlip</a></p>
          </div>
        </div>
      </div>
    </footer>
    <script src="<?= base_url('') ?>/login/scripts/jquery.min.js?ver=1.1.0"></script>
    <script src="<?= base_url('') ?>/login/scripts/jquery-ui-1.12.1.custom.min.js?ver=1.1.0"></script>
    <script src="<?= base_url('') ?>/login/scripts/popper.min.js?ver=1.1.0"></script>
    <script src="<?= base_url('') ?>/login/scripts/bootstrap.min.js?ver=1.1.0"></script>
    <script src="<?= base_url('') ?>/login/scripts/paper-kit.js?ver=1.1.0"></script>
    <script src="<?= base_url('') ?>/login/scripts/main.js?ver=1.1.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.3/smooth-scroll.min.js"></script>
    <script src="<?= base_url('') ?>/login/scripts/SmoothScroll.js"></script>
    <script src="<?= base_url('') ?>/login/scripts/jquery.sticky.js"></script>
  </body>
</html>