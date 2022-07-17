<script type="text/javascript">
   $(document).on('shown.bs.modal', function (e) {
        $('[autofocus]', e.target).focus();
      });

   jQuery(function($) {
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

      var columns = [
        { "mDataProp": "no","className": "text-center","bSortable": false },
        { "mDataProp": "kode_barang","className": "text-center"},
        { "mDataProp": "nup","className": "text-center"},
        { "mDataProp": "nama_barang"},
        { "mDataProp": "kuantitas"},
        { "mDataProp": "tgl_perolehan","className": "text-center","bSortable": false},
        { "mDataProp": "id_perolehan","className": "text-center","bSortable": false},
        { "mDataProp": "tercatat","className": "text-center"},
        { "mDataProp": "uraian_kondisi","className": "text-center"},
        { "mDataProp": "nilai_perolehan","bSortable": false},
        { "mDataProp": "action","className": "text-center","bSortable": false},
        ];
      
      //initiate dataTables plugin
      var myTable = $('#dynamic-table')
      .wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
      .DataTable( {
         bAutoWidth: false,
         "aoColumns": columns,
         order: [],
         drawCallback: function () {
            $('[rel="tooltip"]').tooltip({trigger: "hover"});
         },
         "bServerSide": true,
         "ajax": {
            "url": "<?php echo site_url('admin/DI_inventaris_asset'); ?>",
            "deferRender": true
         },
         error: function (request, status, error) {
            alert(request.responseText);
         },
         "sScrollX": "100%",
         "sScrollXInner": "120%",
         "bScrollCollapse": true,
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