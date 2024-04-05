<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('tendencia-actual/(:segment)', 'Home::tendenciaActual/$1');

$routes->get('admin', 'AdminController::index', ['filter' => 'login']);
$routes->get('articulos', 'ArticulosController::index', ['filter' => 'login']);
$routes->get('articulos/nuevo', 'ArticulosController::nuevo',['filter' => 'login']);
$routes->post('articulos/guardar', 'ArticulosController::guardar', ['filter' => 'login']);
$routes->get('articulos/editar/(:segment)', 'ArticulosController::editar/$1', ['filter' => 'login']);
$routes->post('articulos/actualizar', 'ArticulosController::actualizar', ['filter' => 'login']);
$routes->get('articulos/eliminar/(:segment)', 'ArticulosController::eliminar/$1', ['filter' => 'login']);