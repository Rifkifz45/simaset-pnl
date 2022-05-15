<?= $this->extend('admin/layout') ?>
<?= $this->section('head') ?>
<?= $this->include('admin/penempatan/style.css') ?>
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
					Widgets
					<small>
					<i class="ace-icon fa fa-angle-double-right"></i>
					Draggabble Widget Boxes with Persistent Position and State
					</small>
				</h1>
			</div>
			
			<div class="row">
				<div class="col-sm-12 col-xs-12 infobox-container">
					<div class="infobox infobox-red" style="width:33.33%">
						<div class="infobox-data">
							<span class="infobox-data-number">7</span>
							<div class="infobox-content">Total Gedung</div>
						</div>

						<div class="badge badge-success">
							<a href="" onMouseOver="this.style.color='green'" onMouseOut="this.style.color='#fff'" style="color: white; padding: 20px;"><i class="ace-icon fa fa-arrow-right"></i></a>
						</div>
					</div>

					<div class="infobox infobox-orange2" style="width:33.33%">
						<div class="infobox-data">
							<span class="infobox-data-number">14</span>
							<div class="infobox-content">Total Kategori Ruang</div>
						</div>

						<div class="badge badge-success">
							<a href="" onMouseOver="this.style.color='green'" onMouseOut="this.style.color='#fff'" style="color: white; padding: 15px;"><i class="ace-icon fa fa-arrow-right"></i></a>
						</div>
					</div>

					<div class="infobox infobox-orange2" style="width:33.33%">
						<div class="infobox-data">
							<span class="infobox-data-number">100</span>
							<div class="infobox-content">Total Ruang</div>
						</div>

						<div class="badge badge-success">
							<a href="" onMouseOver="this.style.color='green'" onMouseOut="this.style.color='#fff'" style="color: white; padding: 15px;"><i class="ace-icon fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>

			<div class="space-8"></div>
			<div class="btn-toolbar">
				<div class="pull-left btn-group">
					<button class="btn btn-white"><i class="ace-icon glyphicon glyphicon-list"></i></i> List Barang</button>
					<button class="btn btn-white"><i class="fa fa-barcode" aria-hidden="true"></i> Label Kecil</button>
					<button class="btn btn-white"><i class="fa fa-qrcode" aria-hidden="true"></i> Label Besar</button>
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
					<div class="row">
						<div class="col-sm-12">
							<!-- <embed src="<?= site_url('document/penempatan/'.$penempatan['placement_document']) ?>" frameborder="0" height="500px" width="100%" title="View Dokumen Penempatan"> -->
						</div>
					</div>
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
											<form method="POST" id="contactForm" name="contactForm" class="contactForm" novalidate="novalidate">
												<div class="row">
													<div class="col-sm-12 col-xs-12">
														<div class="form-group">
															<label for="cars">Choose Parent Location:</label>
															<select class="form-control" name="cars" id="cars">
																<option value="">Pilih Gedung</option>
																<option value="volvo">Volvo</option>
																<option value="saab">Saab</option>
																<option value="mercedes">Mercedes</option>
																<option value="audi">Audi</option>
															</select>
															<div class="space-4"></div>
															<button type="button" class="btn btn-lg btn-primary">New</button>
															<button type="button" class="btn btn-lg btn-success">Entry Manually</button>
														</div>
													</div>
													<div class="col-sm-12 col-xs-12">
														<div class="form-group">
															<label for="cars">Lantai:</label>
															<select class="form-control" name="cars" id="cars">
																<option value="">Pilih Lantai</option>
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
															<label for="email">Location Code:</label>
															<input type="email" class="form-control" name="email" id="email" placeholder="Kode Lokasi / Ruangan">
														</div>
													</div>
													<div class="col-sm-12 col-xs-12">
														<div class="form-group">
															<label for="email">Location Name:</label>
															<input type="email" class="form-control" name="email" id="email" placeholder="Nama Lokasi / Ruangan">
														</div>
													</div>
													<div class="col-sm-12 col-xs-12">
														<div class="form-group">
															<label for="cars">Penanggung Jawab:</label>
															<select class="form-control" name="pj" id="pj">
																<option value="" selected>Pilih Penanggung Jawab:</option>
																<option value="1">Bahuwarna Wasita</option>
																<option value="2">Ajeng Novitasari </option>
																<option value="3">Indah Haryanti</option>
																<option value="4">Nadia Anggraini </option>
															</select>
															<div id="pj-error" class="help-block">Not Available? Please add in Data Store Karyawan.</div>
														</div>
													</div>
													<div class="col-sm-12 col-xs-12">
														<div class="form-group">
															<label for="cars">Gambar:</label>
															<label class="ace-file-input"><input type="file" id="id-input-file-2" name="foto" maxlength="255"><span class="ace-file-container" data-title="Choose"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon fa fa-upload"></i></span></span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>
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
<script type="text/javascript">
	jQuery(function($) {
		
	
	});
</script>
<?= $this->endSection('') ?>