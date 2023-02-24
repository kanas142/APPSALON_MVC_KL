<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\LoginControllers;
use Controllers\CitaController;
use Controllers\APIController;
use Controllers\ServicioController;
use MVC\Router;

$router = new Router();

//Iniciar Sesion

$router->get('/',[LoginControllers::class,'login']);
$router->post('/',[LoginControllers::class,'login']);
$router->get('/logout',[LoginControllers::class,'logout']);

// Recuperar Password

$router->get('/olvide',[LoginControllers::class,'olvide']);
$router->post('/olvide',[LoginControllers::class,'olvide']);
$router->get('/recuperar',[LoginControllers::class,'recuperar']);
$router->post('/recuperar',[LoginControllers::class,'recuperar']);


// Crear-cuenta

$router->get('/crear-cuenta',[LoginControllers::class,'crear']);
$router->post('/crear-cuenta',[LoginControllers::class,'crear']);

// Confirmar-Cuenta

$router->get('/confirmar-cuenta',[LoginControllers::class,'confirmar']);
$router->get('/mensaje',[LoginControllers::class,'mensaje']);

// Area privada

$router->get('/cita',[CitaController::class,'index']);
$router->get('/admin',[AdminController::class,'index']);

//API citas

$router->get('/api/servicios',[APIController::class,'index']);
$router->post('/api/citas',[APIController::class,'guardar']);
$router->post('/api/eliminar',[APIController::class,'eliminar']);

//CRUD Servicios

$router->get('/servicios',[ServicioController::class,'index']);
$router->get('/servicios/crear',[ServicioController::class,'crear']);
$router->post('/servicios/crear',[ServicioController::class,'crear']);
$router->get('/servicios/actualizar',[ServicioController::class,'actualizar']);
$router->post('/servicios/actualizar',[ServicioController::class,'actualizar']);
$router->post('/servicios/eliminar',[ServicioController::class,'eliminar']);



// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();