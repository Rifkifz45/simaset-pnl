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
					<a href="#">Import</a>
				</li>
				<li class="active">Import Data #2 Mesin</li>
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
					Import Master Aset
					<small>
					Peralatan &amp; Mesin
					</small>
				</h1>
			</div>
			<!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="row">
						<div class="col-sm-5">
							<div class="widget-box widget-color-blue" id="widget-box-7">
								<div class="widget-header widget-header-small">
									<h6 class="widget-title smaller">Import Data Master #2 Mesin</h6>
								</div>
								<div class="widget-body">
									<div class="widget-main">
										<form action="<?= site_url('admin/peralatan-mesin/proses-import') ?>" method="POST" enctype="multipart/form-data">
											<fieldset>
												<div class="form-group">
													<div class="col-xs-12">
														<input multiple="" name="multi_excel[]" type="file" id="id-input-file-3" />
													</div>
												</div>
												<p class="text-center">Or Choose ...</p>
												<div class="form-group">
													<div class="col-xs-12">
														<input type="file" name="file_excel" id="id-input-file-2" accept=".xlsx,.xls" />
													</div>
												</div>
												<div class="form-group">
													<div class="col-xs-12 col-sm-12">
														<select class="form-control" id="form-field-select-1">
															<option value=""> Choose Option ..</option>
															<option value="AL">Kendaraan / Mobil</option>
															<option value="AK">Alaska</option>
														</select>
													</div>
												</div>
											</fieldset>
											<div class="form-actions center">
												<button type="submit" class="btn btn-xs btn-success" style="width:100%">
												Submit
												<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-7">
			              <div class="widget-box transparent widget-color-blue" id="widget-box-7" style="height: 380px;max-height:380px;overflow:auto;">
			                <div class="widget-body">
			                  <div class="widget-main no-padding">
			                    <div class="alert" style="background-color: #fff6d5;">
									<strong class="blue"><sup>* </sup>Prefered File Type : Excel </strong> (Maximum of 10,000 data in once import)<br>
									<small>Accepted file types: .xls .xlsx</small><br><br>
									<strong class="blue"><sup>* </sup>Jika data dalam satu file excel lebih dari 10,000 data. Jumlah data yang overload, bisa diupload secara terpisah</strong><br>
									<strong class="blue"><sup>* </sup>File Excel yang diupload harus dalam sized yang wajar</strong><br><br>
									<strong class="blue">Have a questions about Import #2 Peralatan &amp; Mesin? Check out our </strong><strong class="green"><a href="#" style="color: green;">Docs SIMASET PNL</a></strong><br>
									<strong class="blue">See Template for "Peralatan &amp; Mesin" <i class="fa fa-arrow-right"></i> </strong><strong class="green"><a href="#" style="color: green;">Here</a></strong><br>
								</div>
								<div class="alert alert-default">
									<strong>Dengan menyetujui Syarat dan Ketentuan Penggunaan ini, Berarti Anda menyetujui ketentuan penggunaan tambahan pada Aplikasi dan perubahannya yang merupakan bagian yang tidak terpisahkan dari Syarat dan Ketentuan Penggunaan tools ini.</strong>
								</div>
			                  </div>
			                  <!-- /.widget-main -->
			                </div>
			                <!-- /.widget-body -->
			              </div>
			              <!-- /.widget-box -->
			            </div>
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
			thumbnail:false //| true | large
			//whitelist:'gif|png|jpg|jpeg'
			//blacklist:'exe|php'
			//onchange:''
			//
		});
		//pre-show a file name, for example a previously selected file
		//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
	
	
		$('#id-input-file-3').ace_file_input({
			style: 'well',
			btn_choose: 'Drop files here or click to choose',
			btn_change: null,
			no_icon: 'ace-icon fa fa-cloud-upload',
			droppable: true,
			thumbnail: 'small'//large | fit
			//,icon_remove:null//set null, to hide remove/reset button
			/**,before_change:function(files, dropped) {
				//Check an example below
				//or examples/file-upload.html
				return true;
			}*/
			/**,before_remove : function() {
				return true;
			}*/
			,
			preview_error : function(filename, error_code) {
				//name of the file that failed
				//error_code values
				//1 = 'FILE_LOAD_FAILED',
				//2 = 'IMAGE_LOAD_FAILED',
				//3 = 'THUMBNAIL_FAILED'
				//alert(error_code);
			}
	
		}).on('change', function(){
			//console.log($(this).data('ace_input_files'));
			//console.log($(this).data('ace_input_method'));
		});
				
	});
</script>
<?= $this->endSection('') ?>