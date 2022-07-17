<?= $this->extend('approver/layout') ?>
<?= $this->section('content') ?>
<div class="main-content">
   <div class="main-content-inner">
      <div class="breadcrumbs ace-save-state" id="breadcrumbs">
         <ul class="breadcrumb">
            <li>
               <i class="ace-icon fa fa-home home-icon"></i>
               <a href="#">Home</a>
            </li>
            <li class="active">Penempatan</li>
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
         <!-- /.page-header -->
         <?php if (!empty(session()->getFlashdata('pesan'))) : ?>
               <div class="row">
                  <div class="col-xs-12"> 
                     <div class="alert alert-block alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                           <i class="ace-icon fa fa-times"></i>
                        </button>
                        <p>
                           <strong>
                              <i class="ace-icon fa fa-check"></i>
                              Well done!
                           </strong>
                           <?= session()->getFlashdata('pesan') ?>
                        </p>
                     </div>
                  </div>
               </div>
               <?php endif; ?>
         <div class="row">
            <div class="col-xs-12">
               <!-- PAGE CONTENT BEGINS -->
               <div class="row">
                  <div class="col-xs-12">
                     <div class="widget-box">
                        <div class="widget-header">
                           <h4 class="widget-title">TRANSAKSI PENEMPATAN</h4>
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
											<th> Tanggal </th>
											<th> ID Penempatan </th>
											<th> Jenis Penempatan </th>
											<th> Gedung dan Ruangan </th>
											<th> Qty </th>
											<th> Status </th>
											<th>
												<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
												Action
											</th>
										</tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach ($penempatan as $key => $value): ?>
                                       <tr>
         										<td><?= $key + 1 ?></td>
         										<td><?= $value['tgl_penempatan'] ?></td>
         										<td><?= $value['idtransaksi_penempatan'] ?></td>
         										<td><?= $value['jenis_penempatan'] ?></td>
         										<td>
         										 <?= $value['nama_gedung'] . " Lantai " . $value['lantai'] . " - " . $value['nama_lokasi'] ?>
         										</td>
         										<td>
         										  <?php
                                         $db = \Config\Database::connect();
         			                          $query = $db->table('transaksi_penempatan_item')->where(['idtransaksi_penempatan' => $value['idtransaksi_penempatan']]);
         			                          echo $query->countAllResults();
         		                          ?>
         										</td>
                                       <td>
                                       <?php 
                                       if ($value['status_penempatan'] == "Pending"){
                                          $warna = 'btn-yellow';
                                       } else if ($value['status_penempatan'] == "Accepted"){
                                          $warna = 'btn-success';
                                       } else if ($value['status_penempatan'] == "Rejected"){
                                          $warna = 'btn-danger';
                                       } else if ($value['status_penempatan'] == "Closed"){
                                          $warna = 'btn-info';
                                       }
                                       ?>

                                       <?php if ($value['status_penempatan'] == "Pending"): ?>
                                          <div class="btn-group">
                                             <button type="button" class="btn btn-minier <?= $warna ?>"><?= $value['status_penempatan'] ?></button>
                                             <button type="button" class="btn btn-minier <?= $warna ?> dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                               <span class="caret"></span>
                                               <span class="sr-only">Toggle Dropdown</span>
                                             </button>
                                             <ul class="dropdown-menu" role="menu">
                                               <li><a href="<?= site_url('approver/penempatan/accepted/'.$value['idtransaksi_penempatan']) ?>">Accepted</a></li>
                                               <li><a href="<?= site_url('approver/penempatan/rejected/'.$value['idtransaksi_penempatan']) ?>" onclick="return confirm('Yakin ingin menghapus dokumen yang dipilih?')">Rejected</a></li>
                                             </ul>
                                           </div>
                                       <?php endif ?>

                                       <?php if ($value['status_penempatan'] == "Accepted"): ?>
                                          <div class="btn-group">
                                             <button type="button" class="btn btn-minier <?= $warna ?>"><?= $value['status_penempatan'] ?></button>
                                             <button type="button" class="btn btn-minier <?= $warna ?> dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                               <span class="caret"></span>
                                               <span class="sr-only">Toggle Dropdown</span>
                                             </button>
                                             <ul class="dropdown-menu" role="menu">
                                               <li><a href="<?= site_url('approver/penempatan/pending/'.$value['idtransaksi_penempatan']) ?>">Pending</a></li>
                                               <li><a href="<?= site_url('approver/penempatan/rejected/'.$value['idtransaksi_penempatan']) ?>" onclick="return confirm('Data yang telah dihapus, tidak dapat dikembalikan')">Rejected</a></li>
                                               <li><a href="<?= site_url('approver/penempatan/closed/'.$value['idtransaksi_penempatan']) ?>" onclick="return confirm('Yakin ingin menutup proses dokumen?')">Closed</a></li>
                                             </ul>
                                           </div>
                                       <?php endif ?>

                                       <?php if ($value['status_penempatan'] == "Rejected"): ?>
                                          <div class="btn-group">
                                             <button type="button" class="btn btn-minier <?= $warna ?>"><?= $value['status_penempatan'] ?></button>
                                             <button type="button" class="btn btn-minier <?= $warna ?> dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                               <span class="caret"></span>
                                               <span class="sr-only">Toggle Dropdown</span>
                                             </button>
                                           </div>
                                       <?php endif ?>

                                       <?php if ($value['status_penempatan'] == "Closed"): ?>
                                          <div class="btn-group">
                                             <button type="button" class="btn btn-minier <?= $warna ?>"><?= $value['status_penempatan'] ?></button>
                                             <button type="button" class="btn btn-minier <?= $warna ?> dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                               <span class="caret"></span>
                                               <span class="sr-only">Toggle Dropdown</span>
                                             </button>
                                           </div>
                                       <?php endif ?>
                                       </td>
         										<td>
         											<center>
         												<button formtarget="_blank" class='btn btn-minier btn-primary' title='Cetak Data' onclick="window.location.href='<?= site_url('approver/penempatan/cetak/'.$value['idtransaksi_penempatan']) ?>'">
         													<i class="fa fa-print"></i> Cetak
         												</button>
         												<button formtarget="_blank" class='btn btn-minier btn-danger' title='Cetak Data' onclick="location.href='<?= site_url('approver/penempatan/viewpdf/'.$value['idtransaksi_penempatan']) ?>';">
         													<i class="fa fa-file-pdf-o"></i> Open BA
         												</button>
         											</center>
         										</td>
         									</tr>
                                       <?php endforeach ?>
                                    </tbody>
                                 </table>
                                 <br/>
                                 <p><b>Remark / Catatan : </b><br/>  </p>
                                 <table class="table table-bordered table-striped">
                                    <thead>
                                       <tr>
                                          <th width="20%">Status Transaksi</th>
                                          <th>Keterangan</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td><span class="label label-warning">Pending</span></td>
                                          <td><code>Dokumen masih dapat diedit dan membutuhkan persetujuan untuk ditempatkan</code></td>
                                       </tr>
                                       <tr>
                                          <td><span class="label label-success">Accepted</span></td>
                                          <td><code>Dokumen sudah disetujui namun status penempatan masih bisa diubah</code></td>
                                       </tr>
                                       <tr>
                                          <td><span class="label label-danger">Rejected</span></td>
                                          <td><code>Dokumen ditolak, semua penempatan akan dihapus dan semua proses tidak tersedia lagi.</code></td>
                                       </tr>
                                       <tr>
                                          <td><span class="label label-info">Closed</span></td>
                                          <td><code>Dokumen yang sudah selesai, tidak dapat di edit atau dihapus</code></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.span -->
               </div>
               <?= $this->include('approver/transaksipenempatan/modal-pb-review') ?>
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
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.flash.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.html5.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.print.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/dataTables.select.min.js"></script>
<script src=""></script>
<script type="text/javascript">
   jQuery(function($) {
   	// the selector will match all input controls of type :checkbox
   // and attach a click event handler 
   $("input:checkbox").on('click', function() {
     // in the handler, 'this' refers to the box clicked on
     var $box = $(this);
     if ($box.is(":checked")) {
       // the name of the box is retrieved using the .attr() method
       // as it is assumed and expected to be immutable
       var group = "input:checkbox[name='" + $box.attr("name") + "']";
       // the checked state of the group/box on the other hand will change
       // and the current value is retrieved using .prop() method
       $(group).prop("checked", false);
       $box.prop("checked", true);
     } else {
       $box.prop("checked", false);
     }
   });
   
   	//initiate dataTables plugin
   	var myTable = $('#dynamic-table')
   	.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
   	.DataTable( {
   		bAutoWidth: false,
   		"aoColumns": [
   		  { "bSortable": false },
   		  null, null, null, null, null, null,
   		  { "bSortable": false }
   		],
   		"aaSorting": [],
   		// "bProcessing": true,
   		// "bServerSide": true,
   		//"processing": true, //Feature control the processing indicator.
              //"serverSide": true, //Feature control DataTables' server-side processing mode.
   
              // Load data for the table's content from an Ajax source
   		//,
   		"bPaginate": true,
   
         //"sScrollX": "100%",
         "sScrollXInner": "100%",
         "bScrollCollapse": true,
   		//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
   		//you may want to wrap the table inside a "div.dataTables_borderWrap" element
   		
   				
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