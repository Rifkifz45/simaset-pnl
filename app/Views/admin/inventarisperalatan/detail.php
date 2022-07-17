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

				<li>
					<a href="#">Inventaris Tanah</a>
				</li>
				<li class="active">Detail</li>
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
					Data Inventaris
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Detail Inventaris Tanah
					</small>
				</h1>
			</div><!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Barang </label>

							<div class="col-sm-9">
								<select disabled name="idtweb_asset" id="idtweb_asset" class="input-xxlarge" required>
								<?php foreach ($kategori as $key => $value): ?>
								<option disabled value="<?= $value['idtweb_asset'] ?>" <?= $detail['kode_barang'] == ($value['golongan'] . $value['bidang'] . $value['kelompok'] . $value['sub_kelompok'] . $value['sub_sub_kelompok']) ? 'selected' : '' ?>>Kode Barang : <?= $value['golongan'] . "." . $value['bidang'] . "." . $value['kelompok'] . "." . $value['sub_kelompok'] . "." . $value['sub_sub_kelompok'] . " - " . $value['uraian']  ?></option>
								<?php endforeach ?>
								</select>
							</div>
						</div>

						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NUP </label>

							<div class="col-sm-9">
								<input readonly value="<?= $detail['nup'] ?>" type="number" min="1" class="form control input-xxlarge" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kondisi </label>

							<div class="col-sm-9">
								<select disabled name="" id="id_kondisi" class="input-xxlarge" required>
								<?php foreach ($kondisi as $key => $kon): ?>
								<option value="<?= $kon['id_kondisi'] ?>" <?= $detail['id_kondisi'] == $kon['id_kondisi'] ? "selected" : null ?>><?= $kon['uraian_kondisi'] ?></option>
								<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="space-4"></div>


						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Merk/Type </label>

							<div class="col-sm-9">
								<textarea readonly required name="" id="" class="form-control input-xxlarge"><?= $detail['merk'] ?></textarea>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Rekam Pertama </label>

							<div class="col-sm-9">
								<input required type="date" readonly value="<?php echo date('Y-m-d',strtotime($detail["tgl_rekam_pertama"])) ?>" class="form control input-xxlarge">
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Perolehan </label>

							<div class="col-sm-9">
								<input readonly value="<?php echo date('Y-m-d',strtotime($detail["tgl_perolehan"])) ?>" required type="date" class="form control input-xxlarge">
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai Perolehan Pertama </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<span class="input-group-addon">Rp</span>
									<input value="<?= number_format($detail['nilai_perolehan_pertama']) ?>" readonly type="text" class="form-control" id="luas" name="luas" placeholder="Masukan Harga dalam Rp.">
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai Mutasi </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<span class="input-group-addon">Rp</span>
									<input value="<?= number_format($detail['nilai_mutasi']) ?>" readonly type="text" class="form-control" id="luas" name="luas" placeholder="Masukan Harga dalam Rp.">
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai Perolehan </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<span class="input-group-addon">Rp</span>
									<input value="<?= number_format($detail['nilai_perolehan']) ?>" readonly type="text" class="form-control" id="luas" name="luas" placeholder="Masukan Harga dalam Rp.">
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai Penyusutan </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<span class="input-group-addon">Rp</span>
									<input value="<?= number_format($detail['nilai_penyusutan']) ?>" readonly type="text" class="form-control" id="luas" name="luas" placeholder="Masukan Harga dalam Rp.">
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai Buku </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<span class="input-group-addon">Rp</span>
									<input value="<?= number_format($detail['nilai_buku']) ?>" readonly type="text" class="form-control" id="luas" name="luas" placeholder="Masukan Harga dalam Rp.">
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kuantitas </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<input value="<?= number_format($detail['kuantitas']) ?>" readonly type="text" class="form-control" id="luas" name="luas" placeholder="Kuantitas">
									<span class="input-group-addon">M<sup>2</sup></span>
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jumlah Foto </label>

							<div class="col-sm-9">
								<input value="<?= number_format($detail['jumlah_foto']) ?>" readonly type="text" class="form-control input-xxlarge" placeholder="Jumlah Foto" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status Penggunaan </label>

							<div class="col-sm-9">
								<textarea readonly required name="" id="" class="form-control input-xxlarge"><?= $detail['status_penggunaan'] ?></textarea>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status Pengelolaan </label>

							<div class="col-sm-9">
								<textarea readonly name="" id="" class="form-control input-xxlarge" required><?= $detail['status_penggunaan'] ?></textarea>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No PSP </label>

							<div class="col-sm-9">
								<input readonly value="<?= $detail['no_psp'] ?>" type="text" class="form-control input-xxlarge"  placeholder="Masukan No. PSP" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal PSP </label>

							<div class="col-sm-9">
								<input readonly value="<?php echo date('Y-m-d',strtotime($detail["tgl_psp"])) ?>" type="date" class="form control input-xxlarge" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jumlah KIB </label>

							<div class="col-sm-9">
								<input readonly value="<?= $detail['jumlah_kib'] ?>" type="text" class="form-control input-xxlarge"  placeholder="Jumlah KIB" required>
							</div>
						</div>
						<div class="space-4"></div>
					</form>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
<?= $this->endSection() ?>