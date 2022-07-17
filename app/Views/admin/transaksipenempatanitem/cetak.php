<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <meta charset="utf-8" />
      <link rel="icon" href="<?= site_url('icon/web.png') ?>" type="image/png">
      <title>SIMASET APPLICATION</title>
      <meta name="description" content="" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
      <!-- bootstrap & fontawesome -->
      <link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/bootstrap.min.css" />
      <link rel="stylesheet" href="<?= base_url('') ?>/template/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
      <!-- page specific plugin styles -->
      <!-- text fonts -->
      <link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/fonts.googleapis.com.css" />
      <!-- ace styles -->
      <link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
      <!--[if lte IE 9]>
      <link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
      <![endif]-->
      <link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/ace-skins.min.css" />
      <link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/ace-rtl.min.css" />
      <?= $this->renderSection('head') ?>
      <!--[if lte IE 9]>
      <link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/ace-ie.min.css" />
      <![endif]-->
      <!-- inline styles related to this page -->
      <!-- ace settings handler -->
      <script src="<?= base_url('') ?>/template/assets/js/ace-extra.min.js"></script>
      <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
      <!--[if lte IE 8]>
      <script src="<?= base_url('') ?>/template/assets/js/html5shiv.min.js"></script>
      <script src="<?= base_url('') ?>/template/assets/js/respond.min.js"></script>
      <![endif]-->
      <style>
         .tooltip-inner {
         min-width: 80px; /* the minimum width */
         }
      </style>
   </head>
   <body class="no-skin">
      <?= $this->include('admin/navbar') ?>
      <div class="main-container ace-save-state" id="main-container">
         <div class="main-content">
            <div class="main-content-inner">
               <div class="page-content">
                  <div class="row">
                     <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class='row'>
                           <div class='col-xs-6'>
                              <table class='table table-condensed table-bordered input-sm'>
                                 <tbody>
                                    <tr>
                                       <th width='150px' scope='row'>No. Penempatan</th>
                                       <td>
                                          <?php echo $penempatan['idtransaksi_penempatan']; ?>
                                       </td>
                                    </tr>
                                    <tr>
                                       <th scope='row'>Tanggal Penempatan</th>
                                       <td>
                                          <?php echo date("d-m-Y H:i:s", strtotime($penempatan['created_at'])) . " WIB"; ?>
                                       </td>
                                    </tr>
                                    <tr>
                                       <th scope='row'>Lokasi Penempatan</th>
                                       <td>
                                          <i class="fa fa-map-marker"></i> <?= $penempatan['nama_gedung'] . " Lantai " . $penempatan['lantai'] . " - " . $penempatan['nama_lokasi'] ?>
                                       </td>
                                    </tr>
                                    <tr>
                                       <th scope='row'>Jenis Penempatan</th>
                                       <td>
                                          <?php echo $penempatan['jenis_penempatan']; ?>
                                       </td>
                                    </tr>
                                    <tr>
                                       <th scope='row'>Status Transaksi</th>
                                       <td>
                                          <?php 
                                             if ($penempatan['status_penempatan'] == "Pending") {
                                               echo $penempatan['status_penempatan'];
                                             }else
                                             
                                             if($penempatan['status_penempatan'] == "Accepted"){
                                               echo $penempatan['status_penempatan'];
                                             }else
                                             if ($penempatan['status_penempatan'] == "Rejected") {
                                               echo $penempatan['status_penempatan'];
                                             }else{
                                                 echo "";
                                               }
                                               ?>
                                       </td>
                                    <tr>
                                       <th scope='row'>User Posting</th>
                                       <td>
                                          <?php
                                             $db = \Config\Database::connect();
                                             $query = $db->table('user_login')->where(['id' => $penempatan['created_by']])->get()->getRowArray();
                                             echo $query['nama_user'];
                                             ?>
                                       </td>
                                    </tr>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <!-- /.span -->
                        </div>
                        <div class='row'>
                           <div class='col-xs-8'>
                              <table class='table table-condensed table-bordered input-sm'>
                                 <thead>
                                    <tr>
                                       <th width="35">No</th>
                                       <th>Kode</th>
                                       <th>NUP</th>
                                       <th>Nama Barang</th>
                                       <th>Pengguna</th>
                                       <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach ($detail as $key => $value): ?>
                                 <tr>
                                   <td scope="row" align="center"><?php echo $key + 1; ?></td>
                                   <td scope="row"><?php echo $value->kode_barang; ?></td>
                                   <td scope="row"><?php echo $value->nup; ?></td>
                                   <td scope="row"><?php echo $value->nama_barang; ?></td>
                                   <td scope="row"><?= $value->nama_pengguna ?></td>
                                   <td scope="row">
                                     <?php
                                     if ($value->status_penempatan_item == "0") {
                                       echo "Unavailable";
                                     }else if($value->status_penempatan_item == "1"){
                                       echo "Available";
                                     }else{
                                       echo "";
                                     }
                                     ?>  
                                   </td>
                                 </tr>
                                 <?php endforeach ?>
                                 </tbody>
                              </table>
                           </div>
                           <!-- /.span -->
                        </div>
                        <p><b>KETERANGAN</b></p>
                        <p>Pada Status, jika Available (Aktif) berarti posisi barang masih ditempatkan pada Lokasi tersebut. Sedangkan jika Unavailable (Tidak Aktif), maka poisisi barang sudah dipindahkan (mutasi).</p>
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
         <script type="text/javascript">
            try{ace.settings.loadState('main-container')}catch(e){}
         </script>
         <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
         <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
         </a>
      </div>
      <!-- /.main-container -->
      <!-- basic scripts -->
      <!--[if !IE]> -->
      <script src="<?= base_url('') ?>/template/assets/js/jquery-2.1.4.min.js"></script>
      <!-- <![endif]-->
      <!--[if IE]>
      <script src="<?= base_url('') ?>/template/assets/js/jquery-1.11.3.min.js"></script>
      <![endif]-->
      <script type="text/javascript">
         if('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url('') ?>/template/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
      </script>
      <script src="<?= base_url('') ?>/template/assets/js/bootstrap.min.js"></script>
      <!-- page specific plugin scripts -->
      <!-- ace scripts -->
      <script src="<?= base_url('') ?>/template/assets/js/ace-elements.min.js"></script>
      <script src="<?= base_url('') ?>/template/assets/js/ace.min.js"></script>
      <!-- inline scripts related to this page -->
      <!-- Yandex.Metrika counter -->
   </body>
</html>