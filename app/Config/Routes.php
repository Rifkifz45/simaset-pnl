<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('UserLogin');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(true);
// $routes->set404Override(function(){
//     return view('errorview');
// });
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'UserLogin::index');
$routes->get('about', 'UserLogin::about');
$routes->get('services', 'UserLogin::services');
$routes->get('info', 'UserLogin::info');
$routes->post('info/detail', 'UserLogin::info_detail');
$routes->get('report', 'UserLogin::report');
$routes->get('contact', 'UserLogin::contact');
$routes->get('page-login', 'UserLogin::login');
$routes->get('admin/logout', 'UserLogin::logout');
$routes->get('reset_password', 'UserLogin::reset');
$routes->get('reset_password/(:any)', 'UserLogin::reset_password/$1');
$routes->post('reset_pw/verify', 'UserLogin::verify');
$routes->post('pw_baru/verify', 'UserLogin::pwbaru_verify');

$routes->post('test/lock', 'UserLogin::lock');

$routes->get('/statistik', 'UserLogin::statistik');
$routes->get('/statistik-detail', 'UserLogin::statistik_detail');
$routes->get('/statistik-detail/(:any)', 'UserLogin::statistik_detail2/$1');
$routes->get('/contact', 'UserLogin::contact');
$routes->post('/cetak/dbr', 'UserLogin::cetak_dbr');
$routes->get('/report_1', 'UserLogin::report_1');
$routes->get('/report_2', 'UserLogin::report_2');
$routes->get('/DT_umum', 'UserLogin::DT_umum');
$routes->post('login/proses', 'UserLogin::proses');


// START CONTROLLER APPROVER
$routes->group('approver', ['filter' => 'isLoggedIn'], function($routes)
{   

    $routes->get('inventaris_tanah/sub/(:segment)', 'Approver\SubInventaris::sub/$1');
    $routes->get('inventaris_peralatan/sub/(:segment)', 'Approver\SubInventaris::sub/$1');
    $routes->get('inventaris_gedung/sub/(:segment)', 'Approver\SubInventaris::sub/$1');
    $routes->get('inventaris_jalan/sub/(:segment)', 'Approver\SubInventaris::sub/$1');
    $routes->get('inventaris_asset/sub/(:segment)', 'Approver\SubInventaris::sub/$1');
    $routes->get('inventaris_konstruksi/sub/(:segment)', 'Approver\SubInventaris::sub/$1');
    $routes->get('inventaris_takberwujud/sub/(:segment)', 'Approver\SubInventaris::sub/$1');

    $routes->get('/', 'Approver\Approver::index');

    $routes->get('profile', 'Approver\Approver::profile');
    $routes->post('profile/update', 'Approver\Approver::update');

    $routes->get('user', 'Approver\Approver::user');

    $routes->group('mutasi', function($routes)
    {
        $routes->get('/', 'Approver\TransaksiMB::index');
    });

     $routes->group('statistik', function($routes)
    {
        $routes->get('DI_tanah/(:segment)', 'Approver\DataServerSide::DI_tanah/$1');
        $routes->get('DI_peralatan/(:segment)', 'Approver\DataServerSide::DI_peralatan/$1');
        $routes->get('DI_gedung/(:segment)', 'Approver\DataServerSide::DI_gedung/$1');
        $routes->get('DI_jalan/(:segment)', 'Approver\DataServerSide::DI_jalan/$1');
        $routes->get('DI_asset/(:segment)', 'Approver\DataServerSide::DI_asset/$1');
        $routes->get('DI_takberwujud/(:segment)', 'Approver\DataServerSide::DI_takberwujud/$1');

        $routes->get('peralatan', 'Approver\Statistik::peralatan/$1');

        $routes->get('tanahv1/(:segment)', 'Approver\SubInventaris::tanahv1/$1');
        $routes->get('peralatanv1/(:segment)', 'Approver\SubInventaris::peralatanv1/$1');
        $routes->get('gedungv1/(:segment)', 'Approver\SubInventaris::gedungv1/$1');
        $routes->get('jalanv1/(:segment)', 'Approver\SubInventaris::jalanv1/$1');
        $routes->get('assetv1/(:segment)', 'Approver\SubInventaris::assetv1/$1');
        $routes->get('konstruksiv1/(:segment)', 'Approver\SubInventaris::konstruksiv1/$1');
        $routes->get('takberwujudv1/(:segment)', 'Approver\SubInventaris::takberwujudv1/$1');
    });
    
    $routes->group('statistik-group', function($routes)
    {
        $routes->get('/', 'Approver\Statistik::index');
        $routes->get('extend/(:segment)', 'Approver\Statistik::view/$1');
        $routes->get('(:segment)/', 'Approver\Statistik::detail1/$1');
    });

    $routes->group('statistik-chart', function($routes)
    {
        $routes->get('/', 'Approver\Statistik::index2');
    });
    
    $routes->group('reports', function($routes)
    {
        $routes->get('/', 'Approver\Reports::index');
        $routes->get('kategori', 'Approver\Reports::reports_kategori');
        $routes->get('gedung', 'Approver\Reports::reports_gedung');
        $routes->get('lokasi', 'Approver\Reports::reports_lokasi');
        $routes->get('lokasi-kategori', 'Approver\Reports::reports_lokasi_kategori');
        $routes->get('kondisi', 'Approver\Reports::reports_kondisi');
        $routes->get('satuan', 'Approver\Reports::reports_satuan');
        $routes->get('hak', 'Approver\Reports::reports_hak');
        $routes->get('perolehan', 'Approver\Reports::reports_perolehan');
        $routes->get('pengguna', 'Approver\Reports::reports_pengguna');
        $routes->get('pengguna-kategori', 'Approver\Reports::reports_pengguna_kategori');

        $routes->get('kib_tanah', 'Approver\Reports::kib_tanah');
        $routes->get('kib_alatbesar', 'Approver\Reports::kib_alatbesar');
        $routes->get('kib_alatangkut', 'Approver\Reports::kib_alatangkut');
        $routes->get('kib_alatsenjata', 'Approver\Reports::kib_alatsenjata');
        $routes->get('kib_bangunangedung', 'Approver\Reports::kib_bangunangedung');
        $routes->get('kib_bangunanair', 'Approver\Reports::kib_bangunanair');

        $routes->get('penempatan_periode', 'Approver\Reports::penempatan_periode');
        $routes->get('penempatan_lokasi', 'Approver\Reports::penempatan_lokasi');
        $routes->get('penempatan_bulan', 'Approver\Reports::penempatan_bulan');

        $routes->get('mutasi_periode', 'Approver\Reports::mutasi_periode');
        $routes->get('mutasi_lokasi', 'Approver\Reports::mutasi_lokasi');
        $routes->get('mutasi_bulan', 'Approver\Reports::mutasi_bulan');

        $routes->get('penempatan_ruangan', 'Approver\Reports::penempatan_ruangan');
        $routes->get('penempatan_lainnya', 'Approver\Reports::penempatan_lainnya');
    });

    $routes->group('inventaris', function($routes)
    {
        $routes->get('/', 'Approver\Approver::viewinventaris');
    });
    
    $routes->group('report_1', function($routes)
    {
        $routes->get('/', 'Approver\DistInventarisRuangan::report_1');
        $routes->post('/', 'Approver\DistInventarisRuangan::report_1');
    });
    
    $routes->group('report_2', function($routes)
    {
        $routes->get('/', 'Approver\DistInventarisLainnya::report_2');
        $routes->post('/', 'Approver\DistInventarisLainnya::report_2');
    });
    
    $routes->group('penempatan', function($routes)
    {
        $routes->get('/', 'Approver\TransaksiPB::index');
        $routes->get('viewpdf/(:segment)', 'Approver\TransaksiPB::viewpdf/$1');
        $routes->get('cetak/(:segment)', 'Approver\TransaksiPB::cetak/$1');
        
        $routes->get('pending/(:segment)/', 'Approver\TransaksiPB::pending/$1');
        $routes->get('accepted/(:segment)/', 'Approver\TransaksiPB::accepted/$1');
        $routes->get('rejected/(:segment)/', 'Approver\TransaksiPB::rejected/$1');
        $routes->get('closed/(:segment)/', 'Approver\TransaksiPB::closed/$1');
    });
    
    $routes->group('inventaris_peralatan', function($routes)
    {
        $routes->get('/', 'Approver\Approver::inventaris_peralatan');
    });
    
    $routes->group('inventaris_ruangan', function($routes)
    {
        $routes->get('/', 'Approver\DistInventarisRuangan::index');
    });
    
    $routes->group('inventaris_lainnya', function($routes)
    {
        $routes->get('/', 'Approver\DistInventarisLainnya::index');
    });
});

// END CONTROLLER APPROVER




$routes->group('admin',['filter' => 'isLoggedIn'], function($routes)
{
    $routes->group('reports', function($routes)
    {
        $routes->get('/', 'Admin\Reports::index');
        $routes->get('kategori', 'Admin\Reports::reports_kategori');
        $routes->get('gedung', 'Admin\Reports::reports_gedung');
        $routes->get('lokasi', 'Admin\Reports::reports_lokasi');
        $routes->get('lokasi-kategori', 'Admin\Reports::reports_lokasi_kategori');
        $routes->get('kondisi', 'Admin\Reports::reports_kondisi');
        $routes->get('satuan', 'Admin\Reports::reports_satuan');
        $routes->get('hak', 'Admin\Reports::reports_hak');
        $routes->get('perolehan', 'Admin\Reports::reports_perolehan');
        $routes->get('pengguna', 'Admin\Reports::reports_pengguna');
        $routes->get('pengguna-kategori', 'Admin\Reports::reports_pengguna_kategori');

        $routes->get('kib_tanah', 'Admin\Reports::kib_tanah');
        $routes->get('kib_alatbesar', 'Admin\Reports::kib_alatbesar');
        $routes->get('kib_alatangkut', 'Admin\Reports::kib_alatangkut');
        $routes->get('kib_alatsenjata', 'Admin\Reports::kib_alatsenjata');
        $routes->get('kib_bangunangedung', 'Admin\Reports::kib_bangunangedung');
        $routes->get('kib_bangunanair', 'Admin\Reports::kib_bangunanair');

        $routes->get('penempatan_periode', 'Admin\Reports::penempatan_periode');
        $routes->get('penempatan_lokasi', 'Admin\Reports::penempatan_lokasi');
        $routes->get('penempatan_bulan', 'Admin\Reports::penempatan_bulan');

        $routes->get('mutasi_periode', 'Admin\Reports::mutasi_periode');
        $routes->get('mutasi_lokasi', 'Admin\Reports::mutasi_lokasi');
        $routes->get('mutasi_bulan', 'Admin\Reports::mutasi_bulan');

        $routes->get('penempatan_ruangan', 'Admin\Reports::penempatan_ruangan');
        $routes->get('penempatan_lainnya', 'Admin\Reports::penempatan_lainnya');
    });


    $routes->get('/', 'Admin\Admin::index');
    $routes->get('backup-data', 'Admin\Admin::database');
    $routes->get('dobackup', 'Admin\Admin::dobackup');
    $routes->get('DT_inventaris_peralatan', 'Admin\Admin::DT_inventaris_peralatan');
    $routes->get('DT_inventaris_peralatan2', 'Admin\Admin::DT_inventaris_peralatan2');
    
    $routes->get('DI_inventaris_peralatan', 'Admin\Admin::DI_inventaris_peralatan');
    $routes->get('DI_inventaris_gedung', 'Admin\Admin::DI_inventaris_gedung');
    $routes->get('DI_inventaris_jalan', 'Admin\Admin::DI_inventaris_jalan');
    $routes->get('DI_inventaris_asset', 'Admin\Admin::DI_inventaris_asset');
    $routes->get('DI_inventaris_takberwujud', 'Admin\Admin::DI_inventaris_takberwujud');
    $routes->get('inventaris', 'Admin\TwebCategory::viewinventaris');

    $routes->get('DI_tanah/(:segment)', 'Admin\QRCode::DI_tanah/$1');
    $routes->get('DI_peralatan/(:segment)', 'Admin\QRCode::DI_peralatan/$1');
    $routes->get('DI_gedung/(:segment)', 'Admin\QRCode::DI_gedung/$1');
    $routes->get('DI_jalan/(:segment)', 'Admin\QRCode::DI_jalan/$1');
    $routes->get('DI_asset/(:segment)', 'Admin\QRCode::DI_asset/$1');
    $routes->get('DI_konstruksi/(:segment)', 'Admin\QRCode::DI_konstruksi/$1');
    $routes->get('DI_takberwujud/(:segment)', 'Admin\QRCode::DI_takberwujud/$1');

    $routes->group('cetak-label', function($routes)
    {
        $routes->get('/', 'Admin\QRCode::index');
        $routes->post('print/(:segment)', 'Admin\QRCode::print/$1');
        $routes->get('(:segment)', 'Admin\QRCode::view/$1');
    });

    $routes->group('token', function($routes)
    {
        $routes->get('/', 'Admin\Admin::set_token');
        $routes->post('create', 'Admin\Admin::create_token');
        $routes->post('update', 'Admin\Admin::update_token');
        $routes->get('reset/(:segment)', 'Admin\Admin::reset_token/$1');
    });
    
    $routes->group('report_1', function($routes)
    {
        $routes->get('/', 'Admin\DistRuangan::report_1');
        $routes->post('/', 'Admin\DistRuangan::report_1');
    });
    
    $routes->group('report_2', function($routes)
    {
        $routes->get('/', 'Admin\DistLainnya::report_2');
        $routes->post('/', 'Admin\DistLainnya::report_2');
    });

    $routes->group('statistik', function($routes)
    {
        $routes->get('DI_tanah/(:segment)', 'Admin\DataServerSide::DI_tanah/$1');
        $routes->get('DI_peralatan/(:segment)', 'Admin\DataServerSide::DI_peralatan/$1');
        $routes->get('DI_gedung/(:segment)', 'Admin\DataServerSide::DI_gedung/$1');
        $routes->get('DI_jalan/(:segment)', 'Admin\DataServerSide::DI_jalan/$1');
        $routes->get('DI_asset/(:segment)', 'Admin\DataServerSide::DI_asset/$1');
        $routes->get('DI_takberwujud/(:segment)', 'Admin\DataServerSide::DI_takberwujud/$1');

        $routes->get('peralatan', 'Admin\Statistik::peralatan/$1');

        $routes->get('tanahv1/(:segment)', 'Admin\SubInventaris::tanahv1/$1');
        $routes->get('peralatanv1/(:segment)', 'Admin\SubInventaris::peralatanv1/$1');
        $routes->get('gedungv1/(:segment)', 'Admin\SubInventaris::gedungv1/$1');
        $routes->get('jalanv1/(:segment)', 'Admin\SubInventaris::jalanv1/$1');
        $routes->get('assetv1/(:segment)', 'Admin\SubInventaris::assetv1/$1');
        $routes->get('konstruksiv1/(:segment)', 'Admin\SubInventaris::konstruksiv1/$1');
        $routes->get('takberwujudv1/(:segment)', 'Admin\SubInventaris::takberwujudv1/$1');
    });
    
    $routes->group('statistik-group', function($routes)
    {
        $routes->get('/', 'Admin\Statistik::index');
        $routes->get('extend/(:segment)', 'Admin\Statistik::view/$1');
        $routes->get('(:segment)/', 'Admin\Statistik::detail1/$1');
    });

    $routes->group('statistik-chart', function($routes)
    {
        $routes->get('/', 'Admin\Statistik::index2');
    });
    
    $routes->group('inventaris_ruangan', function($routes)
    {
        $routes->get('/', 'Admin\DistRuangan::index');
        $routes->get('reset/(:segment)', 'Admin\DistRuangan::reset/$1');
        $routes->post('updatefoto', 'Admin\DistRuangan::updatefoto');
        $routes->post('addfoto', 'Admin\DistRuangan::addfoto');
        $routes->get('(:segment)', 'Admin\DistRuangan::riwayat/$1');
        $routes->get('pdf/(:segment)', 'Admin\DistRuangan::pdf/$1');
    });
    
    $routes->group('inventaris_lainnya', function($routes)
    {
        $routes->get('/', 'Admin\DistLainnya::index');
    });
    
    
    $routes->group('inventaris_tanah', function($routes)
    {
        $routes->get('/', 'Admin\InventarisTanah::index');
        $routes->get('detail/(:segment)', 'Admin\InventarisTanah::detail/$1');
        $routes->get('edit/(:segment)', 'Admin\InventarisTanah::edit/$1');
        $routes->get('add', 'Admin\InventarisTanah::add');
        $routes->get('delete/(:segment)', 'Admin\InventarisTanah::delete/$1');
        $routes->post('update', 'Admin\InventarisTanah::update');
        $routes->post('create', 'Admin\InventarisTanah::create');
        $routes->post('import', 'Admin\InventarisTanah::import');
        $routes->get('sub/(:segment)', 'Admin\InventarisTanah::sub/$1');
    });
    
    $routes->group('inventaris_peralatan', function($routes)
    {
        $routes->get('/', 'Admin\InventarisPeralatan::index');
        $routes->post('import', 'Admin\InventarisPeralatan::import');
        $routes->get('detail/(:segment)', 'Admin\InventarisPeralatan::detail/$1');
        $routes->get('edit/(:segment)', 'Admin\InventarisPeralatan::edit/$1');
        $routes->get('add', 'Admin\InventarisPeralatan::add');
        $routes->get('delete/(:segment)', 'Admin\InventarisPeralatan::delete/$1');
        $routes->post('update', 'Admin\InventarisPeralatan::update');
        $routes->post('create', 'Admin\InventarisPeralatan::create');
        $routes->post('import', 'Admin\InventarisPeralatan::import');
        $routes->get('sub/(:segment)', 'Admin\InventarisTanah::sub/$1');
    });
    
    $routes->group('inventaris_gedung', function($routes)
    {
        $routes->get('/', 'Admin\InventarisGedung::index');
        $routes->post('import', 'Admin\InventarisGedung::import');
        $routes->get('detail/(:segment)', 'Admin\InventarisGedung::detail/$1');
        $routes->get('edit/(:segment)', 'Admin\InventarisGedung::edit/$1');
        $routes->get('add', 'Admin\InventarisGedung::add');
        $routes->get('delete/(:segment)', 'Admin\InventarisGedung::delete/$1');
        $routes->post('update', 'Admin\InventarisGedung::update');
        $routes->post('create', 'Admin\InventarisGedung::create');
        $routes->post('import', 'Admin\InventarisGedung::import');
        $routes->get('sub/(:segment)', 'Admin\InventarisTanah::sub/$1');
    });
    
    $routes->group('inventaris_jalan', function($routes)
    {
        $routes->get('/', 'Admin\InventarisJalan::index');
        $routes->post('import', 'Admin\InventarisJalan::import');
        $routes->get('detail/(:segment)', 'Admin\InventarisJalan::detail/$1');
        $routes->get('edit/(:segment)', 'Admin\InventarisJalan::edit/$1');
        $routes->get('add', 'Admin\InventarisJalan::add');
        $routes->get('delete/(:segment)', 'Admin\InventarisJalan::delete/$1');
        $routes->post('update', 'Admin\InventarisJalan::update');
        $routes->post('create', 'Admin\InventarisJalan::create');
        $routes->post('import', 'Admin\InventarisJalan::import');
        $routes->get('sub/(:segment)', 'Admin\InventarisTanah::sub/$1');
    });
    
    $routes->group('inventaris_asset', function($routes)
    {
        $routes->get('/', 'Admin\InventarisAsset::index');
        $routes->post('import', 'Admin\InventarisAsset::import');
        $routes->get('detail/(:segment)', 'Admin\InventarisAsset::detail/$1');
        $routes->get('edit/(:segment)', 'Admin\InventarisAsset::edit/$1');
        $routes->get('add', 'Admin\InventarisAsset::add');
        $routes->get('delete/(:segment)', 'Admin\InventarisAsset::delete/$1');
        $routes->post('update', 'Admin\InventarisAsset::update');
        $routes->post('create', 'Admin\InventarisAsset::create');
        $routes->post('import', 'Admin\InventarisAsset::import');
        $routes->get('sub/(:segment)', 'Admin\InventarisTanah::sub/$1');
    });
    
    $routes->group('inventaris_konstruksi', function($routes)
    {
        $routes->get('/', 'Admin\InventarisTanah::index');
        $routes->post('import', 'Admin\InventarisTanah::import');
    });
    
    $routes->group('inventaris_takberwujud', function($routes)
    {
        $routes->get('/', 'Admin\InventarisTakBerwujud::index');
        $routes->post('import', 'Admin\InventarisTakBerwujud::import');
        $routes->get('detail/(:segment)', 'Admin\InventarisTakBerwujud::detail/$1');
        $routes->get('edit/(:segment)', 'Admin\InventarisTakBerwujud::edit/$1');
        $routes->get('add', 'Admin\InventarisTakBerwujud::add');
        $routes->get('delete/(:segment)', 'Admin\InventarisTakBerwujud::delete/$1');
        $routes->post('update', 'Admin\InventarisTakBerwujud::update');
        $routes->post('create', 'Admin\InventarisTakBerwujud::create');
        $routes->post('import', 'Admin\InventarisTakBerwujud::import');
        $routes->get('sub/(:segment)', 'Admin\InventarisTanah::sub/$1');
    });
    
    $routes->group('kategori', function($routes)
    {
        $routes->get('/', 'Admin\TwebCategory::index');
        $routes->post('DI_tweb_asset', 'Admin\TwebCategory::DI_tweb_asset');
        $routes->post('create', 'Admin\TwebCategory::create');
        $routes->get('edit/(:segment)', 'Admin\TwebCategory::edit/$1');
        $routes->post('update', 'Admin\TwebCategory::update');
        $routes->get('delete/(:segment)', 'Admin\TwebCategory::delete/$1');
    });
    
    $routes->group('lokasi', function($routes)
    {
        $routes->get('barcode/(:segment)', 'Admin\TwebLokasi::barcode/$1');
        $routes->get('qrcode/(:segment)', 'Admin\TwebLokasi::qrcode/$1');
        
        $routes->get('/', 'Admin\TwebLokasi::index');
        $routes->get('add', 'Admin\TwebLokasi::add');
        $routes->post('create', 'Admin\TwebLokasi::create');
        $routes->post('update', 'Admin\TwebLokasi::update');
        $routes->post('lainnya', 'Admin\TwebLokasi::lainnya');
        $routes->get('delete/(:segment)', 'Admin\TwebLokasi::delete/$1');
        
        $routes->get('group/(:segment)', 'Admin\TwebLokasi::group/$1');
        $routes->post('printgroup/(:segment)', 'Admin\TwebLokasi::printgroup/$1');
        $routes->post('printlist/(:segment)', 'Admin\TwebLokasi::printlist/$1');
        $routes->get('cetak_group/(:segment)', 'Admin\TwebLokasi::cetak_group/$1');
        
        $routes->get('list/(:segment)', 'Admin\TwebLokasi::list/$1');
        $routes->get('cetak_list/(:segment)', 'Admin\TwebLokasi::cetak_list/$1');
    });
    
    $routes->group('gedung', function($routes)
    {
        $routes->get('/', 'Admin\TwebGedung::index');
        $routes->get('(:segment)', 'Admin\TwebGedung::lokasi/$1');
        $routes->get('detail/(:segment)', 'Admin\TwebGedung::detail/$1');
        $routes->get('add', 'Admin\TwebGedung::add');
        $routes->post('create', 'Admin\TwebGedung::create');
        $routes->get('edit/(:any)', 'Admin\TwebGedung::edit/$1');
        $routes->post('update', 'Admin\TwebGedung::update');
        $routes->get('delete/(:segment)', 'Admin\TwebGedung::delete/$1');
    });
    
    $routes->group('lokasi-kategori', function($routes)
    {
        $routes->get('/', 'Admin\TwebLokasiKategori::index');
        $routes->post('create', 'Admin\TwebLokasiKategori::create');
        $routes->post('update', 'Admin\TwebLokasiKategori::update');
        $routes->get('delete/(:segment)/', 'Admin\TwebLokasiKategori::delete/$1');
    });
    
    $routes->group('kondisi', function($routes)
    {
        $routes->get('/', 'Admin\TwebKondisi::index');
        $routes->post('create', 'Admin\TwebKondisi::create');
        $routes->post('update', 'Admin\TwebKondisi::update');
        $routes->get('delete/(:segment)', 'Admin\TwebKondisi::delete/$1');
    });
    
    $routes->group('hak', function($routes)
    {
        $routes->get('/', 'Admin\TwebHak::index');
        $routes->post('create', 'Admin\TwebHak::create');
        $routes->post('update', 'Admin\TwebHak::update');
        $routes->get('delete/(:segment)', 'Admin\TwebHak::delete/$1');
    });
    
    $routes->group('satuan', function($routes)
    {
        $routes->get('/', 'Admin\TwebSatuan::index');
        $routes->post('create', 'Admin\TwebSatuan::create');
        $routes->post('update', 'Admin\TwebSatuan::update');
        $routes->get('delete/(:segment)', 'Admin\TwebSatuan::delete/$1');
    });
    
    $routes->group('perolehan', function($routes)
    {
        $routes->get('/', 'Admin\TwebPerolehan::index');
        $routes->post('create', 'Admin\TwebPerolehan::create');
        $routes->post('update', 'Admin\TwebPerolehan::update');
        $routes->get('delete/(:segment)', 'Admin\TwebPerolehan::delete/$1');
    });
    
    $routes->group('pengguna', function($routes)
    {
        $routes->get('/', 'Admin\TwebPengguna::index');
        $routes->post('create', 'Admin\TwebPengguna::create');
        $routes->post('update', 'Admin\TwebPengguna::update');
        $routes->get('delete/(:segment)', 'Admin\TwebPengguna::delete/$1');
    });
    
    $routes->group('pengguna-kategori', function($routes)
    {
        $routes->get('/', 'Admin\TwebPenggunaKategori::index');
        $routes->post('create', 'Admin\TwebPenggunaKategori::create');
        $routes->post('update', 'Admin\TwebPenggunaKategori::update');
        $routes->get('delete/(:segment)', 'Admin\TwebPenggunaKategori::delete/$1');
    });
    
    $routes->group('user', function($routes)
    {
        $routes->get('/', 'Admin\UserLogin::index');
        $routes->post('create', 'Admin\UserLogin::create');
        $routes->get('reset/(:segment)', 'Admin\UserLogin::reset/$1');
    });
    
    $routes->group('user-profile', function($routes)
    {
        $routes->get('/', 'Admin\UserProfile::index');
        $routes->post('update', 'Admin\UserProfile::update');
    });
    
    $routes->group('mutasi', function($routes)
    {
        $routes->get('/', 'Admin\TransaksiMB::index');
        $routes->post('create', 'Admin\TransaksiMB::create');
        $routes->get('new', 'Admin\TransaksiMB::new');
        $routes->get('delete/(:segment)/', 'Admin\TransaksiMB::delete/$1');
        $routes->get('pencarian_barang', 'Admin\TransaksiMB::cari');
        $routes->get('cetak/(:segment)/', 'Admin\TransaksiPBitem::cetakv2/$1');
    });

    $routes->group('mutasitmp', function($routes)
    {
        $routes->post('create', 'Admin\TransaksiMBtmp::create');
        $routes->post('update', 'Admin\TransaksiMBtmp::update');
        $routes->get('delete/(:segment)', 'Admin\TransaksiMBtmp::delete/$1');
    });
    
    $routes->group('penempatantmp', function($routes)
    {
        $routes->post('create', 'Admin\TransaksiPBtmp::create');
        $routes->post('update', 'Admin\TransaksiPBtmp::update');
        $routes->get('delete/(:segment)', 'Admin\TransaksiPBtmp::delete/$1');
    });
    
    $routes->group('penempatanitem', function($routes)
    {
        $routes->post('create', 'Admin\TransaksiPBitem::create');
        $routes->post('update', 'Admin\TransaksiPBitem::update');
        $routes->get('delete/(:segment)', 'Admin\TransaksiPBitem::delete/$1');
    });
    
    $routes->group('penempatan', function($routes)
    {
        $routes->get('/', 'Admin\TransaksiPB::index');
        $routes->get('new', 'Admin\TransaksiPB::new');
        $routes->get('pencarian_barang', 'Admin\TransaksiPB::cari');
        $routes->post('create', 'Admin\TransaksiPB::create');
        $routes->post('getruangan', 'Admin\TransaksiPB::getruangan');
        $routes->get('delete/(:segment)/', 'Admin\TransaksiPB::delete/$1');
        $routes->get('viewpdf/(:segment)', 'Admin\TransaksiPB::viewpdf/$1');
        
        $routes->post('add_dokumen', 'Admin\TransaksiPB::add_dokumen');
        $routes->post('edit_dokumen', 'Admin\TransaksiPB::ganti_dokumen');
        $routes->get('delete_dokumen/(:segment)/', 'Admin\TransaksiPB::delete_dokumen/$1');
        
        $routes->get('detail/(:segment)/', 'Admin\TransaksiPBitem::detail/$1');
        $routes->get('cetak/(:segment)/', 'Admin\TransaksiPBitem::cetak/$1');
        $routes->get('tmp/(:segment)/', 'Admin\Penempatan::deletetmp/$1');
        
        $routes->get('adddetail', 'Admin\Penempatan::adddetail');
        
        $routes->post('gantidokumen/(:segment)/', 'Admin\Penempatan::gantidokumen/$1');
        $routes->post('hapusdokumen/(:segment)/', 'Admin\Penempatan::hapusdokumen/$1');
        $routes->post('hapusdetail/(:segment)/', 'Admin\Penempatan::hapusdetail/$1');
    });
    
    $routes->group('mutasi', function($routes)
    {
        $routes->get('/', 'Admin\Mutations::index');
        $routes->get('new', 'Admin\Mutations::new');
        $routes->post('create', 'Admin\Mutations::create');
        $routes->get('detail/(:any)', 'Admin\Mutations::detail/$1');
    });
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}