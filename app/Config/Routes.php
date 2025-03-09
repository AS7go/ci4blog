<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/list', 'Lis::list');
$routes->get('/tasks', 'Tasks::index');
$routes->get('/tasks/(:num)', 'Tasks::show/$1');
$routes->get('/tasks/new', 'Tasks::new');
$routes->post('/tasks/store', 'Tasks::store');
$routes->get('/tasks/edit/(:num)', 'Tasks::edit/$1');
$routes->post('/tasks/update/(:num)', 'Tasks::update/$1');
$routes->delete('/tasks/delete/(:num)', 'Tasks::delete/$1');


$routes->get('/signup/new', 'Signup::new');
$routes->post('/signup/store', 'Signup::store');
$routes->get('/signup/success', 'Signup::success');
$routes->get('/login/login-form', 'Login::loginForm');
$routes->get('/logout', 'Login::logout');
$routes->post('/login/store', 'Login::store');

$routes->get('/users', 'UserController::users');
$routes->get('/users/(:num)', 'UserController::user/$1');
$routes->delete('/users/delete/(:num)', 'UserController::delete/$1');
$routes->get('/users/edit/(:num)', 'UserController::edit/$1');
$routes->post('/users/update/(:num)', 'UserController::update/$1');