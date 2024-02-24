<?php

require_once __DIR__ .'/../vendor/autoload.php';



// echo '<pre>';
// var_dump(dirname(__DIR__));
// // var_dump($callback);
// echo '</pre>';
// exit;

// TODO: Comment
use app\core\Application;
 

$app = new Application(dirname(__DIR__));


$app->router->get("/", 'home');
$app->router->get("/contact", 'contact');

$app->router->get("/users", function () {
    return "Users";
});

$app->run();