<?= $this->extend('admin/layout') ?>
<?= $this->section('head') ?>
<style>
    #form-message-success {
        color: #28a745;
        font-size: 18px;
        font-weight: bold;
}

.chosen-container {
    width: 100% !important;
}
</style>
<?= $this->endSection('') ?>

<?php
$db = \Config\Database::connect();

$dataKode   = buatKode("transaksi_mutasi", "MB");
$dataKode2  = buatKode("transaksi_penempatan", "PB");
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
                    <a href="#">Mutasi</a>
                </li>
                <li class="active">New</li>
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
        

        <form action="<?= site_url('admin/mutasi/create') ?>" method="POST" enctype="multipart/form-data">
         <div class="row">
            <div class="col-xs-12">
               <div class="widget-box">
                  <div class="widget-header">
                     <h4 class="widget-title smaller">
                        <i class="ace-icon fa fa-exchange smaller-80" aria-hidden="true"></i>
                        Form Mutasi Barang
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
                              <tbody>
                                <tr>
                                    <th width="170px" scope="row"><h6>Kode Mutasi</h6></th>
                                    <td>
                                        <input value="<?= $dataKode ?>" type="text" class="form-control input-sm" name="idtransaksi_mutasi" id="idtransaksi_mutasi" placeholder="Kode Mutasi" required="" readonly>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th scope="row"><h6>Kode Penempatan Baru</h6></th>
                                    <td>
                                       <input value="<?= $dataKode2 ?>" type="text" class="form-control" name="idtransaksi_penempatan" id="idtransaksi_penempatan" required="" readonly>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th scope="row"><h6>Tanggal Mutasi</h6></th>
                                    <td><input name="tgl_mutasi" id="tgl_mutasi" value="<?php echo Date('Y-m-d\TH:i:s',time()) ?>" type="datetime-local" class="form-control" placeholder="MM / YY" step="1" required></td>
                                 </tr>
                                 <tr>
                                    <th scope="row"><h6>Jenis Transaksi</h6></th>
                                    <td>
                                       <select class="form-control chosen-select" name="jenis_transaksi" id="jenis_transaksi" required>
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
                                          <?php foreach ($hak as $key => $value): ?>
                                          <option value="<?= $value['id_hak'] ?>"><?= $value['uraian_hak'] ?></option>
                                          <?php endforeach ?>
                                       </select>
                                    </td>
                                 </tr>
                                 <tr>
                                    <th scope="row"><h6>Alasan Mutasi</h6></th>
                                    <td>
                                       <textarea name="alasan_mutasi" id="alasan_mutasi" class="form-control"></textarea>
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
                        
                        <form role="form" action="<?= site_url('admin/mutasitmp/create') ?>" method="POST" enctype="multipart/form-data">
                           <table class="table table-condensed table-bordered input-sm">
                              <tr>
                                 <td colspan="2" bgcolor="#F5F5F5"><strong>INPUT BARANG </strong></td>
                              </tr>
                              <tbody>
                                 <tr>
                                    <th width="150px" scope="row"><h6>Label Barang</h6></th>
                                    <td>
                                       <input type="hidden" id="id" name="id">
                                       <input type="hidden" name="kodemb" id="kodemb" value="<?= $dataKode ?>">
                                       <input type="hidden" name="kodepb" id="kodepb" value="<?= $dataKode2 ?>">
                                       <input type="text" class="form-control input-sm" style="width:45%; display: inline-block;" name="kode_barang" id="kode_barang" onchange="javascript:submitform();" required="" value="<?= old('kode_barang'); ?>" placeholder="Kode Barang">
                                       <input type="text" class="form-control input-sm" style="width:45%; display: inline-block;" name="nup" id="nup" required="" placeholder="NUP">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>&nbsp;</td>
                                    <td><a href="javaScript: void(0)" onclick="window.open('<?= site_url('admin/mutasi/pencarian_barang') ?>','Pencarian Barang','toolbar=yes,scrollbars=yes,resizable=yes,top=30,width=80000,height=80000')" target="_self"><strong>Pencarian Barang</strong></a>, bisa pakai <strong>Qrcode Reader</strong> untuk membaca label barang </td>
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
                                Temp Data Mutasi Barang
                            </h4>
                        
                        <div class="widget-toolbar">
                            <a href="#" data-action="settings">
                                <i class="ace-icon fa fa-cog"></i>
                            </a>

                            <a href="#" data-action="reload">
                                <i class="ace-icon fa fa-refresh"></i>
                            </a>

                            <a href="#" data-action="collapse">
                                <i class="ace-icon fa fa-plus" data-icon-show="fa-plus" data-icon-hide="fa-minus"></i>
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
                                        <div class="table-header">
                                            Temp Data Mutasi Barang
                                        </div>
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
                                                    <th>Lokasi Awal</th>
                                                    <th>Pengguna Sekarang</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $db = \Config\Database::connect();
                                                $tmp = "SELECT * FROM `transaksi_mutasi_tmp` LEFT JOIN `inventaris_peralatan` ON `inventaris_peralatan`.idinventaris_peralatan=`transaksi_mutasi_tmp`.idinventaris_peralatan LEFT JOIN `tweb_pengguna` ON `tweb_pengguna`.id_pengguna=`transaksi_mutasi_tmp`.id_pengguna LEFT JOIN `tweb_lokasi` ON `tweb_lokasi`.id_lokasi=`transaksi_mutasi_tmp`.id_lokasi LEFT JOIN `tweb_gedung` ON `tweb_gedung`.id_gedung=`tweb_lokasi`.id_gedung WHERE `transaksi_mutasi_tmp`.idtransaksi_mutasi LIKE '".$dataKode."' ORDER BY kode_barang ASC, nup ASC";
                                                $query = $db->query($tmp)->getResult();

                                                foreach ($query as $key => $value):
                                                ?>
                                                <tr>
                                                    <td class="center"><?= $key + 1 ?>
                                                    </td>
                                                    <td><?= $value->kode_barang ?></td>
                                                    <td><?= $value->nup ?></td>
                                                    <td><b><?= $value->merk ?></b><br><?= $value->nama_barang ?></td>
                                                    <td><?= $value->nama_gedung . " Lantai " . $value->lantai . " - " . $value->nama_lokasi ?></td>
                                                    <td><?= $value->nama_pengguna ?></td>
                                                    <td class="center">
                                                        <div class="hidden-sm hidden-xs action-buttons">
                                                            <a data-toggle="modal" data-target="#edittmp<?php echo $value->idtransaksi_mutasi_tmp ?>" title="Edit Pengguna Sekarang" class="green" href="#">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>

                                                            <a data-toggle="modal" data-target="#deletetmp<?php echo $value->idtransaksi_mutasi_tmp ?>" title="Hapus Item Mutasi" class="red" href="#">
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
                    <?= $this->include('admin/transaksimutasitmp/modal-edit') ?>
                    <?= $this->include('admin/transaksimutasitmp/modal-delete') ?>
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
<!-- page specific plugin scripts -->
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('') ?>/template/assets/js/chosen.jquery.min.js"></script>
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
        
        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        
        //style the message box
        var defaultCopyAction = myTable.button(1).action();
        myTable.button(1).action(function (e, dt, button, config) {
            defaultCopyAction(e, dt, button, config);
            $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
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