<?php

    header('Content-Type: application/json');
    include_once('../class/orden-class.php');

    switch($_SERVER["REQUEST_METHOD"]){
        case 'POST':
            $_POST = file_get_contents('php://input');
            Orden::procesarOrden($_POST);
            break;
        case 'GET':
            if(isset($_GET["id"]) && isset($_GET["asignada"])){
                Orden::obtenerOrdenAsignadaPorId($_GET["id"]);
            }
            if(isset($_GET["id"]) && !isset($_GET["asignada"])){
                Orden::obtenerOrdenPorId($_GET["id"]);
            }if(!isset($_GET["id"]) && !isset($_GET["asignada"])){
                Orden::obtenerOrdenesDisponibles();
            }
            break;    
    }


?>