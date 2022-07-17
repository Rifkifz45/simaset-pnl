<?= $this->extend('admin/layout') ?>

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
			<div class="page-header">
				<h1>
					SimAset
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Statistik
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">  
          <div class="col-md-6">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-6">
                              <i class="ace-icon glyphicon glyphicon-home fa-4x"></i>
                          </div>
                          <div class="col-xs-6 text-right">
                              <p class="announcement-heading" style="font-weight: bold; font-size: 24px; margin-bottom: 0px;"></p>
                              <p class="announcement-text">Total Gedung</p>
                          </div>
                      </div>
                  </div>
                  <a href="<?= site_url('admin/gedung') ?>">
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
              <div class="panel panel-success">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-6">
                              <i class="ace-icon glyphicon glyphicon-map-marker fa-4x"></i>
                          </div>
                          <div class="col-xs-6 text-right">
                              <p class="announcement-heading" style="font-weight: bold; font-size: 24px; margin-bottom: 0px;"></p>
                              <p class="announcement-text">Total Lokasi</p>
                          </div>
                      </div>
                  </div>
                  <a href="<?= site_url('admin/lokasi') ?>">
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
						<div class="col-sm-6">
							<div class="widget-box">
								<div class="widget-header widget-header-flat widget-header-small">
									<h5 class="widget-title">
										<i class="ace-icon fa fa-signal"></i>
										Aset Berdasarkan Kondisi
									</h5>
								</div>

								<div class="widget-body">
									<div class="widget-main">
									<div style="text-align: center;" id="piechart" style="width: 400px; height: 400px;"></div>
									</div><!-- /.widget-main -->
								</div><!-- /.widget-body -->
							</div><!-- /.widget-box -->
						</div>
						<div class="col-sm-6">
							<div class="widget-box">
								<div class="widget-header widget-header-flat widget-header-small">
									<h5 class="widget-title">
										<i class="ace-icon fa fa-signal"></i>
										Aset Berdasarkan Kategori
									</h5>
								</div>

								<div class="widget-body">
									<div class="widget-main">
									<div style="text-align: center;" id="piechart_3d" style="width: 400px; height: 400px;"></div>
									</div><!-- /.widget-main -->
								</div><!-- /.widget-body -->
							</div><!-- /.widget-box -->
						</div>
					</div>
					<div class="space-4"></div>
					<div class="row">
						<div class="col-sm-12">
							<div class="widget-box">
								<div class="widget-header widget-header-flat widget-header-small">
									<h5 class="widget-title">
										<i class="ace-icon fa fa-signal"></i>
										Aset Berdasarkan Lokasi
									</h5>
								</div>

								<div class="widget-body">
									<div class="widget-main">
									<div id="top_x_div" style="width: 900px; height: 500px;"></div>
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
	 google.charts.load('current', {'packages':['corechart']});
     google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = new google.visualization.DataTable();
	      data.addColumn('string', 'Pizza');
	      data.addColumn('number', 'Populartiy');
	      data.addRows([
	        ['B (<?= $baik ?>)', <?= $baik ?>],
	        ['RR (<?= $r_ringan ?>)', <?= $r_ringan ?>],
	        ['RB (<?= $r_berat ?>)', <?= $r_berat ?>],
	      ]);

        var options = {
        	legend: { 
	         position: 'top',         // <--- top position
	         alignment: 'center', 
	         maxLines: 5             // <--- increase of max lines
	      },
	      is3D:true,
        	slices: {
	            0: { color: 'green' },
	            1: { color: 'orange' },
	            2: { color: 'red' },
	          },
	         chartArea: {
	         	height: "100%",
		        width: "100%",
		        top: "15%"           // <-- top space (you can use fix values as well. (e.x. 50))
		      },
		  };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>

 <script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data2 = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      <?php foreach ($kategori as $key => $value): ?>
		<?php
		$site=array('inventaris_tanah','inventaris_peralatan','inventaris_gedung','inventaris_jalan','inventaris_asset','inventaris_konstruksi', 'inventaris_takberwujud');
	    $db = \Config\Database::connect();
	    $query = $db->table($site[$key]);
	    $data = $query->countAllResults();
	  	?>
  	  ['<?= $value['uraian'] ?>', <?= $data ?>],
  	  <?php endforeach ?>
    ]);

    var options2 = {
    	legend: { 
	         position: 'top',         // <--- top position
	         alignment: 'center', 
	         maxLines: 5             // <--- increase of max lines
	      },
      is3D: true,
      chartArea: {
     	height: "100%",
        width: "100%",
        top: "15%"           // <-- top space (you can use fix values as well. (e.x. 50))
      },
    };

    var chart2 = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart2.draw(data2, options2);
  }
</script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Asset based on location', 'Percentage'],
          <?php foreach ($gedung as $key => $value): ?>
          	["<?= $value['nama_gedung'] ?>", <?= rand(10,1000) ?>],
          <?php endforeach ?>
        ]);

        var options = {
          title: 'Chess opening moves',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Asset Statistic',
                   subtitle: 'Data aset berdasarkan gedung' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Percentage'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>


<?= $this->endSection() ?>