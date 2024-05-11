<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dosen', 'Dosen::index');
$routes->get('/tambah_dosen', 'Dosen::create');
$routes->post('/store_dosen', 'Dosen::store');
$routes->get('/edit_dosen/(:num)', 'Dosen::edit/$1');
$routes->post('/update_dosen/(:num)', 'Dosen::update/$1');
$routes->get('/hapus_dosen/(:num)', 'Dosen::destroy/$1');
$routes->get('/register', 'Register::index', ['as' => 'Register']);
$routes->post('/register/process', 'Register::process');
$routes->get('/login', 'Login::index', ['as' => 'Login']);
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');
$routes->get('/transaksi', 'Transaksi::index');
$routes->get('/tambah_transaksi', 'Transaksi::create');
$routes->post('/store_transaksi', 'Transaksi::store');
$routes->get('/barang', 'Barang::index');
$routes->get('/barang/(:num)', 'Barang::detail/$1');
$routes->get('/tambah_barang', 'Barang::create');
$routes->post('/store_barang', 'Barang::store');
$routes->get('/customer', 'Customer::index');
$routes->get('/tambah_customer', 'Customer::create');
$routes->post('/store_customer', 'Customer::store');
