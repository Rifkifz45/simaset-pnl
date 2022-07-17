<?= $this->extend('admin/layout') ?>
<?= $this->section('head') ?>
<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/bootstrap-datepicker3.min.css" />
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
            <li class="active">Laporan</li>
         </ul>
         <!-- /.breadcrumb -->
         <div class="nav-search" id="nav-search">
            <form class="form-search">
               <span class="input-icon">
               <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
               <i class="ace-icon fa fa-search nav-search-icon"></i>
               </span>
            </form>
         </div>
         <!-- /.nav-search -->
      </div>
      <div class="page-content">
         <?= $this->include('admin/configurejs') ?>
         <!-- /.page-header -->
         <div class="row">
            <div class="col-xs-12">
               <!-- PAGE CONTENT BEGINS -->
               <div class="row">
                  <div class="col-xs-12">
                     <div class="box">
                        <div class="box box-solid box-primary">
                           <div class="box-header">
                              <h3 class="box-title"></h3>
                              <div class="widget-box">
                                 <div class="widget-header">
                                    <h4 class="widget-title">Laporan Data Penempatan Periode</h4>
                                    <div class="widget-toolbar">
                                       <a href="#" data-action="collapse">
                                       <i class="ace-icon fa fa-chevron-up"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="widget-body" style="display: block;">
                                    <div class="widget-main">
                                       <!--form -->			
                                       <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                          <div class="col-xs-3">
                                             <input type="text" placeholder="Dari Tanggal" class="form-control input-sm" id="datepicker" name="dari" value="<?= date('Y-m-d') ?>" autocomplete="off" readonly="true">
                                          </div>
                                          <div class="col-xs-3">
                                             <input type="text" placeholder="Sampai Tanggal" class="form-control input-sm" id="datepicker1" name="sampai" value="<?= date('Y-m-d') ?>" autocomplete="off" readonly="true">
                                          </div>
                                          <input type="submit" name="Submit" id="submit_btn" class="btn btn-xs btn-primary" value="Tampilkan">
                                       </form>
                                       <!--form -->			
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!--export data -->
                           <div class="btn-group pull-left">
                              <button type="button" class="btn btn-xs btn-default">Export</button>
                              <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                 <li><a href="javascript:void(0)" onclick="window.location.href='http://online-demo.esy.es/CI_inventory_barcode/index.php/laporan/laporan_incoming_item_excel/2022-01-01/2022-07-31/';return false;">PDF</a></li>
                              </ul>
                           </div>
                           <!--export data -->	
                        </div>
                         <div><br></div>
                         <div><br></div>
                        <!-- /.box-header -->
                        <?php
                        $db = $db = \Config\Database::connect();
                        if(isset($_POST['dari'])){
                     	  	$id_dari = $_POST['dari'];
                     	  }else{
                     	  	$id_dari = '0000-00-00';
                     	  }

                     	if(isset($_POST['sampai'])){
                     	  	$id_sampai = $_POST['sampai'];
                     	  }else{
                     	  	$id_sampai = '0000-00-00';
                     	  }

                        $penempatan = 
                        $db->table('transaksi_mutasi')
                           ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_mutasi.idtransaksi_penempatan', 'left')
                           ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi')
                           ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung')
        				   ->where('tgl_mutasi BETWEEN "'. date('Y-m-d', strtotime($id_dari)). '" and "'. date('Y-m-d', strtotime($id_sampai)).'"')
        				   ->get()
        				   ->getResultArray();
                        ?>
                        <div class="box-body">
                           <p style="text-align:center; font-size: 15pt; font-weight: bold;"> Laporan Data Penempatan</p>
                           <p style="text-align:center; font-size: 10pt;">Periode <?= date('d-m-Y', strtotime($id_dari)) ?> s/d <?= date('d-m-Y', strtotime($id_sampai)) ?> </p>
                           <table class="table table-condensed table-bordered table-hover">
                              <tbody>
                                 <tr>
                                    <th style="background-color:#DCDCDC;" width="5%">#</th>
                                    <th style="background-color:#DCDCDC;" width="10%">Tanggal</th>
                                    <th style="background-color:#DCDCDC;" width="12%">ID Transaksi</th>
                                    <th style="background-color:#DCDCDC;">Lokasi</th>
                                    <th style="background-color:#DCDCDC;" width="12%">
                                       <center>Qty</center>
                                    </th>
                                    <th style="background-color:#DCDCDC;">
                                       <center>Tools</center>
                                    </th>
                                 </tr>
                                 <?php foreach ($penempatan as $key => $value): ?>
                                 <tr>
                                    <td> <?= $key+1 ?> </td>
                                    <td> <?= date('d-m-Y', strtotime($value['tgl_penempatan'])) ?> </td>
                                    <td><?= $value['idtransaksi_penempatan'] ?></td>
                                    <td><?= $value['nama_gedung'] . " - " . $value['nama_lokasi'] ?></td>
                                    <td style="text-align:center;">
                                    	<?php
                                    	$item = $db->table('transaksi_penempatan_item')
                                    			   ->where('idtransaksi_penempatan', $value['idtransaksi_penempatan']);

                                    	echo $item->countAllResults();
                                    	?>
                                    </td>
                                    <td style="text-align:right;">
                                    	<a href="javascript:void" style="text-decoration:none" target="_blank">Cetak</a>
                                    </td>
                                 </tr>
                                 <?php endforeach ?>
                                 <?php if (count($penempatan) < 1): ?>
                                 	<tr>
                                 		<td colspan="6">Data Tidak ditemukan</td>
                                 	</tr>
                                 <?php endif ?>
                              </tbody>
                           </table>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                     <!-- /.box -->
                  </div>
                  <!-- /.col -->
               </div>
               <!-- PAGE CONTENT ENDS -->
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.page-content -->
   </div>
</div>
<!-- /.main-content -->
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('') ?>/template/assets/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">

//disable button jika tanggal yang dipilih berbeda tahun
	setInterval(function () {
	var a = $("#datepicker").val();
	var b = $("#datepicker1").val();
	var resA = a.substr(0, 4);
	var resB = b.substr(0, 4);
	
	if(resA == resB) {
	 $('#submit_btn').prop('disabled', false); // disable the button	
	} else {
	 $('#submit_btn').prop('disabled', true); // enable it	
	}
	}, 1);

	  //datepicker for end date
    $('#datepicker1').datepicker({
    	autoclose: true,
    	format: "yyyy-mm-dd",
		todayHighlight: true,
		orientation: "bottom auto",
		todayBtn: true,
		todayHighlight: true,
		startDate: new Date() 
		//startDate: '-1d'
	});
	
	$('#datepicker').datepicker({
		autoclose: true,
		format: "yyyy-mm-dd",
		todayHighlight: true,
		orientation: "bottom auto",
		todayBtn: true,
		todayHighlight: true,  
		//startDate: new Date() 
		//startDate: '-1d'
	});
	</script>
<?= $this->endSection('') ?>