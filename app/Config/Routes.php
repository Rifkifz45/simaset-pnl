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
$routes->get('/page-login', 'UserLogin::pagelogin');
$routes->post('login/proses', 'UserLogin::proses');

$routes->group('approver', function($routes){
    $routes->get('/', 'Approver\approver::index');

    $routes->group('penempatan', function ($routes) {
            $routes->get('/', 'Approver\TransaksiPB::index');
            $routes->get('viewpdf/(:segment)', 'Approver\TransaksiPB::viewpdf/$1');
            $routes->get('cetak/(:segment)', 'Approver\TransaksiPB::cetak/$1');

            $routes->post('tolak/(:segment)/', 'Approver\TransaksiPB::reject/$1');
            $routes->post('terima/(:segment)/', 'Approver\TransaksiPB::accept/$1');
        });

    $routes->group('inventaris_ruangan', function ($routes) {
            $routes->get('/', 'Approver\DistInventarisRuangan::index');
        });
});

$routes->group('admin', function ($routes) {
    $routes->get('/', 'Admin\Admin::index');
    $routes->get('DT_inventaris_peralatan', 'Admin\Admin::DT_inventaris_peralatan');
    $routes->post('DI_inventaris_peralatan', 'Admin\Admin::DI_inventaris_peralatan');
    $routes->get('inventaris', 'Admin\TwebCategory::viewinventaris');

        $routes->group('inventaris_ruangan', function ($routes) {
            $routes->get('/', 'Admin\DistRuangan::index');
        });

        $routes->group('inventaris_lainnya', function ($routes) {
            $routes->get('/', 'Admin\DistLainnya::index');
        });


        $routes->group('inventaris_tanah', function ($routes) {
            $routes->get('/', 'Admin\InventarisTanah::index');
            $routes->post('import', 'Admin\InventarisTanah::import');
        });

        $routes->group('inventaris_peralatan', function ($routes) {
            $routes->get('/', 'Admin\InventarisPeralatan::index');
            $routes->post('import', 'Admin\InventarisPeralatan::import');
        });

        $routes->group('inventaris_gedung', function ($routes) {
            $routes->get('/', 'Admin\InventarisTanah::index');
            $routes->post('import', 'Admin\InventarisTanah::import');
        });

        $routes->group('inventaris_jalan', function ($routes) {
            $routes->get('/', 'Admin\InventarisTanah::index');
            $routes->post('import', 'Admin\InventarisTanah::import');
        });

        $routes->group('inventaris_asset', function ($routes) {
            $routes->get('/', 'Admin\InventarisTanah::index');
            $routes->post('import', 'Admin\InventarisTanah::import');
        });

        $routes->group('inventaris_konstruksi', function ($routes) {
            $routes->get('/', 'Admin\InventarisTanah::index');
            $routes->post('import', 'Admin\InventarisTanah::import');
        });

        $routes->group('inventaris_takberwujud', function ($routes) {
            $routes->get('/', 'Admin\InventarisTanah::index');
            $routes->post('import', 'Admin\InventarisTanah::import');
        });

        $routes->group('kategori', function ($routes) {
            $routes->get('/', 'Admin\TwebCategory::index');
            $routes->post('DI_tweb_asset', 'Admin\TwebCategory::DI_tweb_asset');
            $routes->post('create', 'Admin\TwebCategory::create');
            $routes->post('update', 'Admin\TwebCategory::update');
            $routes->get('delete/(:segment)', 'Admin\TwebCategory::delete/$1');
        });

        $routes->group('lokasi', function ($routes) {
            $routes->get('/', 'Admin\TwebLokasi::index');
            $routes->get('add', 'Admin\TwebLokasi::add');
            $routes->post('create', 'Admin\TwebLokasi::create');
            $routes->post('update', 'Admin\TwebLokasi::update');
            $routes->post('lainnya', 'Admin\TwebLokasi::lainnya');
            $routes->get('delete/(:segment)', 'Admin\TwebLokasi::delete/$1');

            $routes->get('group/(:segment)', 'Admin\TwebLokasi::group/$1');
            $routes->get('list/(:segment)', 'Admin\TwebLokasi::list/$1');
        });

        $routes->group('gedung', function ($routes) {
            $routes->get('/', 'Admin\TwebGedung::index');
            $routes->get('add', 'Admin\TwebGedung::add');
            $routes->post('create', 'Admin\TwebGedung::create');
            $routes->get('edit/(:any)', 'Admin\TwebGedung::edit/$1');
            $routes->post('update', 'Admin\TwebGedung::update');
            $routes->get('delete/(:segment)', 'Admin\TwebGedung::delete/$1');
        });

        $routes->group('lokasi-kategori', function ($routes) {
            $routes->get('/', 'Admin\TwebLokasiKategori::index');
            $routes->post('create', 'Admin\TwebLokasiKategori::create');
            $routes->post('update', 'Admin\TwebLokasiKategori::update');
            $routes->get('delete/(:segment)/', 'Admin\TwebLokasiKategori::delete/$1');
        });

        $routes->group('kondisi', function ($routes) {
            $routes->get('/', 'Admin\TwebKondisi::index');
            $routes->post('create', 'Admin\TwebKondisi::create');
            $routes->post('update', 'Admin\TwebKondisi::update');
            $routes->get('delete/(:segment)', 'Admin\TwebKondisi::delete/$1');
        });

        $routes->group('hak', function ($routes) {
            $routes->get('/', 'Admin\TwebHak::index');
            $routes->post('create', 'Admin\TwebHak::create');
            $routes->post('update', 'Admin\TwebHak::update');
            $routes->get('delete/(:segment)', 'Admin\TwebHak::delete/$1');
        });

        $routes->group('satuan', function ($routes) {
            $routes->get('/', 'Admin\TwebSatuan::index');
            $routes->post('create', 'Admin\TwebSatuan::create');
            $routes->post('update', 'Admin\TwebSatuan::update');
            $routes->get('delete/(:segment)', 'Admin\TwebSatuan::delete/$1');
        });

        $routes->group('perolehan', function ($routes) {
            $routes->get('/', 'Admin\TwebPerolehan::index');
            $routes->post('create', 'Admin\TwebPerolehan::create');
            $routes->post('update', 'Admin\TwebPerolehan::update');
            $routes->get('delete/(:segment)', 'Admin\TwebPerolehan::delete/$1');
        });

         $routes->group('pengguna', function ($routes) {
            $routes->get('/', 'Admin\TwebPengguna::index');
            $routes->post('create', 'Admin\TwebPengguna::create');
            $routes->post('update', 'Admin\TwebPengguna::update');
            $routes->get('delete/(:segment)', 'Admin\TwebPengguna::delete/$1');
        });

         $routes->group('pengguna-kategori', function ($routes) {
            $routes->get('/', 'Admin\TwebPenggunaKategori::index');
            $routes->post('create', 'Admin\TwebPenggunaKategori::create');
            $routes->post('update', 'Admin\TwebPenggunaKategori::update');
            $routes->get('delete/(:segment)', 'Admin\TwebPenggunaKategori::delete/$1');
        });

         $routes->group('penempatantmp', function($routes){
            $routes->post('update', 'Admin\TransaksiPBtmp::update');
            $routes->get('delete/(:segment)', 'Admin\TransaksiPBtmp::delete/$1');
         });

         $routes->group('penempatanitem', function($routes){
            $routes->post('create', 'Admin\TransaksiPBitem::create');
            $routes->post('update', 'Admin\TransaksiPBitem::update');
            $routes->get('delete/(:segment)', 'Admin\TransaksiPBitem::delete/$1');
         });

        $routes->group('penempatan', function ($routes) {
            $routes->get('/', 'Admin\TransaksiPB::index');
            $routes->get('new', 'Admin\TransaksiPB::new');
            $routes->get('pencarian_barang', 'Admin\TransaksiPB::cari');
            $routes->post('create', 'Admin\TransaksiPB::create');
            $routes->post('getruangan', 'Admin\TransaksiPB::getruangan');
            $routes->post('form_tambah', 'Admin\TransaksiPB::form_tambah');
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

        $routes->group('mutasi', function ($routes) {
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
