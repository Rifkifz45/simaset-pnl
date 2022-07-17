<?= $this->extend('admin/layout') ?>

<?= $this->section('head') ?>
<style>
	.Disabled{
		pointer-events: none;
		cursor: not-allowed;
		opacity: 0.65;
		filter: alpha(opacity=65);
		-webkit-box-shadow: none;
		box-shadow: none;
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
				<li class="active">Mutasi</li>
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

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="row">
	                  <div class="col-xs-12">
	                     <div class="widget-box">
	                        <div class="widget-header">
	                           <h4 class="widget-title">TRANSAKSI MUTASI</h4>
	                           <div class="widget-toolbar">
	                           	<div class="pull-right" style="margin-left: 15px;">
	                                 <button onclick="window.location.href='<?= site_url('admin/mutasi/new') ?>'" type="button" class="btn btn-sm btn-primary">
	                                    <i class="ace-icon fa fa-plus-circle"></i> Add New
	                                 </button>
	                              </div>
	                           </div>
	                        </div>
	                        <div class="widget-body">
	                           <div class="widget-main">
	                              <div>
	                                 <table id="dynamic-table" class="table table-striped table-bordered dataTable no-footer">
	                                    <thead>
	                                       <tr>
												<th class="center"> # </th>
												<th> Tanggal </th>
												<th> ID Mutasi </th>
												<th> ID Penempatan </th>
												<th> Gedung dan Lokasi </th>
												<th> Qty Barang </th>
												<th> Status </th>
												<th>
													<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
													Action
												</th>
											</tr>
	                                    </thead>
	                                    <tbody>
	                                    <?php foreach ($mutasi as $key => $value): ?>
										<tr>
											<td><?= $key + 1 ?></td>
											<td><?= date("d-m-Y", strtotime($value['tgl_mutasi'])) ?></td>
											<td><?= $value['idtransaksi_mutasi'] ?></td>
											<td><?= $value['idtransaksi_penempatan'] ?></td>
											<td><?= $value['nama_gedung'] . " Lantai " . $value['lantai'] . " - "  . $value['nama_lokasi'] ?></td>
											<td class="center">
											  <?php
						                          $db = \Config\Database::connect();
						                          $query = $db->table('transaksi_penempatan_item')->where(['idtransaksi_penempatan' => $value['idtransaksi_penempatan']]);
						                          echo $query->countAllResults();
					                          ?>
											</td>
											<td class="text-center">
												<?php if ($value['status_penempatan'] == "Pending"){ ?>
													<span class="label label-warning"><?= $value['status_penempatan'] ?></span>
												<?php }elseif($value['status_penempatan'] == "Accepted"){ ?>
												<span class="label label-success arrowed-in arrowed-in-right"><?= $value['status_penempatan'] ?></span>
												<?php }else{ ?>
												<span class="label label-danger arrowed"><?= $value['status_penempatan'] ?></span>
												<?php } ?>
											</td>
											<td class="text-center">
												<a data-toggle="modal" data-target="#delete<?php echo $value['idtransaksi_mutasi'] ?>" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-danger" title="Delete Data"><i class="ace-icon fa fa-trash bigger-120"></i></a>
												<a href="<?= site_url('admin/mutasi/cetak/'.$value['idtransaksi_penempatan']) ?>" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-info" title="Print Data"><i class="ace-icon fa fa-file-pdf-o bigger-120"></i></a>
			                                </td>
										</tr>
										<?php endforeach ?>
	                                    </tbody>
	                                 </table>
	                                 <br/>
	                              <p><b>Remark / Catatan : </b><br/>	</p>
	                              <table class="table table-bordered table-striped">
	                                 <thead>
	                                    <tr>
	                                       <th width="20%">Status Transaksi</th>
	                                       <th>Keterangan</th>
	                                    </tr>
	                                 </thead>
	                                 <tbody>
	                                    <tr>
	                                       <td><span class="label label-warning">Pending</span></td>
	                                       <td><code>Dokumen masih dapat diedit dan membutuhkan persetujuan untuk ditempatkan</code></td>
	                                    </tr>
	                                    <tr>
	                                       <td><span class="label label-success">Accepted</span></td>
	                                       <td><code>Dokumen sudah disetujui namun status penempatan masih bisa diubah</code></td>
	                                    </tr>
	                                    <tr>
	                                       <td><span class="label label-danger">Rejected</span></td>
	                                       <td><code>Dokumen ditolak, semua penempatan akan dihapus dan semua proses tidak tersedia lagi.</code></td>
	                                    </tr>
	                                    <tr>
	                                       <td><span class="label label-info">Closed</span></td>
	                                       <td><code>Dokumen yang sudah selesai, tidak dapat di edit atau dihapus</code></td>
	                                    </tr>
	                                 </tbody>
	                              </table>
	                              </div>
	                           </div>
	                        </div>
	                     </div>
	                  </div>
	                  <!-- /.span -->
	               </div>					
					<!-- MASUKAN MODAL DISINI -->
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
			<?= $this->include('admin/transaksimutasi/modal-delete') ?>
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
<script src=""></script>

<script type="text/javascript">
	jQuery(function($) {
		//initiate dataTables plugin
		var myTable = $('#dynamic-table')
		.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
		.DataTable( {
			bAutoWidth: false,
			"aoColumns": [
			  { "bSortable": false },
			  null, null, null, null, null, null,
			  { "bSortable": false }
			],
			"aaSorting": [],
			// "bProcessing": true,
			// "bServerSide": true,
			//"processing": true, //Feature control the processing indicator.
            //"serverSide": true, //Feature control DataTables' server-side processing mode.

            // Load data for the table's content from an Ajax source
			//,
			//"sScrollY": "200px",
			//"bPaginate": true,
	
			//"sScrollX": "100%",
			"sScrollXInner": "120%",
			"bScrollCollapse": true,
			//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
			//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					
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