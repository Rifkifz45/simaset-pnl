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

				<li>
					<a href="#">Report</a>
				</li>
				<li class="active">DBL</li>
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
					Report
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Daftar Barang Lainnya
					</small>
				</h1>
			</div><!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="panel panel-default">
				    <div class="panel-body">
				      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal" method="POST">
						<div class="form-group">
							<label class="col-md-2 control-label">Pilih Gedung</label>
							<div class="col-md-3">
								<select name="id_gedung" id="id_gedung" class="form-control" style="width: 100%">
									<option value="" disabled selected>Pilih Gedung</option>
									<?php foreach ($gedung as $key => $ged): ?>
										<option value="<?= $ged['id_gedung'] ?>"><?= $ged['nama_gedung'] ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<label class="col-md-2 control-label">Pilih Lokasi</label>
							<div class="col-md-3">
								<select name="id_lokasi" id="id_lokasi" class="form-control" style="width: 100%">
									<option value="" disabled selected>Pilih Lokasi</option>
								</select>
							</div>
							<div class="col-md-2">
								<button type="submit" name="report" value="report" class="btn btn-sm btn-success"><i class="fa fa-search"></i> &nbsp;Get Report</button>&nbsp;
							</div>
						</div>
					</form>
				    </div>
				  </div>
				  <div class="space-4"></div>
				  <div class="panel panel-default">
				    <div class="panel-body">
				      <table width="100%">
						<tr>
						<td width="25" align="center"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Logo_Politeknik_Negeri_Lhokseumawe.png/618px-Logo_Politeknik_Negeri_Lhokseumawe.png" width="60%"></td>
						<td width="50" align="center"><h4>KEMENTRIAN PENDIDIKAN, KEBUDAYAAN,RISET, DAN TEKNOLOGI</h4><h5><b>POLITEKNIK NEGERI LHOKSEUMAWE</b></h5><h6>Jalan Banda Aceh – Medan Km 280.3 Buketrata, Lhokseumawe, 24301 P.O BOX 90 Telepon (0645) 42670 Fax : 42785<br>Laman: www.pnl.ac.id</h6></td>
						</tr>
						</table>
						<div class="hr hr-18 dotted hr-double" style="background-color: black;"></div>
						<table width="100%">
						  <tr>
						    <td colspan="7" style="text-align: center"><strong><h4>DAFTAR INVENTARIS LAINNYA</h4></strong><strong><h4>POLITEKNIK NEGERI LHOKSEUMAWE</h4></strong></td>
						  </tr>
						</table>

						<table>
							<?php
	                     		$db = \Config\Database::connect();
	                     		 if(isset($_POST['id_lokasi'])){
		                     	  	$lks = $_POST['id_lokasi'];
		                     	  }else{
		                     	  	$lks = 0;
		                     	  }
	                     		$query = $db->table('tweb_lokasi')
	                     			->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung')
	                     			->where('tweb_lokasi.id_lokasi', $lks)
	                     			->get()
	                     			->getRow();
	                     	?>
							<tr>
								<td width="110px"><b>Kode Lokasi</b></td>
								<td width="10px"> : </td>
								<td width="300px"><?= $query->id_lokasi ?></td>
							</tr>
							<tr>
								<td width="110px"><b>Letak Lokasi</b></td>
								<td width="10px"> : </td>
								<td width="300px"><?= $query->nama_gedung ?></td>
							</tr>
							<tr>
								<td width="110px"><b>Nama Lokasi</b></td>
								<td width="10px"> : </td>
								<td width="300px"><?= $query->nama_lokasi ?></td>
							</tr>
						</table>
						<div class="space-8"></div>
		               <div>
		                  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
		                     <thead>
		                        <tr>
		                           <th rowspan="2"> # </th>
		                           <th rowspan="2">NUP</th>
		                           <th rowspan="2"> Nama Barang </th>
		                           <th class="text-center" colspan="3"> Identitas Barang </th>
		                           <th class="text-center" rowspan="2">Jumlah</th>
		                           <th class="text-center" colspan="3">Kondisi</th>
		                           <th rowspan="2">Keterangan</th>
		                        </tr>
		                        <tr>
		                        	<th>Merk / Type</th>
		                        	<th>Kode Barang</th>
		                        	<th>Thn Perolehan</th>
		                        	<th class="text-center">B</th>
		                        	<th class="text-center">RR</th>
		                        	<th class="text-center">RB</th>
		                        </tr>
		                     </thead>
		                     <tbody>
		                     	<?php
		                     	  if(isset($_POST['id_lokasi'])){
		                     	  	$id_lks = $_POST['id_lokasi'];
		                     	  }else{
		                     	  	$id_lks = 1;
		                     	  }

			                      $query = $db->table('transaksi_penempatan_item')
			                      ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'left')
						        ->join('inventaris_peralatan', 'inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan', 'left')
						        ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna', 'left')
						        ->join('tweb_hak', 'tweb_hak.id_hak = transaksi_penempatan_item.id_hak', 'left')
						        ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi')
						        ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung')
						        ->where('status_penempatan', 'Accepted')
						        ->where('status_penempatan_item', '1')
						        ->where('jenis_transaksi', 'DBL')
						        ->where('transaksi_penempatan.id_lokasi', $id_lks)
						        ->get()->getResult();
			                    ?>

			                    <?php foreach ($query as $key => $value): ?>
		                        <tr>
		                           <td class="center"><?= $key+1 ?></td>
		                           <td><?= $value->nup ?></td>
		                           <td><?= $value->nama_barang ?></td>
		                           <td><?= $value->merk ?></td>
		                           <td><?= $value->kode_barang ?></td>
		                           <td><?= $value->tgl_perolehan ?></td>
		                           <td><?= $value->kuantitas ?></td>
		                           <td>
		                           	<?php if ($value->id_kondisi == "K1"): ?>
		                           	<i class="fa fa-check"></i>
		                           	<?php endif ?>
		                           </td>
		                           <td>
		                           	<?php if ($value->id_kondisi == "K2"): ?>
		                           	<i class="fa fa-check"></i>
		                           	<?php endif ?>
		                           </td>
		                           <td>
		                           	<?php if ($value->id_kondisi == "K3"): ?>
		                           	<i class="fa fa-check"></i>
		                           	<?php endif ?>
		                           </td>
		                           <td><?= $value->uraian_hak ?></td>
			                    <?php endforeach ?>
		                        </tr>
		                        <?php if ($query == NULL): ?>
		                        	<tr>
		                        		<td colspan="11">Data Tidak Tersedia</td>
		                        	</tr>
		                        <?php endif ?>
		                     </tbody>
		                  </table>
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
<script src="<?= base_url('') ?>/template/assets/css/dist/js/select2.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script>
	jQuery(function($) {
	//initiate dataTables plugin

	  $("#id_gedung").select2({
        theme: "bootstrap"
    });

	  $("#id_lokasi").select2({
        theme: "bootstrap"
    });

	  $('#id_gedung').change(function(){
            var gedung_id = $('#id_gedung').val();

            $.ajax({
                url:"<?php echo site_url('admin/penempatan/getruangan'); ?>",
                method:"POST",
                data:{gedung_id:gedung_id},
                dataType:"JSON",
                success:function(data){
                    var html = "";
                    var i;
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="'+data[i].id_lokasi+'">'+data[i].nama_lokasi +'</option>';
                    };

                    $('#id_lokasi').html(html);
                },
            });
        });
	});
</script>
<?= $this->endSection('') ?>