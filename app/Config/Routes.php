<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('docentes', 'DocenteController::index');
$routes->get('areas', 'AreaController::index');
$routes->get('carreras', 'CarreraController::index');
$routes->get('dinfo', 'DocenteInfoController::index');
$routes->get('dc', 'DocentesCarrerasController::index');
