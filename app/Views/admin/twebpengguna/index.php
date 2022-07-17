<?= $this->extend('admin/layout') ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="<?= base_url('') ?>/magnific/dist/magnific-popup.css">
<style>
	.chosen-container {
    width: 100% !important;
}
</style>
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
				<li class="active">Pengguna</li>
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
			<div class="space-6"></div>
			<div class="row">  
          <div class="col-md-6">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-6">
                              <i class="ace-icon glyphicon glyphicon-bookmark fa-4x"></i>
                          </div>
                          <div class="col-xs-6 text-right">
                              <p class="announcement-heading" style="font-weight: bold; font-size: 24px; margin-bottom: 0px;"><?= count($kategori) ?></p>
                              <p class="announcement-text">Total Kategori Pengguna</p>
                          </div>
                      </div>
                  </div>
                  <a href="<?= site_url('admin/pengguna-kategori') ?>">
                      <div class="panel-footer announcement-bottom">
                          <div class="row">
                              <div class="col-xs-6">View</div>
                              <div class="col-xs-6 text-right">
                                  <i class="fa fa-arrow-circle-right"></i>
                              </div>
                          </div>
                      </div>
                  </a>
              </div>
          </div> 
          <div class="col-md-6">
              <div class="panel panel-success">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-6">
                              <i class="ace-icon glyphicon glyphicon-user fa-4x"></i>
                          </div>
                          <div class="col-xs-6 text-right">
                              <p class="announcement-heading" style="font-weight: bold; font-size: 24px; margin-bottom: 0px;"><?= count($pengguna) ?></p>
                              <p class="announcement-text">Total Pengguna</p>
                          </div>
                      </div>
                  </div>
                  <a href="<?= site_url('admin/pengguna') ?>">
                      <div class="panel-footer announcement-bottom">
                          <div class="row">
                              <div class="col-xs-6">View</div>
                              <div class="col-xs-6 text-right">
                                  <i class="fa fa-arrow-circle-right"></i>
                              </div>
                          </div>
                      </div>
                  </a>
              </div>
          </div> 
     </div>

			<!-- /.page-header -->
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
                     <h4 class="widget-title">TWEB PENGGUNA</h4>
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
																<th> Nama </th>
																<th> Kategori </th>
																<th> Pangkat / Golongan </th>
																<th> Jabatan </th>
																<th> Foto </th>
																<th>
																	<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
																	Action
																</th>
															</tr>
														</thead>
                           <tbody>
                           <?php foreach ($detail as $key => $value): ?>
													<tr>
														<td class="center">
															<?= $key + 1 ?>
														</td>
														<td><?= $value->nama_pengguna ?><br>(<b><?= $value->nip ?></b>)</td>
														<td><?= $value->id_kategori_pengguna != "" ? $value->nama_kategori_pengguna : "<i>NULL</i>" ?></td>
														<td><?= $value->pangkat ?><br><b><?= $value->golongan ?></b></td>
														<td><?= $value->jabatan ?></td>
														<td class="center">
															<a href="<?= site_url('uploads/pengguna/'.$value->foto_pengguna) ?>" class="image-link">
															   <img width="100px" src="<?= site_url('uploads/pengguna/'.$value->foto_pengguna) ?>" />
															</a>
														</td>
														<td class="center">
                                <div class="action-buttons">
                                   <a data-toggle="modal" data-target="#edit<?= $value->id_pengguna ?>" title="Edit" class="green" href="#">
                                      <i class="ace-icon fa fa-pencil bigger-130"></i>
                                   </a>

                                   <a data-toggle="modal" data-target="#delete<?= $value->id_pengguna ?>" title="Delete" class="red" href="#">
                                      <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                   </a>
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
					<?= $this->include('admin/twebpengguna/modal-add') ?>
					<?= $this->include('admin/twebpengguna/modal-edit') ?>
					<?= $this->include('admin/twebpengguna/modal-delete') ?>
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
<!-- page specific plugin scripts -->
<script src="<?= base_url('') ?>/template/assets/js/chosen.jquery.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.flash.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.html5.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.print.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/dataTables.select.min.js"></script>
<script src="<?= base_url('') ?>/magnific/dist/jquery.magnific-popup.js"></script>
<script type="text/javascript">
	$(document).on('shown.bs.modal', function (e) {
        $('[autofocus]', e.target).focus();
      });

	jQuery(function($) {

		if(!ace.vars['touch']) {
           $('.chosen-select').chosen({allow_single_deselect:true}); 
           //resize the chosen on window resize
   
           $(window)
           .off('resize.chosen')
           .on('resize.chosen', function() {
               $('.chosen-select').each(function() {
                    var $this = $(this);
                    $this.next().css({'width': $this.parent().width()});
               })
           }).trigger('resize.chosen');
           //resize chosen on sidebar collapse/expand
           $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
               if(event_name != 'sidebar_collapsed') return;
               $('.chosen-select').each(function() {
                    var $this = $(this);
                    $this.next().css({'width': $this.parent().width()});
               })
           });
       }

		$('.image-link').magnificPopup({
			type: 'image',
			mainClass: 'mfp-with-zoom', // this class is for CSS animation below

			zoom: {
			enabled: true, // By default it's false, so don't forget to enable it
			duration: 300, // duration of the effect, in milliseconds
			easing: 'ease-in-out', // CSS transition easing function

    // The "opener" function should return the element from which popup will be zoomed in
    // and to which popup will be scaled down
    // By defailt it looks for an image tag:
    opener: function(openerElement) {
      // openerElement is the element on which popup was initialized, in this case its <a> tag
      // you don't need to add "opener" option if this code matches your needs, it's defailt one.
      return openerElement.is('img') ? openerElement : openerElement.find('img');
    }
  }

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
			  null, null, null, null, null,
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