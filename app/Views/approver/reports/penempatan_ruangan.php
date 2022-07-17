<?= $this->extend('approver/layout') ?>
<?= $this->section('head') ?>
<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/bootstrap-datepicker3.min.css" />
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
            <li class="active">Laporan</li>
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
         <!-- /.page-header -->
         <div class="row">
            <div class="col-xs-12">
               <!-- PAGE CONTENT BEGINS -->
               <div class="row">
                  <div class="col-xs-12">
                     <div class="box">
                        <div class="box box-solid box-primary">
                           <div class="box-header">
                              <h3 class="box-title"></h3>
                              <div class="widget-box">
                                 <div class="widget-header">
                                    <h4 class="widget-title">Daftar Barang Ruangan</h4>
                                    <div class="widget-toolbar">
                                       <a href="#" data-action="collapse">
                                       <i class="ace-icon fa fa-chevron-up"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="widget-body" style="display: block;">
                                    <div class="widget-main">
                                       <!--form -->			
                                       <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                          <div class="col-xs-4">
                                             <select name="id_gedung" id="id_gedung" class="form-control" style="width: 100%">
                                                <option value="" disabled selected>Pilih Gedung</option>
                                                <?php foreach ($gedung as $key => $ged): ?>
                                                   <option value="<?= $ged['id_gedung'] ?>"><?= $ged['nama_gedung'] ?></option>
                                                <?php endforeach ?>
                                             </select>
                                          </div>
                                          <div class="col-xs-4">
                                             <select name="id_lokasi" id="id_lokasi" class="form-control" style="width: 100%">
                                                <option value="" disabled selected>Pilih Lokasi</option>
                                             </select>
                                          </div>
                                          <input type="submit" name="Submit" id="submit_btn" class="btn btn-xs btn-primary" value="Tampilkan">
                                       </form>
                                       <!--form -->			
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!--export data -->
                           <div class="btn-group pull-left">
                              <button type="button" class="btn btn-xs btn-default">Export</button>
                              <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                 <li><a href="javascript:void(0)" onclick="window.location.href='http://online-demo.esy.es/CI_inventory_barcode/index.php/laporan/laporan_incoming_item_excel/2022-01-01/2022-07-31/';return false;">PDF</a></li>
                              </ul>
                           </div>
                           <!--export data -->	
                        </div>
                         <div><br></div>
                         <div><br></div>
                        <!-- /.box-header -->
                        <?php
                        $db = $db = \Config\Database::connect();
                        if(isset($_POST['id_lokasi'])){
                     	  	$id_lokasi = $_POST['id_lokasi'];
                     	  }else{
                     	  	$id_lokasi = '0';
                     	  }

                     	if(isset($_POST['id_gedung'])){
                     	  	$id_gedung = $_POST['id_gedung'];
                     	  }else{
                     	  	$id_gedung = '0';
                     	  }

                          $penempatan = $db->table('transaksi_penempatan_item')
                               ->join('transaksi_penempatan', 'transaksi_penempatan.idtransaksi_penempatan = transaksi_penempatan_item.idtransaksi_penempatan', 'left')
                          ->join('inventaris_peralatan', 'inventaris_peralatan.idinventaris_peralatan = transaksi_penempatan_item.idinventaris_peralatan', 'left')
                          ->join('tweb_pengguna', 'tweb_pengguna.id_pengguna = transaksi_penempatan_item.id_pengguna', 'left')
                          ->join('tweb_hak', 'tweb_hak.id_hak = transaksi_penempatan_item.id_hak', 'left')
                          ->join('tweb_lokasi', 'tweb_lokasi.id_lokasi = transaksi_penempatan.id_lokasi')
                          ->join('tweb_gedung', 'tweb_gedung.id_gedung = tweb_lokasi.id_gedung')
                          ->where('status_penempatan_item', '1')
                          ->where('jenis_transaksi', 'DBR')
                          ->where('transaksi_penempatan.id_lokasi', $id_lokasi)
                          ->where('status_penempatan != ', 'Pending')
                          ->get()->getResultArray();
                        
                        ?>
                        <div class="box-body">
                           <p style="text-align:center; font-size: 15pt; font-weight: bold;"> Daftar Barang Ruangan</p>
                           <p style="text-align:center; font-size: 10pt;">Gedung <?= $id_gedung ?> , Lokasi <?= $id_lokasi ?> </p>
                           <table class="table table-condensed table-bordered table-hover">
                              <tbody>
                              <tr>
                                 <th class="text-center" style="background-color:#DCDCDC; border-color: white; vertical-align: middle;" rowspan="2"> # </th>
                                 <th class="text-center" style="background-color:#DCDCDC; border-color: white; vertical-align: middle;" rowspan="2">NUP</th>
                                 <th class="text-center" style="background-color:#DCDCDC; border-color: white; vertical-align: middle;" rowspan="2"> Nama Barang </th>
                                 <th style="background-color:#DCDCDC; border-color: white;" class="text-center" colspan="3"> Identitas Barang </th>
                                 <th style="background-color:#DCDCDC; border-color: white;" class="text-center" colspan="3">Kondisi</th>
                                 <th class="text-center" style="background-color:#DCDCDC; border-color: white; vertical-align: middle;" rowspan="2">Keterangan</th>
                              </tr>
                              <tr>
                                 <th class="text-center" style="background-color:#DCDCDC; border-color: white;">Merk / Type</th>
                                 <th style="background-color:#DCDCDC; border-color: white;">Kode Barang</th>
                                 <th style="background-color:#DCDCDC; border-color: white;">Thn Perolehan</th>
                                 <th style="background-color:#DCDCDC; border-color: white;" class="text-center">B</th>
                                 <th style="background-color:#DCDCDC; border-color: white;" class="text-center">RR</th>
                                 <th style="background-color:#DCDCDC; border-color: white;" class="text-center">RB</th>
                              </tr>
                                 <?php foreach ($penempatan as $key => $value): ?>
                                 <tr>
                                    <td> <?= $key+1 ?> </td>
                                    <td> <?= $value['nup'] ?> </td>
                                    <td> <?= $value['nama_barang'] ?> </td>
                                    <td> <?= $value['merk'] ?> </td>
                                    <td> <?= $value['kode_barang'] ?> </td>
                                    <td> <?= $value['tgl_perolehan'] ?> </td>
                                    <td style="text-align:center;">
                                       <?php
                                       if ($value['id_kondisi'] == "K1") {
                                          echo "Yes";
                                       }else{
                                          echo "-";
                                       }
                                       ?>
                                    </td>
                                    <td style="text-align:center;">
                                       <?php
                                       if ($value['id_kondisi'] == "K2") {
                                          echo "Yes";
                                       }else{
                                          echo "-";
                                       }
                                       ?>
                                    </td>
                                    <td style="text-align:center;">
                                       <?php
                                       if ($value['id_kondisi'] == "K3") {
                                          echo "Yes";
                                       }else{
                                          echo "-";
                                       }
                                       ?>
                                    </td>
                                    <td><?= $value['uraian_hak'] ?></td>
                                 </tr>
                                 <?php endforeach ?>
                                 <?php if (count($penempatan) < 1): ?>
                                 	<tr>
                                 		<td colspan="10">Data Tidak ditemukan</td>
                                 	</tr>
                                 <?php endif ?>
                              </tbody>
                           </table>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                     <!-- /.box -->
                  </div>
                  <!-- /.col -->
               </div>
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
<script>
   jQuery(function($) {
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
   });
</script>
<?= $this->endSection('') ?>