<?= $this->extend('admin/layout') ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous">
<!-- select2-bootstrap4-theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css"> <!-- for live demo page -->

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
					<a href="#">Data Inventaris Tanah</a>
				</li>
				<li class="active">Add</li>
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
					Inventaris
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Add Data Inventaris Tanah
					</small>
				</h1>
			</div><!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<form class="form-horizontal" role="form" action="<?= site_url('admin/inventaris_takberwujud/create') ?>" method="post">
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Barang </label>

							<div class="col-sm-9">
								<select name="idtweb_asset" id="idtweb_asset" class="input-xxlarge" required>
								<option value="" selected disabled>Pilih Kode Barang</option>
								<?php foreach ($kategori as $key => $value): ?>
								<option value="<?= $value['idtweb_asset'] ?>">Kode Barang : <?= $value['golongan'] . "." . $value['bidang'] . "." . $value['kelompok'] . "." . $value['sub_kelompok'] . "." . $value['sub_sub_kelompok'] . " - " . $value['uraian']  ?></option>
								<?php endforeach ?>
								</select>
							</div>
						</div>

						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NUP </label>

							<div class="col-sm-9">
								<input type="number" name="nup" min="1" class="form control input-xxlarge" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kondisi </label>

							<div class="col-sm-9">
								<select name="id_kondisi" id="id_kondisi" class="input-xxlarge" required>
								<option value="" selected disabled>Pilih Kondisi Saat ini</option>
								<?php foreach ($kondisi as $key => $kon): ?>
								<option value="<?= $kon['id_kondisi'] ?>"><?= $kon['uraian_kondisi'] ?></option>
								<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Perolehan </label>

							<div class="col-sm-9">
								<select name="id_perolehan" id="id_perolehan" class="input-xxlarge">
								<option value="" selected disabled>Pilih Perolehan</option>
								<?php foreach ($perolehan as $key => $per): ?>
								<option value="<?= $per['id_perolehan'] ?>"><?= $per['uraian_perolehan'] ?></option>
								<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Merk/Type </label>

							<div class="col-sm-9">
								<textarea required name="merk" id="merk" class="form-control input-xxlarge"></textarea>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Rekam Pertama </label>

							<div class="col-sm-9">
								<input name="tgl_rekam_pertama" required type="date" value="<?php echo Date('Y-m-d') ?>" class="form control input-xxlarge">
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Perolehan </label>

							<div class="col-sm-9">
								<input name="tgl_perolehan" required type="date" class="form control input-xxlarge">
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai Perolehan Pertama </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<span class="input-group-addon">Rp</span>
									<input name="nilai_perolehan_pertama" required type="text" class="form-control" placeholder="Masukan Harga dalam Rp.">
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai Mutasi </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<span class="input-group-addon">Rp</span>
									<input name="nilai_mutasi" required type="text" class="form-control" placeholder="Masukan Harga dalam Rp.">
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai Perolehan </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<span class="input-group-addon">Rp</span>
									<input name="nilai_perolehan" required type="text" class="form-control" placeholder="Masukan Harga dalam Rp.">
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai Penyusutan </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<span class="input-group-addon">Rp</span>
									<input name="nilai_penyusutan" required type="text" class="form-control" placeholder="Masukan Harga dalam Rp.">
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai Buku </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<span class="input-group-addon">Rp</span>
									<input name="nilai_buku" required type="text" class="form-control" placeholder="Masukan Harga dalam Rp.">
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kuantitas </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<input name="kuantitas" required type="text" class="form-control" placeholder="Kuantitas">
									<span class="input-group-addon">M<sup>2</sup></span>
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jumlah Foto </label>

							<div class="col-sm-9">
								<input name="jumlah_foto" type="text" class="form-control input-xxlarge" placeholder="Jumlah Foto" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status Penggunaan </label>

							<div class="col-sm-9">
								<textarea required name="status_penggunaan" id="status_penggunaan" class="form-control input-xxlarge"></textarea>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status Pengelolaan </label>

							<div class="col-sm-9">
								<textarea name="status_pengelolaan" id="status_pengelolaan" class="form-control input-xxlarge" required></textarea>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No PSP </label>

							<div class="col-sm-9">
								<input name="no_psp" type="text" class="form-control input-xxlarge"  placeholder="Masukan No. PSP" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal PSP </label>

							<div class="col-sm-9">
								<input name="tgl_psp" type="date" class="form control input-xxlarge" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-info" type="submit">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Submit
								</button>

								&nbsp; &nbsp; &nbsp;
								<button class="btn" type="reset">
									<i class="ace-icon fa fa-undo bigger-110"></i>
									Reset
								</button>
							</div>
						</div>
					</form>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" integrity="sha256-AFAYEOkzB6iIKnTYZOdUf9FFje6lOTYdwRJKwTN5mks=" crossorigin="anonymous"></script>

<script>
	$(document).ready(function () {
	$("#idtweb_asset").select2({
		theme: "bootstrap4"
	});

	$("#id_kondisi").select2({
	  theme: "bootstrap4"
	});

	$("#id_perolehan").select2({
	  theme: "bootstrap4"
	});
});
</script>
<?= $this->endSection('') ?>