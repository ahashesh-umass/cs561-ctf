<?php

$requestUri = $_SERVER['REQUEST_URI'];

require_once '../app/controllers/FrontendController.php';
require_once '../app/controllers/api/MediaController.php';

$frontendController = new FrontendController();
$mediaController = new MediaController();

if ($requestUri == '/') {
    $frontendController->indexAction();
} else if ($requestUri == '/api/media/upload') {
    $mediaController->uploadAction();
} else {
    $frontendController->indexAction();
}