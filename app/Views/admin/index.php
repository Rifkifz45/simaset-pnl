<?= $this->extend('admin/layout') ?>
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
          <div class="alert alert-block alert-success">
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
            <div class="col-sm-12 infobox-container">
              <div class="space-2"></div>

              <div class="infobox infobox-blue infobox-large" style="width: 270px;">
                <div class="infobox-icon">
                  <i class="ace-icon fa fa-line-chart"></i>
                </div>

                <div class="infobox-data">
                  <div class="infobox-content" style="max-width: 200px">Total Number of Assets</div>
                  <div class="infobox-content bigger-120"><?= number_format(10000) ?></div>
                </div>
              </div>

              <div class="infobox infobox-green infobox-large" style="width: 270px;">
                <div class="infobox-icon">
                  <i class="ace-icon fa fa-check"></i>
                </div>
                <div class="infobox-data">
                  <div class="infobox-content" style="max-width: 200px">Total Asset Distributed</div>
                  <div class="infobox-content bigger-120"><?= number_format(6000) ?></div>
                </div>
              </div>

              <div class="infobox infobox-red infobox-large" style="width: 270px;">
                <div class="infobox-icon">
                  <i class="ace-icon fa fa-times"></i>
                </div>

                <div class="infobox-data">
                  <div class="infobox-content" style="max-width: 200px">Total Asset to Distributed</div>
                  <div class="infobox-content bigger-120"><?= number_format(3844) ?></div>
                </div>
              </div>
              <div class="infobox infobox-pink infobox-large" style="width: 270px;">
                <div class="infobox-icon">
                  <i class="ace-icon fa fa-chain-broken"></i>
                </div>

                <div class="infobox-data">
                  <div class="infobox-content" style="max-width: 200px">Total Assets Undefined</div>
                  <div class="infobox-content bigger-120"><?= number_format(156) ?></div>
                </div>
              </div>
            </div>

            <div class="vspace-12-sm"></div>
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
<script src="<?= base_url('') ?>/template/assets/js/jquery-ui.custom.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.easypiechart.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.sparkline.index.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.flot.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.flot.pie.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.flot.resize.min.js"></script>
<script type="text/javascript">
  jQuery(function($) {
    $('.easy-pie-chart.percentage').each(function(){
      var $box = $(this).closest('.infobox');
      var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
      var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
      var size = parseInt($(this).data('size')) || 50;
      $(this).easyPieChart({
        barColor: barColor,
        trackColor: trackColor,
        scaleColor: false,
        lineCap: 'butt',
        lineWidth: parseInt(size/10),
        animate: ace.vars['old_ie'] ? false : 1000,
        size: size
      });
    });
  
    //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
    //but sometimes it brings up errors with normal resize event handlers
    $.resize.throttleWindow = false;
  
    var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
    var data = [
    { label: "Golongan Tanah",  data: 38.7, color: "#68BC31"},
    { label: "Golongan Peralatan dan Mesin",  data: 12, color: "#2091CF"},
    { label: "Golongan Gedung dan Bangunan",  data: 8.2, color: "#AF4E96"},
    { label: "Golongan Jalan, Irigasi dan Jaringan",  data: 18.6, color: "#DA5430"},
    { label: "Golongan Aset Tetap Lainnya",  data: 5, color: "#FEE074"},
    { label: "Golongan Konstruksi dalam Pengerjaan",  data: 5, color: "#85b2c1"},
    { label: "Golongan Aset Tak Berwujud",  data: 12.5, color: "#99ead6"},
    ]
    function drawPieChart(placeholder, data, position) {
      $.plot(placeholder, data, {
      series: {
        pie: {
          show: true,
          tilt:0.8,
          highlight: {
            opacity: 0.25
          },
          stroke: {
            color: '#fff',
            width: 2
          },
          startAngle: 2
        }
      },
      legend: {
        show: true,
        position: position || "ne",
        labelBoxBorderColor: null,
        margin:[-30,15]
      }
      ,
      grid: {
        hoverable: true,
        clickable: true
      }
     })
   }
   drawPieChart(placeholder, data);
  
   /**
   we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
   so that's not needed actually.
   */
   placeholder.data('chart', data);
   placeholder.data('draw', drawPieChart);
  
  
    //pie chart tooltip example
    var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
    var previousPoint = null;
  
    placeholder.on('plothover', function (event, pos, item) {
    if(item) {
      if (previousPoint != item.seriesIndex) {
        previousPoint = item.seriesIndex;
        var tip = item.series['label'] + " : " + item.series['percent']+'%';
        $tooltip.show().children(0).text(tip);
      }
      $tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
    } else {
      $tooltip.hide();
      previousPoint = null;
    }
  
   });
  
    /////////////////////////////////////
    $(document).one('ajaxloadstart.page', function(e) {
      $tooltip.remove();
    });
  
  
  })
</script>
<?= $this->endSection() ?>