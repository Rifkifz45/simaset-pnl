<?= $this->extend('admin/layout') ?>
<?= $this->section('head') ?>
<style>
   #form-message-success {
   color: #28a745;
   font-size: 18px;
   font-weight: bold;
   }

</style>
<?= $this->endSection('') ?>
<?php
   $db = \Config\Database::connect();
   
   $dataKode   = buatKode("transaksi_penempatan", "PB");
   //include "btnsimpan.php";
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
               <a href="<?= site_url('admin/penempatan') ?>">Penempatan</a>
            </li>
            <li class="active">Add</li>
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
         <?php if (!empty(session()->getFlashdata('error'))) : ?>
         <div class="row">
            <div class="col-xs-12">
               <div class="alert alert-block alert-danger">
                  <button type="button" class="close" data-dismiss="alert">
                  <i class="ace-icon fa fa-times"></i>
                  </button>
                  <p>
                     <strong>
                     <i class="ace-icon fa fa-times"></i>
                     Failed!
                     </strong>
                     <?= session()->getFlashdata('error') ?>
                  </p>
               </div>
            </div>
         </div>
         <?php endif; ?>
         <form id="my-form" action="<?= site_url('admin/penempatan/create') ?>" method="POST" enctype="multipart/form-data">
         <div class="row">
            <div class="col-xs-12">
               <div class="widget-box">
                  <div class="widget-header">
                     <h4 class="widget-title smaller">
                        <i class="ace-icon fa fa-exchange smaller-80" aria-hidden="true"></i>
                        Form Penempatan Barang
                     </h4>
                     <div class="widget-toolbar">
                        <div class="pull-right" style="margin-left: 15px;">
                           <button type="submit" type="button" class="btn btn-sm btn-primary">
                              <i class="ace-icon fa fa-save"></i> Save Changes
                           </button>
                        </div>
                     </div>
                  </div>
                  <div class="widget-body">
                     <div class="widget-main">
                           <table class="table table-condensed table-bordered input-sm">
                              <tr>
                                 <td colspan="2" bgcolor="#F5F5F5"><strong>DATA PENEMPATAN</strong></td>
                              </tr>
                              <tbody>
                                 <tr>
                                    <th width="150px" scope="row"><h6>Kode Penempatan</h6></th>
                                    <td>
                                       <input value="<?= $dataKode ?>" type="text" class="form-control input-sm" name=" idtransaksi_penempatan" id=" idtransaksi_penempatan" placeholder="Kode Penempatan" required="" readonly>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th scope="row"><h6>Tanggal Penempatan</h6></th>
                                    <td><input name="tgl_penempatan" id="tgl_penempatan" value="<?php echo Date('Y-m-d\TH:i:s',time()) ?>" type="datetime-local" class="form-control input-sm" name="Expiry" placeholder="MM / YY" step="1" required></td>
                                 </tr>
                                 <tr>
                                    <th scope="row"><h6>Jenis Transaksi</h6></th>
                                    <td>
                                       <select name="jenis_transaksi" class="form-control chosen-select" id="form-field-select-3" data-placeholder="Choose a type..." required>
                                          <option value="DBR">DBR</option>
                                          <option value="DBL">DBL</option>
                                       </select>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th scope="row"><h6>Gedung</h6></th>
                                    <td>
                                       <select class="form-control chosen-select" name="id_gedung" id="id_gedung" required>
                                          <option value="" selected disabled> Pilih Gedung </option>
                                          <?php foreach ($gedung as $key => $value): ?>
                                          <option value="<?= $value['id_gedung'] ?>"><?= $value['nama_gedung'] ?></option>
                                          <?php endforeach ?>
                                       </select>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th scope="row"><h6>Lokasi</h6></th>
                                    <td>
                                       <select name="id_lokasi" id="id_lokasi" class="form-control chosen-select" required="required">
                                          <option value="">....</option>
                                       </select>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th scope="row"><h6>Penguasaan</h6></th>
                                    <td>
                                       <select class="form-control chosen-select" name="id_hak" id="id_hak" required>
                                          <option selected disabled value=""> Pilih Hak </option>
                                          <?php foreach ($hak as $key => $value): ?>
                                          <option value="<?= $value['id_hak'] ?>"><?= $value['uraian_hak'] ?></option>
                                          <?php endforeach ?>
                                       </select>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th scope="row"><h6>Keterangan</h6></th>
                                    <td>
                                       <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th scope="row"><h6>Berita Acara</h6></th>
                                    <td>
                                       <input accept=".pdf" type="file" id="id-input-file-2" name="dokumen" />
                                       <br>
                                       <p><sup>*</sup>Pastikan File bertipe PDF dengan ukuran < 2 MB</p>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </form>
                        <hr>
                        <form role="form" action="<?= site_url('admin/penempatantmp/create') ?>" method="POST" enctype="multipart/form-data">
                           <table class="table table-condensed table-bordered input-sm">
                              <tr>
                                 <td colspan="2" bgcolor="#F5F5F5"><strong>INPUT BARANG </strong></td>
                              </tr>
                              <tbody>
                                 <tr>
                                    <th width="150px" scope="row"><h6>Kode Barang</h6></th>
                                    <td>
                                       <input type="hidden" id="id" name="id">
                                       <input type="hidden" name="kode" id="kode" value="<?= $dataKode ?>">
                                       <input type="text" class="form-control input-sm" style="width:45%; display: inline-block;" name="kode_barang" id="kode_barang" onchange="javascript:submitform();" required="" value="<?= old('kode_barang'); ?>" placeholder="Kode Barang">
                                       <input type="text" class="form-control input-sm" style="width:45%; display: inline-block;" name="nup" id="nup" required="" placeholder="NUP">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>&nbsp;</td>
                                    <td><a href="javaScript: void(0)" onclick="window.open('<?= site_url('admin/penempatan/pencarian_barang') ?>','Pencarian Barang','toolbar=yes,scrollbars=yes,resizable=yes,top=30,width=80000,height=80000')" target="_self"><strong>Pencarian Barang</strong></a>, bisa pakai <strong>Barcode Reader</strong> untuk membaca label barang </td>
                                 </tr>
                                 <tr>
                                    <th scope="row">
                                       <h6>Nama Barang</h6>
                                    </th>
                                    <td>
                                       <input type="text" class="form-control input-sm" name="nama_barang"  id="nama_barang" required="" disabled>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th scope="row">
                                       <h6>Pengguna</h6>
                                    </th>
                                    <td>
                                       <select class="form-control chosen-select" name="id_pengguna" id="id_pengguna">
                                          <option disabled selected value=""> Pilih Pengguna </option>
                                          <?php foreach ($pengguna as $key => $value): ?>
                                          <option value="<?= $value['id_pengguna'] ?>"><?= $value['nama_pengguna'] ?></option>
                                          <?php endforeach ?>
                                       </select>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th scope="row">
                                    </th>
                                    <td>
                                       <input name="btnTambah" class="btn btn-sm btn-primary" type="submit" style="cursor:pointer;" value=" Tambah " />
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.span -->
         </div>
         <div class="space-2"></div>
         <!-- SESSION TEMP BARANG -->
         <?php if (!empty(session()->getFlashdata('pesantmp'))) : ?>
         <div class="space-2"></div>
         <div class="alert alert-block alert-danger" style="margin-bottom: 0;">
            <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
            </button>
            <i class="ace-icon fa fa-times red2"></i>
            <?= session()->getFlashdata('pesantmp') ?>
         </div>
         <div class="space-2"></div>
         <?php endif; ?>
         <?php if (!empty(session()->getFlashdata('pesanberhasil'))) : ?>
         <div class="space-2"></div>
         <div class="alert alert-block alert-success" style="margin-bottom: 0;">
            <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
            </button>
            <i class="ace-icon fa fa-check green"></i>
            <?= session()->getFlashdata('pesanberhasil') ?>
         </div>
         <div class="space-2"></div>
         <?php endif; ?>
         <!-- END SESSION TEMP BARANG -->
         <div class="row">
            <div class="col-sm-12">
               <div class="widget-box">
                  <div class="widget-header widget-header-flat">
                     <h4 class="widget-title smaller">
                        <i class="ace-icon fa fa-exchange smaller-80" aria-hidden="true"></i>
                        Temp Data Penempatan Barang
                     </h4>
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
                        <div class="row">
                           <div class="col-md-12">
                              <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                 <thead>
                                    <tr>
                                       <th class="center">
                                          #
                                       </th>
                                       <th>Kode Barang</th>
                                       <th class="hidden-480">NUP</th>
                                       <th>
                                          <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                          Nama Barang
                                       </th>
                                       <th>Merk</th>
                                       <th>Pengguna</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $db = \Config\Database::connect();
                                       $tmp = "SELECT * FROM `transaksi_penempatan_tmp` LEFT JOIN `inventaris_peralatan` ON `inventaris_peralatan`.idinventaris_peralatan=`transaksi_penempatan_tmp`.inventaris_peralatan_id LEFT JOIN `tweb_pengguna` ON `tweb_pengguna`.id_pengguna=`transaksi_penempatan_tmp`.id_pengguna WHERE `transaksi_penempatan_tmp`.idtransaksi_penempatan LIKE '".$dataKode."' ORDER BY kode_barang ASC, nup ASC";
                                       $query = $db->query($tmp)->getResult();
                                       
                                       foreach ($query as $key => $value):
                                       ?>
                                    <tr>
                                       <td class="center"><?= $key + 1 ?>
                                       </td>
                                       <td><?= $value->kode_barang ?></td>
                                       <td><?= $value->nup ?></td>
                                       <td><?= $value->nama_barang ?></td>
                                       <td><?= $value->merk ?></td>
                                       <td><?= $value->nama_pengguna ?></td>
                                       <td class="center">
                                          <div class="action-buttons">
                                             <a data-toggle="modal" data-target="#edittmp<?php echo $value->idtransaksi_penempatan_tmp ?>" title="Edit" class="green" href="#">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                             </a>

                                             <a data-toggle="modal" data-target="#deletetmp<?php echo $value->idtransaksi_penempatan_tmp ?>" title="Delete" class="red" href="#">
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
               <?= $this->include('admin/transaksipenempatantmp/modal-edit') ?>
               <?= $this->include('admin/transaksipenempatantmp/modal-delete') ?>
            </div>
         </div>
         <!-- /.page-header -->
         <!-- TABLE -->
         <!-- /.row -->
      </div>
      <!-- /.page-content -->
   </div>
</div>
<!-- /.main-content -->
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="<?= base_url('') ?>/template/assets/css/dist/js/select2.min.js"></script>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<!-- page specific plugin scripts -->
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/chosen.jquery.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/autosize.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.flash.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.html5.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.print.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/dataTables.select.min.js"></script>
<script type="text/javascript">
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
   
       $('#id_gedung').change(function(){
           var gedung_id = $('#id_gedung').val();
   
           $.ajax({
               url:"<?php echo site_url('admin/penempatan/getruangan'); ?>",
               method:"POST",
               data:{gedung_id:gedung_id},
               dataType:"JSON",
               success:function(data){
                   var html = "";
                   var i;
                   for (var i = 0; i < data.length; i++) {
                       html += '<option value="'+data[i].id_lokasi+'">'+data[i].nama_lokasi +'</option>';
                   };
   
                   $('#id_lokasi').html(html).trigger('chosen:updated');
               },
           });
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