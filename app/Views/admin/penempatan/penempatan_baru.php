<?= $this->extend('admin/layout') ?>
<?= $this->section('head') ?>
<style>
	/* WRAPPERS */
#wrapper {
  width: 100%;
  overflow-x: hidden;
}
.wrapper {
  padding: 0 20px;
}

#page-wrapper {
  padding: 0 15px;
  min-height: 568px;
  position: relative !important;
}
@media (min-width: 768px) {
  #page-wrapper {
    position: inherit;
    margin: 0 0 0 240px;
    min-height: 2002px;
  }
}

/* Payments */
.payment-card {
  background: #ffffff;
  padding: 20px;
  margin-bottom: 25px;
  border: 1px solid #e7eaec;
}
.payment-icon-big {
  font-size: 60px;
  color: #d1dade;
}
.payments-method.panel-group .panel + .panel {
  margin-top: -1px;
}
.payments-method .panel-heading {
  padding: 15px;
}
.payments-method .panel {
  border-radius: 0;
}
.payments-method .panel-heading h5 {
  margin-bottom: 5px;
}
.payments-method .panel-heading i {
  font-size: 26px;
}

.payment-icon-big {
    font-size: 60px !important;
    color: #d1dade;
}

.form-control,
.single-line {
  background-color: #FFFFFF;
  background-image: none;
  border: 1px solid #e5e6e7;
  border-radius: 1px;
  color: inherit;
  display: block;
  padding: 6px 12px;
  transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
  width: 100%;
  font-size: 14px;
}
.text-navy {
    color: #1ab394;
}
.text-success {
    color: #1c84c6;
}
.text-warning {
    color: #f8ac59;
}
.ibox {
  clear: both;
  margin-bottom: 25px;
  margin-top: 0;
  padding: 0;
}
.ibox.collapsed .ibox-content {
  display: none;
}
.ibox.collapsed .fa.fa-chevron-up:before {
  content: "\f078";
}
.ibox.collapsed .fa.fa-chevron-down:before {
  content: "\f077";
}
.ibox:after,
.ibox:before {
  display: table;
}

.ibox-content {
  background-color: #ffffff;
}
.ibox-footer {
  color: inherit;
  border-top: 1px solid #e7eaec;
  font-size: 90%;
  background: #ffffff;
  padding: 10px 15px;
}
.text-danger {
    color: #ed5565;
}
</style>
<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/dist/css/select2.css" />
<?= $this->endSection('') ?>
<?php
	$db = \Config\Database::connect();
	
	$dataKode	= buatKode("table-placement", "PB");
	include "btntambah.php";
	include "btnsimpan.php";
?>

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
					Transaksi Penempatan Baru
				</h1>
			</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="panel-group payments-method" id="accordion">
                    	<div class="panel panel-default">
                            <div class="panel-heading" style="padding: 15px;">
                                <div class="pull-right">
                                    <i class="fa fa-cc-amex text-success"></i>
                                    <i class="fa fa-cc-mastercard text-warning"></i>
                                    <i class="fa fa-cc-discover text-danger"></i>
                                </div>
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Form Penempatan Baru</a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse in">
                                <div class="panel-body">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <h2>Summary</h2>
                                            <strong>Product:</strong>: Name of product <br>
                                            <strong>Price:</strong>: <span class="text-navy">$452.90</span>

                                            <p class="m-t">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                nisi ut aliquip ex ea commodo consequat.

                                            </p>
                                            <p>
                                                Duis aute irure dolor
                                                in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                                nulla pariatur. Excepteur sint occaecat cupidatat.
                                            </p>
                                        </div>
                                        <div class="col-md-8">

                                            <form role="form" id="payment-form">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label>Kode Penempatan</label>
                                                            <div class="input-group">
                                                                <input value="<?= $dataKode ?>" type="text" class="form-control" name="Number" placeholder="Valid Card Number" required="" readonly>
                                                                <span class="input-group-addon"><i class="fa fa-code" aria-hidden="true"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-7 col-md-7">
                                                        <div class="form-group">
                                                            <label>Tanggal Penempatan</label>
                                                            <input type="datetime-local" class="form-control" name="Expiry" placeholder="MM / YY" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-5 col-md-5 pull-right">
                                                        <div class="form-group">
                                                            <label>Jenis Transaksi</label>
                                                            <select class="form-control" name="" id="">
                                                            	<option value="">-- Pilih Jenis --</option>
                                                            	<option value="">DBR</option>
                                                            	<option value="">DBL</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label>Gedung</label>
                                                            <select class="form-control" name="" id="">
                                                            	<option value=""> Pilih Gedung </option>
                                                            	<option value="">Gedung A</option>
                                                            	<option value="">Gedung B</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label>Lokasi</label>
                                                            <select class="form-control" name="" id="">
                                                            	<option value=""> Pilih Lokasi </option>
                                                            	<option value="">Lokasi A</option>
                                                            	<option value="">Lokasi B</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label>Keterangan</label>
                                                            <textarea name="" id="" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-7 col-md-7">
                                                        <div class="form-group">
                                                            <label>Label Barang</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="Number" placeholder="Valid Card Number" required="">
                                                                <span class="input-group-addon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                            </div>
                                                            <div class="space-4"></div>
                                                            <button type="button" class="btn btn-xs btn-primary">New</button>
                                                            <a class="btn btn-xs btn-success" href="javaScript:void(0)" onclick="window.open('<?= site_url('admin/penempatan/pencarian_barang') ?>','Pencarian Barang','toolbar=yes,scrollbars=yes,resizable=yes,top=30,width=4000,height=4000')" target="_SELF">Search Items</a>
                                                        </div>
                                                    </div>
                                                     <div class="col-xs-5 col-md-5">
                                                        <div class="form-group">
                                                            <label>Pengguna</label>
                                                            <select class="form-control" name="" id="">
                                                            	<option value=""> Pilih Pengguna </option>
                                                            	<option value="">Pengguna A</option>
                                                            	<option value="">Pengguna B</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="Number" placeholder="Valid Card Number" required="" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <button class="btn btn-primary" type="submit">Save Changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="pull-right">
                                    <i class="fa fa-cc-paypal text-success"></i>
                                </div>
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Temp Data</a>
                                </h5>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <div class="row">
                                        <div class="col-md-12">
                                        	<div class="table-header">
											Results for "Latest Registered Domains"
										</div>
                                        	<table id="dynamic-table" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th class="center">
														#
													</th>
													<th>Kode Barang</th>
													<th class="hidden-480">NUP</th>
													<th>
														<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
														Nama Barang
													</th>
													<th class="hidden-480">Merk / Tipe</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$tmpSql ="SELECT * from `tmp-penempatan` INNER JOIN `tabel-master-plm` ON `tabel-master-plm`.idmasterplm=`tmp-penempatan`.kode_inventaris";
													$tmp_penempatan = $db->query($tmpSql)->getResult();
													?>
												<?php foreach ($tmp_penempatan as $key => $value):
													?>
												<tr>
													<td class="center">
														<?= $key+1 ?>
													</td>
													<td><?= $value->kode_barang ?></td>
													<td><?= $value->nup ?></td>
													<td><?= $value->nama_barang ?></td>
													<td><?= $value->merk_tipe ?></td>
													<td class="center">
														<div class="">
															<a data-toggle="modal" data-target="#deletetmp<?php echo $value->id ?>" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-danger" title="Delete"><i class="ace-icon fa fa-trash bigger-120"></i></a>
														</div>
													</td>
												</tr>
												<?php endforeach ?>
											</tbody>
										</table>
                                        </div>
                                    </div>
                                     </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>


			<!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="container">
						<form class="form-horizontal" target="_SELF" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
							<table class="table table-responsive" border="0" cellspacing="1" cellpadding="2" style="width: 900px;">
								<tr>
									<td bgcolor="#F5F5F5"><strong> PENEMPATAN </strong></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td width="21%">No. Penempatan</td>
									<td width="1%"><strong>:</strong></td>
									<td width="78%"><input name="kode_penempatan" class="form-control" value="<?= $dataKode ?>" size="23" maxlength="20" readonly="readonly"/></td>
								</tr>
								<tr>
									<td>Tgl. Penempatan</td>
									<td><strong>:</strong></td>
									<td><input type="datetime-local" name="placement_date" id="placement_date" class="form-control" /></td>
								</tr>
								<tr>
									<td>Gedung</td>
									<td><strong>:</strong></td>
									<td>
										<select name="gedung" id="gedung" class="default-select form-control" data-placeholder="Choose a building...">
											<option value="">....</option>
											<?php
												foreach ($gedung as $key => $value) { ?>
											<option value="<?php echo $value['buildings_id']; ?>">
												<?= $value['buildings_name']; ?>
											</option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td>Lokasi Penempatan</td>
									<td><strong>:</strong></td>
									<td>
										<select name="placement_location" id="ruangan" class="default-select form-control" data-placeholder="Choose a location...">
											<option value="">....</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Keterangan</td>
									<td><strong>:</strong></td>
									<td><input class="form-control" name="keterangan" value="" size="80" maxlength="100" /></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td bgcolor="#F5F5F5"><strong>INPUT BARANG </strong></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>Kode/ Label Barang</td>
									<td><strong>:</strong></td>
									<td>
										<b>
											<div class="input-group">
												<input class="form-control" name="txtKodeInventaris" id="txtKodeInventaris" size="40" maxlength="40" onchange="javascript:submitform();" />
												<span class="input-group-btn">
												<input name="btnTambah" class="btn btn-sm btn-primary" type="submit" style="cursor:pointer;" value=" Tambah " />
												</span>
											</div>
										</b>
									</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><strong>:</strong></td>
									<td><input class="form-control" name="txtNamaBrg"  id="txtNamaBrg" size="80" maxlength="100" disabled="disabled" /></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><a href="javaScript:void(0)" onclick="window.open('<?= site_url('admin/penempatan/pencarian_barang') ?>','Pencarian Barang','toolbar=yes,scrollbars=yes,resizable=yes,top=30,width=4000,height=4000')" target="_SELF"><strong>Pencarian Barang</strong></a>, bisa pakai <strong>Barcode Reader</strong> untuk membaca label barang </td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><input name="btnSimpan" class="btn btn-sm btn-white" type="submit" style="cursor:pointer;" value=" SIMPAN DATA " /></td>
								</tr>
							</table>
							<div class="space-2"></div>
							<div class="row">
								<div class="col-xs-12 col-sm-11">
									<div style="width:100% !important">
										<div class="table-header">
											
										</div>
										
									</div>
								</div>
								<!-- /.span -->
							</div>
						</form>
						  <!-- Modal Delete -->
				          <?php foreach ($tmp as $key => $value) : ?>
				          <div id="deletetmp<?php echo $value->id ?>" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title"><span class="label label-inverse"> # Delete</span> &nbsp; Are you sure you want to delete Kode Barang :<u> <?= $value->kode_barang ?></u> dengan NUP : <u><?= $value->nup ?></u> from tmp Database?</h5>
										</div>
										<div class="modal-body" align="center">
											<a href="<?= site_url('admin/penempatan/tmp/'.$value->id) ?>" class="btn btn-danger">&nbsp; &nbsp;YES&nbsp; &nbsp;</a>
										</div>
										<div class="modal-footer">
											<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
										</div>
									</div>
								</div>
							</div>
							 <?php endforeach; ?>
				          <!-- End Modal Delete -->
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
<script type="text/javascript">
	jQuery(function($) {
		$('.default-select').select2();
		//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
		$('#gedung').change(function(){
	var gedung_id = $('#gedung').val();
	$.ajax({
	url:"<?php echo site_url('admin/penempatan/getruangan'); ?>",
	method:"POST",
	data:{gedung_id:gedung_id},
	dataType:"JSON",
	success:function(data)
	{
	var html = "";
	var i;
	for (var i = 0; i < data.length; i++) {
	html += '<option value="'+data[i].rooms_id+'">'+data[i].rooms_name +'</option>';
	};
	$('#ruangan').html(html);
	},
	});
	});
	
	});
</script>
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
			  null, null, null, null,
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