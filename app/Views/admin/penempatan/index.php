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
					<a href="#">Other Pages</a>
				</li>
				<li class="active">Blank Page</li>
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
					Widgets
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Draggabble Widget Boxes with Persistent Position and State
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="clearfix">
						<a href="<?= site_url('admin/penempatan/new') ?>" class="pull-left btn btn-xs btn-primary"><i class="fa fa-plus fa-lg"></i> &nbsp;Penempatan Baru</a>
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
									<th> Tanggal </th>
									<th> ID Penempatan </th>
									<th> Keterangan </th>
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
								<td><?= $value['placement_date'] ?></td>
								<td><?= $value['placement_id'] ?></td>
								<td><?= $value['keterangan'] ?></td>
								<td><?= $value['placement_location'] ?></td>
								<td>
								  <?php
			                          $db = \Config\Database::connect();
			                          $query = $db->table('table-placement-detail')->where(['placement_id' => $value['placement_id']]);
			                          echo $query->countAllResults();
		                          ?>
								</td>
								<td class="text-center">
									<span class="badge badge-primary">
										Pending
									</span>
								</td>
								<td class="text-center">
									<a data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-success" href="<?= site_url('admin/penempatan/detail/'.$value['placement_id']) ?>" title="Detail Data"><i class="ace-icon fa fa-folder-open-o bigger-120"></i></a>
									<a data-toggle="modal" data-target="#delete<?php echo $value['placement_id'] ?>" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-danger" title="Delete Data"><i class="ace-icon fa fa-trash bigger-120"></i></a>
									<a data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-info" title="Print Data"><i class="ace-icon fa fa-print bigger-120"></i></a>
                                </td>
							</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
					<?php foreach ($penempatan as $key => $value): ?>
					<div id="delete<?php echo $value['placement_id'] ?>" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title"><span class="label label-inverse"> # Delete</span> &nbsp; Are you sure you want to delete <u><?= $value['placement_id'] ?></u> from Database?<br><i>Menghapus Data ini akan mengahpus seluruh Kode Barang yang ingin ditempatkan</i></h5>
								</div>
								<div class="modal-body" align="center">
									<a href="<?php echo site_url('admin/penempatan/deletepenempatan/'.$value['placement_id']) ?>" class="btn btn-danger">&nbsp; &nbsp;YES&nbsp; &nbsp;</a>
								</div>
								<div class="modal-footer">
									<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach ?>
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