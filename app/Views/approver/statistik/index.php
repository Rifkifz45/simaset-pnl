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
      <div class="space-6"></div>
         
         <!-- /.page-header -->
         <div class="row">
            <div class="col-md-6">
               <div class="panel panel-default">
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
               <div class="panel panel-success">
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
                  <div class="col-xs-12">
                     <div class="widget-box">
                        <div class="widget-header">
                           <h4 class="widget-title">STATS BY GROUP</h4>
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
                              <div>
                                 <table id="dynamic-table" class="table table-striped table-bordered dataTable no-footer">
                                 <thead>
                                    <tr>
                                       <th class="center"> # </th>
                                       <th> Kode Barang </th>
                                       <th> Nama Bidang </th>
                                       <th> Kategori </th>
                                       <th> Jumlah </th>
                                       <th> Satuan </th>
                                       <th>
                                          <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                          Action
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php foreach ($bidang as $key => $value): ?>
                                 <tr>
                                    <td class="center"><?= $key+1 ?></td>
                                    <td><?= $value['golongan'] . $value['bidang'] ?></td>
                                    <td><?= $value['uraian'] ?></td>
                                    <td>
                                       <?php
                                          if ($value['golongan'] == 2) {
                                             echo "Tanah";
                                          }else if ($value['golongan'] == 3) {
                                             echo "Peralatan dan Mesin";
                                          }else if ($value['golongan'] == 4) {
                                             echo "Gedung dan Bangunan";
                                          }else if ($value['golongan'] == 5) {
                                             echo "Jalan, Irigasi dan Jembatan";
                                          }else if ($value['golongan'] == 6) {
                                             echo "Aset Tetap Lainnya";
                                          }else if ($value['golongan'] == 7) {
                                             echo "Konstruksi Dalam Pengerjaan";
                                          }else if ($value['golongan'] == 8) {
                                             echo "Aset Tak Berwujud";
                                          }else{
                                             echo "None";
                                          }
                                          ?>
                                    </td>
                                    <td>
                                       <?php
                                          $db = \Config\Database::connect();
                                          $kode = $value['idtweb_asset'];
                                          if ($value['golongan'] == 2) {
                                             $inv_tanah = $db->table('inventaris_tanah')->where('idtweb_asset', $kode);
                                             echo $inv_tanah->countAllResults();
                                          } else if ($value['golongan'] == 3) {
                                             $inv_prl = $db->table('inventaris_peralatan')->where('idtweb_asset', $kode);
                                             echo $inv_prl->countAllResults();
                                          } else if ($value['golongan'] == 4) {
                                             $inv_jalan = $db->table('inventaris_gedung')->where('idtweb_asset', $kode);
                                             echo $inv_jalan->countAllResults();
                                          } else if ($value['golongan'] == 5) {
                                             $inv_jalan = $db->table('inventaris_jalan')->where('idtweb_asset', $kode);
                                             echo $inv_jalan->countAllResults();
                                          } else if ($value['golongan'] == 6) {
                                             $inv_jalan = $db->table('inventaris_asset')->where('idtweb_asset', $kode);
                                             echo $inv_jalan->countAllResults();
                                          } else if ($value['golongan'] == 7) {
                                             $inv_jalan = $db->table('inventaris_konstruksi')->where('idtweb_asset', $kode);
                                             echo $inv_jalan->countAllResults();
                                          } else if ($value['golongan'] == 8) {
                                             $inv_jalan = $db->table('inventaris_takberwujud')->where('idtweb_asset', $kode);
                                             echo $inv_jalan->countAllResults();
                                          } else{
                                             echo "None";
                                          }
                                          ?>
                                    </td>
                                    <td class="center">Buah</td>
                                    <td class="center">
                                       <div class="action-buttons">
                                          <a href="<?= site_url('approver/statistik-group/extend/'.$value['idtweb_asset']) ?>" title="See Detail" class="green" href="#">
                                             <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                          </a>

                                          <a href="<?= site_url('approver/statistik-group/'.$value['idtweb_asset']) ?>" title="See Sub Detail" class="red" href="#">
                                             <i class="ace-icon fa fa-folder-open-o bigger-130"></i>
                                          </a>
                                       </div>
                                    </td>
                                 </tr>
                                 <?php endforeach ?>
                                 </tbody>
                              </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.span -->
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
<!-- page specific plugin scripts -->
<script src="<?= base_url('') ?>/template/assets/css/dist/js/select2.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.flash.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.html5.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.print.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('') ?>/magnific/dist/jquery.magnific-popup.js"></script>
<script type="text/javascript">
   jQuery(function($) {
   	$('.image-link').magnificPopup({
   		type: 'image',
   		mainClass: 'mfp-with-zoom', // this class is for CSS animation below
   
   		zoom: {
   		enabled: true, // By default it's false, so don't forget to enable it
   		duration: 300, // duration of the effect, in milliseconds
   		easing: 'ease-in-out', // CSS transition easing function
   
      // The "opener" function should return the element from which popup will be zoomed in
      // and to which popup will be scaled down
      // By defailt it looks for an image tag:
      opener: function(openerElement) {
        // openerElement is the element on which popup was initialized, in this case its <a> tag
        // you don't need to add "opener" option if this code matches your needs, it's defailt one.
        return openerElement.is('img') ? openerElement : openerElement.find('img');
      }
    }
   
   });
   	
   	$(document).on('shown.bs.modal', function (e) {
          $('[autofocus]', e.target).focus();
        });
   	$('#id-input-file-1 , #id-input-file-2').ace_file_input({
   		no_file:'No File ...',
   		theme: "bootstrap",
   		btn_choose:'Choose',
   		btn_change:'Change',
   		droppable:false,
   		onchange:null,
   		thumbnail:false //| true | large
   		//whitelist:'gif|png|jpg|jpeg'
   		//blacklist:'exe|php'
   		//onchange:''
   		//
   	});
   
   	//initiate dataTables plugin
   	var myTable = $('#dynamic-table')
   	//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
   	.DataTable( {
   		bAutoWidth: false,
   		"aoColumns": [
   		  { "bSortable": false },
   		  null, null, null, null, 
   		  { "bSortable": false },
   		  { "bSortable": false }
   		],
   		"aaSorting": [],
   		drawCallback: function () {
   			$('[rel="tooltip"]').tooltip({trigger: "hover"});
   		}
       });
   	
   	$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
   	
   	new $.fn.dataTable.Buttons(myTable, {
   		buttons: [
   		  {
   			"extend": "colvis",
   			"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
   			"className": "btn btn-white btn-primary btn-bold",
   			columns: ':not(:first):not(:last)'
   		  },
   		  {
   			"extend": "copy",
   			"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
   			"className": "btn btn-white btn-primary btn-bold"
   		  },
   		  {
   			"extend": "csv",
   			"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
   			"className": "btn btn-white btn-primary btn-bold"
   		  },
   		  {
   			"extend": "excel",
   			"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
   			"className": "btn btn-white btn-primary btn-bold"
   		  },
   		  {
   			"extend": "pdf",
   			"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
   			"className": "btn btn-white btn-primary btn-bold"
   		  },
   		  {
   			"extend": "print",
   			"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
   			"className": "btn btn-white btn-primary btn-bold",
   			autoPrint: false,
   			message: 'This print was produced using the Print button for DataTables'
   		  }		  
   		]
   	} );
   	myTable.buttons().container().appendTo( $('.tableTools-container') );
   	
   	//style the message box
   	var defaultCopyAction = myTable.button(1).action();
   	myTable.button(1).action(function (e, dt, button, config) {
   		defaultCopyAction(e, dt, button, config);
   		$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
   	});
   	
   	
   	var defaultColvisAction = myTable.button(0).action();
   	myTable.button(0).action(function (e, dt, button, config) {
   		
   		defaultColvisAction(e, dt, button, config);
   		
   		
   		if($('.dt-button-collection > .dropdown-menu').length == 0) {
   			$('.dt-button-collection')
   			.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
   			.find('a').attr('href', '#').wrap("<li />")
   		}
   		$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
   	});
   
   	////
   
   	setTimeout(function() {
   		$($('.tableTools-container')).find('a.dt-button').each(function() {
   			var div = $(this).find(' > div').first();
   			if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
   			else $(this).tooltip({container: 'body', title: $(this).text()});
   		});
   	}, 500);	
   
   	$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
   		e.stopImmediatePropagation();
   		e.stopPropagation();
   		e.preventDefault();
   	});
   
   
   })
</script>
<?= $this->endSection('') ?>