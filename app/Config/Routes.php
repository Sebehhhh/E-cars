<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('auth/login', 'Auth::login');
$routes->post('auth/loginSubmit', 'Auth::loginSubmit');
$routes->get('auth/logout', 'Auth::logout');

$routes->get('profile', 'Profile::index');
$routes->post('profile/update', 'Profile::update');
$routes->post('profile/changePassword', 'Profile::changePassword');

$routes->get('pengguna', 'Pengguna::index');
$routes->get('pengguna/tambah', 'Pengguna::tambah');
$routes->post('pengguna/simpan', 'Pengguna::simpan');
$routes->get('pengguna/edit/(:num)', 'Pengguna::edit/$1');
$routes->post('pengguna/update/(:num)', 'Pengguna::update/$1');
$routes->get('pengguna/hapus/(:num)', 'Pengguna::hapus/$1');

// Kategori Sarana Routes
$routes->get('kategori-sarana', 'Kategori::index');
$routes->get('kategori-sarana/tambah', 'Kategori::tambah');
$routes->post('kategori-sarana/simpan', 'Kategori::simpan');
$routes->get('kategori-sarana/edit/(:num)', 'Kategori::edit/$1');
$routes->post('kategori-sarana/update/(:num)', 'Kategori::update/$1');
$routes->post('kategori-sarana/delete/(:num)', 'Kategori::delete/$1');

$routes->get('sarana', 'Sarana::index');
$routes->get('sarana/tambah', 'Sarana::tambah');
$routes->post('sarana/simpan', 'Sarana::simpan');
$routes->get('sarana/edit/(:num)', 'Sarana::edit/$1');
$routes->post('sarana/update/(:num)', 'Sarana::update/$1');
$routes->post('sarana/delete/(:num)', 'Sarana::delete/$1');

$routes->group('kursi', function($routes) {
    $routes->get('/', 'Kursi::index'); // Menampilkan daftar kursi
    $routes->get('tambah', 'Kursi::tambah'); // Menampilkan form tambah kursi
    $routes->post('store', 'Kursi::store'); // Menyimpan kursi baru
    $routes->get('edit/(:num)', 'Kursi::edit/$1'); // Menampilkan form edit kursi
    $routes->post('update/(:num)', 'Kursi::update/$1'); // Memperbarui kursi
    $routes->get('delete/(:num)', 'Kursi::delete/$1'); // Menghapus kursi
});

$routes->get('/booking', 'Booking::index');
$routes->get('/booking/tambah', 'Booking::tambah');
$routes->post('/booking/simpan', 'Booking::simpan');
$routes->get('api/kursi/(:num)', 'Booking::getKursi/$1');
$routes->get('booking/batal/(:num)', 'Booking::batal/$1');
$routes->get('booking/selesai/(:num)', 'Booking::selesai/$1');



