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
				<li class="active">Set Token</li>
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
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<?php if (!empty(session()->getFlashdata('pesan'))) : ?>
	               <div class="row">
	                  <div class="col-xs-12"> 
	                     <div class="alert alert-block alert-success">
	                        <button type="button" class="close" data-dismiss="alert">
	                           <i class="ace-icon fa fa-times"></i>
	                        </button>
	                        <p>
	                           <strong>
	                              <i class="ace-icon fa fa-check"></i>
	                              Well done!
	                           </strong>
	                           <?= session()->getFlashdata('pesan') ?>
	                        </p>
	                     </div>
	                  </div>
	               </div>
	               <?php endif; ?>
					<div class="row">
	                  <div class="col-xs-12">
	                     <div class="widget-box">
	                        <div class="widget-header">
	                           <h4 class="widget-title">SET TOKEN</h4>
	                           <div class="widget-toolbar">
	                           	<div class="pull-right" style="margin-left: 15px;">
                                 <button data-toggle="modal" data-target="#add" type="button" class="btn btn-sm btn-primary">
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
	                                          <th> Kategori </th>
	                                          <th> Token </th>
	                                          <th>
	                                             <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
	                                             Action
	                                          </th>
	                                       </tr>
	                                    </thead>
	                                    <tbody>
	                                       <?php
	                                       $db = \Config\Database::connect();
	                                       $token = $db->table('set_token')->get()->getResultArray();
	                                       ?>

	                                       <?php foreach ($token as $key => $value): ?>
	                                       <tr>
	                                          <td class="center">
	                                             <?= $key + 1 ?>
	                                          </td>
	                                          <td><?= $value['kategori'] == 1 ? "Detail Product" : "Print Daftar Barang Ruangan" ?></td>
	                                          <td><?= $value['token'] ?></td>
	                                          <td class="center">
	                                             <div class="btn-group action-buttons">
	                                             	<a data-toggle="modal" data-target="#edit<?= $value['id'] ?>" title="Edit" href="javascript:void(0)" title="Edit"><i class="fa fa-edit bigger-130"></i></a>
	                                                <a href="<?= site_url('admin/token/reset/'.$value['id']) ?>" onclick="return confirm('Token akan direset?')" title="Reset" href="javascript:void(0)" title="Edit"><i class="fa fa-refresh bigger-130"></i></a>
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
	                  <!-- /.span -->
	               </div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
			<?= $this->include('admin/token/modal-add') ?>
			<?= $this->include('admin/token/modal-edit') ?>
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
			  null, null,
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