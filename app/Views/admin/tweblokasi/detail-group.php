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
            <li>
               <a href="<?= site_url('admin/lokasi') ?>">Lokasi</a>
            </li>
            <li class="active">Group</li>
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
         <div class="space-4"></div>
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
                           <p class="announcement-text">Data by Group</p>
                        </div>
                     </div>
                  </div>
                  <a href="<?= site_url('admin/lokasi/group/'.$id) ?>">
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
                           <p class="announcement-text">Data by List</p>
                        </div>
                     </div>
                  </div>
                  <a href="<?= site_url('admin/lokasi/list/'.$id) ?>">
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
         <!-- /.page-header -->
         <div class="row">
            <div class="col-xs-12">
               <!-- PAGE CONTENT BEGINS -->
               <div class="row">
                  <div class="col-xs-12">
                     <div class="widget-box">
                        <div class="widget-header">
                           <h4 class="widget-title">TWEB LOKASI GROUP</h4>
                           <div class="widget-toolbar">
                              <button onclick="window.location.href='<?= site_url('admin/lokasi/barcode/'.$id) ?>'" class="btn btn-white btn-sm"><i class="fa fa-barcode" aria-hidden="true"></i> Label Kecil</button>
                              <button onclick="window.location.href='<?= site_url('admin/lokasi/qrcode/'.$id) ?>'" class="btn btn-white btn-sm"><i class="fa fa-qrcode" aria-hidden="true"></i> Label Besar</button>
                              <div class="btn-group">
                                 <button class="btn btn-sm btn-primary" title="Cetak List Barang">
                                 Detail
                                 </button>
                                 <button data-toggle="dropdown" class="btn btn-sm btn-primary dropdown-toggle" aria-expanded="false">
                                 <span class="ace-icon fa fa-caret-down icon-only"></span>
                                 </button>
                                 <ul class="dropdown-menu dropdown-info dropdown-menu-right">
                                    <li>
                                       <a target="_blank" href="<?= site_url('admin/lokasi/cetak_group/'.$id) ?>"><i class="fa fa-check-square"></i>&nbsp;&nbsp;Group Barang</a>
                                    </li>
                                    <li>
                                       <a target="_blank" href="<?= site_url('admin/lokasi/cetak_list/'.$id) ?>"><i class="fa fa-check-square"></i>&nbsp;&nbsp;List Barang</a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="widget-body">
                           <div class="widget-main">
                              <p><b> Data List : </b><br/>	</p>
                              <table class="table table-bordered table-striped" style="width:50%">
                                 <thead>
                                    <tr>
                                       <th width="25%">List</th>
                                       <th>Keterangan</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>Kode Ruangan</td>
                                       <td><code><?= $lokasi['id_lokasi'] ?></code></td>
                                    </tr>
                                    <tr>
                                       <td>Nama Ruangan</td>
                                       <td><code><?= $lokasi['nama_lokasi'] ?></code></td>
                                    </tr>
                                    <tr>
                                       <td>Luas Ruangan</td>
                                       <td><code><?= $lokasi['luas_lokasi'] ?> M<sup>2</sup></code></td>
                                    </tr>
                                 </tbody>
                              </table>
                              <form action="<?= site_url('admin/lokasi/printgroup/'.$lokasi['id_lokasi']) ?>" method="post" target="_blank">
                              <div class="clearfix">
											<button type="submit" class="btn btn-sm btn-success pull-right"><i class="fa fa-qrcode"></i> Cetak Label</button>
										</div>
										<div class="space-6"></div>
                              <table id="dynamic-table" class="table table-striped table-bordered dataTable no-footer">
                                 <thead>
                                    <tr>
                                       <th class="center"> # </th>
                                       <th> Kode Barang </th>
                                       <th> Nama Barang </th>
                                       <th> Qty Barang </th>
                                       <th class="center"> Pilih </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach ($group as $key => $value): ?>
                                    <tr>
                                       <td class="center">
                                          <?= $key + 1 ?>
                                       </td>
                                       <td><?= $value->kode_barang ?></td>
                                       <td>
                                          <?php
                                             $db = \Config\Database::connect();
                                             $nama_barang = $db->table('inventaris_peralatan')->where(['kode_barang' => $value->kode_barang])->get()->getRow();
                                             echo $nama_barang->nama_barang;
                                             ?>
                                       </td>
                                       <td class="center"><?= $value->total_barang ?></td>
                                       <td class="center">
                                          <label class="pos-rel">
                                          	<input class="ace" name="cbKode[]" id="cbKode" value="<?= $value->kode_barang ?>" type="checkbox">
                                          	<span class="lbl"></span>
                                          </label>
                                       </td>
                                    </tr>
                                    <?php endforeach ?>
                                 </tbody>
                              </table>
                           </form>
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
<!-- page specific plugin scripts --><script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
   jQuery(function($) {
   	//initiate dataTables plugin
   	var myTable = $('#dynamic-table')
   	//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
   	.DataTable( {
   		bAutoWidth: false,
   		"aoColumns": [
   		  { "bSortable": false },
   		  null, null, null,
   		  { "bSortable": false }
   		],
   		"aaSorting": [],
   		drawCallback: function () {
   			$('[rel="tooltip"]').tooltip({trigger: "hover"});
   		},
   		select: {
   			style: 'multi'
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