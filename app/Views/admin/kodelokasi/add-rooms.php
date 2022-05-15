<?= $this->extend('admin/layout') ?>

<?= $this->section('head') ?>
<style>
	 body{
  overflow: scroll;
  }
</style>
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
					Location
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Detail Data Ruangan
					</small>
				</h1>
			</div><!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<div class="row">
	                <div id="user-profile-1" class="user-profile row">
	                  <div class="col-xs-12 col-sm-6">
	                    <div class="profile-user-info profile-user-info-striped">
	                      <div class="profile-info-row">
	                        <div class="profile-info-name"> ID </div>
	                        <div class="profile-info-value">
	                          <span class="editable editable-click" id="username"><?= $floors['floors_id'] ?></span>
	                        </div>
	                      </div>
	                      <div class="profile-info-row">
	                        <div class="profile-info-name"> Buildings </div>
	                        <div class="profile-info-value">
	                          <span class="editable editable-click" id="age"><?= $floors['buildings_name'] ?></span>
	                        </div>
	                      </div>
	                       <div class="profile-info-row">
	                        <div class="profile-info-name"> Floors </div>
	                        <div class="profile-info-value">
	                          <span class="editable editable-click" id="name"><?= $floors['floors_name'] ?></span>
	                        </div>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
					<!-- PAGE CONTENT BEGINS -->
					<div class="space-4"></div>
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
						<span class="text-left">Results for "Rooms Table"</span>
		                <span style="float: right !important;">
		                 <button onClick="alert('It will activated soon.')" type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#tambahgedung">
		                <i class="fa fa-sm fa-plus"></i> &nbsp;Add Multiple Rooms
		                </button>&nbsp;
		                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#tambahruangan">
		                <i class="fa fa-sm fa-plus"></i> &nbsp;Add Rooms
		                </button>&nbsp;
		            	</span>
					</div>
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="center"> # </th>
									<th> Rooms Code </th>
									<th> Rooms Name </th>
									<th> Rooms Area </th>
									<th>
										<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
										Action
									</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($rooms as $key => $value): ?>
								<tr>
									<td class="center">#<?= $key + 1 ?></td>
									<td><?= $value['rooms_id'] ?></td>
									<td><?= $value['rooms_name'] ?></td>
									<td><?= $value['rooms_area'] ?> m<sup>2</sup></td>
									<td class="center">
										<div class="hidden-sm hidden-xs btn-group">
											<a data-toggle="modal" data-target="#editruangan<?php echo $value['rooms_id'] ?>" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-info" title="Edit"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
											<a data-toggle="modal" data-target="#deleteruangan<?php echo $value['rooms_id'] ?>" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-danger" title="Delete"><i class="ace-icon fa fa-power-off bigger-120"></i></a>
										</div>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
					<!-- Modal Tambah -->
          <div class="modal" id="tambahruangan" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-primary" style="padding: 1rem;">
                  <h4 class="modal-title"><i class="fa fa-cog text-default"></i> Entry Data Ruangan</h4>
                </div>
                <div class="modal-body">
                  <form action="<?= site_url('admin/location-rooms/create') ?>" class="form-horizontal" method="POST">
                    <div class="form-group">
                      <label class="col-md-3 control-label">Kode Ruangan</label>
                      <div class="col-md-2">
                        <input type="text" name="floors_id" value="<?= $floors['floors_id'] ?>" readonly="" maxlength="3" class="form-control">
                      </div>
                      <div class="col-md-5">
                        <input type="text" name="rooms_id" required placeholder=" Kode Ruangan" maxlength="3" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label">Nama Ruangan</label>
                      <div class="col-md-7">
                        <input type="text" name="rooms_name" maxlength="50" required placeholder=" Nama Ruangan" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label">Luas Ruangan</label>
                      <div class="col-md-5">
                        <input type="text" name="rooms_area" maxlength="50" required placeholder=" Luas Ruangan" class="form-control">
                      </div>
                      <div class="col-md-2">
                        <input type="text" name="" readonly class="form-control" value="m2" style="text-align: center;">
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <!-- END MODAL TAMBAH -->

           <!-- Modal Edit -->
	          <?php foreach ($rooms as $key => $value) : ?>
          <div class="modal" id="editruangan<?php echo $value['rooms_id'] ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-primary" style="padding: 1rem;">
                  <h4 class="modal-title"><i class="fa fa-cog text-default"></i> Edit Data Gedung</h4>
                </div>
                <div class="modal-body">
                  <form action="<?= site_url('admin/location-rooms/update') ?>" class="form-horizontal" method="POST">
                    <div class="form-group">
                      <label class="col-md-3 control-label">Kode Ruangan</label>
                      <div class="col-md-7">
                        <input type="text" name="rooms_id" required placeholder=" Masukan Kode Gedung" readonly value="<?= $value['rooms_id'] ?>" maxlength="2" pattern="[0-9]{2}" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label">Nama Ruangan</label>
                      <div class="col-md-7">
                        <input value="<?= $value['rooms_name'] ?>" type="text" name="rooms_name" maxlength="50" required placeholder=" Nama Ruangan" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label">Luas Ruangan</label>
                      <div class="col-md-7">
                        <input value="<?= $value['rooms_area'] ?>" type="text" name="rooms_area" maxlength="50" required placeholder=" Luas Area" class="form-control">
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <!-- End Modal Edit -->

          <!-- Modal Delete -->
          <?php foreach ($rooms as $key => $value) : ?>
          <div id="deleteruangan<?php echo $value['rooms_id'] ?>" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header bg-danger" style="padding: 1rem;">
							<h5 class="modal-title"><span class="label label-inverse"> # Delete</span> &nbsp; Are you sure you want to delete <u><?= $value['rooms_name'] ?></u> from Database?<span style="font-size: 14px; font-style: italic;"> Use at your own risk </span></h5>
						</div>
						<div class="modal-body" align="center">
							<a href="<?= site_url('admin/location-rooms/delete/'.$value['rooms_id']) ?>" class="btn btn-danger">&nbsp; &nbsp;YES&nbsp; &nbsp;</a>
						</div>
						<div class="modal-footer">
							<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
						</div>
					</div>
				</div>
			</div>
			 <?php endforeach; ?>
          <!-- End Modal Delete -->
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