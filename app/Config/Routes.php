<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setAutoRoute(false);
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->post('/chart-transaksi', 'Grafik::showChartTransaksi');

$routes->post('/chart-transaksi2', 'Grafik::showChartTransaksi');


$routes->group('motor', function ($a) {
$a->get('/', 'Motor::index');
$a->get('tambah', 'Motor::tambah');
$a->post('tambah', 'Motor::save');
$a->get('ubah/(:any)', 'Motor::ubah/$1');
$a->post('ubah/(:any)', 'Motor::update/$1');
// $a->get('(:any)', 'Motor::detail/$1');
$a->delete('(:num)', 'Motor::delete/$1');

});

$routes->group('pelanggan', function ($b) {
    $b->get('/', 'Pelanggan::index');
    $b->get('tambah', 'Pelanggan::tambah');
    $b->post('tambah', 'Pelanggan::save');
    $b->get('ubah/(:any)', 'Pelanggan::ubah/$1');
    $b->post('ubah/(:any)', 'Pelanggan::update/$1');
    // $a->get('(:any)', 'Motor::detail/$1');
    $b->delete('(:num)', 'Pelanggan::delete/$1');
    
    });

    $routes->group('servis', function ($c) {
        $c->get('/', 'Servis::index');
        $c->post('/', 'Servis::index');
        $c->get('tambah', 'Servis::tambah');
        $c->post('tambah', 'Servis::save');
      
        $c->post('ubah/(:any)', 'Servis::update/$1');
        $c->get('ubah/(:any)', 'Servis::ubah/$1');
        $c->get('(:any)', 'Servis::detail/$1');
        $c->delete('(:num)', 'Servis::delete/$1');
        
        });

    $routes->group('pengembalian', function ($c) {
        $c->get('/', 'Pengembalian::index');
        $c->get('tambah', 'Pengembalian::tambah');
        $c->post('tambah', 'Pengembalian::save');
        $c->get('ubah/(:any)', 'Pengembalian::ubah/$1');
        $c->post('ubah/(:any)', 'Pengembalian::update/$1');
        // $c->get('(:any)', 'Pengembalian::detail/$1');
        $c->delete('(:num)', 'Pengembalian::delete/$1');
        
        });

$routes->group('users', function ($c) {
    $c->get('/', 'Users::index');
    $c->get('tambah', 'Users::tambah');
    $c->post('tambah', 'Users::save');
    // $c->get('ubah/(:any)', 'Pengembalian::ubah/$1');
    // $c->post('ubah/(:any)', 'Pengembalian::update/$1');
    // $c->get('(:any)', 'Pengembalian::detail/$1');
    $c->delete('(:num)', 'Users::delete/$1');
    
    });        
        
$routes->get('/profile', 'Profile::index');
// $routes->get('/auth', 'Auth::login');
// $routes->get('/auth/register', 'Auth::register');
// $routes->get('/auth/logout', 'Auth::logout');
// $routes->post('/auth/lanjut', 'Auth::lanjut');

$routes->group('sewa', function ($c) {
    $c->get('/', 'Sewa::index');
    $c->get('nota/(:any)', 'Sewa::nota/$1');
    $c->get('tambah', 'Sewa::tambah');
    $c->post('tambah', 'Sewa::save');
    $c->get('ubah/(:any)', 'Sewa::ubah/$1');
    $c->post('ubah/(:any)', 'Sewa::update/$1');
    // $c->get('nota', 'Sewa::nota/$1');
    $c->delete('(:num)', 'Sewa::delete/$1');
    $c->get('report', 'Sewa::report');
    $c->post('report', 'Sewa::report');
    $c->get('exportpdf', 'Sewa::exportPDF');
    $c->post('exportpdf', 'Sewa::exportPDF');
});



// $routes->get('/pengembalian', 'Pengembalian::index');
// $routes->get('/servis', 'Servis::index');
$routes->get('/sewa/laporan', 'Laporan1::lapor');
$routes->get('/user', 'User::index');
$routes->get('/grafik', 'Grafik::index');


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
