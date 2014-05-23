<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();
$app->get('/hello/:name', function ($name) {
   echo "Hello, $name";
});

$app->get('/', function () {
   echo "Welcome to Fork Recipes";
});

$app->run();
