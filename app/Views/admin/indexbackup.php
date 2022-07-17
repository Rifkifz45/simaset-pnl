<?= $this->extend('admin/layout') ?>
<?= $this->section('head') ?>
<style>
  #maps{
    height: 600px;
    width: 100%;
  }

/*
 * These CSS rules affect the tooltips within maps with the custom-popup
 * class. See the full CSS for all customizable options:
 * https://github.com/mapbox/mapbox.js/blob/001754177f3985c0e6b4a26e3c869b0c66162c99/theme/style.css#L321-L366
 */

  .custom .leaflet-popup-tip,
  .custom .leaflet-popup-content-wrapper {
    background:rgb(255, 255, 255, 0.90);
    color: white;
    padding: 0 0 0 0; /*Deleted top and bottom white sides!*/

}

.card-text {
    font-size: 11px;
    color: black !important;

}
.card-title {
    color: rgb(9, 65, 139) !important;
}
.container{
    width:450px;
}
.imgar{
     padding: 5px 5px 5px 5px;
}
.imgar:hover{
     background:rgb(9, 65, 139, 0.8);
     padding: 5px 5px 5px 5px;
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
            <div class="col-sm-12" style="width:100%">
              <div class="widget-box">
                <div class="widget-header widget-header-flat widget-header-small">
                  <h5 class="widget-title">
                    <i class="ace-icon fa fa-signal"></i>
                    Peta Politeknik Negeri Lhokseumawe
                  </h5>
                </div>
                <div class="widget-body" >
                  <div class="widget-main">
                    <div class="custom" id="maps"></div>
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
<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
<script>
  var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
  var mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
  var streets = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});

  var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  });
  

  var map = L.map('maps', {
    center: [5.1196371, 97.1566789],
    zoom: 18,
    fullscreenControl: {
        pseudoFullscreen: false
    },
    layers: [osm]
  });

  var baseLayers = {
    'OpenStreetMap': osm,
    'Streets': streets
  };

  var layerControl = L.control.layers(baseLayers).addTo(map);
  var satellite = L.tileLayer(mbUrl, {id: 'mapbox/satellite-v9', tileSize: 512, zoomOffset: -1, attribution: mbAttr});
  layerControl.addBaseLayer(satellite, 'Satellite');

  <?php foreach ($gedung as $key => $value): ?>
    var customPopup = "<div class='card' style='width: 18rem;'><div id='carouselExampleControls' class='carousel slide' data-ride='carousel'><div class='carousel-inner'><div class='carousel-item active'><img class='d-block w-100' src='<?= base_url('uploads/gedung/'.$value['foto_gedung']) ?>' height='150' alt='First slide'></div></div></div><div class='card-body'><h5 class='card-title text-center'> <?= $value['nama_gedung'] ?> </h5><p class='card-text'><?= $value['keterangan'] ?></p>";

    var customOptions = {
      'maxWidth': '400',
      'width': '200',
      'className' : 'custom'
    }
    var marker = L.marker([<?= $value['latitude'] ?>, <?= $value['longitude'] ?>]).addTo(map)
    .bindPopup(customPopup,customOptions);
  <?php endforeach ?>
</script>
<?= $this->endSection() ?>