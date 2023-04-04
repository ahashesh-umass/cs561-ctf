<?php

class FrontendController {
    public function indexAction() {
        require_once __DIR__ . './../views/home.php';
    }

    public function findMeAction() {
        require_once __DIR__ . './../views/find_me.php';
    }

    public function crackMeAction() {
        require_once __DIR__ . './../views/crack_me.php';
    }
}