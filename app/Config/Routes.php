<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

$routes->group('articles', static function ($routes) {
    $routes->get('create', 'ArticleController::create');        // Form tambah artikel
    $routes->post('', 'ArticleController::store');              // Simpan artikel baru
    $routes->get('(:segment)', 'ArticleController::show/$1');   // Detail artikel
    $routes->get('edit/(:segment)', 'ArticleController::edit/$1'); // Form edit artikel
    $routes->post('update/(:segment)', 'ArticleController::update/$1'); // Update artikel
    $routes->get('delete/(:segment)', 'ArticleController::delete/$1'); // Hapus artikel
});