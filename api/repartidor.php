<?php

    header('Content-Type: application/json');
    include_once('../class/repartidor-class.php');

    switch($_SERVER["REQUEST_METHOD"]){
        case 'POST':
            $_POST = file_get_contents('php://input'); 
            Repartidor::crearUsuario($_POST);
        break;

        case 'GET':
            if(isset($_GET["id"])){
                Repartidor::obtenerRepartidor($_GET["id"]);
            }else {
                Repartidor::obtenerRepartidores();
            }
            break;
    }

?>