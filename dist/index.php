<?php

require_once __DIR__.'/../includes/app.php';
use MVC\Router;
use Controller\WebController;

header('Access-Control-Allow-Origin: *');

$router = new Router();

$router->post('/api/getUser',[WebController::class, 'getUser']);
$router->get('/api/getAllUser',[WebController::class, 'getAllUser']);
$router->post('/api/eliminarUser',[WebController::class, 'eliminarUser']);
$router->post('/api/editarUser',[WebController::class, 'editarUser']);

$router->comprobarRutas();