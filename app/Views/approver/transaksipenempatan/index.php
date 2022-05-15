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
					Penempatan
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Persetujuan Penempatan Aset Baru
					</small>
				</h1>
			</div><!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="clearfix">
						<div class="pull-right tableTools-container"></div>
					</div>
					<div class="space-2"></div>
					<?php if (!empty(session()->getFlashdata('pesan'))) : ?>
		              <div class="alert alert-block alert-success" style="margin-bottom: 0;">
		                <button type="button" class="close" data-dismiss="alert">
		                <i class="ace-icon fa fa-times"></i>
		                </button>
		                <i class="ace-icon fa fa-check green"></i>
		                <?= session()->getFlashdata('pesan') ?>
		              </div>
		              <div class="space-4"></div>
		              <?php endif; ?>
					<div class="table-header">
						Results for "Penempatan Barang"
					</div>
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="center"> # </th>
									<th class="center"> # </th>
									<th> Tanggal </th>
									<th> ID Penempatan </th>
									<th> Gedung dan Ruangan </th>
									<th> Qty Barang </th>
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
								<td class="center">
								 	<div class="btn-group">
								 		<?php
								 		if ($value['status_penempatan'] == "Pending") { ?>
								 			<button data-toggle="modal" data-target="#approve<?php echo $value['idtransaksi_penempatan'] ?>" class="btn btn-xs btn-success btn-round" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" title="Approve">
											<i class="ace-icon fa fa-check bigger-110 white"></i>
										</button>

										<button data-toggle="modal" data-target="#reject<?php echo $value['idtransaksi_penempatan'] ?>" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" title="Reject" class="btn btn-xs btn-danger btn-round">
											<i class="ace-icon fa fa-times bigger-110 white"></i>
										</button>
								 		<?php }elseif($value['status_penempatan'] == "Accepted"){ ?>
								 			<i class="ace-icon fa fa-check fa-lg green" title="Accepted"></i>
								 		<?php }else{ ?>
								 			<i class="ace-icon fa fa-times fa-lg red2" title="Rejected"></i>
								 		<?php } ?>
									</div>
								</td>
								<td><?= $value['tgl_penempatan'] ?></td>
								<td><?= $value['idtransaksi_penempatan'] ?></td>
								<td>
								 <?php
			                          $db = \Config\Database::connect();
			                          $rooms = $db->table('tweb_lokasi')->getWhere(['id_lokasi' => $value['id_lokasi']]);
			                          echo $rooms->getRow()->nama_lokasi;
		                          ?>
								</td>
								<td>
								  <?php
			                          $query = $db->table('transaksi_penempatan_item')->where(['idtransaksi_penempatan' => $value['idtransaksi_penempatan']]);
			                          echo $query->countAllResults();
		                          ?>
								</td>
								<td class="text-center">
									<?php if ($value['status_penempatan'] == "Pending"){ ?>
										<span class="label label-warning"><?= $value['status_penempatan'] ?></span>
									<?php }elseif($value['status_penempatan'] == "Accepted"){ ?>
									<span class="label label-success arrowed-in arrowed-in-right"><?= $value['status_penempatan'] ?></span>
									<?php }else{ ?>
									<span class="label label-danger arrowed"><?= $value['status_penempatan'] ?></span>
									<?php } ?>
								</td>
								<td class="text-center">
									<a data-toggle="modal" data-target="#detail" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-success" title="Detail Data"><i class="ace-icon fa fa-folder-open-o bigger-120"></i></a>
									<a href="<?= site_url('approver/penempatan/cetak/'.$value['idtransaksi_penempatan']) ?>" target="_blank" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-info" title="Cetak Document"><i class="ace-icon fa fa fa-print bigger-120"></i></a>
									<a href="<?= site_url('approver/penempatan/viewpdf/'.$value['idtransaksi_penempatan']) ?>" target="_blank" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-danger" title="View Document"><i class="ace-icon fa fa fa-file-pdf-o bigger-120"></i></a>
                                </td>
							</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>

					<?= $this->include('approver/transaksipenempatan/modal-pb-accepted') ?>
					<?= $this->include('approver/transaksipenempatan/modal-pb-rejected') ?>
					<?= $this->include('approver/transaksipenempatan/modal-pb-item') ?>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
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
			//"sScrollY": "200px",
			//"bPaginate": true,
	
			//"sScrollX": "100%",
			"sScrollXInner": "120%",
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