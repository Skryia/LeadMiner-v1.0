<?php

require __DIR__ . '/../vendor/autoload.php';

$router = new \App\Core\Router();
$app = new \App\Core\App($router);

$app->run();
