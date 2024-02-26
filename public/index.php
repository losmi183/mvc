<?php
// phpinfo();
// exit;

require_once __DIR__ .'/../vendor/autoload.php'; 



// echo '<pre>';
// var_dump(dirname(__DIR__));
// // var_dump($callback);
// echo '</pre>';
// exit;

// TODO: Comment
use app\controllers\AuthController;
use app\core\Application;
use app\controllers\SiteController;
 

$app = new Application(dirname(__DIR__));


$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);
// Auth routes
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

// $app->router->post('/users', function () {
//     return 'Users';
// });

$app->run();