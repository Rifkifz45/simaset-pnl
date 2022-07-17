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
					<form class="form-horizontal" role="form" method="post" action="<?= site_url('admin/inventaris_gedung/update') ?>">
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Barang </label>
							<input value="<?= $detail['idinventaris_gedung'] ?>" type="hidden" name="idinventaris_gedung">

							<div class="col-sm-9">
								<select name="idtweb_asset" id="idtweb_asset" class="input-xxlarge" required>
								<?php foreach ($kategori as $key => $value): ?>
								<option value="<?= $value['idtweb_asset'] ?>" <?= $detail['kode_barang'] == ($value['golongan'] . $value['bidang'] . $value['kelompok'] . $value['sub_kelompok'] . $value['sub_sub_kelompok']) ? 'selected' : '' ?>>Kode Barang : <?= $value['golongan'] . "." . $value['bidang'] . "." . $value['kelompok'] . "." . $value['sub_kelompok'] . "." . $value['sub_sub_kelompok'] . " - " . $value['uraian']  ?></option>
								<?php endforeach ?>
								</select>
							</div>
						</div>

						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NUP </label>

							<div class="col-sm-9">
								<input value="<?= $detail['nup'] ?>" type="number" min="1" class="form control input-xxlarge" name="nup" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kondisi </label>

							<div class="col-sm-9">
								<select name="id_kondisi" id="id_kondisi" class="input-xxlarge" required>
								<?php foreach ($kondisi as $key => $kon): ?>
								<option value="<?= $kon['id_kondisi'] ?>" <?= $detail['id_kondisi'] == $kon['id_kondisi'] ? "selected" : null ?>><?= $kon['uraian_kondisi'] ?></option>
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
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Dokumen </label>

							<div class="col-sm-9">
								<input name="dokumen" value="<?= $detail['dokumen'] ?>" required type="text" class="form control input-xxlarge">
							</div>
						</div>
						<div class="space-4"></div>


						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Merk/Type </label>

							<div class="col-sm-9">
								<textarea required name="merk" id="merk" class="form-control input-xxlarge"><?= $detail['merk'] ?></textarea>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Rekam Pertama </label>

							<div class="col-sm-9">
								<input name="tgl_rekam_pertama" required type="date" value="<?php echo date('Y-m-d',strtotime($detail["tgl_rekam_pertama"])) ?>" class="form control input-xxlarge">
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Perolehan </label>

							<div class="col-sm-9">
								<input name="tgl_perolehan" value="<?php echo date('Y-m-d',strtotime($detail["tgl_perolehan"])) ?>" required type="date" class="form control input-xxlarge">
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai Perolehan Pertama </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<span class="input-group-addon">Rp</span>
									<input name="nilai_perolehan_pertama" value="<?= number_format($detail['nilai_perolehan_pertama']) ?>" type="text" class="form-control" placeholder="Masukan Harga dalam Rp.">
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai Mutasi </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<span class="input-group-addon">Rp</span>
									<input name="nilai_mutasi" value="<?= number_format($detail['nilai_mutasi']) ?>" type="text" class="form-control" placeholder="Masukan Harga dalam Rp.">
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai Perolehan </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<span class="input-group-addon">Rp</span>
									<input name="nilai_perolehan" value="<?= number_format($detail['nilai_perolehan']) ?>" type="text" class="form-control" placeholder="Masukan Harga dalam Rp.">
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai Penyusutan </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<span class="input-group-addon">Rp</span>
									<input name="nilai_penyusutan" value="<?= number_format($detail['nilai_penyusutan']) ?>" type="text" class="form-control" placeholder="Masukan Harga dalam Rp.">
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nilai Buku </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<span class="input-group-addon">Rp</span>
									<input name="nilai_buku" value="<?= number_format($detail['nilai_buku']) ?>" type="text" class="form-control" placeholder="Masukan Harga dalam Rp.">
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kuantitas </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<input value="<?= number_format($detail['kuantitas']) ?>" type="text" name="kuantitas" class="form-control" placeholder="Kuantitas">
									<span class="input-group-addon">M<sup>2</sup></span>
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Luas Bangunan </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<input name="luas_bangunan" value="<?= $detail['luas_bangunan'] ?>" required type="text" class="form-control" placeholder="Masukan Luas dalam m2">
									<span class="input-group-addon">M<sup>2</sup></span>
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Luas Dasar Bangunan </label>

							<div class="col-sm-9">
								<div class="input-group input-xxlarge">
									<input value="<?= $detail['luas_dasar_bangunan'] ?>" name="luas_dasar_bangunan" required type="text" class="form-control" placeholder="Masukan Luas dalam m2">
									<span class="input-group-addon">M<sup>2</sup></span>
								</div>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jumlah Lantai </label>

							<div class="col-sm-9">
								<select name="jumlah_lantai" id="jumlah_lantai" class="input-xxlarge" required>
								<option value="" selected disabled>Pilih Lantai</option>
								<option value="1">1 Lantai</option>
								<option value="2">2 Lantai</option>
								<option value="3">3 Lantai</option>
								<option value="4">4 Lantai</option>
								<option value="5">5 Lantai</option>
								<option value="6">6 Lantai</option>
								</select>
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
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jumlah Foto </label>

							<div class="col-sm-9">
								<input name="jumlah_foto" value="<?= number_format($detail['jumlah_foto']) ?>" type="text" class="form-control input-xxlarge" placeholder="Jumlah Foto" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jalan </label>

							<div class="col-sm-9">
								<input name="jalan" value="<?= $detail['jalan'] ?>" type="text" class="form-control input-xxlarge" placeholder="Jalan" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Kabupaten / Kota </label>

							<div class="col-sm-9">
								<input readonly value="<?= $detail['kode_kabkot'] ?>" type="text" class="form-control input-xxlarge"  placeholder="Masukan Kode Kabkot" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Provinsi </label>

							<div class="col-sm-9">
								<input readonly value="<?= $detail['uraian_provinsi'] ?>" type="text" class="form-control input-xxlarge"  placeholder="Masukan Provinsi" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Provinsi </label>

							<div class="col-sm-9">
								<input readonly value="<?= $detail['kode_provinsi'] ?>" type="text" class="form-control input-xxlarge"  placeholder="Masukan Kode Provinsi" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Pos </label>

							<div class="col-sm-9">
								<input readonly value="<?= $detail['kode_pos'] ?>" type="text" class="form-control input-xxlarge"  placeholder="Masukan Kode Pos" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status Penggunaan </label>

							<div class="col-sm-9">
								<textarea required name="status_penggunaan" id="status_penggunaan" class="form-control input-xxlarge"><?= $detail['status_penggunaan'] ?></textarea>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status Pengelolaan </label>

							<div class="col-sm-9">
								<textarea name="status_pengelolaan" id="status_pengelolaan" class="form-control input-xxlarge" required><?= $detail['status_pengelolaan'] ?></textarea>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No PSP </label>

							<div class="col-sm-9">
								<input name="no_psp" value="<?= $detail['no_psp'] ?>" type="text" class="form-control input-xxlarge"  placeholder="Masukan No. PSP" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal PSP </label>

							<div class="col-sm-9">
								<input name="tgl_psp" value="<?php echo date('Y-m-d',strtotime($detail["tgl_psp"])) ?>" type="date" class="form control input-xxlarge" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jumlah KIB </label>

							<div class="col-sm-9">
								<input name="jumlah_kib" value="<?= $detail['jumlah_kib'] ?>" type="text" class="form-control input-xxlarge"  placeholder="Jumlah KIB" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> SBSK </label>

							<div class="col-sm-9">
								<input name="sbsk" value="<?= $detail['sbsk'] ?>" type="text" class="form-control input-xxlarge"  placeholder="SBSK" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Optimalisasi </label>

							<div class="col-sm-9">
								<input name="optimalisasi" value="<?= $detail['optimalisasi'] ?>" type="text" class="form-control input-xxlarge"  placeholder="Masukan Kode Pos" required>
							</div>
						</div>
						<div class="space-4"></div>

						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-info" type="submit">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Update
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