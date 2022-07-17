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
					<a href="#">Other Pages</a>
				</li>
				<li class="active">Blank Page</li>
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
					Widgets
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Draggabble Widget Boxes with Persistent Position and State
					</small>
				</h1>
			</div><!-- /.page-header -->
			<div class="row">
      <div id="user-profile-1" class="user-profile row">
         <div class="col-xs-12 col-sm-12">
            <div class="profile-user-info profile-user-info-striped">
               <div class="profile-info-row">
                  <div class="profile-info-name"> Kode </div>
                  <div class="profile-info-value">
                     <span class="editable editable-click" id="username"><?= $detail['golongan'] . "" . $detail['bidang'] . "" . $detail['kelompok'] . "" . $detail['sub_kelompok'] . "" . $detail['sub_sub_kelompok'] ?></span>
                  </div>
               </div>
               <div class="profile-info-row">
                  <div class="profile-info-name"> Nama </div>
                  <div class="profile-info-value">
                     <span class="editable editable-click" id="age">Data <?= $detail['uraian'] ?></span>
                  </div>
               </div>
               <div class="profile-info-row">
                  <div class="profile-info-name"> Kategori </div>
                  <div class="profile-info-value">
                     <span class="editable editable-click" id="age">
                     Kategori 
                     <?php
                        if ($detail['golongan'] == 2) {
                        	echo "Tanah";
                        }else if ($detail['golongan'] == 3) {
                        	echo "Peralatan dan Mesin";
                        }else if ($detail['golongan'] == 4) {
                        	echo "Gedung dan Bangunan";
                        }else if ($detail['golongan'] == 5) {
                        	echo "Jalan, Irigasi dan Jembatan";
                        }else if ($detail['golongan'] == 6) {
                        	echo "Aset Tetap Lainnya";
                        }else if ($detail['golongan'] == 7) {
                        	echo "Konstruksi Dalam Pengerjaan";
                        }else if ($detail['golongan'] == 8) {
                        	echo "Aset Tak Berwujud";
                        }else{
                        	echo "None";
                        }
                        ?>
                     </span>
                  </div>
               </div>
               <div class="profile-info-row">
                  <div class="profile-info-name"> Jumlah </div>
                  <div class="profile-info-value">
                     <span class="editable editable-click" id="age">
                     <?php
                        $db = \Config\Database::connect();
                        if ($detail['golongan'] == 2) {
                        	$inv_tanah = $db->table('inventaris_tanah')->where('idtweb_asset', $detail['idtweb_asset']);
                        	echo $inv_tanah->countAllResults();
                        } else if ($detail['golongan'] == 3) {
                        	$inv_prl = $db->table('inventaris_peralatan')->where('idtweb_asset', $detail['idtweb_asset']);
                        	echo $inv_prl->countAllResults();
                        } else if ($detail['golongan'] == 4) {
                        	$inv_jalan = $db->table('inventaris_gedung')->where('idtweb_asset', $detail['idtweb_asset']);
                        	echo $inv_jalan->countAllResults();
                        } else if ($detail['golongan'] == 5) {
                        	$inv_jalan = $db->table('inventaris_jalan')->where('idtweb_asset', $detail['idtweb_asset']);
                        	echo $inv_jalan->countAllResults();
                        } else if ($detail['golongan'] == 6) {
                        	$inv_jalan = $db->table('inventaris_asset')->where('idtweb_asset', $detail['idtweb_asset']);
                        	echo $inv_jalan->countAllResults();
                        } else if ($detail['golongan'] == 7) {
                        	$inv_jalan = $db->table('inventaris_konstruksi')->where('idtweb_asset', $detail['idtweb_asset']);
                        	echo $inv_jalan->countAllResults();
                        } else if ($detail['golongan'] == 8) {
                        	$inv_jalan = $db->table('inventaris_takberwujud')->where('idtweb_asset', $detail['idtweb_asset']);
                        	echo $inv_jalan->countAllResults();
                        } else{
                        	echo "None";
                        }
                        ?>
                     </span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="space-8"></div>
		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				<div class="row">
		            <div class="col-xs-12">
		               <!-- PAGE CONTENT BEGINS -->
		               <div class="clearfix">
		                  <div class="pull-right tableTools-container"></div>
		               </div>
		               <div class="space-4"></div>
		               <div class="table-header">
		                  <span class="text-left"> Data Lokasi Tersedia</span>
		               </div>
		               <div>
		                  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
		                     <thead>
		                        <tr>
		                           <th class="center"> # </th>
		                           <th> Kode Barang </th>
		                           <th> NUP </th>
		                           <th> Nama Barang </th>
		                           <th> Terdaftar </th>
		                           <th> Lokasi </th>
		                           <th> Pengguna </th>
		                           <th>
		                              <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
		                              Action
		                           </th>
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
						        </tr>
		                     </thead>
		                     <tbody>
		                        
		                     </tbody>
		                  </table>
		               </div>
		               <!-- PAGE CONTENT ENDS -->
		            </div>
		            <!-- /.col -->
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
        { "mDataProp": "tercatat","className": "text-center"},
        { "mDataProp": "lokasi","className": "text-center"},
        { "mDataProp": "pengguna","className": "text-center"},
        { "mDataProp": "action","className": "text-center","bSortable": false},
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