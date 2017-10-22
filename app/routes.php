<?php

use App\Models\Cat;

use App\Controllers\PagesController;

use Illuminate\Database\Capsule\Manager as DB;

$app->get('/', PagesController::class . ':home')->setName('home');

$app->get('/facemash', PagesController::class . ':getfacemash')->setName('facemash');
$app->post('/facemash', PagesController::class . ':postfacemash');

$app->get('/scores', PagesController::class . ':getScores')->setName('scores');
