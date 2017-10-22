<?php

require '../vendor/autoload.php';

session_start();

$settings = require __DIR__ . '/../app/settings.php';
$app = new \Slim\App($settings);

require '../app/dependencies.php';

require '../app/routes.php';

$app->run();
