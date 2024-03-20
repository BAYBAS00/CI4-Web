<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dosen', 'Dosen::index');
$routes->get('/tambah_dosen', 'Dosen::create');
$routes->post('/store_dosen','Dosen::store');
$routes->get('/edit_dosen/(:num)', 'Dosen::edit/$1');
$routes->post('/update_dosen/(:num)', 'Dosen::update/$1');
$routes->get('/hapus_dosen/(:num)', 'Dosen::destroy/$1');