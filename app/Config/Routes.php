<?php

use CodeIgniter\Router\RouteCollection;
use Myth\Auth\Config\Auth as AuthConfig;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group('', ['filter' => 'login'], function($routes) {
$routes->get('about', 'Page::about');
$routes->get('contact', 'Page::contact');
$routes->get('faqs', 'Page::faqs');
$routes->get('news', 'News::index');
$routes->get('news/(:any)', 'News::viewNews/$1');
});

$routes->group('admin', ['filter' => 'role:admin'], function($routes) {
    $routes->get('/', 'AdminHome::index'); // optional
    
    $routes->get('news', 'NewsAdmin::index');
    $routes->get('news/(:segment)/preview', 'NewsAdmin::preview/$1');
    $routes->add('news/new', 'NewsAdmin::create');
    $routes->add('news/(:segment)/edit', 'NewsAdmin::edit/$1');
    $routes->get('news/(:segment)/delete', 'NewsAdmin::delete/$1');

    // 🔥 Tambah logout khusus admin
    $routes->get('logout', 'AuthCustom::logout');
    $routes->post('auth/logout', function() {
        service('authentication')->logout();
        return redirect()->to('/');
    });
});

$routes->get('auth/google', 'GoogleController::login');
$routes->get('auth/google-callback', 'GoogleController::callback');
