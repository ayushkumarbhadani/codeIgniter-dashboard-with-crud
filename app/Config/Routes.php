<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->post('/', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::register');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/edit/(:num)', 'Dashboard::edit/$1');
$routes->post('/dashboard/edit/(:num)', 'Dashboard::edit/$1');
$routes->post('/users/block/(:num)', 'Dashboard::blockUser/$1/block');
$routes->post('/users/unblock/(:num)', 'Dashboard::blockUser/$1/unblock');
$routes->post('/users/delete/(:num)', 'Dashboard::deleteUser/$1');
$routes->get('/logout', 'Auth::logout');