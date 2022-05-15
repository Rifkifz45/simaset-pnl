<?= $this->extend('admin/layout') ?>
<?= $this->section('head') ?>
<style>
  .card-box {
  position: relative;
  color: #fff;
  padding: 20px 10px 40px;
  margin: 0px 0px;
  }
  .card-box:hover {
  text-decoration: none;
  color: #f1f1f1;
  }
  .card-box:hover .icon i {
  font-size: 100px;
  transition: 1s;
  -webkit-transition: 1s;
  }
  .card-box .inner {
  padding: 5px 10px 0 10px;
  }
  .card-box h3 {
  font-size: 27px;
  font-weight: bold;
  margin: 0 0 8px 0;
  white-space: nowrap;
  padding: 0;
  text-align: left;
  }
  .card-box p {
  font-size: 15px;
  }
  .card-box .icon {
  position: absolute;
  top: auto;
  bottom: 5px;
  right: 5px;
  z-index: 0;
  font-size: 72px;
  color: rgba(0, 0, 0, 0.15);
  }
  .card-box .card-box-footer {
  position: absolute;
  left: 0px;
  bottom: 0px;
  text-align: center;
  padding: 3px 0;
  color: rgba(255, 255, 255, 0.8);
  background: rgba(0, 0, 0, 0.1);
  width: 100%;
  text-decoration: none;
  }
  .card-box:hover .card-box-footer {
  background: rgba(0, 0, 0, 0.3);
  }
  .bg-blue {
  background-color: #00c0ef !important;
  }
  .bg-green {
  background-color: #00a65a !important;
  }
  .bg-orange {
  background-color: #f39c12 !important;
  }
  .bg-red {
  background-color: #d9534f !important;
  }

  #maps{
    height: 500px;
  }
</style>
<script src="<?= base_url('') ?>/leaflet/leaflet.js"></script>
<link rel="stylesheet" href="<?= base_url('') ?>/leaflet/leaflet.css">
<?= $this->endSection('') ?>
<?= $this->section('content') ?>
<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="#">Home</a>
        </li>
        <li class="active">Dashboard</li>
      </ul>
      <!-- /.breadcrumb -->
      <div class="nav-search" id="nav-search">
        <form class="form-search">
          <span class="input-icon">
          <input
            type="text"
            placeholder="Search ..."
            class="nav-search-input"
            id="nav-search-input"
            autocomplete="off"
            />
          <i class="ace-icon fa fa-search nav-search-icon"></i>
          </span>
        </form>
      </div>
      <!-- /.nav-search -->
    </div>
    <div class="page-content">
      <?= $this->include('admin/configurejs') ?>
      <div class="page-header">
        <h1>Dashboard <small> Overview / Stats </small></h1>
      </div>
      <!-- /.page-header -->
      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->
          <div class="alert alert-block alert-success" style="margin-bottom:15px">
            <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
            </button>
            <i class="ace-icon fa fa-check green"></i>
            <strong>Welcome to SIMASET PNL Version 1.0</strong>
            <small>
            . Aplikasi Sistem Informasi Geografis Manajemen Aset Tetap pada
            Politeknik Negeri Lhokseumawe</small
              >
          </div>
          <div class="row">
            <div class="col-lg-3 col-sm-6">
              <div class="card-box bg-blue">
                <div class="inner">
                  <h3> 13436 </h3>
                  <p> Student Strength </p>
                </div>
                <div class="icon">
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                </div>
                <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card-box bg-green">
                <div class="inner">
                  <h3> ₹185358 </h3>
                  <p> Today’s Collection </p>
                </div>
                <div class="icon">
                  <i class="fa fa-money" aria-hidden="true"></i>
                </div>
                <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card-box bg-orange">
                <div class="inner">
                  <h3> 5464 </h3>
                  <p> New Admissions </p>
                </div>
                <div class="icon">
                  <i class="fa fa-user-plus" aria-hidden="true"></i>
                </div>
                <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card-box bg-red">
                <div class="inner">
                  <h3> 723 </h3>
                  <p> Faculty Strength </p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="hr hr24 hr-dotted"></div>
            <div class="col-sm-12">
              <div class="widget-box">
                <div class="widget-header widget-header-flat widget-header-small">
                  <h5 class="widget-title">
                    <i class="ace-icon fa fa-signal"></i>
                    Grafik Jumlah Barang
                  </h5>
                </div>
                <div class="widget-body" >
                  <div class="widget-main">
                    <canvas id="myChart" height="100px"></canvas>
                  </div>
                  <!-- /.widget-main -->
                </div>
                <!-- /.widget-body -->
              </div>
              <!-- /.widget-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
          </div>

          <div class="row">
            <div class="hr hr24 hr-dotted"></div>
            <div class="col-sm-12">
              <div class="widget-box">
                <div class="widget-header widget-header-flat widget-header-small">
                  <h5 class="widget-title">
                    <i class="ace-icon fa fa-signal"></i>
                    Peta Politeknik Negeri Lhokseumawe
                  </h5>
                </div>
                <div class="widget-body" >
                  <div class="widget-main">
                    <div id="maps"></div>
                  </div>
                  <!-- /.widget-main -->
                </div>
                <!-- /.widget-body -->
              </div>
              <!-- /.widget-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
          </div>


          <!-- /.row -->
          <!-- PAGE CONTENT ENDS -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.page-content -->
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const labels = [
    'Tanah',
    'Peralatan dan Mesin',
    'Gedung dan Bangunan',
    'Jalan, Irigasi dan Jaringan',
    'Aset Tetap Lainnya',
    'Konstruksi dalam Pengerjaan',
    'Aset Tak Berwujud',
  ];
  
  const data = {
    labels: labels,
    datasets: [{
      label: 'Grafik Master Aset',
      backgroundColor: 'rgb(30,144,255)',
      borderColor: 'rgb(30,144,255)',
      data: [0, 10, 5, 2, 20, 30, 45, 78],
    }]
  };
  
  const config = {
    type: 'bar',
    data: data,
    options: {}
  };
  
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

<script>
  var map = L.map('maps').setView({lat:5.1203, lon:97.1575}, 18);

  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
         attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
     }).addTo(map);

  var marker = L.marker([5.1203, 97.1575]).addTo(map)
    .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();
</script>
<?= $this->endSection() ?>