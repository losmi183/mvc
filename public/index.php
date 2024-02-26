<?php

require_once __DIR__ .'/../vendor/autoload.php'; 

use app\controllers\AuthController;
use app\core\Application;
use app\controllers\SiteController;

// Create app object
$app = new Application(dirname(__DIR__));

// TODO: Move routes to separate file/class
$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);
// Auth routes
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

// Run app
$app->run();