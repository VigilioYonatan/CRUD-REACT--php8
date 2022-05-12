<?php

require_once __DIR__.'/includes/app.php';
use MVC\Router;
use Controller\WebController;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: access');
header('Access-Control-Allow-Methods: GET,POST');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');




$router = new Router();

$router->post('/api/getUser',[WebController::class, 'getUser']);
$router->get('/api/getAllUser',[WebController::class, 'getAllUser']);
$router->post('/api/eliminarUser',[WebController::class, 'eliminarUser']);
$router->post('/api/editarUser',[WebController::class, 'editarUser']);

$router->comprobarRutas();