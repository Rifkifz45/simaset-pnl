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
					<a href="#">Transaction</a>
				</li>
				<li class="active">Mutasi</li>
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
					History
					<small>
						Mutasi Aset
					</small>
				</h1>
			</div><!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="clearfix">
						<a href="<?= site_url('admin/mutasi/new') ?>" class="pull-left btn btn-xs btn-primary"><i class="fa fa-plus"></i> &nbsp;Add Mutasi</a>
						<div class="pull-right tableTools-container"></div>
					</div>
					<div class="table-header">
						<?= $countall ?> Results for "Peralatan dan Mesin"
					</div>
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="center"> # </th>
									<th> ID System </th>
									<th> Nama Mutasi </th>
									<th> Tanggal Mutasi </th>
									<th> Dokument </th>
									<th> Status </th>
									<th>
										<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
										Action
									</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($mutasi as $key => $value): ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td>MUT-0000<?= $value['mutations_id'] ?></td>
								<td><?= $value['mutations_name'] ?></td>
								<td><?= $value['mutations_date'] ?></td>
								<td><?= $value['mutations_document'] ?></td>
								<td><span class="badge bg-success-gradient"><?= $value['mutations_status'] ?></span></td>
								<td class="text-center">
                                    <a type="button" class="ace-icon btn-success btn-sm" href="<?= site_url('admin/mutasi/detail/'.$value['mutations_id']) ?>" title="Detail Data"><i class="fa fa-info-circle fa-sm"></i></a>
                                    <a type="button" class="ace-icon btn-danger btn-sm" title="Delete"><i class="fa fa-times fa-sm"></i></a>
                                </td>
							</tr>
							<?php endforeach ?>
							</tbody>
						</table>
					</div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

<?= $this->endSection('') ?>

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
			  null, null, null, null, null,
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