<?= $this->extend('admin/layout') ?>
<?= $this->section('head') ?>
<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/dist/css/select2.css" />
<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/dist/css/select2-bootstrap.css" />
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
                    <a href="#">Other Pages</a>
                </li>
                <li class="active">Blank Page</li>
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
            <div class="page-header">
                <h1>
                    Penempatan
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Tambahkan data untuk didistribusikan
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="widget-box">
                        <div class="widget-header widget-header-flat">
                            <h4 class="widget-title smaller">
                                <i class="ace-icon fa fa-exchange smaller-80" aria-hidden="true"></i>
                                Form Penempatan Barang
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
                                    <div id="form-message-success" class="col-md-4 mb-4">
                                        <h2>Penempatan<br> Barang</h2>
                                    </div>
                                    <div class="col-md-8">
                                        <form role="form" action="<?= site_url('admin/penempatan/create') ?>" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <label>Kode Penempatan</label>
                                                        <div class="input-group">
                                                            <input value="<?= $dataKode ?>" type="text" class="form-control" name=" idtransaksi_penempatan" id=" idtransaksi_penempatan" placeholder="Valid Card Number" required="" readonly>
                                                            <span class="input-group-addon"><i class="fa fa-code" aria-hidden="true"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-7 col-md-7">
                                                    <div class="form-group">
                                                        <label>Tanggal Penempatan</label>
                                                        <input name="tgl_penempatan" id="tgl_penempatan" value="<?php echo Date('Y-m-d\TH:i:s',time()) ?>" type="datetime-local" class="form-control" name="Expiry" placeholder="MM / YY" required step="1">
                                                    </div>
                                                </div>
                                                <div class="col-xs-5 col-md-5 pull-right">
                                                    <div class="form-group">
                                                        <label>Jenis Transaksi</label>
                                                        <select class="form-control" name="jenis_transaksi" id="jenis_transaksi">
                                                            <option value="" selected disabled>Pilih Jenis Transaksi</option>
                                                            <option value="DBR">DBR</option>
                                                            <option value="DBL">DBL</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <label>Gedung</label>
                                                        <select class="form-control" name="id_gedung" id="id_gedung">
                                                            <option value="" selected disabled> Pilih Gedung </option>
                                                            <?php foreach ($gedung as $key => $value): ?>
                                                                <option value="<?= $value['id_gedung'] ?>"><?= $value['nama_gedung'] ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <label>Lokasi</label>
                                                        <select name="id_lokasi" id="id_lokasi" class="form-control" >
                                                            <option value="">....</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <label>Hak</label>
                                                        <select class="form-control" name="id_hak" id="id_hak">
                                                            <option value=""> Pilih Hak </option>
                                                            <?php foreach ($hak as $key => $value): ?>
                                                                <option value="<?= $value['id_hak'] ?>"><?= $value['uraian_hak'] ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <label>Upload Dokumen</label>
                                                        <input type="file" id="id-input-file-2" name="dokumen" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <hr>
                                <form role="form" action="<?= site_url('admin/penempatan/form_tambah') ?>" method="POST" enctype="multipart/form-data">
                                <div id="form-message-success" class="col-md-4 mb-4">
                                        <h2>Input<br> Barang</h2>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                    <div class="col-xs-7 col-md-7">
                                        <div class="form-group">
                                            <label for="kode_barang">Kode Barang</label>
                                            <div class="input-group">
                                                <input type="hidden" id="id" name="id">
                                                <input type="hidden" name="kode" id="kode" value="<?= $dataKode ?>">
                                                <input type="text" class="form-control" name="kode_barang" id="kode_barang" onchange="javascript:submitform();" required="">
                                                <span class="input-group-addon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="space-4"></div>
                                            <a class="btn btn-sm btn-success" href="javaScript:void(0)" onclick="window.open('<?= site_url('admin/penempatan/pencarian_barang') ?>','Pencarian Barang','toolbar=yes,scrollbars=yes,resizable=yes,top=30,width=1000,height=800')" target="_SELF">Search Items</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-5 col-md-5">
                                        <div class="form-group">
                                            <label for="nup">NUP</label>
                                                <input type="text" class="form-control" name="nup" id="nup" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nama_barang"  id="nama_barang" required="" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                     <div class="col-xs-12 col-md-12">
                                        <div class="form-group">
                                            <select class="form-control" name="id_pengguna" id="id_pengguna">
                                                <option value=""> Pilih Pengguna </option>
                                                <?php foreach ($pengguna as $key => $value): ?>
                                                    <option value="<?= $value['id_pengguna'] ?>"><?= $value['nama_pengguna'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <div class="space-4"></div>
                                            <input style="float:right;" name="btnTambah" class="btn btn-sm btn-primary" type="submit" style="cursor:pointer;" value=" Tambah " />
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </form>
                                <address>
                                    <strong>Assets in :</strong>

                                    <br>
                                    <a href="mailto:#">Politeknik Negeri Lhokseumawe</a>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-2"></div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="widget-box">
                        <div class="widget-header widget-header-flat">
                            <h4 class="widget-title smaller">
                                <i class="ace-icon fa fa-exchange smaller-80" aria-hidden="true"></i>
                                Temp Data Penempatan Barang
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
                                            Temp Data Penempatan Barang
                                        </div>
                                        <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer">
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
                                                $tmp = "SELECT * FROM `transaksi_penempatan_tmp` LEFT JOIN `inventaris_peralatan` ON `inventaris_peralatan`.id=`transaksi_penempatan_tmp`.inventaris_peralatan_id LEFT JOIN `tweb_pengguna` ON `tweb_pengguna`.id_pengguna=`transaksi_penempatan_tmp`.id_pengguna WHERE `transaksi_penempatan_tmp`.idtransaksi_penempatan LIKE '".$dataKode."'";
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
                                                        <div class="">
                                                            <a data-toggle="modal" data-target="#edittmp<?php echo $value->idtransaksi_penempatan_tmp ?>" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-info" title="Edit Pengguna"><i class="ace-icon glyphicon glyphicon-edit bigger-110"></i></a>
                                                            <a data-toggle="modal" data-target="#deletetmp<?php echo $value->idtransaksi_penempatan_tmp ?>" data-toggle="tooltip" rel="tooltip" data-placement="top" type="button" class="btn btn-xs btn-danger" title="Delete"><i class="ace-icon glyphicon glyphicon-trash bigger-110"></i></a>
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

        let jumlah = <?= count($query) ?>;
        for (let i = 0; i <= jumlah; i++) {
            $("#id_pengguna_modal" + i).select2({
                theme: "bootstrap"
            }
            );
        }

        $("#id_gedung").select2({
            theme: "bootstrap"
        });

        $("#id_lokasi").select2({
            theme: "bootstrap"
        });

        $("#id_hak").select2({
            theme: "bootstrap"
        });

        $("#jenis_transaksi").select2({
            theme: "bootstrap"
        });

        $("#id_pengguna").select2({
            theme: "bootstrap"
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

                    $('#id_lokasi').html(html);
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