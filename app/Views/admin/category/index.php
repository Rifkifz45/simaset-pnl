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
				<li class="active">Master Assets</li>
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
			<?= $this->include('admin/configurejs'); ?>
			<div class="page-header">
				<h1>
					Management
					<small>
					Data Master Asset
					</small>
				</h1>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="clearfix">
						<div class="pull-right tableTools-container"></div>
					</div>
					<div class="table-header">
						Results for "Categories Table"
					</div>
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="center"> # </th>
									<th class="detail-col"><strong class="bigger-110"></strong></th>
									<th> Category Code </th>
									<th> Category Name </th>
									<th class="hidden-480">
										Count Fields
									</th>
									<th>
										<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
										Status
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								 $site=array('tanah','peralatan-mesin','gedung-bangunan','irigasi','aset-lainnya','konstruksi', 'tak-berwujud');
								foreach ($category as $key => $value): ?>
								<tr>
									<td class="center">
										#<?= $key+1 ?>
									</td>
									<td class="center">
										<li class="dropdown" style="list-style: none">
											<a data-toggle="dropdown" class="dropdown-toggle" href="#" style="color:green;" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='green'">
												<strong class="bigger-110"><i class="ace-icon fa fa-angle-double-down"></i></strong>
											</a>

											<ul class="dropdown-menu dropdown-info">
												<li>
													<a data-toggle="" onclick="alert('Tools in Maintenance. Please check periodically')" href="#"><i class="ace-icon fa fa-plus"></i>&emsp;&emsp;Add Data</a>
												</li>

												<li>
													<a data-toggle="" href="<?= site_url('admin/' . $site[$key]) ?>"><i class="ace-icon fa fa-info-circle"></i>&emsp;&emsp;See Details</a>
												</li>

												<li>
													<a data-toggle="" onclick="alert('Tools in Maintenance. Please check periodically')" href="#"><i class="ace-icon fa fa-power-off"></i>&emsp;&emsp;Deactived</a>
												</li>
											</ul>
										</li>
									</td>
									<td> <?= $value['category_id'] ?> </td>
									<td> <?= $value['category_name'] ?> </td>
									<td class="hidden-480">
										<?= $count[$key] ?>
									</td>
									<td class="center">
										<div class="hidden-sm hidden-xs btn-group">
											<a href="<?= site_url('admin/'.$site[$key]) ?>" class="btn btn-sm btn-info">
												<i class="ace-icon fa fa-search-plus bigger-120"></i> Details
											</a>
										</div>
									</td>
								</tr>
									<?php endforeach ?>
							</tbody>
						</table>
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

<script type="text/javascript">
	jQuery(function($) {
		//initiate dataTables plugin
		var myTable = $('#dynamic-table')
		//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
		.DataTable( {
			bAutoWidth: false,
			"aoColumns": [
			  { "bSortable": false },
			  null, null,null, null,
			  { "bSortable": false }
			],
			"aaSorting": [],
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