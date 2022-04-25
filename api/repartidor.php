<?php

    header('Content-Type: application/json');
    include_once('../class/repartidor-class.php');

    switch($_SERVER["REQUEST_METHOD"]){
        case 'POST':
            $_POST = file_get_contents('php://input'); 
            Repartidor::crearUsuario($_POST);
        break;

        case 'GET':
            Repartidor::obtenerRepartidores();
            break;
    }

?>