<?= $this->extend('admin/layout') ?>
<?= $this->section('head') ?>
<?= $this->include('admin/tweblokasi/style.css') ?>
<?= $this->endSection() ?>
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
			<div class="page-header">
				<h1>
				Data Store
				<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Detail Barang pada Ruangan
				</small>
				</h1>
			</div>
			<div class="row">
				<div id="user-profile-1" class="user-profile row">
					<div class="col-xs-12 col-sm-6">
						<div class="profile-user-info profile-user-info-striped">
							<div class="profile-info-row">
								<div class="profile-info-name"> ID </div>
								<div class="profile-info-value">
									<span class="editable editable-click" id="username">TEST</span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name"> Name </div>
								<div class="profile-info-value">
									<span class="editable editable-click" id="age">Golongan TEST</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="space-8"></div>
			<div class="btn-toolbar">
				<div class="pull-left btn-group">
					<a href="<?= site_url('admin/lokasi/group/'.$id) ?>" class="btn btn-sm btn-success" style="margin: 0 5px 0 0"><i class="ace-icon glyphicon glyphicon-list"></i> Group Barang</a>
					<button class="btn btn-sm btn-white" style="margin: 0 5px 0 0"><i class="fa fa-barcode" aria-hidden="true"></i> Label Kecil</button>
					<button class="btn btn-sm btn-white" style="margin: 0 5px 0 0"><i class="fa fa-qrcode" aria-hidden="true"></i> Label Besar</button>
				</div>
				<div class="pull-right btn-group">
					<button class="btn btn-white" title="Cetak List Barang">
					<i class="ace-icon glyphicon glyphicon-print"></i>
					</button>
					<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" aria-expanded="false">
					<span class="ace-icon fa fa-caret-down icon-only"></span>
					</button>
					<ul class="dropdown-menu dropdown-info dropdown-menu-right">
						<li>
							<a href="#"><i class="fa fa-check-square"></i>&nbsp;&nbsp;Group Barang</a>
						</li>
						<li>
							<a href="#"><i class="fa fa-check-square"></i>&nbsp;&nbsp;List Barang</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="space-4"></div>
			<!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="table-header">
						<span class="text-left">Data Available in field "Lokasi"</span>
					</div>
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="center"> # </th>
									<th> Kode Barang </th>
									<th> NUP </th>
									<th> Nama Barang </th>
									<th> Merk / Type </th>
									<th>
										<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
										Action
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="center">
										#
									</td>
									<td></td>
									<td></td>
									<td><i>NULL</i></td>
									<td class="center"><i class="fa fa-picture-o" aria-hidden="true"></i></td>
									<td class="center">
										<div class="btn-group">
											<a data-toggle="tooltip" data-placement="top" rel="tooltip" title="Detail" class="btn btn-xs btn-success">
												<i class="ace-icon glyphicon glyphicon-folder-open"></i>
											</a>
											<a data-toggle="modal" data-target="" data-toggle="tooltip" data-placement="top" rel="tooltip" title="Edit" class="btn btn-xs btn-info">
												<i class="ace-icon glyphicon glyphicon-edit"></i>
											</a>
										</div>
									</td>
								</tr>
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
			  null, null, null, null,
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