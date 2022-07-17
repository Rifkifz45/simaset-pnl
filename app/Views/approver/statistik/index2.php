<?= $this->extend('approver/layout') ?>

<?= $this->section('head') ?>
<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans);
*{
    font-family: Open Sans;
}

.textbaru{
    border-bottom: 2px solid black;
}

.heading {
    background-color: white;
    color: black;
    display: inline-block;
    font-weight: bold;
    padding: 7px 30px 7px 15px;
    font-size: 20px;
    text-transform: uppercase;
}
#kategori {
    height: 400px;
}

.highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
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
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li class="active">Statistik</li>
			</ul><!-- /.breadcrumb -->

			<div class="nav-search" id="nav-search">
				<form class="form-search">
					<span class="input-icon">
						<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
						<i class="ace-icon fa fa-search nav-search-icon"></i>
					</span>
				</form>
			</div><!-- /.nav-search -->
		</div>

		<div class="page-content">
		<?= $this->include('admin/configurejs') ?>
        <div class="space-6"></div>

		<div class="row">  
          <div class="col-md-6">
              <div class="panel panel-success">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-6">
                              <i class="ace-icon glyphicon glyphicon-bookmark fa-4x"></i>
                          </div>
                          <div class="col-xs-6 text-right">
                              <p class="announcement-heading" style="font-weight: bold; font-size: 24px; margin-bottom: 0px;">V1</p>
                              <p class="announcement-text">Statistik by Chart</p>
                          </div>
                      </div>
                  </div>
                  <a href="<?= site_url('approver/statistik-chart') ?>">
                      <div class="panel-footer announcement-bottom">
                          <div class="row">
                              <div class="col-xs-6">View</div>
                              <div class="col-xs-6 text-right">
                                  <i class="fa fa-arrow-circle-right"></i>
                              </div>
                          </div>
                      </div>
                  </a>
              </div>
          </div> 
          <div class="col-md-6">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-6">
                              <i class="ace-icon glyphicon glyphicon-bookmark fa-4x"></i>
                          </div>
                          <div class="col-xs-6 text-right">
                              <p class="announcement-heading" style="font-weight: bold; font-size: 24px; margin-bottom: 0px;">V2</p>
                              <p class="announcement-text">Statistik by Group</p>
                          </div>
                      </div>
                  </div>
                  <a href="<?= site_url('approver/statistik-group') ?>">
                      <div class="panel-footer announcement-bottom">
                          <div class="row">
                              <div class="col-xs-6">View</div>
                              <div class="col-xs-6 text-right">
                                  <i class="fa fa-arrow-circle-right"></i>
                              </div>
                          </div>
                      </div>
                  </a>
              </div>
          </div> 
     </div>

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="row">
						<div class="col-sm-12">
							<div class="widget-box">
								<div class="widget-header">
									<h5 class="widget-title">
										<i class="ace-icon fa fa-signal"></i>
										Aset Berdasarkan Kategori
									</h5>
                                    <div class="widget-toolbar">
                                      <a href="#" data-action="fullscreen" class="orange2">
                                         <i class="ace-icon fa fa-expand"></i>
                                      </a>

                                      <a href="#" data-action="reload">
                                         <i class="ace-icon fa fa-refresh"></i>
                                      </a>

                                      <a href="#" data-action="collapse">
                                         <i class="ace-icon fa fa-chevron-up"></i>
                                      </a>

                                      <a href="#" data-action="close">
                                         <i class="ace-icon fa fa-times"></i>
                                      </a>
                                   </div>
								</div>

								<div class="widget-body">
									<div class="widget-main">
									<figure class="highcharts-figure">
								    <div id="kategori"></div>
								</figure>
									</div><!-- /.widget-main -->
								</div><!-- /.widget-body -->
							</div><!-- /.widget-box -->
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="widget-box">
								<div class="widget-header">
									<h5 class="widget-title">
										<i class="ace-icon fa fa-signal"></i>
										Aset Berdasarkan Kondisi
									</h5>
                                    <div class="widget-toolbar">
                                      <a href="#" data-action="fullscreen" class="orange2">
                                         <i class="ace-icon fa fa-expand"></i>
                                      </a>

                                      <a href="#" data-action="reload">
                                         <i class="ace-icon fa fa-refresh"></i>
                                      </a>

                                      <a href="#" data-action="collapse">
                                         <i class="ace-icon fa fa-chevron-up"></i>
                                      </a>

                                      <a href="#" data-action="close">
                                         <i class="ace-icon fa fa-times"></i>
                                      </a>
                                   </div>
								</div>

								<div class="widget-body">
									<div class="widget-main">
									<figure class="highcharts-figure">
								        <div id="kondisi"></div>
								    </figure>
									</div><!-- /.widget-main -->
								</div><!-- /.widget-body -->
							</div><!-- /.widget-box -->
						</div>
					</div>
					<div class="space-4"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="widget-box">
								<div class="widget-header">
									<h5 class="widget-title">
										<i class="ace-icon fa fa-signal"></i>
										Aset Berdasarkan Lokasi
									</h5>
                                    <div class="widget-toolbar">
                                      <a href="#" data-action="fullscreen" class="orange2">
                                         <i class="ace-icon fa fa-expand"></i>
                                      </a>

                                      <a href="#" data-action="reload">
                                         <i class="ace-icon fa fa-refresh"></i>
                                      </a>

                                      <a href="#" data-action="collapse">
                                         <i class="ace-icon fa fa-chevron-up"></i>
                                      </a>

                                      <a href="#" data-action="close">
                                         <i class="ace-icon fa fa-times"></i>
                                      </a>
                                   </div>
								</div>

								<div class="widget-body">
									<div class="widget-main">
									<figure class="highcharts-figure">
								        <div id="gedung"></div>
								    </figure>
									</div><!-- /.widget-main -->
								</div><!-- /.widget-body -->
							</div><!-- /.widget-box -->
						</div>
					</div>

					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script><script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
	<?php
	$site=array('inventaris_tanah','inventaris_peralatan','inventaris_gedung','inventaris_jalan','inventaris_asset','inventaris_konstruksi', 'inventaris_takberwujud');
	?>
	Highcharts.chart('gedung', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Statistik data per gedung'
    },
    subtitle: {
        text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Jumlah Barang: <b>{point.y:.1f}</b>'
    },
    series: [{
        name: 'Population',
        data: [
        <?php foreach ($gedung as $key => $value): ?>
            ['<?= $value['nama_gedung'] ?>', 
             <?php
              $db = \Config\Database::connect();
              $query = $db->table('transaksi_penempatan_item')
              ->join('transaksi_penempatan','transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'left')
              ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi', 'left')
              ->join('tweb_gedung','tweb_gedung.id_gedung = tweb_lokasi.id_gedung', 'left')
              ->where('status_penempatan_item', "1")
              ->where('tweb_gedung.id_gedung', $value['id_gedung']);
              echo $query->countAllResults();
            ?>
            ],
        <?php endforeach ?>
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif',
                textOutline: false 
            }
        }
    }]
});

	Highcharts.chart('kategori', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Statistik Data per Kategori'
    },
    subtitle: {
        text: 'Source: <a href="<?= site_url() ?>">SIMASETPNL</a>'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif',
            }
        }
    },
    yAxis: {
        min: 0,
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Jumlah Data: <b>{point.y:f}</b>'
    },
    series: [{
        name: 'Population',
        data: [
        <?php foreach ($kategori as $key => $value): ?>
            ['<?= $value['uraian'] ?>', 
            <?php
              $db = \Config\Database::connect();
              $query = $db->table($site[$key]);
              echo $query->countAllResults();
            ?>
            ],
          <?php endforeach ?>
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif',
                textOutline: false 
            }
        }
    }]
});

Highcharts.chart('kondisi', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Statistik Data per Kondisi'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Baik',
            y: <?= $baik ?>,
            sliced: true,
            selected: true
        }, {
            name: 'Rusak Ringan',
            y: <?= $r_ringan ?>
        }, {
            name: 'Rusak Berat',
            y: <?= $r_berat ?>
        }]
    }]
});
</script>
<?= $this->endSection() ?>