<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Route Registrasi & Login
$routes->post('registrasi', 'RegistrasiController::registrasi');
$routes->options('registrasi', 'RegistrasiController::registrasi');

$routes->post('login', 'LoginController::login');
$routes->options('login', 'LoginController::login');

// Route Produk (CRUD)
$routes->get('produk', 'ProdukController::list');
$routes->post('produk', 'ProdukController::create');
$routes->get('produk/(:num)', 'ProdukController::detail/$1');
$routes->put('produk/(:num)', 'ProdukController::ubah/$1');
$routes->delete('produk/(:num)', 'ProdukController::hapus/$1');

$routes->options('produk', 'ProdukController::list');
$routes->options('produk/(:num)', 'ProdukController::list');