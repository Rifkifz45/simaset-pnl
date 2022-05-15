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
         "aaSorting": [],
         drawCallback: function () {
            $('[rel="tooltip"]').tooltip({trigger: "hover"});
         },
         "bProcessing": true,
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

      <?php if (!empty(session()->getFlashdata('pesan'))) : ?>
       swal({
         title: "Success!",
         text: "<?= session()->getFlashdata('pesan') ?>",
         icon: "success",
         button: "Close",
      });
      <?php endif; ?>
   })
</script>