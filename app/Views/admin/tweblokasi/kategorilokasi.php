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
				<li class="active">Location</li>
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
					Data Lokasi
					</small>
				</h1>
			</div>

			<div class="row">  
          <div class="col-md-4">
              <div class="panel panel-success ">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-6">
                              <i class="ace-icon glyphicon glyphicon-home fa-4x"></i>
                          </div>
                          <div class="col-xs-6 text-right">
                              <p class="announcement-heading" style="font-weight: bold; font-size: 24px; margin-bottom: 0px;">65</p>
                              <p class="announcement-text">Total Gedung</p>
                          </div>
                      </div>
                  </div>
                  <a href="#">
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
          <div class="col-md-4">
              <div class="panel panel-success ">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-6">
                              <i class="ace-icon glyphicon glyphicon-bookmark fa-4x"></i>
                          </div>
                          <div class="col-xs-6 text-right">
                              <p class="announcement-heading" style="font-weight: bold; font-size: 24px; margin-bottom: 0px;">65</p>
                              <p class="announcement-text">Total Kategori Lokasi</p>
                          </div>
                      </div>
                  </div>
                  <a href="#">
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
          <div class="col-md-4">
              <div class="panel panel-success">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-6">
                              <i class="ace-icon glyphicon glyphicon-map-marker fa-4x"></i>
                          </div>
                          <div class="col-xs-6 text-right">
                              <p class="announcement-heading" style="font-weight: bold; font-size: 24px; margin-bottom: 0px;">65</p>
                              <p class="announcement-text">Total Lokasi</p>
                          </div>
                      </div>
                  </div>
                  <a href="<?= site_url('admin/lokasi') ?>">
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
					<div class="clearfix">
						<div class="pull-right" style="margin-left: 15px;">
							<a class="btn btn-sm btn-primary" href="<?= site_url('admin/lokasi/add') ?>">
							<i class="ace-icon fa fa-plus-circle"></i> Add New
							</a>
						</div>
						<div class="pull-right tableTools-container"></div>
					</div>
					<div class="space-4"></div>
					<div class="table-header">
						<span class="text-left">Results for "Buildings Table"</span>
					</div>
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="center"> # </th>
									<th> Kode Lokasi </th>
									<th> Nama </th>
									<th> Letak </th>
									<th> Kategori </th>
									<th> Penanggung Jawab </th>
									<th> Qty Barang </th>
									<th> Foto </th>
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
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td class="center">
										<div class="hidden-sm hidden-xs btn-group">
											<a data-toggle="tooltip" data-placement="top" rel="tooltip" title="Detail" href="<?= site_url('admin/location-buildings/') ?>" class="btn btn-xs btn-success">
											<i class="ace-icon fa fa-folder-open-o bigger-120"></i>
											</a>
											<a data-toggle="modal" data-target="#editgedung" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-info" title="Edit"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
											<a data-toggle="modal" data-target="#deletegedung" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-danger" title="Delete"><i class="ace-icon fa fa-power-off bigger-120"></i></a>
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
			  null, null, null, null, null, null, null,
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