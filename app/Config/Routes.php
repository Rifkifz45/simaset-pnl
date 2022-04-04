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
$routes->setDefaultController('Home');
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
$routes->get('/', 'Login::index');
$routes->group('/', function ($routes) {
    $routes->get('/', 'Login::index');
    $routes->get('user-login', 'Login::login');
});

$routes->group('admin', function ($routes) {
    $routes->get('/', 'Admin\Admin::index');
    $routes->post('datatable', 'Admin\Admin::datatable');
    $routes->post('datatable1', 'Admin\Admin::datatable1');
    $routes->get('user', 'Admin\User::index');
    $routes->get('user/create', 'Admin\User::create');
    $routes->get('master-asset', 'Admin\Category::viewcategory');

        $routes->group('categories', function ($routes) {
            $routes->get('/', 'Admin\Category::index');
            $routes->get('tanah', 'Admin\Fields::fieldstanah');
            $routes->get('peralatan-mesin', 'Admin\Fields::fieldsmesin');
            $routes->get('gedung-bangunan', 'Admin\Fields::fieldsgedung');
            $routes->get('irigasi', 'Admin\Fields::fieldsirigasi');
            $routes->get('aset-lainnya', 'Admin\Fields::fieldslainnya');
            $routes->get('konstruksi', 'Admin\Fields::fieldskonstruksi');
            $routes->get('tak-berwujud', 'Admin\Fields::fieldsintangible');

            $routes->post('create', 'Admin\Category::create');
        });

        $routes->group('location-rooms', function ($routes) {
            $routes->get('/', 'Admin\Rooms::index');
            $routes->get('(:segment)/', 'Admin\Rooms::detail/$1');

            $routes->post('create', 'Admin\Rooms::create');
        });

        $routes->group('location-buildings', function ($routes) {
            $routes->get('/', 'Admin\Gedung::index');
            $routes->get('(:segment)/', 'Admin\Gedung::detail/$1');
            $routes->post('create', 'Admin\Gedung::create');
            $routes->post('update', 'Admin\Gedung::update');
            $routes->get('delete/(:segment)/', 'Admin\Gedung::delete/$1');

            $routes->post('createfloors', 'Admin\Floors::create');
            $routes->post('updatefloors', 'Admin\Floors::update');
            $routes->get('deletefloors/(:segment)/', 'Admin\Floors::delete/$1');

        });

        $routes->group('fields', function ($routes) {
            $routes->post('create', 'Admin\Fields::create');
            $routes->post('update', 'Admin\Fields::update');
        });

        $routes->group('groups', function ($routes) {
            $routes->get('(:segment)/', 'Admin\Groups::index/$1');
            $routes->get('detail/(:segment)/', 'Admin\Sgroups::index/$1/');
            $routes->get('detailsub/(:any)/', 'Admin\Ssgroups::index/$1/');

            $routes->post('create', 'Admin\Groups::create');
            $routes->post('createsub', 'Admin\Sgroups::createsub');
            $routes->post('createsubsub', 'Admin\Ssgroups::createsubsub');
            $routes->post('update', 'Admin\Groups::update');
            $routes->post('updatesub', 'Admin\Sgroups::updatesub');
            $routes->post('updatesubsub', 'Admin\Ssgroups::updatesubsub');
        });

        $routes->group('peralatan-mesin', function ($routes) {
            $routes->get('/', 'Admin\Mesin::index');
            $routes->get('view-import', 'Admin\Mesin::viewimport');
            $routes->post('proses-import', 'Admin\Mesin::prosesimport');
            $routes->get('view-data/(:any)', 'Admin\Mesin::viewdata/$1');
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
