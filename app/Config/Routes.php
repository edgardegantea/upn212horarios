<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'UserController::login');






$routes->get('areas', 'AreaController::index');

$routes->get('registro', 'RegistroController::new');
$routes->post('registro', 'RegistroController::create');




$routes->get('dc', 'DocentesCarrerasController::index');

$routes->get('estatusDelPersonal', 'EstatusDelPersonalController::index');


$routes->match(['get', 'post'], 'logind', 'DocenteController::logind', ["filter" => "noauthd"]);
$routes->match(['get', 'post'], 'login', 'UserController::login', ["filter" => "noauth"]);



// Rutas para el administrador
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Admin\AdminController::index');


    $routes->get('usuarios/edit_password/(:num)', 'Admin\UsuarioController::editPassword/$1'); // Mostrar formulario para editar la contraseña
    $routes->post('usuarios/update_password/(:num)', 'Admin\UsuarioController::updatePassword/$1'); // Actualizar la contraseña del usuario


    $routes->get('usuarios/ud', 'Admin\UsuarioController::usuariosDocentes');


    // Ruta para horarios
    $routes->get('horario', 'HorarioController::horario');

    // Rutas para mapa curricular
    $routes->get('mp', 'Admin\MapaCurricular::index');

    // Rutas para carreras

    // Rutas para información de docente
    $routes->get('dinfo', 'Admin\DocenteInfoController::index');

    // Rutas para docentes
    $routes->get('docentes', 'Admin\DocenteController::index');
    $routes->get('docentes/create', 'Admin\DocenteController::create');
    $routes->post('docentes/store', 'Admin\DocenteController::store');
    $routes->get('docentes/idd', 'Admin\DocenteController::informacionDelDocente');
    
    // Rutas tipo resource
    $routes->resource('usuarios', ['controller' => 'Admin\UsuarioController']);
    $routes->get('usuarios', 'Admin\UsuarioController::index');
    $routes->get('usuarios/create', 'Admin\UsuarioController::create');
    $routes->post('usuarios/store', 'Admin\UsuarioController::store');
    $routes->get('usuarios/edit/(:num)', 'Admin\UsuarioController::edit/$1');
    $routes->post('usuarios/update/(:num)', 'Admin\UsuarioController::update/$1');
    $routes->get('usuarios/delete/(:num)', 'Admin\UsuarioController::delete/$1');



    $routes->get('programacion/createxd', 'ProgramacionController::createxdocente');
    $routes->post('programacion/storexd', 'ProgramacionController::storexdocente');



    $routes->get('programacion/createtbl', 'ProgramacionController::create_table');





    $routes->get('programacion', 'ProgramacionController::index');
    $routes->get('programacion/create', 'ProgramacionController::create');
    $routes->post('programacion/store', 'ProgramacionController::store');
    $routes->get('programacion/edit/(:num)', 'ProgramacionController::edit/$1');
    $routes->post('programacion/update/(:num)', 'ProgramacionController::update/$1');
    $routes->get('programacion/delete/(:num)', 'ProgramacionController::delete/$1');


    // RUTAS DE TIPO RESOURCE
    $routes->resource('asignaturas', ['controller' => 'Admin\AsignaturaController']);
    $routes->resource('carreras', ['controller' => 'Admin\CarreraController']);
    $routes->resource('grupos', ['controller' => 'Admin\GrupoController']);
    $routes->resource('pescolares', ['controller' => 'Admin\PeriodoEscolarController']);
});


// Rutas para el coordinador
$routes->group('coordinador', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Coordinador\CoordinadorController::index');


    $routes->get('usuarios/edit_password/(:num)', 'Coordinador\UsuarioController::editPassword/$1'); // Mostrar formulario para editar la contraseña
    $routes->post('usuarios/update_password/(:num)', 'Coordinador\UsuarioController::updatePassword/$1'); // Actualizar la contraseña del usuario


    $routes->get('usuarios/ud', 'Coordinador\UsuarioController::usuariosDocentes');


    // Rutas tipo resource
    // $routes->resource('usuarios', ['controller' => 'Admin\UsuarioController']);
    $routes->get('usuarios', 'Coordinador\UsuarioController::index');
    $routes->get('usuarios/create', 'Coordinador\UsuarioController::create');
    $routes->post('usuarios/store', 'Coordinador\UsuarioController::store');
    $routes->get('usuarios/edit/(:num)', 'Coordinador\UsuarioController::edit/$1');
    $routes->post('usuarios/update/(:num)', 'Coordinador\UsuarioController::update/$1');
    $routes->get('usuarios/delete/(:num)', 'Coordinador\UsuarioController::delete/$1');

    
    // Rutas para información de docente
    $routes->get('dinfo', 'Coordinador\DocenteInfoController::index');

    // Rutas para docentes
    $routes->get('docentes', 'Coordinador\DocenteController::index');
    $routes->get('docentes/create', 'Coordinador\DocenteController::create');
    $routes->post('docentes/store', 'Coordinador\DocenteController::store');
    $routes->get('docentes/idd', 'Coordinador\DocenteController::informacionDelDocente');

    // RUTAS DE TIPO RESOURCE
    $routes->resource('asignaturas', ['controller' => 'Coordinador\AsignaturaController']);
    $routes->resource('carreras', ['controller' => 'Coordinador\CarreraController']);
    $routes->resource('grupos', ['controller' => 'Coordinador\GrupoController']);
    $routes->resource('pescolares', ['controller' => 'Coordinador\PeriodoEscolarController']);
});

// Rutas para el docente
$routes->group('docente', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Docente\DocenteController::index');
    $routes->group('docenteinfo', ['namespace' => 'App\Controllers'], function ($routes) {
        $routes->get('', 'Docente\DocenteInfoController::index');
        $routes->get('create', 'Docente\DocenteInfoController::create');
        $routes->post('store', 'Docente\DocenteInfoController::store');
        $routes->get('edit/(:num)', 'Docente\DocenteInfoController::edit/$1');
        $routes->post('update/(:num)', 'Docente\DocenteInfoController::update/$1');
        $routes->add('delete/(:num)', 'Docente\DocenteInfoController::delete/$1');
    });

    


    $routes->group('expediente', ['namespace' => 'App\Controllers'], function($routes) {
        $routes->get('/', 'Docente\ExpedienteController::index');
        $routes->get('create', 'Docente\ExpedienteController::create');
        $routes->post('store', 'Docente\ExpedienteController::store');
        $routes->get('edit/(:num)', 'Docente\ExpedienteController::edit/$1');
        $routes->post('update/(:num)', 'Docente\ExpedienteController::update/$1');
        $routes->get('delete/(:num)', 'Docente\ExpedienteController::delete/$1');
    });

    
});

// Rutas para el alumno
$routes->group('alumno', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Alumno\AlumnoController::index');
});


$routes->get('logout', 'UserController::logout');
$routes->get('logoutd', 'DocenteController::logoutd');
