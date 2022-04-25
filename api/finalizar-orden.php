<?php

    header('Content-Type: application/json');
    include_once('../class/finalizar-orden-class.php');

    switch($_SERVER["REQUEST_METHOD"]){
        case "POST":
                $_POST = file_get_contents('php://input');
                FinalizarOrden::finalizarOrden($_POST);
            break;
        case "GET":
            FinalizarOrden::obtenerOrdenesFinalizadas();
            break;
    }


?>