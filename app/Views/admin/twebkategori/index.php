<?= $this->extend('admin/layout') ?>

<?= $this->section('head') ?>
<style type="text/css">
   .Golongan{
      color: #0000FF;
   }

   .Bidang{
      color: #000080;
   }

   .Kelompok{
      color: #800000;
   }

   .SubKelompok{
      color: #FF0080;
   }

   .SubSubKelompok{
      color: #00010E;
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
            <li class="active">Kategori</li>
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
                           <h4 class="widget-title">TWEB ASSET</h4>
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
                              <div id="table_wrapper" class="dataTables_wrapper form-inline no-footer">
                                 <div>
                                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                       <thead>
                                          <tr role="row">
                                             <th class="center" width="5%"> # </th>
                                             <th> Golongan </th>
                                             <th> Bidang </th>
                                             <th> Kelompok </th>
                                             <th> Sub Kelompok </th>
                                             <th> Sub-Sub Kelompok </th>
                                             <th width="40%"> Uraian </th>
                                             <th width="10%">
                                                <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                                Action
                                             </th>
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
                  </div>
                  <!-- /.span -->
               </div>

               <?= $this->include('admin/twebkategori/modal-add') ?>
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
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.flash.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.html5.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.print.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/dataTables.select.min.js"></script>
<script type="text/javascript">
   $(document).on('shown.bs.modal', function (e) {
        $('[autofocus]', e.target).focus();
      });

   jQuery(function($) {
      var columns = [
        { "mDataProp": "no","className": "text-center","bSortable": false },
        { "mDataProp": "golongan", "className": "text-center"},
        { "mDataProp": "bidang", "className": "text-center"},
        { "mDataProp": "kelompok", "className": "text-center"},
        { "mDataProp": "sub_kelompok", "className": "text-center"},
        { "mDataProp": "sub_sub_kelompok", "className": "text-center"},
        { "mDataProp": "uraian"},
        { "mDataProp": "action","className": "text-center","bSortable": false},
        ];

      //initiate dataTables plugin
      var myTable = $('#dynamic-table')
      //.wrap("<div class='dataTables_borderWrap' />")
      .DataTable( {
         bAutoWidth: false,
         "aoColumns": columns,
         order: [],
         "aaSorting": [],
         drawCallback: function () {
            $('[rel="tooltip"]').tooltip({trigger: "hover"});
         },
         "bServerSide": true,
         "ajax": {
            "url": "<?php echo site_url('admin/kategori/DI_tweb_asset'); ?>",
            "type": "POST"
         },
         error: function (request, status, error) {
            alert(request.responseText);
         },
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