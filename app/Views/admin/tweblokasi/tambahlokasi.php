<?= $this->extend('admin/layout') ?>
<?= $this->section('head') ?>
<?= $this->include('admin/tweblokasi/style.css') ?>
<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/dist/css/select2.css" />
<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/dist/css/select2-bootstrap.css" />
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
					<a href="#">Lokasi</a>
				</li>
				<li class="active">Add Lokasi</li>
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
					Untuk menambahkan data lokasi, gedung atau ruangan
					</small>
				</h1>
			</div>
			<!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
							<div class="row justify-content-center">
								<div class="col-md-12">
									<div class="wrapper">
										<div class="row no-gutters">
											<div class="col-lg-4 col-md-5 d-flex align-items-stretch">
												<div class="info-wrap bg-primary w-100 p-md-5 p-4">
													<h3>Terms and Condition</h3>
													<p class="mb-4">We're open for any suggestion or just to have a chat</p>
													<div class="dbox w-100 d-flex align-items-start">
														<div class="icon d-flex align-items-center justify-content-center">
															<span class="fa fa-map-marker"></span>
														</div>
														<div class="text pl-3">
															<p><span>Input 1:</span> Berisikan nama gedung yang harus dipilih. Jika nama gedung tidak tersedia, silahkan klik pada button "New" untuk menambahkan gedung baru. Jika Lokasi yang ingin ditambahkan tidak berada pada suatu gedung mis. SATPAM Pos, Anda bisa menambahkan lokasi secara manual dengan menekan button "Entry Manually". Lihat List Gedung <strong><a href="#">disini</a></strong></p>
														</div>
													</div>
													<div class="dbox w-100 d-flex align-items-center">
														<div class="icon d-flex align-items-center justify-content-center">
															<span class="fa fa-phone"></span>
														</div>
														<div class="text pl-3">
															<p><span>Input 2:</span> Anda bisa memilih pada lantai berapa ruangan / lokasi ingin ditambahkan</p>
														</div>
													</div>
													<div class="dbox w-100 d-flex align-items-center">
														<div class="icon d-flex align-items-center justify-content-center">
															<span class="fa fa-paper-plane"></span>
														</div>
														<div class="text pl-3">
															<p><span>Input 3:</span> Berisikan kode lokasi dari ruangan. Kode ini akan digabungkan dengan kode gedung dan ruangan. Misalkan jika anda memilih Gedung 2, Lantai 1 dan kode lokasi 001. Maka kode rungan yang tersimpan adalah 2.L01.001</p>
														</div>
													</div>
													<div class="dbox w-100 d-flex align-items-center">
														<div class="icon d-flex align-items-center justify-content-center">
															<span class="fa fa-globe"></span>
														</div>
														<div class="text pl-3">
															<p><span>Input 4:</span> Berisikan nama dari ruangan / lokasi yang ingin anda tambahkan. Misalkan Ruang Kelas 1, Ruang Rapat, Ruang TU dan lainnya</p>
														</div>
													</div>
													<div class="dbox w-100 d-flex align-items-center">
														<div class="icon d-flex align-items-center justify-content-center">
															<span class="fa fa-globe"></span>
														</div>
														<div class="text pl-3">
															<p><span>Input 5:</span> Berisikan penanggung jawab dari ruangan. Jika tidak ditemukan, Anda bisa menambahkan pada menu Data Store - Karyawan. Anda bisa melewatkan isian ini dengan membiarkan inputan penanggung jawab kosong.</p>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
												<div class="contact-wrap w-100 p-2">
													<h3 class="mb-1">Add New Location</h3>
													<div id="form-message-success" class="mb-4">
														Please fill out this field correctly!
													</div>
													<form action="<?= site_url('admin/lokasi/create') ?>" method="POST" id="contactForm" name="contactForm">
														<div class="row">
															<div class="col-sm-12 col-xs-12">
																<div class="form-group">
																	<label for="id_gedung">Choose Parent Location:</label>
																	<select id="default-select" class="form-control" name="id_gedung" id="id_gedung">
																		<option value="" selected disabled>Pilih Gedung</option>
																		<?php foreach ($gedung as $key => $value): ?>
																		<option value="<?= $value['id_gedung'] ?>"><?= $value['nama_gedung'] ?></option>
																		<?php endforeach ?>
																	</select>
																	<div class="space-4"></div>
																	<button data-toggle="modal" data-target="#add" type="button" class="btn btn-lg btn-primary">New</button>
																	<button data-toggle="modal" data-target="#add-manually" type="button" class="btn btn-lg btn-success">Entry Manually</button>
																</div>
															</div>
															<div class="col-sm-12 col-xs-12">
																<div class="form-group">
																	<label for="lantai">Lantai:</label>
																	<select id="lantai_select2" class="form-control" name="lantai" id="lantai">
																		<option value="" disabled selected>Pilih Lantai</option>
																		<option value="1">1</option>
																		<option value="2">2</option>
																		<option value="3">3</option>
																		<option value="4">4</option>
																		<option value="5">5</option>
																		<option value="6">6</option>
																	</select>
																</div>
															</div>
															<div class="col-sm-12 col-xs-12">
																<div class="form-group">
																	<label for="id_kategori_lokasi">Kategori:</label>
																	<select id="kategori_select2" class="form-control" name="id_kategori_lokasi" id="id_kategori_lokasi">
																		<option value="" selected disabled>Pilih Kategori</option>
																		<?php foreach ($kategori as $key => $value): ?>
																		<option value="<?= $value['id_kategori_lokasi'] ?>"><?= $value['nama_kategori_lokasi'] ?></option>
																		<?php endforeach ?>
																	</select>
																	<div class="space-4"></div>
																	<button data-toggle="modal" data-target="#add2" type="button" class="btn btn-lg btn-primary">New</button>
																</div>
															</div>
															<div class="col-sm-12 col-xs-12">
																<div class="form-group">
																	<label for="id_lokasi">Kode Lokasi:</label>
																	<input type="text" class="form-control" name="id_lokasi" value="000" id="id_lokasi" placeholder="Kode Lokasi / Ruangan">
																</div>
															</div>
															<div class="col-sm-12 col-xs-12">
																<div class="form-group">
																	<label for="nama_lokasi">Nama Lokasi:</label>
																	<input type="text" class="form-control" name="nama_lokasi" id="nama_lokasi" placeholder="Nama Lokasi / Ruangan" required>
																</div>
															</div>
															<div class="col-sm-12 col-xs-12">
																<div class="form-group">
																	<label for="id_pengguna">Penanggung Jawab:</label>
																	<select id="pj_select2" class="form-control" name="id_pengguna" id="id_pengguna">
																		<option value="" disabled selected>Pilih Penanggung Jawab</option>
																		<?php foreach ($pengguna as $key => $value): ?>
																			<option value="<?= $value['id_pengguna'] ?>"><?= $value['nama_pengguna'] ?></option>
																		<?php endforeach ?>
																	</select>
																	<div id="pj-error" class="help-block">Not Available? Please add in Data Store Pengguna.</div>
																</div>
															</div>
															<div class="col-sm-12 col-xs-12">
																<div class="form-group">
																	<label for="keterangan">Keterangan:</label>
																	<textarea class="form-control" name="keterangan" id="keterangan"></textarea>
																</div>
															</div>
															<div class="col-sm-12 col-xs-12">
																<div class="form-group">
																	<label for="foto">Gambar:</label>
																	<label class="ace-file-input">
																	<input type="file" id="id-input-file-2" name="foto" />
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<input style="padding:12px 16px" type="submit" value="Save Changes" class="btn btn-primary">
																	<div class="submitting"></div>
																</div>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<?= $this->include('admin/tweblokasi/modal-add-gedung') ?>
							<?= $this->include('admin/tweblokasi/modal-manually') ?>
							<?= $this->include('admin/tweblokasi/modal-add-kategori') ?>
							<!-- PAGE CONTENT ENDS -->
						</div>
						<!-- /.col -->
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
<script src="<?= base_url('') ?>/template/assets/css/dist/js/select2.min.js"></script>
<script>
	$(document).on('shown.bs.modal', function (e) {
        $('[autofocus]', e.target).focus();
      });

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

		$("#default-select").select2({
		    theme: "bootstrap"
		});

		$("#lantai_select2").select2({
		    theme: "bootstrap"
		});

		$("#kategori_select2").select2({
		    theme: "bootstrap"
		});

		$("#kategori_modal").select2({
		    theme: "bootstrap"
		});

		$("#pj_select2").select2({
		    theme: "bootstrap"
		});

		$("#qty_lantai_modal").select2({
		    theme: "bootstrap"
		});
	})
</script>
<?= $this->endSection('') ?>