<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('user', 'User::index');
$routes->post('user-insert', 'User::create');
$routes->match(['post', 'options'], 'AddUser/user', 'User::create');  
$routes->match(['put', 'options'], 'Update/user/(:segment)', 'User::update/$1');  // Corrected method name to 'create'
$routes->match(['put', 'options'], 'EditUser/user/(:segment)', 'User::update/$1');
$routes->match(['delete', 'options'], 'Delete/user/(:segment)', 'User::delete/$1');

// Transaksi routes
// app/Config/Routes.php

$routes->group('transaksi', ['namespace' => 'App\Controllers'], function($routes)
{
    $routes->get('/', 'Transaksi::index');
    $routes->get('(:num)', 'Transaksi::show/$1');
    $routes->post('create', 'Transaksi::create');
    $routes->put('update/(:num)', 'Transaksi::update/$1');
    $routes->delete('delete/(:num)', 'Transaksi::delete/$1');
});
