<?php

    header('Content-Type: application/json');
    include_once('../class/admin-class.php');

    switch($_SERVER["REQUEST_METHOD"]){
        case "GET":
                Admin::obtenerAdmins();
            break;
    }
