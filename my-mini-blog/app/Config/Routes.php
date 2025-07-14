<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'Posts::index');

// Rutas para posts
$routes->group('posts', function($routes) {
    $routes->get('/', 'Posts::index');
    $routes->get('(:segment)', 'Posts::show/$1');
});

$routes->group('admin',static function($routes){
    $routes->get('dashboard','Admin::dashboard');
    $routes->get('posts/all','Admin::index');
    $routes->get('posts/create', 'Admin::create');
    $routes->get('posts/edit/(:num)', 'Posts::edit/$1');

    //insercion
    $routes->post('posts/store','Posts::store');
    $routes->post('posts/update','Posts::update');
    $routes->post('posts/delete','Posts::delete');

    //categories
    $routes->get('categories/index','Categories::index');
    $routes->get('categories/create','Categories::create');
    $routes->post('categories/store','Categories::store');
});