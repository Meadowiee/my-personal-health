<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', '\App\Modules\Home\Controllers\Home::index');

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

$routes->get('logout', '\App\Modules\Auth\Controllers\Login::logout');
