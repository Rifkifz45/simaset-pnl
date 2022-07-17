<?= $this->extend('admin/layout') ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/dist/css/select2.css" />
<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/dist/css/select2-bootstrap.css" />
<style>
   .leaflet-container {
   font-size: 12px;
   }
   .custom .leaflet-popup-tip,
   .custom .leaflet-popup-content-wrapper {
   background:rgb(255, 255, 255, 0.90);
   color: white;
   padding: 0 0 0 0; /*Deleted top and bottom white sides!*/
   }
   .center {
   display: block;
   margin-left: auto;
   margin-right: auto;
   width: 30%;
   }
</style>
<?= $this->endSection('') ?>

<?= $this->section('content') ?>
<?php
$id_pengguna = 0;
?>

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
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class='row'>
					   <div class='col-xs-7'>
					      <form id="validation-form" action="<?= site_url('admin/gedung/update') ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
					         <div class='widget-box'>
					            <div class='widget-header'>
					               <h4 class='widget-title'>EDIT DATA GEDUNG</h4>
					               <div class='widget-toolbar'>
					                  <button class='btn btn-minier btn-primary' type='submit' name='submit'><i class='ace-icon fa fa-save'></i>Update </button>
					                  <button class='btn btn-minier btn-info' onclick='self.history.back()'><i class='ace-icon fa fa-undo'></i>Back</button>
					                  <a href='#' data-action='collapse'>
					                  <i class='ace-icon fa fa-chevron-up'></i>
					                  </a>
					               </div>
					            </div>
					            <div class='widget-body'>
					               <div class='widget-main'>
					                  <table class='table table-condensed table-bordered input-sm'>
					                     <tbody>
					                        <tr>
					                           <th width='120px' scope='row'>Kode Gedung</th>
					                           <td><input type="hidden" id="foto_gedung_lama" name="foto_gedung_lama" value="<?= $gedung['foto_gedung'] ?>">
					                           	<input type="text" id="id_gedung" name="id_gedung" required placeholder=" Kode Gedung" value="<?= $gedung['id_gedung'] ?>" class="form-control" readonly>
					                           </td>
					                        </tr>
					                        <tr>
					                           <th scope='row'>Nama Gedung</th>
					                           <td>
					                           	<input onfocus="this.setSelectionRange(this.value.length,this.value.length);" autofocus id="nama_gedung" type="text" name="nama_gedung" value="<?= $gedung['nama_gedung'] ?>" required placeholder=" Masukan Nama Gedung" class="form-control">
					                           </td>
					                        </tr>
					                        <tr>
					                           <th scope='row'>Latitude</th>
					                           <td>
					                           	<input id="latitude" type="text" name="latitude" required placeholder=" Masukan Latitude" value="<?= $gedung['latitude'] ?>" class="form-control">
					                           </td>
					                        </tr>
					                        <tr>
					                           <th scope='row'>Longitude</th>
					                           <td>
					                           	<input id="longitude" type="text" value="<?= $gedung['longitude'] ?>" name="longitude" required placeholder=" Masukan Longitude" class="form-control">
					                           </td>
					                        </tr>
					                        <tr>
					                           <th scope='row'>Keterangan</th>
					                           <td>
					                           	<textarea placeholder="Keterangan" class="form-control" name="keterangan" id="keterangan"><?= $gedung['keterangan'] ?></textarea>
					                           </td>
					                        </tr>
					                        <tr>
					                           <th scope='row'>Penanggung Jawab</th>
					                           <td>
					                              <select class="form-control" name="id_pengguna" id="id_pengguna" style="width:100%">
														<option value="" disabled selected>Pilih Penanggung Jawab:</option>
														<?php foreach ($pengguna as $key => $pb): ?>
														<option value="<?= $pb['id_pengguna'] ?>" <?= $gedung['id_pengguna'] == $pb['id_pengguna'] ? "selected" : null ?>><?= $pb['nama_pengguna'] ?></option>
														<?php endforeach ?>
													</select>
					                           </td>
					                        </tr>
					                         <tr>
					                           <th scope='row'>Ganti Gambar</th>
					                           <td>
					                              <input type="file" id="id-input-file-2" name="foto_gedung" accept=".jpg,.png" /><div id="foto-error" class="help-block">Jika anda mengganti gambar gedung ini. Gambar gedung awal akan dihapus dan tidak tersedia lagi!</div>
					                           </td>
					                        </tr>
					                     </tbody>
					                  </table>
					               </div>
					            </div>
					         </div>
					      </form>
					   </div>
					   <div class='col-xs-5'>
					         <div class='widget-box'>
					            <div class='widget-header'>
					               <h4 class='widget-title'>MAP</h4>
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
					            <div class='widget-body'>
					               <div class='widget-main'>
					                  <div id="map" style="width: 100%; height: 400px;"></div>
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
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/css/dist/js/select2.min.js"></script>
<script>
	var latInput = document.querySelector("[name=latitude]");
	var lngInput = document.querySelector("[name=longitude]");
	var marker;

	var map = L.map('map').setView([5.1196371, 97.1566789], 17);

	var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
	    maxZoom: 21,
	    subdomains:['mt0','mt1','mt2','mt3']
	}).addTo(map);

	marker = L.marker([<?= $gedung['latitude'] ?>, <?= $gedung['longitude'] ?>]).addTo(map);

	map.on('click', function(e){
		var lat = e.latlng.lat;
		var lng = e.latlng.lng;

		if (!marker) {
			marker = L.marker(e.latlng).addTo(map);
		}else{
			marker.setLatLng(e.latlng);
		}

		latInput.value = lat;
		lngInput.value = lng;
	});
</script>

<script type="text/javascript">
	jQuery(function($) {
		$("#id_pengguna").select2({
		    theme: "bootstrap"
		});

		$('#id-input-file-1 , #id-input-file-2').ace_file_input({
			no_file:'No File ...',
			btn_choose:'Choose',
			btn_change:'Change',
			droppable:false,
			onchange:null,
			thumbnail:false //| true | large
			//whitelist:'gif|png|jpg|jpeg'
			//blacklist:'exe|php'
			//onchange:''
			//
		});
		
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