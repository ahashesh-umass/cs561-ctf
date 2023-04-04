<?php

$requestUri = $_SERVER['REQUEST_URI'];

require_once '../app/controllers/FrontendController.php';
require_once '../app/controllers/api/CrackMeController.php';
require_once '../app/controllers/api/MediaController.php';

$frontendController = new FrontendController();
$mediaController = new MediaController();
$crackMeController = new CrackMeController();

if ($requestUri == '/') {
    $frontendController->indexAction();
} else if ($requestUri == '/crack-me') {
    $frontendController->crackMeAction();
} else if ($requestUri == '/find-me') {
    $frontendController->findMeAction();
} else if ($requestUri == '/api/crack-me') {
    $crackMeController->initAction();
} else if ($requestUri == '/api/media/upload') {
    $mediaController->uploadAction();
} else {
    http_response_code(404);
    echo "Not Found!";
}