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

// Rutas adicionales para el blog
$routes->get('/about', function() {
    return view('pages/about', ['title' => 'Acerca de - MiniBlog']);
});

$routes->get('/contact', function() {
    return view('pages/contact', ['title' => 'Contacto - MiniBlog']);
});

$routes->get('/categories', function() {
    return view('pages/categories', ['title' => 'Categorías - MiniBlog']);
});

$routes->get('/archive', function() {
    return view('pages/archive', ['title' => 'Archivo - MiniBlog']);
});


$routes->group('admin',static function($routes){
    $routes->get('dashboard','Admin::dashboard');
    $routes->get('posts/all','Admin::index');
    $routes->get('posts/create', 'Admin::create');
    $routes->get('posts/edit/(:num)', 'Admin::edit/$1');

    //insercion
    $routes->post('posts/store','Admin::store');
});