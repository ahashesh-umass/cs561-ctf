<?php

class FrontendController {
    public function indexAction() {
        require_once __DIR__ . './../views/home.php';
    }
}