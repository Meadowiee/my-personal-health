<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', '\App\Modules\Emergency\Controllers\Emergency::index');

$routes->group('login', static function($routes) {
    $routes->get('/', '\App\Modules\Auth\Controllers\Login::index');
    $routes->post('auth', '\App\Modules\Auth\Controllers\Login::auth');
});

$routes->group('signup', static function($routes) {
    $routes->get('/', '\App\Modules\Auth\Controllers\Signup::index');
    $routes->post('auth', '\App\Modules\Auth\Controllers\Signup::auth');
});

$routes->group('user', ['namespace' => 'App\Modules\User\Controllers'], function($routes) {
    $routes->get('edit', 'User::edit');
    $routes->post('update/(:num)', 'User::update/$1');
    $routes->resource('', ['controller' => 'User']);
});

$routes->group('checkup', ['namespace' => 'App\Modules\CheckUp\Controllers'], function($routes) {
    $routes->get('', 'CheckUp::index');
    $routes->get('add', 'CheckUp::add');
    $routes->get('show/(:num)', 'CheckUp::show/$1');
    $routes->get('edit/(:num)', 'CheckUp::edit/$1');
    $routes->get('delete/(:num)', 'CheckUp::delete/$1');
    $routes->get('uploads/(:num)', 'CheckUp::uploads/$1');
    $routes->post('create', 'CheckUp::create');
    $routes->post('update/(:num)', 'CheckUp::update/$1');
});

$routes->group('logs', ['namespace' => 'App\Modules\Logs\Controllers'], function($routes) {
    $routes->get('', 'Logs::index');
    $routes->get('add', 'Logs::add');
    $routes->get('show/(:num)', 'Logs::show/$1');
    $routes->get('edit/(:num)', 'Logs::edit/$1');
    $routes->get('delete/(:num)', 'Logs::delete/$1');
    $routes->get('uploads/(:num)', 'Logs::uploads/$1');
    $routes->post('create', 'Logs::create');
    $routes->post('update/(:num)', 'Logs::update/$1');
});

$routes->get('linkedfiles', '\App\Modules\LinkedFiles\Controllers\LinkedFiles::index');

$routes->get('logout', '\App\Modules\Auth\Controllers\Login::logout');
