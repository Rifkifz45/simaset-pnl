<?= $this->extend('landing/layout') ?>
<?= $this->section('head') ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<link rel="stylesheet" href="<?= base_url('') ?>/magnific/dist/magnific-popup.css">
<link rel="stylesheet" href="<?= base_url('') ?>/cluster/dist/MarkerCluster.css" />
<link rel="stylesheet" href="<?= base_url('') ?>/cluster/dist/MarkerCluster.Default.css" />
<script src="<?= base_url('') ?>/cluster/dist/leaflet.markercluster-src.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>/leaflet-search/src/leaflet-search.css" />
<style>
   .leaflet-container {
   font-size: 12px;
   }
   .custom .leaflet-popup-tip,
   .custom .leaflet-popup-content-wrapper {
   background:rgb(255, 255, 255, 0.90);
   color: white;
   padding: 0 0 0 0; /*Deleted top and bottom white sides!*/
   }
   .center {
   display: block;
   margin-left: auto;
   margin-right: auto;
   width: 30%;
   }

   /* padding-bottom and top for image */
.mfp-no-margins img.mfp-img {
  padding: 0;
}
/* position of shadow behind the image */
.mfp-no-margins .mfp-figure:after {
  top: 0;
  bottom: 0;
}
/* padding for main container */
.mfp-no-margins .mfp-container {
  padding: 0;
}



.mfp-with-zoom .mfp-container,
.mfp-with-zoom.mfp-bg {
  opacity: 0;
  -webkit-backface-visibility: hidden;
  -webkit-transition: all 0.3s ease-out; 
  -moz-transition: all 0.3s ease-out; 
  -o-transition: all 0.3s ease-out; 
  transition: all 0.3s ease-out;
}

.mfp-with-zoom.mfp-ready .mfp-container {
    opacity: 1;
}
.mfp-with-zoom.mfp-ready.mfp-bg {
    opacity: 0.8;
}

.mfp-with-zoom.mfp-removing .mfp-container, 
.mfp-with-zoom.mfp-removing.mfp-bg {
  opacity: 0;
}

.highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}
</style>
<?= $this->endSection('') ?>
<?= $this->section('content') ?>
<div id="map" style="width: 100%; height: 500px;"></div>
<div class="row content">
   <div class="col-md-12">
      <style>
         .info-lembaga{
         padding-left:20px;
         border-left:3px solid #eee;
         }
         .desc-lembaga{
         padding:20px;
         padding-right:30px;
         }
      </style>
      <h4 class="title">About Gudang Perlengkapan</h4>
      <p>Gudang perlengkapan dan penyimpanan merupakan gudang yang memberikan pelayanan dibidang pengadaan yaitu peralatan, sarana dan prasarana, dimana setiap aset yang ada akan dilakukan pengecekan secara berkala.</p>
   </div>
</div>
<?php foreach ($gedung as $key => $value): ?>
<div class="modal fade" id="featureModal<?= $value['id_gedung'] ?>" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title text-primary" id="feature-title"><?= $value['nama_gedung'] ?></h4>
         </div>
         <div class="modal-body">
            <div class="table-responsive">
            <table id="feature-table" class="table table-striped table-bordered" data-toggle="table" data-query-params="queryParams"data-pagination="true">
              <tr>
               <th style="font-size: 14px; font-style: normal ;">NAMA GEDUNG</th>
               <td><?= $value['nama_gedung'] ?></td>
            </tr>
            <tr>
               <th style="font-size: 14px; font-style: normal ;">KETERANGAN</th>
               <td><?= $value['keterangan'] ?></td>
            </tr>
            <tr>
               <th style="font-size: 14px; font-style: normal ;">LONGITUDE</th>
               <td><?= $value['longitude'] ?></td>
            </tr>
            <tr>
               <th>LATITUDE</th>
               <td><?= $value['latitude'] ?></td>
            </tr>
            <tr>
               <th>TOTAL LOKASI</th>
               <td>
                  <?php
                     $db = \Config\Database::connect();
                     $lokasi = $db->table('tweb_lokasi')->where('id_gedung', $value['id_gedung']);
                     echo $lokasi->countAllResults();
                     ?>
               </td>
            </tr>
            <tr>
               <th>FOTO</th>
               <td>
                <a class="image-popup-no-margins" href="<?= base_url('uploads/gedung/'.$value['foto_gedung']) ?>">
                <img src="<?= base_url('uploads/gedung/'.$value['foto_gedung']) ?>" width="107">
              </a>
               </td>
            </tr>
            </table>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-primary" data-dismiss="modal" onClick="loadingDone()">Close</button>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->
</div>
<?php endforeach ?>
<?= $this->endSection('') ?>
<?= $this->section('script') ?>
<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
<script src="<?= base_url('') ?>/magnific/dist/jquery.magnific-popup.js"></script>
<script src="<?= base_url() ?>/leaflet-search/src/leaflet-search.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
 $(document).ready(function() {
  $('.image-popup-no-margins').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });
});
</script>
<script>

   //sample data values for populate map
   var data = [
      <?php foreach ($gedung as $key => $value): ?>
         {
            "loc":[<?= $value['latitude'] ?>,<?= $value['longitude'] ?>], 
            "title":"<?= $value['nama_gedung'] ?>",
            "id_ged":"<?= $value['id_gedung'] ?>"
         },
      <?php endforeach ?>
   ];

   var map = new L.Map('map', {zoom: 16, center: new L.latLng(data[0].loc) }); //set center from first location

   map.addLayer(new L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
}));   //base layer

   var markersLayer = new L.LayerGroup(); //layer contain searched elements
   map.addLayer(markersLayer);

   var controlSearch = new L.Control.Search({   
      layer: markersLayer,
      initial: false,
      marker: false,
   });

   map.addControl( new L.Control.Search({
      position:'topright', 
      layer: markersLayer,
      initial: false,
      collapsed: true,
      zoom: 21,
   }) );

   ////////////populate map with markers from sample data
   for (var i=0; i < data.length; i++) {
      var title = data[i].title;
      var loc = data[i].loc;
      var id = data[i].id_ged;
      var marker = new L.Marker(new L.latLng(loc), {title:title});
      marker.myID = id;
      marker.on('click', function(e) {
         var i = e.target.myID;
         $('#featureModal'+i).modal('show').on('shown.bs.modal', function(e) {

         });
      });
      markersLayer.addLayer(marker);
   }

</script>
<?= $this->endSection('') ?>