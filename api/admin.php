<?php

    header('Content-Type: application/json');
    include_once('../class/admin-class.php');

    switch($_SERVER["REQUEST_METHOD"]){
        case "GET":
                if(isset($_GET["empresas"]) && !isset($_GET["productos"])){
                    Admin::obtenerEmpresas();
                }
                if(!isset($_GET["empresas"]) && !isset($_GET["productos"])){
                    Admin::obtenerAdmins();
                }
                if(isset($_GET["productos"]) && !isset($_GET["empresas"]) ){
                    Admin::obtenerProductos();
                }
            break;
    }
