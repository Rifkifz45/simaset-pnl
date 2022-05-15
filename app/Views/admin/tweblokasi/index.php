<?= $this->extend('admin/layout') ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/dist/css/select2.css" />
<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/dist/css/select2-bootstrap.css" />
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
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-6">
                              <i class="ace-icon glyphicon glyphicon-home fa-4x"></i>
                          </div>
                          <div class="col-xs-6 text-right">
                              <p class="announcement-heading" style="font-weight: bold; font-size: 24px; margin-bottom: 0px;"><?= count($gedung) ?></p>
                              <p class="announcement-text">Total Gedung</p>
                          </div>
                      </div>
                  </div>
                  <a href="<?= site_url('admin/gedung') ?>">
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
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-6">
                              <i class="ace-icon glyphicon glyphicon-bookmark fa-4x"></i>
                          </div>
                          <div class="col-xs-6 text-right">
                              <p class="announcement-heading" style="font-weight: bold; font-size: 24px; margin-bottom: 0px;"><?= count($kategori) ?></p>
                              <p class="announcement-text">Total Kategori Lokasi</p>
                          </div>
                      </div>
                  </div>
                  <a href="<?= site_url('admin/lokasi-kategori') ?>">
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
                              <p class="announcement-heading" style="font-weight: bold; font-size: 24px; margin-bottom: 0px;"><?= count($lokasi) ?></p>
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
						<span class="text-left"><?= count($lokasi) ?> Data Available in field "Lokasi"</span>
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
									<th> PJ </th>
									<th> Qty Barang </th>
									<th> Foto </th>
									<th>
										<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
										Action
									</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($detail as $key => $value): ?>
								<tr>
									<td class="center">
										#<?= $key + 1 ?>
									</td>
									<td><?= $value->id_lokasi ?></td>
									<td><?= $value->nama_lokasi ?></td>
									<td>
										<?= $value->nama_gedung . "<br> Lantai " . $value->lantai ?>
									</td>
									<td><?= $value->nama_kategori_lokasi != "" ? $value->nama_kategori_lokasi : "<i>NULL</i>" ?></td>
									<td class="center"><i data-toggle="tooltip" data-placement="left" rel="tooltip" class="fa fa-info-circle fa-lg" title="<?= $value->nama_pengguna ?>"></i></td>
									<td><i>NULL</i></td>
									<td class="center"><i class="fa fa-picture-o" aria-hidden="true"></i></td>
									<td class="center">
										<div class="btn-group">
											<a href="<?= site_url('admin/lokasi/group/'.$value->id_lokasi) ?>" data-toggle="tooltip" data-placement="top" rel="tooltip" title="Detail" class="btn btn-xs btn-success">
                       <i class="ace-icon glyphicon glyphicon-folder-open"></i>
                       </a>
                       <a data-toggle="modal" data-target="#edit<?= $value->id_lokasi ?>" data-toggle="tooltip" data-placement="top" rel="tooltip" title="Edit" class="btn btn-xs btn-info">
                       <i class="ace-icon glyphicon glyphicon-edit"></i>
                       </a>
                       <a data-toggle="modal" data-target="#delete<?= $value->id_lokasi ?>" data-toggle="tooltip" data-placement="top" rel="tooltip" title="Delete" class="btn btn-xs btn-danger">
                       <i class="ace-icon glyphicon glyphicon-trash"></i>
                       </a>
                    </div>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
						<?= $this->include('admin/tweblokasi/modal-delete') ?>
						<?= $this->include('admin/tweblokasi/modal-edit') ?>
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
<script type="text/javascript">
	jQuery(function($) {
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

		let jumlah = <?= count($lokasi) ?>;
		for (let i = 0; i <= jumlah; i++) {
			$("#lantai" + i).select2({
				theme: "bootstrap"
			}
			);
		}

		for (let i = 0; i <= jumlah; i++) {
			$("#id_gedung" + i).select2({
				theme: "bootstrap"
			}
			);
		}

		for (let i = 0; i <= jumlah; i++) {
			$("#id_kategori_lokasi" + i).select2({
				theme: "bootstrap"
			}
			);
		}

		for (let i = 0; i <= jumlah; i++) {
			$("#id_pengguna" + i).select2({
				theme: "bootstrap"
			}
			);
		}

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