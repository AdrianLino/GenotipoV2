<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('admin', 'AdminController::index', ['filter' => 'login']);


$routes->get('articulos', 'ArticulosController::index');
$routes->get('articulos/nuevo', 'ArticulosController::nuevo');
$routes->post('articulos/guardar', 'ArticulosController::guardar');
$routes->get('articulos/editar/(:segment)', 'ArticulosController::editar/$1');
$routes->post('articulos/actualizar', 'ArticulosController::actualizar');
$routes->get('articulos/eliminar/(:segment)', 'ArticulosController::eliminar/$1');