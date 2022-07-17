<?= $this->extend('approver/layout') ?>

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
					<a href="<?= site_url('approver/statistik-group') ?>">Statistik</a>
				</li>
				<li class="active"><?= $detail['golongan'] . "" . $detail['bidang'] . "" . $detail['kelompok'] . "" . $detail['sub_kelompok'] . "" . $detail['sub_sub_kelompok'] ?></li>
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
			<div class="space-6"></div>
			

			<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				<div class="row">
               <div class="col-xs-12">
                  <div class="widget-box">
                     <div class="widget-header">
                        <h4 class="widget-title">Detail Data <?= $detail['uraian'] ?></h4>
                        <div class="widget-toolbar">
									<a href="#" data-action="fullscreen" class="orange2">
										<i class="ace-icon fa fa-expand"></i>
									</a>

									<a href="#" data-action="reload">
										<i class="ace-icon fa fa-refresh"></i>
									</a>

									<a href="#" data-action="collapse">
										<i class="ace-icon fa fa-chevron-up"></i>
									</a>

									<a href="#" data-action="close">
										<i class="ace-icon fa fa-times"></i>
									</a>
								</div>
                     </div>
                     <div class="widget-body">
                        <div class="widget-main">
                           <div>
                              <table id="dynamic-table" class="table table-striped table-bordered dataTable no-footer">
                              <thead>
			                        <tr>
			                           <th class="center"> # </th>
			                           <th> Kode Barang </th>
			                           <th> NUP </th>
			                           <th> Nama Barang </th>
			                           <th> Luas Tanah (m<sup>2</sup>) </th>
			                           <th> Tgl Perolehan </th>
			                           <th> Alamat </th>
			                           <th> Kondisi </th>
			                           <th> Nilai Asset </th>
			                        </tr>
			                        <tr>
								            <th class=""></th>
								            <th class="filterhead"></th>
								            <th class="filterhead"></th>
								            <th class="filterhead"></th>
								            <th class=""></th>
								            <th class=""></th>
								            <th class=""></th>
								            <th class=""></th>
								            <th class=""></th>
								        </tr>
			                     </thead>
                              <tbody>
                                 
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
	</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<!-- page specific plugin scripts -->
<script src="<?= base_url('') ?>/template/assets/css/dist/js/select2.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.flash.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.html5.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.print.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('') ?>/magnific/dist/jquery.magnific-popup.js"></script>
<script type="text/javascript">
   jQuery(function($) {	
   	var columns = [
        { "mDataProp": "no","className": "text-center","bSortable": false },
        { "mDataProp": "kode_barang","className": "text-center"},
        { "mDataProp": "nup","className": "text-center"},
        { "mDataProp": "nama_barang","className": "text-center"},
        { "mDataProp": "luas_tanah_seluruhnya","className": "text-center"},
        { "mDataProp": "tgl_perolehan","className": "text-center"},
        { "mDataProp": "alamat","className": "text-center"},
        { "mDataProp": "kondisi","className": "text-center"},
        { "mDataProp": "nilai_perolehan","className": "text-center"},
        ];

   	$(document).on('shown.bs.modal', function (e) {
          $('[autofocus]', e.target).focus();
        });
   
   	//initiate dataTables plugin
   	var myTable = $('#dynamic-table')
   	//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
   	.DataTable( {
   		bAutoWidth: false,
   		"aoColumns": columns,
   		"aaSorting": [],
   		orderCellsTop: true,
   		drawCallback: function () {
   			$('[rel="tooltip"]').tooltip({trigger: "hover"});
   		},
   		"bServerSide": true,
			"ajax": {
            "url": "<?php echo $barang; ?>",
            "deferRender": true
        },
         error: function (request, status, error) {
            alert(request.responseText);
         },
   		initComplete: function( settings, json ) 
        {

            var indexColumn = -1;

            this.api().columns().every(function () 
            {
                
                var column      = this;
                var input       = document.createElement("input");
                
                $(input).attr( 'placeholder', 'Search' )
                        .addClass('form-control form-control-sm')
                        .css('width', '120px')
                        .appendTo( $('.filterhead:eq('+indexColumn+')').empty() )
                        .on('keyup', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });

                indexColumn++;
            });
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