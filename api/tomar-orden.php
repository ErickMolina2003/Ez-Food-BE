<?php

    header('Content-Type: application/json');
    include_once('../class/orden-class.php');

    switch($_SERVER["REQUEST_METHOD"]){
        case 'POST':
            $_POST = file_get_contents('php://input');
            Orden::TomarOrden($_POST);
            break;
    }
?>