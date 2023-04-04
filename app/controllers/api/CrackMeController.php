<?php

class CrackMeController {
    public function initAction() {
        header('Content-Type: application/json; charset=utf-8');

        $data = file_get_contents(__DIR__ . './../../storage/crack_me.json');
        $data = json_decode($data, true);

        shuffle($data);
        $data = $data[0];
         
        echo json_encode($data);
    }
}