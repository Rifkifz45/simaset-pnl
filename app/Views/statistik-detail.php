<!doctype html>
<html class="fixed">
  <head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Advanced Tables | Okler Themes | Porto-Admin</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?= base_url('') ?>/octopus-master/octopus/assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?= base_url('') ?>/octopus-master/octopus/assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?= base_url('') ?>/octopus-master/octopus/assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="<?= base_url('') ?>/octopus-master/octopus/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="<?= base_url('') ?>/octopus-master/octopus/assets/vendor/select2/select2.css" />
    <link rel="stylesheet" href="<?= base_url('') ?>/octopus-master/octopus/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?= base_url('') ?>/octopus-master/octopus/assets/stylesheets/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?= base_url('') ?>/octopus-master/octopus/assets/stylesheets/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('') ?>/octopus-master/octopus/assets/stylesheets/theme-custom.css">

    <!-- Head Libs -->
    <script src="<?= base_url('') ?>/octopus-master/octopus/assets/vendor/modernizr/modernizr.js"></script>

  </head>
  <body>
    <br>
    <section class="body">
      <div class="container">
        <a href="<?= site_url('') ?>" class="btn btn-success"><i class="fa fa-angle-double-left"></i> Back to Home</a>
        <div><br></div>
        <section role="main">
          <!-- start: page -->
            <section class="panel">
              <header class="panel-heading">
                <div class="panel-actions">
                  <a href="#" class="fa fa-caret-down"></a>
                  <a href="#" class="fa fa-times"></a>
                </div>
            
                <h2 class="panel-title">Statistik Barang Milik Negara (Group Berdasarkan Kode Barang)</h2>
              </header>
              <div class="panel-body">
                <table class="table table-bordered table-striped mb-none" id="datatable-default">
                  <thead>
                    <tr>
                      <th class="center">No</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th class="hidden-phone">Total</th>
                      <th class="hidden-phone">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($group as $key => $value): ?>
                    <tr>
                      <td class="center"><?= $key+1 ?></td>
                      <td><?= $value->kode_barang ?></td>
                      <td><?= $value->nama_barang ?></td>
                      <td><?= $value->total_barang ?></td>
                      <td class="center">
                        <a href="<?= site_url('statistik-detail/'.$value->kode_barang) ?>" class="btn btn-primary btn-sm"><i class="fa fa-list-alt"></i> See Detail</a>
                      </td>
                    </tr>
                     <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </section>
          <!-- end: page -->
        </section>
      </div>
    </section>

    <!-- Vendor -->
    <script src="<?= base_url('') ?>/octopus-master/octopus/assets/vendor/jquery/jquery.js"></script>
    <script src="<?= base_url('') ?>/octopus-master/octopus/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="<?= base_url('') ?>/octopus-master/octopus/assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="<?= base_url('') ?>/octopus-master/octopus/assets/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="<?= base_url('') ?>/octopus-master/octopus/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?= base_url('') ?>/octopus-master/octopus/assets/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="<?= base_url('') ?>/octopus-master/octopus/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    
    <!-- Specific Page Vendor -->
    <script src="<?= base_url('') ?>/octopus-master/octopus/assets/vendor/select2/select2.js"></script>
    <script src="<?= base_url('') ?>/octopus-master/octopus/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
    <script src="<?= base_url('') ?>/octopus-master/octopus/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
    <script src="<?= base_url('') ?>/octopus-master/octopus/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
    
    <!-- Theme Base, Components and Settings -->
    <script src="<?= base_url('') ?>/octopus-master/octopus/assets/javascripts/theme.js"></script>
    
    <!-- Theme Custom -->
    <script src="<?= base_url('') ?>/octopus-master/octopus/assets/javascripts/theme.custom.js"></script>
    
    <!-- Theme Initialization Files -->
    <script src="<?= base_url('') ?>/octopus-master/octopus/assets/javascripts/theme.init.js"></script>


    <!-- Examples -->
    <script src="<?= base_url('') ?>/octopus-master/octopus/assets/javascripts/tables/examples.datatables.default.js"></script>
    <script src="<?= base_url('') ?>/octopus-master/octopus/assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
    <script src="<?= base_url('') ?>/octopus-master/octopus/assets/javascripts/tables/examples.datatables.tabletools.js"></script>
  </body>
</html>