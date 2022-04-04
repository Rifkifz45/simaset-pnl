<?= $this->extend('admin/layout') ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/jquery-ui.custom.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/chosen.min.css" />
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

				<li>
					<a href="#">Transaction</a>
				</li>
				<li class="active">Add Mutasi</li>
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
					Entry
					<small>
						Data Mutasi
					</small>
				</h1>
			</div><!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="row">
						<div class="col-xs-12 col-sm-12">
							<div class="widget-box widget-color-dark ui-sortable-handle" id="widget-box-7">
								<div class="widget-header widget-header-small">
									<h6 class="widget-title smaller">Form Master Edit Data</h6>
								</div>
								<div class="widget-body">
									<div class="widget-main">
										<form class="form-horizontal" action="<?= site_url('admin/mutasi/create') ?>" method="POST" enctype="multipart/form-data">
											<fieldset>
												<div class="space-12"></div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-5">ID Mutasi</label>

													<div class="col-sm-6">
														<div class="clearfix">
															<input name="mutations_id" class="col-xs-12" type="text" id="form-field-5" placeholder="ID Mutasi">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-5">Nama Mutasi</label>

													<div class="col-sm-6">
														<div class="clearfix">
															<input name="mutations_name" class="col-xs-12" type="text" id="form-field-5" placeholder="Nama Mutasi">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-5">Deskripsi</label>

													<div class="col-sm-6">
														<div class="clearfix">
															<textarea name="mutations_description" class="col-xs-12" id="form-field-5" placeholder="Deskripsi"></textarea>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-5">Tanggal Mutasi</label>

													<div class="col-sm-6">
														<div class="clearfix">
															<input name="mutations_date" type="datetime-local" step="1" name="tgl_mutasi" id="tgl_mutasi" class="col-xs-12">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-6">Locations</label>
													<div class="col-sm-6">
														<div class="input-group">
														<input name="mutations_locations" type="text" class="col-xs-12" required="" placeholder="Locations">
														<span class="input-group-btn">
															<button class="btn btn-sm btn-info" type="button" data-toggle="modal" data-target="#loadaset" title="Delete">
																<i class="fa fa-search-plus"></i>
															</button>
														</span>
													</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-5">Upload Dokumen</label>

													<div class="col-sm-6">
														<div class="clearfix">
															<input name="mutations_document" type="file" id="id-input-file-2" aria-describedby="mutations_document-help"/>
														</div>
														<small class="mutations_document-help">Dokumen Boleh dikosongkan terlebih dahulu</small>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>

													<div class="col-sm-9">
														<button type="submit" class="btn btn-sm btn-primary">
															Submit
														<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
														<button type="reset" class="btn btn-sm btn-default">
															Reset
														<i class="ace-icon fa fa-undo icon-on-right"></i>
														</button>
													</div>
												</div>
											</fieldset>
										</form>
										<div class="space-12"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('') ?>/template/assets/js/bootstrap-tag.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript">
	jQuery(function($) {
		$('#id-input-file-1 , #id-input-file-2').ace_file_input({
			no_file:'No File ...',
			btn_choose:'Choose',
			btn_change:'Change',
			droppable:false,
			onchange:null,
			// thumbnail:true //| true | large
			//whitelist:'gif|png|jpg|jpeg'
			//blacklist:'exe|php'
			//onchange:''
			//
		});
		//pre-show a file name, for example a previously selected file
		//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
				
	});
</script>
<?= $this->endSection('') ?>

<?= $this->section('script') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.4/umd/popper.min.js"></script>

<script type="text/javascript">

	jQuery(function($) {
		$("#bootbox-confirm").on(ace.click_event, function() {
			bootbox.confirm({
		    title: "Destroy planet?",
		    message: "Do you want to activate the Deathstar now? This cannot be undone.",
		    buttons: {
		        cancel: {
		            label: '<i class="fa fa-times"></i> Cancel'
		        },
		        confirm: {
		            label: '<i class="fa fa-check"></i> Confirm'
		        }
		    },
		    callback: function (result) {
		        console.log('This was logged in the callback: ' + result);
			    }
			});
		});	
	});
</script>
<?= $this->endSection('') ?>