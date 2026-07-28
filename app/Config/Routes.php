<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/productos', 'Productos::index');
$routes->get('/productos/crear', 'Productos::crear');
$routes->post('/productos/guardar', 'Productos::guardar');
$routes->get('/productos/editar/(:num)', 'Productos::editar/$1');
$routes->post('/productos/actualizar/(:num)', 'Productos::actualizar/$1');
$routes->get('/productos/eliminar/(:num)', 'Productos::eliminar/$1');
$routes->resource('api/productos', ['controller' => 'ApiProductos']);
//$routes->resource('productos');