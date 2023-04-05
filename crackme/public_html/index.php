<?php

$requestUri = $_SERVER['REQUEST_URI'];

require_once '../app/controllers/FrontendController.php';
require_once '../app/controllers/api/AppController.php';

$frontendController = new FrontendController();
$appController = new AppController();

if ($requestUri == '/') {
    $frontendController->indexAction();
} else if ($requestUri == '/api/app/init') {
    $appController->initAction();
} else {
    $frontendController->indexAction();
}