<?php

    header("Content-Type: application/json");
    include_once('../class/usuario-class.php');

    switch($_SERVER["REQUEST_METHOD"]){
        case 'POST':
            $_POST = file_get_contents('php://input');
            Usuario::crearUsuario($_POST);
            break;
        case 'GET':
            if(isset($_GET["id"])){
                echo "trae id";
            }else {
                Usuario::obtenerUsuarios();
            }
            break;
                
    }
