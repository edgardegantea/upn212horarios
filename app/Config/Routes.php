<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');





$routes->get('areas', 'AreaController::index');





$routes->get('dc', 'DocentesCarrerasController::index');

$routes->get('expedientes', 'ExpedienteController::index');
$routes->get('estatusDelPersonal', 'EstatusDelPersonalController::index');


$routes->match(['get', 'post'], 'logind', 'DocenteController::logind', ["filter" => "noauthd"]);
$routes->match(['get', 'post'], 'login', 'UserController::login', ["filter" => "noauth"]);



// Rutas para el administrador
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Admin\AdminController::index');

    // Rutas para mapa curricular
    $routes->get('mp', 'Admin\MapaCurricular::index');

    // Rutas para carreras
    $routes->get('carreras', 'Admin\CarreraController::index');
    $routes->get('carreras/create', 'Admin\CarreraController::create');
    $routes->post('carreras/store', 'Admin\CarreraController::store');

    // Rutas para información de docente
    $routes->get('dinfo', 'Admin\DocenteInfoController::index');

    // Rutas para docentes
    $routes->get('docentes', 'Admin\DocenteController::index');
    $routes->get('docentes/create', 'Admin\DocenteController::create');
    $routes->post('docentes/store', 'Admin\DocenteController::store');
    
    // Rutas tipo resource
    $routes->resource('usuarios', ['controller' => 'Admin\UsuarioController']);
});


// Rutas para el coordinador
$routes->group('coordinador', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Coordinador\CoordinadorController::index');
});

// Rutas para el docente
$routes->group('docente', ['filter' => 'authd'], function ($routes) {
    $routes->get('/', 'Docente\DocenteController::index');
});

// Rutas para el alumno
$routes->group('alumno', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Alumno\AlumnoController::index');
});


$routes->get('logout', 'UserController::logout');
$routes->get('logoutd', 'DocenteController::logoutd');
